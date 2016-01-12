<?php /* Template: COHPA Profile */ ?>



        
<!-- START THE CUSTOM SECTION -->

<?php
	$user_id       = um_profile_id();
	$profile_link  = um_user_profile_url();
	//print($user_id);
	//print($profile_link);
?>
<?php //the_field('upload_headshot', 'user_' . $user_id .''); ?>



<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-3 wpb_column column_container ">
		<div style="text-align: left;" class="mk-text-block  true">
        	<p>INSERT SIDEBAR HERE</p>
			<div class="clearboth"></div>
        </div> 
	</div>
	
    <div style="" class="vc_col-sm-9 wpb_column column_container ">
		<div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid">
        	<div class="wpb_column vc_column_container vc_col-sm-4">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    	<p>INSERT PROFILE PIC</p>
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-8">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    	<!-- START MAIN INFO SECTION -->    
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
<!-- END MAIN INFO SECTION --> 
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
                    	<p>INSERT TABBED CONTENT</p>
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-3">
            	<div class="wpb_wrapper">
                	<div style="text-align: left;" class="mk-text-block  true">
                    	<p>INSERT LINKS SECTION</p>
						<div class="clearboth"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>


