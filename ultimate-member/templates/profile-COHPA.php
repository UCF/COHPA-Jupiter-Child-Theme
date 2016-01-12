<?php /* Template: COHPA Profile */ ?>


<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?> um-role-<?php echo um_user('role'); ?> ">

	<div class="um-form">

    
    <a href="<?php echo um_user_profile_url(); ?>" class="um-profile-photo-img" title="<?php echo um_user('display_name'); ?>"><?php echo $overlay . get_avatar( um_user('ID'), $default_size ); ?></a>
    
<!-- START THE CUSTOM SECTION -->

<?php
	$user_id       = um_profile_id();
	print($user_id);
?>
        
    <li>working</li> 
    <p><?php the_field('upload_headshot', 'user_' . $user_id .''); ?></p>




<!-- START MAIN INFO SECTION -->    
<div style="" class="vc_col-sm-8 wpb_column column_container ">
	<div class="single-social-section">
		<div class="blog-share-container">
			<div class="blog-single-share mk-toggle-trigger"><i class="mk-moon-share-2"></i></div>
                <ul class="single-share-box mk-box-to-trigger">
                    <li><a class="facebook-share" data-title="<?php the_title(); ?>" data-url="<?php echo um_user_profile_url(); ?>" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>
                    <li><a class="twitter-share" data-title="<?php the_title(); ?>" data-url="<?php echo um_user_profile_url(); ?>" href="#"><i class="mk-moon-twitter"></i></a></li>
                    <li><a class="googleplus-share" data-title="<?php the_title(); ?>" data-url="<?php echo um_user_profile_url(); ?>" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>
                    <li><a class="pinterest-share" data-image="<?php echo $image_src_array[0]; ?>" data-title="<?php the_title(); ?>" data-url="<?php echo um_user_profile_url(); ?>" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>
                    <li><a class="linkedin-share" data-title="<?php the_title(); ?>" data-url="<?php echo um_user_profile_url(); ?>" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>
                </ul>
            </div>
            <a class="mk-blog-print" onClick="window.print()" href="#" title="<?php _e('Print', 'mk_framework'); ?>"><i class="mk-moon-print-3"></i></a>
        	<div class="clearboth"></div>
        </div>
		<h2 class="blog-single-title"><?php the_title(); ?></h2>
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
	</div>
</div>
<!-- END MAIN INFO SECTION --> 






<!-- END THE CUSTOM SECTION -->
    
    
    
    
    
    
    
    
    
		<?php do_action('um_profile_before_header', $args ); ?>
		
		<?php if ( um_is_on_edit_profile() ) { ?><form method="post" action=""><?php } ?>
		
			<?php do_action('um_profile_header_cover_area', $args ); ?>
			
			<?php do_action('um_profile_header', $args ); ?>
			
			<?php do_action('um_profile_navbar', $args ); ?>
			
			<?php
				
			$nav = $ultimatemember->profile->active_tab;
			$subnav = ( get_query_var('subnav') ) ? get_query_var('subnav') : 'default';
				
			print "<div class='um-profile-body $nav $nav-$subnav'>";
				
				// Custom hook to display tabbed content
				do_action("um_profile_content_{$nav}", $args);
				do_action("um_profile_content_{$nav}_{$subnav}", $args);
				
			print "</div>";
				
			?>
		
		<?php if ( um_is_on_edit_profile() ) { ?></form><?php } ?>
	
	</div>
	
</div>