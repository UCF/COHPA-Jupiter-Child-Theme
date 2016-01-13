<?php /* Template: COHPA Profile */ ?>



        
<!-- START THE CUSTOM SECTION -->

<?php
	$user_id       = um_profile_id();
	$profile_link  = um_user_profile_url();
	//print($user_id);
	//print($profile_link);
	
	$profilenews = get_posts(array(			 
    'post_type' => 'post', // "post" because I'm calling regular blog posts? 
    'meta_query' => array(
  		array(  
			'key' => 'directory_news', // slug of custom field
			'value' => '"' . um_profile_id() . '"', // keep this to match current profile
			'compare' => 'LIKE'
			  )
		 )
 	));
	echo '<ul>';
	foreach( $profilenews as $profilenew ) {
		echo '<li><a href="' . get_permalink( $profilenew->ID ) . '">' . get_the_title( $profilenew->ID ) . '</a></li>';
	}
	echo '</ul>';
	/* Restore original Post Data */
wp_reset_postdata();
?>
<?php //the_field('upload_headshot', 'user_' . $user_id .''); ?> 



<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-3 wpb_column column_container ">
		<div style="text-align: left;" class="mk-text-block  true">
        	<?php echo do_shortcode ('[mk_button dimension="flat" corner_style="pointed" size="medium" outline_skin="dark" outline_active_color="#ffffff" outline_hover_color="#333333" bg_color="#212121" btn_hover_bg="#ffc904" text_color="light" icon="mk-moon-arrow-left-6" icon_anim="none" url="/members/" target="_self" align="center" fullwidth="true" button_custom_width="0" margin_top="0" margin_bottom="15" btn_hover_txt_color="#000000"]Back to the Directory[/mk_button]');   ?>
            
			
			<?php  dynamic_sidebar( 'directory' );  ?>
			<div class="clearboth"></div>
        </div> 
	</div>
	
    <div style="" class="vc_col-sm-9 wpb_column column_container ">
		<div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid">
        	<div class="wpb_column vc_column_container vc_col-sm-4">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    	<div class="mk-image-shortcode mk-shortcode  lightbox-enabled align-left border_shadow-frame inside-image " style="max-width: 250px; margin-bottom:10px">

            <div class="mk-image-inner">

            	    <img class="lightbox-true" alt="David Janosik" title="David Janosik" src="http://davidjanosik.com/cohpa/wp-content/uploads/bfi_thumb/David-Headshot-1-m4othlawsg7c9lrp8a1r66gp7ft67qt1qb1k6psj88.jpg" itemprop="image" /><div class="mk-image-overlay"></div><a href="http://davidjanosik.com/cohpa/wp-content/uploads/2015/02/David-Headshot-1.jpg" alt="" data-fancybox-group="image-shortcode-" title="" class="mk-lightbox  mk-image-shortcode-lightbox"><i class="mk-jupiter-icon-plus-circle"></i></a>                    

                    

                    

                    

                </div><div class="clearboth"></div></div>

						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-8">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    
                    
                    
                    
                    
                    <div class="single-social-section">
                        <div class="blog-share-container">
                            <div class="blog-single-share mk-toggle-trigger"><i class="mk-moon-share-2"></i></div>
                            <ul class="single-share-box mk-box-to-trigger">
                                <li><a class="facebook-share" data-title="<?php the_title(); ?>" data-url="<?php print($profile_link); ?>" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>
                                <li><a class="twitter-share" data-title="<?php the_title(); ?>" data-url="<?php print($profile_link); ?>" href="#"><i class="mk-moon-twitter"></i></a></li>
                                <li><a class="googleplus-share" data-title="<?php the_title(); ?>" data-url="<?php print($profile_link); ?>" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>
                                <li><a class="pinterest-share" data-image="<?php echo $image_src_array[0]; ?>" data-title="<?php the_title(); ?>" data-url="<?php print($profile_link); ?>" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>
                                <li><a class="linkedin-share" data-title="<?php the_title(); ?>" data-url="<?php print($profile_link); ?>" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <a class="mk-blog-print" onClick="window.print()" href="#" title="<?php _e('Print', 'mk_framework'); ?>"><i class="mk-moon-print-3"></i></a>
                    	<div class="clearboth"></div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                        <h2><?php the_title(); ?></h2>
                        
                        <h3>Job Title</h3>
                        
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
						<?php if(get_field('phone_number', 'user_' . $user_id .'')) { 
							echo '<div id="directoryProfile-phone"><i style="color:#666;margin:4px;4px;" class="mk-moon-phone  mk-size-small"></i> Phone: ';
							the_field('phone_number', 'user_' . $user_id .'');
							echo '</div>';
						}?>
						<?php if(get_field('email_address', 'user_' . $user_id .'')) { 
							echo '<div id="directoryProfile-email"><i style="color:#666;margin:4px;4px;" class="mk-moon-envelop-2  mk-size-small"></i> Email: <a href="mailto:';
							the_field('email_address', 'user_' . $user_id .'');
							echo '">';
							the_field('email_address', 'user_' . $user_id .'');
							echo '</a></div>';
						}?> 
						<?php 
						$buildingMap = get_post_meta($post->ID, 'building', true);
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
						the_field('building');
						echo '">';
						the_field('building');
						echo '</a> ';
						if(get_field('room_number', 'user_' . $user_id .'')) { 
							echo ' Room: ';
							the_field('room_number', 'user_' . $user_id .'');
						}
						echo '</div>';
						?> 
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding: 20px 0 40px;" class="mk-divider mk-shortcode divider_full_width center shadow_line ">
        	<div class="divider-inner"><span class="divider-shadow-left"></span><span class="divider-shadow-right"></span></div>
        </div>
        <div class="clearboth"></div>
        <div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid">
        	<div class="wpb_column vc_column_container vc_col-sm-9">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    	<?php 
						if(get_field('biography', 'user_' . $user_id .'') || get_field('research_info', 'user_' . $user_id .'') || $profilenews) {
						   echo '<div id="mk-tabs-54db5aa2f2863" class="mk-shortcode mk-tabs default-style  horizental-style"><ul class="mk-tabs-tabs">';
								
								if(get_field('biography', 'user_' . $user_id .'')) { 
										echo '<li><a href="#1423603736-1-73">Biography</a></li>';
									}
								if(get_field('research_info', 'user_' . $user_id .'')) { 
										echo '<li><a href="#1423603736-2-45">Research</a></li>';
									}
									
								if($profilenews) { 
										echo '<li><a href="#1423658400557-2-999">News</a></li>';
									}
						echo '<li><a href="#1423658400557-2-0">Courses</a></li>';
						echo '<li><a href="#1423658400557-2-555">Books</a></li>';

						echo '<div class="clearboth"></div></ul><div class="mk-tabs-panes">';
									
								 if(get_field('biography', 'user_' . $user_id .'')) { 
									echo '<div id="1423603736-1-73" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Biography</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
									the_field('biography', 'user_' . $user_id .'');
									echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
								}
							
								if(get_field('research_info', 'user_' . $user_id .'')) { 
									echo '<div id="1423603736-2-45" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Research</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
									the_field('research_info', 'user_' . $user_id .'');
									echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
								}
								
								if($profilenews) { 
									echo '<div id="1423658400557-2-999" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>News</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
									echo '<ul>';
										foreach( $profilenews as $profilenew ) {
											echo '<li><a href="' . get_permalink( $profilenew->ID ) . '">' . get_the_title( $profilenew->ID ) . '</a></li>';
										}
									echo '</ul>';
									/* Restore original Post Data */
									wp_reset_postdata();
									echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
								}
								
								
								
								echo '<div id="1423658400557-2-0" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Courses</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><p>Course number 1</p><p>course number 2</p><p>course number 3</p><div class="clearboth"></div></div><div class="clearboth"></div></div>';
								
								echo '<div id="1423658400557-2-555" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Books</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><p>Book Title 1</p><p>Book Title 2</p><p>Book Title 3</p><div class="clearboth"></div></div><div class="clearboth"></div></div>';
								
						echo '</div></div>';
						}?>
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-3">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    	<?php
					   if(get_field('cv', 'user_' . $user_id .'') || get_field('website_url', 'user_' . $user_id .'')) {
						echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Professional Links</span></h3>';
									
						if(get_field('cv', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-cv"><i style="color:#666;margin:4px;4px;" class="mk-moon-vcard  mk-size-small"></i> <a href="';
							the_field('cv', 'user_' . $user_id .'');
							echo '" target="_blank">Curriculum Vitae</a></div>';
						}
						
						if(get_field('website_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-link"><i style="color:#666;margin:4px;4px;" class="mk-icon-external-link  mk-size-small"></i> <a href="';
							the_field('website_url', 'user_' . $user_id .'');
							echo '" target="_blank">Personal Website</a></div>';
						}
						
					echo '<p>&nbsp;</p><div id="facultytabContainer"></div><div id="facultytabpage_2" class="facultytabpage"></div><h2></h2><div class="clearboth"></div></div>';
					
					}?>	
				
					<?php 
					if(get_field('facebook_url', 'user_' . $user_id .'') || get_field('linkedin_url', 'user_' . $user_id .'') || get_field('twitter_url', 'user_' . $user_id .'') || get_field('google_url', 'user_' . $user_id .'') || get_field('youtube_url', 'user_' . $user_id .'')) {
					   echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Social Networks</span></h3><div id="cohpa-directoryDetail-rightcolumn"><div id="cohpa-directoryDetail-rightcolumn-GRAY">';
					
					if(get_field('facebook_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-FB"><i style="color:#3b5998;margin:4px;4px;" class="mk-moon-facebook-2  mk-size-small"></i> <a href="';
							the_field('facebook_url', 'user_' . $user_id .'');
							echo '" target="_blank">Facebook</a></div>';
						}
						if(get_field('linkedin_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-Linkedin"><i style="color:#007bb6;margin:4px;4px;" class="mk-moon-linkedin  mk-size-small"></i> <a href="';
							the_field('linkedin_url', 'user_' . $user_id .'');
							echo '" target="_blank">Linkedin</a></div>';
						}
						if(get_field('twitter_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-Twitter"><i style="color:#00aced;margin:4px;4px;" class="mk-moon-twitter-2  mk-size-small"></i> <a href="';
							the_field('twitter_url', 'user_' . $user_id .'');
							echo '" target="_blank">Twitter</a></div>';
						}
						if(get_field('google_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-Google"><i style="color:#dd4b39;margin:4px;4px;" class="mk-moon-google-plus-3  mk-size-small"></i> <a href="';
							the_field('google_url', 'user_' . $user_id .'');
							echo '" target="_blank">Google+</a></div>';
						}
						if(get_field('youtube_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-YouTube"><i style="color:#bb0000;margin:4px;4px;" class="mk-moon-youtube  mk-size-small"></i> <a href="';
							the_field('youtube_url', 'user_' . $user_id .'');
							echo '" target="_blank">YouTube</a></div>';
						}
					   echo '</div></div><div id="facultytabContainer"></div><div id="facultytabpage_2" class="facultytabpage"></div><h2></h2><div class="clearboth"></div></div>';
					}?>
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>


