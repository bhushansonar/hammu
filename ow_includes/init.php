<?php

/**
 * EXHIBIT A. Common Public Attribution License Version 1.0
 * The contents of this file are subject to the Common Public Attribution License Version 1.0 (the “License�?);
 * you may not use this file except in compliance with the License. You may obtain a copy of the License at
 * http://www.oxwall.org/license. The License is based on the Mozilla Public License Version 1.1
 * but Sections 14 and 15 have been added to cover use of software over a computer network and provide for
 * limited attribution for the Original Developer. In addition, Exhibit A has been modified to be consistent
 * with Exhibit B. Software distributed under the License is distributed on an “AS IS�? basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language
 * governing rights and limitations under the License. The Original Code is Oxwall software.
 * The Initial Developer of the Original Code is Oxwall Foundation (http://www.oxwall.org/foundation).
 * All portions of the code written by Oxwall Foundation are Copyright (c) 2011. All Rights Reserved.

 * EXHIBIT B. Attribution Information
 * Attribution Copyright Notice: Copyright 2011 Oxwall Foundation. All rights reserved.
 * Attribution Phrase (not exceeding 10 words): Powered by Oxwall community software
 * Attribution URL: http://www.oxwall.org/
 * Graphic Image as provided in the Covered Code.
 * Display of Attribution Information is required in Larger Works which are defined in the CPAL as a work
 * which combines Covered Code or portions thereof with code not governed by the terms of the CPAL.
 */
require_once OW_DIR_ROOT . 'ow_includes/config.php';
require_once OW_DIR_ROOT . 'ow_includes/define.php';
require_once OW_DIR_UTIL . 'debug.php';
require_once OW_DIR_UTIL . 'string.php';
require_once OW_DIR_CORE . 'autoload.php';
require_once OW_DIR_CORE . 'exception.php';
require_once OW_DIR_INC . 'function.php';
require_once OW_DIR_CORE . 'ow.php';
require_once OW_DIR_CORE . 'plugin.php';

//field_d3d1470339c8d689ab705fd19a509655 - price
//field_1f7a64abe5ed89e1a64e8d51aa310de6 - metting point
//field_57ac08826af01889b5b6a9d876785eab - payment type
//field_8eb4e427b80ac66d870fc0a5a0cc22ba - IM_USING_HAMMU_AS
//field_f2d8bb949d7d74a70bcb2003abc5b436 - Search Preferences (CLIENT)
//field_f92bbdb57510b86ba6c506c487be3aa1 - services (ESCORT)
//1 = CLIENT
//2 = ESCORT
//define("HAMMU_DB_PRICE_KEY", "field_d3d1470339c8d689ab705fd19a509655");
define("HAMMU_DB_METTING_POINT_KEY", "field_1f7a64abe5ed89e1a64e8d51aa310de6");
define("HAMMU_DB_PRICE_KEY", "field_d3d1470339c8d689ab705fd19a509655");
define("HAMMU_DB_PAYMENT_TYPE_KEY", "field_2de34e86b2ea038c86f2b4b5be00811e");
define("HAMMU_DB_IM_USING_HAMMU_AS_KEY", "field_8eb4e427b80ac66d870fc0a5a0cc22ba");
define("HAMMU_DB_PREFRENCES_KEY", "field_f2d8bb949d7d74a70bcb2003abc5b436");
define("HAMMU_DB_SERVICES_KEY", "field_f92bbdb57510b86ba6c506c487be3aa1");
define("HAMMU_DB_MOBILE_NUMBER_KEY", "field_391797ad0e06d17d5b5cec0e48def7c2");
define("HAMMU_DB_FEMALE_KEY", "8cc28eaddb382d7c6a94aeea9ec029fb");
define("HAMMU_DB_MALE_KEY", "808aa8ca354f51c5a3868dad5298cd72");
define("HAMMU_DB_SHEMALE_KEY", "e11cbd81e1a1d2d95c4daec456283fef");
define("HAMMU_DB_GAY_KEY", "9007c7272b0ab03efa8a8c3f48ebf4de");
define("HAMMU_DB_LASBIAN_KEY", "90cc05c011e9247e7d5d47bf448a5393");
define("HAMMU_DB_OTHER_KEY", "b0bcdf16acf7690a620585bb1a920ebb");
define("HAMMU_AVAILABLE_KEY", "field_8f9ad4456cec46b60d708d5a29d2d50e");

define("HAMMU_HOTEL_SERVICE", "field_0740e3f8fd87c258fb72074b2d2eaa6e");
define("HAMMU_HOME_VISIT", "field_dfbd442c20a8e55fadcf1e3adaa59a0a");
define("HAMMU_SECRET_FANTASY", "field_f7773115c15b8705feec37c8723bb517");
define("HAMMU_LANGUAGE", "field_2f78eedfd02c0d0570729c622a4df542");
define("HAMMU_COUNTRY", "field_35a6e5cbe156226ab68c084a1580e5ee");
define("HAMMU_AVAILABLE_AT", "field_ea53a800f45986373496498f184e934b");
define("HAMMU_LANG", "field_c8d311c384f988c24fba0687b2f8803e");
//field_ea53a800f45986373496498f184e934b
//field_35a6e5cbe156226ab68c084a1580e5ee
//Hotel - 1
//Home - 2
//My place - 4
//field_35a6e5cbe156226ab68c084a1580e5ee

mb_internal_encoding('UTF-8');

if (OW_DEBUG_MODE) {
    ob_start();
}

spl_autoload_register(array('OW_Autoload', 'autoload'));

// adding standard package pointers
$autoloader = OW::getAutoloader();
$autoloader->addPackagePointer('OW', OW_DIR_CORE);
$autoloader->addPackagePointer('INC', OW_DIR_INC);
$autoloader->addPackagePointer('UTIL', OW_DIR_UTIL);
$autoloader->addPackagePointer('BOL', OW_DIR_SYSTEM_PLUGIN . 'base' . DS . 'bol');

// Force autoload of classes without package pointer
$classesToAutoload = array(
    'Form' => OW_DIR_CORE . 'form.php',
    'TextField' => OW_DIR_CORE . 'form_element.php',
    'HiddenField' => OW_DIR_CORE . 'form_element.php',
    'FormElement' => OW_DIR_CORE . 'form_element.php',
    'RequiredValidator' => OW_DIR_CORE . 'validator.php',
    'StringValidator' => OW_DIR_CORE . 'validator.php',
    'RegExpValidator' => OW_DIR_CORE . 'validator.php',
    'EmailValidator' => OW_DIR_CORE . 'validator.php',
    'UrlValidator' => OW_DIR_CORE . 'validator.php',
    'AlphaNumericValidator' => OW_DIR_CORE . 'validator.php',
    'IntValidator' => OW_DIR_CORE . 'validator.php',
    'FloatValidator' => OW_DIR_CORE . 'validator.php',
    'DateValidator' => OW_DIR_CORE . 'validator.php',
    'CaptchaValidator' => OW_DIR_CORE . 'validator.php',
    'RadioField' => OW_DIR_CORE . 'form_element.php',
    'CheckboxField' => OW_DIR_CORE . 'form_element.php',
    'Selectbox' => OW_DIR_CORE . 'form_element.php',
    'CheckboxGroup' => OW_DIR_CORE . 'form_element.php',
    'RadioField' => OW_DIR_CORE . 'form_element.php',
    'PasswordField' => OW_DIR_CORE . 'form_element.php',
    'Submit' => OW_DIR_CORE . 'form_element.php',
    'Button' => OW_DIR_CORE . 'form_element.php',
    'Textarea' => OW_DIR_CORE . 'form_element.php',
    'FileField' => OW_DIR_CORE . 'form_element.php',
    'TagsField' => OW_DIR_CORE . 'form_element.php',
    'SuggestField' => OW_DIR_CORE . 'form_element.php',
    'MultiFileField' => OW_DIR_CORE . 'form_element.php',
    'Multiselect' => OW_DIR_CORE . 'form_element.php',
    'CaptchaField' => OW_DIR_CORE . 'form_element.php',
    'InvitationFormElement' => OW_DIR_CORE . 'form_element.php',
    'Range' => OW_DIR_CORE . 'form_element.php'
);

OW::getAutoloader()->addClassArray($classesToAutoload);

if (defined("OW_URL_HOME")) {
    OW::getRouter()->setBaseUrl(OW_URL_HOME);
}

if (OW_PROFILER_ENABLE) {
    UTIL_Profiler::getInstance();
}

require_once OW_DIR_SYSTEM_PLUGIN . 'base' . DS . 'classes' . DS . 'file_log_writer.php';
require_once OW_DIR_SYSTEM_PLUGIN . 'base' . DS . 'classes' . DS . 'db_log_writer.php';
require_once OW_DIR_SYSTEM_PLUGIN . 'base' . DS . 'classes' . DS . 'err_output.php';

$errorManager = OW_ErrorManager::getInstance(OW_DEBUG_MODE);
$errorManager->setErrorOutput(new BASE_CLASS_ErrOutput());