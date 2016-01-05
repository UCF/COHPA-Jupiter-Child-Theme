<?php // ADDED BY DAVID JANOSIK
	function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/custom-admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
		}
		add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



add_action('admin_head', 'admin_styles');
function admin_styles() {
    if( get_post_id() == "254" ) {
	?>
	<style>
		.acf-editor-wrap iframe {
			height: 100px !important;
			min-height: 100px;
		}
	</style>
	<?php
	}
}