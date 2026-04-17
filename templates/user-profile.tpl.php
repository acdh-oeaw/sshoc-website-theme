<?php
/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
 
 
$profile = profile2_load_by_user($elements['#account']);
// $profile = profile2_load_by_user($account, NULL);

$training_community = $profile['main']->field_training_community['und'][0]['value'];

$target_audience = $profile['trainer']->field_target_audience['und'][0]['value'];
$training_community = $profile['main']->field_training_community['und'][0]['value'];
$linkedin = $profile['trainer']->field_linkedin['und'][0]['url'];
$twitter = $profile['trainer']->field_twitter['und'][0]['url'];




	global $user;
	$uid = $elements['#account']->uid;
	$roles = $user_profile['roles'];
	// $pos = strpos($roles, 'Trainer');
	$is_approval_trainer = preg_match('/Approved trainer/', $roles);
    $is_Trainer = preg_match('/Trainer/', $roles);
?>


<div class="box-profile">
	<div class="row">
		<div class="col-md-3">
			<div class="box-infogroup"><?php print render($user_profile['user_picture']); ?></div>
			<div class="text-center pt-15">
				<?php
					$current_profile = user_load($uid);
						//echo '<pre class="text-align-left">';
						//	var_dump($current_profile->roles);
						//echo '</pre>';
						//in_array($current_profile['roles'], 'approved_trainer')
					if ( in_array('Approved trainer', $current_profile->roles) ):
						$block = module_invoke('webform', 'block_view', 'client-block-590');
						print render($block['content']);
					endif;
				?>
			</div>
		</div>
		<div class="col-md-9">
			
			<?php print '<h2>' . $profile['main']->field_profile_name['und'][0]['value'] . ' ' . $profile['main']->field_profile_surname['und'][0]['value'] . '</h2>'; ?>
			<p><br/></p>

			<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_profile_organisation')); ?>

			<?php if ($user->uid == $uid): ?>

			
				<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_profile_organization_type')); ?>
				<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_profile_role_organisation')); ?>
				<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_profile_country')); ?>
				<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_profile_interests')); ?>
				<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_training_community')); ?>
				<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_upload_a_profile_picture')); ?>
				<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_gmail_address')); ?>

			<?php endif; ?>


			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_orcid')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['main'], 'field_profile_domain')); ?>

			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_spoken_languages')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_qualification_education')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_work_experience')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_additional_affiliations')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_target_audience')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_level_of_training')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_your_techniques')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_topics_of_expertise')); ?>
			
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_title_activity_1')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_training_activity_1')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_link_activity_1')); ?>
			
			<?php # print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_title_activity_2')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_training_activity_2')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_link_activity_2')); ?>
			
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_title_activity_3')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_training_activity_3')); ?>
			<?php print drupal_render(field_view_field('profile2', $profile['trainer'], 'field_link_activity_3')); ?>


		</div>
	</div>

</div>




	
	<?php if ($training_community != 'Yes'): ?>
		<div class="box-profile">
			<div class="row">
				<div class="col-md-8 offset-md-2 text-center">
					<h3>Join the SSH Training Community</h3>
					<br/>
					<p>Engage with other SSH trainers, get a sneak preview of new training materials such as our Training Discovery Toolkit, and volunteer to host one of our workshops.</p>
					<p>Being a member of the Training Community, you will also be able to submit your application to become a Trainer of the Trainers Directory!</p>
					<p>Clicking the button below, you will be redirected to your profile. Under <b>"Join the SSH Training Community?"</b>, you will need to check the box <b>"Yes, count me in!"</b> and then save your edits.</p>
					<p><a class="btn btn-primary" href="/user/<?php print $uid; ?>/edit/main">Become a member</a></p>
				</div>
			</div>
		</div>				
	<?php endif; ?>


	<?php if ((!$is_Trainer) and ($user->uid == $uid) and ($training_community == 'Yes') and (!$is_approval_trainer)): ?>
		<div class="box-profile">
			<div class="row">
				<div class="col-md-8 offset-md-2 text-center">
	
					<h2>Trainers Directory - Become a member</h2>
					
				    <p>Being a member of the Training Community, you can also become a Trainer! <br/>
				    Join the Trainers Directory and submitt your application!</p>
	
				    <p>If your application is approved, you will be able to :</p>

					    <p>Join SSHOC Trainer Training Bootcamps<br/>
					    SSH Training Events<br>
					    List yourself and the SSH Training Courses you will offer in the SSH Trainers Directory</p>
	

				    <p><br></p>

			
			
			    <?php
     
			      $block = module_invoke('webform', 'block_view', 'client-block-556');
			      print render($block['content']);
     
    			?>
    
    
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<?php // if (($pos > 0) and ($user->uid == $uid) and ($target_audience == '') and ($training_community == 'Yes')): ?>
	<?php if (($is_Trainer) and ($user->uid == $uid) and ($target_audience == '') and ($training_community == 'Yes') and (!$is_approval_trainer)): ?>
		<div class="box-profile">
			<div class="row">
				<div class="col-md-8 offset-md-2 text-center">
					<p>Thank you for your interest in becoming a Trainer! Please submit your application editing your profile by following the button below.</p>
					<p><a class="btn btn-primary" href="/user/<?php print $uid; ?>/edit/trainer">Edit your Profile</a></p>
				</div>
			</div>
		</div>



	<?php endif; ?>
