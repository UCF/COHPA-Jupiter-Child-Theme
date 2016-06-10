<?php /* Template: COHPA NEW Profile */ ?>



        
<!-- START THE CUSTOM SECTION -->

<?php
	$user_id       = um_profile_id();
	$profile_link  = um_user_profile_url();
	$buildingMap = get_field('building', 'user_' . $user_id .'');   
	//print($user_id);
	//print($profile_link);
	
	$profilenews = get_posts(array(			 
    'post_type' => 'post', // "post" because I'm calling regular blog posts? 
	'posts_per_page' => '10',
	'order' => 'DESC',
    'orderby' => 'date',
    'meta_query' => array(
  		array(  
			'key' => 'directory_news', // slug of custom field
			'value' => '"' . um_profile_id() . '"', // keep this to match current profile
			'compare' => 'LIKE'
			  )
		 )
 	));
	
	$profilebooks = get_posts(array(			 
    'post_type' => 'scholarly-books', // "post" because I'm calling regular blog posts? 
	'posts_per_page' => '10',
	'order' => 'DESC',
    'orderby' => 'date',
    'meta_query' => array(
  		array(  
			'key' => 'book_faculty', // slug of custom field
			'value' => '"' . um_profile_id() . '"', // keep this to match current profile
			'compare' => 'LIKE'
			  )
		 )
 	));
?>
<?php //the_field('upload_headshot', 'user_' . $user_id .''); ?> 

<?php 
	$image = get_field('upload_headshot', 'user_' . $user_id .'');
	// vars
	$url = $image['url'];
	$size = 'faculty';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
?>
 

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





<?php
if( $image ) { ?>
	<img src="<?php echo $thumb; ?>" alt="<?php the_title();?>" title="<?php the_title(); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	<?php if ( get_field( 'disable_lightbox', 'user_' . $user_id .'') ): ?>
	<?php else:  ?>
    <div class="mk-image-overlay"></div>
        <a href="<?php echo $url; ?>" alt="" data-fancybox-group="image-shortcode-" title="" class="mk-lightbox  mk-image-shortcode-lightbox">
            <i class="mk-jupiter-icon-plus-circle"></i>
        </a>
    <?php endif; ?>  
<?php }
else { ?> 
	<img class="lightbox-true" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image" />
<?php } ?>  

         
         
            

  
                    

                    

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
                    
                    
                    
                    
                                       

                    
                    
                    
                    
                    
                        <h2 style="display: inline;"><?php the_title();?></h2><?php if( get_field('degrees', 'user_' . $user_id .'') ) {
																					while ( have_rows('degrees', 'user_' . $user_id .'') ) : the_row();
																					 $arrayDegree[] = get_sub_field('degree', 'user_' . $user_id .''); 
																					endwhile;
																					$degreeIDs = implode(', ', $arrayDegree);
												
																				   echo '<span class"directoryDegrees">, ' . $degreeIDs . '</span>';
																				}
																				?>
                        
                        
                        
                        <h3 id="directoryJobTitle">
							<?php 
							if( get_field('job_titles', 'user_' . $user_id .'') ) {
								while ( have_rows('job_titles', 'user_' . $user_id .'') ) : the_row();
								 $arrayJob[] = get_sub_field('job_title', 'user_' . $user_id .''); 
								endwhile;
								$jobTitles = implode(', ', $arrayJob);
							
								echo $jobTitles;
							}
							
							?>
                        </h3>
                        <h4 id="directoryDepartments"><?php the_field('department', 'user_' . $user_id .''); ?></h4>
                        
                        
                        
                        
                        
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
						the_field('building', 'user_' . $user_id .'');
						echo '">';
						the_field('building', 'user_' . $user_id .'');
						echo '</a> ';
						if(get_field('room_number', 'user_' . $user_id .'')) { 
							echo ' Room: ';
							the_field('room_number', 'user_' . $user_id .'');
						}
						echo '</div>';
						?> 
					  <div class="clearboth" style="margin-bottom:30px;"></div> 

					
					<?php 
                    if(get_field('cv', 'user_' . $user_id .'')) {
							echo '<a href="';
							the_field('cv', 'user_' . $user_id .'');
							echo '" title="Curriculum Vitae" target="_blank"><img src="/wp-content/uploads/2016/06/CV-Document.png" width="85" /><br>View the CV</a>';
						}
                      ?> 
                      
                        
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
								if (have_rows('add_courses', 'user_' . $user_id .'') ) { 
										echo '<li><a href="#1423658400557-2-0">Courses</a></li>';
									}
								if($profilebooks) { 
										echo '<li><a href="#1423658400557-2-555">Books</a></li>';
									}
									

						echo '<div class="clearboth"></div></ul><div class="mk-tabs-panes">';
									
								 if(get_field('biography', 'user_' . $user_id .'')) { 
									echo '<div id="1423603736-1-73" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Biography</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
									the_field('biography', 'user_' . $user_id .'');
									
										
								  if (have_rows('degrees', 'user_' . $user_id .'') ) { 	?>
                                  	<h4>Credentials</h4>
									
									<?php while (have_rows('degrees', 'user_' . $user_id .'') ): the_row(); ?> 
                                        <li><?php the_sub_field('degree', 'user_' . $user_id .''); ?><?php if(get_sub_field('degree_discipline', 'user_' . $user_id .'')) { ?>, <?php the_sub_field('degree_discipline', 'user_' . $user_id .''); }?><?php if(get_sub_field('degree_location', 'user_' . $user_id .'')) { ?>, <?php the_sub_field('degree_location', 'user_' . $user_id .''); }?>
                                        </li>
                                    <?php endwhile; ?>
																				
									
									
									
									
									
									
									
								<?php	
									} echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
								}
							
								if(get_field('research_info', 'user_' . $user_id .'')) { 
									echo '<div id="1423603736-2-45" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Research</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
									the_field('research_info', 'user_' . $user_id .'');
									
									
									echo '<h4>Research Interests</h4>';
									
									
									the_field('research_interests', 'user_' . $user_id .'', $term);
									
									
									
									echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
								}
								
									
								if($profilenews) { 
									echo '<div id="1423658400557-2-999" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>News</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
									echo '<ul id="directoryNews">';
										foreach( $profilenews as $profilenew ) {
											echo '<li><a href="' . get_permalink( $profilenew->ID ) . '">' . get_the_title( $profilenew->ID ) . '</a></li>';
										}
									echo '</ul>';
									/* Restore original Post Data */
									wp_reset_postdata();
									echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
								}
								if (have_rows('add_courses', 'user_' . $user_id .'') ) { 
									echo '<div id="1423658400557-2-0" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Courses</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';?>
									<ul>
										<?php while (have_rows('add_courses', 'user_' . $user_id .'') ): the_row(); ?>
                                            <li>
                                                <div id="directoryCourseTitle">
                                                    <?php if(get_sub_field('course_url', 'user_' . $user_id .'')) { ?>
                                                                <a href="<?php the_sub_field('course_url', 'user_' . $user_id .''); ?>" target="_blank">
                                                    <?php }?>
                                                                <?php the_sub_field('course_number', 'user_' . $user_id .''); ?>: <?php the_sub_field('course_name', 'user_' . $user_id .''); ?>
                                                    <?php if(get_sub_field('course_url', 'user_' . $user_id .'')) { ?>
                                                                </a>
                                                    <?php }?>
                                                </div>
                                                
												<?php the_sub_field('course_description', 'user_' . $user_id .''); ?>
                                                
												<?php //if(get_sub_field('course_semesters', 'user_' . $user_id .'')) { ?>
                                                               <!-- Typically Available in: <?php //the_sub_field('course_semesters', 'user_' . $user_id .''); ?> semesters  -->
                                                <?php //}?>
                                    
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
									<?php echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
								}?>
								
 
								
								
								
								<?php 
								if($profilebooks) { 
								echo '<div id="1423658400557-2-555" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Books</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';?>
								
                                <?php            
									foreach( $profilebooks as $profilebook ) {?>
                                    
                                    <div style="padding-bottom:20px; margin-bottom:20px; border-bottom:1px dashed #d9d9d9;">
                                        <div style="width:23%; margin-right:2%; height:100%; float:left; background-color:#666;">   
                                            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($profilebook->ID) ); ?>" width="100%" />
                                        </div>
                                        <div style="width:75%; height:100%; float:left;">   
                                                <div style="font-size:18px; font-weight:bold; margin-bottom:10px;">
                                                	<?php if(get_field( "book_url", $profilebook->ID )) { ?>
                                                                <a href="<?php echo get_field( "book_url", $profilebook->ID ); ?>" title="" target="_blank">
                                                    <?php }?>
                                                	
                                                		<?php echo get_the_title( $profilebook->ID ); ?>
                                                        
                                                    <?php if(get_field( "book_url", $profilebook->ID )) { ?>
                                                                </a>
                                                    <?php }?>
                                                </div>
                                                <?php echo get_field( "book_citation", $profilebook->ID ); ?>
                                    
                                                <div style="margin-top:10px; font-style:italic;">Published in: <?php echo get_the_date( 'F Y', $profilebook->ID ); ?></div>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                               <?php } 
									
									/* Restore original Post Data */
									wp_reset_postdata();    
								?>
                                
								
								<?php echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>'; }?>
								
						 <?php echo '</div></div>';
						}?>
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-3">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    	<?php
					   if(get_field('website_url', 'user_' . $user_id .'')) {
						echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Professional Links</span></h3>';

						if(get_field('website_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-link"><i style="color:#666;margin:4px;4px;" class="mk-icon-external-link  mk-size-small"></i> <a href="';
							the_field('website_url', 'user_' . $user_id .'');
							echo '" target="_blank">Personal Website</a></div>';
						}
						
						while (have_rows('additional_links', 'user_' . $user_id .'') ): the_row(); ?>
                        <div id="directoryProfile-link"><i style="color:#666;margin:4px;4px;" class="mk-icon-external-link  mk-size-small"></i>
                        	<a href="<?php the_sub_field('link_url', 'user_' . $user_id .''); ?>" title="<?php the_sub_field('link_title', 'user_' . $user_id .''); ?>" target="_blank"><?php the_sub_field('link_title', 'user_' . $user_id .''); ?></a>
                        </div>
                       <?php  endwhile;
						echo '<p>&nbsp;</p></div>';}?>	
                        
                        
				
					<?php 
					if(get_field('facebook_url', 'user_' . $user_id .'') || get_field('linkedin_url', 'user_' . $user_id .'') || get_field('twitter_url', 'user_' . $user_id .'') || get_field('google_url', 'user_' . $user_id .'') || get_field('youtube_url', 'user_' . $user_id .'')) {
					   echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Social Networks</span></h3>';
					
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
					   echo '<p>&nbsp;</p></div>';
					}?>
                    
                    
                    
                    <?php
					   if (have_rows('affiliations', 'user_' . $user_id .'') ) { 
						echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Affiliations</span></h3>';?>
							<?php while (have_rows('affiliations', 'user_' . $user_id .'') ): the_row(); ?>
                                <div id="directoryProfile-link"><i style="color:#666;margin:4px;4px;" class="mk-icon-external-link  mk-size-small"></i>
                                        <a href="<?php the_sub_field('aff_url', 'user_' . $user_id .''); ?>" title="<?php the_sub_field('aff_name', 'user_' . $user_id .''); ?>" target="_blank"><?php the_sub_field('aff_name', 'user_' . $user_id .''); ?></a>
                                </div>                     
                            <?php  endwhile;
						echo '</div>';
					}?>                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>


