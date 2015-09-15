<?php

/**
 * Copyright (c) 2012, Oxwall CandyStore
 * All rights reserved.

 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.
 */
/**
 * /install.php
 *
 * @author Oxwall CandyStore <plugins@oxcandystore.com>
 * @package ow.ow_plugins.ocs_guests
 * @since 1.3.1
 */
$config = OW::getConfig();

if (!$config->configExists('skapi', 'store_period')) {
    $config->addConfig('skapi', 'store_period', 3, 'Guests visit period, months');
}

$sql = "CREATE TABLE IF NOT EXISTS `" . OW_DB_PREFIX . "skapi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `deviceId` VARCHAR(250) NOT NULL,
  `deviceType` VARCHAR(250) NOT NULL,
  `visitTimestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

OW::getDbo()->query($sql);

OW::getPluginManager()->addPluginSettingsRouteName('skapi', 'skapi.admin');

$path = OW::getPluginManager()->getPlugin('skapi')->getRootDir() . 'langs.zip';
BOL_LanguageService::getInstance()->importPrefixFromZip($path, 'skapi');
