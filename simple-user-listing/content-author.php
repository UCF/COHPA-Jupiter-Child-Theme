<?php
/**
 * The Template for displaying Author listings
 *
 * Override this template by copying it to yourtheme/authors/content-author.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $user;

$user_info = um_fetch_user( $user->id );
$num_posts = count_user_posts( $user->ID );

// my vars

$buildingMap = get_field('building', 'user_' . $user->id .'');

$image = get_field('upload_headshot', 'user_' . $user->id .'');
$url = $image['url'];
$size = 'faculty';
$thumb = $image['sizes'][ $size ];
$width = $image['sizes'][ $size . '-width' ];
$height = $image['sizes'][ $size . '-height' ];
$jobs_ucf = get_field('job_titles', 'user_' . $user->id .'');
$jobtitle_ucf = get_sub_field('job_title');
		
?>
<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid vc_custom_1455896967960" style="padding-bottom:20px; margin-bottom:20px; border-bottom:1px solid #ddd;">
	<div style="" class="vc_col-sm-2 wpb_column column_container ">
			
            
            
            
            <div class="mk-image-shortcode mk-shortcode   align-left single_line-frame inside-image " style="max-width: 600px; margin-bottom:10px">
            	<div class="mk-image-inner">
                	<?php
					if( $image ) { ?>
						<a href="<?php echo um_user_profile_url(); ?>" title="<?php echo '' . $user->display_name . ''; ?>">
						<img src="<?php echo $thumb; ?>" alt="<?php echo '' . $user->display_name . ''; ?>" title="<?php echo '' . $user->display_name . ''; ?>" width="100%" />
						</a>
						 
					<?php }
					else { ?> 
						<img class="lightbox-true" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image"  width="100%" />
					<?php } ?>  
                </div>
                <div class="clearboth"></div>
            </div>
	</div>
	<div style="" class="vc_col-sm-6 wpb_column column_container ">
        <h2 style="font-size: 25px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e076fc" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style directoryNameFixer">
            <span style="">
                <?php		
					echo '<a href="';
					echo um_user_profile_url();
					echo '" title="';
					echo '' . $user->display_name . '';
					echo '">';
					echo '' . $user->display_name . '';
					echo '</a>';
				?>	
            </span>
        </h2>
        <div class="clearboth"></div>
        <div style=" margin-bottom:10px;text-align: left;" class="mk-text-block  true">
            <div id="cohpa-directory-name">
                <p><div id="showFacultyJobTitle">
                <?php
						switch_to_blog(1);
						
							if( get_field('job_titles', 'user_' . $user->id .'') ) {
								$num_rows = 0;
									while ( have_rows('job_titles', 'user_' . $user->id .'') ) : the_row();
									$num_rows++;
									endwhile;
							
									while ( have_rows('job_titles', 'user_' . $user->id .'') ) : the_row();
									$num_rows--;
									echo '<span>'. get_sub_field('job_title') .'</span>';
									if ( $num_rows == 0 ) { echo ''; }
									else { echo ', '; }
									endwhile;
							}
						restore_current_blog();
							?>
                </div>
                <div id="showFacultyDepartment">
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
                </div>
                <div id="newdirectoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none testingthis  clear" data-family=""><ul> 
                <?php 
		if( ! empty( $user->phone_number ) ) { 
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-phone" data-cacheid="icon-5a553bfdc3fd3" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 320c-32 32-32 64-64 64s-64-32-96-64-64-64-64-96l64-64s-64-128-96-128l-96 96c0 64 65.75 193.75 128 256s192 128 256 128c0 0 96-64 96-96s-96-128-128-96z"/></svg>Phone: ';
							echo '' . $user->phone_number . '';
							echo '</li>';
						}
		if( ! empty( $user->email_address ) ) { 
							echo '<li><svg  class="mk-svg-icon" data-name="mk-icon-envelope" data-cacheid="icon-5a55331319080" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"/></svg>Email: <a href="mailto:';
							echo '' . $user->email_address . '';
							echo '">';
							echo '' . $user->email_address . '';
							echo '</a></li>';
						}	
						?>
                        
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
						echo '' . $user->building . '';
						echo '">';
						echo '' . $user->building . '';
						echo '</a> ';
						if( ! empty( $user->room_number ) ) { 
							echo ' Room: ';
							echo '' . $user->room_number . '';
						}
						echo '</li>';	?>
                
               <!-- <span class="color-lightgray">Phone: </span>407-823-5884<br />
                <span class="color-lightgray">Email: </span>
                <a title="Contact David Janosik" href="mailto:djanosik@ucf.edu">djanosik@ucf.edu</a>-->
                
                
            </ul></div>    
            </div>
            <div class="clearboth"></div>
        </div>
    </div>
    <div style="" class="vc_col-sm-4 wpb_column column_container ">
    
    <?php 
	if(get_field('cv', 'user_' . $user->id .'') || get_field('website_url', 'user_' . $user->id .'') || get_field('facebook_url', 'user_' . $user->id .'') || get_field('linkedin_url', 'user_' . $user->id .'')) {
	   ?>
        <h2 style="font-size: 16px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:normal;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e07f2d" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style="">Additional Info</span></h2>
       <?php  }?>	
        <div class="clearboth"></div>
        <div style="text-align: left;" class="mk-text-block  true">
           <div id="newdirectoryIcons" data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none   clear" data-family=""><ul>
            <?php 
					if(get_field('cv', 'user_' . $user->id .'') || get_field('website_url', 'user_' . $user->id .'') || get_field('facebook_url', 'user_' . $user->id .'') || get_field('linkedin_url', 'user_' . $user->id .'')) {
					   echo '';
					
					if(get_field('cv', 'user_' . $user->id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-icon-file-text" data-cacheid="icon-5a577c25b6b92" style="fill: #999; height:16px; width: 13.714285714286px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1792"><path d="M1468 476q14 14 28 36h-472v-472q22 14 36 28zm-476 164h544v1056q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h800v544q0 40 28 68t68 28zm160 736v-64q0-14-9-23t-23-9h-704q-14 0-23 9t-9 23v64q0 14 9 23t23 9h704q14 0 23-9t9-23zm0-256v-64q0-14-9-23t-23-9h-704q-14 0-23 9t-9 23v64q0 14 9 23t23 9h704q14 0 23-9t9-23zm0-256v-64q0-14-9-23t-23-9h-704q-14 0-23 9t-9 23v64q0 14 9 23t23 9h704q14 0 23-9t9-23z"/></svg><a href="';
							the_field('cv', 'user_' . $user->id .'');
							echo '" target="_blank">Curriculum Vitae</a></li>';
						}
						if(get_field('website_url', 'user_' . $user->id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-globe" data-cacheid="icon-5a5761fdb02a2" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 32c-132.548 0-240 107.452-240 240 0 132.549 107.452 240 240 240 132.549 0 240-107.451 240-240 0-132.548-107.451-240-240-240zm135.795 320c4.29-20.227 6.998-41.696 7.879-64h63.723c-1.668 22.098-6.812 43.557-15.34 64h-56.262zm-271.59-160c-4.29 20.227-6.998 41.696-7.879 64h-63.722c1.668-22.097 6.811-43.557 15.339-64h56.262zm238.813 0c4.807 20.481 7.699 41.927 8.64 64h-95.658v-64h87.018zm-87.018-32v-93.669c7.295 2.123 14.522 5.685 21.614 10.685 13.291 9.37 26.006 23.804 36.77 41.743 7.441 12.401 13.876 26.208 19.248 41.242h-77.632zm-90.384-41.242c10.764-17.939 23.478-32.374 36.77-41.743 7.091-5 14.319-8.562 21.614-10.685v93.67h-77.632c5.373-15.033 11.808-28.84 19.248-41.242zm58.384 73.242v64h-95.657c.94-22.073 3.833-43.519 8.639-64h87.018zm-176.056 160c-8.528-20.443-13.671-41.902-15.339-64h63.722c.881 22.304 3.589 43.773 7.879 64h-56.262zm80.399-64h95.657v64h-87.018c-4.806-20.48-7.699-41.927-8.639-64zm95.657 96v93.67c-7.294-2.123-14.522-5.686-21.614-10.685-13.292-9.37-26.007-23.805-36.77-41.743-7.441-12.402-13.875-26.209-19.249-41.242h77.633zm90.384 41.242c-10.764 17.938-23.479 32.373-36.77 41.743-7.092 4.999-14.319 8.562-21.614 10.685v-93.67h77.633c-5.373 15.033-11.808 28.84-19.249 41.242zm-58.384-73.242v-64h95.657c-.94 22.073-3.833 43.52-8.64 64h-87.017zm127.674-96c-.881-22.304-3.589-43.773-7.879-64h56.262c8.528 20.443 13.672 41.903 15.34 64h-63.723zm31.655-96h-47.95c-9.319-29.381-22.188-55.147-37.658-75.714 21.268 10.17 40.529 23.808 57.357 40.636 10.74 10.739 20.181 22.469 28.251 35.078zm-322.407-35.078c16.829-16.829 36.09-30.466 57.357-40.636-15.471 20.567-28.338 46.333-37.658 75.714h-47.949c8.069-12.609 17.511-24.339 28.25-35.078zm-28.25 259.078h47.949c9.32 29.381 22.188 55.147 37.659 75.715-21.268-10.17-40.529-23.808-57.357-40.637-10.74-10.739-20.182-22.469-28.251-35.078zm322.406 35.078c-16.828 16.829-36.09 30.467-57.357 40.637 15.471-20.567 28.339-46.334 37.658-75.715h47.95c-8.07 12.609-17.511 24.339-28.251 35.078z"/></svg><a href="';
							the_field('website_url', 'user_' . $user->id .'');
							echo '" target="_blank">Personal Website</a></li>';
						}
						if(get_field('facebook_url', 'user_' . $user->id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-square-facebook" data-cacheid="icon-5a567fa482bd1" style="fill: #3b5998; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M444-6.4h-376c-37.555 0-68 30.445-68 68v376c0 37.555 30.445 68 68 68h376c37.555 0 68-30.445 68-68v-376c0-37.555-30.445-68-68-68zm-123.943 159.299h-49.041c-7.42 0-14.918 7.452-14.918 12.99v19.487h63.723c-2.081 28.41-6.407 64.679-6.407 64.679h-57.565v159.545h-63.929v-159.545h-32.756v-64.474h32.756v-33.53c0-8.098-1.706-62.336 70.46-62.336h57.678v63.183z"/></svg><a href="';
							the_field('facebook_url', 'user_' . $user->id .'');
							echo '" target="_blank">Facebook</a></li>';
						}
						if(get_field('linkedin_url', 'user_' . $user->id .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-linkedin" data-cacheid="icon-5a567fa48352f" style="fill: #007bb6; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M426 0h-340c-47.3 0-86 38.7-86 86v340c0 47.3 38.7 86 86 86h340c47.3 0 86-38.7 86-86v-340c0-47.3-38.7-86-86-86zm-234 416h-64v-224h64v224zm-32-256c-17.673 0-32-14.327-32-32s14.327-32 32-32 32 14.327 32 32-14.327 32-32 32zm256 256h-64v-128c0-17.673-14.327-32-32-32s-32 14.327-32 32v128h-64v-224h64v39.736c13.199-18.132 33.376-39.736 56-39.736 39.765 0 72 35.817 72 80v144z"/></svg><a href="';
							the_field('linkedin_url', 'user_' . $user->id .'');
							echo '" target="_blank">Linkedin</a></li>';
						}
						
					   echo '<p>&nbsp;</p>';
					}?>	
			</ul></div>
            <div class="clearboth"></div>
        </div> 
    </div>
</div>
<style id='theme-dynamic-styles-inline-css' type='text/css'>
#divider-7 { padding:10px 0 30px; } 
#divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
.mk-divider.shadow_line .divider-inner { height:7px; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; }

.mk-image.border_shadow-frame .mk-image-inner { border:6px solid #ffffff; box-shadow:0 0 5px rgba(0, 0, 0, 0.25); } 

</style>


 <!-- END --> 