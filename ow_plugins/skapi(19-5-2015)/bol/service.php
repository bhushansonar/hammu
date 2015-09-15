<?php

/**
 * Copyright (c) 2012, Oxwall CandyStore
 * All rights reserved.

 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.
 */

/**
 * Guests service class
 *
 * @author Oxwall CandyStore <plugins@oxcandystore.com>
 * @package ow.ow_plugins.ocs_guests.bol
 * @since 1.3.1
 */
final class SKAPI_BOL_Service {

    /**
     * @var OCSGUESTS_BOL_GuestDao
     */
    private $guestDao;
    //private $hammuDao;

    /**
     * Class instance
     *
     * @var OCSGUESTS_BOL_Service
     */
    private static $classInstance;

    /**
     * Class constructor
     *
     */
    private function __construct() {
        $this->guestDao = SKAPI_BOL_HammuDao::getInstance();
    }

    /**
     * Returns class instance
     *
     * @return OCSGUESTS_BOL_Service
     */
    public static function getInstance() {
        if (null === self::$classInstance) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    /**
     * @param $userId
     * @param $guestId
     * @return bool
     */
    public function trackVisit($userId, $guestId) {
        if (!$userId || !$guestId || ($guestId == $userId) || BOL_AuthorizationService::getInstance()->isModerator($guestId)) {
            return;
        }

        $guest = $this->guestDao->findGuest($userId, $guestId);

        if ($guest) {
            $guest->visitTimestamp = time();
            $this->guestDao->save($guest);

            return true;
        }

        $guest = new SKAPI_BOL_Guest();
        $guest->userId = $userId;
        $guest->guestId = $guestId;
        $guest->viewed = 0;
        $guest->visitTimestamp = time();

        $this->guestDao->save($guest);

        return true;
    }

    /**
     * @param $userId
     * @param $page
     * @param $limit
     * @return array
     */
    public function findGuestsForUser($userId, $page, $limit) {
        if (!$userId) {
            return array();
        }

        $guests = $this->guestDao->findUserGuests($userId, $page, $limit);

        foreach ($guests as &$g) {
            $g->visitTimestamp = UTIL_DateTime::formatDate($g->visitTimestamp, false);
        }

        return $guests;
    }

    /**
     * @param $userId
     * @param $page
     * @param $limit
     * @return array
     */
    public function findGuestUsers($userId, $page, $limit) {
        if (!$userId) {
            return array();
        }

        $guests = $this->guestDao->findGuestUsers($userId, $page, $limit);

        return $guests;
    }

    /**
     * @param $userId
     * @return int
     */
    public function findNewGuestsCount($userId) {
        if (!$userId) {
            return 0;
        }

        return (int) $this->guestDao->countNewGuests($userId);
    }

    /**
     * @param $userId
     * @return int
     */
    public function countGuestsForUser($userId) {

        return $this->guestDao->countUserGuests($userId);
    }

    /**
     * @return bool
     */
    public function checkExpiredGuests() {
        $months = (int) OW::getConfig()->getValue('skapi', 'store_period');
        $timestamp = $months * 30 * 24 * 60 * 60;

        $this->guestDao->deleteExpired($timestamp);

        return true;
    }

    /**
     * @param $userId
     * @return bool
     */
    public function deleteUserGuests($userId) {
        $this->guestDao->deleteUserGuests($userId);

        return true;
    }

    public function getViewedStatusByGuestsIds($userId, $guestIds) {
        return $this->guestDao->getViewedStatusByGuestIds($userId, $guestIds);
    }

    public function findGuestsByGuestIds($userId, $guestIds) {
        return $this->guestDao->findGuestsByGuestIds($userId, $guestIds);
    }

    public function setViewedStatusByGuestIds($userId, $guestIds, $viewed = true) {
        return $this->guestDao->setViewedStatusByGuestIds($userId, $guestIds, $viewed);
    }

    public function createUserDetails($userId, $deviceId, $deviceType, $id) {

        $user = new SKAPI_BOL_Hammu();
        $user->id = trim($id);
        $user->userId = trim($userId);
        $user->deviceId = trim($deviceId);
        $user->deviceType = trim($deviceType);
        $user->visitTimestamp = time();

//        $user->joinIp = ip2long(OW::getRequest()->getRemoteAddress());
        $this->saveOrUpdate($user);
        return $user;
    }

    public function saveOrUpdate(SKAPI_BOL_Hammu $user) {

        $this->guestDao->save($user);

        if (!empty($this->cachedUsers[$user->getId()])) {
            unset($this->cachedUsers[$user->getId()]);
        }
    }

    public function findValueExistOrNot($userId) {
        return $this->guestDao->findValueExistOrNotByUserIds($userId);
    }

}
