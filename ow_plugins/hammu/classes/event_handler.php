<?php

/**
 * Copyright (c) 2012, Oxwall CandyStore
 * All rights reserved.

 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.
 */

/**
 * Guests event handler
 *
 * @author Oxwall CandyStore <plugins@oxcandystore.com>
 * @package ow_plugins.ocs_guests.classes
 * @since 1.6.0
 */
class HAMMU_CLASS_EventHandler {

    /**
     * Class instance
     *
     * @var OCSGUESTS_CLASS_EventHandler
     */
    private static $classInstance;

    /**
     * Class constructor
     *
     */
    private function __construct() {

    }

    /**
     * Returns class instance
     *
     * @return OCSGUESTS_CLASS_EventHandler
     */
    public static function getInstance() {
        if (null === self::$classInstance) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    public function onUserUnregister(OW_Event $event) {
        $params = $event->getParams();

        $userId = $params['userId'];

        HAMMU_BOL_Service::getInstance()->deleteUserLogHammu($userId);
    }

    public function genericInit() {
        $em = OW::getEventManager();
        $em->bind(OW_EventManager::ON_USER_UNREGISTER, array($this, 'onUserUnregister'));
    }

    public function init() {
        $this->genericInit();
//        $em = OW::getEventManager();
//
//        $em->bind('base.widget_panel.content.top', array($this, 'onProfilePageRender'));
    }

}
