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
class HAMMU_BOL_InvitesDao extends OW_BaseDao {

    const VAL_STATUS_ACTIVE = 'active';
    const VAL_STATUS_PENDING = 'pending';
    const VAL_STATUS_IGNORED = 'ignored';
    const VAL_STATUS_RE_ARRANGE = 're_arrange';
    const VAL_STATUS_ACCEPT_DATE = 'accept_date';
    const VAL_STATUS_CONFIRM = 'confirm';
    const VAL_STATUS_DECLINE = 'decline';

    /**
     * Constructor.
     *
     */
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
        return 'HAMMU_BOL_Invites';
    }

    /**
     * @see OW_BaseDao::getTableName()
     *
     */
    public function getTableName() {
        return OW_DB_PREFIX . 'invites';
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

    public function escort_propose_date_decline($inviterId, $inviteeId, $id) {

        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_ACTIVE)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_ACTIVE)
                ->andFieldEqual('escort_decline', HAMMU_BOL_Service::STATUS_PENDING);

        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }


        $dto->setEscortDecline(HAMMU_BOL_Service::STATUS_ACTIVE);
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
        //saving invite log Log
        $ex1 = new OW_Example();

        $ex1->andFieldEqual('id', $id);
        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);

        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_ESCORT_DECLINE, NULL, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_CLIENT_DECLINE_ESCORT_LOG, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_ESCORT_DECLINE_CLIENT_LOG);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;

        //echo "inserted_id->" . $dto->getId();
    }

    public function client_decline($inviterId, $inviteeId, $id) {

        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_ACTIVE)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_ACCEPT_DATE)
                ->andFieldEqual('client_decline', HAMMU_BOL_Service::STATUS_PENDING);

        $dto = $this->findObjectByExample($ex);


        if (empty($dto)) {
            return;
        }


        $dto->setClientDecline(HAMMU_BOL_Service::STATUS_ACTIVE);
        $dto->setClientStatus(HAMMU_BOL_Service::STATUS_DECLINE);
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
        //saving invite log Log
        $ex1 = new OW_Example();

        $ex1->andFieldEqual('id', $id);
        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);

        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_CLIENT_DECLINE, NULL, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_CLIENT_DECLINE_ESCORT_LOG, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_CLIENT_DECLINE_CLIENT_LOG);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;

        //echo "inserted_id->" . $dto->getId();
    }

    public function escort_decline($inviterId, $inviteeId, $id) {

        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_PENDING)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_PENDING)
                ->andFieldEqual('escort_decline', HAMMU_BOL_Service::STATUS_PENDING);

        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }


        $dto->setEscortDecline(HAMMU_BOL_Service::STATUS_ACTIVE);
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
        //saving invite log Log
        $ex1 = new OW_Example();

        $ex1->andFieldEqual('id', $id);
        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);

        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_ESCORT_DECLINE, NULL, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_ESCORT_DECLINE_ESCORT_LOG, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_ESCORT_DECLINE_CLIENT_LOG);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;

        //echo "inserted_id->" . $dto->getId();
    }

    public function inviteRequest($inviterId, $inviteeId) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_PENDING)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_PENDING)
                ->andFieldEqual('escort_decline', HAMMU_BOL_Service::STATUS_PENDING);
        $dto = $this->findObjectByExample($ex);

        $itWasIgnoredByRequester = $dto !== null;

        if ($itWasIgnoredByRequester) {
//            $this->save(
//                    $dto->setStatus('active')
//            );

            return array();
        }

        $dto = new HAMMU_BOL_Invites();

        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setClientStatus(HAMMU_BOL_Service::STATUS_PENDING);
        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setEscortStatus(HAMMU_BOL_Service::STATUS_PENDING);
        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setBuyRoseStatus(HAMMU_BOL_Service::STATUS_PENDING);
        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setEscortDecline(HAMMU_BOL_Service::STATUS_PENDING);
        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setClientDecline(HAMMU_BOL_Service::STATUS_PENDING);
        $dto->timestamp = time();
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
        //saving invite log Log
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_SENT, NULL, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_SENT_ESCORT, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_SENT_CLIENT);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;

        //echo "inserted_id->" . $dto->getId();
    }

    public function inviteRequestFail($inviterId, $inviteeId) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId);


        $dto = $this->findObjectByExample($ex);

        $itWasIgnoredByRequester = $dto !== null;

        if ($itWasIgnoredByRequester) {
//            $this->save(
//                    $dto->setStatus('active')
//            );

            return array();
        }

        $dto = new HAMMU_BOL_Invites();

        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setClientStatus(HAMMU_BOL_Service::STATUS_ACTIVE);
        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setEscortStatus(HAMMU_BOL_Service::STATUS_ACTIVE);
        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setBuyRoseStatus(HAMMU_BOL_Service::STATUS_ACTIVE);
        $dto->timestamp = time();
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
        //saving invite log Log
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_SENT_FAIL, NULL, "", HAMMU_BOL_InvitesLogDao::VAL_INVITATION_SENT_FAIL_CLIENT);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;

        //echo "inserted_id->" . $dto->getId();
    }

    /**
     * Accept new invites request
     *
     * @param integer $inviterId
     * @param integer $inviteeId
     *
     * @return HAMMU_BOL_Invites
     */
    public function accept($inviterId, $inviteeId, $id) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_PENDING);

        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }

        $dto->setEscortStatus(HAMMU_BOL_Service::STATUS_ACTIVE);
        $this->save($dto);

        $timestamp = $dto->getTimestamp();
        $ex1 = new OW_Example();
        $ex1->andFieldEqual('id', $id);

        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
//        print_r($log_dto);
//        exit;
        //saving invite log Log
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_ACCEPT, '', HAMMU_BOL_InvitesLogDao:: VAL_ACCEPT_INVITATION_ESCORT, HAMMU_BOL_InvitesLogDao::VAL_ACCEPT_INVITATION_CLIENT);
        // HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_ESCORT_ASK, $timestamp_post, "", HAMMU_BOL_InvitesLogDao::VAL_ACCEPT_INVITATION_CLIENT);
        //HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, "", "", "", HAMMU_BOL_InvitesLogDao::VAL_ACCEPT_INVITATION_SECOND_CLIENT);

        $rarray = array("timestamp" => $timestamp);
        return $rarray;
    }

    public function agree($inviterId, $inviteeId, $id, $timestamp) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_PENDING);

        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }

        $dto->setClientStatus(HAMMU_BOL_Service::STATUS_ACTIVE);
        $timeArr = array('client_time' => $timestamp);
        $dateTime = json_encode($timeArr);
        $dto->setData($dateTime);
        $this->save($dto);
        //$clientTime = $dto->getData();
//        print_r($clientTime);
//        exit;
        //$timestamp = $dto->getTimestamp();
        //saving invite log Log
        $ex1 = new OW_Example();
        $ex1->andFieldEqual('id', $id);
        $ex1->andFieldEqual('flag', '0');
        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
        if (!empty($log_dto)) {
            $log_dto->setFlag('1');
        }
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);

        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_CLIENT_PROPOSE_DATE, $timestamp, HAMMU_BOL_InvitesLogDao:: VAL_SEND_PROPOSE_DATE_TO_ESCORT, HAMMU_BOL_InvitesLogDao:: VAL_SEND_PROPOSE_DATE_TO_CLIENT);

        $rarray = array("timestamp" => $timestamp);
        return $rarray;
    }

    public function invite_re_arrange($inviterId, $inviteeId, $id, $post_timestamp, $addrr) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_ACTIVE)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_ACTIVE);



        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }
        $dto->setClientStatus(HAMMU_BOL_Service::STATUS_ACCEPT_DATE);
        $timeArr = array('escort_time' => $post_timestamp);
        $dateTime = json_encode($timeArr);
        $dto->setData($dateTime);
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
//saving invite log Log

        $ex1 = new OW_Example();
        $ex1->andFieldEqual('id', $id);

        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);

        //saving invite log Log
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);

        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_ESCORT_RE_ARRANGE, $addrr, HAMMU_BOL_InvitesLogDao::VAL_ASK_RE_ARRANGE_ESCORT, HAMMU_BOL_InvitesLogDao::VAL_ASK_RE_ARRANGE_CLIENT);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;
    }

    public function propose_date_accept($inviterId, $inviteeId, $id, $addrr) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_ACTIVE)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_ACTIVE);

        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }
        $post_data1 = json_decode($addrr);
        //print_r($abc->date=$bcd->client_time);
        //exit;
        $client_data = $dto->getData();
        $client_propose_date = json_decode($client_data);
        //print_r($bcd->client_time);
        $post_data1->date = $client_propose_date->client_time;
        //print_r($post_data1);
        //echo json_encode($post_data1);
        $final_data = json_encode($post_data1);
        $dto->setClientStatus(HAMMU_BOL_Service::STATUS_ACCEPT_DATE);
        $this->save($dto);

        $timestamp = $dto->getTimestamp();
        $ex1 = new OW_Example();
        $ex1->andFieldEqual('id', $id);

        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
//        print_r($log_dto);
//        exit;
        //saving invite log Log
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);

        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_PROPOSE_DATE_ACCEPT, $final_data, HAMMU_BOL_InvitesLogDao:: VAL_PROPOSE_DATE_ACCEPT_ESCORT, HAMMU_BOL_InvitesLogDao::VAL_PROPOSE_DATE_ACCEPT_CLIENT);
        // HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_ESCORT_ASK, $timestamp_post, "", HAMMU_BOL_InvitesLogDao::VAL_ACCEPT_INVITATION_CLIENT);
        //HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, "", "", "", HAMMU_BOL_InvitesLogDao::VAL_ACCEPT_INVITATION_SECOND_CLIENT);

        $rarray = array("timestamp" => $timestamp);
        return $rarray;
    }

    public function invite_rose($inviterId, $inviteeId) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)->andFieldEqual('inviteeId', $inviteeId)->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_ACTIVE)->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_ACTIVE)->andFieldEqual('buy_rose_status', HAMMU_BOL_Service::STATUS_PENDING);

        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }

        $dto->setBuyRoseStatus(HAMMU_BOL_Service::STATUS_ACTIVE);
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
//saving invite log Log
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_BUY_ROSE_AGREE, '', HAMMU_BOL_InvitesLogDao:: VAL_SENDING_BUY_ROSE_ESCORT, HAMMU_BOL_InvitesLogDao::VAL_ASK_BUY_ROSE_CLIENT);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;
    }

    public function confirm_invite($inviterId, $inviteeId, $id, $addrr) {

        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_ACCEPT_DATE)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_ACTIVE);


        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }

        $dto->setClientStatus(HAMMU_BOL_Service::STATUS_CONFIRM);
        $dto->setBuyRoseStatus(HAMMU_BOL_Service::STATUS_ACTIVE);
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
//saving invite log Log
        $ex1 = new OW_Example();
        $ex1->andFieldEqual('id', $id);

        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
//        print_r($log_dto);
//        exit;
        //saving invite log Log
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_BUY_ROSE_AGREE, $addrr, HAMMU_BOL_InvitesLogDao:: VAL_CONFIRT_INVITE_ESCORT, HAMMU_BOL_InvitesLogDao::VAL_CONFIRT_INVITE_CLIENT);
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_BUY_ROSE_AGREE_CLIENT_SIDE, $addrr, '', '');
        $rarray = array("timestamp" => $timestamp);
        return $rarray;
    }

    public function get_location($inviterId, $inviteeId, $id, $addrr) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('client_status', HAMMU_BOL_Service::STATUS_CONFIRM)
                ->andFieldEqual('escort_status', HAMMU_BOL_Service::STATUS_ACTIVE)
                ->andFieldEqual('buy_rose_status', HAMMU_BOL_Service::STATUS_ACTIVE);


        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }

        $timestamp = $dto->getTimestamp();
//saving invite log Log
        $ex1 = new OW_Example();
        $ex1->andFieldEqual('id', $id);

        $log_dto = HAMMU_BOL_InvitesLogDao::getInstance()->findObjectByExample($ex1);
//        print_r($log_dto);
//        exit;
        //saving invite log Log
        $log_dto->setFlag('1');
        HAMMU_BOL_InvitesLogDao::getInstance()->save($log_dto);
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao:: VAL_INVITATION_MEET_LOCATION, $addrr, HAMMU_BOL_InvitesLogDao:: VAL_MEET_LOCATION_ESCORT, HAMMU_BOL_InvitesLogDao::VAL_MEET_LOCATION_CLIENT);
        $rarray = array("timestamp" => $timestamp);
        return $rarray;
    }

    /**
     * Cancel invites
     *
     * @param integer $requesterId
     * @param integer $userId
     */
    public function cancel($inviterId, $inviteeId) {
        $ex = new OW_Example();

        $ex->andFieldInArray('inviterId', array($inviteeId, $inviterId))->andFieldInArray('inviteeId', array($inviteeId, $inviterId));

        $this->deleteByExample($ex);
    }

    /**
     * Ignore new invites request
     *
     * @param integer $inviterId
     * @param integer $inviteeId
     */
    public function ignore($inviterId, $inviteeId) {
        $ex = new OW_Example();

        $ex->andFieldEqual('inviterId', $inviterId)->andFieldEqual('inviteeId', $inviteeId);

        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        $dto->setStatus(HAMMU_BOL_Service::STATUS_IGNORED);

        $this->save($dto);
    }

    public function findListByInviterId($inviterId, $count) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId ORDER BY `timeStamp` DESC";

        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId));
    }

    public function findCountByInviterId($inviterId) {
        $example = new OW_Example();
        $example->andFieldEqual('inviterId', (int) $inviterId);
        return $this->countByExample($example);
    }

}
