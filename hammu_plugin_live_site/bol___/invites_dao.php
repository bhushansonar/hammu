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
    public function inviteRequest($inviterId, $inviteeId) {
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

        $dto->setInviterId($inviterId)->setInviteeId($inviteeId)->setStatus(HAMMU_BOL_Service::STATUS_PENDING);

        $dto->timestamp = time();
        $this->save($dto);
        $timestamp = $dto->getTimestamp();
        //saving invite log Log
        HAMMU_BOL_InvitesLogDao::getInstance()->saveInviteLog($dto->getId(), $inviterId, $inviteeId, HAMMU_BOL_InvitesLogDao::VAL_INVITATION_SENT);
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
    public function accept($inviterId, $inviteeId) {
        $ex = new OW_Example();
        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId)
                ->andFieldEqual('status', HAMMU_BOL_Service::STATUS_PENDING);

        /**
         * @var HAMMU_BOL_Invites $dto
         */
        $dto = $this->findObjectByExample($ex);

        if (empty($dto)) {
            return;
        }

        $dto->setStatus(HAMMU_BOL_Service::STATUS_ACTIVE);

        $this->save($dto);

        return $dto;
    }

    /**
     * Cancel invites
     *
     * @param integer $requesterId
     * @param integer $userId
     */
    public function cancel($inviterId, $inviteeId) {
        $ex = new OW_Example();

        $ex->andFieldInArray('inviterId', array($inviteeId, $inviterId))
                ->andFieldInArray('inviteeId', array($inviteeId, $inviterId));

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

        $ex->andFieldEqual('inviterId', $inviterId)
                ->andFieldEqual('inviteeId', $inviteeId);

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

