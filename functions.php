<?php // ADDED BY DAVID JANOSIK
	function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/custom-admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
		}
		add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


 

function faculty_thumbs() {
    add_image_size('faculty', 500, 600, true);
}
add_action( 'after_setup_theme', 'faculty_thumbs' );

if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'Mysize-200', 200, 200, array( 'center', 'center')  );
add_image_size( 'Mysize-400', 400, 400 );
add_image_size( 'Mysize-500', 500, 500 );
add_image_size( 'Mysize-500tall-1000wide', 1000, 500 );
}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'Mysize-200' => __('Mysize-200'),
        'Mysize-400' => __('Mysize-400'),
        'Mysize-500' => __('Mysize-500'),
        'Mysize-500tall-1000wide' => __('Mysize-500tall-1000wide'),
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
	</style>
	<?php
}