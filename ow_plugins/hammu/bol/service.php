<?php

/**
 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.

 * ---
 * Copyright (c) 2011, Oxwall Foundation
 * All rights reserved.

 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the
 * following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice, this list of conditions and
 *  the following disclaimer.
 *
 *  - Redistributions in binary form must reproduce the above copyright notice, this list of conditions and
 *  the following disclaimer in the documentation and/or other materials provided with the distribution.
 *
 *  - Neither the name of the Oxwall Foundation nor the names of its contributors may be used to endorse or promote products
 *  derived from this software without specific prior written permission.

 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Contact us service.
 *
 * @author Nurlan Dzhumakaliev <nurlanj@live.com>
 * @package ow_plugins.contactus.bol
 * @since 1.0
 */
class HAMMU_BOL_Service {
    /**
     * Singleton instance.
     *
     * @var HAMMU_BOL_Service
     */

    const STATUS_ACTIVE = HAMMU_BOL_InvitesDao::VAL_STATUS_ACTIVE;
    const STATUS_PENDING = HAMMU_BOL_InvitesDao::VAL_STATUS_PENDING;
    const STATUS_IGNORED = HAMMU_BOL_InvitesDao::VAL_STATUS_IGNORED;
    const STATUS_RE_ARRANGE = HAMMU_BOL_InvitesDao::VAL_STATUS_RE_ARRANGE;
    const STATUS_ACCEPT_DATE = HAMMU_BOL_InvitesDao::VAL_STATUS_ACCEPT_DATE;
    const STATUS_CONFIRM = HAMMU_BOL_InvitesDao::VAL_STATUS_CONFIRM;
    const STATUS_DECLINE = HAMMU_BOL_InvitesDao::VAL_STATUS_DECLINE;

    private static $classInstance;
    private $invitesDao;
    private $invitesLogDao;

    /**
     * Returns an instance of class (singleton pattern implementation).
     *
     * @return HAMMU_BOL_Service
     */
    public static function getInstance() {
        if (self::$classInstance === null) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    private function __construct() {
        $this->invitesDao = HAMMU_BOL_InvitesDao::getInstance();
        $this->invitesLogDao = HAMMU_BOL_InvitesLogDao::getInstance();
    }

    public function inviteRequest($inviterId, $inviteeId) {

        return $this->invitesDao->inviteRequest($inviterId, $inviteeId);
    }

    public function inviteRequestFail($inviterId, $inviteeId) {

        return $this->invitesDao->inviteRequestFail($inviterId, $inviteeId);
    }

    public function accept($inviterId, $inviteeId, $id, $invitesId) {

        return $this->invitesDao->accept($inviterId, $inviteeId, $id, $invitesId);
    }

    public function propose_date_accept($inviterId, $inviteeId, $id, $addrr, $invitesId) {

        return $this->invitesDao->propose_date_accept($inviterId, $inviteeId, $id, $addrr, $invitesId);
    }

    public function escort_decline($inviterId, $inviteeId, $id) {

        return $this->invitesDao->escort_decline($inviterId, $inviteeId, $id);
    }

    public function escort_propose_date_decline($inviterId, $inviteeId, $id) {

        return $this->invitesDao->escort_propose_date_decline($inviterId, $inviteeId, $id);
    }

    public function client_decline($inviterId, $inviteeId, $id) {

        return $this->invitesDao->client_decline($inviterId, $inviteeId, $id);
    }

    public function agree($inviterId, $inviteeId, $id, $timestamp, $invitesId) {

        return $this->invitesDao->agree($inviterId, $inviteeId, $id, $timestamp, $invitesId);
    }

    public function invite_re_arrange($inviterId, $inviteeId, $id, $post_timestamp, $addrr, $invitesId) {

        return $this->invitesDao->invite_re_arrange($inviterId, $inviteeId, $id, $post_timestamp, $addrr, $invitesId);
    }

    public function invite_rose($inviterId, $inviteeId) {

        return $this->invitesDao->invite_rose($inviterId, $inviteeId);
    }

    public function confirm_invite($inviterId, $inviteeId, $id, $addrr, $invitesId) {

        return $this->invitesDao->confirm_invite($inviterId, $inviteeId, $id, $addrr, $invitesId);
    }

    public function get_location($inviterId, $inviteeId, $id, $addrr) {

        return $this->invitesDao->get_location($inviterId, $inviteeId, $id, $addrr);
    }

    public function reject($inviterId, $inviteeId, $id, $meeting_date) {
        return $this->invitesDao->reject($inviterId, $inviteeId, $id, $meeting_date);
    }

    public function findListByCrossIds($inviterId, $inviteeId) {

        return $list = $this->invitesLogDao->findListByCrossIds($inviterId, $inviteeId);
    }

    public function findEscortLogByCrossIds($inviterId, $inviteeId) {

        return $list = $this->invitesLogDao->findEscortLogByCrossIds($inviterId, $inviteeId);
    }

    public function findClienttLogByCrossIds($inviterId, $inviteeId) {

        return $list = $this->invitesLogDao->findClienttLogByCrossIds($inviterId, $inviteeId);
    }

    public function findClientListByIds($inviterId) {

        return $list = $this->invitesLogDao->findClientListByIds($inviterId);
    }

    public function findEscortListByIds($inviterId) {

        return $list = $this->invitesLogDao->findEscortListByIds($inviterId);
    }

    public function saveInvites(HAMMU_BOL_Invites $dto) {
        $this->invitesDao->save($dto);
    }

    public function findAllInvites() {
        return $this->invitesDao->findAll();
    }

    public function findInvitesById($id) {
        return $this->invitesDao->findById($id);
    }

    public function deleteInvites($id) {
        $this->invitesDao->deleteById($id);
    }

    public function saveInviteLog($invitesId, $inviterId, $inviteeId, $action) {

        $this->invitesLogDao->saveInviteLog($invitesId, $inviterId, $inviteeId, $action);
    }

    public function deleteUserLogHammu($userId) {
        $this->invitesDao->deleteUserLogHammu($userId);
        $this->invitesLogDao->deleteUserLogHammu($userId);
        return true;
    }

    public function findActiveLogs($first, $count) {
        return $this->invitesDao->findActiveLogs($first, $count);
    }

    public function findCountActiveLogs() {
        return $this->invitesDao->findCountActiveLogs();
    }

    public static function getExportDirPath() {
        return OW::getPluginManager()->getPlugin('hammu')->getPluginFilesDir();
    }

    public static function getTmpDirPath() {
        return OW::getPluginManager()->getPlugin('hammu')->getPluginFilesDir();
    }

    public function findAllActiveLogs() {
        return $this->invitesDao->findAllActiveLogs();
    }

//    public function getDepartmentLabel($id) {
//        return OW::getLanguage()->text('hammu', $this->getDepartmentKey($id));
//    }
//
//    public function addDepartment($email, $label) {
//        $contact = new CONTACTUS_BOL_Department();
//        $contact->email = $email;
//        CONTACTUS_BOL_DepartmentDao::getInstance()->save($contact);
//
//        BOL_LanguageService::getInstance()->addValue(
//                OW::getLanguage()->getCurrentId(), 'contactus', $this->getDepartmentKey($contact->id), trim($label));
//    }
//
//    public function deleteDepartment($id) {
//        $id = (int) $id;
//        if ($id > 0) {
//            $key = BOL_LanguageService::getInstance()->findKey('contactus', $this->getDepartmentKey($id));
//            BOL_LanguageService::getInstance()->deleteKey($key->id, true);
//            CONTACTUS_BOL_DepartmentDao::getInstance()->deleteById($id);
//        }
//    }
//
//    private function getDepartmentKey($name) {
//        return 'dept_' . trim($name);
//    }
//
//    public function getDepartmentList() {
//        return CONTACTUS_BOL_DepartmentDao::getInstance()->findAll();
//    }
}
