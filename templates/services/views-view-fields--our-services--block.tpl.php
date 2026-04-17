<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php // foreach ($fields as $id => $field): ?>
    <?php // print $field->content; ?>
<?php // endforeach; ?>


<!--Services Block Three-->
<div class="services-block-three col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="inner-box ">
    	<div class="content">
        	<div class="box-icon">
            	<span class="<?php print $fields['field_icon']->content; ?>"></span>
            </div>
            <!--h3>[title]</h3-->
            <div class="text"><?php print $fields['body']->content; ?></div>
            <?php if (!empty(theme_get_setting('show_readmore'))): ?>
            <a href="<?php print $fields['path']->content; ?>" class="read-more">Read more ...</a>
            <?php endif; ?>
        </div>
   </div>
</div>