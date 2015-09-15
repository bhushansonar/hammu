<?php

/**

 * Copyright (c) 2012, Oxwall CandyStore

 * All rights reserved.



 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is

 * licensed under The BSD license.

 */

/**

 * User guests page controller.

 *

 * @author Oxwall CandyStore <plugins@oxcandystore.com>

 * @package ow.ow_plugins.ocs_guests.controllers

 * @since 1.3.1

 */
class SKAPI_CTRL_Api extends OW_ActionController {

    private $user;

    public function __construct() {


        $securekey = trim($_POST['secureKey']);

        if ($securekey != '1234') {

            echo "Error: provide unique identification!";

            exit();
        }

        parent::__construct();
    }

    public function index(array $params) {

        echo "param->" . print_r($params);

        echo "post_call->" . $_POST['post_id'];

        echo "call->" . $params['id'];

        echo "user_id->" . OW::getUser()->getId();

        echo "call";

        die;
    }

    public function login() {

        $post = $_POST;
        $token = null;

        $required_data = array("username", "password");
        foreach ($required_data as $rdata) {
            if (!array_key_exists($rdata, $post) || empty($post[$rdata])) {
                $return = array("response_message" => "Please enter " . $rdata, "response_status" => "0");
                echo json_encode($return);
                exit();
            }
        }
        if (empty($post["username"]) || empty($post["password"])) {
            throw new ErrorException();
        }
        $deviceId = $post["token"];
        $deviceType = $post["type"];

        $email_check = BOL_UserDao::getInstance()->findUserByUsernameOrEmail($post["username"]);
        $email_exits = count($email_check);

        if ($email_exits != '1') {
            $messages = "Sorry!!! Your email is not  registered";
            $return_data = array(
                "response_status" => '0',
                "response_message" => $messages,
            );
            echo json_encode($return_data);
            exit();
        } else {
            $result = OW::getUser()->authenticate(new BASE_CLASS_StandardAuth($post["username"], $post["password"]));
            if (!$result->isValid()) {
                $messages = $result->getMessages();
                $messages = "Sorry!!! Your password doesnot match. Please try again";
                $return_data = array(
                    "response_status" => '0',
                    "response_message" => $messages,
                );
                echo json_encode($return_data);
                exit();
            } else {
                $token = OW_Auth::getInstance()->getAuthenticator()->getId();
                $tokenauth = new OW_TokenAuthenticator($token);
                $service = PHOTO_BOL_PhotoService::getInstance();
                $this->user = BOL_UserService::getInstance()->findUserById($result->getUserId());
                $email = $this->user->getEmail();
                $account_type = $this->user->getAccountType();
                if ($account_type == "8cc28eaddb382d7c6a94aeea9ec029fb") {
                    $sex = "lady";
                } else {
                    $sex = "gentleman";
                }
                $username = $this->user->getUsername();
                $user_id = $result->getUserId();
                $avatars = BOL_AvatarService::getInstance()->getAvatarsUrlList(array($user_id));
                $check_exist_value = SKAPI_BOL_Service::getInstance()->findValueExistOrNot($user_id);
//                echo "<pre>";
//                print_r($check_exist_value);
//                exit;
                $count_content = count($check_exist_value);

                if ($count_content == "0") {
                    $user_details = SKAPI_BOL_Service::getInstance()->createUserDetails($user_id, $deviceId, $deviceType);
                }

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
                echo json_encode($return_data);
                exit();
            }
        }
    }

    public function signup(array $params) {

        $data = $_POST;

//        echo "data->" . $params['data'];
//        die;
//        if (empty($params['data'])) {
//            throw new ApiResponseErrorException();
//        }
//
//        $data = json_decode($params['data'], true);
//        $facebookId = (int) $data['facebookId'];
//        $authAdapter = new OW_RemoteAuthAdapter($facebookId, 'facebook');
//
//        $nonQuestions = array('name', 'email', 'avatarUrl');
//        $nonQuestionsValue = array();
//        foreach ( $nonQuestions as $name )
//        {
//            $nonQuestionsValue[$name] = empty($data[$name]) ? null : $data[$name];
//            unset($data[$name]);
//        }
//
//        $data['realname'] = $nonQuestionsValue['name'];

        $this->checkuserexists($data);

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

            $userdata = $this->respondUserData($user->id);
        } else {

            $userdata = array("status" => "false", "message" => "unsuccess");
        }

        echo json_encode($userdata);

        exit();
    }

    public function facebooklogin(array $params) {

        $data = $_POST;

        $facebookId = (int) $data['facebookid'];

        $email = (int) $data['email'];

        $authAdapter = new OW_RemoteAuthAdapter($facebookId, 'facebook');



//        $nonQuestions = array('name', 'email', 'avatarUrl');
//        $nonQuestionsValue = array();
//        foreach ( $nonQuestions as $name )
//        {
//            $nonQuestionsValue[$name] = empty($data[$name]) ? null : $data[$name];
//            unset($data[$name]);
//        }
//
//        $data['realname'] = $nonQuestionsValue['name'];

        $email = trim($data['email']);

        $this->checkfacebookuserexists($data);

        $password = uniqid();

        $tmpUsername = explode('@', $email);

        $username = $tmpUsername[0];

        $username = trim(preg_replace('/[^\w]/', '', $username));

        $username = $this->makeUsername($username);

        $newUser = false;

        $data['realname'] = $username;

        $accountype = (int) $data["sex"]; //(1 = Female, 2 = Male)

        $data["sex"] = (int) $data["sex"];

        $UserDob = date("Y/m/d", strtotime($data["birthdate"]));

        $data["birthdate"] = $UserDob;

        try {
            $user = BOL_UserService::getInstance()->createUser($username, $password, $email, $accountype, true);
            $newUser = true;
        } catch (LogicException $ex) {

            $userdata = array("status" => "false", "message" => "unsuccess", "error" => $ex->getCode());

            echo json_encode($userdata);

            exit();
        }



//        if (!empty($data['custom_location'])) {
//            $data['googlemap_location'] = json_decode($data['custom_location'], true);
//            $data['googlemap_location']['json'] = $data['custom_location'];
//            unset($data['custom_location']);
//        }



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

//        echo "got here";

        BOL_QuestionService::getInstance()->saveQuestionsData(array_filter($data), $user->id);

//        echo "suceees";
//        die;

        $avatarUrl = 'http://graph.facebook.com/' . $facebookId . '/picture?type=large&height=400&width=400';

        $pluginfilesDir = OW::getPluginManager()->getPlugin('skapi')->getPluginFilesDir();

        $ext = 'jpg';

        $tmpFile = $pluginfilesDir . uniqid('avatar-') . (empty($ext) ? '' : '.' . $ext);

        @copy($avatarUrl, $tmpFile);



        if (file_exists($tmpFile)) {

            BOL_AvatarService::getInstance()->setUserAvatar($user->id, $tmpFile);

            @unlink($tmpFile);
        }



        if (!$authAdapter->isRegistered()) {

            $authAdapter->register($user->id);
        }



        if ($newUser) {

            $event = new OW_Event(OW_EventManager::ON_USER_REGISTER, array(
                'method' => 'facebook',
                'userId' => $user->id,
                'params' => array()
            ));

            OW::getEventManager()->trigger($event);
        }



        $userdata = $this->respondUserData($user->id);

        echo json_encode($userdata);

        exit();

//$this->assign('success', true);
    }

    public function updateprofile(array $params) {

        $data = $_POST;

        die;

        //echo "print->" . $p = BOL_QuestionService::getInstance()->findRealQuestionValues('realname');
        // BOL_QuestionService::getInstance()->get
        //  die;
        //Question services
//        $questionService = BOL_QuestionService::getInstance();
//        $accountType = SKADATE_BOL_AccountTypeToGenderService::getInstance()->getAccountType(2);
//        $questionNames = array();
//        $exclideQuestions = array('password', 'username', 'email');
//
//        if (!empty($data['email'])) {
//            $exclideQuestions[] = 'email';
//        }
//
//        foreach ($questionService->findSignUpQuestionsForAccountType(2) as $question) {
//            if (in_array($question['name'], $exclideQuestions)) {
//                continue;
//            }
//
//            $questionNames[] = $question['name'];
//        }
//        echo '<pre>';
//        print_r($questionNames);
//        echo '</pre>';
//        $questionList = $questionService->findQuestionByNameList($questionNames);
//        echo '<pre>Question list->';
//        print_r($questionList);
//        $sectionNameList = array();
//
//        foreach ($questionList as $question) {
//            if (!in_array($question->sectionName, $sectionNameList)) {
//                $sectionNameList[] = $question->sectionName;
//            }
//        }
//
//        $sectionList = $questionService->findSectionBySectionNameList($sectionNameList);
//
//        usort($questionList, function( $a, $b ) use ($sectionList) {
//                    $sectionNameA = $a->sectionName;
//                    $sectionNameB = $b->sectionName;
//
//                    if ($sectionNameA === $sectionNameB) {
//                        return ((int) $a->sortOrder < (int) $b->sortOrder) ? -1 : 1;
//                    }
//
//                    if (!isset($sectionList[$sectionNameA]) || !isset($sectionList[$sectionNameB])) {
//                        return 1;
//                    }
//
//                    return ((int) $sectionList[$sectionNameA]->sortOrder < (int) $sectionList[$sectionNameB]->sortOrder) ? -1 : 1;
//                });
//
//        $questionOptions = $questionService->findQuestionsValuesByQuestionNameList($questionNames);
//        $questions = $category = array();
//
//        foreach ($questionList as $question) {
//            $custom = json_decode($question->custom, true);
//            $value = null;
//
//            switch ($question->presentation) {
//                case BOL_QuestionService::QUESTION_PRESENTATION_RANGE :
//                    $value = '18-33';
//                    break;
//
//                case BOL_QuestionService::QUESTION_PRESENTATION_BIRTHDATE :
//                case BOL_QuestionService::QUESTION_PRESENTATION_AGE :
//                case BOL_QuestionService::QUESTION_PRESENTATION_DATE :
//                    $value = date('Y-m-d H:i:s', strtotime('-18 year'));
//                    break;
//            }
//
//            if (!isset($category[$question->sectionName])) {
//                $category[$question->sectionName] = array(
//                    'category' => $question->sectionName,
//                    'label' => $questionService->getSectionLang($question->sectionName)
//                );
//            }
//
//            $questions[] = array(
//                'id' => $question->id,
//                'name' => $question->name,
//                'label' => $questionService->getQuestionLang($question->name),
//                'custom' => $custom,
//                'presentation' => $question->name == 'googlemap_location' ? $question->name : $question->presentation,
//                'options' => self::formatOptionsForQuestion($question->name, $questionOptions),
//                'value' => $value,
//                'rawValue' => $value,
//                'sectionName' => $question->sectionName,
//                'required' => $question->required
//            );
//        }
//        echo '<pre>Questions->';
//        print_r($questions);
//        die;

        if (empty($data['user_id'])) {

            $userdata = array("status" => "false", "message" => "unsuccess", "error" => "Please provide user id!");

            echo json_encode($userdata);

            exit();
        }

        //$userData = BOL_QuestionService::getInstance()->getQuestionData(array($data['user_id']), array('sex', 'birthdate', 'googlemap_location'));
        // echo '<pre>call->';
        //print_r($userData);
        //die;

        $data_save = array();

        $user_id = (int) $data['user_id'];



        if (!empty($data['realname'])) {

            $data_save['realname'] = $data['realname'];
        }



        if (!empty($data['sex'])) {

            $data_save["sex"] = (int) $data["sex"];
        }



        if (!empty($data['birthdate'])) {

            $UserDob = date("Y/m/d", strtotime($data["birthdate"]));

            $data_save["birthdate"] = $UserDob;
        }



        if (!empty($data['occupation'])) {

            $data_save['occupation'] = $data['occupation'];
        }



        if (!empty($data['afrocentric_definition'])) {

            $data_save['afrocentric_definition'] = $data['afrocentric_definition'];
        }

        if (!empty($data['my_bio'])) {

            $data_save['field_2f178763fd5110e2f466be0d3694b8ce'] = $data['my_bio'];
        }



        if (!empty($data['i_am_at_least_18_years_old'])) {

            $data_save['i_am_at_least_18_years_old'] = $data['i_am_at_least_18_years_old'];
        }



        if (!empty($data["address"])) {



            $urlencode_address = urlencode($data["address"]);

            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $urlencode_address . '&sensor=false');

            $output = json_decode($geocode);



            if (!empty($output->results[0]->formatted_address)) {

                $data_save['googlemap_location']['address'] = $output->results[0]->formatted_address;

                $data_save['googlemap_location']['latitude'] = $output->results[0]->geometry->location->lat;

                $data_save['googlemap_location']['longitude'] = $output->results[0]->geometry->location->lng;

                $data_save['googlemap_location']['northEastLat'] = $output->results[0]->geometry->bounds->northeast->lat;

                $data_save['googlemap_location']['northEastLng'] = $output->results[0]->geometry->bounds->northeast->lng;

                $data_save['googlemap_location']['southWestLat'] = $output->results[0]->geometry->bounds->southwest->lat;

                $data_save['googlemap_location']['southWestLng'] = $output->results[0]->geometry->bounds->southwest->lng;

                $data_save['googlemap_location']['json'] = json_encode($output->results[0]);
            }
        }

        //update user avatar

        if (!empty($data['avatar_url'])) {



            $avatarUrl = $data['avatar_url'];

            $pluginfilesDir = OW::getPluginManager()->getPlugin('skapi')->getPluginFilesDir();

            $ext = 'jpg';

            $tmpFile = $pluginfilesDir . uniqid('avatar-') . (empty($ext) ? '' : '.' . $ext);

            @copy($avatarUrl, $tmpFile);



            if (file_exists($tmpFile)) {

                BOL_AvatarService::getInstance()->setUserAvatar($user_id, $tmpFile);

                @unlink($tmpFile);
            }
        }

        $updated = BOL_QuestionService::getInstance()->saveQuestionsData(array_filter($data_save), $user_id);



        //BOL_QuestionService::getInstance()->findRealQuestionValues($questionName);

        if ($updated) {

            $userService = BOL_UserService::getInstance();

            $reportedUser = $userService->findUserById($user_id);

            $id = $reportedUser->getId();

            $username = $reportedUser->getUsername();

            $email = $reportedUser->getEmail();

            $avatar = BOL_AvatarService::getInstance()->getAvatarUrl($user_id);



            $userData = BOL_QuestionService::getInstance()->getQuestionData(array($user_id), array('sex', 'birthdate', 'googlemap_location'));



            $UserDob = date("Y/m/d", strtotime($userData[$user_id]["birthdate"]));

            $birthdate = $UserDob;



            $userdata = array("id" => $id, "username" => $username, "avatar" => $avatar, "birthdate" => $birthdate, "message" => "Profile updated with success!", "status" => "true");
        } else {

            $userdata = array("message" => "Please provide proper Profile data!", "status" => "false");
        }

        echo json_encode($userdata);

        exit();
    }

    private function respondUserData($userId) {

        OW::getUser()->login($userId);

        $userService = BOL_UserService::getInstance();

        $reportedUser = $userService->findUserById($userId);

        $id = $reportedUser->getId();

        $username = $reportedUser->getUsername();

        $email = $reportedUser->getEmail();

        $avatar = BOL_AvatarService::getInstance()->getAvatarUrl($userId);

        //$assigns['userUrl'] = OW_URL_HOME . 'user/' . $reportedUser->getUsername();

        if (!empty($avatar)) {

            $userdata = array("id" => $id, "email" => $email, "username" => $username, "avatar" => $avatar, "message" => "success", "status" => "true");
        } else {

            $userdata = array("id" => $id, "email" => $email, "username" => $username, "message" => "success", "status" => "true");
        }

        return $userdata;

        exit();
    }

    private function checkuserexists($data) {

        $email = $data['email'];

        $username = $data['username'];

        $userService = BOL_UserService::getInstance();

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

    private function checkfacebookuserexists($data) {



        $email = trim($data['email']);

        $userService = BOL_UserService::getInstance();

        $reportedUser_email = $userService->findByEmail($email);

        if ($reportedUser_email) {

            $user_id = $reportedUser_email->getId();

            $avatar = BOL_AvatarService::getInstance()->getAvatarUrl($user_id);

//$respond = $this->respondUserData($userId);

            OW::getUser()->login($user_id);

            $userService = BOL_UserService::getInstance();

            $reportedUser = $userService->findUserById($user_id);

            $id = $reportedUser->getId();

            $username = $reportedUser->getUsername();

            $email = $reportedUser->getEmail();



//$assigns['userUrl'] = OW_URL_HOME . 'user/' . $reportedUser->getUsername();

            if (!empty($avatar)) {

                $userdata = array("id" => $id, "email" => $email, "username" => $username, "avatar" => $avatar, "message" => "success in login! Alrady registered user!", "status" => "true");
            } else {

                $userdata = array("id" => $id, "email" => $email, "username" => $username, "message" => "success in login! Alrady registered user!", "status" => "true");
            }

            echo json_encode($userdata);

            exit();
        }
    }

    private function makeUsername($username) {

        $counter = 0;



        while (BOL_UserService::getInstance()->isExistUserName($username)) {

            $counter++;

            $username .= $counter;
        }



        return $username;
    }

    public static function preparePhotoData($id, $hash, $dimensions = array(), $status = null) {

        $service = PHOTO_BOL_PhotoService::getInstance();



        $result['id'] = $id;



        $thumbKey = PHOTO_BOL_PhotoService::TYPE_SMALL;

        $galleryKey = PHOTO_BOL_PhotoService::TYPE_PREVIEW;

        $mainKey = PHOTO_BOL_PhotoService::TYPE_MAIN;



        $dimensions = !empty($dimensions) ? json_decode($dimensions, true) : null;

        $hasGallerySize = isset($dimensions[$galleryKey][0]) && isset($dimensions[$galleryKey][1]);

        $hasMainSize = isset($dimensions[$mainKey][0]) && isset($dimensions[$mainKey][1]);



// thumb

        if ($id && $hash) {

            $result['thumbUrl'] = $service->getPhotoUrlByType($id, $thumbKey, $hash);
        }

        $result['thumbWidth'] = !empty($dimensions[$thumbKey][0]) ? $dimensions[$thumbKey][0] : PHOTO_BOL_PhotoService::DIM_SMALL_WIDTH;

        $result['thumbHeight'] = !empty($dimensions[$thumbKey][1]) ? $dimensions[$thumbKey][1] : PHOTO_BOL_PhotoService::DIM_SMALL_HEIGHT;



// gallery

        if ($id && $hash) {

            $result['galleryUrl'] = $service->getPhotoUrlByType($id, $hasGallerySize ? $galleryKey : $thumbKey, $hash);
        }

        $result['galleryWidth'] = $hasGallerySize ? $dimensions[$galleryKey][0] : $result['thumbWidth'];

        $result['galleryHeight'] = $hasGallerySize ? $dimensions[$galleryKey][1] : $result['thumbHeight'];



// main

        if ($id && $hash) {

            $result['mainUrl'] = $service->getPhotoUrlByType($id, $hasMainSize ? $mainKey : $thumbKey, $hash);
        }

        $result['mainWidth'] = $hasMainSize ? $dimensions[$mainKey][0] : $result['thumbWidth'];

        $result['mainHeight'] = $hasMainSize ? $dimensions[$mainKey][1] : $result['thumbHeight'];



        $result["approved"] = $status == PHOTO_BOL_PhotoDao::STATUS_APPROVED ? true : false;



        return $result;
    }

    private static function formatOptionsForQuestion($name, $allOptions) {

        $options = array();

        $questionService = BOL_QuestionService::getInstance();



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

}

