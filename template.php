<?php
	
/**
 * Override or insert variables into the page template.
 */
function arcadia_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}


/**
 * Override or insert variables into the node template.
 */
function arcadia_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}



function arcadia_preprocess_page(&$variables, $hook) {
   // Page template suggestions based off of content types
   if (isset($variables['node'])) { 
        $variables['theme_hook_suggestions'][] = 'page__type__'. $variables['node']->type;
        $variables['theme_hook_suggestions'][] = "page__node__" . $variables['node']->nid;
   }
   
	// Page template suggestions based off URL alias
	if (module_exists('path')) {
		$alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
		if ($alias != $_GET['q']) {
			$template_filename = 'page';
			foreach (explode('/', $alias) as $path_part) {
				$template_filename = $template_filename . '__' . $path_part;
				$variables['theme_hook_suggestions'][] = $template_filename;
			}
		}
	}

}



/**
 * Override or insert variables into the block template.
 */
function arcadia_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function arcadia_menu_tree($variables) {
  return '<ul class="navigation clearfix">' . $variables['tree'] . '</ul>';
}

function arcadia_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  
  $element['#attributes']['class'][] = 'menu-' . $element['#original_link']['mlid'];

  if ($element['#below']) {
	  unset($element['#below']['#theme_wrappers']);
	  $sub_menu = '<ul>' . drupal_render($element['#below']) . '</ul>';
	  // $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  
  if ($sub_menu!='') {
	  return '<li class="dropdown">' . $output . $sub_menu . "</li>\n";
  } else {
	  return '<li>' . $output . $sub_menu . "</li>\n";
  }
  
}



function arcadia_form_alter(&$form, &$form_state, $form_id) {
	/*
  if($form_id == 'user-register-form') {

  } 
  */
  
  
  
  $form['actions']['submit']['#attributes']['class'][] = 'btn btn-primary';


  if ($form_id == 'webform_client_form_590') {
    //global $user;

    $mail = menu_get_object('user')->mail; 
    if ($mail) {
      $form['submitted']['trainer_email']['#value'] =  $mail;
      $form['submitted']['trainer_email']['#webform_component']['value'] =  $mail;
      $form['submitted']['trainer_email']['#access'] =  FALSE;

    }
  }
  
  switch ($form_id) {
    case 'user_register_form':
          $form['#submit'][] = 'custom_user_register_submit';
      break;
  }
  
}


function arcadia_theme(){

  $items = array();
	/*
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'arcadia') . '/templates',
    'template' => 'user-login',
    'preprocess functions' => array(
       'arcadia_preprocess_user_login'
    ),
  );
  */
  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'arcadia') . '/templates',
    'template' => 'user-register-form',
    'preprocess functions' => array(
      'arcadia_preprocess_user_register_form'
    ),
  );
  
  /*
  $items['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'arcadia') . '/templates',
    'template' => 'user-pass',
    'preprocess functions' => array(
      'arcadia_preprocess_user_pass'
    ),
  );
  */
  return $items;
  
}


function arcadia_preprocess_user_register_form(&$vars) {
  $vars['intro_text'] = '';
}

function custom_user_register_submit($form, &$form_state) {
  dpm($form, 'form');
    dpm($form_state, 'form_state');
  $form_state['redirect'] = 'thankyou';
}


/**
 * Implements theme_field__field_type().
 */
function arcadia_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}



function arcadia_form_simplenews_block_form_alter(&$form, $form_state, $form_id) {
	$form_id = $form['#form_id'];
	if ($form_id == 'simplenews_block_form_1') {
		$form['mail']['#attributes']['placeholder'] = t('E-mail');
		$form['submit']['#value'] = html_entity_decode('&#xf1d8;');
		$form['submit']['#attributes']['class'] = array('newslettersubmit');
		$form['submit']['#suffix'] ='<p><input id="privacy_check" type="checkbox" name="privacy"> I accept the <a href="/privacy-policy-summary">Privacy Policy</a> <sup>*</sup></p>';
	    $form['mail'] = array(
	      '#type' => 'textfield',
	      '#title' => t('E-mail'),
	      '#size' => 20,
	      '#attributes' =>  array("placeholder" => t('E-mail')),
	      '#maxlength' => 128,
	      '#required' => TRUE,
	    );
	}

}

/**
 * Process variables for user-profile.tpl.php.
 *
 * The $variables array contains the following arguments:
 * - $account
 *
 * @see user-profile.tpl.php
 */
function arcadia_preprocess_user_profile(&$variables) {
  $account = $variables['elements']['#account'];
  // Helpful $user_profile variable for templates.
  foreach (element_children($variables['elements']) as $key) {
    $variables['user_profile'][$key] = $variables['elements'][$key];
  }
  //Add roles to $user_profile variable
   $variables['user_profile']['roles'] = implode(', ', array_slice($account->roles, 1));

  // Preprocess fields.
  field_attach_preprocess('user', $account, $variables['elements'], $variables);
}


function addRoleTrainer($user) {
	$role_name = 'Trainer';
	// For convenience, we'll allow user ids as well as full user objects.
	if (is_numeric($user)) {
		$user = user_load($user);
	}
	// If the user doesn't already have the role, add the role to that user.
	$key = array_search($role_name, $user->roles);
	if ($key == FALSE) {
		// Get the rid from the roles table.
		$roles = user_roles(TRUE);
		$rid = array_search($role_name, $roles);
		if ($rid != FALSE) {
			$new_role[$rid] = $role_name;
			$all_roles = $user->roles + $new_role; // Add new role to existing roles.
			user_save($user, array('roles' => $all_roles));
		}
	}
}

