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