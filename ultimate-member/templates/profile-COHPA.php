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
    'post_type' => 'faculty_books', // "post" because I'm calling regular blog posts? 
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
		<div id="newdirectoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none   clear" data-family=""><ul>
						<?php if(get_field('phone_number', 'user_' . $user_id .'')) { 
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-phone" data-cacheid="icon-5a553bfdc3fd3" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 320c-32 32-32 64-64 64s-64-32-96-64-64-64-64-96l64-64s-64-128-96-128l-96 96c0 64 65.75 193.75 128 256s192 128 256 128c0 0 96-64 96-96s-96-128-128-96z"/></svg>Phone: ';
							the_field('phone_number', 'user_' . $user_id .'');
							echo '</li>';
						}?>
						<?php if(get_field('email_address', 'user_' . $user_id .'')) { 
							echo '<li><svg  class="mk-svg-icon" data-name="mk-icon-envelope" data-cacheid="icon-5a55331319080" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"/></svg>Email: <a href="mailto:';
							the_field('email_address', 'user_' . $user_id .'');
							echo '">';
							the_field('email_address', 'user_' . $user_id .'');
							echo '</a></li>';
						}?> 
						<?php 
						echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-location-2" data-cacheid="icon-5a5533ca76644" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0c-88.366 0-160 71.634-160 160 0 160 160 288 160 288s160-128 160-288c0-88.366-71.635-160-160-160zm0 256c-53.02 0-96-42.98-96-96s42.98-96 96-96 96 42.98 96 96-42.98 96-96 96zm137.128 92.815c-7.091 11.137-14.438 21.69-21.828 31.613 1.173.551 2.333 1.108 3.471 1.677 24.335 12.169 35.229 25.791 35.229 33.895s-10.894 21.726-35.229 33.895c-30.64 15.319-73.93 24.105-118.771 24.105s-88.131-8.786-118.771-24.105c-24.336-12.169-35.229-25.791-35.229-33.895s10.893-21.726 35.229-33.895c1.138-.568 2.298-1.126 3.47-1.677-7.39-9.923-14.737-20.477-21.827-31.613-33.937 17.316-54.872 41.026-54.872 67.185 0 53.02 85.961 96 192 96s192-42.98 192-96c0-26.159-20.935-49.869-54.872-67.185z"/></svg>Location: <a href="';
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
                                        <div style="width:23%; margin-right:2%; height:100%; float:left;">   
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
			
			echo '<div id="newdirectoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none   clear" data-family=""><ul>';		   
				   
				if(get_field('website_url', 'user_' . $user_id .'')) {
					echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-globe" data-cacheid="icon-5a5761fdb02a2" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 32c-132.548 0-240 107.452-240 240 0 132.549 107.452 240 240 240 132.549 0 240-107.451 240-240 0-132.548-107.451-240-240-240zm135.795 320c4.29-20.227 6.998-41.696 7.879-64h63.723c-1.668 22.098-6.812 43.557-15.34 64h-56.262zm-271.59-160c-4.29 20.227-6.998 41.696-7.879 64h-63.722c1.668-22.097 6.811-43.557 15.339-64h56.262zm238.813 0c4.807 20.481 7.699 41.927 8.64 64h-95.658v-64h87.018zm-87.018-32v-93.669c7.295 2.123 14.522 5.685 21.614 10.685 13.291 9.37 26.006 23.804 36.77 41.743 7.441 12.401 13.876 26.208 19.248 41.242h-77.632zm-90.384-41.242c10.764-17.939 23.478-32.374 36.77-41.743 7.091-5 14.319-8.562 21.614-10.685v93.67h-77.632c5.373-15.033 11.808-28.84 19.248-41.242zm58.384 73.242v64h-95.657c.94-22.073 3.833-43.519 8.639-64h87.018zm-176.056 160c-8.528-20.443-13.671-41.902-15.339-64h63.722c.881 22.304 3.589 43.773 7.879 64h-56.262zm80.399-64h95.657v64h-87.018c-4.806-20.48-7.699-41.927-8.639-64zm95.657 96v93.67c-7.294-2.123-14.522-5.686-21.614-10.685-13.292-9.37-26.007-23.805-36.77-41.743-7.441-12.402-13.875-26.209-19.249-41.242h77.633zm90.384 41.242c-10.764 17.938-23.479 32.373-36.77 41.743-7.092 4.999-14.319 8.562-21.614 10.685v-93.67h77.633c-5.373 15.033-11.808 28.84-19.249 41.242zm-58.384-73.242v-64h95.657c-.94 22.073-3.833 43.52-8.64 64h-87.017zm127.674-96c-.881-22.304-3.589-43.773-7.879-64h56.262c8.528 20.443 13.672 41.903 15.34 64h-63.723zm31.655-96h-47.95c-9.319-29.381-22.188-55.147-37.658-75.714 21.268 10.17 40.529 23.808 57.357 40.636 10.74 10.739 20.181 22.469 28.251 35.078zm-322.407-35.078c16.829-16.829 36.09-30.466 57.357-40.636-15.471 20.567-28.338 46.333-37.658 75.714h-47.949c8.069-12.609 17.511-24.339 28.25-35.078zm-28.25 259.078h47.949c9.32 29.381 22.188 55.147 37.659 75.715-21.268-10.17-40.529-23.808-57.357-40.637-10.74-10.739-20.182-22.469-28.251-35.078zm322.406 35.078c-16.828 16.829-36.09 30.467-57.357 40.637 15.471-20.567 28.339-46.334 37.658-75.715h47.95c-8.07 12.609-17.511 24.339-28.251 35.078z"/></svg><a href="';
					the_field('website_url', 'user_' . $user_id .'');
					echo '" target="_blank">Personal Website</a></li>';
				}
				
				while (have_rows('additional_links', 'user_' . $user_id .'') ): the_row(); ?>
				<li id="newdirectoryLineFix"><svg  class="mk-svg-icon" data-name="mk-icon-external-link" data-cacheid="icon-5a5761fdb09c7" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1408 928v320q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h704q14 0 23 9t9 23v64q0 14-9 23t-23 9h-704q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-320q0-14 9-23t23-9h64q14 0 23 9t9 23zm384-864v512q0 26-19 45t-45 19-45-19l-176-176-652 652q-10 10-23 10t-23-10l-114-114q-10-10-10-23t10-23l652-652-176-176q-19-19-19-45t19-45 45-19h512q26 0 45 19t19 45z"/></svg><a href="<?php the_sub_field('link_url', 'user_' . $user_id .''); ?>" title="<?php the_sub_field('link_title', 'user_' . $user_id .''); ?>" target="_blank"><?php the_sub_field('link_title', 'user_' . $user_id .''); ?></a>
				</li>
			   <?php  endwhile;
				
			echo '</ul></div>';	   
				echo '<p>&nbsp;</p></div>';}?>
                
                <?php 
					if(get_field('facebook_url', 'user_' . $user_id .'') || get_field('linkedin_url', 'user_' . $user_id .'') || get_field('twitter_url', 'user_' . $user_id .'') || get_field('google_url', 'user_' . $user_id .'') || get_field('youtube_url', 'user_' . $user_id .'')) {
					   echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h4 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Social Networks</span></h4>';
						
						echo '<div id="newdirectoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none   clear" data-family=""><ul>';
					
					if(get_field('facebook_url', 'user_' . $user_id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-square-facebook" data-cacheid="icon-5a567fa482bd1" style="fill: #3b5998; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M444-6.4h-376c-37.555 0-68 30.445-68 68v376c0 37.555 30.445 68 68 68h376c37.555 0 68-30.445 68-68v-376c0-37.555-30.445-68-68-68zm-123.943 159.299h-49.041c-7.42 0-14.918 7.452-14.918 12.99v19.487h63.723c-2.081 28.41-6.407 64.679-6.407 64.679h-57.565v159.545h-63.929v-159.545h-32.756v-64.474h32.756v-33.53c0-8.098-1.706-62.336 70.46-62.336h57.678v63.183z"/></svg><a href="';
							the_field('facebook_url', 'user_' . $user_id .'');
							echo '" target="_blank">Facebook</a></li>';
						}
						if(get_field('linkedin_url', 'user_' . $user_id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-linkedin" data-cacheid="icon-5a567fa48352f" style="fill: #007bb6; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M426 0h-340c-47.3 0-86 38.7-86 86v340c0 47.3 38.7 86 86 86h340c47.3 0 86-38.7 86-86v-340c0-47.3-38.7-86-86-86zm-234 416h-64v-224h64v224zm-32-256c-17.673 0-32-14.327-32-32s14.327-32 32-32 32 14.327 32 32-14.327 32-32 32zm256 256h-64v-128c0-17.673-14.327-32-32-32s-32 14.327-32 32v128h-64v-224h64v39.736c13.199-18.132 33.376-39.736 56-39.736 39.765 0 72 35.817 72 80v144z"/></svg><a href="';
							the_field('linkedin_url', 'user_' . $user_id .'');
							echo '" target="_blank">Linkedin</a></li>';
						}
						if(get_field('twitter_url', 'user_' . $user_id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-square-twitter" data-cacheid="icon-5a567fa483bb5" style="fill: #00aced; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M444-6.4h-376c-37.555 0-68 30.445-68 68v376c0 37.555 30.445 68 68 68h376c37.555 0 68-30.445 68-68v-376c0-37.555-30.445-68-68-68zm-41.733 263.6c-31.342 122.024-241.534 173.781-338.231 47.108 37.04 33.978 101.537 36.954 142.439-3.669-23.987 3.373-41.436-19.233-11.968-31.465-26.501 2.808-41.236-10.76-47.279-22.26 6.213-6.255 13.068-9.157 26.322-9.998-29.017-6.581-39.719-20.227-43.011-36.776 8.059-1.844 18.135-3.436 23.637-2.724-25.411-12.772-34.247-31.98-32.848-46.422 45.402 16.202 74.336 29.216 98.534 41.7 8.619 4.41 18.237 12.38 29.084 22.471 13.825-35.095 30.888-71.268 60.12-89.215-.493 4.07-2.757 7.856-5.76 10.956 8.291-7.239 19.06-12.218 30.004-13.656-1.255 7.896-13.094 12.341-20.233 14.927 5.41-1.621 34.18-13.957 37.317-6.932 3.702 8-19.851 11.669-23.853 13.058-2.983.965-5.986 2.023-8.928 3.17 36.463-3.49 71.26 25.413 81.423 61.295.721 2.581 1.44 5.448 2.099 8.454 13.331 4.782 37.492-.222 45.279-4.825-5.626 12.792-20.253 22.21-41.833 23.93 10.399 4.154 29.994 6.427 43.51 4.222-8.558 8.83-22.363 16.836-45.823 16.648z"/></svg><a href="';
							the_field('twitter_url', 'user_' . $user_id .'');
							echo '" target="_blank">Twitter</a></li>';
						}
						if(get_field('google_url', 'user_' . $user_id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-square-googleplus" data-cacheid="icon-5a567fa484212" style="fill: #dd4b39; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M182.053 290.771c-3.797 0-26.589.831-44.332 6.736-9.278 3.358-36.297 13.416-36.297 43.256 0 29.822 29.136 51.238 74.295 51.238 40.533 0 62.09-19.322 62.09-45.351 0-21.416-13.934-32.784-46.037-55.473-3.391-.406-5.494-.406-9.719-.406zm261.947-297.171h-376c-37.555 0-68 30.445-68 68v376c0 37.555 30.445 68 68 68h376c37.555 0 68-30.445 68-68v-376c0-37.555-30.445-68-68-68zm-192.287 167.789c0 31.086-17.731 45.789-35.461 59.644-5.475 5.457-11.801 11.353-11.801 20.594 0 9.246 6.326 14.264 10.949 18.068l15.209 11.746c18.565 15.547 35.449 29.849 35.449 58.803 0 39.517-38.412 79.426-111.03 79.426-61.21 0-90.778-29.001-90.778-60.094 0-15.124 7.618-36.531 32.522-51.267 26.186-15.943 61.654-18.039 80.631-19.294-5.91-7.574-12.662-15.539-12.662-28.566 0-7.152 2.135-11.355 4.244-16.375-4.685.402-9.303.831-13.523.831-44.74 0-70.075-33.207-70.075-65.964 0-19.335 8.846-40.742 27.02-56.294 24.052-19.727 52.752-23.086 75.553-23.086h86.953l-26.984 15.109h-26.205c9.709 7.977 29.987 24.779 29.987 56.719zm196.036 10.123h-70.743v67.49h-18.01v-67.49h-70.745v-18.01h70.745v-63.94h18.01v63.94h70.743v18.01zm-286.38-68.105c-10.982 0-22.797 5.462-29.553 13.868-7.165 8.831-9.277 20.157-9.277 31.086 0 28.134 16.46 74.767 52.752 74.767 10.551 0 21.963-5.038 28.725-11.751 9.699-9.678 10.56-23.104 10.56-30.679 0-30.237-18.166-77.29-53.207-77.29z"/></svg><a href="';
							the_field('google_url', 'user_' . $user_id .'');
							echo '" target="_blank">Google+</a></li>';
						}
						if(get_field('youtube_url', 'user_' . $user_id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-square-youtube" data-cacheid="icon-5a567fa484880" style="fill: #bb0000; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M227.369 349.573c0 7.385.448 11.076-.017 12.377-1.446 3.965-7.964 8.156-10.513.43-.427-1.353-.049-5.44-.049-12.447l-.07-51.394h-17.734l.053 50.578c.022 7.752-.172 13.537.061 16.164.44 4.644.286 10.049 4.584 13.133 8.026 5.793 23.391-.861 27.24-9.123l-.04 10.547 14.319.019v-81.318h-17.835v51.035zm46.259-47.854l.062-31.592-17.809.035-.089 109.006 14.645-.219 1.335-6.785c18.715 17.166 30.485 5.404 30.458-15.174l-.035-42.49c-.017-16.183-12.129-25.887-28.567-12.781zm15.364 58.35c0 3.524-3.515 6.39-7.805 6.39s-7.797-2.867-7.797-6.39v-47.695c0-3.526 3.507-6.408 7.797-6.408 4.289 0 7.805 2.883 7.805 6.408v47.695zm155.008-366.469h-376c-37.555 0-68 30.445-68 68v376c0 37.555 30.445 68 68 68h376c37.555 0 68-30.445 68-68v-376c0-37.555-30.445-68-68-68zm-156.606 129.297h16.34v65.764c0 3.564 2.935 6.473 6.505 6.473 3.586 0 6.512-2.909 6.512-6.473v-65.764h15.649v84.5h-19.866l.334-6.997c-1.354 2.843-3.024 4.97-5.001 6.399-1.988 1.433-4.255 2.127-6.83 2.127-2.928 0-5.381-.681-7.297-2.026-1.933-1.366-3.366-3.178-4.29-5.419-.915-2.259-1.476-4.601-1.705-7.036-.219-2.457-.351-7.296-.351-14.556v-56.991zm-48.83.883c3.511-2.769 8.003-4.158 13.471-4.158 4.592 0 8.539.901 11.826 2.673 3.305 1.771 5.854 4.083 7.631 6.931 1.801 2.856 3.022 5.793 3.673 8.799.66 3.046.994 7.643.994 13.836v21.369c0 7.84-.317 13.606-.923 17.267-.599 3.67-1.908 7.072-3.912 10.272-1.988 3.155-4.544 5.52-7.647 7.029-3.137 1.515-6.733 2.258-10.786 2.258-4.531 0-8.341-.619-11.488-1.934-3.156-1.291-5.59-3.26-7.331-5.857-1.754-2.594-2.985-5.772-3.727-9.468-.756-3.701-1.113-9.261-1.113-16.666v-22.371c0-8.113.685-14.447 2.026-19.012 1.345-4.55 3.78-8.21 7.305-10.966zm-52.06-34.18l11.946 41.353 11.77-41.239h20.512l-22.16 55.523-.023 64.81h-18.736l-.031-64.788-23.566-55.659h20.287zm197.528 280.428c0 21.764-18.882 39.572-41.947 39.572h-172.476c-23.078 0-41.951-17.808-41.951-39.572v-90.733c0-21.755 18.873-39.573 41.951-39.573h172.476c23.065 0 41.947 17.819 41.947 39.573v90.733zm-131.334-174.005c4.343 0 7.876-3.912 7.876-8.698v-44.983c0-4.778-3.532-8.684-7.876-8.684-4.338 0-7.903 3.906-7.903 8.684v44.984c0 4.786 3.565 8.698 7.903 8.698zm-50.218 88.284v-14.152l-56.999-.098v13.924l17.791.053v95.84h17.835l-.013-95.567h21.386zm142.172 67.119l-.034 1.803v7.453c0 4-3.297 7.244-7.298 7.244h-2.619c-4.015 0-7.313-3.244-7.313-7.244v-19.61h30.617v-11.515c0-8.42-.229-16.832-.924-21.651-2.188-15.224-23.549-17.64-34.353-9.853-3.384 2.435-5.978 5.695-7.478 10.074-1.522 4.377-2.269 10.363-2.269 17.967v25.317c0 42.113 51.14 36.162 45.041-.053l-13.37.068zm-16.947-34.244c0-4.361 3.586-7.922 7.964-7.922h1.063c4.394 0 7.981 3.56 7.981 7.922l-.192 9.81h-16.887l.072-9.81z"/></svg><a href="';
							the_field('youtube_url', 'user_' . $user_id .'');
							echo '" target="_blank">YouTube</a></li>';
						}
						echo '</ul></div>';
						
					   echo '<p>&nbsp;</p></div>';
					}?>
                    
                    
                    
                    <?php
					   if (have_rows('affiliations', 'user_' . $user_id .'') ) { 
						echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h4 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Affiliations</span></h4>';?>
							<?php while (have_rows('affiliations', 'user_' . $user_id .'') ): the_row(); ?>
                               
<div id="newdirectoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none   clear" data-family=""><ul>

<li id="newdirectoryLineFix"><svg  class="mk-svg-icon" data-name="mk-icon-arrow-circle-right" data-cacheid="icon-5a576bf1f2b2a" style="fill: #999; height:16px; width: 13.714285714286px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1792"><path d="M1285 896q0-27-18-45l-91-91-362-362q-18-18-45-18t-45 18l-91 91q-18 18-18 45t18 45l189 189h-502q-26 0-45 19t-19 45v128q0 26 19 45t45 19h502l-189 189q-19 19-19 45t19 45l91 91q18 18 45 18t45-18l362-362 91-91q18-18 18-45zm251 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>                    
                                        
<?php if(get_sub_field('aff_url', 'user_' . $user_id .'')) { ?> 
	<a href="<?php the_sub_field('aff_url', 'user_' . $user_id .''); ?>" title="<?php the_sub_field('aff_name', 'user_' . $user_id .''); ?>" target="_blank"><?php the_sub_field('aff_name', 'user_' . $user_id .''); ?></a>
		<?php }
        else {
        the_sub_field('aff_name', 'user_' . $user_id .'');
        }                  ?>                                                         
   
                                </ul></div>                    
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
