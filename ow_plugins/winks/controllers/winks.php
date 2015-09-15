<?php

/**
 * Copyright (c) 2014, Skalfa LLC
 * All rights reserved.
 *
 * ATTENTION: This commercial software is intended for exclusive use with SkaDate Dating Software (http://www.skadate.com) and is licensed under SkaDate Exclusive License by Skalfa LLC.
 *
 * Full text of this license can be found at http://www.skadate.com/sel.pdf
 */

/**
 * @author Kairat Bakitow <kainisoft@gmail.com>
 * @package ow_plugins.winks.controllets
 * @since 1.0
 */
class WINKS_CTRL_Winks extends OW_ActionController
{
    CONST EMAIL_SEND = 'send';
    CONST EMAIL_BACK = 'back';

    private $service;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->service = WINKS_BOL_Service::getInstance();
    }
    
    public function ajaxRsp( array $params = array() )
    {
        if ( OW::getRequest()->isAjax() && !empty($_POST['funcName']) )
        {
            $result = call_user_func(array($this, $_POST['funcName']), $_POST);
            
            ob_end_clean();
            
            header('Content-Type: application/json');
            exit(json_encode($result));
        }
        else
        {
            exit();
        }
    }

    private function sendWink( array $params )
    {
        $userService = BOL_UserService::getInstance();
        
        if ( empty($params['userId']) || empty($params['partnerId']) || 
            $userService->findUserById($params['userId']) === NULL || $userService->findUserById($params['partnerId']) === NULL ||
            $userService->isBlocked($params['partnerId'], $params['userId']) ||
            $this->service->isLimited($params['userId'], $params['partnerId']) )
        {
            return array('result' => FALSE, 'msg' => OW::getLanguage()->text('winks', 'wink_sent_error'));
        }
        
        if ( $this->service->sendWink($params['userId'], $params['partnerId']) )
        {
            OW::getEventManager()->trigger(new OW_Event('winks.send_wink', array('userId' => $params['userId'], 'partnerId' => $params['partnerId'])));

            if ( OW::getPluginManager()->isPluginActive('notifications') )
            {
                $rule = NOTIFICATIONS_BOL_Service::getInstance()->findRuleList($params['partnerId'], array('wink_email_notification'));

                if ( !isset($rule['wink_email_notification']) || (int)$rule['wink_email_notification']->checked )
                {
                    $this->sendWinkEmailNotification($params['userId'], $params['partnerId'], self::EMAIL_SEND);
                }
            }

            return array('result' => TRUE);
        }
        
        return array('result' => FALSE);
    }

    public function sendWinkEmailNotification( $userId, $partnerId, $winkType )
    {
        if ( empty($userId) || empty($partnerId) ||
            ($user = BOL_UserService::getInstance()->findUserById($userId)) === null ||
            ($partner = BOL_UserService::getInstance()->findUserById($partnerId)) === null )
        {
            return false;
        }

        $avatar = BOL_AvatarService::getInstance()->getDataForUserAvatars(array($userId, $partnerId), true, true, true, false);

        switch ( $winkType )
        {
            case self::EMAIL_SEND:
                $subjectKey = 'wink_send_email_subject';
                $subjectArr = array('displayname' => $avatar[$userId]['title']);

                $textContentKey = 'wink_send_email_text_content';
                $htmlContentKey = 'wink_send_email_html_content';
                $contentArr = array(
                    'src' => $avatar[$userId]['src'],
                    'displayname' => $avatar[$userId]['title'],
                    'url' => $avatar[$userId]['url'],
                    'home_url' => OW_URL_HOME
                );
                break;
            case self::EMAIL_BACK:
            default:
                $subjectKey = 'wink_back_email_subject';
                $subjectArr = array('displayname' => $avatar[$userId]['title']);

                $textContentKey = 'wink_back_email_text_content';
                $htmlContentKey = 'wink_back_email_html_content';
                $contentArr = array(
                    'src' => $avatar[$userId]['src'],
                    'displayname' => $avatar[$userId]['title'],
                    'url' => $avatar[$userId]['url'],
                    'conversation_url' => OW::getRouter()->urlForRoute('mailbox_messages_default')
                );
                break;
        }

        $language = OW::getLanguage();
        $mail = OW::getMailer()->createMail();

        $mail->addRecipientEmail($partner->email);
        $mail->setSubject($language->text('winks', $subjectKey, $subjectArr));
        $mail->setTextContent($language->text('winks', $textContentKey, $contentArr));
        $mail->setHtmlContent($language->text('winks', $htmlContentKey, $contentArr));

        OW::getMailer()->send($mail);
    }
    
    private function changeStatus( array $params )
    {
        if ( empty($params['status']) || empty($params['userId']) || empty($params['partnerId']) )
        {
            return array('result' => FALSE, 'msg' => OW::getLanguage()->text('winks', 'wink_sent_error'));
        }
        
        switch ( $params['status'] )
        {
            case WINKS_BOL_WinksDao::STATUS_ACCEPT:
                return $this->acceptWink($params['userId'], $params['partnerId']);
            case WINKS_BOL_WinksDao::STATUS_IGNORE:
            default:
                return $this->ignoreWink($params['userId'], $params['partnerId']);
        }
    }
    
    private function acceptWink( $userId, $partnerId )
    {
        if ( ($wink = $this->service->findWinkByUserIdAndPartnerId($userId, $partnerId)) === NULL )
        {
            return array('result' => FALSE, 'msg' => OW::getLanguage()->text('winks', 'wink_sent_error'));
        }
        
        $wink->setStatus(WINKS_BOL_WinksDao::STATUS_ACCEPT);
        WINKS_BOL_WinksDao::getInstance()->save($wink);

        if ( ($_wink = $this->service->findWinkByUserIdAndPartnerId($partnerId, $userId)) !== NULL )
        {
            $_wink->setStatus(WINKS_BOL_WinksDao::STATUS_IGNORE);
            WINKS_BOL_WinksDao::getInstance()->save($_wink);
        }
        
        $params = array(
            'userId' => $userId,
            'partnerId' => $partnerId,
            'content' => array(
                'entityType' => 'wink',
                'eventName' => 'renderWink',
                'params' => array(
                    'winkId' => $wink->id,
                    'winkBackEnabled' => 1
                )
            )
        );

        $event = new OW_Event('winks.onAcceptWink', $params);
        OW::getEventManager()->trigger($event);
        
        $data = $event->getData();

        if ( !empty($data['conversationId']) )
        {
            $wink->setConversationId($data['conversationId']);
            WINKS_BOL_WinksDao::getInstance()->save($wink);

            $userUrl = OW::getRouter()->urlForRoute('base_user_profile', array('username'=>BOL_UserService::getInstance()->getUserName($wink->getUserId())));
            $displayName = BOL_UserService::getInstance()->getDisplayName($wink->getUserId());
            
            return array(
                'result' => TRUE,
                'onclick' => 'OW.trigger(\'mailbox.open_dialog\',{convId:' . $wink->getConversationId() . ',opponentId:' . $wink->getUserId() . ',mode:"' . $data['mode'] . '"});return false;',
                'userUrl' => $userUrl,
                'displayName' => $displayName
            );
        }

        return array('result' => TRUE);
    }

    private function ignoreWink( $userId, $partnerId )
    {
        if ( ($wink = $this->service->findWinkByUserIdAndPartnerId($userId, $partnerId)) === NULL )
        {
            return array('result' => FALSE, 'msg' => OW::getLanguage()->text('winks', 'wink_sent_error'));
        }

        $wink->setStatus(WINKS_BOL_WinksDao::STATUS_IGNORE);
        WINKS_BOL_WinksDao::getInstance()->save($wink);

        $event = new OW_Event('winks.onIgnoreWink', array('userId' => $userId, 'partnerId' => $partnerId));
        OW::getEventManager()->trigger($event);

        return array('result' => TRUE);
    }

    private function winkBack( $params )
    {
        if ( empty($params['userId']) || empty($params['partnerId']) || empty($params['messageId']) || ($wink = $this->service->findWinkByUserIdAndPartnerId($params['userId'], $params['partnerId'])) === NULL )
        {
            return array('result' => FALSE, 'msg' => OW::getLanguage()->text('winks', 'wink_back_error'));
        }
        
        if ( $this->service->setWinkback($wink->getId(), TRUE) )
        {
            if ( OW::getPluginManager()->isPluginActive('notifications') )
            {
                $rule = NOTIFICATIONS_BOL_Service::getInstance()->findRuleList($wink->userId, array('wink_email_notification'));

                if ( !isset($rule['wink_email_notification']) || (int)$rule['wink_email_notification']->checked )
                {
                    $this->sendWinkEmailNotification($wink->partnerId, $wink->userId, self::EMAIL_BACK);
                }
            }
        }

        $event = new OW_Event('winks.onWinkBack', array(
            'userId' => $wink->getUserId(),
            'partnerId' => $wink->getPartnerId(),
            'conversationId' => $wink->getConversationId(),
            'content' => array(
                'entityType' => 'wink',
                'eventName' => 'renderWinkBack',
                'params' => array(
                    'winkId' => $wink->id,
                    'messageId' => $params['messageId']
                )
            )
        ));
        OW::getEventManager()->trigger($event);
    }
}
