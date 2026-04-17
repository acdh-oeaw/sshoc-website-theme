<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>

<?php  if($block->region == 'services'): ?>

	<div id="<?php print $block_html_id; ?>" class="auto-container <?php print $classes; ?>"<?php print $attributes; ?>>
		
		<?php if (!empty(theme_get_setting('services_title_block'))): ?>
		<div class="sec-title-two">
			<h2<?php print $title_attributes; ?>><?php print theme_get_setting('services_title_block'); ?></h2>
			
			<?php if (!empty($block->subtitle)): ?>
			    <div class="text style-two"><?php print $block->subtitle; ?></div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
	
		<div class="row clearfix"<?php print $content_attributes; ?>>
		<?php print $content; ?>
		</div>
	</div>
<?php  elseif($block->region == 'news'): ?>
    <section class="news-section">
    	<div class="auto-container">
	    	<?php if (!empty(theme_get_setting('news_title_block'))): ?>
        	<div class="sec-title">
            	<h2 <?php print $title_attributes; ?>><?php print theme_get_setting('news_title_block'); ?></h2>
            </div>
            <?php endif; ?>
            <div class="row clearfix">
			<?php print $content; ?>
            </div>
        </div>
    </section>
    <!--End News Section-->
<?php  elseif($block->region == 'events'): ?>

        	<div class="sec-title">
            	<h2 <?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
            </div>
         
			<?php print $content; ?>
        
    <!--End News Section-->
<?php  elseif($block->region == 'partners'): ?>
<!--Clients Section-->
<section class="partner-section">
    <div class="auto-container">
    	<div class="sec-title">
        	<h2 <?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
        </div>
        <div class="partner-outer">
            <!--Sponsors Carousel-->
            <ul class="partner-carousel owl-carousel owl-theme"> 
			<?php print $content; ?>
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->

<?php  elseif($block->region == 'testimonials'): ?>
<!--Testimonial Section-->
<section class="testimonial-section">
	<div class="auto-container">
    	<div class="sec-title-two">
        	<h2 <?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
        </div>
        <?php print $content; ?>
        
	</div>
</section>
<!--End Testimonial Section-->
<?php  elseif($block->region == 'social_widget'): ?>
<!--Testimonial Section-->
<section class="twitter-section">
	<div class="auto-container">
    	<div class="sec-title">
        	<h2 <?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
        </div>
        <?php print $content; ?>
        
	</div>
</section>
<!--End Testimonial Section-->

<?php  elseif($block->region == 'globalmenu'): ?>
	<?php print $content; ?>
<?php else: ?>        

<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
	<?php if ($block->subject): ?>
		<h2<?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
		
	<?php endif; ?>
	<?php print render($title_suffix); ?>

	<div class="content"<?php print $content_attributes; ?>>
	<?php print $content; ?>
	</div>
</div>

<?php endif; ?>