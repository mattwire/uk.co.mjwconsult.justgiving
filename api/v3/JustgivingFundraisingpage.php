<?php

/**
 * JustGiving FundraisingPage.create API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_justgiving_fundraisingpage_create_spec(&$spec) {

}

/**
 * JustGiving FundraisingPage.create API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_justgiving_fundraisingpage_create($params) {
  if (!array_key_exists('id', $params)) {
    civicrm_api3_verify_mandatory($params, NULL, array(
      'name',
    ));
  }
  return _civicrm_api3_basic_create('CRM_Justgiving_BAO_Fundraisingpage', $params);
}

function _civicrm_api3_justgiving_fundraisingpage_delete_spec(&$spec) {
  $spec['page_short_name']['api.required'] = 1;
  $spec['page_short_name']['title'] = 'Page Short Name';
  $spec['page_short_name']['type'] = CRM_Utils_Type::T_STRING;
  $spec['test']['api.required'] = 0;
  $spec['test']['title'] = 'Is Test';
  $spec['test']['type'] = CRM_Utils_Type::T_BOOLEAN;
  unset($spec['id']);
}

/**
 * JustGiving FundraisingPage.delete API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_justgiving_fundraisingpage_delete($params) {
  civicrm_api3_verify_mandatory($params, NULL, array(
    'page_short_name',
  ));
  $result = CRM_Justgiving_BAO_FundraisingPage::cancelPage($params['page_short_name'], $params['is_test']);
  return $result;
}

/**
 * JustGiving FundraisingPage.get API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_justgiving_fundraisingpage_get($params) {
  //$result = _civicrm_api3_basic_get('CRM_Justgiving_BAO_Fundraisingpage', $params);
  $result = CRM_Justgiving_BAO_FundraisingPage::getAll($params);
  // Return an error if we specified an id and it wasn't found
  return $result;
}

/**
 * JustGiving FundraisingPage.get API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_justgiving_fundraisingpage_get_spec(&$spec) {
  $spec['test']['api.required'] = 0;
  $spec['test']['title'] = 'Is Test';
  $spec['test']['type'] = CRM_Utils_Type::T_BOOLEAN;
}

function civicrm_api3_justgiving_fundraisingpage_suggestname($params) {
  $result = CRM_Justgiving_BAO_FundraisingPage::suggestPageName($params['preferred_name']);
  if (!empty($result['names'])) {
    $result['is_error'] = 0;
    $result['count'] = count($result['names']);
  }
  return $result;
}

function _civicrm_api3_justgiving_fundraisingpage_suggestname_spec(&$spec) {
  $spec['preferred_name']['api.required'] = 1;
  $spec['preferred_name']['title'] = 'Preferred Name';
}