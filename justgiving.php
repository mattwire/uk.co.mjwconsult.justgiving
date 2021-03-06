<?php

require_once 'justgiving.civix.php';
use CRM_Justgiving_ExtensionUtil as E;
require_once __DIR__.'/vendor/autoload.php';

use JustGivingClient as J;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function justgiving_civicrm_config(&$config) {
  _justgiving_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function justgiving_civicrm_xmlMenu(&$files) {
  _justgiving_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function justgiving_civicrm_install() {
  _justgiving_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function justgiving_civicrm_postInstall() {
  _justgiving_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function justgiving_civicrm_uninstall() {
  _justgiving_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function justgiving_civicrm_enable() {
  _justgiving_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function justgiving_civicrm_disable() {
  _justgiving_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function justgiving_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _justgiving_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function justgiving_civicrm_managed(&$entities) {
  _justgiving_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function justgiving_civicrm_caseTypes(&$caseTypes) {
  _justgiving_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function justgiving_civicrm_angularModules(&$angularModules) {
  _justgiving_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function justgiving_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _justgiving_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
 */
function justgiving_civicrm_navigationMenu(&$menu) {
  $item[] =  array (
    'label' => CRM_Justgiving_Settings::TITLE,
    'name'       => E::SHORT_NAME,
    'url'        => NULL,
    'permission' => 'administer CiviCRM',
    'operator'   => NULL,
    'separator'  => NULL,
  );
  _justgiving_civix_insert_navigation_menu($menu, 'Administer', $item[0]);

  $item[] = array (
    'label'      => ts('Settings'),
    'name'       => E::SHORT_NAME . '_settings',
    'url'        => 'civicrm/admin/justgiving',
    'permission' => 'administer CiviCRM',
    'operator'   => NULL,
    'separator'  => NULL,
  );
  _justgiving_civix_insert_navigation_menu($menu, 'Administer/' . E::SHORT_NAME, $item[1]);

  _justgiving_civix_navigationMenu($menu);
}

/**
 * Implements hook_civicrm_entityTypes.
 *
 * @param array $entityTypes
 *   Registered entity types.
 */
function justgiving_civicrm_entityTypes(&$entityTypes) {
  $entityTypes['CRM_Justgiving_DAO_Fundraisingpage'] = array (
    'name' => 'JustgivingFundraisingpage',
    'class' => 'CRM_Justgiving_DAO_Fundraisingpage',
    'table' => 'civicrm_justgiving_fundraising_page',
  );
}
