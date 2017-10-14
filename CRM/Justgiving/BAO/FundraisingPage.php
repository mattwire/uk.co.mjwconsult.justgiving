<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2017                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2017
 */
/**
 * CRM_Justgiving_BAO_FundraisingPage constructor.
 */
class CRM_Justgiving_BAO_FundraisingPage extends CRM_Justgiving_DAO_FundraisingPage {

  public static function suggestPageName($preferredName, $isTest = FALSE) {
    if (empty($preferredName)) {
      return FALSE;
    }


    $jgClient = CRM_Justgiving_Client::singleton()->client($isTest);

    if ($jgClient) {
      $names = $jgClient->Page->SuggestPageShortNames($preferredName);
      return array('names' => $names->Names);
    }
  }

  public static function create($params, $isTest = FALSE) {
    $jgClient = CRM_Justgiving_Client::singleton()->client($isTest);
    $jgClient->Page->ListAll();

  }

  public static function cancelPage($pageShortName, $isTest = FALSE) {
    $jgClient = CRM_Justgiving_Client::singleton()->client($isTest);
    $result = $jgClient->Page->Cancel($pageShortName);
    switch ($result['http_code']) {
      case 200:
        $return['message'] = 'Fundraising page removed';
        $return['is_error'] = 0;
        break;
      case 401:
        $return['message'] = 'User attempting to delete a page they dont own';
        $return['is_error'] = 1;
        break;
      case 404:
        $return['message'] = 'Fundraising page not found';
        $return['is_error'] = 1;
        break;
      default:
        $return['message'] = 'Unknown Error';
        $return['is_error'] = 1;
    }
    return $return;
  }

  public static function getAll($isTest = FALSE) {
    $jgClient = CRM_Justgiving_Client::singleton()->client($isTest);
    $pages = $jgClient->Page->ListAll();
    if (empty($pages)) {
      return array();
    }
    return $pages;
  }
}
