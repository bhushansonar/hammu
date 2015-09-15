<?php

/**
 * Copyright (c) 2012, Oxwall CandyStore
 * All rights reserved.

 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.
 */
/**
 * /init.php
 *
 * @author Oxwall CandyStore <plugins@oxcandystore.com>
 * @package ow.ow_plugins.ocs_guests
 * @since 1.3.1
 */
OW::getRouter()->addRoute(new OW_Route('skapi.admin', '/admin/plugins/skapi', 'SKAPI_CTRL_Admin', 'index'));

//OW::getRouter()->addRoute(new OW_Route('skapi.list', '/skapi/list', 'SKAPI_CTRL_List', 'index'));
OW::getRouter()->addRoute(new OW_Route('skapi.api', '/skapi/api', 'SKAPI_CTRL_Api', 'index'));
OW::getRouter()->addRoute(new OW_Route('skapi.newcall', '/skapi/newcall', 'SKAPI_CTRL_Api', 'newcall'));
OW::getRouter()->addRoute(new OW_Route('skapi.login', '/skapi/login', 'SKAPI_CTRL_Api', 'login'));
OW::getRouter()->addRoute(new OW_Route('skapi.signup', '/skapi/signup', 'SKAPI_CTRL_Api', 'signup'));
OW::getRouter()->addRoute(new OW_Route('skapi.facebooklogin', '/skapi/facebooklogin', 'SKAPI_CTRL_Api', 'facebooklogin'));
OW::getRouter()->addRoute(new OW_Route('skapi.updateprofile', '/skapi/updateprofile', 'SKAPI_CTRL_Api', 'updateprofile'));

SKAPI_CLASS_EventHandler::getInstance()->init();