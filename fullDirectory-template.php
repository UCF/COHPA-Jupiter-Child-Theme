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

<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid vc_custom_1455896967960">
	<div style="" class="vc_col-sm-2 wpb_column column_container ">
			<div class="mk-image-shortcode mk-shortcode   align-left single_line-frame inside-image " style="max-width: 600px; margin-bottom:10px">
            	<div class="mk-image-inner">
                	<a href="#" target="_self" class="mk-image-shortcode-link">
                    	<img class="lightbox-false" alt="" title="" src="http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/bfi_thumb/david-headshot-mkvq9zv6svldlz02s8jfvwa3h52dffhj4jne5yzcrc.jpg" />
                     </a>
                </div>
                <div class="clearboth"></div>
            </div>
	</div>
	<div style="" class="vc_col-sm-6 wpb_column column_container ">
        <h2 style="font-size: 25px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e076fc" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style directoryNameFixer">
            <span style="">
                <a title="David Janosik" href="https://www.cohpa.ucf.edu/directory/david-janosik/" target="_parent">David Janosik</a>
            </span>
        </h2>
        <div class="clearboth"></div>
        <div style=" margin-bottom:10px;text-align: left;" class="mk-text-block  true">
            <div id="cohpa-directory-name">
                <strong>Web Applications Developer</strong><br />
                <span class="color-lightgray">Dean&#8217;s Office</span><br />
                <span class="color-lightgray">Phone: </span>407-823-5884<br />
                <span class="color-lightgray">Email: </span>
                <a title="Contact David Janosik" href="mailto:djanosik@ucf.edu">djanosik@ucf.edu</a>
            </div>
            <div class="clearboth"></div>
        </div>
        <div style="text-align: left;" class="mk-text-block  true">
            <div id="cohpa-directory-name"></div>
            <div>Location: <a class="color-darkGold" title="Map to HPA I" href="http://map.ucf.edu/locations/80/health-public-affairs-i/" target="_blank">HPA I</a> Room: 341</div>
            <div class="clearboth"></div>
        </div> 
    </div>
    <div style="" class="vc_col-sm-4 wpb_column column_container ">
        <h2 style="font-size: 16px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:normal;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e07f2d" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
            <span style="">Additional Info</span>
        </h2>
        <div class="clearboth"></div>
        <div style="text-align: left;" class="mk-text-block  true">
            <p>
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-icon-file-pdf-o mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Curriculum Vitae
            </a><br />
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-icon-external-link-square mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Personal Website</a><br />
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-icon-facebook-square mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Facebook</a><br />
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-moon-linkedin mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Linkedin</a></p>
            <div class="clearboth"></div>
        </div> 
    </div>
</div>


<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid vc_custom_1455896967960">
	<div style="" class="vc_col-sm-2 wpb_column column_container ">
			<div class="mk-image-shortcode mk-shortcode   align-left single_line-frame inside-image " style="max-width: 600px; margin-bottom:10px">
            	<div class="mk-image-inner">
                	<a href="#" target="_self" class="mk-image-shortcode-link">
                    	<img class="lightbox-false" alt="" title="" src="http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/bfi_thumb/david-headshot-mkvq9zv6svldlz02s8jfvwa3h52dffhj4jne5yzcrc.jpg" />
                     </a>
                </div>
                <div class="clearboth"></div>
            </div>
	</div>
	<div style="" class="vc_col-sm-6 wpb_column column_container ">
        <h2 style="font-size: 25px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e076fc" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style directoryNameFixer">
            <span style="">
                <a title="David Janosik" href="https://www.cohpa.ucf.edu/directory/david-janosik/" target="_parent">David Janosik</a>
            </span>
        </h2>
        <div class="clearboth"></div>
        <div style=" margin-bottom:10px;text-align: left;" class="mk-text-block  true">
            <div id="cohpa-directory-name">
                <strong>Web Applications Developer</strong><br />
                <span class="color-lightgray">Dean&#8217;s Office</span><br />
                <span class="color-lightgray">Phone: </span>407-823-5884<br />
                <span class="color-lightgray">Email: </span>
                <a title="Contact David Janosik" href="mailto:djanosik@ucf.edu">djanosik@ucf.edu</a>
            </div>
            <div class="clearboth"></div>
        </div>
        <div style="text-align: left;" class="mk-text-block  true">
            <div id="cohpa-directory-name"></div>
            <div>Location: <a class="color-darkGold" title="Map to HPA I" href="http://map.ucf.edu/locations/80/health-public-affairs-i/" target="_blank">HPA I</a> Room: 341</div>
            <div class="clearboth"></div>
        </div> 
    </div>
    <div style="" class="vc_col-sm-4 wpb_column column_container ">
        <h2 style="font-size: 16px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:normal;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e07f2d" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
            <span style="">Additional Info</span>
        </h2>
        <div class="clearboth"></div>
        <div style="text-align: left;" class="mk-text-block  true">
            <p>
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-icon-file-pdf-o mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Curriculum Vitae
            </a><br />
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-icon-external-link-square mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Personal Website</a><br />
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-icon-facebook-square mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Facebook</a><br />
            <a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent">
                <i class="mk-moon-linkedin mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Linkedin</a></p>
            <div class="clearboth"></div>
        </div> 
    </div>
</div>
 <!-- END -->   





	
<?php
$args = array(
	'order' => 'ASC',
    'orderby' => 'user_lastname',
);

// The Query
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		um_fetch_user( $user->id );
		$buildingMap = get_field('building', 'user_' . $user->id .'');

		$image = get_field('upload_headshot', 'user_' . $user->id .'');
		// vars
		$url = $image['url'];
		$size = 'faculty';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
?>  
		
		
		<?php
			if( $image ) { ?>
				<a href="<?php echo um_user_profile_url(); ?>" title="<?php echo '' . $user->display_name . ''; ?>">
                <img src="<?php echo $thumb; ?>" alt="<?php echo '' . $user->display_name . ''; ?>" title="<?php echo '' . $user->display_name . ''; ?>" width="150px" />
                </a>
				 
			<?php }
			else { ?> 
				<img class="lightbox-true" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image"  width="150px" />
			<?php } ?>  
		
<?php		
		echo '<h2><a href="';
		echo um_user_profile_url();
		echo '" title="';
		echo '' . $user->display_name . '';
		echo '">';
		echo '' . $user->display_name . '';
		echo '</a></h2>';
		//echo '<p>' . $user->phone_number . '</p>';
		//echo '<p>Hello 7</p>';
		//echo '<p>' . $user->id . '</p>';
		
		
		
		echo'<h3 id="directoryJobTitle">';
		if( get_field('job_titles', 'user_' . $user->id .'') ) {
								while ( have_rows('job_titles', 'user_' . $user->id .'') ) : the_row();
								 $arrayJob[] = get_sub_field('job_title', 'user_' . $user->id .''); 
								endwhile;
								$jobTitles = implode(', ', $arrayJob);
							
								echo $jobTitles;
							}
		echo'</h3>';
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
						echo '</div>';	?>	
						
						
						
						
	<?php 
					if(get_field('cv', 'user_' . $user->id .'') || get_field('website_url', 'user_' . $user->id .'') || get_field('facebook_url', 'user_' . $user->id .'') || get_field('linkedin_url', 'user_' . $user->id .'')) {
					   echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Additional Info</span></h3>';
					
					if(get_field('cv', 'user_' . $user->id .'')) {
							echo '<div id="directoryProfile-link"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-icon-file-pdf-o  mk-size-small"></i> <a href="';
							the_field('cv', 'user_' . $user->id .'');
							echo '" target="_blank">Curriculum Vitae</a></div>';
						}
						if(get_field('website_url', 'user_' . $user->id .'')) {
							echo '<div id="directoryProfile-link"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-icon-external-link  mk-size-small"></i> <a href="';
							the_field('website_url', 'user_' . $user->id .'');
							echo '" target="_blank">Personal Website</a></div>';
						}
						if(get_field('facebook_url', 'user_' . $user->id .'')) {
							echo '<div id="directoryProfile-FB"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-moon-facebook-2  mk-size-small"></i> <a href="';
							the_field('facebook_url', 'user_' . $user->id .'');
							echo '" target="_blank">Facebook</a></div>';
						}
						if(get_field('linkedin_url', 'user_' . $user->id .'')) {
							echo '<div id="directoryProfile-Linkedin"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-moon-linkedin  mk-size-small"></i> <a href="';
							the_field('linkedin_url', 'user_' . $user->id .'');
							echo '" target="_blank">Linkedin</a></div>';
						}
						
					   echo '<p>&nbsp;</p></div>';
					}?>					
						
	<?php 					
						
	um_reset_user();	
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
