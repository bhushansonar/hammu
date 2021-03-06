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
 * User search event handler class
 *
 * @author Egor Bulgakov <egor.bulgakov@gmail.com>
 * @package ow.plugin.usearch.bol
 * @since 1.5.3
 */
class USEARCH_CLASS_EventHandler
{
    /**
     * @var USEARCH_CLASS_EventHandler
     */
    private static $classInstance;

    const EVENT_COLLECT_USER_ACTIONS = 'usearch.collect_user_actions';

    /**
     * @return USEARCH_CLASS_EventHandler
     */
    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    private function __construct() { }

    public function addFollowAction( BASE_CLASS_EventCollector $e )
    {
        $params = $e->getParams();
        $userIdList = $params['userIdList'];
        $lang = OW::getLanguage();
        $viewerId = OW::getUser()->getId();

        $feedList = array();
        foreach ( $userIdList as $userId )
        {
            $feedList[] = array('feedType' => 'user', 'feedId' => $userId);
        }

        $followList = OW::getEventManager()->call('feed.is_follow_list', array('userId' => $viewerId, 'feedList' => $feedList));

        if ( $followList === null )
        {
            return;
        }

        $actions = array();
        foreach ( $userIdList as $userId )
        {
            if ( $userId == $viewerId )
            {
                continue;
            }

            $key = !empty($followList['user'][$userId]) && $followList['user'][$userId] ? 'unfollow' : 'follow';
            $id = 'action_' . $key . '_' . $userId;
            $actions[$userId] = array(
                'key' => $key,
                'label' => $lang->text('usearch', 'action_' . $key),
                'id' => $id,
                'href' => 'javascript://',
                'order' => 1,
                'linkClass' => 'ow_ic_ok userlist_action_' . $key,
                'attributes' => array('uid' => $userId)
            );
        }

        if ( count($actions) )
        {
            $script =
            '$(document).on("click", ".userlist_action_follow", function() {
                var $link = $(this);
                var userId = $link.attr("uid");
                $.ajax({
                    url: '.json_encode(OW::getRouter()->urlForRoute('usearch.follow')).',
                    type: "POST",
                    data: { userId: userId },
                    dataType: "json",
                    success: function(data) {
                        if ( data.result ) {
                            OW.info(data.message);
                            $link.html('.json_encode($lang->text('usearch', 'action_unfollow')).');
                            $link.removeClass("userlist_action_follow")
                                .addClass("userlist_action_unfollow");
                            $link.parent()
                                .removeClass("ow_search_results_profile_details_follow")
                                .addClass("ow_search_results_profile_details_unfollow");
                        }
                        else if ( data.error != "" ) {
                            OW.error(data.error);
                        }
                    }
                });
            });

            $(document).on("click", ".userlist_action_unfollow", function() {
                var $link = $(this);
                var userId = $link.attr("uid");
                $.ajax({
                    url: '.json_encode(OW::getRouter()->urlForRoute('usearch.unfollow')).',
                    type: "POST",
                    data: { userId: userId },
                    dataType: "json",
                    success: function(data) {
                        if ( data.result ) {
                            OW.info(data.message);
                            $link.html('.json_encode($lang->text('usearch', 'action_follow')).');
                            $link.removeClass("userlist_action_unfollow")
                                .addClass("userlist_action_follow");
                            $link.parent()
                                .removeClass("ow_search_results_profile_details_unfollow")
                                .addClass("ow_search_results_profile_details_follow");
                        }
                        else if ( data.error != "" ) {
                            OW.error(data.error);
                        }
                    }
                });
            });
            ';
            OW::getDocument()->addOnloadScript($script);
        }

        $e->add($actions);
    }

    public function addFriendAction( BASE_CLASS_EventCollector $e )
    {
        $params = $e->getParams();
        $userIdList = $params['userIdList'];
        $viewerId = OW::getUser()->getId();

        if ( !OW::getUser()->isAuthorized('friends', 'add_friend') )
        {
            return;
        }

        $lang = OW::getLanguage();

        $friendshipList = OW::getEventManager()->call('plugin.friends.get_friend_list', array('userId' => $viewerId, 'idList' => $userIdList));

        $actions = array();
        foreach ( $userIdList as $userId )
        {
            if ( $userId == $viewerId )
            {
                continue;
            }

            $key = in_array($userId, $friendshipList) ? 'removefriend' : 'addfriend';
            $id = 'action_' . $key . '_' . $userId;
            $actions[$userId] = array(
                'key' => $key,
                'label' => $lang->text('usearch', 'action_' . $key),
                'id' => $id,
                'href' => 'javascript://',
                'order' => 1,
                'linkClass' => 'ow_ic_heart userlist_action_' . $key ,
                'attributes' => array('uid' => $userId)
            );
        }

        if ( count($actions) )
        {
            $script =
            '$(document).on("click", ".userlist_action_addfriend", function() {
                var $link = $(this);
                var userId = $link.attr("uid");
                $.ajax({
                    url: '.json_encode(OW::getRouter()->urlForRoute('usearch.addfriend')).',
                    type: "POST",
                    data: { userId: userId },
                    dataType: "json",
                    success: function(data) {
                        if ( data.result ) {
                            OW.info(data.message);
                            $link.html('.json_encode($lang->text('usearch', 'action_removefriend')).');
                            $link.removeClass("userlist_action_addfriend")
                                .addClass("userlist_action_removefriend");
                            $link.parent()
                                .removeClass("ow_search_results_profile_details_addfriend")
                                .addClass("ow_search_results_profile_details_removefriend");
                        }
                        else if ( data.error != "" ) {
                            OW.error(data.error);
                        }
                    }
                });
            });

            $(document).on("click", ".userlist_action_removefriend", function() {
                var $link = $(this);
                var userId = $link.attr("uid");
                $.ajax({
                    url: '.json_encode(OW::getRouter()->urlForRoute('usearch.removefriend')).',
                    type: "POST",
                    data: { userId: userId },
                    dataType: "json",
                    success: function(data) {
                        if ( data.result ) {
                            OW.info(data.message);
                            $link.html('.json_encode($lang->text('usearch', 'action_addfriend')).');
                            $link.removeClass("userlist_action_removefriend")
                                .addClass("userlist_action_addfriend");
                            $link.parent()
                                .removeClass("ow_search_results_profile_details_removefriend")
                                .addClass("ow_search_results_profile_details_addfriend");
                        }
                        else if ( data.error != "" ) {
                            OW.error(data.error);
                        }
                    }
                });
            });
            ';
            OW::getDocument()->addOnloadScript($script);
        }

        $e->add($actions);
    }

    public function addBlockAction( BASE_CLASS_EventCollector $e )
    {
        $params = $e->getParams();
        $userIdList = $params['userIdList'];
        $viewerId = OW::getUser()->getId();
        $lang = OW::getLanguage();

        $blockList = BOL_UserService::getInstance()->findBlockedListByUserIdList($viewerId, $userIdList);

        $actions = array();
        foreach ( $userIdList as $userId )
        {
            if ( $userId == $viewerId )
            {
                continue;
            }

            $key = isset($blockList[$userId]) && $blockList[$userId] ? 'unblock' : 'block';
            $id = 'action_' . $key . '_' . $userId;
            $actions[$userId] = array(
                'key' => $key,
                'label' => $lang->text('usearch', 'action_' . $key),
                'id' => $id,
                'href' => 'javascript://',
                'order' => 1,
                'linkClass' => 'ow_ic_delete userlist_action_' . $key,
                'attributes' => array('uid' => $userId)
            );
        }

        if ( count($actions) )
        {
            $script =
            '$(document).on("click", ".userlist_action_block", function() {
                var $link = $(this);
                var userId = $link.attr("uid");
                $.ajax({
                    url: '.json_encode(OW::getRouter()->urlForRoute('usearch.block')).',
                    type: "POST",
                    data: { userId: userId },
                    dataType: "json",
                    success: function(data) {
                        if ( data.result ) {
                            OW.info(data.message);
                            $link.html('.json_encode($lang->text('usearch', 'action_unblock')).');
                            $link.removeClass("userlist_action_block")
                                .addClass("userlist_action_unblock");
                            $link.parent()
                                .removeClass("ow_search_results_profile_details_block")
                                .addClass("ow_search_results_profile_details_unblock");
                        }
                        else if ( data.error != "" ) {
                            OW.error(data.error);
                        }
                    }
                });
            });

            $(document).on("click", ".userlist_action_unblock", function() {
                var $link = $(this);
                var userId = $link.attr("uid");
                $.ajax({
                    url: '.json_encode(OW::getRouter()->urlForRoute('usearch.unblock')).',
                    type: "POST",
                    data: { userId: userId },
                    dataType: "json",
                    success: function(data) {
                        if ( data.result ) {
                            OW.info(data.message);
                            $link.html('.json_encode($lang->text('usearch', 'action_block')).');
                            $link.removeClass("userlist_action_unblock")
                                .addClass("userlist_action_block");
                            $link.parent()
                                .removeClass("ow_search_results_profile_details_unblock")
                                .addClass("ow_search_results_profile_details_block");
                        }
                        else if ( data.error != "" ) {
                            OW.error(data.error);
                        }
                    }
                });
            });
            ';
            OW::getDocument()->addOnloadScript($script);
        }

        $e->add($actions);
    }

    public function collectUserListActions( $userIdList )
    {
        if ( !OW::getUser()->isAuthenticated() )
        {
            return null;
        }

        $event = new BASE_CLASS_EventCollector(self::EVENT_COLLECT_USER_ACTIONS, array('userIdList' => $userIdList));
        OW::getEventManager()-> trigger($event);

        return $event->getData();
    }
    
    public function getSearchResult( OW_Event $e )
    {
        $params = $e->getParams();
                
        $criteriaList = $params['criterias'];
        $limit = empty($params['limit']) ? array(0, BOL_SearchService::USER_LIST_SIZE) : $params['limit'];
        
        $sex = !empty($criteriaList['sex']) ? $criteriaList['sex'] : null;
        $match_sex = !empty($criteriaList['match_sex']) ? $criteriaList['match_sex'] : null;
        
        unset($criteriaList['sex']);
        unset($criteriaList['match_sex']);
        
        if ( !empty($sex) )
        {
            $criteriaList['match_sex'] = $sex;
        }
        
        if ( !empty($match_sex) )
        {
            $criteriaList['sex'] = $match_sex;
        }
        
        $criteriaList = USEARCH_BOL_Service::getInstance()->updateQuickSearchData( $criteriaList );
        //$criteriaList = USEARCH_BOL_Service::getInstance()->updateSearchData( $criteriaList );
        
        $extra = OW::getUser()->isAuthenticated() ? array(
            "where" => "AND `user`.`id` !=" . OW::getUser()->getId() . " "
        ) : array();
        
        $userIdList = BOL_UserService::getInstance()->findUserIdListByQuestionValues($criteriaList, $limit[0], $limit[1], false, $extra);
        
        $e->setData($userIdList);
        
        return $userIdList;
    }

    public function init()
    {
        $em = OW::getEventManager();

        $em->bind(self::EVENT_COLLECT_USER_ACTIONS, array($this, 'addFollowAction'));
        if ( OW::getPluginManager()->isPluginActive('friends') )
        {
            $em->bind(self::EVENT_COLLECT_USER_ACTIONS, array($this, 'addFriendAction'));
        }
        $em->bind(self::EVENT_COLLECT_USER_ACTIONS, array($this, 'addBlockAction'));
    }
    
    public function genericInit()
    {
        $em = OW::getEventManager();
        $em->bind('usearch.get_user_id_list', array($this, 'getSearchResult'));
    }
}