<?php
/*--------------------------------------------------------------------+
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
 +-------------------------------------------------------------------*/

return array(

//username
  'justgiving_username' => array(
    'group_name' => 'JustGiving Settings',
    'group' => 'justgiving',
    'name' => 'justgiving_username',
    'type' => 'String',
    'html_type' => 'Text',
    'default' => '',
    'add' => '4.7',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'JustGiving Username',
    'html_attributes' => array(
      'size' => 40,
    ),
  ),

  //password
  'justgiving_password' => array(
    'group_name' => 'JustGiving Settings',
    'group' => 'justgiving',
    'name' => 'justgiving_password',
    'type' => 'String',
    'html_type' => 'Password',
    'default' => '',
    'add' => '4.7',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'JustGiving Password',
    'html_attributes' => array(
      'size' => 40,
    ),
  ),

  //api key
  'justgiving_apikey' => array(
    'group_name' => 'JustGiving Settings',
    'group' => 'justgiving',
    'name' => 'justgiving_apikey',
    'type' => 'String',
    'html_type' => 'Text',
    'default' => '',
    'add' => '4.7',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'JustGiving APP ID',
    'html_attributes' => array(
      'size' => 40,
    ),
  ),

  //api url
  'justgiving_apiurl' => array(
    'group_name' => 'JustGiving Settings',
    'group' => 'justgiving',
    'name' => 'justgiving_apiurl',
    'type' => 'String',
    'html_type' => 'Text',
    'default' => "https://api.justgiving.com/",
    'add' => '4.7',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'JustGiving API URL',
    'html_attributes' => array(
      'size' => 60,
    ),
  ),

  //api url
  'justgiving_testapiurl' => array(
    'group_name' => 'JustGiving Settings',
    'group' => 'justgiving',
    'name' => 'justgiving_testapiurl',
    'type' => 'String',
    'html_type' => 'Text',
    'default' => "https://api.sandbox.justgiving.com/",
    'add' => '4.7',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'JustGiving API Test URL',
    'html_attributes' => array(
      'size' => 60,
    ),
  ),

  //initial_completed
  'justgiving_testmode' => array(
    'group_name' => 'JustGiving Settings',
    'group' => 'justgiving',
    'name' => 'justgiving_testmode',
    'type' => 'Boolean',
    'add' => '4.7',
    'is_domain' => 1,
    'is_contact' => 0,
    'default' => 1,
    'description' => 'Set to True to enable Test mode (use test API URL)',
    'html_type' => 'Checkbox',
    'html_attributes' => array(
    ),
  ),

);
