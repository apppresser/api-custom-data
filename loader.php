<?php
/*
Plugin Name: Reactor: Custom API data
Plugin URI: http://reactor.apppresser.com
Description: example of how to add custom data to content in Reactor
Text Domain: reactor
Version: 0.0.1
Author: Reactor Team
Author URI: http://reactor.apppresser.com
License: GPLv2
*/


function custom_json_api_prepare_post( $post_response, $post, $context ) {

	 /**
     * Example of adding data to Reactor template hooks
     */
    //$post_response['do_api_action']['default']['above_title'] = 'this is above the title';
    //$post_response['do_api_action']['default']['below_title'] = 'this is below the title';
    //$post_response['do_api_action']['default']['above_content'] = 'this is above the content';
    //$post_response['do_api_action']['default']['below_content'] = 'this is below the content';

    if( 1 === $post['ID'] ) {
	    $post_response['do_api_action']['default']['above_title'] = 'this is above the title on a single post';
    }


    /**
     * Example of creating an author box below post content
     */
    $author_id = $post['post_author'];

    $author_info = '

    	<div class="author-info" style="padding:5px; border-top: 1px solid #e3e3e3; overflow: auto;"">
    		<div class="author-avatar" style="float:left; margin: 0 10px 0 0;">
    			' . get_avatar( $author_id, 60 ) . '
    		</div>
    		<div class="author-meta">
    			<h7>' . get_the_author_meta( 'display_name', $author_id ) . '</h7>
    			' . get_the_author_meta( 'description', $author_id ) . '
    		</div>
    	<div>

    ';

    $post_response['do_api_action']['default']['below_content'] = $author_info;


    return $post_response;
}
add_filter( 'json_prepare_post', 'custom_json_api_prepare_post', 10, 3 );
