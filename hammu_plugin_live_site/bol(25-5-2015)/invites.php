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
 * Data Transfer Object for `contactus_department` table.
 *
 * @author Nurlan Dzhumakaliev <nurlanj@live.com>
 * @package ow_plugins.contactus.bol
 * @since 1.0
 */
class HAMMU_BOL_Invites extends OW_Entity {

    /**
     * @var int
     */
    public $inviterId;

    /**
     * @var int
     */
    public $inviteeId;

    /**
     * @var int
     */
    public $timestamp;

    /**
     * @var varchar
     */
    public $client_status;
    public $escort_status;
    public $client_decline;
    public $escort_decline;
    public $buy_rose_status;

    /**
     * @var text
     */
    public $data;

    public function getInviterId() {
        return $this->inviterId;
    }

    public function setInviterId($inviterId) {
        $this->inviterId = $inviterId;
        return $this;
    }

    public function getInviteeId() {
        return $this->inviteeId;
    }

    public function setInviteeId($inviteeId) {
        $this->inviteeId = $inviteeId;
        return $this;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function setEscortStatus($escort_status) {
        $this->escort_status = $escort_status;

        return $this;
    }

    public function getEscortStatus() {
        return $this->escort_status;
    }

    public function setClientStatus($client_status) {
        $this->client_status = $client_status;

        return $this;
    }

    public function getClientStatus() {
        return $this->client_status;
    }

    public function setBuyRoseStatus($buy_rose_status) {
        $this->buy_rose_status = $buy_rose_status;

        return $this;
    }

    public function getBuyRoseStatus() {
        return $this->buy_rose_status;
    }

    public function setEscortDecline($escort_decline) {
        $this->escort_decline = $escort_decline;

        return $this;
    }

    public function getEscortDecline() {
        return $this->escort_decline;
    }

    public function setClientDecline($client_decline) {
        $this->client_decline = $client_decline;
        return $this;
    }

    public function getClientDecline() {
        return $this->client_decline;
    }

}
