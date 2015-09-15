<?php

/**
 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.

 * ---
 * Copyright (c) 2011, Oxwall Foundation
 * All rights reserved.

 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the
 * following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice, this list of conditions and
 *  the following disclaimer.
 *
 *  - Redistributions in binary form must reproduce the above copyright notice, this list of conditions and
 *  the following disclaimer in the documentation and/or other materials provided with the distribution.
 *
 *  - Neither the name of the Oxwall Foundation nor the names of its contributors may be used to endorse or promote products
 *  derived from this software without specific prior written permission.

 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Admin page
 * @author Nurlan Dzhumakaliev <nurlanj@live.com>
 * @package ow_plugins.contactus.controllers
 * @since 1.0
 */
class HAMMU_CTRL_Admin extends ADMIN_CTRL_Abstract {

    public function index() {
        //$this->setPageTitle(OW::getLanguage()->text('contactus', 'admin_dept_title'));
        $this->setPageTitle('Hammu Setting page');
        $this->setPageHeading('Hammu Invites User logs');
        //export
        $InvitesLogForm = new InvitesLogForm;
        $this->addForm($InvitesLogForm);

        if (OW::getRequest()->isPost() && $InvitesLogForm->isValid($_POST)) {
//            echo '<pre>';
//            print_r($_POST);
            // die;
            if ($_POST["save"]) {
                if (empty($_POST["invitesIds"])) {
                    OW::getFeedback()->info("please select atleast one checkbox for export!");
                } else {
                    $this->exportSelected($_POST["invitesIds"], false);
                    //$InvitesLogForm->process();
                    // OW::getFeedback()->info("selected data export with success!");
                }
            } else if ($_POST["save2"]) {
                //OW::getFeedback()->info("all data export with success!");
                $this->exportSelected("", true);
            }
            $this->redirect();
        }

        $log_datas = array();
        $HAMMU_BOL_Service = HAMMU_BOL_Service::getInstance();
        //page
        $onPage = 20;
        $userCount = $HAMMU_BOL_Service->findCountActiveLogs();
        $page = isset($_GET['page']) && (int) $_GET['page'] ? (int) $_GET['page'] : 1;
        $first = ( $page - 1 ) * $onPage;
        $pages = (int) ceil($userCount / $onPage);
        $paging = new BASE_CMP_Paging($page, $pages, $onPage);

        $this->addComponent('paging', $paging);
        //



        $activeLogs = $HAMMU_BOL_Service->findActiveLogs($first, $onPage);

//        echo '<pre>';
//        print_r($activeLogs);
//        die;
        foreach ($activeLogs as $activeLog) {
            $log_datas[$activeLog->id] = $this->getClientInvitesLog($activeLog->inviterId, $activeLog->inviteeId);
        }
//        echo '<pre>';
//
//        print_r($log_datas);
//        echo '</pre>';
//        die;
        $script = '$(".check-all").click(function() {
            $("#check-all-check input:not(:disabled)[type=checkbox]").attr("checked", $(this).attr("checked") == "checked");
            $(".check-all").attr("checked", $(this).attr("checked") == "checked");
        });
        $("input.save_btn").click(function(){

        setTimeout(function(){
        //console.log("callsavebtn");
        //$("input.save_btn").addClass("call");
            $("input.save_btn").removeClass("ow_inprogress").addClass("ow_ic_save");
             $("input.save_btn2").removeClass("ow_inprogress").addClass("ow_ic_save");
}, 2000);

        });
$("input.save_btn2").click(function(){
        setTimeout(function(){
            $("input.save_btn").removeClass("ow_inprogress").addClass("ow_ic_save");
             $("input.save_btn2").removeClass("ow_inprogress").addClass("ow_ic_save");
}, 2000);

        });
';

        OW::getDocument()->addOnloadScript($script);
        $this->assign('log_datas', $log_datas);
    }

    public function getCurrentLanguages($lang_id) {
        $LanguageService = BOL_LanguageService::getInstance();
        OW::getSession()->set('base.language_id', $lang_id);
        $Langobj = $LanguageService->getCurrent()->setId($lang_id);
        $currentLanguageId = $LanguageService->getCurrent()->getId();
        return $currentLanguageId;
    }

    public function getClientInvitesLog($inviterId, $inviteeId) {
        $HAMMU_BOL_Service = HAMMU_BOL_Service::getInstance();
        $language = OW::getLanguage();
        $Userservice = BOL_UserService::getInstance();
//        $app = \Slim\Slim::getInstance();
//        $app->response->headers->set('Content-Type', 'application/json');
//        $app->response->setStatus(200);
        //Lang Call Start
        //$hammu_lang_id = $app->request()->params("lang_id");
        if (!empty($hammu_lang_id)) {
            $this->getCurrentLanguages($hammu_lang_id);
        }
        //Lang Call end
//        $inviterId = 175;
//        $inviteeId = 161;
        $rarray = $HAMMU_BOL_Service->findClienttLogByCrossIds($inviterId, $inviteeId);
        $datas = json_decode(json_encode($rarray, true), true);
        $return_array = array();
        $data_content = "";
        $location = "";
        $instruction = "";
        $meeting_time = "";
        $meeting_date = "";

        foreach ($datas as $key => $data) {
            $inviteeUsername = $Userservice->getUserName($data["inviteeId"]);
            $inviterUsername = $Userservice->getUserName($data["inviterId"]);

            $date = date("Y/m/d H:i", $data["timestamp"]);
            $time = date("H:i", $data["timestamp"]);
            $data_timestamp = $data["data"];
            $data_content = "";
            $json_string = $this->isJSON($data_timestamp);
            if (!empty($json_string)) {
                $meet_location_result = json_decode($data_timestamp);
                $meeting_data_arr = (array) $meet_location_result;
                if (in_array($meeting_data_arr['date'], $meeting_data_arr)) {
                    $data_content = $final_date = date("Y-m-d H:i", $meeting_data_arr['date']);
                    $meeting_date = date("Y-m-d", $meeting_data_arr['date']);
                    $meeting_time = date("H:i", $meeting_data_arr['date']);
                }
                if (in_array($meeting_data_arr['meet_location'], $meeting_data_arr)) {
                    $location = $meeting_data_arr['meet_location'];
                }
                if (in_array($meeting_data_arr['instruction'], $meeting_data_arr)) {
                    $instruction = $meeting_data_arr['instruction'];
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
            $message = $language->text('hammu', $data["client_log"], array('user' => $inviteeUsername, "date" => $date, "time" => $time, "data" => $data_content, "location" => $location, "instructions" => $instruction, "meeting_date" => $meeting_date, "meeting_time" => $meeting_time));
            $message = str_replace(array("your", "you", "You"), array($inviterUsername . "'s", $inviterUsername, $inviterUsername), $message);
            $return_array[] = array(
                "message" => $message,
                "log" => $data["client_log"],
                "user_id" => $id,
                "inviter_id" => $inviterId,
                "inviter_username" => $inviterUsername,
                "invitee_id" => $inviteeId,
                "invitee_username" => $inviteeUsername,
            );
        }

//        echo '<pre>';
//        print_r($return_array);
//        die;
        return $return_array;
        //return $return_data = array("response_status" => "1", "data" => $return_array);
    }

    public function isJSON($string) {
        return is_string($string) && is_object(json_decode($string)) ? true : false;
    }

    public function delete($params) {
        if (isset($params['id'])) {
            CONTACTUS_BOL_Service::getInstance()->deleteDepartment((int) $params['id']);
        }
        $this->redirect(OW::getRouter()->urlForRoute('contactus.admin'));
    }

    public function exportSelected($ids, $all = false) {
        if ($all == false) {
            for ($i = 0; $i < count($ids); $i++) {
                $inIds = array();
                $inIds = explode("_", $ids[$i]);
                $return_data[] = $this->getClientInvitesLog((int) $inIds[0], (int) $inIds[1]);
            }
        } else {
            $alldata = HAMMU_BOL_Service::getInstance()->findAllActiveLogs();
//            echo '<pre>';
//            print_r($alldata);
//            die;
            for ($i = 0; $i < count($alldata); $i++) {
                $return_data[] = $this->getClientInvitesLog((int) $alldata[$i]->inviterId, (int) $alldata[$i]->inviteeId);
            }
        }

        $currentDate = date('Y-m-d_H-i-s');
        $fname = 'log_' . $currentDate . '.xls';
        $plugindir = HAMMU_BOL_Service::getTmpDirPath();
        $filepath = $plugindir . $fname;
        // Write heading row in csv file
        $heading_row = array('Inviter', 'Invitee', 'Logs');

        $header = '';
        $data = '';
        $value = '';

        for ($h = 0; $h < count($heading_row); $h++) {
            $header .= $heading_row[$h] . "\t";
        }
        if (count($return_data) > 0) {
            for ($c = 0; $c < count($return_data); $c++) {

//                foreach ($return_data[$c] as $key => $value) {
//                    $return_data[$c][$key] = trim($value);
//                }
//                echo "key->" . $return_data[$c][0]['inviter_username'];

                $line = '';

                $inviter_name = (!empty($return_data[$c][0]['inviter_username']) ? $return_data[$c][0]['inviter_username'] : "");
                $invitee_name = (!empty($return_data[$c][0]['invitee_username']) ? $return_data[$c][0]['invitee_username'] : "");
                $log_message = "";
                $lfcr = ", ";
                for ($log = 0; $log < count($return_data[$c]); $log++) {
                    $log_message .= $return_data[$c][$log]["message"] . $lfcr;
                }
                //$log_message = wordwrap($log_message, 20, "\n");
                $content_row = array();
                $content_row = array($inviter_name, $invitee_name, $log_message);

                for ($a = 0; $a < count($content_row); $a++) {
                    //$data .= trim( $content_row[$a] ) . "\t";
                    if ((!isset($content_row[$a]) ) || ( $content_row[$a] == "" )) {
                        $value = "\t";
                    } else {
                        $value = $content_row[$a] . "\t";
                    }
                    $line .= $value;
                }

                $data .= trim($line) . "\n";
            }
        }

        ob_end_clean();
        header("Content-type:application/octet-stream");
        header("Content-Disposition:attachment;filename=$fname");
        header("Pragma: no-cache");
        header("Expires: 0");
        print "$header\n$data";
        header("Location: " . $_SERVER["PHP_SELF"]);
    }

}

class InvitesLogForm extends Form {

    public function __construct() {
        parent::__construct('invites-log-form');

        // submit
        $submit = new Submit('save');
        $submit->setValue("Export Selected");
        $this->addElement($submit);

        $submit = new Submit('save2');
        $submit->setValue("Export All");
        $this->addElement($submit);
    }

    public function process() {
        //$values = $this->getValues();
//        echo '<pre>';
//        print_r($values);
//        die;
    }

}

