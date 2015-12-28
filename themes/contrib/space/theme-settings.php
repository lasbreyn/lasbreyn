<?php

/**
 * @file
 * Theme settings.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 */
function space_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['space_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Space Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['space_settings']['main_header_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Main Header Image'),
    '#description' => t('The uploaded image will be displayed on the front page in the header. If no image is selected, the default will be used.'),
    '#default_value' => theme_get_setting('main_header_image'),
    '#progress_message' => t('Please wait...'),
    '#progress_indicator' => 'bar',
    '#upload_location' => 'public://space/',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );

  $form['space_settings']['main_header_screen'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show screen effect'),
    '#description' => t('Makes the main header image appear as if it is behind a screen.'),
    '#default_value' => theme_get_setting('main_header_screen') !== NULL ? theme_get_setting('main_header_screen') : 1,
  );

  $form['space_settings']['main_header_fade'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show fade effect'),
    '#description' => t('Adds a fade to the header image to blend into the body.'),
    '#default_value' => theme_get_setting('main_header_fade') !== NULL ? theme_get_setting('main_header_fade') : 1,
  );

  return $form;
}
