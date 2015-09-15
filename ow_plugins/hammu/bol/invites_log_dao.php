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
 * Data Access Object for `contactus_department` table.
 *
 * @author Nurlan Dzhumakaliev <nurlanj@live.com>
 * @package ow_plugins.contactus.bol
 * @since 1.0
 */
class HAMMU_BOL_InvitesLogDao extends OW_BaseDao {
    //actions

    const VAL_INVITATION_ESCORT_PROPOSE_DATE_DECLINE = 'escort_propose_date_decline';
    const VAL_INVITATION_ESCORT_DECLINE = 'escort_decline';
    const VAL_INVITATION_CLIENT_DECLINE = 'client_decline';
    const VAL_INVITATION_SENT_FAIL = 'invitation_sent_fail';
    const VAL_INVITATION_SENT = 'invitation_sent';
    const VAL_INVITATION_ACCEPT = 'invitation_accept';
    const VAL_PROPOSE_DATE_ACCEPT = 'propose_date_accept';
    const VAL_INVITATION_ESCORT_ASK = 'escort_asks';
    const VAL_INVITATION_CLIENT_PROPOSE_DATE = 'client_agree';
    const VAL_INVITATION_BUY_ROSE_AGREE = 'buy_rose';
    const VAL_INVITATION_ESCORT_RE_ARRANGE = 'client_re_arrange';
    const VAL_INVITATION_MEET_LOCATION = 'meet_location';
    const VAL_INVITATION_BUY_ROSE_AGREE_CLIENT_SIDE = 'buy_rose_client';
    const VAL_INVITATION_REJECTION = 'reject';

    /**
     * Constructor.
     *
     */
    const VAL_INVITATION_SENT_ESCORT = 'invitation_sent_escort_log';
    const VAL_INVITATION_SENT_CLIENT = 'invitation_sent_client_log';
    /**
     * Constructor.
     *
     */
    const VAL_INVITATION_ESCORT_DECLINE_CLIENT_LOG = 'invitation_escort_decline_client_log';
    const VAL_INVITATION_ESCORT_DECLINE_ESCORT_LOG = 'invitation_escort_decline_escort_log';

    /**

     * * Constructor.
     *
     */
    const VAL_INVITATION_CLIENT_DECLINE_CLIENT_LOG = 'invitation_client_decline_client_log';
    const VAL_INVITATION_CLIENT_DECLINE_ESCORT_LOG = 'invitation_client_decline_escort_log';
    /**

     * * Constructor.
     *
     */
    const VAL_INVITATION_PROPOSE_DATE_DECLINE_CLIENT_LOG = 'invitation_propose_date_client_log';
    const VAL_INVITATION_PROPOSE_DATE_DECLINE_ESCORT_LOG = 'invitation_propose_date_escort_log';
    /**
      VAL_INVITATION_ESCORT_PROPOSE_DATE_DECLINE
     * * Constructor.
     *
     */
    const VAL_PROPOSE_DATE_ACCEPT_CLIENT = 'accept_propose_date_client_log';
    const VAL_PROPOSE_DATE_ACCEPT_ESCORT = 'accept_propose_date_escort_log';
    /**
     * Constructor.
     *
     */
    const VAL_INVITATION_SENT_FAIL_CLIENT = 'invitation_sent_fail_client_log';
    /**
     * Constructor.
     *
     */
    const VAL_ACCEPT_INVITATION_ESCORT = 'accept_invitation_sent_escort_log';
    const VAL_ACCEPT_INVITATION_CLIENT = 'accept_invitation_sent_client_log';
    const VAL_ACCEPT_INVITATION_SECOND_CLIENT = 'accept_invitation_sent_client_log_second';

    /**
     * Constructor.
     *
     */
    const VAL_SEND_PROPOSE_DATE_TO_ESCORT = 'accept_agree_escort_log';
    const VAL_SEND_PROPOSE_DATE_TO_CLIENT = 'accept_agree_client_log';
    const VAL_ACCEPT_AGREE_TO_MEET_CLIENT = 'agree_to_meet_client_log';

    /**
     * Constructor.
     *
     */
    const VAL_SENDING_BUY_ROSE_ESCORT = 'sending_buy_rose_escort_log';
    const VAL_ASK_BUY_ROSE_CLIENT = 'ask_buy_rose_client_log';

    /**
     * Constructor.
     *
     */
    const VAL_ASK_RE_ARRANGE_ESCORT = 'ask_re_arange_escort_log';
    const VAL_ASK_RE_ARRANGE_CLIENT = 'sending_re_arrange_client_log';

    /**
     * Constructor.
     *
     */
    const VAL_CONFIRT_INVITE_ESCORT = 'confirm_invite_escort_log';
    const VAL_CONFIRT_INVITE_CLIENT = 'confirm_invite_client_log';

    /**
     * Constructor.
     *
     */
    /**
     * Constructor.
     *
     */
    const VAL_MEET_LOCATION_ESCORT = 'meet_location_escort_log';
    const VAL_MEET_LOCATION_CLIENT = 'meet_location_client_log';

    /**
     * Constructor.
     *
     */
    const VAL_REJECTION_ESCORT = 'rejection_escort_log';
    const VAL_REJECTION_CLIENT = 'rejection_client_log';

    protected function __construct() {
        parent::__construct();
    }

    /**
     * Singleton instance.
     *
     * @var CONTACTUS_BOL_DepartmentDao
     */
    private static $classInstance;

    /**
     * Returns an instance of class (singleton pattern implementation).
     *
     * @return CONTACTUS_BOL_DepartmentDao
     */
    public static function getInstance() {
        if (self::$classInstance === null) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    /**
     * @see OW_BaseDao::getDtoClassName()
     *
     */
    public function getDtoClassName() {
        return 'HAMMU_BOL_InvitesLog';
    }

    /**
     * @see OW_BaseDao::getTableName()
     *
     */
    public function getTableName() {
        return OW_DB_PREFIX . 'invites_log';
    }

    /**
     * Save new invites request
     *
     * @param integer $requesterId
     * @param integer $userId
     */
    public function deleteUserLogHammu($userId) {
        $sql = "DELETE FROM `" . $this->getTableName() . "` WHERE `inviterId` = ? OR `inviteeId` = ?";
        $this->dbo->query($sql, array($userId, $userId));
    }

    public function saveInviteLog($invitesId, $inviterId, $inviteeId, $action = NULL, $timestamp = NULL, $escort_log, $client_log) {

        if ($action == "escort_decline" || $action == "buy_rose_client" || $action == "reject" || $action == "escort_propose_date_decline") {
            $flag = "1";
        } else {
            $flag = "0";
        }

        $dto = new HAMMU_BOL_InvitesLog();
        $dto->setinvitesId($invitesId);
        $dto->setInviterId($inviterId);
        $dto->setInviteeId($inviteeId);
        $dto->setAction($action);
        $dto->setData($timestamp);
        $dto->setflag($flag);
        $dto->setEscortLog($escort_log);
        $dto->setClientLog($client_log);
        $dto->timestamp = time();
        $this->save($dto);
        return $dto->id;
    }

    public function findListByCrossIds($inviterId, $inviteeId) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId ORDER BY `timestamp` DESC";
        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId, "inviteeId" => $inviteeId));
    }

    public function findEscortLogByCrossIds($inviterId, $inviteeId) {

        // $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId AND escort_log IN ('invitation_sent_escort_log','accept_invitation_sent_escort_log','accept_invitation_sent_client_log','accept_agree_escort_log','sending_buy_rose_escort_log','ask_re_arange_escort_log','invitation_client_decline_escort_log') ORDER BY `timestamp` DESC";
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId AND escort_log IN ('meet_location_escort_log','invitation_sent_escort_log','invitation_escort_decline_escort_log','invitation_client_decline_escort_log','accept_propose_date_escort_log','accept_invitation_sent_escort_log','accept_agree_escort_log','sending_buy_rose_escort_log','ask_re_arange_escort_log','confirm_invite_escort_log','rejection_escort_log','invitation_propose_date_escort_log') ORDER BY `timestamp` DESC";
        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId, "inviteeId" => $inviteeId));
    }

    public function findClienttLogByCrossIds($inviterId, $inviteeId) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId AND client_log IN ('meet_location_client_log','invitation_sent_client_log','invitation_escort_decline_client_log','invitation_client_decline_client_log','accept_propose_date_client_log','invitation_sent_fail_client_log','accept_invitation_sent_client_log','accept_invitation_sent_client_log_second','accept_agree_client_log','agree_to_meet_client_log','ask_buy_rose_client_log','sending_re_arrange_client_log','confirm_invite_client_log','rejection_client_log','invitation_propose_date_client_log') ORDER BY `timestamp` DESC";
//$sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId AND client_log IN ('ask_buy_rose_client_log','accept_invitation_sent_client_log_second','agree_to_meet_client_log','accept_invitation_sent_client_log','invitation_sent_client_log','sending_re_arrange_client_log','invitation_escort_decline_client_log','accept_agree_client_log') ORDER BY `timestamp` DESC";
        //exit;
        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId, "inviteeId" => $inviteeId));
    }

    public function findEscortListByIds($inviterId) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviteeId` = :inviteeId  AND action IN ('invitation_sent','client_agree','client_decline','buy_rose','reject','escort_decline','escort_propose_date_decline') AND `noti_remove`='0' ORDER BY `timestamp` ASC";
        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviteeId' => $inviterId));
    }

    public function findClientListByIds($inviterId) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId  AND action IN ('invitation_accept','escort_asks','invitation_sent_fail','escort_decline','client_re_arrange','propose_date_accept','meet_location','buy_rose_client','escort_propose_date_decline') AND `noti_remove`='0' ORDER BY `timestamp` ASC";
        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId));
    }

    public function findCountByInviterId($inviterId) {
        $example = new OW_Example();
        $example->andFieldEqual('inviterId', (int) $inviterId);
        return $this->countByExample($example);
    }

}
