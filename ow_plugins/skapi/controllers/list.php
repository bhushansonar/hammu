<?php

/**
 * Copyright (c) 2012, Oxwall CandyStore
 * All rights reserved.

 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.
 */

/**
 * User guests page controller.
 *
 * @author Oxwall CandyStore <plugins@oxcandystore.com>
 * @package ow.ow_plugins.ocs_guests.controllers
 * @since 1.3.1
 */
class SKAPI_CTRL_List extends OW_ActionController {

    public function index(array $params) {
        echo "post_call->" . $_POST['post_id'];
        echo "call->" . $params['id'];
        echo "user_id->" . OW::getUser()->getId();
        echo "call";
        die;
//        if (!$userId = OW::getUser()->getId()) {
//            throw new AuthenticateException();
//        }
//        $page = (!empty($_GET['page']) && intval($_GET['page']) > 0 ) ? $_GET['page'] : 1;
//        $lang = OW::getLanguage();
//        $perPage = (int) OW::getConfig()->getValue('base', OW::getPluginManager()->isPluginActive('skadate') ? 'users_on_page' : 'users_count_on_page');
//        $guests = OCSGUESTS2_BOL_Service::getInstance()->findGuestsForUser($userId, $page, $perPage);
//        $guestList = array();
//        if ($guests) {
//            foreach ($guests as $guest) {
//                $guestList[$guest->guestId] = array('last_visit' => $lang->text('skapi', 'visited') . ' ' . '<span class="ow_remark">' . $guest->visitTimestamp . '</span>');
//            }
//            $itemCount = OCSGUESTS2_BOL_Service::getInstance()->countGuestsForUser($userId);
//
//            if (OW::getPluginManager()->isPluginActive('skadate')) {
//                $cmp = OW::getClassInstance('BASE_CMP_Users', $guestList, array(), $itemCount);
//            } else {
//                $guestsUsers = OCSGUESTS2_BOL_Service::getInstance()->findGuestUsers($userId, $page, $perPage);
//                $cmp = new OCSGUESTS2_CMP_Users($guestsUsers, $itemCount, $perPage, true, $guestList);
//            }
//            $this->addComponent('guests', $cmp);
//        } else {
//            $this->assign('guests', null);
//        }
//        $this->setPageHeading($lang->text('skapi', 'viewed_profile'));
//        $this->setPageTitle($lang->text('skapi', 'viewed_profile'));
        //  OW::getNavigation()->activateMenuItem(OW_Navigation::MAIN, 'base', 'dashboard');
    }

}

