<?php

/**
 * Copyright (c) 2013, Podyachev Evgeny <joker.OW2@gmail.com>
 * All rights reserved.

 * ATTENTION: This commercial software is intended for use with Oxwall Free Community Software http://www.oxwall.org/
 * and is licensed under Oxwall Store Commercial License.
 * Full text of this license can be found at http://www.oxwall.org/store/oscl
 */
class GOOGLELOCATION_CTRL_Admin extends ADMIN_CTRL_Abstract
{

    /**
     * Default action
     */
    public function index()
    {
        $language = OW::getLanguage();

        $this->setPageHeading($language->text('googlelocation', 'admin_page_heading'));
        //$this->setPageTitle($language->text('googlelocation', 'admin_page_title'));
        $this->setPageHeadingIconClass('ow_ic_comment');

        $configSaveForm = new GoogleLocationConfigForm();
        $this->addForm($configSaveForm);

        if ( OW::getRequest()->isPost() && $configSaveForm->isValid($_POST) )
        {
            $configSaveForm->process();
            OW::getFeedback()->info($language->text('googlelocation', 'settings_updated'));
            $this->redirect();
        }
        
        OW::getEventManager()->trigger(new OW_Event('googlelocation.add_js_lib'));
    }
}

/**
 * Save Configurations form class
 */
class GoogleLocationConfigForm extends Form
{

    /**
     * Class constructor
     *
     */
    public function __construct()
    {
        parent::__construct('configSaveForm');

        $language = OW::getLanguage();

        $configs = OW::getConfig()->getValues('googlelocation');

        $element = new TextField('api_key');
        $element->setValue($configs['api_key']);

        $validator = new StringValidator(0, 40);
        $validator->setErrorMessage($language->text('googlelocation', 'api_key_too_long'));

        $element->addValidator($validator);
        $this->addElement($element);
        
        $options = array(
            GOOGLELOCATION_BOL_LocationService::DISTANCE_UNITS_MILES => $language->text('googlelocation', 'miles'),
            GOOGLELOCATION_BOL_LocationService::DISTANCE_UNITS_KM => $language->text('googlelocation', 'kms')
        );                
        
        $distanseUnits = new Selectbox('distanse_units');
        $distanseUnits->setOptions($options);
        $distanseUnits->setValue(GOOGLELOCATION_BOL_LocationService::getInstance()->getDistanseUnits());
        $distanseUnits->setHasInvitation(false);
        $this->addElement($distanseUnits);
        
        $autofill = OW::getConfig()->getValue('googlelocation', 'auto_fill_location_on_search');
        
        $autoFillLocationOnSearch = new CheckboxField('auto_fill_location_on_search');
        $autoFillLocationOnSearch->setValue( (empty($autofill) || $autofill == '0') ? false : $autofill);
        $this->addElement($autoFillLocationOnSearch);

        // submit
        $submit = new Submit('save');
        $submit->setValue($language->text('base', 'edit_button'));
        $this->addElement($submit);
    }

    /**
     * Updates forum plugin configuration
     *
     * @return boolean
     */
    public function process()
    {
        $values = $this->getValues();

        $apiKey = empty($values['api_key']) ? '' : $values['api_key'];
        $distanseUnits = empty($values['distanse_units']) ? '' : $values['distanse_units'];
        $autoFillOnSearch = empty($values['auto_fill_location_on_search']) ? false : $values['auto_fill_location_on_search'];

        $config = OW::getConfig();

        $config->saveConfig('googlelocation', 'api_key', $apiKey);
        $config->saveConfig('googlelocation', 'auto_fill_location_on_search', $autoFillOnSearch);
        GOOGLELOCATION_BOL_LocationService::getInstance()->setDistanseUnits($distanseUnits);

        return array('result' => true);
    }
}