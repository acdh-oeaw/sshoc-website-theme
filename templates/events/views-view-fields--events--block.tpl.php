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

		
    <div class=" event-box">
        <div class=" event-inner">

            <div class="row">

                <div class="col-md-12">
                    <?php print $fields['field_image']->content; ?>
                </div>

                <div class="col-md-12">
                    <div class="content clearfix">
                        <br />
                        <h2 class="block-event-title"><?php print $fields['title']->content; ?></h2>
                        <br />
                    </div>
                </div>
            </div>
            <div class="container col-md-12">
                <div class="info" style="">


                    <?php print $fields['body']->content; ?>
                    <div class="row">
	                    
                     <div class="col-md-2 event-date">
	                     <i class="fa fa-calendar"></i>
                     </div>
                        <div class="col-md-3 event-date">
								
                                <span class="d"><?php print $fields['field_event_date']->content; ?></span>
                                <span class="m"><?php print $fields['field_event_date_1']->content; ?></span><br>
                                <span class="y"><?php print $fields['field_event_date_2']->content; ?></span>
                                <span class="hours"><?php print $fields['field_event_date_3']->content; ?></span>
                            </div>
                            
                        <div class="col-md-7 event-location">
                            <?php print $fields['field_event_location']->content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>