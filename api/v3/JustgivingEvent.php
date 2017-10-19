<?php

use JustGivingClient as J;

function _civicrm_api3_justgiving_event_create_spec(&$spec) {
  $spec['name']['api.required'] = 1;
  $spec['name']['title'] = 'Event Name';
  $spec['description']['api.required'] = 1;
  $spec['description']['title'] = 'Event Description';
  $spec['completion_date']['api.required'] = 1;
  $spec['completion_date']['title'] = 'Completion Date';
  $spec['completion_date']['type'] = CRM_Utils_Type::T_DATE;
  $spec['expiry_date']['api.required'] = 1;
  $spec['expiry_date']['title'] = 'Expiry Date';
  $spec['expiry_date']['type'] = CRM_Utils_Type::T_DATE;
  $spec['start_date']['api.required'] = 1;
  $spec['start_date']['title'] = 'Start Date';
  $spec['start_date']['type'] = CRM_Utils_Type::T_DATE;
  $spec['event_type']['api.required'] = 1;
  $spec['event_type']['title'] = 'Event Type (eg. OtherSportingEvents)';
}

function civicrm_api3_justgiving_event_create($params) {

  $cDate = new DateTime($params['completion_date']);
  $eDate = new DateTime($params['expiry_date']);
  $sDate = new DateTime($params['start_date']);

  $event = new J\Event();
  $event->name = $params['name'];
  $event->description = $params['description'];
  $event->completionDate = $cDate->format('r');
  $event->expiryDate = $eDate->format('r');
  $event->startDate = $sDate->format('r');
  $event->eventType = $params['event_type'];

  $jgClient = CRM_Justgiving_Client::singleton();
  $eventTypes = $jgClient->client(TRUE)->Event->GetTypes();
  $eventResult = $jgClient->client(TRUE)->Event->Create($event);

  return $eventResult;
}

function civicrm_api3_justgiving_event_gettypes($params) {
  $jgClient = CRM_Justgiving_Client::singleton();
  $eventTypes = $jgClient->client(TRUE)->Event->GetTypes();
  return $eventTypes;
}