<?php

/**
 * Copyright (c) 2014, Skalfa LLC
 * All rights reserved.
 * 
 * ATTENTION: This commercial software is intended for exclusive use with SkaDate Dating Software (http://www.skadate.com) and is licensed under SkaDate Exclusive License by Skalfa LLC.
 * 
 * Full text of this license can be found at http://www.skadate.com/sel.pdf
 */

function pcgallery_get_content( BASE_CLASS_EventCollector $event )
{
    $params = $event->getParams();

    if ( $params['placeName'] != "profile" )
    {
        return;
    }

    if ( !PCGALLERY_CLASS_PhotoBridge::getInstance()->isActive() )
    {
        return;
    }
    
    $cmp = new PCGALLERY_CMP_Gallery($params['entityId']);
    $event->add($cmp->render());
}

OW::getEventManager()->bind('base.widget_panel.content.top', 'pcgallery_get_content');
OW::getEventManager()->bind('base.widget_panel_customize.content.top', 'pcgallery_get_content');

function pcgallery_class_get_instance( OW_Event $event )
{
    $params = $event->getParams();

    if ( $params['className'] != 'BASE_CMP_ProfileActionToolbar' )
    {
        return;
    }

    if ( !PCGALLERY_CLASS_PhotoBridge::getInstance()->isActive() )
    {
        return;
    }
    
    $arguments = $params['arguments'];
    $cmp = new PCGALLERY_CMP_ProfileActionToolbarMock($arguments[0]);
    $event->setData($cmp);

    return $cmp;
}
OW::getEventManager()->bind('class.get_instance', 'pcgallery_class_get_instance');

PCGALLERY_CLASS_PhotoBridge::getInstance()->init();

function pcgallery_after_plugin_activate( OW_Event $e )
{
    $params = $e->getParams();
    $pluginKey = $params['pluginKey'];

    if ( $pluginKey != 'photo' )
    {
        return;
    }
    
    $widgetService = BOL_ComponentAdminService::getInstance();
    $widgetService->deleteWidget('BASE_CMP_UserAvatarWidget');
}
OW::getEventManager()->bind(OW_EventManager::ON_AFTER_PLUGIN_ACTIVATE, "pcgallery_after_plugin_activate");

function pcgallery_before_plugin_deactivate( OW_Event $e )
{
    $params = $e->getParams();
    $pluginKey = $params['pluginKey'];

    if ( $pluginKey != 'photo' )
    {
        return;
    }
    
    $widgetService = BOL_ComponentAdminService::getInstance();

    $widget = $widgetService->addWidget('BASE_CMP_UserAvatarWidget', false);
    $widgetPlace = $widgetService->addWidgetToPlace($widget, BOL_ComponentService::PLACE_PROFILE);

    try 
    {
        $widgetService->addWidgetToPosition($widgetPlace, BOL_ComponentService::SECTION_LEFT, 0);
    }
    catch ( Exception $e ) {}
}
OW::getEventManager()->bind(OW_EventManager::ON_BEFORE_PLUGIN_DEACTIVATE, "pcgallery_before_plugin_deactivate");