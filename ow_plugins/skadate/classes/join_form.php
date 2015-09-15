<?php

/**
 * Copyright (c) 2014, Skalfa LLC
 * All rights reserved.
 *
 * ATTENTION: This commercial software is intended for exclusive use with SkaDate Dating Software (http://www.skadate.com) and is licensed under SkaDate Exclusive License by Skalfa LLC.
 *
 * Full text of this license can be found at http://www.skadate.com/sel.pdf
 */
require_once OW_DIR_SYSTEM_PLUGIN . 'base' . DS . 'controllers' . DS . 'join.php';

class SKADATE_CLASS_JoinForm extends JoinForm {

    public function __construct($controller) {

        $this->setId(UTIL_HtmlTag::generateAutoId('form'));
        $this->setMethod(self::METHOD_POST);
        $this->setAjaxResetOnSuccess(true);
        $this->setAjaxDataType(self::AJAX_DATA_TYPE_JSON);
        $this->bindedFunctions = array(self::BIND_SUBMIT => array(), self::BIND_SUCCESS => array());
        $this->setEmptyElementsErrorMessage(OW::getLanguage()->text('base', 'form_validate_common_error_message'));

        $formNameHidden = new HiddenField('form_name');
        $formNameHidden->setValue('joinForm');
        $this->addElement($formNameHidden);

        $this->setName('joinForm');

        $this->setId('joinForm');

        $stamp = OW::getSession()->get(self::SESSION_START_STAMP);

        if (empty($stamp)) {
            OW::getSession()->set(self::SESSION_START_STAMP, time());
        }

        unset($stamp);

        $this->checkSession();

        $stepCount = 1;
        $joinSubmitLabel = "";

        // get available account types from DB
        $accounts = $this->getAccountTypes();

        $joinData = OW::getSession()->get(self::SESSION_JOIN_DATA);

        if (!isset($joinData) || !is_array($joinData)) {
            $joinData = array();
        }

        $accountsKeys = array_keys($accounts);
        $this->accountType = $accountsKeys[0];

        if (isset($joinData['accountType'])) {
            $this->accountType = trim($joinData['accountType']);
        }

        $step = $this->getStep();

        if (count($accounts) > 1) {
            $this->stepCount = 2;
            switch ($step) {
                case 1:
                    $this->displayAccountType = true;
                    $joinSubmitLabel = OW::getLanguage()->text('base', 'join_submit_button_continue');
                    break;

                case 2:
                    $this->isLastStep = true;
                    $joinSubmitLabel = OW::getLanguage()->text('base', 'join_submit_button_join');
                    break;
            }
        } else {
            $this->isLastStep = true;
            $joinSubmitLabel = OW::getLanguage()->text('base', 'join_submit_button_join');
        }

        $joinSubmit = new Submit('joinSubmit');
        $joinSubmit->addAttribute('class', 'ow_button ow_ic_submit');
        $joinSubmit->setValue($joinSubmitLabel);
        $this->addElement($joinSubmit);
        //
        $questionValueList = BOL_QuestionService::getInstance()->findQuestionsValuesByQuestionNameList(array('field_8eb4e427b80ac66d870fc0a5a0cc22ba'));
//        echo "<pre>";
//        print_r($questionValueList);
//        echo "</pre>";
//        $new = new RadioField('field_8eb4e427b80ac66d870fc0a5a0cc22ba');
//        $new->setLabel(BOL_QuestionService::getInstance()->getQuestionLang('field_8eb4e427b80ac66d870fc0a5a0cc22ba'));
//        $new->setRequired();
//
//        $this->setFieldOptions($new, 'field_8eb4e427b80ac66d870fc0a5a0cc22ba', $questionValueList['field_8eb4e427b80ac66d870fc0a5a0cc22ba']);
//
//        if (!empty($joinData['field_8eb4e427b80ac66d870fc0a5a0cc22ba'])) {
//            $new->setValue($joinData['field_8eb4e427b80ac66d870fc0a5a0cc22ba']);
//        }
//
//        $this->addElement($new);

        /* if ( $this->displayAccountType )
          {
          $questionValueList = BOL_QuestionService::getInstance()->findQuestionsValuesByQuestionNameList(array('sex', 'match_sex'));

          $sex = new RadioField('sex');
          $sex->setLabel(BOL_QuestionService::getInstance()->getQuestionLang('sex'));
          $sex->setRequired();

          $this->setFieldOptions($sex, 'sex', $questionValueList['sex']);

          if ( !empty($joinData['sex']) )
          {
          $sex->setValue($joinData['sex']);
          }

          $this->addElement($sex);

          $matchSex = new RadioField('match_sex');
          $matchSex->setLabel(BOL_QuestionService::getInstance()->getQuestionLang('match_sex'));
          $matchSex->setRequired();

          $this->setFieldOptions($matchSex, 'match_sex', $questionValueList['match_sex']);

          if ( !empty($joinData['match_sex']) )
          {
          $matchSex->setValue($joinData['match_sex']);
          }

          $this->addElement($matchSex);
          } */

        $this->getQuestions();

        $section = null;
        //$this->questionListBySection = array();
        $questionNameList = array();
        $this->sortedQuestionsList = array();
//        echo '<pre>';
//        print_r($this->questions);
//        echo '</pre>';
        foreach ($this->questions as $sort => $question) {
            if ((string) $question['base'] === '0' && $step === 2 || $step === 1) {
                if ($section !== $question['sectionName']) {
                    $section = $question['sectionName'];
                }

                //$this->questionListBySection[$section][] = $this->questions[$sort];
                $questionNameList[] = $this->questions[$sort]['name'];
                if (!empty($_SESSION["joinData"][HAMMU_DB_IM_USING_HAMMU_AS_KEY]) && $_SESSION["joinData"][HAMMU_DB_IM_USING_HAMMU_AS_KEY] == 1) {
                    if ($question['name'] == HAMMU_DB_PRICE_KEY) {
                        unset($this->questions[$sort]);
                    }
                    if ($question['name'] == HAMMU_DB_METTING_POINT_KEY) {
                        unset($this->questions[$sort]);
                    }
                } else {
                    if ($question['name'] == HAMMU_DB_PAYMENT_TYPE_KEY) {
                        unset($this->questions[$sort]);
                    }
                }
                $this->sortedQuestionsList[] = $this->questions[$sort];
            }
        }
//        echo '<pre>';
//        print_r($questionNameList);
//        echo '</pre>';
        $this->questionValuesList = BOL_QuestionService::getInstance()->findQuestionsValuesByQuestionNameList($questionNameList);

//        echo '<pre>';
//        print_r($this->sortedQuestionsList);
//        echo '</pre>';
//        echo '<pre>';
//        print_r($this->questionValuesList);
//        echo '</pre>';
//field_538100b702f6e0ff23756c14be12281b
        $this->addFakeQuestions();

        $this->addQuestions($this->sortedQuestionsList, $this->questionValuesList, $this->updateJoinData());
//        echo '<pre>';
//        print_r($this->questionListBySection);
//        echo '</pre>';
        $this->setQuestionsLabel();

        $this->addClassToBaseQuestions();

        if ($this->isLastStep) {
            $this->addLastStepQuestions($controller);
        }
        //  $questionValueList = BOL_QuestionService::getInstance()->findQuestionsValuesByQuestionNameList(array('field_8eb4e427b80ac66d870fc0a5a0cc22ba'));
//        $new = new Selectbox('field_8eb4e427b80ac66d870fc0a5a0cc22ba');
//        $new->setLabel(BOL_QuestionService::getInstance()->getQuestionLang('field_8eb4e427b80ac66d870fc0a5a0cc22ba'));
//        $new->setRequired();
//
//        $this->setFieldOptions($new, 'field_8eb4e427b80ac66d870fc0a5a0cc22ba', $questionValueList['field_8eb4e427b80ac66d870fc0a5a0cc22ba']);
//
//        if (!empty($joinData['field_8eb4e427b80ac66d870fc0a5a0cc22ba'])) {
//            $new->setValue($joinData['field_8eb4e427b80ac66d870fc0a5a0cc22ba']);
//        }
//
//        $this->addElement($new);

        $controller->assign('step', $step);
        $controller->assign('questionArray', $this->questionListBySection);
        $controller->assign('displayAccountType', $this->displayAccountType);
        $controller->assign('isLastStep', $this->isLastStep);
    }

    public function getRealValues() {
        $list = $this->sortedQuestionsList;

        $values = $this->getValues();
        $result = array();

        if (!empty($list)) {
            foreach ($values as $fakeName => $value) {
                if (!empty($list[$fakeName]) && isset($list[$fakeName]['fake']) && $list[$fakeName]['fake'] == false) {
                    $result[$list[$fakeName]['realName']] = $value;
                }

                if ($fakeName == 'accountType') {
                    $result[$fakeName] = $value;
                }
            }

            if (!empty($result['sex'])) {

                $gender2accountType = SKADATE_BOL_AccountTypeToGenderService::getInstance()->findAll();

                if (!empty($gender2accountType)) {
                    /* @var $dto SKADATE_BOL_AccountTypeToGender */
                    foreach ($gender2accountType as $dto) {
                        if ($dto->genderValue == $result['sex']) {
                            $result['accountType'] = $dto->accountType;
                        }
                    }
                }
            }
        }

        return $result;
    }

    public function getQuestions() {
        $this->questions = array();

        if ($this->isLastStep) {
            $this->questions = BOL_QuestionService::getInstance()->findSignUpQuestionsForAccountType($this->accountType);

            foreach ($this->questions as $key => $question) {
                if (in_array($question['name'], array('sex', 'match_sex', HAMMU_DB_IM_USING_HAMMU_AS_KEY))) {
                    unset($this->questions[$key]);
                }
            }
        } else {
            $this->questions = BOL_QuestionService::getInstance()->findBaseSignUpQuestions();

            $questionDtoList = BOL_QuestionService::getInstance()->findQuestionByNameList(array('sex', 'match_sex', HAMMU_DB_IM_USING_HAMMU_AS_KEY));
//            echo 'getquestion<pre>';
//            print_r($this->questions);
//            echo '</pre>';
            if (!empty($questionDtoList['sex'])) {
                $sex = get_object_vars($questionDtoList['sex']);
                array_push($this->questions, $sex);
            }

            if (!empty($questionDtoList['match_sex'])) {
                $matchSex = get_object_vars($questionDtoList['match_sex']);
                array_push($this->questions, $matchSex);
            }
            if (!empty($questionDtoList[HAMMU_DB_IM_USING_HAMMU_AS_KEY])) {
                $newfield = get_object_vars($questionDtoList[HAMMU_DB_IM_USING_HAMMU_AS_KEY]);
                array_push($this->questions, $newfield);
            }
        }
    }

}
