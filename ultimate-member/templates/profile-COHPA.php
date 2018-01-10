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
global $post,
$mk_options;
$page_layout = get_post_meta( $post->ID, '_layout', true );
$padding = get_post_meta( $post->ID, '_padding', true );


if ( empty( $page_layout ) ) {
	$page_layout = 'full';
}
$padding = ($padding == 'true') ? 'no-padding' : '';

get_header();


	$image = get_field('upload_headshot', 'user_' . $user_id .'');
	// vars
	$url = $image['url'];
	$size = 'faculty';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
?>


<!-- START TESTING SECTION -->



<!-- END TESTING SECTION -->

 

<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-3 wpb_column column_container ">
		<div style="text-align: left;" class="mk-text-block  true">
        	<?php echo do_shortcode ('[mk_button dimension="flat" corner_style="pointed" size="medium" outline_skin="dark" outline_active_color="#ffffff" outline_hover_color="#333333" bg_color="#212121" btn_hover_bg="#ffc904" text_color="light" icon="mk-moon-arrow-left-6" icon_anim="none" url="/staff/" target="_self" align="center" fullwidth="true" button_custom_width="0" margin_top="0" margin_bottom="15" btn_hover_txt_color="#000000"]Back to the Directory[/mk_button]');   ?>

           <?php echo do_shortcode ('[mk_custom_sidebar sidebar="sidebar-21"]');   ?>

			<div class="clearboth"></div>
        </div> 
	</div>
	
    <div style="" class="vc_col-sm-9 wpb_column column_container ">
		<div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid">
        	<div class="wpb_column vc_column_container vc_col-sm-4">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">



<div class="mk-image  lightbox-enabled align-center border_shadow-frame inside-image " style="margin-bottom:0px; margin-right:20px;">
	<div class="mk-image-holder" style="max-width: 500px;">
    	<div class="mk-image-inner ">
        
        <?php if( $image ) { ?>
        	<img class="lightbox-true" width="500" height="751" src="<?php echo $thumb; ?>" alt="<?php the_title();?>" title="<?php the_title(); ?>" />
            	<div class="mk-image-overlay"></div>
                <a href="<?php echo $url; ?>" alt="<?php the_title();?>" data-fancybox-group="image-shortcode-" title="<?php the_title();?>" class="mk-lightbox  mk-image-lightbox"><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-plus-circle" data-cacheid="icon-57a395b56e288" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"/></svg></a>
                
        <?php }
			else { ?> 
				<img class="lightbox-true" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image" />        
        <?php } ?> 
        </div>
    </div>
    <div class="clearboth"></div>
</div>

						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-8">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">

                        <h2 style="display: inline;"><?php the_title();?></h2>
						<?php if( get_field('degrees', 'user_' . $user_id .'') ) {
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
		<div id="new-directoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none   clear" data-family=""><ul>
						<?php if(get_field('phone_number', 'user_' . $user_id .'')) { 
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-phone" data-cacheid="icon-5a553bfdc3fd3" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 320c-32 32-32 64-64 64s-64-32-96-64-64-64-64-96l64-64s-64-128-96-128l-96 96c0 64 65.75 193.75 128 256s192 128 256 128c0 0 96-64 96-96s-96-128-128-96z"/></svg>Phone: ';
							the_field('phone_number', 'user_' . $user_id .'');
							echo '</li>';
						}?>
						<?php if(get_field('email_address', 'user_' . $user_id .'')) { 
							echo '<li><svg  class="mk-svg-icon" data-name="mk-icon-envelope" data-cacheid="icon-5a55331319080" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"/></svg>Email: <a href="mailto:';
							the_field('email_address', 'user_' . $user_id .'');
							echo '">';
							the_field('email_address', 'user_' . $user_id .'');
							echo '</a></li>';
						}?> 
						<?php 
						echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-location-2" data-cacheid="icon-5a5533ca76644" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0c-88.366 0-160 71.634-160 160 0 160 160 288 160 288s160-128 160-288c0-88.366-71.635-160-160-160zm0 256c-53.02 0-96-42.98-96-96s42.98-96 96-96 96 42.98 96 96-42.98 96-96 96zm137.128 92.815c-7.091 11.137-14.438 21.69-21.828 31.613 1.173.551 2.333 1.108 3.471 1.677 24.335 12.169 35.229 25.791 35.229 33.895s-10.894 21.726-35.229 33.895c-30.64 15.319-73.93 24.105-118.771 24.105s-88.131-8.786-118.771-24.105c-24.336-12.169-35.229-25.791-35.229-33.895s10.893-21.726 35.229-33.895c1.138-.568 2.298-1.126 3.47-1.677-7.39-9.923-14.737-20.477-21.827-31.613-33.937 17.316-54.872 41.026-54.872 67.185 0 53.02 85.961 96 192 96s192-42.98 192-96c0-26.159-20.935-49.869-54.872-67.185z"/></svg>Location: <a href="';
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
						echo '</li>';
						?> 
			</ul></div>
				  			
					  <div class="clearboth" style="margin-bottom:30px;"></div> 

					
					<?php 
                    if(get_field('cv', 'user_' . $user_id .'')) { ?> 
							
                            
				
                      
                    <div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">
                        <div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
                            <div id="mk-button-2" class="mk-button-container _ relative    inline left  ">
                                <a  href="<?php the_field('cv', 'user_' . $user_id .''); ?>"  target="_self" title="Curriculum Vitae" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-x-large mk-button--corner-pointed text-color-dark _ relative text-center font-weight-700 no-backface  letter-spacing-2 inline">
                                    <span class="mk-button--text">View CV</span>
                                </a>
                            </div>
                        </div>
                    </div>

<style type='text/css'>#mk-button-2 {margin-bottom: 0px;margin-top: 0px;margin-right: 15px;}#mk-button-2 .mk-button {display: inline-block;max-width: 100%;}#mk-button-2 .mk-button {background-color: #ffc904;} #mk-button-2 .mk-button:hover {color:#ffffff;background-color:#212121;}#mk-button-2 .mk-button:hover .mk-svg-icon {color:#ffffff;}</style>


                    
					<?php 		
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
        
        
        
        <div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">
	<div style="" class="vc_col-sm-9 wpb_column column_container  _ height-full">
		<div id="mk-tabs-2" class="mk-tabs  mobile-true  default-style  horizental-style    js-el" 	data-mk-component="Tabs">

			<ul id="mk-tabs-tabs-2" class="mk-tabs-tabs">
                <!-- 
                    %s 1 'tab-with-icon' class name if icon is added
                    %s 2 tab ID
                    $s 3 <i></i> output
                    $s 4 tab title
                 -->
                 
                <?php 
					if(get_field('biography', 'user_' . $user_id .'') || get_field('degrees', 'user_' . $user_id .'')) { 
							echo '<li class="mk-tabs-tab "><a href="#"> Biography</a></li>';
						}
					if(get_field('research_info', 'user_' . $user_id .'') || get_field('research_interests', 'user_' . $user_id .'')) { 
							echo '<li class="mk-tabs-tab "><a href="#"> Research</a></li>';
						}
					if (have_rows('add_courses', 'user_' . $user_id .'') ) { 
							echo '<li class="mk-tabs-tab "><a href="#"> Courses</a></li>';
						}				
					if($profilenews) { 
							echo '<li class="mk-tabs-tab "><a href="#"> News</a></li>';
						}
					if($profilebooks) { 
							echo '<li class="mk-tabs-tab "><a href="#"> Books</a></li>';
						}?>

                <div class="clearboth"></div>
			</ul>

			<div class="mk-tabs-panes page-bg-color">
            
            <?php 
					if(get_field('biography', 'user_' . $user_id .'') || get_field('degrees', 'user_' . $user_id .'')) { ?>
				<div id="1470321688-1-51" class="mk-tabs-pane is-active">
                	<div class="title-mobile">
                    	<i></i>Biography
                	</div>
                	<div class="mk-tabs-pane-content">
						<div id="text-block-3" class="mk-text-block   ">
							<?php the_field('biography', 'user_' . $user_id .''); ?>
                            
                            
                             <?php if (have_rows('degrees', 'user_' . $user_id .'') ) { 	?>
                                  	<h4>Credentials</h4>
                            
                            	<?php while (have_rows('degrees', 'user_' . $user_id .'') ): the_row(); ?> 
                                	<li><?php the_sub_field('degree', 'user_' . $user_id .''); ?><?php if(get_sub_field('degree_discipline', 'user_' . $user_id .'')) { ?>, <?php the_sub_field('degree_discipline', 'user_' . $user_id .''); }?><?php if(get_sub_field('degree_location', 'user_' . $user_id .'')) { ?>, <?php the_sub_field('degree_location', 'user_' . $user_id .''); }?>
                                    </li>
                                <?php endwhile; ?>	
							<?php }?>	
							<div class="clearboth"></div>
                        </div>
					</div>	
					<div class="clearboth"></div>
				</div> 
                <?php }?>
                
                
                <?php 
					if(get_field('research_info', 'user_' . $user_id .'') || get_field('research_interests', 'user_' . $user_id .'')) { ?>
				<div id="1470321688-2-76" class="mk-tabs-pane">
					<div class="title-mobile">
						<i></i>Research	
                    </div>
					<div class="mk-tabs-pane-content">
						<div id="text-block-4" class="mk-text-block   ">
                            	<?php the_field('research_info', 'user_' . $user_id .''); ?>
                            
                            	<?php 
									$termswer = get_field('research_interests', 'user_' . $user_id .'');
									if( $termswer ): 
									echo '<h4>Research Interests</h4>';
									?>
										<ul id="capitalText">
										<?php foreach( $termswer as $term ): ?>
											<li><?php echo $term->name; ?></li>
										<?php endforeach; ?>
										</ul>
									<?php endif; ?>
                            
							<div class="clearboth"></div>
						</div>
					</div>	
					<div class="clearboth"></div>
				</div>
                <?php }?>
                
                
                
                <?php 
					if (have_rows('add_courses', 'user_' . $user_id .'') ) { ?>
				<div id="1470322879262-2-1" class="mk-tabs-pane">
					<div class="title-mobile">
						<i></i>Courses	 
                    </div>
					<div class="mk-tabs-pane-content">
						<div id="text-block-5" class="mk-text-block   ">
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
							<div class="clearboth"></div>
						</div>
					</div>	
					<div class="clearboth"></div>
				</div>
                <?php }?>
                
                
                <?php 
					if($profilenews) { ?>
				<div id="1470322913503-3-2" class="mk-tabs-pane">
					<div class="title-mobile">
						<i></i>News	
                    </div>
					<div class="mk-tabs-pane-content">
						<div id="text-block-6" class="mk-text-block   ">
							<?php 	echo '<ul id="directoryNews">';
										foreach( $profilenews as $profilenew ) {
											echo '<li><a href="' . get_permalink( $profilenew->ID ) . '">' . get_the_title( $profilenew->ID ) . '</a></li>';
										}
									echo '</ul>';
									/* Restore original Post Data */
									wp_reset_postdata();
                             ?>      
							<div class="clearboth"></div>
						</div>
					</div>	
					<div class="clearboth"></div>
				</div>
                <?php }?>
                
                
                
                <?php 
					if($profilebooks) {  ?>
                <div id="1470322917777-7-7" class="mk-tabs-pane">
					<div class="title-mobile">
						<i></i>Books
                    </div>
					<div class="mk-tabs-pane-content">
						<div id="text-block-6" class="mk-text-block   ">
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
                                                <div id="booksCitation"><?php echo get_field( "book_citation", $profilebook->ID ); ?></div>
                                    
                                                <div style="margin-top:10px; font-style:italic;">Published in: <?php echo get_the_date( 'F Y', $profilebook->ID ); ?></div>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                               <?php } 
									
									/* Restore original Post Data */
									wp_reset_postdata();    
								?>
							<div class="clearboth"></div>
						</div>
					</div>	
					<div class="clearboth"></div>
				</div>
                <?php }?>
                
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>			
<script>
$( "#mk-tabs-2 .mk-tabs-tabs li" ).first().addClass( "is-active" );
$( ".mk-tabs-panes .mk-tabs-pane" ).first().addClass( "is-active" );
</script>		
                
                
                
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
		</div>
    </div>
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
        <div id="text-block-7" class="mk-text-block   ">
			
		<!-- START NEW OFFICE HOURS SECTION -->
			  <?php
			   if (have_rows('monday_times_available', 'user_' . $user_id .'') || have_rows('tuesday_times_available', 'user_' . $user_id .'') || have_rows('wednesday_times_available', 'user_' . $user_id .'') || have_rows('thursday_times_available', 'user_' . $user_id .'') || have_rows('friday_times_available', 'user_' . $user_id .'') ) { 
				echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h4 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Office Hours</span></h4>';?>

		<?php
		if (have_rows('monday_times_available', 'user_' . $user_id .'') ) { 
		echo '<b>Monday</b>';}?>							
		<?php while (have_rows('monday_times_available', 'user_' . $user_id .'') ): the_row(); ?>
			<div id="directoryProfile-officehrs"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-li-clock  mk-size-small"></i>
				<?php if(get_sub_field('monday-start', 'user_' . $user_id .'')) { ?>
					<?php the_sub_field('monday-start', 'user_' . $user_id .''); ?> - <?php the_sub_field('monday-end', 'user_' . $user_id .''); ?>
					<?php }
					else {

					} ?>     
			</div>
		<?php endwhile; ?>   

		<?php
		if (have_rows('tuesday_times_available', 'user_' . $user_id .'') ) { 
		echo '<div style="padding-top:10px;"><b>Tuesday</b></div>';}?>							
		<?php while (have_rows('tuesday_times_available', 'user_' . $user_id .'') ): the_row(); ?>
			<div id="directoryProfile-officehrs"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-li-clock  mk-size-small"></i>
				<?php if(get_sub_field('tuesday-start', 'user_' . $user_id .'')) { ?>
					<?php the_sub_field('tuesday-start', 'user_' . $user_id .''); ?> - <?php the_sub_field('tuesday-end', 'user_' . $user_id .''); ?>
					<?php }
					else {

					} ?>     
			</div>
		<?php endwhile; ?> 

		<?php
		if (have_rows('wednesday_times_available', 'user_' . $user_id .'') ) { 
		echo '<div style="padding-top:10px;"><b>Wednesday</b></div>';}?>							
		<?php while (have_rows('wednesday_times_available', 'user_' . $user_id .'') ): the_row(); ?>
			<div id="directoryProfile-officehrs"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-li-clock  mk-size-small"></i>
				<?php if(get_sub_field('wednesday-start', 'user_' . $user_id .'')) { ?>
					<?php the_sub_field('wednesday-start', 'user_' . $user_id .''); ?> - <?php the_sub_field('wednesday-end', 'user_' . $user_id .''); ?>
					<?php }
					else {

					} ?>     
			</div>
		<?php endwhile; ?> 

		<?php
		if (have_rows('thursday_times_available', 'user_' . $user_id .'') ) { 
		echo '<div style="padding-top:10px;"><b>Thursday</b></div>';}?>							
		<?php while (have_rows('thursday_times_available', 'user_' . $user_id .'') ): the_row(); ?>
			<div id="directoryProfile-officehrs"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-li-clock  mk-size-small"></i>
				<?php if(get_sub_field('thursday-start', 'user_' . $user_id .'')) { ?>
					<?php the_sub_field('thursday-start', 'user_' . $user_id .''); ?> - <?php the_sub_field('thursday-end', 'user_' . $user_id .''); ?>
					<?php }
					else {

					} ?>     
			</div>
		<?php endwhile; ?>   

		<?php
		if (have_rows('friday_times_available', 'user_' . $user_id .'') ) { 
		echo '<div style="padding-top:10px;"><b>Friday</b></div>';}?>							
		<?php while (have_rows('friday_times_available', 'user_' . $user_id .'') ): the_row(); ?>
			<div id="directoryProfile-officehrs"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-li-clock  mk-size-small"></i>
				<?php if(get_sub_field('friday-start', 'user_' . $user_id .'')) { ?>
					<?php the_sub_field('friday-start', 'user_' . $user_id .''); ?> - <?php the_sub_field('friday-end', 'user_' . $user_id .''); ?>
					<?php }
					else {

					} ?>     
			</div>
		<?php endwhile; ?>           
			
<div style="padding-top: 10px; font-size: 11px; font-style: italic; line-height: 11px !important; color: #555;">*During exam week, check with the faculty member for any office-hour changes.</div>
		<?php echo '<p>&nbsp;</p></div>'; }?>
		<!-- END NEW OFFICE HOURS SECTION -->    
		   
				
				   
				      
				         
				            
				               
				                  
				                     
				                        
				                           
				                                 
		   
		   
		   	  <?php
			   if(get_field('website_url', 'user_' . $user_id .'')) {
 				echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h4 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Professional Links</span></h4>';
				
				if(get_field('website_url', 'user_' . $user_id .'')) {
					echo '<div id="directoryProfile-link"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-icon-external-link  mk-size-small"></i> <a href="';
					the_field('website_url', 'user_' . $user_id .'');
					echo '" target="_blank">Personal Website</a></div>';
				}
				
				while (have_rows('additional_links', 'user_' . $user_id .'') ): the_row(); ?>
				<div id="directoryProfile-link"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-icon-external-link  mk-size-small"></i>
					<a href="<?php the_sub_field('link_url', 'user_' . $user_id .''); ?>" title="<?php the_sub_field('link_title', 'user_' . $user_id .''); ?>" target="_blank"><?php the_sub_field('link_title', 'user_' . $user_id .''); ?></a>
				</div>
			   <?php  endwhile;
				echo '<p>&nbsp;</p></div>';}?>
                
                <?php 
					if(get_field('facebook_url', 'user_' . $user_id .'') || get_field('linkedin_url', 'user_' . $user_id .'') || get_field('twitter_url', 'user_' . $user_id .'') || get_field('google_url', 'user_' . $user_id .'') || get_field('youtube_url', 'user_' . $user_id .'')) {
					   echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h4 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Social Networks</span></h4>';
						
						echo '<div id="new-directoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none   clear" data-family=""><ul>';
					
					if(get_field('facebook_url', 'user_' . $user_id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-square-facebook" data-cacheid="icon-5a567fa482bd1" style="fill: #3b5998; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M444-6.4h-376c-37.555 0-68 30.445-68 68v376c0 37.555 30.445 68 68 68h376c37.555 0 68-30.445 68-68v-376c0-37.555-30.445-68-68-68zm-123.943 159.299h-49.041c-7.42 0-14.918 7.452-14.918 12.99v19.487h63.723c-2.081 28.41-6.407 64.679-6.407 64.679h-57.565v159.545h-63.929v-159.545h-32.756v-64.474h32.756v-33.53c0-8.098-1.706-62.336 70.46-62.336h57.678v63.183z"/></svg><a href="';
							the_field('facebook_url', 'user_' . $user_id .'');
							echo '" target="_blank">Facebook</a></li>';
						}
						if(get_field('linkedin_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-Linkedin"><i style="color:#007bb6;margin:4px 4px;" class="mk-moon-linkedin  mk-size-small"></i> <a href="';
							the_field('linkedin_url', 'user_' . $user_id .'');
							echo '" target="_blank">Linkedin</a></div>';
						}
						if(get_field('twitter_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-Twitter"><i style="color:#00aced;margin:4px 4px;" class="mk-moon-twitter-2  mk-size-small"></i> <a href="';
							the_field('twitter_url', 'user_' . $user_id .'');
							echo '" target="_blank">Twitter</a></div>';
						}
						if(get_field('google_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-Google"><i style="color:#dd4b39;margin:4px 4px;" class="mk-moon-google-plus-3  mk-size-small"></i> <a href="';
							the_field('google_url', 'user_' . $user_id .'');
							echo '" target="_blank">Google+</a></div>';
						}
						if(get_field('youtube_url', 'user_' . $user_id .'')) {
							echo '<div id="directoryProfile-YouTube"><i style="color:#bb0000;margin:4px 4px;" class="mk-moon-youtube  mk-size-small"></i> <a href="';
							the_field('youtube_url', 'user_' . $user_id .'');
							echo '" target="_blank">YouTube</a></div>';
						}
						echo '</ul></div>';
						
					   echo '<p>&nbsp;</p></div>';
					}?>
                    
                    
                    
                    <?php
					   if (have_rows('affiliations', 'user_' . $user_id .'') ) { 
						echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h4 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Affiliations</span></h4>';?>
							<?php while (have_rows('affiliations', 'user_' . $user_id .'') ): the_row(); ?>
                                <div id="directoryProfile-link"><i style="color:#666;margin:4px 4px 0px 0px;" class="mk-icon-external-link  mk-size-small"></i>                        
                                        
<?php if(get_sub_field('aff_url', 'user_' . $user_id .'')) { ?> 
	<a href="<?php the_sub_field('aff_url', 'user_' . $user_id .''); ?>" title="<?php the_sub_field('aff_name', 'user_' . $user_id .''); ?>" target="_blank"><?php the_sub_field('aff_name', 'user_' . $user_id .''); ?></a>
		<?php }
        else {
        the_sub_field('aff_name', 'user_' . $user_id .'');
        }                  ?>                                                         
   
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

<style>  
.theme-page-wrapper #mk-sidebar.mk-builtin {
    width: 100% !important;
}
#mk-tabs-2 .mk-tabs-tabs .is-active a,#mk-tabs-2 .mk-tabs-panes, #mk-tabs-2 .mk-fancy-title span {    background-color: #fff}#text-block-3 {     margin-bottom:0px;     text-align:left;}#text-block-4 {     margin-bottom:0px;     text-align:left;}#text-block-5 {     margin-bottom:0px;     text-align:left;}#text-block-6 {     margin-bottom:0px;     text-align:left;}
</style>

<style id='dynamic-global-assets-css' type='text/css'> /* 1470323147 - */ .mk-tabs .mk-tabs-panes .mk-tabs-pane { z-index:8; } .mk-tabs.default-style .mk-tabs-tabs { z-index:10; } .mk-tabs.default-style .mk-tabs-panes { z-index:1; } .mk-tabs { margin-bottom:20px; } .mk-tabs .mk-svg-icon { vertical-align:middle; } .mk-tabs .mk-tabs-tabs li { position:relative; display:inline; float:left; margin:0; padding:0; } @media handheld, only screen and (max-width:767px) { .mk-tabs .mk-tabs-tabs li { float:none; display:block; } } .mk-tabs .mk-tabs-tabs li a { display:block; margin:0; outline:none; color:#444444; white-space:nowrap; font-weight:bold; font-size:13px; line-height:24px; cursor:pointer; } .mk-tabs .mk-tabs-panes .title-mobile { display:none; color:#444444; white-space:nowrap; font-weight:bold; font-size:14px; line-height:24px; margin-bottom:15px; background-color:rgba(0, 0, 0, 0.05); border-bottom:2px solid rgba(0, 0, 0, 0.1); padding:5px 10px; } .mk-tabs .mk-tabs-panes .mk-tabs-pane { position:relative; } @media handheld, only screen and (max-width:767px) { .mk-tabs.mobile-true .mk-tabs-tabs { display:none; } .mk-tabs.mobile-true .mk-tabs-panes .title-mobile { display:block; } .mk-tabs.mobile-true .mk-tabs-panes .mk-tabs-pane { margin-bottom:20px; } } .mk-tabs.default-style { margin-bottom:20px; } .mk-tabs.default-style .mk-tabs-tabs { position:relative; margin:0 0 -1px 0 !important; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-tabs { margin-bottom:20px !important; margin-left:0 !important; } } .mk-tabs.default-style .mk-tabs-tabs li a { padding:10px 20px; border:1px solid #e5e5e5; border-left:none; background-color:#ebebeb; background-color:rgba(0, 0, 0, 0.05); } .mk-tabs.default-style .mk-tabs-tabs li:first-child a { border-left:1px solid #e5e5e5; border-top-left-radius:2px; -moz-border-radius-topleft:2px; } .mk-tabs.default-style .mk-tabs-tabs li:last-of-type a { border-top-right-radius:2px; -moz-border-radius-topright:2px; } .mk-tabs.default-style .mk-tabs-tabs li:hover svg { fill:#868686 !important; } .mk-tabs.default-style .mk-tabs-tabs li.tab-with-icon a { padding:10px 20px 10px 14px !important; line-height:24px; } .mk-tabs.default-style .mk-svg-icon { margin-right:8px; fill:#b9b9b9; height:16px; } .mk-tabs.default-style .mk-tabs-tabs li.is-active a { padding-bottom:11px !important; border-bottom:none !important; cursor:default; background:-o-linear-gradient(top, transparent, transparent); background-color:transparent; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-tabs li.is-active a { border:1px solid #e5e5e5 !important; } } .mk-tabs.default-style .mk-tabs-panes { border:1px solid #e5e5e5; position:relative; margin:0; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-panes { border:0; } } .mk-tabs.default-style .mk-tabs-panes .mk-tabs-pane { padding:0; } .mk-tabs.default-style .mk-tabs-panes .mk-tabs-pane.is-active { padding:25px 25px 20px; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-panes .mk-tabs-pane { padding:0 !important; } .mk-tabs.mobile-true .mk-tabs-pane { display:block; } .mk-tabs-pane-content { padding:0 20px; } .mk-tabs .vc_column_container>.vc_column-inner { padding-left:0; padding-right:0; } } .mk-tabs.default-style.vertical-style .mk-tabs-tabs { float:left; margin:0 -1px 0 0 !important; width:25%; border:1px solid #e5e5e5; border-right:none; border-bottom:none; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li { display:block; float:none; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li a { border:1px solid #e5e5e5; border-top:none; border-left:none; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li:last-of-type a { border-top-right-radius:0; -moz-border-radius-topright:0; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li.is-active a { padding-right:21px !important; border-right:1px solid #ffffff; border-bottom:1px solid #e5e5e5 !important; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li a { white-space:normal; } .mk-tabs.default-style.vertical-style .mk-tabs-panes { float:left; width:75%; border:none; border:1px solid #e5e5e5; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style.vertical-style .mk-tabs-panes { float:none !important; width:100% !important; border:0 !important; } } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs { float:right; margin:0 0 0 -1px !important; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs { width:100%; margin-bottom:20px !important; float:none; } } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs li a { border:1px solid #e5e5e5; border-top:none; border-left:none; } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs li.is-active a { margin-left:-1px !important; border-bottom:1px solid #e5e5e5 !important; border-left:none !important; } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-panes { float:right; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style.vertical-style.mobile-true .mk-tabs-tabs { width:100%; margin-bottom:20px !important; margin-right:0 !important; float:none; } .mk-tabs.default-style.vertical-style.mobile-true .mk-tabs-tabs li.is-active a { border:1px solid #e5e5e5 !important; margin:0 !important; } .mk-tabs.default-style.vertical-style.mobile-true.vertical-right .mk-tabs-tabs li.is-active a { border:1px solid #e5e5e5 !important; margin:0 !important; } } @media handheld, only screen and (max-width:600px) { .mk-tabs.default-style.vertical-style .mk-tabs-panes { width:60%; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs { width:40%; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs { border-bottom:1px solid #e5e5e5; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs li { display:block; float:none; border-bottom:none; border-left:1px solid #e5e5e5; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs li a { border-bottom:none !important; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs li:first-child a { border-left:none !important; } } .mk-tabs.simple-style .mk-tabs-tabs { margin:0; border-bottom:2px solid #eeeeee; } .mk-tabs.simple-style .mk-tabs-tabs li a { padding:14px 18px; margin:0 0 -2px 0; } @media handheld, only screen and (max-width:767px) { .mk-tabs.simple-style .mk-tabs-tabs li a { margin:0; } } .mk-tabs.simple-style .mk-tabs-tabs li.tab-with-icon a { line-height:22px; } .mk-tabs.simple-style .mk-svg-icon { height:20px; width:20px; margin-right:6px; } .mk-tabs.simple-style .mk-tabs-tabs li.is-active a { border-bottom-style:solid; border-bottom-width:2px; } .mk-tabs.simple-style .mk-tabs-panes { padding:25px 0 15px; } @media handheld, only screen and (max-width:780px) { .mk-tabs.simple-style .mk-tabs-tabs { border-bottom:none !important; } .mk-tabs.simple-style .mk-tabs-tabs li { float:none !important; display:block !important; } .mk-tabs.simple-style .mk-tabs-tabs li a { border-bottom:2px solid #eeeeee; } } .mk-tabs-pane { overflow:hidden; height:0; } .mk-tabs-pane.is-active { height:auto; } @media handheld, only screen and (max-width:780px) { .mobile-true .mk-tabs-pane { height:auto; } }</style>
