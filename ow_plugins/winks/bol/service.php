<?php

/**
 * Copyright (c) 2014, Skalfa LLC
 * All rights reserved.
 *
 * ATTENTION: This commercial software is intended for exclusive use with SkaDate Dating Software (http://www.skadate.com) and is licensed under SkaDate Exclusive License by Skalfa LLC.
 *
 * Full text of this license can be found at http://www.skadate.com/sel.pdf
 */

/**
 * @author Kairat Bakitow <kainisoft@gmail.com>
 * @package ow_plugins.winks.bol
 * @since 1.0
 */
class WINKS_BOL_Service
{
    CONST LIMIT_TIMESTAMP = 604800; // week
    
    private static $classInstance;
    
    public static function getInstance()
    {
        if ( !isset(self::$classInstance) )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    private $winksDao;

    private function __construct()
    {
        $this->winksDao = WINKS_BOL_WinksDao::getInstance();
    }

    public function isLimited( $userId, $partnerId )
    {
        return $this->winksDao->isLimited($userId, $partnerId);
    }
    
    public function sendWink( $userId, $partnerId )
    {
        if ( empty($userId) || empty($partnerId) )
        {
            return FALSE;
        }

        if ( ($wink = $this->findByUserIdAndPartnerId($userId, $partnerId)) === NULL )
        {
            $wink = new WINKS_BOL_Winks();
        }
        
        $wink->setUserId($userId);
        $wink->setPartnerId($partnerId);
        $wink->setTimeStamp(time());
        $wink->setStatus(WINKS_BOL_WinksDao::STATUS_WAIT);
        $wink->setViewed(0);
        $wink->setConversationId(0);
        $wink->setWinkback(0);
        $this->winksDao->save($wink);
        
        return TRUE;
    }

    public function findByUserIdAndPartnerId( $userId, $partnerId )
    {
        return $this->winksDao->findByUserIdAndPartnerId($userId, $partnerId);
    }
    
    public function countWinksForUser( $partnerId, $status = NULL, $viewed = NULL )
    {
        return $this->winksDao->countWinksForUser($partnerId, $status, $viewed);
    }
    
    public function countWinksForPartner( $userId, $status = NULL, $viewed = NULL )
    {
        return $this->winksDao->countWinksForPartner($userId, $status, $viewed);
    }
    
    public function countWinkBackedByUserId( $userId )
    {
        return $this->winksDao->countWinkBackedByUserId($userId);
    }

    public function findWinkList( $partnerId, $first, $limit )
    {
        return $this->winksDao->findWinkList($partnerId, $first, $limit);
    }
    
    public function markViewedByIds( $winksIds )
    {
        return $this->winksDao->markViewedByIds($winksIds);
    }
    
    public function findWinkByUserIdAndPartnerId( $userId, $partnerId )
    {
        return $this->winksDao->findWinkByUserIdAndPartnerId($userId, $partnerId);
    }
    
    public function findWinkById( $id )
    {
        return $this->winksDao->findById($id);
    }
    
    public function findExpiredDate( $timeStamp )
    {
        return $this->winksDao->findExpiredDate($timeStamp);
    }
    
    public function deleteWinkById( $id )
    {
        return $this->winksDao->deleteById($id);
    }
    
    public function deleteWinkByUserId( $userId )
    {
        return $this->winksDao->deleteWinkByUserId($userId);
    }
    
    public function setWinkback( $winkId, $flag = TRUE )
    {
        if ( empty($winkId) || ($wink = $this->winksDao->findById($winkId)) === NULL )
        {
            return FALSE;
        }
        
        $wink->setWinkback($flag);
        $this->winksDao->save($wink);
        
        return TRUE;
    }
    
    public function isCompleted( $userId, $partnerId )
    {
        return $this->winksDao->isCompleted($userId, $partnerId);
    }
    
    public function setStatusByUserId( $userId, $status )
    {
        return $this->winksDao->setStatusByUserId($userId, $status);
    }
}
