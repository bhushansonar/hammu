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
$EmailVerifyService = BOL_EmailVerifyService::getInstance();
$BOL_AvatarService_inst = BOL_AvatarService::getInstance();
$SKAPI_BOL_Service_inst = SKAPI_BOL_Service::getInstance();
$PHOTO_BOL_PhotoService_inst = PHOTO_BOL_PhotoService::getInstance();
$PHOTO_BOL_PhotoAlbumService = PHOTO_BOL_PhotoAlbumService::getInstance();
$PHOTO_BOL_PhotoTemporaryService = PHOTO_BOL_PhotoTemporaryService::getInstance();
$UserResetPassword = BOL_UserResetPasswordDao::getInstance();
$QuestionService = BOL_QuestionService::getInstance();
$AccountTypeToGenderService = SKADATE_BOL_AccountTypeToGenderService::getInstance();
$BOL_AuthorizationService = BOL_AuthorizationService::getInstance();
$BOL_UserOnlineDao = BOL_UserOnlineDao::getInstance();
$USEARCH_BOL_Service = USEARCH_BOL_Service::getInstance();
$BOL_SearchService = BOL_SearchService::getInstance();
$getPluginManager = OW::getPluginManager();
$CONTACTUS_BOL_Service = CONTACTUS_BOL_Service::getInstance();
$PHOTO_BOL_PhotoService = PHOTO_BOL_PhotoService ::getInstance();
$PHOTO_BOL_PhotoAlbumCoverDao = PHOTO_BOL_PhotoAlbumCoverDao::getInstance();
$PHOTO_BOL_PhotoDao = PHOTO_BOL_PhotoDao::getInstance();
$getRouter = OW::getRouter();
$language = OW::getLanguage();
$getMailer = OW ::getMailer();
$getConfig = OW::getConfig();
$getFeedback = OW::getFeedback();
$getEventManager = OW::getEventManager();
$getMailer = OW::getMailer();
$ow = OW_DB_PREFIX;
$LanguageService = BOL_LanguageService::getInstance();
$OW_Language = OW_Language::getInstance();
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
$SKADATE_BOL_AccountTypeToGenderDao = SKADATE_BOL_AccountTypeToGenderDao::getInstance();
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
$app->post('/listing', 'listing');
$app->post('/setProfiledetails', 'setProfiledetails');
$app->post('/advance_search', 'advance_search');
$app->post('/setProfilePic', 'setProfilePic');
$app->post('/sendInvites', 'sendInvites');
$app->post('/getClientInvitesLog', 'getClientInvitesLog');
$app->post('/getEscortInvitesLog', 'getEscortInvitesLog');
$app->post('/acceptInvites', 'acceptInvites');
$app->post('/proposeDateInvitation', 'proposeDateInvitation');
//$app->post('/roseInvites', 'roseInvites');
$app->post('/reArrageInvites', 'reArrageInvites');
$app->post('/escortCountNotification', 'escortCountNotification');
$app->post('/clientCountNotification', 'clientCountNotification');
$app->post('/escort_notification_list', 'escort_notification_list');
$app->post('/client_notification_list', 'client_notification_list');
$app->post('/update_invite_log', 'update_invite_log');
$app->post('/signup', 'signup');
$app->post('/getAccountType', 'getAccountType');
$app->post('/getAllSexData', 'getAllSexData');
$app->post('/getPrivcyPolicy', 'getPrivcyPolicy');
$app->post('/getWhatIsHAMMU', 'getWhatIsHAMMU');
$app->post('/emailCodeAuthentication', 'emailCodeAuthentication');
$app->post('/resendEmailVerify', 'resendEmailVerify');
$app->post('/getTermOfUse', 'getTermOfUse');
$app->post('/contactUs', 'contactUs');
$app->post('/check_available', 'check_available');
$app->post('/findCurrentOnlineStutus', 'findCurrentOnlineStutus');
$app->post('/update_invitation', 'update_invitation');
$app->post('/paypal', 'paypal');
$app->post('/favorite', 'favorite');
$app->post('/getFavoriteList', 'getFavoriteList');
$app->post('/escortDeclineInvites', 'escortDeclineInvites');
$app->post('/clientDeclineInvites', 'clientDeclineInvites');
$app->post('/signOut', 'signOut');
$app->post('/acceptProposeDate', 'acceptProposeDate');
$app->post('/escortProposeDateDecline', 'escortProposeDateDecline');
//$app->post('/getLocation', 'getLocation');
$app->post('/uploadPhoto', 'uploadPhoto');
$app->post('/multipleUploadPhoto', 'multipleUploadPhoto');
$app->post('/getGallary', 'getGallary');
$app->post('/deletePhoto', 'deletePhoto');
$app->post('/notification_count_update', 'notification_count_update');
$app->post('/resetPassword', 'resetPassword');
$app->post('/changePassword', 'changePassword');
$app->post('/deleteNotification', 'deleteNotification');
$app->post('/getTermOfUseLink', 'getTermOfUseLink');

function loginapp() {
    global $BOL_UserDao;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
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
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $username = $app->request()->params('username');
    $password = $app->request()->params('password');
    $token = $app->request()->params('token');
    $type = $app->request()->params('type');

    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end

    $deviceId = $token;
    $deviceType = $type;
    $email_check = $BOL_UserDao->findUserByUsernameOrEmail($username);
    $email_exits = count($email_check);
    if ($email_exits != '1') {
        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->setStatus(200);
        $messages = $language->text("hammu", "login_sorry_username_not_match"); //"Sorry,username or password did not match.Please try again";
        $return_data = array(
            "response_status" => '0',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    } else {
        $result = $ow_user->authenticate(new BASE_CLASS_StandardAuth($username, $password));
        if (!$result->isValid()) {
            $messages = $result->getMessages();
            $messages = $language->text("hammu", "login_sorry_username_not_match"); //"Sorry,username or password did not match.Please try again";
            $return_data = array(
                "response_status" => '0',
                "response_message" => $messages,
            );
            $app->response->setBody(json_encode($return_data));
        } else {
            $user = $Userservice->findUserById($result->getUserId());
            $username = $user->getUsername();
            $user_id = $result->getUserId();
            $verify_email = $user->getEmailVerify();
            if ($verify_email) {
                $verify_val = "1";
            } else {
                $verify_val = "0";
            }
            checkUserOnline($user_id);
            $token = $OW_Auth_inst->getAuthenticator()->getId();
            $tokenauth = new OW_TokenAuthenticator($token);
            $service = $PHOTO_BOL_PhotoService_inst;
            $email = $user->getEmail();
            $account_type = $user->getAccountType();
            $filed_array = array(HAMMU_DB_IM_USING_HAMMU_AS_KEY, 'sex');
            $check_type_client_escort = getallquestions(array("user_id" => $user_id, "fields" => $filed_array));
            $sex_lable = $check_type_client_escort[0]['userSelectedLabel'];
            $sex_value = $check_type_client_escort[0]['userSelectedValue'];
            $type_check = $check_type_client_escort[1]['userSelectedValue'];
            if ($type_check == '1') {
                $sex = "client"; //$language->text("hammu", "login_client"); //
            } else {
                $sex = "escort"; //$language->text("hammu", "login_escort"); //
            }
            $avatars = $BOL_AvatarService_inst->getAvatarsUrlList(array($user_id));
            $reportedUser = $Userservice->findUserById($user_id);
            $id = $reportedUser->getId();
            $check_exist_value = $SKAPI_BOL_Service_inst->findValueExistOrNot($id);
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
            $messages = $language->text("hammu", "login_success"); //"Login Successfully";
            $return_data = array(
                "response_status" => '1',
                "response_message" => $messages,
                "data" => array(
                    "user_id" => $user_id,
                    "user_name" => $username,
                    "email" => $email,
                    "profile_picture" => $avatars[$user_id],
                    "user_type" => $sex,
                    "sex_name" => $sex_lable,
                    "sex_value" => $sex_value,
                    "is_verify" => $verify_val
                )
            );
            $app->response->setBody(json_encode($return_data));
//}
        }
    }
}

//function login() {
//    global $BOL_UserDao;
//    global $ow_user;
//    global $Userservice;
//    global $BOL_AvatarService_inst;
//    global $SKAPI_BOL_Service_inst;
//    global $PHOTO_BOL_PhotoService_inst;
//    global $OW_Auth_inst;
//    $app = \Slim\Slim::getInstance();
//    $app->response->headers->set('Content-Type', 'application/json');
//    $app->response->setStatus(200);
//    $username = $app->request()->params('username');
//    $password = $app->request()->params('password');
//    $token = $app->request()->params('token');
//    $type = $app->request()->params('type');
//    $lang_id = (int) $app->request()->params("lang_id");
//    $currentLanguageId = getCurrentLanguages($lang_id);
//    $deviceId = $token;
//    $deviceType = $type;
//    $email_check = $BOL_UserDao->findUserByUsernameOrEmail($username);
//    $email_exits = count($email_check);
//    if ($email_exits != '1') {
//        $app = \Slim\Slim::getInstance();
//        $app->response->headers->set('Content-Type', 'application/json');
//        $app->response->setStatus(200);
//
//        if ($currentLanguageId == '32') {
//            $messages = "Sorry, Benutzername oder Passwort sind falsch. Bitte versuchen Sie es erneut";
//        } else if ($currentLanguageId == '33') {
//            $messages = "Nombre de usuario y/o contraseña no coinciden";
//        } else {
//            $messages = "Sorry,username or password did not match.Please try again";
//        }
//        $return_data = array(
//            "response_status" => '0',
//            "response_message" => $messages,
//        );
//        $app->response->setBody(json_encode($return_data));
//    } else {
//        $result = $ow_user->authenticate(new BASE_CLASS_StandardAuth($username, $password));
//        if (!$result->isValid()) {
//            $messages = $result->getMessages();
//            //$messages = "Sorry,username or password did not match.Please try again";
//            if ($currentLanguageId == '32') {
//                $messages = "Sorry, Benutzername oder Passwort sind falsch. Bitte versuchen Sie es erneut";
//            } else if ($currentLanguageId == '33') {
//                $messages = "Nombre de usuario y/o contraseña no coinciden";
//            } else {
//                $messages = "Sorry,username or password did not match.Please try again";
//            }
//            $return_data = array(
//                "response_status" => '0',
//                "response_message" => $messages,
//            );
//            $app->response->setBody(json_encode($return_data));
//        } else {
//            $user = $Userservice->findUserById($result->getUserId());
//            $username = $user->getUsername();
//            $user_id = $result->getUserId();
//            checkUserOnline($user_id);
//            $token = $OW_Auth_inst->getAuthenticator()->getId();
//            $tokenauth = new OW_TokenAuthenticator($token);
//            $service = $PHOTO_BOL_PhotoService_inst;
//            $email = $user->getEmail();
//            $account_type = $user->getAccountType();
//            $filed_array = array(HAMMU_DB_IM_USING_HAMMU_AS_KEY, 'sex');
//            $check_type_client_escort = getallquestions(array("user_id" => $user_id, "fields" => $filed_array));
////            print_r($check_type_client_escort);
////            exit;
//            $sex_lable = $check_type_client_escort[0]['userSelectedLabel'];
//            $sex_value = $check_type_client_escort[0]['userSelectedValue'];
//            $type_check = $check_type_client_escort[1]['userSelectedValue'];
//            if ($currentLanguageId == '32') {
//                $sexKey = "Kunde";
//            } else if ($currentLanguageId == '33') {
//                $sexKey = "Cliente";
//            } else {
//                $sexKey = "Client";
//            }
//            if ($type_check == '1') {
//                $sex = $sexKey;
//            } else {
//                $sex = "Escort";
//            }
//            $avatars = $BOL_AvatarService_inst->getAvatarsUrlList(array($user_id));
//            $reportedUser = $Userservice->findUserById($user_id);
//            $id = $reportedUser->getId();
//            $check_exist_value = $SKAPI_BOL_Service_inst->findValueExistOrNot($id);
//            if ($check_exist_value) {
//                $table_id = $check_exist_value[0]->id;
//                if ($table_id) {
//                    $user_skapi_id = $check_exist_value[0]->id;
//                } else {
//                    $user_skapi_id = "";
//                }
//            } else {
//                $user_skapi_id = "";
//            }
//            $user_details = $SKAPI_BOL_Service_inst->createUserDetails($user_id, $deviceId, $deviceType, $user_skapi_id);
//            $messages = "Login Successfully";
//            $return_data = array(
//                "response_status" => '1',
//                "response_message" => $messages,
//                "data" => array(
//                    "user_id" => $user_id,
//                    "user_name" => $username,
//                    "email" => $email,
//                    "profile_picture" => $avatars[$user_id],
//                    "user_type" => $sex,
//                    "sex_name" => $sex_lable,
//                    "sex_value" => $sex_value,
//                )
//            );
//            $app->response->setBody(json_encode($return_data));
////}
//        }
//    }
//}

function signup() {
    global $Userservice;
    global $SKADATE_BOL_AccountTypeToGenderDao;
    global $BOL_AvatarService_inst;
    //global $EmailVerifyService;
    global $SKAPI_BOL_Service_inst;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
//$match_sex = $app->request()->params('match_sex');
//$preferences_or_services = $app->request()->params('preferences_or_services');
//$photo = $app->request()->params('photo');
//$photo_data = $_FILES["photo"];
    $username = $app->request()->params('username');
    $email = $app->request()->params('email');
    $password = $app->request()->params('password');
    $realname = $app->request()->params('realname');
    $sex = $app->request()->params('sex');
    $i_m_using = $app->request()->params(HAMMU_DB_IM_USING_HAMMU_AS_KEY);
    $googlemap_location = $app->request()->params('googlemap_location');
    $birthdate = $app->request()->params('birthdate');
    $mobile_number = $app->request()->params(HAMMU_DB_MOBILE_NUMBER_KEY);
    $meeting_point = $app->request()->params(HAMMU_DB_METTING_POINT_KEY);
    $pay_pal_address = $app->request()->params(HAMMU_DB_PAYMENT_TYPE_KEY);

    //hardik edited
    $HOTEL_SERVICE = $app->request()->params(HAMMU_HOTEL_SERVICE);
    $HOME_VISIT = $app->request()->params(HAMMU_HOME_VISIT);
    $SECRET_FANTASY = $app->request()->params(HAMMU_SECRET_FANTASY);
    $HAMMU_LANGUAGE = $app->request()->params(HAMMU_LANGUAGE);
    $HAMMU_COUNTRY = $app->request()->params(HAMMU_COUNTRY);
    //

    $token = $app->request()->params('token');
    $type = $app->request()->params('type');
    $preferences = $app->request()->params(HAMMU_DB_SERVICES_KEY);
    $deviceId = $token;
    $deviceType = $type;

    $preferenceArr = explode(",", $preferences);
    $preVal = 0;
    foreach ($preferenceArr as $key => $value) {
        $preVal = $preVal + $value;
    }
    $data["email"] = urldecode($email);
    $data["username"] = $username;
    $data['password'] = $password;
    $data["googlemap_location"] = $googlemap_location;
    $data["birthdate"] = $birthdate;
    $data[HAMMU_DB_MOBILE_NUMBER_KEY] = $mobile_number;
    $data["sex"] = $sex;
    $today_date_timestamp = strtotime(date("d-m-Y"));
    $birth_date_timestamp = strtotime($birthdate);
    if ($birth_date_timestamp > $today_date_timestamp) {
        $message = $language->text("hammu", "signup_error_prorper_date"); //"Please Provide Proper Date!";
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $crdata = checkuserexists($data);
        if (count($crdata) > 0) {
            $app->response->setBody(json_encode($crdata));
        } else {
            $username = trim(preg_replace('/[^\w]/', '', $username));
            $username = makeUsername($username);
            $data['realname'] = $username;
            $newUser = false;
            $accountdata = $SKADATE_BOL_AccountTypeToGenderDao->findByGenderValue($sex);
            $accounttype = $accountdata[0]->accountType;
            $user = $Userservice->createUser($username, $password, $data["email"], $accounttype, false);
            $check_exist_value = $SKAPI_BOL_Service_inst->findValueExistOrNot($user->id);
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
            $user_details = $SKAPI_BOL_Service_inst->createUserDetails($user->id, $deviceId, $deviceType, $user_skapi_id);
            sendUserVerificationMail($user);
            $newUser = true;
            unset($data['email']);
            unset($data['password']);
            unset($data['username']);
//Geo location settings on address
            $price = $app->request()->params(HAMMU_DB_PRICE_KEY);
            if (!empty($data["googlemap_location"])) {
                $urlencode_address = urlencode($data["googlemap_location"]);
                $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
                $output = json_decode($geocode);
                if (!empty($output->results[0]->formatted_address)) {
                    $data_location[HAMMU_DB_PRICE_KEY] = $price;
                    $data_location['googlemap_location']['address'] = $output->results[0]->formatted_address;
                    $data_location['googlemap_location']['latitude'] = $output->results[0]->geometry->location->lat;
                    $data_location['googlemap_location']['longitude'] = $output->results[0]->geometry->location->lng;
                    $data_location['googlemap_location']['northEastLat'] = $output->results[0]->geometry->bounds->northeast->lat;
                    $data_location['googlemap_location']['northEastLng'] = $output->results[0]->geometry->bounds->northeast->lng;
                    $data_location['googlemap_location']['southWestLat'] = $output->results[0]->geometry->bounds->southwest->lat;
                    $data_location['googlemap_location']['southWestLng'] = $output->results[0]->geometry->bounds->southwest->lng;
                    $data_location['googlemap_location']['json'] = json_encode($output->results[0]);
                    $data_location['birthdate'] = $data["birthdate"];
                    $data_location['sex'] = $sex;
                    $data_location['realname'] = $realname;
                    $data_location[HAMMU_DB_MOBILE_NUMBER_KEY] = $data[HAMMU_DB_MOBILE_NUMBER_KEY];
                    $data_location[HAMMU_DB_SERVICES_KEY] = $preVal;
                    $data_location[HAMMU_DB_PAYMENT_TYPE_KEY] = $pay_pal_address;
                    $data_location[HAMMU_DB_IM_USING_HAMMU_AS_KEY] = $i_m_using;
                    $data_location[HAMMU_DB_METTING_POINT_KEY] = $meeting_point;
                    //hardik edited
                    $data_location[HAMMU_HOTEL_SERVICE] = $HOTEL_SERVICE;
                    $data_location[HAMMU_HOME_VISIT] = $HOME_VISIT;
                    $data_location[HAMMU_SECRET_FANTASY] = $SECRET_FANTASY;
                    $data_location[HAMMU_LANGUAGE] = $HAMMU_LANGUAGE;
                    $data_location[HAMMU_COUNTRY] = $HAMMU_COUNTRY;
                    //
                }
            }
            $store_to_question = cleanArray($data_location);
            BOL_QuestionService::getInstance()->saveQuestionsData($store_to_question, $user->id);
            if (!empty($_FILES)) {
                $files = $_FILES; //PHOTO_BOL_PhotoService::getInstance()->getPhotoPath($data["photoId"], $data["hash"], 'original');
                $path = $_FILES['photo']['tmp_name'];
                $avtar = $BOL_AvatarService_inst->setUserAvatar($user->id, $path);
            }
            $event = new OW_Event(OW_EventManager::ON_USER_REGISTER, array(
                'method' => 'native',
                'userId' => $user->id,
                'params' => array()
            ));
            OW::getEventManager()->trigger($event);
            $avatars = $BOL_AvatarService_inst->getAvatarsUrlList(array($user->id));
            $filed_array = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
            $all_services_preferences = getallquestions(array("user_id" => $user->id, "fields" => $filed_array));
            if ($i_m_using == "1") {
                $sex_type = $language->text("hammu", "login_client"); //"client";
                $type = "preferences";
            } else {
                $sex_type = $language->text("hammu", "login_escort"); //"escort";
                $type = "services";
            }
            $messages = $language->text("hammu", "email_verification_code"); //"Your Verification code has been sent to your Email Address";
            $return_data = array(
                "response_status" => '1',
                "response_message" => $messages,
                "data" => array(
                    "user_id" => $user->id,
                    "user_name" => $username,
                    "email" => urldecode($email),
                    "profile_picture" => $avatars[$user->id],
                    "phone_number" => $mobile_number,
                    "birthday" => $birthdate,
                    "user_type" => $sex_type,
                    $type => $all_services_preferences[0]['userSelectedLabel']
                )
            );
            $app->response->setBody(json_encode($return_data));
        }
    }
}

function sendVerificationMail($type, $params) {
    global $getConfig;
    global $getFeedback;
    //global $getRouter;
    global $language;
    global $getMailer;
    global $EmailVerifyService;
    $subject = $params['subject'];
    $template_html = $params['body_html'];
    $template_text = $params['body_text'];
    switch ($type) {
        case "user":
            $user = $params['user'];
            $email = $user->email;
            $userId = $user->id;
            break;
        case "site":
            $email = $getConfig->getValue('base', 'unverify_site_email');
            $userId = 0;
            break;
        default :
            $getFeedback->error($language->text('base', 'email_verify_verify_mail_was_not_sent'));
            return;
    }
    $emailVerifiedData = $EmailVerifyService->findByEmailAndUserId($email, $userId, $type);
    if ($emailVerifiedData !== null) {
        $timeLimit = 60 * 60 * 24 * 3; // 3 days
        if (time() - (int) $emailVerifiedData->createStamp >= $timeLimit) {
            $emailVerifiedData = null;
        }
    }
    if ($emailVerifiedData === null) {
        $emailVerifiedData = new BOL_EmailVerify();
        $emailVerifiedData->userId = $userId;
        $emailVerifiedData->email = trim($email);
        $emailVerifiedData->hash = randomNumber();
        $emailVerifiedData->createStamp = time();
        $emailVerifiedData->type = $type;
        $EmailVerifyService->batchReplace(array($emailVerifiedData));
    }
    $vars = array(
        'code' => $emailVerifiedData->hash,
            //'url' => OW_URL_HOME . 'email-verify-check/' . $emailVerifiedData->hash,
//'verification_page_url' => OW_URL_HOME . 'email-verify-form'
    );
    $language = $language;
    $subject = UTIL_String::replaceVars($subject, $vars);
    $template_html = UTIL_String::replaceVars($template_html, $vars);
    $template_text = UTIL_String::replaceVars($template_text, $vars);
    $mail = $getMailer->createMail();
    $mail->addRecipientEmail($emailVerifiedData->email);
    $mail->setSubject($subject);
    $mail->setHtmlContent($template_html);
    $mail->setTextContent($template_text);
    $getMailer->send($mail);
    if (!isset($params['feedback']) || $params['feedback'] !== false) {
        $getFeedback->info($language->text('base', 'email_verify_verify_mail_was_sent'));
    }
}

function randomNumber() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function sendUserVerificationMail(BOL_User $user, $feedback = true) {
    global $Userservice;
    global $language;
    $vars = array(
        'username' => $Userservice->getDisplayName($user->id),
    );
    $language = $language;
    $subject = $language->text('base', 'email_verify_subject', $vars);
    $template_html = $language->text('hammu', 'email_verify_template_html', $vars);
    $template_text = $language->text('hammu', 'email_verify_template_text', $vars);
    $params = array(
        'user' => $user,
        'subject' => $subject,
        'body_html' => $template_html,
        'body_text' => $template_text
    );
    sendVerificationMail("user", $params);
}

function resendEmailVerify() {
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params("user_id");
    $email_id = $app->request()->params("email");
    $user = BOL_UserService::getInstance()->findUserById($user_id);
    $email = htmlspecialchars(trim($email_id));
    if ($user->email != $email) {
        BOL_UserService::getInstance()->updateEmail($user->id, $email);
        $user->email = $email;
    }
    sendUserVerificationMail($user);
    $messages = $language->text("hammu", "resend_mail_sent_success"); //"Verification email successfully sent";
    $return_data = array(
        "response_status" => '1',
        "response_message" => $messages,
    );
    $app->response->setBody(json_encode($return_data));
}

function emailCodeAuthentication() {
    global $EmailVerifyService;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params("user_id");
    $email_id = $app->request()->params("email");
    $code = $app->request()->params("code");
    $result = checkCodeExists($code);
    if (!empty($result)) {
        $EmailVerifyService->verifyEmail($code);
        checkUserOnline($user_id);
        $messages = $language->text("hammu", "email_auth_success"); //"Authenticate Successfully";
        $return_data = array(
            "response_status" => '1',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    } else {
        $messages = $language->text("hammu", "email_invalid_code"); //"Invalid Code Please try again";
        $return_data = array(
            "response_status" => '0',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    }
}

function checkCodeExists($code) {
    global $OWgetDbo;
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "base_email_verify where hash='{$code}'";
    return $result = $OWgetDbo->queryForList($sql);
}

function checkuserexists($data) {
    global $Userservice;
    global $language;
    $email = $data['email'];
    $username = $data['username'];
    $userService = $Userservice;
    $reportedUser_email = $userService->findByEmail($email);
    $mdata = array();
    if ($reportedUser_email) {
        $message = $language->text("hammu", "email_already_exists"); //"email already exists!";
        $mdata = array("response_message" => $message, "response_status" => "0");
    }
    $reportedUser_username = $userService->findByUsername($username);
    if ($reportedUser_username) {
        $message = $language->text("hammu", "username_already_exists"); //"username already exists!";
        $mdata = array("response_message" => $message, "response_status" => "0");
    }
    return $mdata;
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

function forgot_password() {
    global $Userservice;
    global $UserResetPassword;
    global $getRouter;
    global $language;
    global $getMailer;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $email = $app->request()->params('email');
    $user = $Userservice->findByEmail($email);
    if (empty($user)) {
        $messages = $language->text("hammu", "forgot_no_user_with_email"); //"There is no user with this email address";
        $return_data = array(
            "response_status" => '0',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    } else {
        $resetPassword = $Userservice->findResetPasswordByUserId($user->getId());
        if ($resetPassword !== null) {
            if ($resetPassword->getUpdateTimeStamp() > time()) {
                $messages = $language->text("hammu", "forgot_reset_code_already_sent"); //"Reset Code Already Sent.Please try again in 10 minutes.";
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
            $resetPassword = getNewResetPassword($user->getId());
        }
        $vars = array(
            'code' => $resetPassword->getCode(),
            'username' => $user->getUsername(),
            'requestUrl' => $getRouter->urlForRoute('base.reset_user_password_request'),
            'resetUrl' => $getRouter->urlForRoute('base.reset_user_password', array('code' => $resetPassword->getCode()))
        );
        $mail = $getMailer->createMail();
        $mail->addRecipientEmail($email);
        $mail->setSubject($language->text('hammu', 'reset_password_mail_subject'));
        $mail->setTextContent($language->text('hammu', 'reset_password_mail_content_txt', $vars));
        $mail->setHtmlContent($language->text('hammu', 'reset_password_mail_content_html', $vars));
        $getMailer->send($mail);
        $messages = $language->text("hammu", "forgot_info_sent_to_your_email"); //"The information on changing and confirming your new password sent to your email.";
        $return_data = array
            (
            "response_status" => '1',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    }
}

function getNewResetPassword($userId) {
    global $UserResetPassword;
    $newResetPassword = randomNumber();
    $resetPassword = new BOL_UserResetPassword();
    $resetPassword->setUserId($userId);
    $resetPassword->setExpirationTimeStamp(( time() + 3600));
    $resetPassword->setUpdateTimeStamp(time() + 600);
    $resetPassword->setCode($newResetPassword);
    $UserResetPassword->save($resetPassword);
    return $resetPassword;
}

function resetPassword() {
    global $Userservice;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $code = $app->request()->params('code');
    $password = $app->request()->params('password');
    $repeatPassword = $app->request()->params('password');
    $resetCode = $Userservice->findResetPasswordByCode($code);
    if (!empty($resetCode)) {
        $user = $Userservice->findUserById($resetCode->getUserId());
        $dataArr = array("form_name" => "reset-password", "password" => $password, "repeatPassword" => $repeatPassword);
        $Userservice->processResetPasswordForm($dataArr, $user, $resetCode);
        $messages = $language->text("hammu", "password_reset_success"); //"Password reset successfully";
        $return_data = array("response_status" => '1', "response_message" => $messages);
        $app->response->setBody(json_encode($return_data));
    } else {
        $messages = $language->text("hammu", "reset_code_not_valid_expired"); //"Unfortunately you reset code is invalid or expired. Please follow the link and try to reset it again. ";
        $return_data = array("response_status" => '0', "response_message" => $messages);
    }
}

function changePassword() {
    global $Userservice;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $userId = $app->request()->params('userId');
    $oldPassword = $app->request()->params('oldPassword');
    $newPassword = $app->request()->params('newPassword');
    $result = $Userservice->isValidPassword($userId, $oldPassword);
    if ($result) {
        $Userservice->updatePassword($userId, $newPassword);
        $messages = $language->text("hammu", "password_has_changed"); //"password has been changed!";
        $return_data = array("response_status" => '1', "response_message" => $messages);
        $app->response->setBody(json_encode($return_data));
    } else {
        $messages = $language->text("hammu", "password_not_match"); //"Your password dose not match! try again!";
        $return_data = array("response_status" => '0', "response_message" => $messages);
        $app->response->setBody(json_encode($return_data));
    }
}

function cleanArray($array) {
    if (is_array($array)) {
        foreach ($array as $key => $sub_array) {
            $result = cleanArray($sub_array);
            if ($result === false) {
                unset($array[$key]);
            } else {
                $array[$key] = $result;
            }
        }
    }
    if (empty($array)) {
        return false;
    }
    return $array;
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
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
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
    $available = $app->request()->params('available');
    $services = $app->request()->params(HAMMU_DB_SERVICES_KEY);
    $serach_services = explode(",", $services);
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
        $data_arr = array("form_name" => "MainSearchForm", "sex" => $sex, "match_sex" => $match_sex, "realname" => $realname, "with_photo" => $with_photo, "online" => $online, "googlemap_location" => $data_location, "birthdate" => array("from" => $age_min, "to" => $age_max), "realname" => $realname, HAMMU_DB_SERVICES_KEY => $serach_services, HAMMU_DB_IM_USING_HAMMU_AS_KEY => "2", "available" => $available, "MainSearchFormSubmit" => "Search");
        $clean_array = cleanArray($data_arr);
        $data = $USEARCH_BOL_Service->updateSearchData($clean_array);
        $addParams = array('join' => '', 'where' => '');
        if (!empty($data['online'])) {
            $addParams['join'] .= " INNER JOIN `" . $BOL_UserOnlineDao->getTableName() . "` `online` ON (`online`.`userId` = `user`.`id`) ";
        }
        if (!empty($data['with_photo'])) {
            $addParams['join'] .= " INNER JOIN `" . OW_DB_PREFIX . "base_avatar` avatar ON (`avatar`.`userId` = `user`.`id`) ";
        }
        if (!empty($data['available'])) {
            $addParams['join'] .= " LEFT JOIN `" . OW_DB_PREFIX . "skapi` ON (`ow_skapi`.`userId` = `user`.`id`)";
            $addParams['where'] .= " AND `" . OW_DB_PREFIX . "skapi`.`available` = 'online'";
        }
        $userIdList = $Userservice->findUserIdListByQuestionValues($data, 0, 500, false, $addParams);
        $listId = 0;
        if (count($userIdList) > 0) {
            $listId = $BOL_SearchService->saveSearchResult($userIdList);
            OW::getSession()->set($SEARCH_RESULT_ID_VARIABLE, $listId);
            OW::getSession()->set('usearch_search_data', $data);
            $BOL_AuthorizationService->trackAction('base', 'search_users');
            $serach_result = searchResult(array('orderType' => array($PARAM_OPTION_DEFAULT_VALUE => 'latest_activity')), $listId);
            foreach ($serach_result as $key => $result) {
                $searchArr = checkFavorite($user_id, $result['user_id']);
                if (count($searchArr)) {
                    $serach_result[$key]["is_favorite"] = "1";
                } else {
                    $serach_result[$key]["is_favorite"] = "0";
                }
            }
            $search_location_lat_long = array('latitude' => $output->results[0]->geometry->location->lat, 'longitude' => $output->results[0]->geometry->location->lng);

            $messages = $language->text("hammu", "search_success"); //"Searching Successfully";
            $return_data = array(
                "response_status" => '1',
                "response_message" => $messages,
                "data" => $serach_result,
                "location" => $search_location_lat_long
            );
            return $app->response->setBody(json_encode($return_data));
        } else {
            $messages = $language->text("hammu", "sorry_no_people_found"); //"Sorry!!! No people found.Please try a different search for more results..";
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
    global $language;
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
        $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'googlemap_location', HAMMU_DB_SERVICES_KEY, HAMMU_DB_PRICE_KEY, HAMMU_HOTEL_SERVICE, HAMMU_HOME_VISIT, HAMMU_SECRET_FANTASY, HAMMU_LANGUAGE, HAMMU_COUNTRY));
        $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
        $onlineStatus = $Userservice->findOnlineStatusForUserList($user_ids);
//        print_r($userinfoData);
//        die;
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
            if (array_key_exists(HAMMU_DB_SERVICES_KEY, $user)) {
                $service = renderQuestion($key, HAMMU_DB_SERVICES_KEY);
                $service_name = renderQuestion($key, HAMMU_DB_SERVICES_KEY, true);
            }
            if (array_key_exists(HAMMU_DB_PRICE_KEY, $user)) {
                $price = $user[HAMMU_DB_PRICE_KEY];
            }
            $availableUser = checkAvailableOrNot($key);
            if ($availableUser == "online") {
                $available = $language->text("hammu", "available");  //"Available";
            } else {
                $available = $language->text("hammu", "unavailable"); //"Unavailable";
            }
            if (array_key_exists(HAMMU_HOTEL_SERVICE, $user)) {
                $HAMMU_HOTEL_SERVICE = $user[HAMMU_HOTEL_SERVICE];
            } else {
                $HAMMU_HOTEL_SERVICE = "0";
            }
            if (array_key_exists(HAMMU_HOME_VISIT, $user)) {
                $HAMMU_HOME_VISIT = $user[HAMMU_HOME_VISIT];
            } else {
                $HAMMU_HOME_VISIT = "0";
            }
            if (array_key_exists(HAMMU_SECRET_FANTASY, $user)) {
                $HAMMU_SECRET_FANTASY = $user[HAMMU_SECRET_FANTASY];
            } else {
                $HAMMU_SECRET_FANTASY = "0";
            }
            if (array_key_exists(HAMMU_LANGUAGE, $user)) {
                $HAMMU_LANGUAGE = $user[HAMMU_LANGUAGE];
            } else {
                $HAMMU_LANGUAGE = "";
            }
            if (array_key_exists(HAMMU_COUNTRY, $user)) {
                $HAMMU_COUNTRY = $user[HAMMU_COUNTRY];
            } else {
                $HAMMU_COUNTRY = "";
            }
            $user_data[] = array(
                "user_id" => $key,
                "user_name" => $user["username"],
                "profile_picture" => $avatar[$key]["src"],
                //"available" => (!empty($onlineStatus[$key]) ? "Online" : "Offline"),
                "available" => $available,
                "age" => "$age",
                "prices" => $price,
                "services" => $service,
                "services_name" => $service_name,
                HAMMU_HOTEL_SERVICE => $HAMMU_HOTEL_SERVICE,
                HAMMU_HOME_VISIT => $HAMMU_HOME_VISIT,
                HAMMU_SECRET_FANTASY => $HAMMU_SECRET_FANTASY,
                HAMMU_LANGUAGE => $HAMMU_LANGUAGE,
                HAMMU_COUNTRY => $HAMMU_COUNTRY,
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
    $orderType = !empty($params['orderType']) ? $params['orderType'] : $LIST_ORDER_LATEST_ACTIVITY;
    if (empty($orderTypes)) {
        $orderType = $LIST_ORDER_LATEST_ACTIVITY;
    } else if (!in_array($orderType, $orderTypes)) {
        $orderType = reset($orderTypes);
    }
    return $orderType;
}

function getAllServicesOrPreferences() {
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $filed_array = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
    $all_services_preferences = getallquestions(array("user_id" => $user_id, "fields" => $filed_array));
    $app->response->setBody(json_encode($all_services_preferences));
}

function getAllServices() {
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $filed_array = array(HAMMU_DB_SERVICES_KEY);
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

function listing() {
    global $Userservice;
    global $QuestionService;
    global $BOL_AvatarService_inst;
    global $PHOTO_BOL_PhotoService_inst;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
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
//$data_location['accountType'] = "8cc28eaddb382d7c6a94aeea9ec029fb";
        $userIdList = $Userservice->findUserIdListByQuestionValues($data_location, 0, BOL_SearchService::USER_LIST_SIZE);
        if (!empty($userIdList)) {
            if (($key = array_search($user_id, $userIdList) ) !== false) {
                unset($userIdList[$key]);
            }
            $user_ids = array_values($userIdList);
            $userinfoData = array();
            $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'googlemap_location', HAMMU_DB_SERVICES_KEY, HAMMU_DB_PRICE_KEY, HAMMU_DB_IM_USING_HAMMU_AS_KEY));
            $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
            $onlineStatus = $Userservice->findOnlineStatusForUserList($user_ids);
            $user_info = array();
            $user_data = array();
            foreach ($userinfoData as $key => $user) {
                if ($user[HAMMU_DB_IM_USING_HAMMU_AS_KEY] == "2") {
                    $dob = date("Y/m/d", strtotime($user["birthdate"]));
                    $age = ageCalculate($dob);
                    $userKeyId = $key;
                    $availableUser = checkAvailableOrNot($key);
                    if ($availableUser == "online") {
                        $available = $language->text("hammu", "available"); //"Available";
                    } else {
                        $available = $language->text("hammu", "unavailable"); //"Unavailable";
                    }
                    $photoService = $PHOTO_BOL_PhotoService_inst;
                    $photos = $photoService->findPhotoListByUserId($userKeyId, 1, 500);
                    $service = "";
                    $service_name = "";
                    $price = "";
                    if (array_key_exists(HAMMU_DB_SERVICES_KEY, $user)) {
                        $service = renderQuestion($key, HAMMU_DB_SERVICES_KEY);
                        $service_name = renderQuestion($key, HAMMU_DB_SERVICES_KEY, true);
                    }
                    if (array_key_exists(HAMMU_DB_PRICE_KEY, $user)) {
                        $price = $user[HAMMU_DB_PRICE_KEY];
                    }
                    $user_data[] = array(
                        "user_id" => $key,
                        "user_name" => $user["username"],
                        "profile_picture" => $avatar[$key]["src"],
                        //"available" => (!empty($onlineStatus[$key]) ? "Online" : "Offline"),
                        "available" => $available,
                        "age" => "$age",
                        "prices" => $price,
                        "services" => $service,
                        "services_name" => $service_name,
                        "location" => array(
                            "latitude" => $user["googlemap_location"]["latitude"],
                            "longitude" => $user["googlemap_location"] ["longitude"],
                        ),
                        "image" => $photos
                    );
                }
            }
            $message = $language->text("hammu", "listing_success"); //Successfully
            $return_data = array("response_status" => "1", "response_message" => $message, "data" => $user_data);
            $app->response->setBody(json_encode($return_data));
        } else {
            $message = $language->text("hammu", "listing_fail_to_get_location"); //"Fail to get your location Please try again";
            $return_data = array("response_status" => "0", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $message = $language->text("hammu", "listing_unsuccessful"); //"unSuccessfully Please try again";
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function getProfiledetails() {
    global $Userservice;
    global $QuestionService;
    global $BOL_AvatarService_inst;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $user_ids = array($user_id);
    if (!empty($user_ids)) {
        $userinfoData = array();
        $user = $Userservice->findUserById($user_id);
        if (!empty($user)) {
            $account = $user->getAccountType();
            $filed_array = array(HAMMU_DB_IM_USING_HAMMU_AS_KEY);
            $check_type_client_escort = getallquestions(array("user_id" => $user_id, "fields" => $filed_array));
            $type_check = $check_type_client_escort[0]['userSelectedValue'];
            if ($type_check == "1") {
                $type = "preferences";
                $sex = "client";
            } else {
                $sex = "escort";
                $type = "services";
            }
            $filed = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
            ////hardik edited
            $all_services_preferences = getallquestions(array("user_id" => $user_id, "fields" => $filed));
            $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'email', 'googlemap_location', HAMMU_DB_SERVICES_KEY, HAMMU_DB_PRICE_KEY, HAMMU_DB_MOBILE_NUMBER_KEY, HAMMU_DB_PAYMENT_TYPE_KEY, HAMMU_DB_IM_USING_HAMMU_AS_KEY, HAMMU_DB_METTING_POINT_KEY, HAMMU_HOTEL_SERVICE, HAMMU_HOME_VISIT, HAMMU_SECRET_FANTASY, HAMMU_LANGUAGE, HAMMU_COUNTRY));
//            print_r($userinfoData);
//            die;
            $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
            if (!empty($all_services_preferences)) {
                foreach ($all_services_preferences as $key => $user_services_preferences) {
                    foreach ($userinfoData as $key => $user) {
                        $phone_number = "";
                        if (!empty($user[HAMMU_DB_MOBILE_NUMBER_KEY])) {
                            $phone_number = $user[HAMMU_DB_MOBILE_NUMBER_KEY];
                        }
                        if (!empty($user[HAMMU_DB_PRICE_KEY])) {
                            $price = $user[HAMMU_DB_PRICE_KEY];
                        } else {
                            $price = "";
                        }
                        if (!empty($user[HAMMU_DB_PAYMENT_TYPE_KEY])) {
                            $paypal = $user[HAMMU_DB_PAYMENT_TYPE_KEY];
                        } else {
                            $paypal = "";
                        }
                        ////hardik edited
                        if (!empty($user[HAMMU_HOTEL_SERVICE])) {
                            $hotel_service = $user[HAMMU_HOTEL_SERVICE];
                        } else {
                            $hotel_service = "0";
                        }
                        if (!empty($user[HAMMU_HOME_VISIT])) {
                            $home_visit = $user[HAMMU_HOME_VISIT];
                        } else {
                            $home_visit = "0";
                        }
                        if (!empty($user[HAMMU_SECRET_FANTASY])) {
                            $secret_fantasy = $user[HAMMU_SECRET_FANTASY];
                        } else {
                            $secret_fantasy = "0";
                        }
                        if (!empty($user[HAMMU_LANGUAGE])) {
                            $HAMMU_LANGUAGE = $user[HAMMU_LANGUAGE];
                        } else {
                            $HAMMU_LANGUAGE = "";
                        }
                        if (!empty($user[HAMMU_COUNTRY])) {
                            $HAMMU_COUNTRY = $user[HAMMU_COUNTRY];
                        } else {
                            $HAMMU_COUNTRY = "";
                        }


                        $dob = date("d-m-Y", strtotime($user["birthdate"]));
                        $user_data = array(
                            "user_id" => $key,
                            "email" => $user["email"],
                            "username" => $user["username"],
                            "realname" => $user["realname"],
                            "address" => !empty($user["googlemap_location"]["address"]) ? $user["googlemap_location"]["address"] : "",
                            "phone_number" => $phone_number,
                            "birthdate" => $dob,
                            "price" => $price,
                            "paypal" => $paypal,
                            HAMMU_HOTEL_SERVICE => $hotel_service,
                            HAMMU_HOME_VISIT => $home_visit,
                            HAMMU_SECRET_FANTASY => $secret_fantasy,
                            HAMMU_LANGUAGE => $HAMMU_LANGUAGE,
                            HAMMU_COUNTRY => $HAMMU_COUNTRY,
                            "profile_picture" => $avatar[$key]["src"],
                            $type => $user_services_preferences['userSelectedLabel'],
                            $type . '_value' => $user_services_preferences['userSelectedValue'],
                        );
                        //
                    }
                }
                $message = $language->text("hammu", "listing_success");
                $return_data = array("response_status" => "1", "response_message" => $message, "data" => $user_data);
                $app->response->setBody(json_encode($return_data));
            } else {
                $message = $language->text("hammu", "provide_correct_data"); //"Sorry!! Please provide correct data";
                $return_data = array("response_status" => "0", "response_message" => $message);
                $app->response->setBody(json_encode($return_data));
            }
        } else {
            $message = $language->text("hammu", "listing_fail_to_get_location"); //"Fail to get your location Please try again"
            $return_data = array("response_status" => "0", "response_message" => $message);
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
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $realname = $app->request()->params('realname');
    $phone_number = $app->request()->params('phone_number');
    $birthday = $app->request()->params('birthdate');
    $birthday_time = strtotime($birthday);
    $today_date = strtotime(date("d-m-Y"));
    if ($birthday_time > $today_date) {
        $message = $language->text("hammu", "setProfilePic_date"); //"Please Select Proper Date"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $filed_array = array('realname', 'birthdate', 'email', 'googlemap_location', 'preference_or_services', HAMMU_DB_MOBILE_NUMBER_KEY, HAMMU_DB_PRICE_KEY, HAMMU_DB_PAYMENT_TYPE_KEY, HAMMU_HOTEL_SERVICE, HAMMU_HOME_VISIT, HAMMU_SECRET_FANTASY, HAMMU_LANGUAGE, HAMMU_COUNTRY);
        $data = array();
        $location = $app->request()->params('googlemap_location');
        $urlencode_address = urlencode($location);
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
        $output = json_decode($geocode);
        if ($output->status == "OK") {
            $data_location = $output->results[0]->formatted_address;
            foreach ($filed_array as $fileds) {
                $post_val = $app->request()->params($fileds);
                if (!empty($post_val)) {
                    $data[$fileds] = $app->request()->params($fileds);
                }
            }
            $data['googlemap_location'] = $data_location;
            $data[HAMMU_DB_MOBILE_NUMBER_KEY] = $phone_number;
            $data[HAMMU_HOTEL_SERVICE] = (int) $app->request()->params(HAMMU_HOTEL_SERVICE);
            $data[HAMMU_HOME_VISIT] = (int) $app->request()->params(HAMMU_HOME_VISIT);
            $data[HAMMU_SECRET_FANTASY] = (int) $app->request()->params(HAMMU_SECRET_FANTASY);
            $data[HAMMU_LANGUAGE] = $app->request()->params(HAMMU_LANGUAGE);
            $data[HAMMU_COUNTRY] = $app->request()->params(HAMMU_COUNTRY);
//            print_r($data);
//            die;
            if (empty($user_id)) {
                $message = $language->text("hammu", "setProfilePic_user"); //"unsuccess"
                $return_data = array("status" => "false", "message" => $message, "error" => "Please provide username!");
                $app->response->setBody(json_encode($return_data));
            }
            $data_save = array();
            $user_id = (int) $user_id;
            $user = $Userservice->findUserById($user_id);
            foreach ($data as $key => $value) {
                if (in_array($key, $filed_array)) {
                    // if (!empty($value)) {
                    if ($key == "preference_or_services") {
                        $key_set = HAMMU_DB_SERVICES_KEY;
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
                            $value = explode(",", $value);
                            break;
                        default :
                            $value = $value;
                    }
                    $data_save[$key_set] = $value;
                    // }
                }
            }
            //print_r($data_save);
            $updated = $QuestionService->saveQuestionsData(array_filter($data_save), $user_id);
            if ($updated) {
                $message = $language->text("hammu", "setProfilePic_success");
                //$messages = "Your profile has been updated!";
                $return_data = array
                    (
                    "response_status" => '1',
                    "response_message" => $message,
                );
            } else {
                $message = $language->text("hammu", "setProfiledetails_fail"); //"Please provide proper Profile data!"
                $return_data = array("response_status" => "0", "response_message" => $message);
            }
            $app->response->setBody(json_encode($return_data));
        } else {
            $message = $language->text("hammu", "setProfiledetails_location"); // "Please Provide Valid Location!"
            $return_data = array("response_status" => "0", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        }
    }
}

function generatePhotoList($photos) {
    global $Userservice;
    global $PHOTO_BOL_PhotoAlbumService;
    list($userIds, $userUrlList, $albumIdList, $albumUrlList, $displayNameList, $albumNameList, $entityIdList) = array_fill(0, 7, array());
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
            "albumname" => $albumNameList[$photo["albumId"]]["name"],
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
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $fields = $param["fields"];
    $user_id = $param["user_id"];
//    if (empty($user_id)) {
//        $return_data = array("message" => "Please provide User id!", "status" => "false");
//        $app->response->setBody(json_encode($return_data));
//    }
    $user = $Userservice->findUserById($user_id);
    if (!empty($user)) {
        $account = $user->getAccountType();
        $account_type = getValueFromAccountType($account);
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
//        print_r($questions);
//        exit;
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
            $questions[] = array(
                'name' => "avatar",
                'label' => "Avatar",
                'custom' => $custom,
                'presentation' => "upload",
                'options' => array(),
                'value' => null,
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
                    $date = UTIL_DateTime::parseDate($questionData[$userId] [$question->name], $MYSQL_DATETIME_DATE_FORMAT);
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
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $userId = $app->request()->params('user_id');
    $files = $_FILES;
    $path = $_FILES['photo']['tmp_name'];
    $status = $BOL_AvatarService_inst->setUserAvatar($userId, $path);
    if ($status) {
        $message = $language->text("hammu", "setProfilePic_success"); //"profile photo uploaded with success!"
        $avatar = $BOL_AvatarService_inst->getAvatarUrl($userId);
        $return_data = array("response_status" => "1", "response_message" => $message, "avatar" => $avatar);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "setProfilePic_fail"); //"Please provide proper Profile data!"
        $return_data = array("response_status" => "0", "response_message" => $message);
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
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $statusArr = findOnlineStutusByIds($inviteeId);

//    if (!empty($statusArr)) {
    $availableStatus = $statusArr[0]['available'];

    if ($availableStatus == "online") {
        $rarray = $HAMMU_BOL_Service->inviteRequest($inviterId, $inviteeId);
        if (count($rarray) > 0) {
            $timestamp = $rarray["timestamp"];
            $date = date("Y/m/d H:i", $timestamp);
            $inviteeUsername = $Userservice->getUserName($inviteeId);
            $message1 = $language->text("hammu", "sendInvites_success"); //"Invitation sent!"
            $message = $language->text('hammu', 'invitation_sent', array('user' => $inviteeUsername, "date" => $date));
            $return_data = array("response_status" => "1", "response_message" => $message1, "log_message" => $message);
            $app->response->setBody(json_encode($return_data));
        } else {
            $message = $language->text("hammu", "sendInvites_fail"); //"Invitation not sent or already sent!"
            $return_data = array("response_status" => "0", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $message = $language->text("hammu", "escort_outof_office");
        //$rarray = $HAMMU_BOL_Service->inviteRequestFail($inviterId, $inviteeId);
        $return_data = array("response_status" => "0", "response_message" => "escort is out of office");
        $app->response->setBody(json_encode($return_data));
    }
//    } else {
//        $return_data = array("response_status" => "0", "response_message" => "escort is out of office");
//        $app->response->setBody(json_encode($return_data));
//    }
}

function acceptInvites() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $rarray = $HAMMU_BOL_Service->accept($inviterId, $inviteeId, $id);
    if (count($rarray) > 0) {
        $message = $language->text("hammu", "acceptInvites_success"); //"Invitation accept!"
        $return_data = array("response_status" => "1", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "acceptInvites_fail"); //"Invitation not accept or already accept!"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function escortDeclineInvites() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $rarray = $HAMMU_BOL_Service->escort_decline($inviterId, $inviteeId, $id);
    if (count($rarray) > 0) {
        $message = $language->text("hammu", "clientDeclineInvites_success"); //"Invitation Decline!"
        $return_data = array("response_status" => "1", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "clientDeclineInvites_fail"); //"Invitation already decline!"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function clientDeclineInvites() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $rarray = $HAMMU_BOL_Service->client_decline($inviterId, $inviteeId, $id);
    if (count($rarray) > 0) {
        $message = $language->text("hammu", "clientDeclineInvites_success"); //"Invitation Decline!"
        $return_data = array("response_status" => "1", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "clientDeclineInvites_fail"); //"Invitation already decline!"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function escortProposeDateDecline() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $rarray = $HAMMU_BOL_Service->escort_propose_date_decline($inviterId, $inviteeId, $id);
    if (count($rarray) > 0) {
        $message = $language->text("hammu", "escortProposeDateDecline_success"); //"Propose Date Decline!"
        $return_data = array("response_status" => "1", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "escortProposeDateDecline_fail"); //"Propose Date already Decline!"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function proposeDateInvitation() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $date = $app->request()->params("date");
    $timestamp = strtotime($date);
    $rarray = $HAMMU_BOL_Service->agree($inviterId, $inviteeId, $id, $timestamp);
    if (count($rarray) > 0) {
        $message = $language->text("hammu", "proposeDateInvitation_success"); //"Invitation for Propose Date!"
        $return_data = array("response_status" => "1", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "proposeDateInvitation_fail"); //"Invitation to Propose Date already Proposed!"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function reArrageInvites() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $date = $app->request()->params("date");
    $post_timestamp = strtotime($date);
    $location = $app->request()->params("location");
    $instruction = $app->request()->params("instruction");
    $urlencode_address = urlencode($location);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);
    if (!empty($output->results[0]->geometry->location->lng)) {
        $formatted_address = $output->results[0]->formatted_address;
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        $store_location_details = array(
            "meet_location" => $formatted_address,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "instruction" => $instruction,
            "date" => $post_timestamp
        );
        $addrr = json_encode($store_location_details);
        $rarray = $HAMMU_BOL_Service->invite_re_arrange($inviterId, $inviteeId, $id, $post_timestamp, $addrr);
        if (count($rarray) > 0) {
            $message = $language->text("hammu", "reArrageInvites_success"); //"Re-Arrange Propose Date and Time"
            $return_data = array("response_status" => "1", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        } else {
            $message = $language->text("hammu", "reArrageInvites_fail"); //"Propose Date and Time Re-Arrange Already!"
            $return_data = array("response_status" => "0", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $message = $language->text("hammu", "acceptProposeDate_location_fail"); //"Invalid Location"
        $return_data = array("response_status" => "0", "response_message" => $message);
    }
}

function acceptProposeDate() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $location = $app->request()->params("location");
    $instruction = $app->request()->params("instruction");
    $urlencode_address = urlencode($location);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);
    if (!empty($output->results[0]->geometry->location->lng)) {
        $formatted_address = $output->results[0]->formatted_address;
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        $store_location_details = array(
            "meet_location" => $formatted_address,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "instruction" => $instruction
        );
        $addrr = json_encode($store_location_details);
        $rarray = $HAMMU_BOL_Service->propose_date_accept($inviterId, $inviteeId, $id, $addrr);
        if (count($rarray) > 0) {
            $message = $language->text("hammu", "acceptProposeDate_success"); // "Propose Date accept!"
            $return_data = array("response_status" => "1", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        } else {
            $message = $language->text("hammu", "acceptProposeDate_fail"); //"Propose Date already accept!"
            $return_data = array("response_status" => "0", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $message = $language->text("hammu", "acceptProposeDate_location_fail"); //"Invalid Location"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function paypal() {
    global $HAMMU_BOL_Service;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $payment_id = $app->request()->params("payment_id");
    $state = $app->request()->params("state");
    $create_time = $app->request()->params("create_time");
    $platform = $app->request()->params("platform");
    $location = $app->request()->params("location");
    $instruction = $app->request()->params("instructions");
    $latitude = $app->request()->params("latitude");
    $longitude = $app->request()->params("longitude");
    $date = $app->request()->params("date");
    $time_date = strtotime($date);
    $store_location_details = array(
        "meet_location" => $location,
        "latitude" => $latitude,
        "longitude" => $longitude,
        "instruction" => $instruction,
        "date" => $time_date
    );
    $addrr = json_encode($store_location_details);
    if ($state == 'approved') {
        paymentDetails($payment_id, $state, $create_time, $platform, $inviterId);
        $rarray = $HAMMU_BOL_Service->confirm_invite($inviterId, $inviteeId, $id, $addrr);
        $user_details = getUserInfo($inviteeId);
        if (count($rarray) > 0) {
            $message = $language->text("hammu", "paypal_success"); //"THANK YOUR FOR BUYING {$user_details['user_name']} A ROSE {$user_details['user_name']} NOW PROVIDES YOU HER CONTACT DETAILS"
            $return_data = array("response_status" => "1", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        } else {
            $message = $language->text("hammu", "paypal_fail"); //"You Already Buying Rose"
            $return_data = array("response_status" => "0", "response_message" => $message);
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $message = $language->text("hammu", "paypal_decline"); //"DECLINED - THE CARD YOU ENTERED IS NOT SUPPORTED ON THIS CURRENCY. PLEASE USE A DIFFERENT CARD TYPE OR USE PAYPAL"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function getClientInvitesLog() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $rarray = $HAMMU_BOL_Service->findClienttLogByCrossIds($inviterId, $inviteeId);
    $datas = json_decode(json_encode($rarray, true), true);
    $return_array = array();
    $data_content = "";
    foreach ($datas as $key => $data) {
        $inviteeUsername = $Userservice->getUserName($data["inviteeId"]);
        $date = date("Y/m/d H:i", $data["timestamp"]);
        $time = date("H:i", $data["timestamp"]);
        $data_timestamp = $data["data"];
        $data_content = "";
        $json_string = isJSON($data_timestamp);
        if (!empty($json_string)) {
            $meet_location_result = json_decode($data_timestamp);
            $meeting_data_arr = (array) $meet_location_result;
            if (in_array($meeting_data_arr['date'], $meeting_data_arr)) {
                $data_content = $final_date = date("Y-m-d H:i", $meeting_data_arr['date']);
            }
        } else {
            if ($data_timestamp) {
                $data_content = date("Y-m-d H:i", $data_timestamp);
            }
        }
        if ($data["action"] == "invitation_accept" || $data["action"] == "propose_date_accept" || $data["action"] == "escort_decline" || $data["action"] == "client_re_arrange") {
            $id = $inviteeId;
        } else {
            $id = $inviterId;
        }
        $message = $language->text('hammu', $data["client_log"], array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content));
        $return_array[] = array(
            "message" => $message,
            "user_id" => $id
        );
    }
    $return_data = array("response_status" => "1", "data" => $return_array);
    $app->response->setBody(json_encode($return_data));
}

function getEscortInvitesLog() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $rarray = $HAMMU_BOL_Service->findEscortLogByCrossIds($inviterId, $inviteeId);
    $datas = json_decode(json_encode($rarray, true), true);
    $return_array = array();
    $data_content = "";
    foreach ($datas as $key => $data) {
        $inviteeUsername = $Userservice->getUserName($data["inviterId"]);
        $date = date("Y/m/d H:i", $data["timestamp"]);
        $time = date("H:i", $data["timestamp"]);
        $data_timestamp = $data["data"];
        $data_content = "";
        $json_string = isJSON($data_timestamp);
        if (!empty($json_string)) {
            $meet_location_result = json_decode($data_timestamp);
            $meeting_data_arr = (array) $meet_location_result;
            if (in_array($meeting_data_arr['date'], $meeting_data_arr)) {
                $data_content = $final_date = date("Y-m-d H:i", $meeting_data_arr['date']);
            }
        } else {
            if ($data_timestamp) {
                $data_content = date("Y-m-d H:i", $data_timestamp);
            }
        }
        if ($data["action"] == "invitation_sent" || $data["action"] == "client_agree" || $data["action"] == "buy_rose") {
            $id = $inviterId;
        } else {
            $id = $inviteeId;
        }

        $message = $language->text('hammu', $data["escort_log"], array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content));
        $return_array[] = array(
            "message" => $message,
            "user_id" => $id
        );
    }
    $return_data = array("response_status" => "1", "data" => $return_array);
    $app->response->setBody(json_encode($return_data));
}

function escortCountNotification() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $sql = "SELECT COUNT(*) as notification_count FROM " . OW_DB_PREFIX . "invites_log WHERE inviteeId={$inviterId} AND action IN ('invitation_sent','client_agree','client_decline','buy_rose') AND `count` = '0'";
    $result = $OWgetDbo->queryForList($sql);
    if (!empty($result) && $result[0]['notification_count'] == "0") {
        $message = $language->text("hammu", "client_notification_list_fail"); // "You have No Notification"
        $return_data = array("response_status" => "0", "response_message" => $message);
        //$return_data = array("response_status" => "0", "response_message" => "You have no notification");
    } else {
        $notification_count = $result[0]['notification_count'];
        $return_data = array("response_status" => "1", "data" => $notification_count);
    }
    $app->response->setBody(json_encode($return_data));
}

function clientCountNotification() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $sql = "SELECT COUNT(*) as notification_count FROM " . OW_DB_PREFIX . "invites_log WHERE inviterId = {$inviterId} AND action IN ('invitation_accept','escort_asks','invitation_sent_fail','escort_decline','client_re_arrange','propose_date_accept','meet_location','buy_rose_client') AND `count` = '0'";
    $result = $OWgetDbo->queryForList($sql);
    if (!empty($result) && $result[0]['notification_count'] == "0") {
        $message = $language->text("hammu", "client_notification_list_fail"); // "You have No Notification"
        $return_data = array("response_status" => "0", "response_message" => $message);
        //$return_data = array("response_status" => "0", "response_message" => "You have no notification");
    } else {
        $notification_count = $result[0]['notification_count'];
        $return_data = array("response_status" => "1", "data" => $notification_count);
    }
    $app->response->setBody(json_encode($return_data));
}

function notification_count_update() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $id = $app->request()->params("id");
    $sql = "UPDATE ow_invites_log SET `count`='1' WHERE `id`='{$id}'";
    $result = $OWgetDbo->update($sql);
    if (!empty($result)) {
        $message = $language->text("hammu", "check_available_success"); //"Update Successfully"
        $return_data = array("response_status" => "1", "data" => $message);
    } else {
        $message = $language->text("hammu", "update_invti_log_fail"); // "Not Update"
        $return_data = array("response_status" => "0", "data" => $message);
    }
    $app->response->setBody(json_encode($return_data));
}

function isJSON($string) {
    return is_string($string) && is_object(json_decode($string)) ? true : false;
}

function findOnlineStutusByIds($id) {
    global $OWgetDbo;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $sql = "SELECT available FROM " . OW_DB_PREFIX . "skapi WHERE userId={$id}";
    return $result = $OWgetDbo->queryForList($sql);
}

function escort_notification_list() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");

    $inviteeId_loop = null;
    $rarray = $HAMMU_BOL_Service->findEscortListByIds($inviterId);
    $datas = json_decode(json_encode($rarray, true), true);
    $meet_location = "";
    $longitude = "";
    $latitude = "";
    $instruction = "";
    $final_date = "";
    //$lang_id = $app->request()->params("lang_id");
    //getCurrentLanguages($lang_id);

    if (!empty($datas)) {
        $return_array = array();
        $data_content = "";
        foreach ($datas as $key => $data) {
            $flag = NULL;
            $inviteeUsername = $Userservice->getUserName($data["inviterId"]);
            $date = date("Y-m-d H:i", $data["timestamp"]);
            $time = date("H:i", $data["timestamp"]);
            $data_timestamp = $data["data"];
            $json_string = isJSON($data_timestamp);
            if (!empty($json_string)) {
                $meet_location_result = json_decode($data_timestamp);
                $meeting_data_arr = (array) $meet_location_result;
                if (in_array($meeting_data_arr['meet_location'], $meeting_data_arr)) {
                    $meet_location = $meeting_data_arr['meet_location'];
                }
                if (in_array($meeting_data_arr['latitude'], $meeting_data_arr)) {
                    $latitude = $meeting_data_arr['latitude'];
                }
                if (in_array($meeting_data_arr['longitude'], $meeting_data_arr)) {
                    $longitude = $meeting_data_arr['longitude'];
                }
                if (in_array($meeting_data_arr['instruction'], $meeting_data_arr)) {
                    $instruction = $meeting_data_arr['instruction'];
                }if (in_array($meeting_data_arr['date'], $meeting_data_arr)) {
                    $data_content = $final_date = date("Y-m-d H:i", $meeting_data_arr['date']);
                }
            } else {
                if ($data_timestamp) {
                    $data_content = date("Y-m-d H:i", $data_timestamp);
                }
            }
//            echo $data["action"];
//            die;
            $message = $language->text('hammu', $data["action"] . "_noti", array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content));
//            echo $message;
//            die;
            $flag = "none";
            if ($data["action"] == "invitation_sent" || $data["action"] == "client_re_arrange") {
                $flag = "accept";
            } else if ($data["action"] == "client_agree") {
                $flag = "propose_date";
            } else if ($data["action"] == 'buy_rose') {
                $flag = "none";
            } else if ($data["action"] == 'buy_rose_client') {
                $flag = "none";
            }
            if ($inviteeId_loop != $data["inviterId"]) {
                $inviteeId_loop = $data["inviterId"];
                $user_infos = getUserInfo($inviteeId_loop);
            }
            $user_infos["meet_location"] = $meet_location;
            $user_infos["latitude"] = $latitude;
            $user_infos["longitude"] = $longitude;
            $user_infos["instruction"] = $instruction;
            $user_infos["propose_date"] = $final_date;
            $return_array[] = array(
                "message" => $message,
                "id" => $data["id"],
                "data" => $data["data"],
                "flag" => $flag,
                "action" => $data["action"],
                "seen_unseen" => $data["flag"],
                "inviterId" => $data["inviterId"],
                "user_info" => $user_infos,
                "date" => date("Y/m/d H:i", $data["timestamp"]),
            );
        }
        $return_data = array("response_status" => "1", "data" => $return_array);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "client_notification_list_fail"); // "You have No Notification"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function client_notification_list() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $rarray = $HAMMU_BOL_Service->findClientListByIds($inviterId);
    $datas = json_decode(json_encode($rarray, true), true);

    $data_content = "";
    $meet_location = "";
    $longitude = "";
    $latitude = "";
    $instruction = "";
    $final_date = "";
    if (!empty($datas)) {
        $return_array = array();
        $inviteeId_loop = null;
        $data_content = "";
//        print_r($datas);
//        exit;
        foreach ($datas as $key => $data) {

            $searchArr = checkFavorite($data['inviterId'], $data['inviteeId']);
            if (count($searchArr)) {
                $is_favorite = "1";
            } else {
                $is_favorite = "0";
            }
            $inviteeUsername = $Userservice->getUserName($data["inviteeId"]);
            $date = date("Y/m/d H:i", $data["timestamp"]);
            $time = date("H:i", $data["timestamp"]);
            $data_timestamp = $data["data"];
            $json_string = isJSON($data_timestamp);
            if (!empty($json_string)) {
                $meet_location_result = json_decode($data_timestamp);
                $meeting_data_arr = (array) $meet_location_result;
                if (in_array($meeting_data_arr['meet_location'], $meeting_data_arr)) {
                    $meet_location = $meeting_data_arr['meet_location'];
                }
                if (in_array($meeting_data_arr['latitude'], $meeting_data_arr)) {
                    $latitude = $meeting_data_arr['latitude'];
                }
                if (in_array($meeting_data_arr['longitude'], $meeting_data_arr)) {
                    $longitude = $meeting_data_arr['longitude'];
                }
                if (in_array($meeting_data_arr['instruction'], $meeting_data_arr)) {
                    $instruction = $meeting_data_arr['instruction'];
                }if (in_array($meeting_data_arr['date'], $meeting_data_arr)) {
                    $data_content = $final_date = date("Y-m-d H:i", $meeting_data_arr['date']);
                }
            } else {
                if ($data_timestamp) {
                    // $data_content = date("Y-m-d H:i", $data_timestamp);
                    $data_content = "";
                }
            }
            $message = $language->text('hammu', $data["action"] . "_noti", array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content));
            $flag = "none";
            if ($data["action"] == "invitation_accept") {
                $flag = "agree";
            } else if ($data["action"] == "buy_rose") {
                $flag = "location";
            } else if ($data["action"] == "propose_date_accept" || $data["action"] == "client_re_arrange") {
                $flag = "confirm";
            } else if ($data["action"] == "meet_location") {
                $flag = "meetting";
            } else if ($data["action"] == "buy_rose_client") {
                $flag = "location";
            }
            //echo $data["inviteeId"];
            if ($inviteeId_loop != $data["inviteeId"]) {
                $inviteeId_loop = $data["inviteeId"];
                $user_infos = getUserInfo($inviteeId_loop);
            }

            $user_infos["meet_location"] = $meet_location;
            $user_infos["latitude"] = $latitude;
            $user_infos["longitude"] = $longitude;
            $user_infos["instruction"] = $instruction;
            $user_infos["propose_date"] = $final_date;
            $return_array[] = array(
                "message" => $message,
                "id" => $data["id"],
                "data" => $data["data"],
                "flag" => $flag,
                "action" => $data["action"],
                "seen_unseen" => $data["flag"],
                "inviteeId" => $data["inviteeId"],
                "user_info" => $user_infos,
                "date" => date("Y/m/d H:i", $data["timestamp"]),
                "is_favorite" => $is_favorite
            );
        }
        // exit;
        $return_data = array("response_status" => "1", "data" => $return_array);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "client_notification_list_fail"); //"You have No Notification"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function update_invitation() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $action = $app->request()->params("action");
//$actionArr = explode(",", $action);
//    print_r($actionArr);
//    exit;
//for ($i = 0; $i < count($actionArr); $i++) {
    if ($action == "client_re_arrange") {
        $sql = "UPDATE ow_invites_log SET `flag`='0' WHERE `inviterId`='{$inviterId}' AND `inviteeId`='{$inviteeId}' AND `action` IN ('invitation_accept','escort_asks')";
        $result = $OWgetDbo->update($sql);
    } else if ($action == "invitation_accept" || $action == "escort_asks") {
        $sql = "UPDATE ow_invites_log SET `flag`='1' WHERE `inviterId`='{$inviterId}' AND `inviteeId`='{$inviteeId}' AND `action` IN ('invitation_accept','escort_asks')";
        $result = $OWgetDbo->update($sql);
    } else {
        $sql = "UPDATE ow_invites_log SET `flag`='1' WHERE `inviterId`='{$inviterId}' AND `inviteeId`='{$inviteeId}' AND `action`='{$action}'";
        $result = $OWgetDbo->update($sql);
    }
//}
    if (!empty($result)) {
        $message = $language->text("hammu", "check_available_success"); //"Update Successfully"
        $return_data = array("response_status" => "1", "data" => $message);
    } else {
        $message = $language->text("hammu", "update_invti_log_fail"); //"Not Update"
        $return_data = array("response_status" => "0", "data" => $message);
    }
    $app->response->setBody(json_encode($return_data));
}

function update_invite_log() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $Id = $app->request()->params("id");
    $sql = "UPDATE ow_invites_log SET `flag`='1' WHERE `id`='{$Id}'";
    $result = $OWgetDbo->update($sql);
    if (!empty($result)) {
        $message = $language->text("hammu", "check_available_success"); //"Update Successfully"
        $return_data = array("response_status" => "1", "data" => $message);
    } else {
        $message = $language->text("hammu", "update_invti_log_fail"); //"Not Update"
        $return_data = array("response_status" => "0", "data" => $message);
    }
    $app->response->setBody(json_encode($return_data));
}

function getAccountType() {
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $account_post_val = $app->request()->params("sex");
    $filed = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
    $all_services_preferences = getAllQuestionsAccountType($account_post_val, array("fields" => $filed));
    $app->response->setBody(json_encode($all_services_preferences));
}

function getAllQuestionsAccountType($account_post_val, $param) {
    global $QuestionService;
    global $AccountTypeToGenderService;
//    global $BOL_AvatarService_inst;
    global $QUESTION_PRESENTATION_RANGE;
    global $QUESTION_PRESENTATION_BIRTHDATE;
    global $QUESTION_PRESENTATION_AGE;
    global $QUESTION_PRESENTATION_DATE;
    global $Userservice;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $fields = $param["fields"];
    $accountType = $AccountTypeToGenderService->getAccountType($account_post_val);
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
                'presentation' => $question->name == 'googlemap_location' ? $question->name : $question->presentation,
                'options' => formatOptionsForQuestion($question->name, $questionOptions),
//                'value' => $value,
//                'required' => $question->required
            );
        }
    }
    return $questions;
}

function getAllSexData() {
    global $QuestionService;
    $questionService = $QuestionService;
    global $OWgetDbo;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "skadate_account_type_to_gender";
    $result = $OWgetDbo->queryForList($sql);
    foreach ($result as $key => $data) {
        //$label   = $questionService->getQuestionValueLang("sex", $data['genderValue']);
        $optionList[] = array(
            'label' => $questionService->getQuestionValueLang("sex", $data['genderValue']),
            'value' => $data['genderValue']
        );
    }
    $temp = $optionList[0];
    $optionList[0] = $optionList[1];
    $optionList[1] = $temp;
    $app->response->setBody(json_encode($optionList));
}

function getValueFromAccountType($account_type) {
    global $OWgetDbo;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $sql = "SELECT genderValue FROM " . OW_DB_PREFIX . "skadate_account_type_to_gender where accountType='{$account_type}'";
    $result = $OWgetDbo->queryForList($sql);
    return $result[0]['genderValue'];
}

function getPrivcyPolicy() {
    global $LanguageService;
    global $OW_Language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $languageService = $LanguageService;
    $currentLanguageId = $languageService->getCurrent()->getId();
    $langValueDto = $languageService->getValue($currentLanguageId, 'base', 'local_page_content_page_99448870');
    $langValue = $langValueDto === null ? '' : $OW_Language->text('base', 'local_page_content_page_99448870');
    $return_data = array("response_status" => "1", "data" => utf8_encode($langValue));
    $app->response->setBody(json_encode($return_data));
}

function getWhatIsHAMMU() {
    global $LanguageService;
    global $OW_Language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $languageService = $LanguageService;
    $currentLanguageId = $languageService->getCurrent()->getId();
    $langValueDto = $languageService->getValue($currentLanguageId, 'base', 'local_page_content_page_48528922');
    $langValue = $langValueDto === null ? '' : $OW_Language->text('base', 'local_page_content_page_48528922');
    $return_data = array("response_status" => "1", "data" => utf8_encode($langValue));
    $app->response->setBody(json_encode($return_data));
}

function getTermOfUse() {
    global $LanguageService;
    global $OW_Language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $languageService = $LanguageService;
    $currentLanguageId = $languageService->getCurrent()->getId();
    $langValueDto = $languageService->getValue($currentLanguageId, 'base', 'local_page_content_page-119658');
    $langValue = $langValueDto === null ? '' : $OW_Language->text('base', 'local_page_content_page-119658');
    $return_data = array("response_status" => "1", "data" => utf8_encode($langValue));
    $app->response->setBody(json_encode($return_data));
}

function getTermOfUseLink() {
    global $OW_Language;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end

    $link = $OW_Language->text('base', 'questions_question_user_terms_of_use_label');
    $messages = $message = $language->text("hammu", "listing_success");
    $return_data = array("response_status" => "1", "response_message" => $messages, "data" => $link);
    $app->response->setBody(json_encode($return_data));
}

function contactUs() {
    global $CONTACTUS_BOL_Service;
    global $getMailer;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $email = $app->request()->params("email");
    $subject = $app->request()->params("subject");
    $message = $app->request()->params("message");
    $contactEmails = array();
    $contacts = $CONTACTUS_BOL_Service->getDepartmentList();
    foreach ($contacts as $contact) {
        /* @var $contact CONTACTUS_BOL_Department */
        $contactEmails[$contact->id]['label'] = $CONTACTUS_BOL_Service->getDepartmentLabel($contact->id);
        $contactEmails[$contact->id]['email'] = $contact->email;
    }
    $mail = $getMailer->createMail();
    $mail->addRecipientEmail($contactEmails[2]['email']);
    $mail->setSender($email);
    $mail->setSenderSuffix(false);
    $mail->setSubject($subject);
    $mail->setTextContent($message);
    $getMailer->addToQueue($mail);
    $getMailer->send($mail);
    $messages = $message = $language->text("hammu", "contact_us_success"); //"Your message has been sent Successfully";
    $return_data = array(
        "response_status" => '1',
        "response_message" => $messages,
    );
    $app->response->setBody(json_encode($return_data));
}

function check_available() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $Id = $app->request()->params("user_id");
    $status = $app->request()->params("status");

    $sql = "UPDATE ow_skapi SET `available`='{$status}' WHERE `userId`='{$Id}'";

    $result = $OWgetDbo->update($sql);
    if (!empty($result)) {
        $message = $language->text("hammu", "check_available_success"); //"Update Successfully"
        $return_data = array("response_status" => "1", "data" => $message);
    } else {
        $message = $language->text("hammu", "check_available_fail"); //"Already Updated Please change your status"
        $return_data = array("response_status" => "0", "data" => $message);
    }
    $app->response->setBody(json_encode($return_data));
}

function findCurrentOnlineStutus() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $Id = $app->request()->params("user_id");
    $sql = "SELECT available FROM " . OW_DB_PREFIX . "skapi WHERE userId={$Id}";
    $result = $OWgetDbo->queryForList($sql);
    $available = $result[0]['available'];
    $message = $language->text("hammu", "listing_success"); //"Successfully"
    $return_data = array("response_status" => "1", "response_message" => $message, "data" => $available);
    $app->response->setBody(json_encode($return_data));
}

function favorite() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $escort_id = $app->request()->params('escort_id');
    $type = $app->request()->params('type');
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "favorite WHERE `user_id`={$user_id} AND `escort_id`={$escort_id} AND `status`='Active'";

    $result = $OWgetDbo->queryForList($sql);
    if (!empty($result)) {
        $data = array("is_favorite" => "0");
        $sql = "DELETE FROM ow_favorite WHERE `user_id`={$user_id} AND `escort_id`={$escort_id}";
        $OWgetDbo->delete($sql);
        $message = $language->text("hammu", "unfavorite_successfully"); //"Unfavorite Successfully"
        $return_data = array("response_status" => "1", "response_message" => $message, "data" => $data);
        $app->response->setBody(json_encode($return_data));
    } else {
        $data = array("is_favorite" => "1");
        $sql = "INSERT INTO ow_favorite (user_id,escort_id,type) VALUES ('$user_id','$escort_id','$type')";
        $OWgetDbo->insert($sql);
        $message = $language->text("hammu", "favorite_success"); //"Favorite Successfully"
        $return_data = array("response_status" => "1", "response_message" => $message, "data" => $data);
        $app->response->setBody(json_encode($return_data));
    }
}

function getFavoriteList() {
    global $OWgetDbo;
    global $language;
    //global $BOL_AvatarService_inst;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "favorite WHERE `user_id`={$user_id} AND `status`='Active'";
    $favorite_list = $OWgetDbo->queryForList($sql);
    if (!empty($favorite_list)) {
        foreach ($favorite_list as $key => $favorite) {
            //$avatar = $BOL_AvatarService_inst->getDataForUserAvatars(array($favorite['escort_id']));

            $user_infos[] = getUserInfo($favorite['escort_id']);
            //$user_infos[]['image'] = $avatar;
        }
        $message = $language->text("hammu", "favorite_success"); //Successfully
        $return_data = array("response_status" => "1", "response_message" => $message, "data" => $user_infos);
        $app->response->setBody(json_encode($return_data));
    } else {
        $message = $language->text("hammu", "favorite_fail"); //"You have no favorite"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function checkUserOnline($user_id) {
    global $OWgetDbo;
    global $language;
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "base_user_online WHERE `userId`='{$user_id}'";
    $resultList = $OWgetDbo->queryForList($sql);
    $currentDate = date('d-m-Y H:i:s');
    $activityStamp = strtotime($currentDate);
    $context = "1";
    if (!empty($resultList)) {
        $sql2 = "UPDATE ow_base_user_online SET `activityStamp`='{$activityStamp}' WHERE `userId`='{$user_id}'";
        $OWgetDbo->update($sql2);
    } else {
        $sql1 = "INSERT INTO ow_base_user_online (userId,activityStamp,context) VALUES ('$user_id','$activityStamp','$context')";
        $OWgetDbo->insert($sql1);
    }
}

function checkFavorite($user_id, $escort_id) {

    global $OWgetDbo;
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "favorite WHERE `user_id`={$user_id} AND`escort_id`={$escort_id} AND `status`='Active'";
    return $favorite_list = $OWgetDbo->queryForList($sql);
}

function checkAvailableOrNot($user_id) {
    global $OWgetDbo;
    $sql = "SELECT available FROM " . OW_DB_PREFIX . "skapi WHERE `userId`={$user_id}";
    $availableData = $OWgetDbo->queryForList($sql);
    foreach ($availableData as $key => $availableDataResult) {
        return $result = $availableDataResult['available'];
    }
}

function signOut() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $sql = "DELETE FROM ow_base_user_online WHERE `userId`={$user_id}";
    $OWgetDbo->delete($sql);
    $message = $language->text("hammu", "logout_success"); //Logout Successfully
    $return_data = array("response_status" => "1", "response_message" => $message);
    $app->response->setBody(json_encode($return_data));
}

function paymentDetails($payment_id, $state, $create_time, $platform, $user_id) {
    global $OWgetDbo;
    $sql1 = "INSERT INTO ow_base_payment (payment_id,state,create_time,platform,user_id) VALUES ('$payment_id','$state','$create_time','$platform','$user_id')";
    $result = $OWgetDbo->insert($sql1);
}

function multipleUploadPhoto() {
    global $language;
    global $PHOTO_BOL_PhotoService_inst;
    global $PHOTO_BOL_PhotoAlbumService;
    global $PHOTO_BOL_PhotoTemporaryService;
    global $BOL_AuthorizationService;
    global $getConfig;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $language = $language;
    $userId = $user_id;
    $albumName = "randoms";
// Delete old temporary photos
    $tmpPhotoService = $PHOTO_BOL_PhotoTemporaryService;
    $photoService = $PHOTO_BOL_PhotoService_inst;
    $photoAlbumService = $PHOTO_BOL_PhotoAlbumService;
    $file1 = $_FILES['photo'];
//    print_r($file1);
//    die;
    $tmpPhotoService->deleteUserTemporaryPhotos($userId);
    foreach ($file1 as $key => $file) {
        for ($i = 0; $i < count($file1[$key]); $i++) {
            $innerArr[$i][$key] = $file1[$key][$i];
        }
    }
    //print_r($innerArr);
    if (!empty($innerArr)) {
        foreach ($innerArr as $key => $filename) {
            $accepted = floatval($getConfig->getValue('photo', 'accepted_filesize') * 1024 * 1024);
            if (strlen($filename['tmp_name'])) {
                if (!UTIL_File::validateImage($filename['name']) || $filename['size'] > $accepted) {
                    $json = array("response_message" => $language->text('photo', 'no_photo_uploaded'), "response_status" => "0");
                    $app->response->setBody(json_encode($json));
                }
                $tmpPhotoService->addTemporaryPhoto($filename['tmp_name'], $userId, 1);
                $tmpList = $tmpPhotoService->findUserTemporaryPhotos($userId, 'order');
                $tmpList = array_reverse($tmpList);
// check album exists
                if (!($album = $photoAlbumService->findAlbumByName($albumName, $userId))) {
                    $album = new PHOTO_BOL_PhotoAlbum();
                    $album->name = $albumName;
                    $album->userId = $userId;
                    $album->createDatetime = time();
                    $photoAlbumService->addAlbum($album);
                }
            }
        }
        foreach ($tmpList as $tmpPhoto) {
            $photo = $tmpPhotoService->moveTemporaryPhoto($tmpPhoto['dto']->id, $album->id, null);
            if ($photo) {
                $BOL_AuthorizationService->trackAction('photo', 'upload');
                $photoService->createAlbumCover($album->id, array($photo));
                $photoService->triggerNewsfeedEventOnSinglePhotoAdd($album, $photo);
                $photoParams = array('addTimestamp' => $photo->addDatetime, 'photoId' => $photo->id, 'hash' => $photo->hash, 'description' => $photo->description);
                $event = new OW_Event(PHOTO_CLASS_EventHandler::EVENT_ON_PHOTO_ADD, array($photoParams));
                OW::getEventManager()->trigger($event);
                $photo = $photoService->findPhotoById($photo->id);
                if ($photo) {
                    $return_data = array("response_status" => "1", "response_message" => "photo has been uploaded successfully!");
                    $app->response->setBody(json_encode($return_data));
                } else {
                    $return_data = array("response_status" => "0", "response_message" => "photo uploading failed! Something went wrong!");
                    $app->response->setBody(json_encode($return_data));
                }
            }
        }
    } else {
        $return_data = array("response_message" => $language->text('photo', 'no_photo_uploaded'), "response_status" => "0");
        $app->response->setBody(json_encode($return_data));
    }
}

function uploadPhoto() {
    global $language;
    global $PHOTO_BOL_PhotoTemporaryService;
    global $PHOTO_BOL_PhotoService_inst;
    global $PHOTO_BOL_PhotoAlbumService;
    global $getConfig;
    global $BOL_AuthorizationService;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $language = $language;
    $userId = $user_id;
    $albumName = "randoms";
// Delete old temporary photos
    $tmpPhotoService = $PHOTO_BOL_PhotoTemporaryService;
    $photoService = $PHOTO_BOL_PhotoService_inst;
    $photoAlbumService = $PHOTO_BOL_PhotoAlbumService;
    $file = $_FILES['photo'];
    $tmpPhotoService->deleteUserTemporaryPhotos($userId);
    $accepted = floatval($getConfig->getValue('photo', 'accepted_filesize') * 1024 * 1024);
    if (strlen($file['tmp_name'])) {
        if (!UTIL_File::validateImage($file['name']) || $file['size'] > $accepted) {
            $json = array("response_message" => $language->text('photo', 'no_photo_uploaded'), "response_status" => "0");
            $app->response->setBody(json_encode($json));
            //$this->redirect();
        }
        $tmpPhotoService->addTemporaryPhoto($file['tmp_name'], $userId, 1);
        $tmpList = $tmpPhotoService->findUserTemporaryPhotos($userId, 'order');
        $tmpList = array_reverse($tmpList);
// check album exists
        if (!($album = $photoAlbumService->findAlbumByName($albumName, $userId))) {
            $album = new PHOTO_BOL_PhotoAlbum();
            $album->name = $albumName;
            $album->userId = $userId;
            $album->createDatetime = time();
            $photoAlbumService->addAlbum($album);
        }
        foreach ($tmpList as $tmpPhoto) {
            $photo = $tmpPhotoService->moveTemporaryPhoto($tmpPhoto['dto']->id, $album->id, null);
            if ($photo) {
                $BOL_AuthorizationService->trackAction('photo', 'upload');
                $photoService->createAlbumCover($album->id, array($photo));
                $photoService->triggerNewsfeedEventOnSinglePhotoAdd($album, $photo);
                $photoParams = array('addTimestamp' => $photo->addDatetime, 'photoId' => $photo->id, 'hash' => $photo->hash, 'description' => $photo->description);
                $event = new OW_Event(PHOTO_CLASS_EventHandler::EVENT_ON_PHOTO_ADD, array($photoParams));
                OW::getEventManager()->trigger($event);
                $photo = $photoService->findPhotoById($photo->id);
                $photoDataArr = array(
                    'albumId' => $photo->albumId,
                    'status' => $photo->status,
                    'hash' => $photo->hash,
                    'id' => $photo->id,
                    'uploadKey' => $photo->uploadKey
                );
                if ($photo) {
                    $message = $language->text("hammu", "photo_upload_success"); //"photo has been uploaded successfully!"
                    $return_data = array("response_status" => "1", "response_message" => $message, "data" => $photoDataArr);
                    $app->response->setBody(json_encode($return_data));
                } else {
                    $message = $language->text("hammu", "photo_upload_fail"); //"photo not uploaded, something went wrong!"
                    $return_data = array("response_status" => "0", "response_message" => $message);
                    $app->response->setBody(json_encode($return_data));
                }
            }
        }
    } else {
        $return_data = array("response_message" => $language->text('photo', 'no_photo_uploaded'), "response_status" => "0");
        $app->response->setBody(json_encode($return_data));
    }
//  }
}

function getGallary() {
    global $PHOTO_BOL_PhotoService;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $user_id = $app->request()->params('user_id');
    $userId = $user_id;
    $photoService = $PHOTO_BOL_PhotoService;
    $photos = $photoService->findPhotoListByUserId($userId, 1, 500);
    $photos = generatePhotoList($photos);
    if (!empty($photos) && !empty($photos['data'])) {
        $photoCount = count($photos['data']);
        $photos['response_status'] = "1";
        $photos['response_message'] = "";
        $photos['photo_count'] = "$photoCount";
        //$return_data = array("response_status" => "1", "response_message" => "", $photos);
        $app->response->setBody(json_encode($photos));
    } else {
        $message = $language->text("hammu", "empty_gallary"); //"You have no photo in your gallery. Please upload photo!!"
        $return_data = array("response_status" => "0", "response_message" => $message);
        $app->response->setBody(json_encode($return_data));
    }
}

function deletePhoto() {
    //$data = $_POST;
    global $PHOTO_BOL_PhotoService_inst;
    global $PHOTO_BOL_PhotoAlbumCoverDao;
    global $PHOTO_BOL_PhotoDao;
    global $language;
    //$required_data = array("photoId");
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $photoId = $app->request()->params('photoId');
    $photoService = $PHOTO_BOL_PhotoService_inst;
    $photo = $photoService->findPhotoById($photoId);
    if ($photoService->deletePhoto($photo->id)) {
        $cover = $PHOTO_BOL_PhotoAlbumCoverDao->findByAlbumId($photo->albumId);
        if ($cover === NULL || (int) $cover->auto) {
            $PHOTO_BOL_PhotoAlbumCoverDao->deleteCoverByAlbumId($photo->albumId);
            $photoService->createAlbumCover($photo->albumId, array_reverse($PHOTO_BOL_PhotoDao->getAlbumAllPhotos($photo->albumId)));
        }
        $message = $language->text("hammu", "delete_photo_success"); //Photo deleted successfully!"
        $return_data = array('response_status' => "1", 'response_message' => $message
        );
    } else {
        $message = $language->text("hammu", "delete_photo_fail"); //"Photo not deleted or not exist!"
        $return_data = array('response_status' => "0", 'response_message' => $message
        );
    }
    $app->response->setBody(json_encode($return_data));
}

function deleteNotification() {
    global $OWgetDbo;
    global $language;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    //Lang Call Start
    $hammu_lang_id = $app->request()->params("lang_id");
    if (!empty($hammu_lang_id)) {
        getCurrentLanguages($hammu_lang_id);
    }
    //Lang Call end
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "invites_log WHERE `action`='buy_rose_client'";
    $invite_log = $OWgetDbo->queryForList($sql);
    $today = date("d-m-Y H:m:s");
    $today_time = strtotime($today);

    foreach ($invite_log as $key => $invite) {
        $data = json_decode($invite['data']);
        if ($today_time > $data->date) {
            $sql1 = "UPDATE ow_invites_log SET `noti_remove`='1' WHERE `inviterId`='{$invite['inviterId']}' AND `inviteeId`='{$invite['inviteeId']}'";
            $result = $OWgetDbo->update($sql1);
            if ($result) {
                $message = $language->text("hammu", "delete_noti_success"); //"Notificaton deleted successfully!";
                $return_data = array('response_status' => "1", 'response_message' => $message
                );
            } else {
                $message = $language->text("hammu", "delete_noti_fail"); //"Notification not deleted or not exist!";
                $return_data = array('response_status' => "0", 'response_message' => $message
                );
            }
            $app->response->setBody(json_encode($return_data));
        }
    }
}

function getCurrentLanguages($lang_id) {
    global $LanguageService;
    OW::getSession()->set('base.language_id', $lang_id);
    $Langobj = $LanguageService->getCurrent()->setId($lang_id);
    $currentLanguageId = $LanguageService->getCurrent()->getId();
    return $currentLanguageId;
}

function getUserInfo($userId) {
    global $BOL_AvatarService_inst;
    global $Userservice;
    global $QuestionService;
    global $PHOTO_BOL_PhotoService_inst;
    global $language;

    $user_data = array();
    $user_account = $Userservice->findUserById($userId);
    if (!empty($user_account)) {
        $account = $user_account->getAccountType();
        $filed_array = array(HAMMU_DB_IM_USING_HAMMU_AS_KEY);
        $check_type_client_escort = getallquestions(array("user_id" => $userId, "fields" => $filed_array));
        $type_check = $check_type_client_escort[0]['userSelectedValue'];
        if ($type_check == "1") {
            $type = "preferences";
            $sex = "client";
        } else {
            $sex = "escort";
            $type = "services";
        }
    }
    $filed = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
    $all_services_preferences = getallquestions(array("user_id" => $userId, "fields" => $filed));
    //hardik edit
    $userinfoData = $QuestionService->getQuestionData(array($userId), array('id', 'username', 'birthdate', 'email', 'googlemap_location', HAMMU_DB_SERVICES_KEY, HAMMU_DB_MOBILE_NUMBER_KEY, HAMMU_DB_PRICE_KEY, HAMMU_HOTEL_SERVICE, HAMMU_HOME_VISIT, HAMMU_SECRET_FANTASY, HAMMU_LANGUAGE, HAMMU_COUNTRY));
    //print_r($userinfoData);

    $avatar = $BOL_AvatarService_inst->getDataForUserAvatars(array($userId));
    $onlineStatus = $Userservice->findOnlineStatusForUserList(array($userId));
    $available = "";
    if (count($all_services_preferences) > 0) {
        foreach ($all_services_preferences as $key => $user_services_preferences) {
            $user[HAMMU_DB_PRICE_KEY] = "";
            if (count($userinfoData) > 0) {
                foreach ($userinfoData as $key => $user) {
                    $availableUser = checkAvailableOrNot($key);
                    if ($availableUser == "online") {
                        $available = $language->text("hammu", "available"); //"Available";
                    } else {
                        $available = $language->text("hammu", "unavailable"); //"Unavailable";
                    }
                    $phone_number = "";
                    if (!empty($user[HAMMU_DB_MOBILE_NUMBER_KEY])) {
                        $phone_number = $user[HAMMU_DB_MOBILE_NUMBER_KEY];
                    }

                    //hardik edited
                    if (!empty($user[HAMMU_HOTEL_SERVICE])) {
                        $hotel_service = $user[HAMMU_HOTEL_SERVICE];
                    } else {
                        $hotel_service = "0";
                    }
                    if (!empty($user[HAMMU_HOME_VISIT])) {
                        $home_visit = $user[HAMMU_HOME_VISIT];
                    } else {
                        $home_visit = "0";
                    }
                    if (!empty($user[HAMMU_SECRET_FANTASY])) {
                        $secret_fantasy = $user[HAMMU_SECRET_FANTASY];
                    } else {
                        $secret_fantasy = "0";
                    }
                    if (!empty($user[HAMMU_LANGUAGE])) {
                        $HAMMU_LANGUAGE = $user[HAMMU_LANGUAGE];
                    } else {
                        $HAMMU_LANGUAGE = "";
                    }
                    if (!empty($user[HAMMU_COUNTRY])) {
                        $HAMMU_COUNTRY = $user[HAMMU_COUNTRY];
                    } else {
                        $HAMMU_COUNTRY = "";
                    }

                    $dob = date("d-m-Y", strtotime($user["birthdate"]));
                    $age = ageCalculate($dob);
                    $userKeyId = $key;

                    $photos = $PHOTO_BOL_PhotoService_inst->findPhotoListByUserId($userKeyId, 1, 500);
                    $user_data = array(
                        "user_id" => $key,
                        "email" => $user["email"],
                        "user_name" => $user["username"],
                        "address" => !empty($user["googlemap_location"]["address"]) ? $user["googlemap_location"]["address"] : "",
                        "phone_number" => $phone_number,
                        "birthdate" => $dob,
                        "age" => "$age",
                        "profile_picture" => $avatar[$key]["src"],
                        "price" => !empty($user[HAMMU_DB_PRICE_KEY]) ? $user[HAMMU_DB_PRICE_KEY] : "",
                        "services" => $user_services_preferences['userSelectedValue'],
                        "services_name" => $user_services_preferences['userSelectedLabel'],
                        "location" => array("latitude" => $user["googlemap_location"]["latitude"], "longitude" => $user["googlemap_location"] ["longitude"],),
                        //"available" => (!empty($onlineStatus[$key]) ? "Online" : "Offline"),
                        "available" => $available,
                        HAMMU_HOTEL_SERVICE => $hotel_service,
                        HAMMU_HOME_VISIT => $home_visit,
                        HAMMU_SECRET_FANTASY => $secret_fantasy,
                        HAMMU_LANGUAGE => $HAMMU_LANGUAGE,
                        HAMMU_COUNTRY => $HAMMU_COUNTRY,
                        "image" => $photos,
                    );
                }
            }
        }
    }
    return $user_data;
}

//$data = $_POST;
//$requdired_data = array("userId");
//    foreach ($required_data as $rdata) {
//        if (!array_key_exists($rdata, $data) || empty($data[$rdata])) {
//            $return = array("message" => "Please enter " . $rdata, "status" => "false");
//            echo json_encode($return);
//            exit();
//        }
//    }
/**
  Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
?>
