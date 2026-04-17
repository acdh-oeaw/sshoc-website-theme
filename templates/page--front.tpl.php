
 	

<?php include('header.tpl.php'); ?>

		<!--Start pagewrapper-->
		<div class="page-wrapper">
			<?php if ($messages): ?>
				<div id="messages">
				<div class="auto-container"><div class="section clearfix">
				<?php print $messages; ?>
				</div></div></div> <!-- /.section, /#messages -->
			<?php endif; ?>

			<div class="firstbackgroundImage">
				<div class="hero">
					<div class=" container ">
						<div class="row">
							<div class="col-lg-11 nopaddingleft">
								<div class="Highlight">
									<!--Highlight Section-->
										<?php print render($page['higlight']); ?>
									<!--End Highlight Section-->
								</div>
							</div>
							<div class="col-lg-1">
								<div class="image-parallax"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="marketplace" id="proposition">
				<?php print render($page['parallax']); ?>
					<div class="container">
						<div class="row">
							<div class="col-lg-6 nopaddingleft ">
								<div class="abstract">
									<?php print render($page['abstract']); ?>
								</div>
							</div>
							<div class="col-lg-6"></div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="section_one container marketplace_icons">
				<?php print render($page['section_one']); ?>
			</div>
			<div class="secondbackgroundImage" id="marketplace">
					<div class="section_two container training-box" data-anchor-target="#marketplace" data-0="transform: translate3d(0%, 50%, 0) scale(1.6);" data-top-bottom="transform: translate3d(0%, 10%, 0) scale(1);">
						<?php print render($page['section_two']); ?>
					</div>
			</div>

			<div class="section_three mb-5 container community-box">
				<?php print render($page['section_three']); ?>
			</div>
		
			<div class="section_four container trusted-repository-box">
				<?php print render($page['section_four']); ?>
			</div>
			<div class="section_five  knowledge-base-box">
				<div class="container">
					<?php print render($page['section_five']); ?>
				</div>
			</div>
			<div class="container">
				<div class="section_six testimonials-section">
					<?php print render($page['section_six']); ?>
				
				</div>
			</div>
			<div class="container">
				<div class="top_footer">
					<?php print render($page['top_footer']); ?>
				</div>				
			</div>		
		</div>	
		<!--End pagewrapper-->
		<?php include('footer.tpl.php'); ?>
		<!--Scroll to top-->
		<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>
