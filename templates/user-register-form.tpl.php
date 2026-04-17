
<!--		<p><?php print render($intro_text); ?></p>. -->
<br/>
<!-- <p>Creating the Social Sciences and Humanities corner of the EOSC is a complicated business and we need all hands on deck. </p>
<p>Our goal is to provide researchers with easy access to flexible, scalable data and the tools required to get the most out of it.</p>
<p>When you open up a SSHOC User Account, you become a project insider and a valuable resource for us as we work to create tools, services and training for you and your colleagues!</p>
<p>In exchange for being able to pick your brain from time to time, we’re offering you:</p>
<ul>
	<li>A ringside seat from which to observe SSHOC partner activities and contribute to project outcomes</li>
	<li>Regular project updates via the monthly SSHOC Newsletter</li>
	<li>Privileged access to research data and services as these come on stream</li>
	<li>You can also sign up to join the SSH Training Community and/or the SSH Open Marketplace Tester Community.</li>
</ul>
</br>
<p>It’s a no brainer.</p> -->
<h1>Hello and welcome!</h1>
<br/>
<p><strong>Please complete the form to create your user account. We’ll do the rest!</strong></p>

<div class="row">

	<div class="col-md-6">
		<?php print render($form['account']['name']); ?>
	</div>
	<div class="col-md-6">
		<?php print render($form['account']['mail']); ?>
	</div>
</div>

<div class="row">		
	<div class="col-md-6">
		<div class="">
			<?php
				print render($form['account']['pass']);
				print render($form['profile_main']['field_profile_name']);
				print render($form['profile_main']['field_profile_organization_type']);
				print render($form['profile_main']['field_profile_organisation']);
				print render($form['profile_main']['field_upload_a_profile_picture']);
			?>
		</div>
	</div>
	<div class="col-md-6">
		<?php
			print render($form['profile_main']['field_profile_surname']);
			print render($form['profile_main']['field_profile_role_organisation']);
			print render($form['profile_main']['field_profile_topic_of_interests']);
			print render($form['profile_main']['field_profile_country']);
			
		?>
	</div>
</div>
<br/>

<div class="row">		
	<div class="col-md-12">
		<?php print render($form['profile_main']['field_profile_domain']); ?>
	</div>
</div>

<br/>

<div class="box-white-big">
	
	<div class="box-header">
		<h2>Join the <span>SSH Training Community</span>? </h2>
	</div>
	
	<div class="content">
		<div class="row">
			<div class="col-md-2 text-center">
				
				<img src="/sites/all/themes/arcadia/images/training-icon.png" style="width: 50%; height: auto" />
				
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6">
						<p>Engage with other SSH trainers, get a sneak preview of new training materials such as our Training Discovery Toolkit, and volunteer to host one of our workshops.</p>
						<p>Being a member of the Training Community, you will also be able to submit your application to become a Trainer becoming a member of the Training Directory!</p>
						<?php print render($form['profile_main']['field_training_community']); ?>
						<?php print render($form['profile_main']['field_gmail_address']); ?>
	

					</div>
					<div class="col-md-6">
						<?php print render($form['profile_main']['field_profile_interests']); ?>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<?php 
	$current_url = drupal_get_path_alias($_GET['q']); 
	if ($current_url == 'trainer/register'):
	?>


<div class="box-white-big">
	
	<div class="box-header">
		<h2><span>SSH Trainer</span> Registration Form</h2>
	</div>
	
	<div class="content">

		<div class="row">
			<div class="col-md-6">

				<?php print render($form['profile_trainer']['field_orcid']); ?>
				<?php print render($form['profile_trainer']['field_visible_mail']); ?>
				<?php print render($form['profile_trainer']['field_linkedin']); ?>
				<?php print render($form['profile_trainer']['field_twitter']); ?>	
				<?php print render($form['profile_trainer']['field_other_contact_information']); ?>
				

			</div>
			<div class="col-md-6">

				<?php print render($form['profile_trainer']['field_spoken_languages']); ?>
				<?php print render($form['profile_trainer']['field_qualification_education']); ?>
				<?php print render($form['profile_trainer']['field_work_experience']); ?>
				

				
				
				
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<?php print render($form['profile_trainer']['field_topics_of_expertise']); ?>
				<?php print render($form['profile_trainer']['field_additional_affiliations']); ?>
				<?php print render($form['profile_trainer']['field_your_techniques']); ?>
				<?php print render($form['profile_trainer']['field_level_of_training']); ?>
				<?php print render($form['profile_trainer']['field_target_audience']); ?>	
				
				<?php print render($form['profile_trainer']['field_link_to_training_materials']); ?>
				

			</div>
			<div class="col-md-6">

				<label>Provide your top three training activities:</label>
				<p>Provide a short description of your topics of interest / Specification of your training programme (webinar, workshop, tutorial, etc.)</p>

				<div class="box-white-big">
					<div class="content">
								<?php print render($form['profile_trainer']['field_training_activity_1']); ?>
								<?php print render($form['profile_trainer']['field_link_activity_1']); ?>
					</div>
				</div>
				<div class="box-white-big">
					<div class="content">
								<?php print render($form['profile_trainer']['field_training_activity_2']); ?>
								<?php print render($form['profile_trainer']['field_link_activity_2']); ?>
					</div>
				</div>
				<div class="box-white-big">
					<div class="content">
								<?php print render($form['profile_trainer']['field_training_activity_3']); ?>
								<?php print render($form['profile_trainer']['field_link_activity_3']); ?>
					</div>
				</div>
				
	
				
			</div>
		</div>


	</div>
</div>

<?php endif; ?>


<br/>
<div class="box-white-big">
	
	<div class="box-header">
		<h2>Join the <span>SSH Open Marketplace Community</span>? </h2>
	</div>
	
	<div class="content">
		<div class="row">
			<div class="col-md-4 text-center">
				<img src="/sites/all/themes/arcadia/images/marketplace.png" style="width: 100%; height: auto" alt=""/>
			</div>
			<div class="col-md-8">

				<p>Help us define the features, the interface, and most of all the content of the SSH Open Marketplace. We count on your feedback to build a resource which is truly at the service of its users!</p>
				<?php print render($form['profile_main']['field_do_you_wish_to_join_the_ss']);?>

			</div>
		</div>
	</div>
</div>




<!-- DO NOT UNCOMMENT ASK IVAN <p><strong>Welcome to the archive of all the SSHOC Newsletters&nbsp;</strong></p><p><em><strong><a href="https://www.sshopencloud.eu/user/register" target="_blank">Join us</a> on our very human Social Science &amp; Humanities Open Cloud – SSHOC Initiative</strong></em></p><hr /><p>&nbsp;</p> -->
<br/>

<div class="row">		
	<div class="col-md-12">
		<div class="box-gray border-top-bottom box-newsletter">
			<div class="bg-newsletter">
				<h3>Receive the SSHOC newsletter?</h3>
				<?php print render($form['simplenews']['newsletters']); ?>
			</div>
		</div>
	</div>
</div>



<br/>
<br/>
<div class="row">
	<div class="col-md-7">
		<?php //print render($form['legal']); ?>
		<?php print drupal_render($form['trust_ppg_section']); ?>
	</div>
	<div class="col-md-5">
		<?php print render($form['captcha']); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php 
			print drupal_render($form['actions']); 
			print drupal_render($form['form_build_id']);
			print drupal_render($form['form_id']);
		?>
	</div>
</div>
<br/>
<br/>


