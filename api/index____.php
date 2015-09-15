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
$app->post('/roseInvites', 'roseInvites');
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
$app->post('/getLocation', 'getLocation');

function loginapp() {
    global $BOL_UserDao;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
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
        $messages = "Sorry,username or password did not match.Please try again";
        $return_data = array(
            "response_status" => '0',
            "response_message" => $messages,
        );

        $app->response->setBody(json_encode($return_data));
    } else {
        $result = $ow_user->authenticate(new BASE_CLASS_StandardAuth($username, $password));
        if (!$result->isValid()) {
            $messages = $result->getMessages();
            $messages = "Sorry,username or password did not match.Please try again";
            $return_data = array(
                "response_status" => '0',
                "response_message" => $messages,
            );
            $app->response->setBody(json_encode($return_data));
        } else {
            $user = $Userservice->findUserById($result->getUserId());
            $username = $user->getUsername();
            $user_id = $result->getUserId();

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
                $sex = "client";
            } else {
                $sex = "escort";
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
            $messages = "Login Successfully";
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
                )
            );
            $app->response->setBody(json_encode($return_data));
//}
        }
    }
}

function signup() {

    global $Userservice;
    global $SKADATE_BOL_AccountTypeToGenderDao;
    global $BOL_AvatarService_inst;
    global $EmailVerifyService;
    global $SKAPI_BOL_Service_inst;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
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
        $return_data = array("response_status" => "0", "response_message" => "Please Provide Proper Date!");
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
                }
            }

//            if ($i_m_using == "1") {
//                array_shift($data_location);
//            }

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
                $sex_type = "client";
                $type = "preferences";
            } else {
                $sex_type = "escort";
                $type = "services";
            }
            $messages = "Your Verification code has been sent to your Email Address";
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
    global $getRouter;
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

    $user_id = $app->request()->params("user_id");
    $email_id = $app->request()->params("email");
    $user = BOL_UserService::getInstance()->findUserById($user_id);

    $email = htmlspecialchars(trim($email_id));

    if ($user->email != $email) {
        BOL_UserService::getInstance()->updateEmail($user->id, $email);
        $user->email = $email;
    }
    sendUserVerificationMail($user);
    $messages = "Verification email successfully sent";
    $return_data = array(
        "response_status" => '1',
        "response_message" => $messages,
    );
    $app->response->setBody(json_encode($return_data));
}

function emailCodeAuthentication() {
    global $EmailVerifyService;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $user_id = $app->request()->params("user_id");
    $email_id = $app->request()->params("email");
    $code = $app->request()->params("code");
    $result = checkCodeExists($code);

    if (!empty($result)) {
        $EmailVerifyService->verifyEmail($code);
        $messages = "Authenticate Successfully";
        $return_data = array(
            "response_status" => '1',
            "response_message" => $messages,
        );
        $app->response->setBody(json_encode($return_data));
    } else {
        $messages = "Invalid Code Please try again";
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

    $email = $data['email'];
    $username = $data['username'];

    $userService = $Userservice;
    $reportedUser_email = $userService->findByEmail($email);
    $mdata = array();
    if ($reportedUser_email) {
// "response_status" => '1',
//        "response_message" => $messages,
        $mdata = array("response_message" => "email already exists!", "response_status" => "0");
//$app->response->setBody(json_encode($mdata));
//exit();
    }
    $reportedUser_username = $userService->findByUsername($username);
    if ($reportedUser_username) {
        $mdata = array("response_message" => "username already exists!", "response_status" => "0");
//$app->response->setBody(json_encode($mdata));
// exit();
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
        $data_arr = array("form_name" => "MainSearchForm", "sex" => $sex, "match_sex" => $match_sex, "realname" => $realname, "with_photo" => $with_photo, "online" => $online, "googlemap_location" => $data_location, "birthdate" => array("from" => $age_min, "to" => $age_max), "realname" => $realname, HAMMU_DB_SERVICES_KEY => $serach_services, HAMMU_DB_IM_USING_HAMMU_AS_KEY => "2", "MainSearchFormSubmit" => "Search");
        $clean_array = cleanArray($data_arr);

        $data = $USEARCH_BOL_Service->updateSearchData($clean_array);
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

        if (count($userIdList) > 0) {
//$listId = $BOL_SearchService->saveSearchResult($userIdList);
            $listId = $BOL_SearchService->saveSearchResult($userIdList);
            OW::getSession()->set($SEARCH_RESULT_ID_VARIABLE, $listId);
            OW::getSession()->set('usearch_search_data', $data);
            $BOL_AuthorizationService->trackAction('base', 'search_users');
            $serach_result = searchResult(array('orderType' => array($PARAM_OPTION_DEFAULT_VALUE => 'latest_activity')), $listId);

            foreach ($serach_result as $key => $result) {
                //$searchArr[] = $result['user_id'];
                $searchArr = checkFavorite($result['user_id']);
                if (count($searchArr)) {
                    $serach_result[$key]["is_favorite"] = 1;
                } else {
                    $serach_result[$key]["is_favorite"] = 0;
                }
            }
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
    $user_id = $app->request()->params('user_id');

    $filed_array = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
//$filed_array = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
    $all_services_preferences = getallquestions(array("user_id" => $user_id, "fields" => $filed_array));
    $app->response->setBody(json_encode($all_services_preferences));
}

function getAllServices() {

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
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
                        "available" => (!empty($onlineStatus[$key]) ? "Online" : "Offline"),
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
//            print_r($user_data);
//            exit;
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
            $all_services_preferences = getallquestions(array("user_id" => $user_id, "fields" => $filed));
            //$userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'email', 'googlemap_location', HAMMU_DB_SERVICES_KEY, 'field_e9795a9d3be797f58aab38b1033265a4', HAMMU_DB_MOBILE_NUMBER_KEY));
            $userinfoData = $QuestionService->getQuestionData($user_ids, array('id', 'username', 'realname', 'birthdate', 'email', 'googlemap_location', HAMMU_DB_SERVICES_KEY, HAMMU_DB_PRICE_KEY, HAMMU_DB_MOBILE_NUMBER_KEY, HAMMU_DB_PAYMENT_TYPE_KEY, HAMMU_DB_IM_USING_HAMMU_AS_KEY, HAMMU_DB_METTING_POINT_KEY));
//            print_r($all_services_preferences);
//            exit;
//            print_r($userinfoData);
//            exit;
            $avatar = $BOL_AvatarService_inst->getDataForUserAvatars($user_ids);
            if (!empty($all_services_preferences)) {
                foreach ($all_services_preferences as $key => $user_services_preferences) {
//                    print_r($userinfoData);
//                    exit;
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
                            "profile_picture" => $avatar[$key]["src"],
                            $type => $user_services_preferences['userSelectedLabel'],
                            $type . '_value' => $user_services_preferences['userSelectedValue'],
                        );
                    }
                }
//                print_r($user_data);
//                exit;
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
    $realname = $app->request()->params('realname');
    $phone_number = $app->request()->params('phone_number');
    $birthday = $app->request()->params('birthdate');
    $birthday_time = strtotime($birthday);


    $today_date = strtotime(date("d-m-Y"));
    if ($birthday_time > $today_date) {
        $return_data = array("response_status" => "0", "response_message" => "Please Select Proper Date");
        $app->response->setBody(json_encode($return_data));
    } else {

        $filed_array = array('realname', 'birthdate', 'email', 'googlemap_location', 'preference_or_services', HAMMU_DB_MOBILE_NUMBER_KEY, HAMMU_DB_PRICE_KEY, HAMMU_DB_PAYMENT_TYPE_KEY);
        $data = array();
        $location = $app->request()->params('googlemap_location');
        $urlencode_address = urlencode($location);

        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
        $output = json_decode($geocode);
//        $isusernameexist = $Userservice->isExistUserName($username);
//        if ($isusernameexist) {
//            $return_data = array("response_status" => "0", "response_message" => "Sorry! Username already exists!");
//            $app->response->setBody(json_encode($return_data));
//        } else {
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
//            print_r($data);
//            exit;
            if (empty($user_id)) {
                $return_data = array("status" => "false", "message" => "unsuccess", "error" => "Please provide user id!");
                $app->response->setBody(json_encode($return_data));
            }

            $data_save = array();
            $user_id = (int) $user_id;
            $user = $Userservice->findUserById($user_id);

            foreach ($data as $key => $value) {
                if (in_array($key, $filed_array)) {
                    if (!empty($value)) {
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
//            print_r($data_save);
//            die;
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
        //}
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
    $statusArr = findOnlineStutusByIds($inviteeId);

    if (!empty($statusArr)) {
        $availableStatus = $statusArr[0]['available'];
        if ($availableStatus == "online") {
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
        } else {
            $rarray = $HAMMU_BOL_Service->inviteRequestFail($inviterId, $inviteeId);
            $return_data = array("response_status" => "0", "response_message" => "escort is out of office");
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $return_data = array("response_status" => "0", "response_message" => "escort is out of office");
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
    $id = $app->request()->params("id");



    $rarray = $HAMMU_BOL_Service->accept($inviterId, $inviteeId, $id);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Invitation accept!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation not accept or already accept!");
        $app->response->setBody(json_encode($return_data));
    }
//}
}

function escortDeclineInvites() {
    global $HAMMU_BOL_Service;
    global $language;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");

    $rarray = $HAMMU_BOL_Service->escort_decline($inviterId, $inviteeId, $id);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Invitation Decline!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation already decline!");
        $app->response->setBody(json_encode($return_data));
    }
//}
}

function clientDeclineInvites() {
    global $HAMMU_BOL_Service;
    global $language;


    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");

    $rarray = $HAMMU_BOL_Service->client_decline($inviterId, $inviteeId, $id);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Invitation Decline!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation already decline!");
        $app->response->setBody(json_encode($return_data));
    }
//}
}

function escortProposeDateDecline() {
    global $HAMMU_BOL_Service;
    global $language;


    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");

    $rarray = $HAMMU_BOL_Service->escort_propose_date_decline($inviterId, $inviteeId, $id);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Propose Date Decline!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Propose Date already Decline!");
        $app->response->setBody(json_encode($return_data));
    }
}

function proposeDateInvitation() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $date = $app->request()->params("date");
    $timestamp = strtotime($date);

//    echo "time->" . $timestamp;
//    exit;
    $rarray = $HAMMU_BOL_Service->agree($inviterId, $inviteeId, $id, $timestamp);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Invitation for Propose Date!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invitation to Propose Date already Proposed!");
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
    $id = $app->request()->params("id");
    $date = $app->request()->params("date");
    $post_timestamp = strtotime($date);
    $rarray = $HAMMU_BOL_Service->invite_re_arrange($inviterId, $inviteeId, $id, $post_timestamp);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Re-Arrange Propose Date and Time");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Propose Date and Time Re-Arrange Already!");
        $app->response->setBody(json_encode($return_data));
    }
}

function acceptProposeDate() {
    global $HAMMU_BOL_Service;
    global $language;


    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $date = $app->request()->params("date");
    $post_timestamp = strtotime($date);
    $rarray = $HAMMU_BOL_Service->propose_date_accept($inviterId, $inviteeId, $id, $post_timestamp);

    if (count($rarray) > 0) {

        $return_data = array("response_status" => "1", "response_message" => "Propose Date accept!");
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Propose Date already accept!");
        $app->response->setBody(json_encode($return_data));
    }
//}
}

function paypal() {
    global $HAMMU_BOL_Service;
    global $language;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $payment_id = $app->request()->params("payment_id");
    $state = $app->request()->params("state");
    $create_time = $app->request()->params("create_time");
    $platform = $app->request()->params("platform");
//    $user_id = $app->request()->params("user_id");
    if ($state == 'approved') {
        paymentDetails($payment_id, $state, $create_time, $platform, $inviterId);

        $rarray = $HAMMU_BOL_Service->confirm_invite($inviterId, $inviteeId, $id);
        $user_details = getUserInfo($inviteeId);
        if (count($rarray) > 0) {
            $return_data = array("response_status" => "1", "response_message" => "THANK YOUR FOR BUYING {$user_details['user_name']} A ROSE {$user_details['user_name']} NOW PROVIDES YOU HER CONTACT DETAILS");
            $app->response->setBody(json_encode($return_data));
        } else {
            $return_data = array("response_status" => "0", "response_message" => "You Already Buying Rose");
            $app->response->setBody(json_encode($return_data));
        }
    } else {
        $return_data = array("response_status" => "0", "response_message" => "DECLINED - THE CARD YOU ENTERED IS NOT SUPPORTED ON THIS CURRENCY. PLEASE USE A DIFFERENT CARD TYPE OR USE PAYPAL");
        $app->response->setBody(json_encode($return_data));
    }
}

function getLocation() {
    global $HAMMU_BOL_Service;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");
    $id = $app->request()->params("id");
    $location = $app->request()->params("location");

    $urlencode_address = urlencode($location);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');
    $output = json_decode($geocode);
    $user_details = getUserInfo($inviteeId);

    if (!empty($output->results[0]->geometry->location->lng)) {
        $formatted_address = $output->results[0]->formatted_address;
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        $store_location_details = array(
            "meet_location" => $formatted_address,
            "latitude" => $latitude,
            "longitude" => $longitude
        );
        $addrr = json_encode($store_location_details);
        $rarray = $HAMMU_BOL_Service->get_location($inviterId, $inviteeId, $id, $addrr);
        $user_details['meet_location'] = $formatted_address;
        $user_details['latitude'] = $latitude;
        $user_details['longitude'] = $longitude;

        //print_r($user_details);
        $return_data = array("response_status" => "1", "response_message" => $user_details);
        $app->response->setBody(json_encode($return_data));
        //exit;
    } else {
        $return_data = array("response_status" => "0", "response_message" => "Invalid Location");
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

function getClientInvitesLog() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->findClienttLogByCrossIds($inviterId, $inviteeId);
    $datas = json_decode(json_encode($rarray, true), true);
//    print_r($datas);
//    die;
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
//                print_r($meet_location_result->meet_location);
//                exit;
        } else {
            if ($data_timestamp) {
                $data_content = date("Y-m-d H:i", $data_timestamp);
            }
        }
        $message = $language->text('hammu', $data["client_log"], array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content));

        $return_array[] = array(
            "message" => $message,
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

    $inviterId = $app->request()->params("inviterId");
    $inviteeId = $app->request()->params("inviteeId");

    $rarray = $HAMMU_BOL_Service->findEscortLogByCrossIds($inviterId, $inviteeId);
    $datas = json_decode(json_encode($rarray, true), true);
//    print_r($datas);
//    die;
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
//                print_r($meet_location_result->meet_location);
//                exit;
        } else {
            if ($data_timestamp) {
                $data_content = date("Y-m-d H:i", $data_timestamp);
            }
        }
        $message = $language->text('hammu', $data["escort_log"], array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content));

        $return_array[] = array(
            "message" => $message,
        );
    }
    $return_data = array("response_status" => "1", "data" => $return_array);
    $app->response->setBody(json_encode($return_data));
}

function escortCountNotification() {

    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $inviterId = $app->request()->params("inviterId");
//    $inviteeId = $app->request()->params("inviteeId");
//    $sql = "SELECT COUNT(*) as notification_count FROM " . OW_DB_PREFIX . "invites_log
//                        WHERE `flag` = '0'";

    $sql = "SELECT COUNT(*) as notification_count FROM " . OW_DB_PREFIX . "invites_log WHERE inviteeId={$inviterId}";

    $result = $OWgetDbo->queryForList($sql);

    if (!empty($result) && $result[0]['notification_count'] == "0") {
        $return_data = array("response_status" => "0", "response_message" => "You have no notification");
    } else {
        $notification_count = $result[0]['notification_count'];
        $return_data = array("response_status" => "1", "data" => $notification_count);
    }

    $app->response->setBody(json_encode($return_data));
}

function clientCountNotification() {

    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $inviterId = $app->request()->params("inviterId");

    $sql = "SELECT COUNT(*) as notification_count FROM " . OW_DB_PREFIX . "invites_log WHERE inviterId = {$inviterId} AND `flag` = '0'";

    $result = $OWgetDbo->queryForList($sql);

    if (!empty($result) && $result[0]['notification_count'] == "0") {
        $return_data = array("response_status" => "0", "response_message" => "No Data Available");
    } else {
        $notification_count = $result[0]['notification_count'];
        $return_data = array("response_status" => "1", "data" => $notification_count);
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
//    $statusArr = findOnlineStutusByIds($inviterId);
//    $availableStatus = $statusArr[0]['available'];
//    if ($availableStatus == "online") {

    $inviteeId_loop = null;
    $rarray = $HAMMU_BOL_Service->findEscortListByIds($inviterId);
    $datas = json_decode(json_encode($rarray, true), true);

    if (!empty($datas)) {
        $return_array = array();
        $data_content = "";
        foreach ($datas as $key => $data) {
            $flag = NULL;
            $inviteeUsername = $Userservice->getUserName($data["inviterId"]);
            $date = date("Y-m-d H:i", $data["timestamp"]);
            $time = date("H:i", $data["timestamp"]);
            $data_timestamp = $data["data"];
            if ($data_timestamp) {
                $data_content = date("Y-m-d H:i", $data_timestamp);
            }
            //echo $data_content = date("Y-m-d H:i", $data_timestamp);
            $message = $language->text('hammu', $data["action"] . "_noti", array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content));
            $flag = "none";

            if ($data["action"] == "invitation_sent" || $data["action"] == "client_re_arrange") {
                $flag = "accept";
            } else if ($data["action"] == "client_agree") {
                $flag = "propose_date";
            } else if ($data["action"] == 'buy_rose') {
                $flag = "location";
            }
            if ($inviteeId_loop != $data["inviterId"]) {
                $inviteeId_loop = $data["inviterId"];
                $user_infos = getUserInfo($inviteeId_loop);
            }

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
        $return_data = array("response_status" => "0", "response_message" => "You have No Notification");
        $app->response->setBody(json_encode($return_data));
    }
//}
}

function isJSON($string) {
    return is_string($string) && is_object(json_decode($string)) ? true : false;
}

function findOnlineStutusByIds($id) {
    global $OWgetDbo;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $sql = "SELECT available FROM " . OW_DB_PREFIX . "skapi WHERE userId={$id}";
    return $result = $OWgetDbo->queryForList($sql);
}

function client_notification_list() {
    global $HAMMU_BOL_Service;
    global $language;
    global $Userservice;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

    $inviterId = $app->request()->params("inviterId");
    $rarray = $HAMMU_BOL_Service->findClientListByIds($inviterId);
    $datas = json_decode(json_encode($rarray, true), true);

    if (!empty($datas)) {
        $return_array = array();
        $inviteeId_loop = null;
//$user_infos;
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
//                print_r($meet_location_result->meet_location);
//                exit;
            } else {
                if ($data_timestamp) {
                    $data_content = date("Y-m-d H:i", $data_timestamp);
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
                "action" => $data["action"],
                "seen_unseen" => $data["flag"],
                "inviteeId" => $data["inviteeId"],
                "user_info" => $user_infos,
                "date" => date("Y/m/d H:i", $data["timestamp"]),
            );
        }
        $return_data = array("response_status" => "1", "data" => $return_array);
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "You have No Notification");
        $app->response->setBody(json_encode($return_data));
    }
}

function update_invitation() {
    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
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
        $return_data = array("response_status" => "1", "data" => "Update Successfully");
    } else {
        $return_data = array("response_status" => "0", "data" => "Not Update");
    }
    $app->response->setBody(json_encode($return_data));
}

function update_invite_log() {
    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $Id = $app->request()->params("id");

    $sql = "UPDATE ow_invites_log SET `flag`='1' WHERE `id`='{$Id}'";
    $result = $OWgetDbo->update($sql);

    if (!empty($result)) {
        $return_data = array("response_status" => "1", "data" => "Update Successfully");
    } else {
        $return_data = array("response_status" => "0", "data" => "Not Update");
    }
    $app->response->setBody(json_encode($return_data));
}

function getUserInfo($userId) {
//    echo "call->" . $userId;
//    exit;
    global $BOL_AvatarService_inst;
    global $Userservice;
    global $QuestionService;
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
//$userInfo = $BOL_AvatarService_inst->getDataForUserAvatars(array($userId));

    $filed = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
    $all_services_preferences = getallquestions(array("user_id" => $userId, "fields" => $filed));

// echo "userid-->" . $userId;
// 'field_e9795a9d3be797f58aab38b1033265a4'
    $userinfoData = $QuestionService->getQuestionData(array($userId), array('id', 'username', 'birthdate', 'email', 'googlemap_location', HAMMU_DB_SERVICES_KEY, HAMMU_DB_MOBILE_NUMBER_KEY, HAMMU_DB_PRICE_KEY));
    $avatar = $BOL_AvatarService_inst->getDataForUserAvatars(array($userId));
    $onlineStatus = $Userservice->findOnlineStatusForUserList(array($userId));
//    print_r($onlineStatus);
//    exit;
    foreach ($all_services_preferences as $key => $user_services_preferences) {
        $user[HAMMU_DB_PRICE_KEY] = "";

        foreach ($userinfoData as $key => $user) {
//  print_r($user);

            $phone_number = "";
            if (!empty($user[HAMMU_DB_MOBILE_NUMBER_KEY])) {
                $phone_number = $user[HAMMU_DB_MOBILE_NUMBER_KEY];
            }
            $dob = date("d-m-Y", strtotime($user["birthdate"]));
            $age = ageCalculate($dob);
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
                "services" => $user_services_preferences['userSelectedLabel'],
                "available" => (!empty($onlineStatus[$key]) ? "Online" : "Offline"),
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

function getAccountType() {

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $account_post_val = $app->request()->params("sex");
    $filed = array(HAMMU_DB_PREFRENCES_KEY, HAMMU_DB_SERVICES_KEY);
    $all_services_preferences = getAllQuestionsAccountType($account_post_val, array("fields" => $filed));
//    print_r($all_services_preferences);
//    exit;
    $app->response->setBody(json_encode($all_services_preferences));
}

function getAllQuestionsAccountType($account_post_val, $param) {

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

    $sql = "SELECT * FROM " . OW_DB_PREFIX . "skadate_account_type_to_gender";
    $result = $OWgetDbo->queryForList($sql);
    foreach ($result as $key => $data) {
        //$label   = $questionService->getQuestionValueLang("sex", $data['genderValue']);
        $optionList[] = array(
            'label' => $questionService->getQuestionValueLang("sex", $data['genderValue']),
            'value' => $data['genderValue']
        );
    }
    $app->response->setBody(json_encode($optionList));
}

function getValueFromAccountType($account_type) {

    global $OWgetDbo;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);

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
    $languageService = $LanguageService;
    $currentLanguageId = $languageService->getCurrent()->getId();
    $langValueDto = $languageService->getValue($currentLanguageId, 'base', 'local_page_content_page-119658');
    $langValue = $langValueDto === null ? '' : $OW_Language->text('base', 'local_page_content_page-119658');
    $return_data = array("response_status" => "1", "data" => utf8_encode($langValue));
    $app->response->setBody(json_encode($return_data));
}

function contactUs() {
    global $CONTACTUS_BOL_Service;
    global $getMailer;


    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
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
    $messages = "Your message has been sent Successfully";
    $return_data = array(
        "response_status" => '1',
        "response_message" => $messages,
    );
    $app->response->setBody(json_encode($return_data));
}

function check_available() {
    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $Id = $app->request()->params("user_id");
    $status = $app->request()->params("status");

    $sql = "UPDATE ow_skapi SET `available`='{$status}' WHERE `userId`='{$Id}'";
    $result = $OWgetDbo->update($sql);

    if (!empty($result)) {
        $return_data = array("response_status" => "1", "data" => "Update Successfully");
    } else {
        $return_data = array("response_status" => "0", "data" => "Already Updated Please change your status");
    }
    $app->response->setBody(json_encode($return_data));
}

function findCurrentOnlineStutus() {
    global $OWgetDbo;

    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $Id = $app->request()->params("user_id");
    $sql = "SELECT available FROM " . OW_DB_PREFIX . "skapi WHERE userId={$Id}";
    $result = $OWgetDbo->queryForList($sql);
    $available = $result[0]['available'];
    $return_data = array("response_status" => "1", "response_message" => "Successfully", "data" => $available);
    $app->response->setBody(json_encode($return_data));
}

function favorite() {
    global $OWgetDbo;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $escort_id = $app->request()->params('escort_id');
    $type = $app->request()->params('type');
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "favorite WHERE `user_id`={$user_id} AND `escort_id`={$escort_id} AND `status`='Active'";
    $result = $OWgetDbo->queryForList($sql);
    if (!empty($result)) {
        $sql = "DELETE FROM ow_favorite WHERE `user_id`={$user_id} AND `escort_id`={$escort_id}";
        $OWgetDbo->delete($sql);
        $return_data = array("response_status" => "1", "response_message" => "Unfavorite Successfully");
        $app->response->setBody(json_encode($return_data));
    } else {
        $sql = "INSERT INTO ow_favorite (user_id,escort_id,type) VALUES ('$user_id','$escort_id','$type')";
        $OWgetDbo->insert($sql);
        $return_data = array("response_status" => "1", "response_message" => "Favorite Successfully");
        $app->response->setBody(json_encode($return_data));
    }
}

function checkUserOnline($user_id) {
    global $OWgetDbo;
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

function checkFavorite($escort_id) {
    global $OWgetDbo;
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "favorite WHERE `escort_id`={$escort_id}";
    return $favorite_list = $OWgetDbo->queryForList($sql);
//    foreach ($favorite_list as $value) {
//        print_r($value);
//        exit;
//    }
    //return $favorite_list[0]['status'];
    //is_favorite
    //exit;
}

function getFavoriteList() {
    global $OWgetDbo;
    global $photoService;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $sql = "SELECT * FROM " . OW_DB_PREFIX . "favorite WHERE `user_id`={$user_id} AND `status`='Active'";
    $favorite_list = $OWgetDbo->queryForList($sql);
    //print_r($favorite_list);

    if (!empty($favorite_list)) {
        foreach ($favorite_list as $key => $favorite) {
            $user_infos[] = getUserInfo($favorite['escort_id']);
            //$user_infos[$key]['image'] = $photoService->findPhotoListByUserId($favorite['escort_id'], 1, 500);
            //$return_array[] = $user_infos;
        }
//        print_r($user_infos);
//        exit;
        $return_data = array("response_status" => "1", "response_message" => "Successfully", "data" => $user_infos);
        $app->response->setBody(json_encode($return_data));
    } else {
        $return_data = array("response_status" => "0", "response_message" => "You have no favorite");
        $app->response->setBody(json_encode($return_data));
    }
}

function signOut() {
    global $OWgetDbo;
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    $sql = "DELETE FROM ow_base_user_online WHERE `userId`={$user_id}";
    $OWgetDbo->delete($sql);
    $return_data = array("response_status" => "1", "response_message" => "Logout Successfully");
    $app->response->setBody(json_encode($return_data));
}

function paymentDetails($payment_id, $state, $create_time, $platform, $user_id) {
    global $OWgetDbo;
    $sql1 = "INSERT INTO ow_base_payment (payment_id,state,create_time,platform,user_id) VALUES ('$payment_id','$state','$create_time','$platform','$user_id')";

    $result = $OWgetDbo->insert($sql1);
    //return $result;
}

function uploadPhoto() {
    global $language;
    global $PHOTO_BOL_PhotoService_inst;
    global $PHOTO_BOL_PhotoAlbumService;
    global $PHOTO_BOL_PhotoTemporaryService;
    global $BOL_AuthorizationService;
    global $getConfig;



    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setStatus(200);
    $user_id = $app->request()->params('user_id');
    //$data = $_POST;
    //$requdired_data = array("userId");
//    foreach ($required_data as $rdata) {
//        if (!array_key_exists($rdata, $data) || empty($data[$rdata])) {
//            $return = array("message" => "Please enter " . $rdata, "status" => "false");
//            echo json_encode($return);
//            exit();
//        }
//    }
    $language = $language;
    $userId = $user_id;
    $albumName = "randoms";
// Delete old temporary photos
    $tmpPhotoService = $PHOTO_BOL_PhotoTemporaryService;
    $photoService = $PHOTO_BOL_PhotoService_inst;
    $photoAlbumService = $PHOTO_BOL_PhotoAlbumService;
    $file = $_FILES['photo'];
    print_r($file);
    die;
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
                if ($photo) {
                    $return_data = array("response_status" => "1", "response_message" => "photo has been uploaded with success!");
                    $app->response->setBody(json_encode($return_data));
                } else {
//                    $json = array("message" => "photo not uploaded, something went wrong!", "status" => "false");
//                    echo json_encode($json);
//                    exit();
                    $return_data = array("response_status" => "0", "response_message" => "photo not uploaded, something went wrong!");
                    $app->response->setBody(json_encode($return_data));
                }
            }
        }
    } else {
//        $json = array("message" => $language->text('photo', 'no_photo_uploaded'), "status" => "false");
//        echo json_encode($json);
//        exit();
        $return_data = array("response_message" => $language->text('photo', 'no_photo_uploaded'), "response_status" => "0");
        $app->response->setBody(json_encode($return_data));
    }
//  }
}

/**
  Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
?>


