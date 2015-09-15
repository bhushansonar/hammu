<?php

/**
 * Copyright (c) 2013, Podyachev Evgeny <joker.OW2@gmail.com>
 * All rights reserved.

 * ATTENTION: This commercial software is intended for use with Oxwall Free Community Software http://www.oxwall.org/
 * and is licensed under Oxwall Store Commercial License.
 * Full text of this license can be found at http://www.oxwall.org/store/oscl
 */

/**
 * @author Podyachev Evgeny <joker.OW2@gmail.com>
 * @package ow_plugins.google_maps_location.components
 * @since 1.0
 */

class GOOGLELOCATION_CMP_GroupsWidget extends GOOGLELOCATION_CMP_MapWidget
{    
    const MAX_USERS_COUNT = 5000;
   
    protected $list = array();
    
    public function __construct( BASE_CLASS_WidgetParameter $params )
    {
        $event = new BASE_CLASS_EventCollector('ads.enabled_plugins');
        OW::getEventManager()->trigger($event);

        $pluginList = $event->getData();
        
        if ( !in_array('groups', $pluginList) )
        {
            $this->setVisible('false');
            return;
        }
        
        parent::__construct( $params );
    }
    
    protected function assignList( BASE_CLASS_WidgetParameter $params )
    {
        $groupId = $params->additionalParamList['entityId'];
        
        $list = GROUPS_BOL_Service::getInstance()->findUserList($groupId, 0, self::MAX_USERS_COUNT);

        $idlist = array();
        foreach ( $list as $item )
        {
            $idlist[] = $item->id;
        }
        
        return $idlist;
    }
}