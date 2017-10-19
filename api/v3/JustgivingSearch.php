<?php

use JustGivingClient as J;

function _civicrm_api3_justgiving_search_charity_spec(&$spec) {
  $spec['name']['api.required'] = 1;
  $spec['name']['title'] = 'Charity (partial) Name';
}

function civicrm_api3_justgiving_search_charity($params) {
  $jgClient = CRM_Justgiving_Client::singleton();

  $resultByIndex = 'Charity';

  $charitySearchResults = $jgClient->client(TRUE)->OneSearch->Index($params['name'], $resultByIndex);

  return $charitySearchResults;
}
