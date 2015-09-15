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

    const VAL_INVITATION_SENT = 'invitation_sent';
    const VAL_INVITATION_ACCEPT = 'invitation_accept';
    const VAL_INVITATION_ESCORT_ASK = 'escort_asks';
    const VAL_INVITATION_CLIENT_AGREE = 'client_agree';
    const VAL_INVITATION_BUY_ROSE_AGREE = 'buy_rose';
    const VAL_INVITATION_ESCORT_RE_ARRANGE = 'client_re_arrange';
    const VAL_INVITATION_MEET_LOCATION = 'meet_location';

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
    public function saveInviteLog($invitesId, $inviterId, $inviteeId, $action = NULL, $timestamp = NULL) {

        //exit;
//        $ex = new OW_Example();
//        $ex->andFieldEqual('inviterId', $inviterId)
//                ->andFieldEqual('inviteeId', $inviteeId);
//
//        $dto = $this->findObjectByExample($ex);
//
//        $itWasIgnoredByRequester = $dto !== null;
//
//        if ($itWasIgnoredByRequester) {
//            $this->save(
//                    $dto->setStatus('active')
//            );
//
//            return;
//        }
        $flag = "0";
        $dto = new HAMMU_BOL_InvitesLog();
        $dto->setinvitesId($invitesId);
        $dto->setInviterId($inviterId);
        $dto->setInviteeId($inviteeId);
        $dto->setAction($action);
        $dto->setData($timestamp);
        $dto->setflag($flag);
        $dto->timestamp = time();
        $this->save($dto);
    }

    public function findListByCrossIds($inviterId, $inviteeId) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId ORDER BY `timestamp` DESC";
        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId, "inviteeId" => $inviteeId));
    }

//    public function findEscortListByIds($inviterId, $inviteeId) {
//        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId AND action IN ('invitation_sent','client_agree','client_re_arrange') ORDER BY `timestamp` ASC";
//
//        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId, "inviteeId" => $inviteeId));
//    }
//
//    public function findClientListByIds($inviterId, $inviteeId) {
//        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId AND `inviteeId` = :inviteeId AND action IN ('invitation_accept','escort_asks','buy_rose') ORDER BY `timestamp` ASC";
//
//        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId, "inviteeId" => $inviteeId));
//    }

    public function findEscortListByIds($inviterId) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviteeId` = :inviterId  AND action IN ('invitation_sent','client_agree','client_re_arrange') ORDER BY `timestamp` DESC";

        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId));
    }

    public function findClientListByIds($inviterId) {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `inviterId` = :inviterId  AND action IN ('invitation_accept','escort_asks','buy_rose') ORDER BY `timestamp` DESC";

        return $this->dbo->queryForObjectList($sql, $this->getDtoClassName(), array('inviterId' => $inviterId));
    }

    public function findCountByInviterId($inviterId) {
        $example = new OW_Example();
        $example->andFieldEqual('inviterId', (int) $inviterId);
        return $this->countByExample($example);
    }

}

