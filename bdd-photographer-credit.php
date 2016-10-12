<?php
/**
 * Plugin Name: BDD Photographer Credit
 * Description: Plugin that adds a simple photographer credit field to the Attachment metadata.
 * Author: Christina Blust/Blustery Day Design
 * Author URI: https://blusterydaydesign.com
 * Version: 0.1.0
 */

/**
 * Add Photographer Name field to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */

function bdd_attachment_field_credit( $form_fields, $post ) {
    $form_fields['bdd-photographer-name'] = array(
        'label' => 'Photo Credit',
        'input' => 'textarea',
        'value' => get_post_meta( $post->ID, 'bdd_photographer_name', true ),
    );

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'bdd_attachment_field_credit', 10, 2 );

/**
 * Save value of Photographer Name in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function bdd_attachment_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['bdd-photographer-name'] ) )
        $credit = sanitize_text_field( $attachment['bdd-photographer-name']);
        update_post_meta( $post['ID'], 'bdd_photographer_name', $credit );

    return $post;
}

add_filter( 'attachment_fields_to_save', 'bdd_attachment_field_credit_save', 10, 2 );
?>
