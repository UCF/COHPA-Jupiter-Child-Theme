<?php
/*
Template Name: Directory Listing
*/


global $post,
$mk_options;
$page_layout = get_post_meta( $post->ID, '_layout', true );
$padding = get_post_meta( $post->ID, '_padding', true );


if ( empty( $page_layout ) ) {
	$page_layout = 'full';
}
$padding = ($padding == 'true') ? 'no-padding' : '';

get_header(); ?>
<div id="theme-page" <?php echo get_schema_markup('main'); ?>>
	<div class="mk-main-wrapper-holder">
		<div id="mk-page-id-<?php echo $post->ID; ?>" class="theme-page-wrapper mk-main-wrapper <?php echo $page_layout; ?>-layout <?php echo $padding; ?> mk-grid vc_row-fluid">
			<div class="theme-content <?php echo $padding; ?>" itemprop="mainContentOfPage">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
						<?php the_content();?>
                  <?php endwhile; ?>
                <?php wp_reset_query(); ?>       
                        
                        
<!-- START THE CUSTOM SECTION -->

<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
    

 </div><!-- END -->   





	
<?php
$args = array(
	'order' => 'ASC',
    'orderby' => 'display_name',
);

// The Query
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		echo '<p>' . $user->display_name . '</p>';
		echo '<p>' . $user->phone_number . '</p>';
		echo '<p>Hello 4</p>';
		
		if( ! empty( $user->phone_number ) ) { 
							echo '<div id="directoryProfile-phone"><i style="color:#666;margin:4px;4px;" class="mk-moon-phone  mk-size-small"></i> Phone: ';
							echo  . $user->phone_number . ;
							echo '</div>';
						}
	}
} else {
	echo 'No users found.';
}



?>
    


						
<!-- END THE CUSTOM SECTION -->
                        
                        
					
                    
                    
                    <div class="clearboth"></div>
					<?php wp_link_pages( 'before=<div id="mk-page-links">'.__( 'Pages:', 'mk_framework' ).'&after=</div>' ); ?>
						<?php
						if($mk_options['pages_comments'] == 'true') {
							if ( comments_open() ) :
							comments_template( '', true ); 	
							endif;
						}
						?>
				</div>
			
		<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
		<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>
<?php get_footer(); ?>
