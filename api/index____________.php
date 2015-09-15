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
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
/**
 * Step 2: Instantiate a Slim application
 *
 *
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 *
 *
 *
 */
//$app = new \Slim\Slim();
$app = new \Slim\Slim();
//$baseJsDir = OW::getPluginManager()->getPlugin("base")->getStaticJsUrl();

$BOL_UserDao = BOL_UserDao::getInstance();
$ow_user = OW::getUser();
$OW_Auth_inst = OW_Auth::getInstance();
$Userservice = BOL_UserService::getInstance();
$BOL_AvatarService_inst = BOL_AvatarService::getInstance();
$SKAPI_BOL_Service_inst = SKAPI_BOL_Service::getInstance();
$PHOTO_BOL_PhotoService_inst = PHOTO_BOL_PhotoService::getInstance();
$PHOTO_BOL_PhotoAlbumService = PHOTO_BOL_PhotoAlbumService::getInstance();
$UserResetPassword = BOL_UserResetPasswordDao::getInstance();
$QuestionService = BOL_QuestionService::getInstance();
$AccountTypeToGenderService = SKADATE_BOL_AccountTypeToGenderService::getInstance();
$BOL_AuthorizationService = BOL_AuthorizationService::getInstance();
$BOL_UserOnlineDao = BOL_UserOnlineDao::getInstance();
$USEARCH_BOL_Service = USEARCH_BOL_Service::getInstance();
$BOL_SearchService = BOL_SearchService::getInstance();
$getPluginManager = OW::getPluginManager();
$getRouter = OW::getRouter();
$language = OW::getLanguage();
$getMailer = OW ::getMailer();
$getConfig = OW::getConfig();
$getFeedback = OW::getFeedback();
$getEventManager = OW::getEventManager();

$ow = OW_DB_PREFIX;
$QUESTION_PRESENTATION_DATE = BOL_QuestionService::QUESTION_PRESENTATION_DATE;
$QUESTION_PRESENTATION_RANGE = BOL_QuestionService::QUESTION_PRESENTATION_RANGE;
$QUESTION_PRESENTATION_BIRTHDATE = BOL_QuestionService::QUESTION_PRESENTATION_BIRTHDATE;
$QUESTION_PRESENTATION_AGE = BOL_QuestionService::QUESTION_PRESENTATION_AGE;
$QUESTION_PRESENTATION_DATE = BOL_QuestionService::QUESTION_PRESENTATION_DATE;
$QUESTION_VALUE_TYPE_DATETIME = BOL_QuestionService::QUESTION_VALUE_TYPE_DATETIME;
$QUESTION_VALUE_TYPE_SELECT = BOL_QuestionService::QUESTION_VALUE_TYPE_SELECT;
$QUESTION_PRESENTATION_SELECT = BOL_QuestionService::QUESTION_PRESENTATION_SELECT;
$QUESTION_PRESENTATION_RADIO = BOL_QuestionService::QUESTION_PRESENTATION_RADIO;
$QUESTION_PRESENTATION_MULTICHECKBOX = BOL_QuestionService::QUESTION_PRESENTATION_MULTICHECKBOX;
$QUESTION_PRESENTATION_URL = BOL_QuestionService::QUESTION_PRESENTATION_URL;
$QUESTION_PRESENTATION_TEXT = BOL_QuestionService::QUESTION_PRESENTATION_TEXT;
$QUESTION_PRESENTATION_TEXTAREA = BOL_QuestionService::QUESTION_PRESENTATION_TEXTAREA;
$MYSQL_DATETIME_DATE_FORMAT = UTIL_DateTime::MYSQL_DATETIME_DATE_FORMAT;
$USER_LIST_SIZE = BOL_SearchService:: USER_LIST_SIZE;
$SEARCH_RESULT_ID_VARIABLE = BOL_SearchService::SEARCH_RESULT_ID_VARIABLE;
$PARAM_OPTION_DEFAULT_VALUE = OW_Route::PARAM_OPTION_DEFAULT_VALUE;
$LIST_ORDER_MATCH_COMPATIBILITY = USEARCH_BOL_Service::LIST_ORDER_MATCH_COMPATIBILITY;
$LIST_ORDER_DISTANCE = USEARCH_BOL_Service::LIST_ORDER_DISTANCE;
$LIST_ORDER_LATEST_ACTIVITY = USEARCH_BOL_Service::LIST_ORDER_LATEST_ACTIVITY;
$LIST_ORDER_NEW = USEARCH_BOL_Service::LIST_ORDER_NEW;
$HAMMU_BOL_Service = HAMMU_BOL_Service::getInstance();
$language = OW::getLanguage();
$OWgetDbo = OW::getDbo();
//
//
//$getClassInstance = OW::getClassInstance('USEARCH_CLASS_QuickSearchForm');
//$formatBirthdate = UTIL_DateTime::formatBirthdate;
//$autoLink = UTIL_HtmlTag::autoLink;
//$parseDate = UTIL_DateTime::parseDate;
// POST route
//$app->post('/loginapp', 'loginapp');
//$app->post('/loginapp', 'loginapp');

$app->post('/login', 'login');
$app->post('/forgot_password', 'forgot_password');
$app->post('/getAllServices', 'getAllServices');
$app->post('/getAllServicesOrPreferences', 'getAllServicesOrPreferences');
$app->post('/getProfiledetails', 'getProfiledetails');

$app->post('/map', 'map');
$app->post('/listing', 'listing');
$app->post('/setProfiledetails', 'setProfiledetails');
$app->post('/quick_search', 'quick_search');
$app->post('/facebookLogin', 'facebookLogin');
$app->post('/advance_search', 'advance_search');
$app->post('/setProfilePic', 'setProfilePic');
$app->post('/sendInvites', 'sendInvites');
$app->post('/getInvitesLog', 'getInvitesLog');
$app->post('/acceptInvites', 'acceptInvites');
$app->post('/agreeInvites', 'agreeInvites');
$app->post('/roseInvites', 'roseInvites');
$app->post('/reArrageInvites', 'reArrageInvites');
$app->post('/countNotification', 'countNotification');
$app->post('/escort_notification_list', 'escort_notification_list');
$app->post('/client_notification_list', 'client_notification_list');
$app->post('/update_invite_log', 'update_invite_log');

//$app->post('/ignoreInvites', 'ignoreInvites');
//female:-8cc28eaddb382d7c6a94aeea9ec029fb
//price:-field_d3d1470339c8d689ab705fd19a509655
//services:- field_f92bbdb57510b86ba6c506c487be3aa1
//phone_number:-field_391797ad0e06d17d5b5cec0e48def7c2


function loginapp() {
    global $BOL_UserDao;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
//    echo $success = "1";
//    echo $username = $app->request()->params('user_id');
//    exit;
    $array = $BOL_UserDao->findUserByUsernameOrEmail($username);
    $result = array("result" => $username);
    $app->response->setBody(json_encode($result));
}

function login() {

    global $BOL_UserDao;
    global $ow_user;
    global $Userservice;
    global $BOL_AvatarService_inst;
    global $SKAPI_BOL_Service_inst;
    global $PHOTO_BOL_PhotoService_inst;
    global $OW_Auth_inst;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $username = $app->request()->params('username');
    $password = $app->request()->params('password');
    $token = $app->request()->params('token');
    $type = $app->request()->params('type');
    $deviceId = $token;
    $deviceType = $type;

    $email_check = $BOL_UserDao->findUserByUsernameOrEmail($username);
    $email_exits = count($email_check);

    if ($email_exits != '1') {
        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->setStatus(200);
        $messages = "Sorry!!!Your Username or Email doesnot matched.please try again";
        $return_data = array(
            "response_status" => '0',
            "response_message" => $messages,
        );

        $app->response->setBody(json_encode($return_data));
    } else {
        $result = $ow_user->authenticate(new BASE_CLASS_StandardAuth($username, $password));

        if (!$result->isValid()) {
            $messages = $result->getMessages();
            $messages = "Sorry!!! Your password doesnot match. Please try again";
            $return_data = array(
                "response_status" => '0',
                "response_message" => $messages,
            );
            $app->response->setBody(json_encode($return_data));
        } else {
            $token = $OW_Auth_inst->getAuthenticator()->getId();
            $tokenauth = new OW_TokenAuthenticator($token);
            $service = $PHOTO_BOL_PhotoService_inst;
            $user = $Userservice->findUserById($result->getUserId());
            $email = $user->getEmail();
            $account_type = $user->getAccountType();

            if ($account_type == "8cc28eaddb382d7c6a94aeea9ec029fb") {
                $sex = "lady";
            } else {
                $sex = "gentleman";
            }
            $username = $user->getUsername();
            $user_id = $result->getUserId();

            $avatars = $BOL_AvatarService_inst->getAvatarsUrlList(array($user_id));
            $reportedUser = $Userservice->findUserById($user_id);
            $id = $reportedUser->getId();
            $check_exist_value = $SKAPI_BOL_Service_inst->findValueExistOrNot($id);
            // echo "call 31";
            // print_r($check_exist_value);
            if ($check_exist_value) {
                $table_id = $check_exist_value[0]->id;
                if ($table_id) {
                    $user_skapi_id = $check_exist_value[0]->id;
                } else {
                    $user_skapi_id = "";
                }
            } else {
                $user_skapi_id = "";
            }

            $user_details = $SKAPI_BOL_Service_inst->createUserDetails($user_id, $deviceId, $deviceType, $user_skapi_id);
            $messages = "Login Successfully";
            $return_data = array(
                "response_status" => '1',
                "response_message" => $messages,
                "data" => array(
                    "user_id" => $user_id,
                    "user_name" => $username,
                    "email" => $email,
                    "profile_picture" => $avatars[$user_id],
                    "user_type" => $sex
                )
            );
            $app->response->setBody(json_encode($return_data));
        }
    }
}

function signup() {

    global $Userservice;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $email = $app->request()->params('email');
    $username = $app->request()->params('username');
    $password = $app->request()->params('password');
    $birthdate = $app->request()->params('birthdate');
    $address = $app->request()->params('address');
    $mobile = $app->request()->params('mobile');
    $i_am = $app->request()->params('i_am');
    $looking_for = $app->request()->params('looking_for');
    $preferences_or_services = $app->request()->params('preferences_or_services');
    //$photo = $app->request()->params('photo');
    $photo_data = $_FILES["photo"];
    $token = $app->request()->params('token');
    $type = $app->request()->params('type');
    $deviceId = $token;
    $deviceType = $type;





    $data = $_POST;
    checkuserexists($data);
    $email = trim($data['email']);
    $password = $data['password'];
    $username = $data['username'];
//        $tmpUsername = explode('@', $email);
//        $username = $tmpUsername[0];
    $username = trim(preg_replace('/[^\w]/', '', $username));
    $username = $this->makeUsername($username);
//extra question data
//        $data['realname'] = $username;
//
//        $accountype = (int) $data["sex"]; //(1 = Female, 2 = Male)
//
//        $data["sex"] = (int) $data["sex"];
//
//        $UserDob = date("Y/m/d", strtotime($data["birthdate"]));
//
//        $data["birthdate"] = $UserDob;
    $data['realname'] = $username;
    $newUser = false;
    try {
        $user = BOL_UserService::getInstance()->createUser($username, $password, $email, null, true);
        $newUser = true;
    } catch (LogicException $ex) {
        $userdata = array("status" => "false", "message" => "unsuccess", "error" => $ex->getCode());
        echo json_encode($userdata);
        exit();
    }

    unset($data['email']);
    unset($data['password']);
    unset($data['username']);

//Geo location settings on address
    if (!empty($data["address"])) {
        $urlencode_address = urlencode($data["address"]);
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
        $output = json_decode($geocode);
//echo print_r(json_encode($output->results));
        if (!empty($output->results[0]->formatted_address)) {
            $data['googlemap_location']['address'] = $output->results[0]->formatted_address;
            $data['googlemap_location']['latitude'] = $output->results[0]->geometry->location->lat;
            $data['googlemap_location']['longitude'] = $output->results[0]->geometry->location->lng;
            $data['googlemap_location']['northEastLat'] = $output->results[0]->geometry->bounds->northeast->lat;
            $data['googlemap_location']['northEastLng'] = $output->results[0]->geometry->bounds->northeast->lng;
            $data['googlemap_location']['southWestLat'] = $output->results[0]->geometry->bounds->southwest->lat;
            $data['googlemap_location']['southWestLng'] = $output->results[0]->geometry->bounds->southwest->lng;
            $data['googlemap_location']['json'] = json_encode($output->results[0]);
        }
    }
    BOL_QuestionService::getInstance()->saveQuestionsData(array_filter($data), $user->id);
//$avatarUrl = 'http://graph.facebook.com/' . $facebookId . '/picture?type=large&height=400&width=400';
//$pluginfilesDir = OW::getPluginManager()->getPlugin('skandroid')->getPluginFilesDir();
//$ext = 'jpg';
//$tmpFile = $pluginfilesDir . uniqid('avatar-') . (empty($ext) ? '' : '.' . $ext);
//copy($avatarUrl, $tmpFile);
//        if (file_exists($tmpFile)) {
//            BOL_AvatarService::getInstance()->setUserAvatar($user->id, $tmpFile);
//            @unlink($tmpFile);
//        }
//        if (!$authAdapter->isRegistered()) {
//            $authAdapter->register($user->id);
//        }
    if ($newUser) {
        $event = new OW_Event(OW_EventManager::ON_USER_REGISTER, array(
            'method' => 'native',
            'userId' => $user->id,
            'params' => array()
        ));
        OW::getEventManager()->trigger($event);
        $userdata = $this->respondUserData($user->id, $data);
    } else {
        $userdata = array("status" => "false", "message" => "unsuccess");
    }
    echo json_encode($userdata);
    exit();
}

function checkuserexists($data) {
    global $Userservice;

    $email = $data['email'];
    $username = $data['username'];

    $userService = $Userservice;
    $reportedUser_email = $userService->findByEmail($email);
    if ($reportedUser_email) {
        echo json_encode(array("message" => "unsuccess", "status" => "false", "error" => "email already exists!"));
        exit();
    }
    $reportedUser_username = $userService->findByUsername($username);
    if ($reportedUser_username) {
        echo json_encode(array("message" => "unsuccess", "status" => "false", "error" => "username already exists!"));
        exit();
    }
}

function facebookLogin() {
    //$data = $_POST;
    global $Userservice;
    global $QuestionService;
    global $getPluginManager;
    global $BOL_AvatarService_inst;
    global $getEventManager;

    $data = array();
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $facebookid = $app->request()->params('facebookid');

    $email = $app->request()->params('email');
    $sex = $app->request()->params('gender');
    $birthdate = $app->request()->params('birthdate');

    $token = $app->request()->params('token');
    $type = $app->request()->params('type');
    $deviceId = $token;
    $deviceType = $type;
    $facebookId = $facebookid;
//        $data = json_decode($params['data'], true);
//    $facebookId = (int) $data['facebookid'];
//    $email = (int) $data['email'];
//    echo "got her";
//    $authAdapter = new OW_RemoteAuthAdapter($facebookId, 'facebook');
    //echo "got her 2";
    $email = trim($email);

    $params = array("email" => $email, "deviceid" => $deviceId, "device_type" => $deviceType);

    $return_data = checkfacebookuserexists($params);
    //echo "got here 41";
    //print_r($return_data);
    if ($return_data) {
        // print_r($return_data);
        $app->response->setBody(json_encode($return_data));
        // exit();
    } else {
        //echo "got her 1";
        $password = uniqid();
        $tmpUsername = explode('@', $email);
        $username = $tmpUsername[0];
        $username = trim(preg_replace('/[^\w]/', '', $username));
        //echo "got her 2";
        $username = makeUsername($username);
        // echo "got her 3";
        $newUser = false;
        $data['realname'] = $username;

        $accountype = ($sex == "female") ? "8cc28eaddb382d7c6a94aeea9ec029fb" : "808aa8ca354f51c5a3868dad5298cd72"; //(int) $data["sex"]; //(1 = Female, 2 = Male)
        if ($accountype == "8cc28eaddb382d7c6a94aeea9ec029fb") {
            $sex = 2;
            $type = "services";
            $sex_type = "lady";
        } else {
            $type = "preferences";
            $sex = 1;
            $sex_type = "gentleman";
        }
        $data["sex"] = $sex; //$accountype;
        $UserDob = date("Y/m/d", strtotime($birthdate));
        $data["birthdate"] = $UserDob;
        // echo "got her 3 1";
        // echo "come";
        $user = $Userservice->createUser($username, $password, $email, $accountype, true);
        $newUser = true;


        // echo "got her 3 1 2";
//        if (!empty($data["address"])) {
//            $urlencode_address = urlencode($data["address"]);
//            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
//            $output = json_decode($geocode);
////echo print_r(json_encode($output->results));
//            if (!empty($output->results[0]->formatted_address)) {
//                $data['googlemap_location']['address'] = $output->results[0]->formatted_address;
//                $data['googlemap_location']['latitude'] = $output->results[0]->geometry->location->lat;
//                $data['googlemap_location']['longitude'] = $output->results[0]->geometry->location->lng;
//                $data['googlemap_location']['northEastLat'] = $output->results[0]->geometry->bounds->northeast->lat;
//                $data['googlemap_location']['northEastLng'] = $output->results[0]->geometry->bounds->northeast->lng;
//                $data['googlemap_location']['southWestLat'] = $output->results[0]->geometry->bounds->southwest->lat;
//                $data['googlemap_location']['southWestLng'] = $output->results[0]->geometry->bounds->southwest->lng;
//                $data['googlemap_location']['json'] = json_encode($output->results[0]);
//            }
//        }
//        echo "got here";
        $QuestionService->saveQuestionsData(array_filter($data), $user->id);

        $avatarUrl = 'http://graph.facebook.com/' . $facebookid . '/picture?type=large&height=400&width=400';
        //$pluginfilesDir = OW_DIR_ROOT;
        $pluginfilesDir = $getPluginManager->getPlugin('skapi')->getPluginFilesDir();
        $ext = 'jpg';
        $tmpFile = $pluginfilesDir . uniqid('avatar-') . (empty($ext) ? '' : '.' . $ext);
        // echo "cal copy";
        //move_uploaded_file($avatarUrl, $tmpFile);
        //  if (!file_exists($path)) {
        //mkdir($pluginfilesDir, 0777);
        chmod($pluginfilesDir, 0777);
        //  }
//        error_reporting(E_ALL);
//        ini_set('display_errors', true);
        //copy($avatarUrl, $tmpFile);
        @copy($avatarUrl, $tmpFile);
        //echo "failed to copy";
        if (file_exists($tmpFile)) {
            $BOL_AvatarService_inst->setUserAvatar($user->id, $tmpFile);
            //@unlink($tmpFile);
        }

        if ($newUser) {
            $event = new OW_Event(OW_EventManager::ON_USER_REGISTER, array(
                'method' => 'facebook',
                'userId' => $user->id,
                'params' => array(),
            ));
            $getEventManager->trigger($event);
        }
        //echo "suceees 3";
        //$userdata = $this->respondUserData($user->id, $data);
        //echo json_encode($userdata);
        //echo "got her 3 2 11";
        $avatars = $BOL_AvatarService_inst->getAvatarsUrlList(array($user->id));
        $messages = "Login Successfully";
        $return_data = array(
            "response_status" => '1',
            "response_message" => $messages,
            "data" => array(
                "user_id" => $user->id,
                "user_name" => $username,
                "email" => $email,
                "profile_picture" => $avatars[$user->id],
                "user_type" => $sex_type
            )
        );
        $app->response->setBody(json_encode($return_data));
    }
}

function makeUsername($username) {
    global $Userservice;
    $counter = 0;
    while ($Userservice->isExistUserName($username)) {
        $counter++;
        $username .= $counter;
    }

    return $username;
}

function checkfacebookuserexists($data) {

    global $Userservice;
    global $BOL_AvatarService_inst;
    global $SKAPI_BOL_Service_inst;
    global $ow_user;
//    $app = \Slim\Slim::getInstance();
//    $app->response->headers->set('Content-Type', 'application/json');
//    $app->response->setStatus(200);
    //  echo "call 1";
    $email = trim($data['email']);
    $deviceId = trim($data['deviceid']);
    $deviceType = trim($data['device_type']);
    //echo "call 2";
    $userService = $Userservice;
    $reportedUser_email = $userService->findByEmail($email);
    //print_r($reportedUser_email);
    $return_data = false;
    if ($reportedUser_email) {
        $return_data = array();
        $user_id = $reportedUser_email->getId();
        $avatar = $BOL_AvatarService_inst->getAvatarUrl($user_id);
//$respond = $this->respondUserData($userId);
        $ow_user->login($user_id);

        $reportedUser = $userService->findUserById($user_id);
        $id = $reportedUser->getId();
        $username = $reportedUser->getUsername();
        $email = $reportedUser->getEmail();
        $account_type = $reportedUser->getAccountType();

        if ($account_type == "8cc28eaddb382d7c6a94aeea9ec029fb") {
            $sex = "lady";
        } else {
            $sex = "gentleman";
        }
        // echo "our user->" . $id;
        $check_exist_value = $SKAPI_BOL_Service_inst->findValueExistOrNot($id);
        // echo "call 31";
        // print_r($check_exist_value);
        if ($check_exist_value) {
            $table_id = $check_exist_value[0]->id;
            if ($table_id) {
                $user_skapi_id = $check_exist_value[0]->id;
            } else {
                $user_skapi_id = "";
            }
        } else {
            $user_skapi_id = "";
        }

        $user_details = $SKAPI_BOL_Service_inst->createUserDetails($id, $deviceId, $deviceType, $user_skapi_id);
////$assigns['userUrl'] = OW_URL_HOME . 'user/' . $reportedUser->getUsername();
//        if (!empty($avatar)) {
//            $userdata = array("status" => "true", "message" => "Success", "userid" => $id, "username" => $username, "email" => $email, "image" => $avatar, "action" => "login");
////$userdata = array("id" => $id, "email" => $email, "username" => $username, "avatar" => $avatar, "message" => "success in login! Alrady registered user!", "status" => "true", "action" => "login");
//        } else {
//            $userdata = array("status" => "true", "message" => "Success", "userid" => $id, "username" => $username, "email" => $email, "action" => "login");
////$userdata = array("id" => $id, "email" => $email, "username" => $username, "message" => "success in login! Alrady registered user!", "status" => "true", "action" => "login");
//        }
//        echo json_encode($userdata);
//        exit();
        // echo "call 3";
        $messages = "Login Successfully";
        $return_data = array(
            "response_status" => '1',
            "response_message" => $messages,
            "data" => array(
                "user_id" => $id,
                "user_name" => $username,
                "email" => $email,
                "profile_picture" => $avatar,
                "user_type" => $sex
            )
        );
        //print_r($return_data);
        //$app->response->setBody(json_encode($return_data));
        return $return_data;
    }
}

function forgot_password() {

    global $Userservice;
    global $UserResetPassword;
    global $getRouter;
    global $language;
    global $getMailer;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $email = $app->request()->params('email');
    $user = $Userservice->findByEmail($email);

    if (empty($user)) {
        $messages = "There is no user with this email address";
        $return_data = array(
            "response_status" => '0',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    } else {
        $resetPassword = $Userservice->findResetPasswordByUserId($user->getId());
        if ($resetPassword !== null) {
            if ($resetPassword->getUpdateTimeStamp() > time()) {
                $messages = "Reset Code Already Sent.Please try again in 10 minutes.";
                $return_data = array(
                    "response_status" => '0',
                    "response_message" => $messages,
                );
                $app->response->setBody(json_encode($return_data));
            } else {
                $resetPassword->setUpdateTimeStamp($resetPassword->getUpdateTimeStamp() + 600);
                $UserResetPassword->save($resetPassword);
            }
        } else {
            $resetPassword = $Userservice->getNewResetPassword($user->getId());
        }
        $vars = array('code' => $resetPassword->getCode(), 'username' => $user->getUsername(), 'requestUrl' => $getRouter->urlForRoute('base.reset_user_password_request'),
            'resetUrl' => $getRouter->urlForRoute('base.reset_user_password', array('code' => $resetPassword->getCode())));
        $mail = $getMailer->createMail();
        $mail->addRecipientEmail($email);
        $mail->setSubject($language->text('base', 'reset_password_mail_template_subject'));
        $mail->setTextContent($language->text('base', 'reset_password_mail_template_content_txt', $vars));
        $mail->setHtmlContent($language->text('base', 'reset_password_mail_template_content_html', $vars));
        $getMailer->send($mail);
        $messages = "The information on changing and confirming your new password sent to your email.";
        $return_data = array
            (
            "response_status" => '1',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    }
}

function map() {

    global $Userservice;
    global $QuestionService;
    global $BOL_AvatarService_inst;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $location = $app->request()->params('location');
    $urlencode_address = urlencode($location);

    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);

    if (!empty($output->results[0]->geometry->location->lng)) {
        $data_location['googlemap_location']['address'] = $output->results[0]->formatted_address;
        $data_location['googlemap_location']['latitude'] = $output->results[0]->geometry->location->lat;
        $data_location['googlemap_location']['longitude'] = $output->results[0]->geometry->location->lng;
        $data_location['googlemap_location']['northEastLat'] = $output->results[0]->geometry->viewport->northeast->lat;
        $data_location['googlemap_location']['northEastLng'] = $output->results[0]->geometry->viewport->northeast->lng;
        $data_location['googlemap_location']['southWestLat'] = $output->results[0]->geometry->viewport->southwest->lat;
        $data_location['googlemap_location']['southWestLng'] = $output->results[0]->geometry->viewport->southwest->lng;
        $data_location['googlemap_location']['json'] = json_encode($output->results[0]);
        $data_location['googlemap_location']['distance'] = 10;
        $data_location['accountType'] = "8cc28eaddb382d7c6a94aeea9ec029fb";

        $userIdList = $Userservice->findUserIdListByQuestionValues($data_location, 0, BOL_SearchService::USER_LIST_SIZE);

        if (!empty($userIdList)) {
            if (($key = array_search($user_id, $userIdList)) !== false) {
                unset($userIdList[$key]);
            }
            $user_ids = array_values($userIdList);
            $userinfoData = array();
            $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'googlemap_location'));
            $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
            $onlineStatus = $Userservice->findOnlineStatusForUserList($user_ids);
            $user_info = array();
            foreach ($userinfoData as $key => $user) {
                $user_info[] = array(
                    "latitude" => $user["googlemap_location"]["latitude"],
                    "longitude" => $user["googlemap_location"]["longitude"],
                    "id" => $key,
                    "image_path" => $avatar[$key]["src"],
                    "lady_name" => $user["username"],
//            "birthdate" => date("Y/m/d", strtotime($user["birthdate"])),
//            "online" => (!empty($onlineStatus[$key]) ? 1 : 0),
                );
            }
            $data_array = array("location" => $user_info, 'user_type' => "gentleman");
            $return_data = array("response_status" => "1", "response_message" => "Successfully", "data" => $data_array);
            $app->response->setBody(json_encode($return_data));
        } else {
            $return_data = array("response_status" => "0", "response_message" => "Fail to get your location Please try again");
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $return_data = array("response_status" => "0", "response_message" => "unSuccessfully Please try again");
        $app->response->setBody(json_encode($return_data));
    }
}

function advance_search() {
    global $USEARCH_BOL_Service;
    global $Userservice;
    global $BOL_SearchService;
    global $BOL_UserOnlineDao;
    global $ow;
    global $PARAM_OPTION_DEFAULT_VALUE;
    global $BOL_AuthorizationService;
    global $SEARCH_RESULT_ID_VARIABLE;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $location = $app->request()->params('location');
    $match_sex = $app->request()->params('match_sex');
    $sex = $app->request()->params('sex');
    $distance = $app->request()->params('miles_from');
    $online = $app->request()->params('online');
    $age_min = $app->request()->params('age_min');
    $age_max = $app->request()->params('age_max');
    $with_photo = $app->request()->params('with_photo');
    $realname = $app->request()->params('realname');
    $urlencode_address = urlencode($location);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);
    if (!empty($output->results[0]->geometry->location->lng)) {
        $data_location['address'] = $output->results[0]->formatted_address;
        $data_location['latitude'] = $output->results[0]->geometry->location->lat;
        $data_location['longitude'] = $output->results[0]->geometry->location->lng;
        $data_location['northEastLat'] = $output->results[0]->geometry->viewport->northeast->lat;
        $data_location['northEastLng'] = $output->results[0]->geometry->viewport->northeast->lng;
        $data_location['southWestLat'] = $output->results[0]->geometry->viewport->southwest->lat;
        $data_location['southWestLng'] = $output->results[0]->geometry->viewport->southwest->lng;
        $data_location['json'] = json_encode($output->results[0]);
        $data_location['distance'] = $distance;
        $data_arr = array("form_name" => "MainSearchForm", "sex" => $sex, "match_sex" => $match_sex, "with_photo" => $with_photo, "googlemap_location" => $data_location, "birthdate" => array("from" => $age_min, "to" => $age_max), "realname" => $realname, "MainSearchFormSubmit" => "Search");
//        print_r($data_arr);
//        die;
        $data = $USEARCH_BOL_Service->updateSearchData($data_arr);
        $addParams = array('join' => '', 'where' => '');
        if (!empty($data['online'])) {
            $addParams['join'] .= " INNER JOIN `" . $BOL_UserOnlineDao->getTableName() . "` `online` ON (`online`.`userId` = `user`.`id`) ";
        }
        if (!empty($data['with_photo'])) {
            $addParams['join'] .= " INNER JOIN `" . OW_DB_PREFIX . "base_avatar` avatar ON (`avatar`.`userId` = `user`.`id`) ";
        }
        // echo "call";
//        print_r($data);
//        die;
        $userIdList = $Userservice->findUserIdListByQuestionValues($data, 0, 500, false, $addParams);
        //print_r($userIdList);
        $listId = 0;
//        if (OW::getUser()->isAuthenticated()) {
//            foreach ($userIdList as $key => $id) {
//                if (OW::getUser()->getId() == $id) {
//                    unset($userIdList[$key]);
//                }
//            }
//        }
        if (count($userIdList) > 0) {
            //$listId = $BOL_SearchService->saveSearchResult($userIdList);
            $listId = $BOL_SearchService->saveSearchResult($userIdList);
            OW::getSession()->set($SEARCH_RESULT_ID_VARIABLE, $listId);
            OW::getSession()->set('usearch_search_data', $data);
            $BOL_AuthorizationService->trackAction('base', 'search_users');
            $serach_result = searchResult(array('orderType' => array($PARAM_OPTION_DEFAULT_VALUE => 'latest_activity')), $listId);
            $messages = "Searching Successfully";
            $return_data = array(
                "response_status" => '1',
                "response_message" => $messages,
                "data" => $serach_result,
            );
            return $app->response->setBody(json_encode($return_data));
        } else {
            $messages = "Sorry!!! No people found.Please try a different search for more results..";
            $return_data = array(
                "response_status" => '0',
                "response_message" => $messages,
            );
            return $app->response->setBody(json_encode($return_data));
        }
    }
}

function getAllServicesOrPreferences() {
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $filed_array = array('field_f2d8bb949d7d74a70bcb2003abc5b436', 'field_f92bbdb57510b86ba6c506c487be3aa1');
    $all_services_preferences = getallquestions(array("user_id" => $user_id, "fields" => $filed_array));
    $app->response->setBody(json_encode($all_services_preferences));
}

function getAllServices() {

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $filed_array = array('field_f92bbdb57510b86ba6c506c487be3aa1');
    $all_services_preferences = getallquestionsForservices(array("fields" => $filed_array));
    $app->response->setBody(json_encode($all_services_preferences));
}

function getallquestionsForservices($param) {
    global $QuestionService;
    global $AccountTypeToGenderService;
    global $QUESTION_PRESENTATION_RANGE;
    global $QUESTION_PRESENTATION_BIRTHDATE;
    global $QUESTION_PRESENTATION_AGE;
    global $QUESTION_PRESENTATION_DATE;
    $fields = $param["fields"];
    $account_type = 2;
    $accountType = $AccountTypeToGenderService->getAccountType($account_type);
    $questionNames = array();
    $questionNames[] = "sex";
    foreach ($QuestionService->findSignUpQuestionsForAccountType($accountType) as $question) {
        $questionNames[] = $question['name'];
    }
    $questionList = $QuestionService->findQuestionByNameList($questionNames);
    $sectionNameList = array();
    foreach ($questionList as $question) {
        if (!in_array($question->sectionName, $sectionNameList)) {
            $sectionNameList[] = $question->sectionName;
        }
    }
    $sectionList = $QuestionService->findSectionBySectionNameList($sectionNameList);
    usort($questionList, function( $a, $b ) use ($sectionList) {
        $sectionNameA = $a->sectionName;
        $sectionNameB = $b->sectionName;
        if ($sectionNameA === $sectionNameB) {
            return ((int) $a->sortOrder < (int) $b->sortOrder) ? -1 : 1;
        }
        if (!isset($sectionList [$sectionNameA]) || !isset($sectionList[$sectionNameB])) {
            return 1;
        }
        return((int) $sectionList[$sectionNameA]->sortOrder < (int) $sectionList[$sectionNameB
                ]->sortOrder) ? -1 : 1;
    });
    $questionOptions = $QuestionService->findQuestionsValuesByQuestionNameList($questionNames);
    $questions = $category = array();
    foreach ($questionList as $question) {
        if (in_array($question->name, $fields)) {
            $custom = json_decode($question->custom, true);
            $value = null;
            switch ($question->presentation) {
                case $QUESTION_PRESENTATION_RANGE :
                    $value = '18-33';
                    break;
                case $QUESTION_PRESENTATION_BIRTHDATE :
                case $QUESTION_PRESENTATION_AGE :
                case $QUESTION_PRESENTATION_DATE :
                    $value = date('Y-m-d H:i:s', strtotime('-18 year'));
                    break;
            }
            if (!isset($category[$question->sectionName])) {
                $category[$question->sectionName] = array(
                    'category' => $question->sectionName,
                    'label' => $QuestionService->getSectionLang($question->sectionName)
                );
            }
            $questions[] = array(
                'name' => $question->name,
                'label' => $QuestionService->getQuestionLang($question->name),
                'presentation' => $question->name == 'googlemap_location' ? $question->name : $question->presentation,
                'options' => formatOptionsForQuestion($question->name, $questionOptions),
                'value' => $value,
                'required' => $question->required
            );
        }
    }
    return $questions;
}

function quick_search() {

    global $language;
//global $getClassInstance;
    global $ow_user;
    global $getFeedback;
    global $BOL_AuthorizationService;
    global $BOL_UserOnlineDao;
    global $USEARCH_BOL_Service;
    global $Userservice;
    global $BOL_SearchService;
    global $USER_LIST_SIZE;
    global $SEARCH_RESULT_ID_VARIABLE;
//global $getRouter;
    global $ow;
    global $PARAM_OPTION_DEFAULT_VALUE;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $location = $app->request()->params('location');
    $match_sex = $app->request()->params('match_sex');
    $sex = $app->request()->params('sex');
    $distance = $app->request()->params('miles_from');
    $online = $app->request()->params('online');
    $age_min = $app->request()->params('age_min');
    $age_max = $app->request()->params('age_max');
    $with_photo = $app->request()->params('with_photo');
    $urlencode_address = urlencode($location);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);
    if (!empty($output->results[0]->geometry->location->lng)) {
        $data_location['address'] = $output->results[0]->formatted_address;
        $data_location['latitude'] = $output->results[0]->geometry->location->lat;
        $data_location['longitude'] = $output->results[0]->geometry->location->lng;
        $data_location['northEastLat'] = $output->results[0]->geometry->viewport->northeast->lat;
        $data_location['northEastLng'] = $output->results[0]->geometry->viewport->northeast->lng;
        $data_location['southWestLat'] = $output->results[0]->geometry->viewport->southwest->lat;
        $data_location['southWestLng'] = $output->results[0]->geometry->viewport->southwest->lng;
        $data_location['json'] = json_encode($output->results[0]);
        $data_location['distance'] = $distance;
        $data = array(
            "form_name" => "QuickSearchForm",
            "birthdate" => array(
                "from" => $age_min,
                "to" => $age_max
            ),
            "googlemap_location" => $data_location,
            "sex" => $sex,
            "match_sex" => $match_sex,
            "online" => $online,
            "with_photo" => $with_photo,
        );
//        print_r($data);
//        die;
        $lang = $language;
        if (!empty($data['match_sex'])) {
            $data['match_sex'] = $data['match_sex'];
            // echo "ca;;";
            OW::getSession()->set(USEARCH_CLASS_QuickSearchForm::FORM_SESSEION_VAR, $data);
        }
// if ($isValid) {
//        if (!$ow_user->isAuthorized('base', 'search_users')) {
//            $status = $BOL_AuthorizationService->getActionStatus('base', 'search_users');
//            $getFeedback->warning($status['msg']);
//            exit(json_encode(array('result' => false, 'error' => $status['msg'])//$lang->text('base', 'user_search_authorization_warning'))
//            ));
//        }
        $addParams = array('join' => '', 'where' => '');
        if ($data['online']) {
            $addParams['join'] .= " INNER JOIN `" . $BOL_UserOnlineDao->getTableName() . "` `online` ON (`online`.`userId` = `user`.`id`) ";
        }
//        if ($data['with_photo']) {
//            $addParams['join'] .= " INNER JOIN `" . $ow . "base_avatar` avatar ON (`avatar`.`userId` = `user`.`id`) ";
//        }
        $data = $USEARCH_BOL_Service->updateSearchData($data);
        $data = $USEARCH_BOL_Service->updateQuickSearchData($data);
//        if ($data["accountType"] == "8cc28eaddb382d7c6a94aeea9ec029fb") {
//            $data["accountType"] = "808aa8ca354f51c5a3868dad5298cd72";
//        } else {
//            $data["accountType"] = "8cc28eaddb382d7c6a94aeea9ec029fb";
//        }
        //$data["accountType"]
        // print_r($data);
        $userIdList = $Userservice->findUserIdListByQuestionValues($data, 0, $USER_LIST_SIZE, false, $addParams);
//        echo "<pre>";
//        print_r($userIdList);
//        exit;
        $listId = 0;
        if (count($userIdList) > 0) {
            $listId = $BOL_SearchService->saveSearchResult($userIdList);
            OW::getSession()->set($SEARCH_RESULT_ID_VARIABLE, $listId);
            OW::getSession()->set('usearch_search_data', $data);
            $BOL_AuthorizationService->trackAction('base', 'search_users');
            $serach_result = searchResult(array('orderType' => array($PARAM_OPTION_DEFAULT_VALUE => 'latest_activity')), $listId);
            $messages = "Searching Successfully";
            $return_data = array(
                "response_status" => '1',
                "response_message" => $messages,
                "data" => $serach_result,
            );
            return $app->response->setBody(json_encode($return_data));
        } else {
            $messages = "Sorry!!! No people found.Please try a different search for more results.";
            $return_data = array(
                "response_status" => '0',
                "response_message" => $messages,
            );
            return $app->response->setBody(json_encode($return_data));
        }
    }
}

function searchResult($params, $listId) {
    global $SEARCH_RESULT_ID_VARIABLE;
    global $LIST_ORDER_MATCH_COMPATIBILITY;
    global $LIST_ORDER_DISTANCE;
    global $BOL_SearchService;
    global $USEARCH_BOL_Service;
    global $ow_user;
    global $QuestionService;
    global $PHOTO_BOL_PhotoService_inst;
    global $BOL_AvatarService_inst;
    global $Userservice;
    $listId = OW::getSession()->get($SEARCH_RESULT_ID_VARIABLE);
    $page = (!empty($_GET['page']) && intval($_GET['page']) > 0 ) ? $_GET['page'] : 1;
    $orderType = getOrderType($params);
//bhushan changes
    if (!$ow_user->isAuthenticated()) {
        if (in_array($orderType, array($LIST_ORDER_MATCH_COMPATIBILITY, $LIST_ORDER_DISTANCE))) {
            throw new Redirect404Exception();
        }
//    }
//end bhushan changes
        $limit = 16;
        $itemCount = $BOL_SearchService->countSearchResultItem($listId);
        $list = $USEARCH_BOL_Service->getSearchResultList($listId, $orderType, ($page - 1) * $limit, $limit);
        foreach ($list as $key => $list_id) {
            $ids[] = $list_id->id;
        }
        $user_ids = array_values($ids);
        $single_id = $user_ids[0];
        $userinfoData = array();
        $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'googlemap_location', 'field_f92bbdb57510b86ba6c506c487be3aa1', 'field_d3d1470339c8d689ab705fd19a509655'));
        $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
        $onlineStatus = $Userservice->findOnlineStatusForUserList($user_ids);
        $user_info = array();
        foreach ($userinfoData as $key => $user) {
            $dob = date("Y/m/d", strtotime($user["birthdate"]));
            $age = ageCalculate($dob);
            $userKeyId = $key;
            $photoService = $PHOTO_BOL_PhotoService_inst;
            $photos = $photoService->findPhotoListByUserId($userKeyId, 1, 500);
            $service = null;
            $service_name = null;
            $price = null;
            if (array_key_exists("field_f92bbdb57510b86ba6c506c487be3aa1", $user)) {
                $service = renderQuestion($key, "field_f92bbdb57510b86ba6c506c487be3aa1");
                $service_name = renderQuestion($key, "field_f92bbdb57510b86ba6c506c487be3aa1", true);
            }
            if (array_key_exists("field_d3d1470339c8d689ab705fd19a509655", $user)) {
                $price = $user["field_d3d1470339c8d689ab705fd19a509655"];
            }
            $user_data[] = array(
                "user_id" => $key,
                "user_name" => $user["username"],
                "profile_picture" => $avatar[$key]["src"],
                "available" => (!empty($onlineStatus[$key]) ? "Online" : "Offline"),
                "age" => "$age",
                "prices" => $price,
                "services" => $service,
                "services_name" => $service_name,
                "location" => array("latitude" => $user["googlemap_location"]["latitude"],
                    "longitude" => $user["googlemap_location"] ["longitude"],
                ),
                "image" => $photos,
            );
        }
//    $return_data = array($user_data, $all_services);
        return $user_data;
    }
}

function getOrderType($params) {
    global $USEARCH_BOL_Service;
    global $LIST_ORDER_LATEST_ACTIVITY;
    $orderTypes = $USEARCH_BOL_Service->getOrderTypes();
    $orderType = !empty($params[
                    'orderType']) ? $params['orderType'] : $LIST_ORDER_LATEST_ACTIVITY;
    if (empty($orderTypes)) {
        $orderType = $LIST_ORDER_LATEST_ACTIVITY;
    } else if (!in_array($orderType, $orderTypes)) {
        $orderType = reset($orderTypes);
    }
    return $orderType;
}

function listing() {
    global $Userservice;
    global $QuestionService;
    global $BOL_AvatarService_inst;
    global $PHOTO_BOL_PhotoService_inst;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $location = $app->request()->params('location');
    $urlencode_address = urlencode($location);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);
    if (!empty($output->results[0]->geometry->location->lng)) {
        $data_location['googlemap_location']['address'] = $output->results[0]->formatted_address;
        $data_location['googlemap_location']['latitude'] = $output->results[0]->geometry->location->lat;
        $data_location['googlemap_location']['longitude'] = $output->results[0]->geometry->location->lng;
        $data_location['googlemap_location']['northEastLat'] = $output->results[0]->geometry->viewport->northeast->lat;
        $data_location['googlemap_location']['northEastLng'] = $output->results[0]->geometry->viewport->northeast->lng;
        $data_location['googlemap_location']['southWestLat'] = $output->results[0]->geometry->viewport->southwest->lat;
        $data_location['googlemap_location']['southWestLng'] = $output->results[0]->geometry->viewport->southwest->lng;
        $data_location['googlemap_location']['json'] = json_encode($output->results[0]);
        $data_location['accountType'] = "8cc28eaddb382d7c6a94aeea9ec029fb";

        $userIdList = $Userservice->findUserIdListByQuestionValues($data_location, 0, BOL_SearchService::USER_LIST_SIZE);

        if (!empty($userIdList)) {
            if (($key = array_search($user_id, $userIdList) ) !== false) {
                unset($userIdList[$key]);
            }
            $user_ids = array_values($userIdList);
            $userinfoData = array();
            $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'googlemap_location', 'field_f92bbdb57510b86ba6c506c487be3aa1', 'field_d3d1470339c8d689ab705fd19a509655'));

            $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
            $onlineStatus = $Userservice->findOnlineStatusForUserList($user_ids);
            $user_info = array();
            foreach ($userinfoData as $key => $user) {
                $dob = date("Y/m/d", strtotime($user["birthdate"]));
                $age = ageCalculate($dob);
                $userKeyId = $key;
                $photoService = $PHOTO_BOL_PhotoService_inst;
                $photos = $photoService->findPhotoListByUserId($userKeyId, 1, 500);
                $service = null;
                $service_name = null;
                $price = null;
                if (array_key_exists("field_f92bbdb57510b86ba6c506c487be3aa1", $user)) {
                    $service = renderQuestion($key, "field_f92bbdb57510b86ba6c506c487be3aa1");
                    $service_name = renderQuestion($key, "field_f92bbdb57510b86ba6c506c487be3aa1", true);
                }
                if (array_key_exists("field_d3d1470339c8d689ab705fd19a509655", $user)) {
                    $price = $user["field_d3d1470339c8d689ab705fd19a509655"];
                }
                $user_data[] = array(
                    "user_id" => $key,
                    "user_name" => $user["username"],
                    "profile_picture" => $avatar[$key]["src"],
                    "available" => (!empty($onlineStatus[$key]) ? "Online" : "Offline"),
                    "age" => "$age",
                    "prices" => $price,
                    "services" => $service,
                    "services_name" => $service_name,
                    "location" => array("latitude" => $user["googlemap_location"]["latitude"],
                        "longitude" => $user["googlemap_location"] ["longitude"],
                    ), "image" => $photos,);
            }
            $return_data = array("response_status" => "1", "response_message" => "Successfully", "data" => $user_data);
            $app->response->setBody(json_encode($return_data));
        } else {
            $return_data = array("response_status" => "0", "response_message" => "Fail to get your location Please try again");
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $return_data = array("response_status" => "0", "response_message" => "unSuccessfully Please try again");
        $app->response->setBody(json_encode($return_data));
    }
}

function getProfiledetails() {
    global $Userservice;
    global $QuestionService;
    global $BOL_AvatarService_inst;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $user_ids = array($user_id);
    if (!empty($user_ids)) {
        $userinfoData = array();
        $user = $Userservice->findUserById($user_id);
        if (!empty($user)) {

            $account = $user->getAccountType();
            if ($account == "8cc28eaddb382d7c6a94aeea9ec029fb") {
                $sex = "lady";
                $type = "services";
            } else {
                $type = "preferences";
                $sex = "gentleman";
            }
            $filed = array('field_f2d8bb949d7d74a70bcb2003abc5b436', 'field_f92bbdb57510b86ba6c506c487be3aa1');
            $all_services_preferences = getallquestions(array("user_id" => $user_id, "fields" => $filed));
            $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'birthdate', 'email', 'googlemap_location', 'field_f92bbdb57510b86ba6c506c487be3aa1', 'field_e9795a9d3be797f58aab38b1033265a4', 'field_391797ad0e06d17d5b5cec0e48def7c2'));
            $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
            if (!empty($all_services_preferences)) {
                foreach ($all_services_preferences as $key => $user_services_preferences) {
                    foreach ($userinfoData as $key => $user) {
                        $phone_number = Null;
                        if (!empty($user["field_391797ad0e06d17d5b5cec0e48def7c2"])) {
                            $phone_number = $user["field_391797ad0e06d17d5b5cec0e48def7c2"];
                        }
                        $dob = date("d-m-Y", strtotime($user["birthdate"]));
                        $user_data = array(
                            "user_id" => $key,
                            "email" => $user["email"],
                            "user_name" => $user["username"],
                            "address" => !empty($user["googlemap_location"]["address"]) ? $user["googlemap_location"]["address"] : "",
                            "phone_number" => $phone_number,
                            "birthdate" => $dob,
                            "profile_picture" => $avatar[$key]["src"],
                            $type => $user_services_preferences['userSelectedLabel'],
                        );
                    }
                }
                $return_data = array("response_status" => "1", "response_message" => "Successfully", "data" => $user_data);
                $app->response->setBody(json_encode($return_data));
            } else {

                $return_data = array("response_status" => "0", "response_message" => "Sorry!! Please provide correct data");
                $app->response->setBody(json_encode($return_data));
            }
        } else {

            $return_data = array("response_status" => "0", "response_message" => "Fail to get your location Please try again");
            $app->response->setBody(json_encode($return_data));
        }
    }
}

function setProfiledetails() {

    global $QuestionService;
    global $Userservice;
    global $QUESTION_PRESENTATION_RANGE;
    global $QUESTION_PRESENTATION_BIRTHDATE;
    global $QUESTION_PRESENTATION_AGE;
    global $QUESTION_PRESENTATION_DATE;
    global $QUESTION_PRESENTATION_MULTICHECKBOX;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $user_id = $app->request()->params('user_id');
    $username = $app->request()->params('username');
    $phone_number = $app->request()->params('phone_number');
    $filed_array = array('username', 'birthdate', 'email', 'googlemap_location', 'preference_or_services', 'field_391797ad0e06d17d5b5cec0e48def7c2');
    $data = array();
    $location = $app->request()->params('googlemap_location');
    $urlencode_address = urlencode($location);

    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);
    $isusernameexist = $Userservice->isExistUserName($username);
    if ($isusernameexist) {
        $return_data = array("response_status" => "0", "response_message" => "Sorry! Username already exists!");
        $app->response->setBody(json_encode($return_data));
    } else {
        if ($output->status == "OK") {

            $data_location = $output->results[0]->formatted_address;

            foreach ($filed_array as $fileds) {
                $post_val = $app->request()->params($fileds);

                if (!empty($post_val)) {
                    $data[$fileds] = $app->request()->params($fileds);
                }
            }

            $data['googlemap_location'] = $data_location;
            $data['field_391797ad0e06d17d5b5cec0e48def7c2'] = $phone_number;
            if (empty($user_id)) {
                $return_data = array("status" => "false", "message" => "unsuccess", "error" => "Please provide user id!");
                $app->response->setBody(json_encode($return_data));
            }

            $data_save = array();
            $user_id = (int) $user_id;
            $user = $Userservice->findUserById($user_id);

            if (!empty($user)) {

                $account = $user->getAccountType();
                if ($account == "8cc28eaddb382d7c6a94aeea9ec029fb") {
                    //$type = "services";
                    $type_value = "field_f92bbdb57510b86ba6c506c487be3aa1";
                } else {

                    //$type = "preferences";
                    $type_value = "field_f2d8bb949d7d74a70bcb2003abc5b436";
                }
            }
//            print_r($data);
//            die;
            foreach ($data as $key => $value) {
                if (in_array($key, $filed_array)) {
                    if (!empty($value)) {
                        if ($key == "preference_or_services") {
                            $key_set = $type_value;
                        } else {
                            $key_set = $key;
                        }
                        $question = $QuestionService->findQuestionByName($key_set);

                        switch ($question->presentation) {
                            case $QUESTION_PRESENTATION_RANGE :
                            case $QUESTION_PRESENTATION_BIRTHDATE :
                            case $QUESTION_PRESENTATION_AGE :
                            case $QUESTION_PRESENTATION_DATE :
                                $value = date('Y-m-d H:i:s', strtotime($value));
                                break;
                            case $QUESTION_PRESENTATION_MULTICHECKBOX:
//$value = array();
                                $value = explode(",", $value);
                                break;
                            default :
                                $value = $value;
                        }
                        //print_r($value);
                        $data_save[$key_set] = $value;
                    }
                }
            }
            // print_r($data_save);
            //die;
            $updated = $QuestionService->saveQuestionsData(array_filter($data_save), $user_id);
            // print_r($updated);
            if ($updated) {
                $messages = "Your profile has been updated!";
                $return_data = array
                    (
                    "response_status" => '1',
                    "response_message" => $messages,
                );


//$return_data = array("id" => $id, "username" => $username, "message" => "Profile updated with success!", "status" => "true");
            } else {
                $return_data = array("response_status" => "0", "response_message" => "Please provide proper Profile data!");
            }
            $app->response->setBody(json_encode($return_data));
        } else {
            $return_data = array("response_status" => "0", "response_message" => "Please Provide Valid Location!");
            $app->response->setBody(json_encode($return_data));
        }
    }
}

function generatePhotoList($photos) {
    global $Userservice;
    global $PHOTO_BOL_PhotoAlbumService;
    list($userIds, $userUrlList, $albumIdList, $albumUrlList, $displayNameList, $albumNameList, $entityIdList) = array_fill(0, 7, array());
//$photoService = PHOTO_BOL_PhotoDao::getInstance();
    if ($photos) {
        foreach ($photos as $key => $photo) {
            $userIds[] = $photo['userId'];
            $albumIdList[] = $photo['albumId'];
            $entityIdList[] = $photo['id'];
// $photos[$key]['photourl'] = $photoService->getPhotoUrl($ photos[" id"], $photo["hash"], true);
            $photos[$key]['description'] = UTIL_HtmlTag::autoLink($photos[$key]['description']);
        }
        $displayNameList = $Userservice->getDisplayNamesForList($userIds);
        foreach (($usernameList = $Userservice->getUserNamesForList($userIds)) as $id => $username) {
            $userUrlList[$id] = $Userservice->getUserUrlForUsername($username);
        }
        $photoAlbumService = $PHOTO_BOL_PhotoAlbumService;
        foreach (($albumNameList = $photoAlbumService->findAlbumNameListByIdList($albumIdList)) as $id => $album) {
            $albumUrlList[$id] = OW::getRouter()->urlForRoute('photo_user_album', array('user' => $usernameList[$album['userId']], 'album' => $id));
        }
    }
    $data = array();
    foreach ($photos as $key => $photo) {
        $data[] = array(
            "photoId" => $photo["id"],
            "hash" => $photo["hash"],
            "albumId" => $photo["albumId"],
            "albumname" => $albumNameList[$photo["albumId"]]["nam e"],
            "description" => $photo["description"],
            "url" => $photo["url"],
            "addDatetime" => date("Y/m/d", $photo["addDatetime"]),
        );
    }
    return array("data" => $data);
}

function ageCalculate($dob) {
    if (!empty($dob)) {
        $birthdate = new DateTime($dob);
        $today = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    } else {
        return 0;
    }
}

function getallquestions($param) {

    global $QuestionService;
    global $AccountTypeToGenderService;
    global $BOL_AvatarService_inst;
    global $QUESTION_PRESENTATION_RANGE;
    global $QUESTION_PRESENTATION_BIRTHDATE;
    global $QUESTION_PRESENTATION_AGE;
    global $QUESTION_PRESENTATION_DATE;
    global $Userservice;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $fields = $param["fields"];
    $user_id = $param["user_id"];

    if (empty($user_id)) {
        $return_data = array("message" => "Please provide User id!", "status" => "false");
        $app->response->setBody(json_encode($return_data));
    }
    $user = $Userservice->findUserById($user_id);
    if (!empty($user)) {
        $account = $user->getAccountType();
        if ($account == "8cc28eaddb382d7c6a94aeea9ec029fb") {
//        $sex = "lady";
            $account_type = 2;
        } else {
            $account_type = 1;
//$sex = "gentleman";
        }
        $accountType = $AccountTypeToGenderService->getAccountType($account_type);
        $questionNames = array();
        $questionNames[] = "sex";
        foreach ($QuestionService->findSignUpQuestionsForAccountType($accountType) as $question) {
            $questionNames[] = $question['name'];
        }
        $questionList = $QuestionService->findQuestionByNameList($questionNames);
        $sectionNameList = array();

        foreach ($questionList as $question) {
            if (!in_array($question->sectionName, $sectionNameList)) {
                $sectionNameList[] = $question->sectionName;
            }
        }
        $sectionList = $QuestionService->findSectionBySectionNameList($sectionNameList);

        usort($questionList, function( $a, $b ) use ($sectionList) {
            $sectionNameA = $a->sectionName;
            $sectionNameB = $b->sectionName;
            if ($sectionNameA === $sectionNameB) {
                return ((int) $a->sortOrder < (int) $b->sortOrder) ? -1 : 1;
            }
            if (!isset($sectionList [$sectionNameA]) || !isset($sectionList[$sectionNameB])) {
                return 1;
            }
            return((int) $sectionList[$sectionNameA]->sortOrder < (int) $sectionList[$sectionNameB
                    ]->sortOrder) ? -1 : 1;
        });
        $questionOptions = $QuestionService->findQuestionsValuesByQuestionNameList($questionNames);

        $questions = $category = array();

        foreach ($questionList as $question) {
            if (in_array($question->name, $fields)) {
                $custom = json_decode($question->custom, true);
                $value = null;
                switch ($question->presentation) {
                    case $QUESTION_PRESENTATION_RANGE :
                        $value = '18-33';
                        break;
                    case $QUESTION_PRESENTATION_BIRTHDATE :
                    case $QUESTION_PRESENTATION_AGE :
                    case $QUESTION_PRESENTATION_DATE :
                        $value = date('Y-m-d H:i:s', strtotime('-18 year'));
                        break;
                }
                if (!isset($category[$question->sectionName])) {
                    $category[$question->sectionName] = array(
                        'category' => $question->sectionName,
                        'label' => $QuestionService->getSectionLang($question->sectionName)
                    );
                }

                $questions[] = array(
// 'id' => $question->id,
                    'name' => $question->name,
                    'label' => $QuestionService->getQuestionLang($question->name),
                    //  'custom' => $custom,
                    'presentation' => $question->name == 'googlemap_location' ? $question->name : $question->presentation,
                    'options' => formatOptionsForQuestion($question->name, $questionOptions),
                    'value' => $value,
                    //'rawValue' => $value,
                    'userSelectedValue' => renderQuestion($user_id, $question->name),
                    'userSelectedLabel' => renderQuestion($user_id, $question->name, true),
                    // 'sectionName' => $question->sectionName,
                    'required' => $question->required
                );
            }
        }

        if (in_array('avatar', $fields)) {
            $avatar = $BOL_AvatarService_inst->getAvatarUrl($user_id);
// $questions[] = array('name' => "avatar", "userSelectedValue" => $avatar);
            $questions[] = array(
// 'id' => $question->id,
                'name' => "avatar",
                'label' => "Avatar",
                //
                'custom' => $custom,
                'presentation' => "upload",
                'options' => array(),
                'value' => null,
                //
                'rawValue' => $value,
                'userSelectedValue' => $avatar,
                'userSelectedLabel' => "Avatar",
                'required' => "0"
            );
        }
        return $questions;
    }
}

function renderQuestion($userId, $questionName, $label = false) {
    global $QuestionService;
    global $language;
    global $getConfig;
    global $QUESTION_PRESENTATION_SELECT;
    global $QUESTION_PRESENTATION_RADIO;
    global $QUESTION_PRESENTATION_MULTICHECKBOX;
    global $QUESTION_PRESENTATION_URL;
    global $QUESTION_PRESENTATION_TEXT;
    global $QUESTION_PRESENTATION_TEXTAREA;
    global $QUESTION_PRESENTATION_DATE;
    global $QUESTION_VALUE_TYPE_DATETIME;
    global $QUESTION_VALUE_TYPE_SELECT;
    global $QUESTION_PRESENTATION_BIRTHDATE;
    global $QUESTION_PRESENTATION_AGE;
    global $QUESTION_PRESENTATION_RANGE;
    global $MYSQL_DATETIME_DATE_FORMAT;
    $questionData = $QuestionService->getQuestionData(array($userId), array($questionName));
    if (!isset($questionData[$userId][$questionName])) {
        return null;
    }
    $question = $QuestionService->findQuestionByName($questionName);
    switch ($question->presentation) {
        case $QUESTION_PRESENTATION_DATE:
            $format = $getConfig->getValue('base', 'date_field_format');
            $value = 0;
            switch ($question->type) {
                case $QUESTION_VALUE_TYPE_DATETIME:
                    $date = UTIL_DateTime::parseDate($questionData[$userId
                                    ] [$question->name]
                                    , $MYSQL_DATETIME_DATE_FORMAT);
                    $value = $date;
                    break;
                case $QUESTION_VALUE_TYPE_SELECT:
                    $value = (int) $questionData[$userId][$question->name];
                    break;
            }
            if ($format === 'dmy') {
                $questionData[$userId][$question->name] = date("d/m/Y", $value);
            } else {
                $questionData[$userId][$question->name] = date("m/d/Y", $value);
            }
            break;
        case $QUESTION_PRESENTATION_BIRTHDATE:
            $date = UTIL_DateTime::parseDate($questionData[$userId] [$question->name], $MYSQL_DATETIME_DATE_FORMAT);
            $questionData[$userId][$question->name] = UTIL_DateTime:: formatBirthdate($date['year'], $date['month'], $date['day']);
            break;
        case $QUESTION_PRESENTATION_AGE:
            $date = UTIL_DateTime::parseDate($questionData[$userId] [$question->name], $MYSQL_DATETIME_DATE_FORMAT);
            $questionData[$userId][$question->name] = date("Y/m/d", strtotime($date ['year'] . "/" . $date ['month'] . "/" . $date['day']));
            break;
        case $QUESTION_PRESENTATION_RANGE:
            $range = explode('-', $questionData[$userId][$question->name]);
            $questionData[$userId][$question->name] = $language->text('base', 'form_element_from') . " " . $range[0] . " " . $language->text('base', 'form_element_to') . " " . $range[1];
            break;
        case $QUESTION_PRESENTATION_SELECT:
        case $QUESTION_PRESENTATION_RADIO:
        case $QUESTION_PRESENTATION_MULTICHECKBOX:
            $value = "";
            $multicheckboxValue = (int) $questionData[$userId][$question->name];
            $questionValues = $QuestionService->findQuestionValues($question->name);
            foreach ($questionValues as $val) {
                /* @var $val BOL_QuestionValue */
                if (( (int) $val->value ) & $multicheckboxValue) {
                    if ($label == false) {
                        if (strlen($value) > 0) {
                            $value .= ',';
                        }
                        $value .= $val->value; //$language->text('base', 'questions_question_' . $question->name . '_value_' . ($val->value));
                    } else {
                        if (strlen($value) > 0) {
                            $value .= ',';
// $value .= '@@';
                        }
// $QuestionService = $QuestionService;
                        $value .= $QuestionService->getQuestionValueLang($question->name, $val->value); //$language->text('base', 'questions_question_' . $question->name . '_value_' . ($val->value));
                    }
                }
            }
            if (strlen($value) > 0) {
                $questionData[$userId][$question->name] = $value;
            }
            break;
        case $QUESTION_PRESENTATION_URL:
        case $QUESTION_PRESENTATION_TEXT:
        case $QUESTION_PRESENTATION_TEXTAREA:
// googlemap_location shortcut
            if ($question->name == "googlemap_location" && !empty($questionData[$userId][$question->name]) && is_array($questionData[$userId][$question->name])) {
                $mapData = $questionData[$userId][$question->name];
                $value = trim($mapData["address"]);
            } else {
                $value = trim($questionData[$userId][$question->name]);
            }
            if (strlen($value) > 0) {
                $questionData[$userId][$question->name] = UTIL_HtmlTag::autoLink(nl2br($value));
            }
            break;
        default :
            $questionData[$userId][$question->name] = null;
    }
    return $questionData[$userId][
            $question->name];
}

function formatOptionsForQuestion($name, $allOptions) {
    global $QuestionService;
    $options = array();
    $questionService = $QuestionService;
    if (!empty($allOptions[$name])) {
        $optionList = array();
        foreach ($allOptions[$name]['values'] as $option) {
            $optionList[] = array(
                'label' => $questionService->getQuestionValueLang($option->questionName, $option->value),
                'value' => $option->value
            );
        }
        $allOptions[$name]['values'] = $optionList;
        $options = $allOptions[$name];
    }
    return $options;
}

function setProfilePic() {
    global $BOL_AvatarService_inst;


    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $userId = $app->request()->params('user_id');

    //$userId = $data["userId"];
    $files = $_FILES; //PHOTO_BOL_PhotoService::getInstance()->getPhotoPath($data["photoId"], $data["hash"], 'original');

    $path = $_FILES['photo']['tmp_name'];

    $status = $BOL_AvatarService_inst->setUserAvatar($userId, $path);
    // print_r($status);
    if ($status) {
        $avatar = $BOL_AvatarService_inst->getAvatarUrl($userId);
        $return_data = array("response_status" => "1", "response_message" => "profile photo uploaded with success!", "avatar" => $avatar);
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Please provide proper Profile data!");
        $app->response->setBody(json_encode($return_data));
    }
}

function sendInvites() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->inviteRequest($inviterId, $inviteeId);
    if (count($rarray) > 0) {
        $timestamp = $rarray["timestamp"];
        $date = date("Y/m/d H:i", $timestamp);
        $inviteeUsername = $Userservice->getUserName($inviteeId);
        $message = $language->text('hammu', 'invitation_sent', array('user' => $inviteeUsername, "date" => $date));
        $return_data = array("response_status" => "1", "response_message" => "Invitation sent!", "log_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation not sent or already sent!");
        $app->response->setBody(json_encode($return_data));
    }
}

function acceptInvites() {
    global $HAMMU_BOL_Service;
    global $language;


    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $date = $app->request()->params("date");
    $timestamp = strtotime($date);
    $array_data = array('escort_time' => $timestamp);
    $newtimestamp = json_encode($array_data);
    $rarray = $HAMMU_BOL_Service->accept($inviterId, $inviteeId, $newtimestamp, $timestamp);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Invitation accept!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation not accept or already accept!");
        $app->response->setBody(json_encode($return_data));
    }
}

function agreeInvites() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->agree($inviterId, $inviteeId);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Invitation agree!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation not agree or already agree!");
        $app->response->setBody(json_encode($return_data));
    }
}

function reArrageInvites() {
    global $HAMMU_BOL_Service;
    global $language;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->invite_re_arrange($inviterId, $inviteeId);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Invitation Re-Arrange!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation not Re-Arrange or already Re-Arrange!");
        $app->response->setBody(json_encode($return_data));
    }
}

function roseInvites() {
    global $HAMMU_BOL_Service;
    global $language;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->invite_rose($inviterId, $inviteeId);

    if (count($rarray) > 0) {
        $return_data = array("response_status" => "1", "response_message" => "Invitation Buy Rose!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation not Buy Rose or already Buy Rose!");
        $app->response->setBody(json_encode($return_data));
    }
}

function getInvitesLog() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->findListByCrossIds($inviterId, $inviteeId);
    $datas = json_decode(json_encode($rarray, true), true);
//    print_r($datas);
//    die;
    $return_array = array();
    foreach ($datas as $key => $data) {

        $inviteeUsername = $Userservice->getUserName($data["inviteeId"]);
        $date = date("Y/m/d H:i", $data["timestamp"]);
        $time = date("H:i", $data["timestamp"]);
        $message = $language->text('hammu', $data["action"], array('user' => $inviteeUsername, "date" => $date, "time" => $time));

        $return_array[] = array(
            "message" => $message,
        );
    }
    $return_data = array("response_status" => "1", "data" => $return_array);
    $app->response->setBody(json_encode($return_data));
}

function countNotification() {

    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $sql = "SELECT COUNT(*) as notification_count FROM " . OW_DB_PREFIX . "invites_log
                        WHERE `flag` = '0'";
    $result = $OWgetDbo->queryForList($sql);
    if (!empty($result)) {
        $notification_count = $result[0]['notification_count'];
        $return_data = array("response_status" => "1", "data" => $notification_count);
    } else {
        $return_data = array("response_status" => "0", "data" => "No Data Available");
    }

    $app->response->setBody(json_encode($return_data));
}

function escort_notification_list() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    //$inviteeId = $app->request()->params("inviteeId");
    $inviteeId_loop = null;
    //$user_infos;
    $rarray = $HAMMU_BOL_Service->findEscortListByIds($inviterId);
    $datas = json_decode(json_encode($rarray, true), true);
//    print_r($datas);
//    die;
    $return_array = array();
    foreach ($datas as $key => $data) {

        $inviteeUsername = $Userservice->getUserName($data["inviterId"]);
        $date = date("Y/m/d H:i", $data["timestamp"]);
        $time = date("H:i", $data["timestamp"]);
        $message = $language->text('hammu', $data["action"] . "_noti", array('user' => $inviteeUsername, "date" => $date, "time" => $time));

        if ($data["action"] == "invitation_sent") {
            $flag = "accept";
        }
        if ($inviteeId_loop != $data["inviteeId"]) {
            $inviteeId_loop = $data["inviteeId"];
            $user_infos = getUserInfo($inviteeId_loop);
        }

        $return_array[] = array(
            "message" => $message,
            "id" => $data["id"],
            "data" => $data["data"],
            "flag" => $flag,
            "seen_unseen" => $data["flag"],
            "inviteeId" => $data["inviteeId"],
            "user_info" => $user_infos,
            "date" => date("Y/m/d H:i", $data["timestamp"]),
        );
    }

    $return_data = array("response_status" => "1", "data" => $return_array);
    $app->response->setBody(json_encode($return_data));
}

function client_notification_list() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
//    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->findClientListByIds($inviterId);
    $datas = json_decode(json_encode($rarray, true), true);
//    print_r($datas);
//    die;
    $return_array = array();
    $inviteeId_loop = null;
    $user_infos;
    foreach ($datas as $key => $data) {

        $inviteeUsername = $Userservice->getUserName($data["inviteeId"]);
        $date = date("Y/m/d H:i", $data["timestamp"]);
        $time = date("H:i", $data["timestamp"]);
        $message = $language->text('hammu', $data["action"] . "_noti", array('user' => $inviteeUsername, "date" => $date, "time" => $time));
        if ($data["action"] == "invitation_accept") {
            $flag = "agree";
        } else if ($data["action"] == "buy_rose") {
            $flag = "buy_rose";
        }
        if ($inviteeId_loop != $data["inviteeId"]) {
            $inviteeId_loop = $data["inviteeId"];
            $user_infos = getUserInfo($inviteeId_loop);
        }

        $return_array[] = array(
            "message" => $message,
            "id" => $data["id"],
            "data" => $data["data"],
            "flag" => $flag,
            "seen_unseen" => $data["flag"],
            "inviteeId" => $data["inviteeId"],
            "user_info" => $user_infos,
            "date" => date("Y/m/d H:i", $data["timestamp"]),
        );
    }
    $return_data = array("response_status" => "1", "data" => $return_array);
    $app->response->setBody(json_encode($return_data));
}

function update_invite_log() {
    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $Id = $app->request()->params("id");

    $data_to_store = array(
        "flag" => "1",
        "id" => $Id
    );
    $object = (object) $data_to_store;

    $result = $OWgetDbo->updateObjectCustom("ow_invites_log", $object);

//    if (!empty($result)) {
//        $return_data = array("response_status" => "1", "data" => "Update Successfully");
//    } else {
//        $return_data = array("response_status" => "0", "data" => "Not Update");
//    }
//    $app->response->setBody(json_encode($return_data));
}

function getUserInfo($userId) {
    // echo "call ->" . $userId;
    global $BOL_AvatarService_inst;
    global $Userservice;
    global $QuestionService;
    $user_data = array();
    $user_account = $Userservice->findUserById($userId);
    if (!empty($user_account)) {

        $account = $user_account->getAccountType();
        if ($account == "8cc28eaddb382d7c6a94aeea9ec029fb") {
            $sex = "lady";
            $type = "services";
        } else {
            $type = "preferences";
            $sex = "gentleman";
        }
    }
    //$userInfo = $BOL_AvatarService_inst->getDataForUserAvatars(array($userId));

    $filed = array('field_f2d8bb949d7d74a70bcb2003abc5b436', 'field_f92bbdb57510b86ba6c506c487be3aa1');
    $all_services_preferences = getallquestions(array("user_id" => $userId, "fields" => $filed));
    // echo "userid-->" . $userId;
    $userinfoData = $QuestionService->getQuestionData(array($userId), array('id', 'username', 'birthdate', 'email', 'googlemap_location', 'field_f92bbdb57510b86ba6c506c487be3aa1', 'field_e9795a9d3be797f58aab38b1033265a4', 'field_391797ad0e06d17d5b5cec0e48def7c2', 'field_d3d1470339c8d689ab705fd19a509655'));
    //print_r($userinfoData);
    $avatar = $BOL_AvatarService_inst->getDataForUserAvatars(array($userId));

    foreach ($all_services_preferences as $key => $user_services_preferences) {
        $user["field_d3d1470339c8d689ab705fd19a509655"] = NULL;
        // print_r($userinfoData);
        foreach ($userinfoData as $key => $user) {
            // print_r($user);

            $phone_number = Null;
            if (!empty($user["field_391797ad0e06d17d5b5cec0e48def7c2"])) {
                $phone_number = $user["field_391797ad0e06d17d5b5cec0e48def7c2"];
            }
            $dob = date("d-m-Y", strtotime($user["birthdate"]));
            $user_data = array(
                "user_id" => $key,
                "email" => $user["email"],
                "user_name" => $user["username"],
                "address" => !empty($user["googlemap_location"]["address"]) ? $user["googlemap_location"]["address"] : "",
                "phone_number" => $phone_number,
                "birthdate" => $dob,
                "profile_picture" => $avatar[$key]["src"],
                "price" => !empty($user["field_d3d1470339c8d689ab705fd19a509655"]) ? $user["field_d3d1470339c8d689ab705fd19a509655"] : "",
                $type => $user_services_preferences['userSelectedLabel'],
            );
        }
    }
//    echo "<pre>";
//    print_r($user_data);
//    exit;
//    $usersInfo['avatars'][$userId] = $userInfo[$userId]['src'];
//    $usersInfo['urls'][$userId] = $userInfo[$userId]['url'];
//    $usersInfo['names'][$userId] = $userInfo[$userId]['title'];
//    $usersInfo['roleLabels'][$userId] = array(
//        'label' => $userInfo[$userId]['label'],
//        'labelColor' => $userInfo[$userId]['labelColor']
//    );
//
//    $user = array(
//        'id' => $userId,
//        'avatarUrl' => $usersInfo['avatars'][$userId],
//        'name' => $usersInfo['names'][$userId],
//    );

    return $user_data;
}

/**
  Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
?>


