<?php

class MODERATION_CLASS_EventHandler
{
    /**
     * Singleton instance.
     *
     * @var MODERATION_CLASS_EventHandler
     */
    private static $classInstance;

    /**
     * Returns an instance of class (singleton pattern implementation).
     *
     * @return MODERATION_CLASS_EventHandler
     */
    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    /**
     *
     * @var MODERATION_BOL_Service
     */
    private $service;
    
    private function __construct()
    {
        $this->service = MODERATION_BOL_Service::getInstance();
    }
    
    private function isRequireApproval( $entityType )
    {
        $contentType = BOL_ContentService::getInstance()->getContentTypeByEntityType($entityType);
        
        if ( $contentType === null )
        {
            return false;
        }
        
        $isModerator = OW::getUser()->isAuthorized($contentType["authorizationGroup"]);
        $isAdmin = OW::getUser()->isAdmin();
        
        if ( $isAdmin || $isModerator )
        {
            return false;
        }
        
        return $this->service->isRequireApproval($entityType);
    }
    
    public function onAfterAdd( OW_Event $event )
    {
        $params = $event->getParams();
        $data = $event->getData();
         
        if ( !empty($params["silent"]) || !empty($data["silent"]) )
        {
            return;
        }
                
        if ( !$this->isRequireApproval($params["entityType"]) )
        {
            return;
        }
        
        $contentInfo = BOL_ContentService::getInstance()->getContent($params["entityType"], $params["entityId"]);
        
        if ( empty($contentInfo) )
        {
            return;
        }
        
        $this->service->addEntity($params["entityType"], $params["entityId"], $contentInfo["userId"], array_merge(array(
            "reason" => "create"
        ), $data));
        
        BOL_ContentService::getInstance()->updateContentList($params["entityType"], array($params["entityId"]), array(
            "status" =>  BOL_ContentService::STATUS_APPROVAL
        ));
    }
    
    public function onAfterChange( OW_Event $event )
    {
        $params = $event->getParams();
        $data = $event->getData();
                
        if ( !empty($params["silent"]) || !empty($data["silent"]) )
        {
            return;
        }
        
        if ( !$this->isRequireApproval($params["entityType"]) )
        {
            return;
        }
        
        $contentInfo = BOL_ContentService::getInstance()->getContent($params["entityType"], $params["entityId"]);
        
        if ( empty($contentInfo) )
        {
            return;
        }
        
        $this->service->addEntity($params["entityType"], $params["entityId"], $contentInfo["userId"], array_merge(array(
            "reason" => "update"
        ), $data));
        
        BOL_ContentService::getInstance()->updateContentList($params["entityType"], array($params["entityId"]), array(
            "status" =>  BOL_ContentService::STATUS_APPROVAL
        ));
    }
    
    public function onBeforeDelete( OW_Event $event )
    {
        $params = $event->getParams();
        $this->service->deleteEntityList($params["entityType"], array($params["entityId"]));
    }
    
    public function onCollectModerationWidgetContent( BASE_CLASS_EventCollector $event )
    {
        $contentGroups = MODERATION_BOL_Service::getInstance()->getContentGroupsWithCount();
        
        if ( empty($contentGroups) )
        {
            return;
        }
        
        $contentsCmp = new BASE_CMP_ModerationPanelList($contentGroups);
        
        $event->add(array(
            "name" => "approve",
            "label" => OW::getLanguage()->text("moderation", "for_approve"),
            "content" => $contentsCmp->render()
        ));
    }
    
    public function onCollectModerationToolsMenu( BASE_CLASS_EventCollector $event )
    {
        $contentGroups = MODERATION_BOL_Service::getInstance()->getContentGroupsWithCount();
        
        if ( empty($contentGroups) )
        {
            return;
        }
        
        $event->add(array(
            "url" => OW::getRouter()->urlForRoute("moderation.approve_index"),
            "label" => OW::getLanguage()->text("moderation", "for_approve"),
            "iconClass" => "ow_ic_delete",
            "key" => "approve"
        ));
    }
    
    public function collectConsoleItems( BASE_CLASS_ConsoleItemCollector $event )
    {
        $groups = MODERATION_BOL_Service::getInstance()->getContentGroupsWithCount(OW::getUser()->getId());
        
        if ( !empty($groups) )
        {
            $event->add(new MODERATION_CMP_ConsoleItem($groups));
        }
    }
    
    public function approveEntity( OW_Event $event )
    {
        $params = $event->getParams();
        $data = $event->getData();
        
        $content = BOL_ContentService::getInstance()->getContent($params["entityType"], $params['entityId']);
        
        if ( empty($content) )
        {
            $data["error"] = "Content not found";
            
            return;
        }
        
        $type = $content["typeInfo"];
        $authorized = OW::getUser()->isAdmin() || OW::getUser()->isAuthorized($type["authorizationGroup"]);
        
        if ( !$authorized )
        {
            $data["error"] = "Not authorized";
            
            return;
        }
        
        BOL_ContentService::getInstance()->updateContentList($params["entityType"], array($params['entityId']), array(
            "status" =>  BOL_ContentService::STATUS_ACTIVE
        ));
        
        MODERATION_BOL_Service::getInstance()->deleteEntityList($params["entityType"], array($params['entityId']));
        
        $data["message"] = OW::getLanguage()->text("moderation", "feedback_approve", array(
            "content" => $type["entityLabel"]
        ));
        
        $event->setData($data);
        
        return $data;
    }
    
    public function init()
    {
        OW::getEventManager()->bind("moderation.approve", array($this, "approveEntity"));
        OW::getEventManager()->bind('console.collect_items', array($this, 'collectConsoleItems'));
        
        OW::getEventManager()->bind(BOL_ContentService::EVENT_AFTER_ADD, array($this, "onAfterAdd"));
        OW::getEventManager()->bind(BOL_ContentService::EVENT_AFTER_CHANGE, array($this, "onAfterChange"));
        OW::getEventManager()->bind(BOL_ContentService::EVENT_BEFORE_DELETE, array($this, "onBeforeDelete"));
        
        OW::getEventManager()->bind(BASE_CMP_ModerationToolsWidget::EVENT_COLLECT_CONTENTS, array($this, 'onCollectModerationWidgetContent'));
        OW::getEventManager()->bind("base.moderation_tools.collect_menu", array($this, 'onCollectModerationToolsMenu'));
    }
}