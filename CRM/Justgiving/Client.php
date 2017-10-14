<?php

class CRM_Justgiving_Client {

  private $_justGiving; // JustGivingClient object

  /**
   * CRM_Justgiving_Base constructor.
   *
   * @param bool $test
   */
  /**
   * CRM_Justgiving_Base constructor.
   *
   * @param bool $test
   * @return \JustGivingClient
   */
  public function __construct($test = FALSE) {
    if ($test) {
      $apiUrl = CRM_Justgiving_Settings::getValue('testapiurl');
    }
    else {
      $apiUrl = CRM_Justgiving_Settings::getValue('apiurl');
    }

    $this->_justGiving = new JustGivingClient($apiUrl,
      CRM_Justgiving_Settings::getValue('apikey'),
      1,
      CRM_Justgiving_Settings::getValue('username'),
      CRM_Justgiving_Settings::getValue('password')
    );
  }

  public function client() {
    return $this->_justGiving;
  }
}