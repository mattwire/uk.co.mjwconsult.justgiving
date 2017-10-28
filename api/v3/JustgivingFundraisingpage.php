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
  $spec['charity_id']['api.required'] = 1;
  $spec['charity_id']['title'] = 'Charity ID';
  $spec['charity_id']['type'] = CRM_Utils_Type::T_INT;
  $spec['event_id']['api.required'] = 1;
  $spec['event_id']['title'] = 'Event ID';
  $spec['event_id']['type'] = CRM_Utils_Type::T_INT;
  $spec['page_short_name']['api.required'] = 1;
  $spec['page_short_name']['title'] = 'Page Short Name';
  $spec['page_short_name']['type'] = CRM_Utils_Type::T_STRING;
  $spec['page_title']['api.required'] = 1;
  $spec['page_title']['title'] = 'Page Title';
  $spec['page_title']['type'] = CRM_Utils_Type::T_STRING;
  $spec['charity_opt_in']['api.required'] = 1;
  $spec['charity_opt_in']['title'] = 'Charity Opt In';
  $spec['charity_opt_in']['type'] = CRM_Utils_Type::T_BOOLEAN;
}

/**
 * JustGiving FundraisingPage.create API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_justgiving_fundraisingpage_create($params) {
  // If we have an error, we already tried to create the page, so just save it
  if (empty($params['error'])) {
    // Otherwise create the page.
    $page = array(
      'charityId' => $params['charity_id'],
      'eventId' => $params['event_id'],
      'pageShortName' => $params['page_short_name'],
      'pageTitle' => $params['page_title'],
      'charityOptIn' => $params['charity_opt_in'],
    );

    $jgClient = new CRM_Justgiving_Client();
    $pageResult = $jgClient->client(TRUE)->Page->CreateV2($page);
    if ($pageResult->httpStatusCode !== 201) {
      $err = !empty($pageResult->bodyResponse->error->desc) ? $pageResult->bodyResponse->error->desc : 'Unknown error';
      $err .= ' (' . $pageResult->httpStatusCode . ')';
      $params['error'] = 'Unable to create Justgiving page. ' . $err;
    }

    if (!empty($pageResult->bodyResponse->pageId)) {
      $params['page_id'] = $pageResult->bodyResponse->pageId;
    }
  }

  $className = 'CRM_Justgiving_BAO_Fundraisingpage';
  $entityName = 'JustgivingFundraisingpage';
  $instance = new $className();
  $instance->copyValues($params);
  $instance->save();
  return $params;
}

/**
 * SmsConversation.get API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_justgiving_fundraisingpage_get($params) {
  $result = _civicrm_api3_basic_get('CRM_Justgiving_BAO_Fundraisingpage', $params);
  // Return an error if we specified an id and it wasn't found
  if (!empty($params['id']) && $result['count'] == 0) {
    $result['is_error'] = 1;
    $result['error_message'] = 'id '.$params['id'].' not found';
  }
  return $result;
}

function _civicrm_api3_justgiving_fundraisingpage_delete_spec(&$spec) {
  $spec['page_short_name']['api.required'] = 1;
  $spec['page_short_name']['title'] = 'Page Short Name';
  $spec['page_short_name']['type'] = CRM_Utils_Type::T_STRING;
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
  $result = CRM_Justgiving_BAO_Fundraisingpage::cancelPage($params['page_short_name'], $params['is_test']);
  return $result;
}

function civicrm_api3_justgiving_fundraisingpage_suggestname($params) {
  $result = CRM_Justgiving_BAO_Fundraisingpage::suggestPageName($params['preferred_name']);
  if (!empty($result['values'])) {
    $result['is_error'] = 0;
    $result['count'] = count($result['values']);
  }
  return $result;
}

function _civicrm_api3_justgiving_fundraisingpage_suggestname_spec(&$spec) {
  $spec['preferred_name']['api.required'] = 1;
  $spec['preferred_name']['title'] = 'Preferred Name';
}
