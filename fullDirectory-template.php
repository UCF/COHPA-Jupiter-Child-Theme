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
		echo '<h2><a href="';
		echo um_user_profile_url();
		echo '" title="';
		echo '' . $user->display_name . '';
		echo '">';
		echo '' . $user->display_name . '';
		echo '</a></h2>';
		//echo '<p>' . $user->phone_number . '</p>';
		//echo '<p>Hello 7</p>';
		echo '<p>' . $user->id . '</p>';
		
		echo'<h3 id="directoryJobTitle">';
		if( get_field('job_titles', 'user_' . $user->id .'') ) {
								while ( have_rows('job_titles', 'user_' . $user->id .'') ) : the_row();
								 $arrayJob[] = get_sub_field('job_title', 'user_' . $user->id .''); 
								endwhile;
								$jobTitles = implode(', ', $arrayJob);
							
								echo $jobTitles;
							}
		echo'</h3>';
		
		echo um_user_profile_url('user_' . $user->id .'');
		
		echo '/?page_id=';
		echo '' . $user->id . '';
		echo ';um_user=admin';
		
		echo 'CHECK THIS';
		um_fetch_user(5);
		echo um_user_profile_url();
		um_reset_user();
		?>
		
        
        
       
        
		<h4 id="directoryDepartments">
        
		
		<?php the_field('department', 'user_' . $user->id .''); ?></h4>
                        
                        
                        
                        
                        
                        <?php 
						$terms = get_field('department');
						if( $terms ) {
						  $count = count( $terms );
							$i = 0;
							$term_list = '<p>';
						foreach( $terms as $term ) {
						  $i++;
						  echo '<a href="';
						  echo get_term_link( $term );
						  echo'">';
						  echo $term->name;
						  echo '</a>';
						if ( $count != $i ) {
									echo ', ';
								}
							}
						 }
						?>
		<?php 
		if( ! empty( $user->phone_number ) ) { 
							echo '<div id="directoryProfile-phone"><i style="color:#666;margin:4px;4px;" class="mk-moon-phone  mk-size-small"></i> Phone: ';
							echo '' . $user->phone_number . '';
							echo '</div>';
						}
		if( ! empty( $user->email_address ) ) { 
							echo '<div id="directoryProfile-email"><i style="color:#666;margin:4px;4px;" class="mk-moon-envelop-2  mk-size-small"></i> Email: <a href="mailto:';
							echo '' . $user->email_address . '';
							echo '">';
							echo '' . $user->email_address . '';
							echo '</a></div>';
						}				
						
		echo '<div id="directoryProfile-location"><i style="color:#666;margin:4px;4px;" class="mk-moon-location-4  mk-size-small"></i> Location: <a href="';
						if ($buildingMap == 'HPA I') {echo 'http://map.ucf.edu/locations/80/health-public-affairs-i/';}
						if ($buildingMap == 'HPA II') {echo 'http://map.ucf.edu/locations/80/health-public-affairs-ii/';}
						if ($buildingMap == 'Orlando Tech Center') {echo 'http://map.ucf.edu/locations/8113/orlando-tech-center-otc3/';}
						if ($buildingMap == 'Research Pavilion') {echo 'http://map.ucf.edu/locations/8102/research-pavilion-pvl/';}
						if ($buildingMap == 'UCF Cocoa') {echo 'http://map.ucf.edu/locations/cocoa/cocoa/';}
						if ($buildingMap == 'UCF Daytona Beach') {echo 'http://map.ucf.edu/locations/daytona-beach/daytona-beach/';}
						if ($buildingMap == 'UCF Leesburg') {echo 'http://map.ucf.edu/locations/leesburg/leesburg/';}
						if ($buildingMap == 'UCF Ocala') {echo 'http://map.ucf.edu/locations/ocala/ocala/';}
						if ($buildingMap == 'UCF Palm Bay') {echo 'http://map.ucf.edu/locations/palm-bay/palm-bay/';}
						if ($buildingMap == 'UCF Sanford/Lake Mary') {echo 'http://map.ucf.edu/locations/sanford-lake-mary/sanfordlake-mary/';}
						if ($buildingMap == 'UCF South Lake') {echo 'http://map.ucf.edu/locations/south-lake/south-lake/';}
						if ($buildingMap == 'UCF Valencia Osceola') {echo 'http://map.ucf.edu/locations/valencia-osceola/valencia-osceola/';}
						if ($buildingMap == 'UCF Valencia West') {echo 'http://map.ucf.edu/locations/valencia-west/valencia-west/';}
						echo '" target="_blank" title="Map to ';
						echo '' . $user->building . '';
						echo '">';
						echo '' . $user->building . '';
						echo '</a> ';
						if( ! empty( $user->room_number ) ) { 
							echo ' Room: ';
							echo '' . $user->room_number . '';
						}
						echo '</div>';				
						
						
	// END LOOP					
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
