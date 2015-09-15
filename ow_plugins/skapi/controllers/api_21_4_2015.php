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

        if ($_POST['secureKey'] != 'ap+aP8584;~3M-:+u') {
            echo "Error: provide unique identification!";
            exit();
        }
        parent::__construct();
    }

    public function index(array $params) {
        echo "post_call->" . $_POST['post_id'];
        echo "call->" . $params['id'];
        echo "user_id->" . OW::getUser()->getId();
        echo "call";
        die;
    }

    public function login(array $params) {

        $post = $_POST;
        $token = null;
        // if (!OW::getUser()->isAuthenticated()) {
        if (empty($post["username"]) || empty($post["password"])) {
            throw new ErrorException();
        }

        $result = OW::getUser()->authenticate(new BASE_CLASS_StandardAuth($post["username"], $post["password"]));

        if (!$result->isValid()) {
            $messages = $result->getMessages();

//                throw new ApiResponseErrorException(array(
//            "message" => empty($messages) ? "" : $messages[0]
//                ));
//                throw new ErrorException(array(
//            "message" => empty($messages) ? "" : $messages[0]
//                ));
            $return_data = array(
                "status" => "false",
                "message" => "unsuccess",
                    // "token" => $token,
            );
            echo json_encode($return_data);
            exit();
        } else {
            $token = OW_Auth::getInstance()->getAuthenticator()->getId();
            $tokenauth = new OW_TokenAuthenticator($token);
            //echo "newuser->" . $user_id = BOL_AuthTokenDao::getInstance()->findUserIdByToken($token);
            $service = PHOTO_BOL_PhotoService::getInstance();

            $this->user = BOL_UserService::getInstance()->findUserById($result->getUserId());
            $user_id = $result->getUserId();
            $email = $this->user->getEmail();
            $username = $this->user->getUsername();
            $avatars = BOL_AvatarService::getInstance()->getAvatarsUrlList(array($user_id));
            $tokenauth->login($user_id);
            $token = $tokenauth->getToken();
//                $status = PHOTO_BOL_PhotoDao::STATUS_APPROVED;
//                $list = $service->findPhotoListByUserId($user_id, 1, 500, array());
//                echo '<pre>list->';
//                print_r($avatars);
//                echo '</pre>';
//                if ($list) {
//                    foreach ($list as $photo) {
//                        $result[] = self::preparePhotoData($photo['id'], $photo['hash'], $photo['dimension'], $photo['status']);
//                    }
//                }
            // $profile_pic = $result;
            $status = "true";
            $messages = "success";
            $return_data = array(
                "userid" => $user_id,
                "username" => $username,
                "email" => $email,
                "image" => $avatars[$user_id],
                "status" => "true",
                "message" => "success",
                    // "token" => $token,
            );
            echo json_encode($return_data);
            // }
            // $token = OW_Auth::getInstance()->getAuthenticator()->getId();
        }
//
//        $baseCtrl = new SKANDROID_ACTRL_Base();
//        $baseCtrl->siteInfo();
//        foreach ($baseCtrl->assignedVars as $key => $val) {
//            $this->assign($key, $val);
//        }
//        echo "token->" . $token = OW_Auth::getInstance()->getAuthenticator()->getId();
//        $tokenauth = new OW_TokenAuthenticator($token);
//        echo "user_id->" . $tokenauth->getUserId();
//        $this->assign("token", $token);
        exit();
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

}

