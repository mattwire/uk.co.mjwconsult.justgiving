<?php

use CRM_Justgiving_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Justgiving_Form_Settings extends CRM_Core_Form {

  function buildQuickForm() {
    parent::buildQuickForm();

    // Test API credentials
    $apiStatus = FALSE;
    $response = CRM_Justgiving_BAO_Fundraisingpage::suggestPageName('test');
    if (!empty($response['values']) && count ($response['values'] > 0)) {
      $apiStatus = TRUE;
    }
    $this->assign('apiStatus', $apiStatus);

    CRM_Utils_System::setTitle(CRM_Justgiving_Settings::TITLE . ' - ' . E::ts('Settings'));

    $settings = $this->getFormSettings();

    foreach ($settings as $name => $setting) {
      if (isset($setting['html_type'])) {
        Switch ($setting['html_type']) {
          case 'Text':
            $this->addElement('text', $name, E::ts($setting['description']), $setting['html_attributes'], array());
            break;

          case 'Password':
            $this->addElement('text', $name, E::ts($setting['description']), $setting['html_attributes'], array());
            break;

          case 'Checkbox':
            $this->addElement('checkbox', $name, E::ts($setting['description']), '', '');
            break;
        }
      }
    }
    $this->addButtons(array(
      array (
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ),
      array (
        'type' => 'cancel',
        'name' => E::ts('Cancel'),
      )
    ));

    // export form elements
    $this->assign('elementNames', $this->getRenderableElementNames());
  }

  function postProcess() {
    $changed = $this->_submitValues;
    $settings = $this->getFormSettings(FALSE);
    // Make sure we have all settings elements set (boolean settings will be unset by default and wouldn't be saved)
    $settingsToSave = array_merge($settings, array_intersect_key($changed, $settings));
    CRM_Justgiving_Settings::save($settingsToSave);
    parent::postProcess();
    CRM_Core_Session::singleton()->setStatus('Configuration Updated', CRM_Justgiving_Settings::TITLE, 'success');
  }

  /**
   * Get the fields/elements defined in this form.
   *
   * @return array (string)
   */
  public function getRenderableElementNames() {
    // The _elements list includes some items which should not be
    // auto-rendered in the loop -- such as "qfKey" and "buttons".  These
    // items don't have labels.  We'll identify renderable by filtering on
    // the 'label'.
    $elementNames = array();
    foreach ($this->_elements as $element) {
      /** @var HTML_QuickForm_Element $element */
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }
    return $elementNames;
  }

  /**
   * Get the settings we are going to allow to be set on this form.
   *
   * @return array
   */
  function getFormSettings($metadata=TRUE) {
    $unprefixedSettings = array();
    $settings = civicrm_api3('setting', 'getfields', array('filters' => CRM_Justgiving_Settings::getFilter()));
    if (!empty($settings['values'])) {
      foreach ($settings['values'] as $name => $values) {
        if ($metadata) {
          $unprefixedSettings[CRM_Justgiving_Settings::getName($name, FALSE)] = $values;
        }
        else {
          $unprefixedSettings[CRM_Justgiving_Settings::getName($name, FALSE)] = NULL;
        }
      }
    }
    return $unprefixedSettings;
  }

  /**
   * Set defaults for form.
   *
   * @see CRM_Core_Form::setDefaultValues()
   */
  function setDefaultValues() {
    $settings = $this->getFormSettings(FALSE);
    $defaults = array();

    $existing = CRM_Justgiving_Settings::get($settings);
    if ($existing) {
      foreach ($existing as $name => $value) {
        $defaults[$name] = $value;
      }
    }
    return $defaults;
  }

}
