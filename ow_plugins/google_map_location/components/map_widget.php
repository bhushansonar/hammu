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

abstract class GOOGLELOCATION_CMP_MapWidget extends BASE_CLASS_Widget
{    
    const MAX_USERS_COUNT = 5000;
    
    public $map = null;
    public $locationList = array();
    
    public function __construct( BASE_CLASS_WidgetParameter $params )
    {
        parent::__construct();
        
        $IdList = $this->assignList( $params );
        
        if ( empty($IdList) && !$params->customizeMode )
        {
            $this->setVisible(false);
            return;
        }
        
        $this->locationList = GOOGLELOCATION_BOL_LocationService::getInstance()->findByUserIdList( $IdList );

        if ( empty($this->locationList) && !$params->customizeMode )
        {
            $this->setVisible(false);
            return;
        }
        
        $this->map = $this->getMap($params);
        $this->renderMap();
        
        $this->setTemplate(OW::getPluginManager()->getPlugin('googlelocation')->getCmpViewDir().'map_widget.html');
    }
    
    abstract protected function assignList( BASE_CLASS_WidgetParameter $params );

    protected function getMap( BASE_CLASS_WidgetParameter $params )            
    {        
        $lat = isset($params->customParamList['map_center_lat']) ? (double) $params->customParamList['map_center_lat'] : 30;
        $lng = isset($params->customParamList['map_center_lng']) ? (double) $params->customParamList['map_center_lng'] : 10;
        $zoom = isset($params->customParamList['map_zoom']) ? (int) $params->customParamList['map_zoom'] : 2;
        $height = isset($params->customParamList['map_height']) ? (int) $params->customParamList['map_height'] : 350;
        
        $map = new GOOGLELOCATION_CMP_Map();
        $map->setHeight($height . 'px');
        $map->setZoom($zoom);
        $map->setCenter($lat,$lng);
        $map->setMapOption('scrollwheel', 'false');
        
        return $map;
    }
    
    protected function renderMap()
    {
        $locationList = $this->locationList;
        
        $userIdList = array();
        $userLocationList = array();

        foreach( $locationList as $location )
        {
            $userIdList[$location->entityId] = $location->entityId;
            $userLocationList[$location->entityId] = $location;
        }
        unset($locationList);

        $avatarList = BOL_AvatarService::getInstance()->getDataForUserAvatars($userIdList, true, true, true, false );

        $userUrlList = BOL_UserService::getInstance()->getUserUrlsForList($userIdList);
        $displayNameList = BOL_UserService::getInstance()->getDisplayNamesForList($userIdList);
        $displayedFields = $this->getUserFields($userIdList);
        
        foreach( $userLocationList as $userId => $location )
        {
            $cmp = new GOOGLELOCATION_CMP_MapItem();
            $cmp->setAvatar($avatarList[$userId]);
            $content = "<a href='{$userUrlList[$userId]}'>".$displayNameList[$userId]."</a>
                        <div>$displayedFields[$userId]</div>
                        <div>{$location->address}</div>";
            $cmp->setContent($content);

            $this->map->addPoint($location->lat, $location->lng, '', $cmp->render());
        }

        $this->addComponent("map", $this->map);
    }
    
    public static function getSettingList()
    {
        $settingList = array();
        $settingList['map_center_lat'] = array(
            'presentation' => self::PRESENTATION_NUMBER,
            'label' => OW_Language::getInstance()->text('googlelocation', 'widget_settings_map_center_lat'),
            'value' => 10
        );
        
        $settingList['map_center_lng'] = array(
            'presentation' => self::PRESENTATION_NUMBER,
            'label' => OW_Language::getInstance()->text('googlelocation', 'widget_settings_map_center_lng'),
            'value' => 30
        );
                
        $settingList['map_zoom'] = array(
            'presentation' => self::PRESENTATION_NUMBER,
            'label' => OW_Language::getInstance()->text('googlelocation', 'widget_settings_map_zoom'),
            'value' => 2
        );
        
        $settingList['map_height'] = array(
            'presentation' => self::PRESENTATION_NUMBER,
            'label' => OW_Language::getInstance()->text('googlelocation', 'widget_settings_map_height'),
            'value' => 350
        );

        return $settingList;
    }

    public static function getStandardSettingValueList()
    {
        return array(
            self::SETTING_SHOW_TITLE => true,
            self::SETTING_WRAP_IN_BOX => true,
            self::SETTING_TITLE => OW_Language::getInstance()->text('googlelocation', 'widget_map_title'),
            self::SETTING_ICON => self::ICON_BOOKMARK
        );
    }

    public static function getAccess()
    {
        return self::ACCESS_ALL;
    }
    
    protected function getUserFields( array $userIdList )
    {
        $fields = array();

        $qs = array();

        $qBdate = BOL_QuestionService::getInstance()->findQuestionByName('birthdate');

        if ( $qBdate->onView )
        {
            $qs[] = 'birthdate';
        }

        $qSex = BOL_QuestionService::getInstance()->findQuestionByName('sex');

        if ( $qSex->onView )
        {
            $qs[] = 'sex';
        }

        $questionList = BOL_QuestionService::getInstance()->getQuestionData($userIdList, $qs);

        foreach ( $questionList as $uid => $question )
        {

            $fields[$uid] = '';

            $age = '';

            if ( !empty($question['birthdate']) )
            {
                $date = UTIL_DateTime::parseDate($question['birthdate'], UTIL_DateTime::MYSQL_DATETIME_DATE_FORMAT);

                $age = UTIL_DateTime::getAge($date['year'], $date['month'], $date['day']);
            }

            $sexValue = '';
            if ( !empty($question['sex']) )
            {
                $sex = $question['sex'];

                for ( $i = 0; $i < 31; $i++ )
                {
                    $val = pow(2, $i);
                    if ( (int) $sex & $val )
                    {
                        $sexValue .= BOL_QuestionService::getInstance()->getQuestionValueLang('sex', $val) . ', ';
                    }
                }

                if ( !empty($sexValue) )
                {
                    $sexValue = substr($sexValue, 0, -2);
                }
            }

            if ( !empty($sexValue) && !empty($age) )
            {
                $fields[$uid] =  $sexValue . ' ' . $age;
            }
        }

        return $fields;
    }
}