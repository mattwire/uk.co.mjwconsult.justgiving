<?php

class CRM_Justgiving_Client {

  private $_liveClient; // JustGivingClient object
  private $_testClient; // JustGivingClient object

  /**
   * We only need one instance of this object. So we use the singleton
   * pattern and cache the instance in this variable
   *
   * @var object
   */
  static private $_singleton = NULL;

  /**
   * CRM_Justgiving_Base constructor.
   *
   * @param bool $test
   */
  public function __construct() {
    $apiUrl = CRM_Justgiving_Settings::getValue('testapiurl');


    $this->_testClient = new JustGivingClient($apiUrl,
      CRM_Justgiving_Settings::getValue('apikey'),
      1,
      CRM_Justgiving_Settings::getValue('username'),
      CRM_Justgiving_Settings::getValue('password')
    );

    $apiUrl = CRM_Justgiving_Settings::getValue('apiurl');
    $this->_liveClient = new JustGivingClient($apiUrl,
      CRM_Justgiving_Settings::getValue('apikey'),
      1,
      CRM_Justgiving_Settings::getValue('username'),
      CRM_Justgiving_Settings::getValue('password')
    );

  }

  /**
   * Singleton function used to manage this object.
   *
   * @return CRM_Justgiving_Client
   */
  public static function &singleton() {
    if (self::$_singleton === NULL) {
      self::$_singleton = new CRM_Justgiving_Client();
    }
    return self::$_singleton;
  }

  public function client($isTest = FALSE) {
    if ($isTest) {
      return $this->_testClient;
    }
    return $this->_liveClient;
  }
}