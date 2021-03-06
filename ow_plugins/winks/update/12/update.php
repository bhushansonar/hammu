<?php

/**
 * Copyright (c) 2014, Skalfa LLC
 * All rights reserved.
 *
 * ATTENTION: This commercial software is intended for exclusive use with SkaDate Dating Software (http://www.skadate.com) and is licensed under SkaDate Exclusive License by Skalfa LLC.
 *
 * Full text of this license can be found at http://www.skadate.com/sel.pdf
 */


$keysToDelete = array(
    'winks+wink_send_email_subject'
);


foreach ( $keysToDelete as $key )
{
    $keyArr = explode('+', $key);

    try
    {
        Updater::getLanguageService()->deleteLangKey($keyArr[0], $keyArr[1]);
    }
    catch ( Exception $e )
    {
        $logger->addEntry(json_encode($e));
    }
}

Updater::getLanguageService()->importPrefixFromZip(dirname(__FILE__) . DS . 'langs.zip', 'winks');
