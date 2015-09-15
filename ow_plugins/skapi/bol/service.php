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
    //private $hammuDao;
    private $hammuDao;

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
        $this->hammuDao = SKAPI_BOL_HammuDao::getInstance();
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

        $guest = $this->hammuDao->findGuest($userId, $guestId);

        if ($guest) {
            $guest->visitTimestamp = time();
            $this->hammuDao->save($guest);

            return true;
        }

        $guest = new SKAPI_BOL_Guest();
        $guest->userId = $userId;
        $guest->guestId = $guestId;
        $guest->viewed = 0;
        $guest->visitTimestamp = time();

        $this->hammuDao->save($guest);

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

        $guests = $this->hammuDao->findUserGuests($userId, $page, $limit);

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

        $guests = $this->hammuDao->findGuestUsers($userId, $page, $limit);

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

        return (int) $this->hammuDao->countNewGuests($userId);
    }

    /**
     * @param $userId
     * @return int
     */
    public function countGuestsForUser($userId) {

        return $this->hammuDao->countUserGuests($userId);
    }

    /**
     * @return bool
     */
    public function checkExpiredGuests() {
        $months = (int) OW::getConfig()->getValue('skapi', 'store_period');
        $timestamp = $months * 30 * 24 * 60 * 60;

        $this->hammuDao->deleteExpired($timestamp);

        return true;
    }

    /**
     * @param $userId
     * @return bool
     */
    public function deleteUserGuests($userId) {
        $this->hammuDao->deleteUserGuests($userId);

        return true;
    }

    public function getViewedStatusByGuestsIds($userId, $guestIds) {
        return $this->hammuDao->getViewedStatusByGuestIds($userId, $guestIds);
    }

    public function findGuestsByGuestIds($userId, $guestIds) {
        return $this->hammuDao->findGuestsByGuestIds($userId, $guestIds);
    }

    public function setViewedStatusByGuestIds($userId, $guestIds, $viewed = true) {
        return $this->hammuDao->setViewedStatusByGuestIds($userId, $guestIds, $viewed);
    }

    public function createUserDetails($userId, $deviceId, $deviceType, $id) {

        $user = new SKAPI_BOL_Hammu();
        $user->id = trim($id);
        $user->userId = trim($userId);
        $user->deviceId = trim($deviceId);
        $user->deviceType = trim($deviceType);
        $user->visitTimestamp = time();

//        $user->joinIp = ip2long(OW::getRequest()->getRemoteAddress());
        $this->saveOrUpdateEntity($user);
        return $user;
    }

    public function saveOrUpdateEntity(SKAPI_BOL_Hammu $user) {

        $this->hammuDao->entity_save($user);

        if (!empty($this->cachedUsers[$user->getId()])) {
            unset($this->cachedUsers[$user->getId()]);
        }
    }

    public function findValueExistOrNot($userId) {
        return $this->hammuDao->findValueExistOrNotByUserIds($userId);
    }

    public function deleteUserSkapi($userId) {
        $this->hammuDao->deleteUserSkapi($userId);
        $this->hammuDao->deleteUserFavorite($userId);
        return true;
    }

}
