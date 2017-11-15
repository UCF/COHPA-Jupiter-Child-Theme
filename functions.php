<?php // ADDED BY DAVID JANOSIK

include 'shortcodes.php';


	function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/custom-admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
		}
		add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


 
// ATEMPT 1
function faculty_thumbs() {
    add_image_size('faculty', 500, 600, true  );
}
add_action( 'after_setup_theme', 'faculty_thumbs' );

// ATTEMPT 2
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'Mysize-200', 200, 200, array( 'center', 'center')  );
}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'Mysize-200' => __('Mysize-200'),
    ) );
}






add_action('admin_head', 'admin_styles');
function admin_styles() {
	?>
	<style>
		.acf-field-564a3ce92e262 .acf-editor-wrap iframe {
			height: 100px !important;
			min-height: 100px;
		}
		tr.user-url-wrap, tr.user-description-wrap, tr.user-rich-editing-wrap, tr.user-comment-shortcuts-wrap, tr.user-admin-bar-front-wrap, tr.user-profile-picture, tr.user-nickname-wrap{ display: none; }
		#profile-page h2 { display: none; }
		#profile-page h3 { display: none; }
		input[name=twitter], label[for=twitter] { display: none; } 
		.wpmu-message, #wpmu-install-dashboard {display:none;}
	</style>
	<?php
}




/**
 * Place this in your theme's functions.php file
 * Or a site-specific plugin
 *
 */
add_filter( 'sul_user_query_args', 'sul_custom_meta_query', 10, 2 );

function sul_custom_meta_query( $args, $query_id ){
    // checking the query ID allows us to only target a specific shortcode
	if( $query_id == 'my_custom_meta_query' ){
			$args['meta_query'] = array(
									'relation' => 'OR',
									array(
										'key'       => 'last_name',
										'value'     => $search,
										'compare'   => 'LIKE',
									),
									
								);

	}
	return $args;
}



