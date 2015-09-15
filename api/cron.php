<?php

/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
/**
 * SkadateX intialization
 */
define('_OW_', true);
define('DS', DIRECTORY_SEPARATOR);
define('OW_DIR_ROOT', substr(dirname(__FILE__), 0, - strlen('api')));
require OW_DIR_ROOT . 'ow_includes' . DS . 'init.php';
if (!defined('OW_ERROR_LOG_ENABLE') || (bool) OW_ERROR_LOG_ENABLE) {
    $logFilePath = OW_DIR_LOG . 'error.log';
    $logger = OW::getLogger('ow_core_log');
    $logger->setLogWriter(new BASE_CLASS_FileLogWriter($logFilePath));
    $errorManager->setLogger($logger);
}
@include OW_DIR_ROOT . 'ow_install' . DS . 'install.php';
OW::getSession()->start();
$application = OW::getApplication();
if (OW_PROFILER_ENABLE || OW_DEV_MODE) {
    UTIL_Profiler::getInstance()->mark('before_app_init');
}
$application->init();
if (OW_PROFILER_ENABLE || OW_DEV_MODE) {
    UTIL_Profiler::getInstance()->mark('after_app_init');
}
$event = new OW_Event(OW_EventManager::ON_APPLICATION_INIT);
OW::getEventManager()->trigger($event);
$application->route();
$event = new OW_Event(OW_EventManager::ON_AFTER_ROUTE);
if (OW_PROFILER_ENABLE || OW_DEV_MODE) {
    UTIL_Profiler::getInstance()->mark('after_route');
}
OW::getEventManager()->trigger($event);
//$application->handleRequest();
//
//if (OW_PROFILER_ENABLE || OW_DEV_MODE) {
//    UTIL_Profiler::getInstance()->mark('after_controller_call');
//}
$event = new OW_Event(OW_EventManager::ON_AFTER_REQUEST_HANDLE);
OW::getEventManager()->trigger($event);
//$application->finalize();
/**
 * SkadateX intialization END
 */
$OWgetDbo = OW::getDbo();

//$app = \Slim\Slim::getInstance();
//$app->response->headers->set('Content-Type', 'application/json');
//$app->response->setStatus(200);
//mail("benno.leuenberger@teleport.ch", "cron testing", "cron file run->" . time());
$sql = "SELECT * FROM " . OW_DB_PREFIX . "invites_log WHERE (`action`='buy_rose_client' OR `action`='reject' OR `action`='escort_decline' OR `action`='escort_propose_date_decline') AND `noti_remove`='0' AND `flag`='1'";
$invite_log = $OWgetDbo->queryForList($sql);
$today = date("d-m-Y H:m:s");
$today_time = strtotime($today);
foreach ($invite_log as $key => $invite) {
    $data = json_decode($invite['data']);
    $expire_time = $data->date + 86400;
    if ($today_time > $expire_time) {
        $sql1 = "UPDATE ow_invites_log SET `noti_remove`='1' WHERE `inviterId`='{$invite['inviterId']}' AND `inviteeId`='{$invite['inviteeId']}'";
        $result = $OWgetDbo->update($sql1);
        if ($result) {

            $return_data = array('response_status' => "1", 'response_message' => "Notificaton deleted successfully!");
            mail("bhushan@amutechnologies.com", "cron testing", "cron file run in if statment->" . time() . "Query->" . $sql1);
        } else {
            $return_data = array('response_status' => "0", 'response_message' => "Notification not deleted or not exist!");
            mail("bhushan@amutechnologies.com", "cron testing", "cron file run in else statment->" . time());
        }
        json_encode($return_data);
        exit;
        //$app->response->setBody(json_encode($return_data));
    }
}
?>
