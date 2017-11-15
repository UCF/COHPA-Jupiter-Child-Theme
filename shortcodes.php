<?php

add_shortcode('show_faculty', function() {


$values = get_field('choose_directory');
if($values)
{ 
	foreach($values as $value)	{
         $user_db = $value['ID'];
		 $buildingMap = get_field('building', 'user_' . $user_db .'');
		 $roomy = get_field('room_number', 'user_' . $user_db .'');
?>


<?php switch_to_blog(1); 
$image_ucf = get_field('upload_headshot', 'user_' . $user_db .'');
$jobs_ucf = get_field('job_titles', 'user_' . $user_db .'');
$jobtitle_ucf = get_sub_field('job_title');
?>
<?php restore_current_blog(); ?>




<?php
$myFNAMEDirectory = strtolower(get_field('first_name', 'user_' . $user_db));
$myFNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myFNAMEDirectory);
$cohpaFNAME = preg_replace("/[\s_]/", "-", $myFNAME);

$myLNAMEDirectory = strtolower(get_field('last_name', 'user_' . $user_db));
$myLNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myLNAMEDirectory);
$cohpaLNAME = preg_replace("/[\s_]/", "-", $myLNAME);
?>
<!-- START REPEATER SECTION -->	
<div class="wpb_row vc_inner vc_row    attched-false   vc_row-fluid ">
	<div class="wpb_column vc_column_container vc_col-sm-2">
    	<div class="vc_column-inner ">
        	<div class="wpb_wrapper">
            	<div class="mk-image   align-left border_shadow-frame inside-image " style="margin-bottom:10px">
					<div class="mk-image-holder" style="max-width: 500px;">
                    	<div class="mk-image-inner ">
                        <a href="/directory/<?php echo $cohpaFNAME; ?>-<?php echo $cohpaLNAME; ?>" title="View <?php echo $value['display_name'] ; ?>'s Profile">
							<?php if( $image_ucf ) { ?>
                                <img class="lightbox-false" alt="View <?php echo $value['display_name'] ; ?>'s Profile" title="View <?php echo $value['display_name'] ; ?>'s Profile" width="500" src="<?php echo $image_ucf['url']; ?>">
                             <?php }
                                else { ?> 
                                    <img class="lightbox-false" alt="View <?php echo $value['display_name'] ; ?>'s Profile" title="View <?php echo $value['display_name'] ; ?>'s Profile" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image" />        
                            <?php } ?>
                        </a>    
                        </div>
                    </div>
					<div class="clearboth"></div>
				</div>
            </div>
        </div>
    </div>
	<div class="wpb_column vc_column_container vc_col-sm-10">
    	<div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div id="text-block-6" class="mk-text-block   ">
                    <h3 style="font-weight:bold;">
                        <a title="View <?php echo $value['display_name'] ; ?>'s Profile" href="/directory/<?php echo $cohpaFNAME; ?>-<?php echo $cohpaLNAME; ?>" target="_parent"><?php echo $value['display_name'] ; ?></a>
                    </h3>
                    <p><div id="showFacultyJobTitle">
                    	<?php
						switch_to_blog(1);
						
							if( get_field('job_titles', 'user_' . $user_db .'') ) {
								$num_rows = 0;
									while ( have_rows('job_titles', 'user_' . $user_db .'') ) : the_row();
									$num_rows++;
									endwhile;
							
									while ( have_rows('job_titles', 'user_' . $user_db .'') ) : the_row();
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
                        <?php the_field('department', 'user_' . $user_db); ?>
                        <?php 
						$terms = get_field('department');
						if( $terms ) {
						  $count = count( $terms );
							$i = 0;
							$term_list = ' ';
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
                        <div id="directoryProfile-phone"><i style="color:#666;margin:4px;" class="mk-moon-phone  mk-size-small"></i> Phone: <?php the_field('phone_number', 'user_'. $user_db ); ?></div>
                        <div id="directoryProfile-email"><i style="color:#666;margin:4px;" class="mk-moon-envelop-2  mk-size-small"></i> Email: <a title="Contact <?php echo $value['display_name'] ; ?>" href="mailto:<?php the_field('email_address', 'user_'. $user_db ); ?>"><?php the_field('email_address', 'user_'. $user_db ); ?></a></div>
                    </p>
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
						the_field('building', 'user_'. $user_db );
						echo '">';
						the_field('building', 'user_'. $user_db );
						echo '</a> ';
						if( ! empty( $roomy ) ) { 
							echo ' Room: ';
							the_field('room_number', 'user_'. $user_db );
						}
						echo '</div>';	?>
    
                    <div class="clearboth"></div>
                </div>
            </div>
        </div>
    </div>	
</div>
<div id="divider-7" class="mk-divider  divider_full_width center shadow_line ">
	<div class="divider-inner">
		<span class="divider-shadow-left"></span><span class="divider-shadow-right"></span>
	</div>
</div>
<div class="clearboth"></div>
<!-- END REPEATER SECTION -->	

<?php
	}
}	
	?>
	
<style id='theme-dynamic-styles-inline-css' type='text/css'>
#divider-7 { padding:10px 0 30px; } 
#divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
.mk-divider.shadow_line .divider-inner { height:7px; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; }

.mk-image.border_shadow-frame .mk-image-inner { border:6px solid #ffffff; box-shadow:0 0 5px rgba(0, 0, 0, 0.25); } 

</style>	
	
<?php	
});// END SHORTCODE [show_faculty]?> 








<?php

add_shortcode('show_chair', function() {


$values = get_field('choose_chair');
if($values)
{ 
	foreach($values as $value)	{
         $user_db = $value['ID'];
		 $buildingMap = get_field('building', 'user_' . $user_db .'');
		 $roomy = get_field('room_number', 'user_' . $user_db .'');
?>


<?php switch_to_blog(1); 
$image_ucf = get_field('upload_headshot', 'user_' . $user_db .'');
$jobs_ucf = get_field('job_titles', 'user_' . $user_db .'');
$jobtitle_ucf = get_sub_field('job_title');
?>
<?php restore_current_blog(); ?>


<!-- START REPEATER SECTION -->	
<div class="wpb_row vc_inner vc_row    attched-false   vc_row-fluid ">
	<div class="wpb_column vc_column_container vc_col-sm-2">
    	<div class="vc_column-inner ">
        	<div class="wpb_wrapper">
            	<div class="mk-image   align-left border_shadow-frame inside-image " style="margin-bottom:10px">
					<div class="mk-image-holder" style="max-width: 500px;">
                    	<div class="mk-image-inner ">
                        <a href="/directory/<?php echo strtolower(get_field('first_name', 'user_' . $user_db)); ?>-<?php echo strtolower(get_field('last_name', 'user_' . $user_db)); ?>" title="View <?php echo $value['display_name'] ; ?>'s Profile">
							<?php if( $image_ucf ) { ?>
                                <img class="lightbox-false" alt="View <?php echo $value['display_name'] ; ?>'s Profile" title="View <?php echo $value['display_name'] ; ?>'s Profile" width="500" src="<?php echo $image_ucf['url']; ?>">
                             <?php }
                                else { ?> 
                                    <img class="lightbox-false" alt="View <?php echo $value['display_name'] ; ?>'s Profile" title="View <?php echo $value['display_name'] ; ?>'s Profile" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image" />        
                            <?php } ?>
                        </a>    
                        </div>
                    </div>
					<div class="clearboth"></div>
				</div>
            </div>
        </div>
    </div>
	<div class="wpb_column vc_column_container vc_col-sm-10">
    	<div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div id="text-block-6" class="mk-text-block   ">
                    <h3 style="font-weight:bold;">
                        <a title="View <?php echo $value['display_name'] ; ?>'s Profile" href="/directory/<?php echo strtolower(get_field('first_name', 'user_' . $user_db)); ?>-<?php echo strtolower(get_field('last_name', 'user_' . $user_db)); ?>" target="_parent"><?php echo $value['display_name'] ; ?></a>
                    </h3>
                    <p><span style="font-weight:bold; font-size:16px;">
                    	<?php
						switch_to_blog(1);
						
							if( get_field('job_titles', 'user_' . $user_db .'') ) {
								$num_rows = 0;
									while ( have_rows('job_titles', 'user_' . $user_db .'') ) : the_row();
									$num_rows++;
									endwhile;
							
									while ( have_rows('job_titles', 'user_' . $user_db .'') ) : the_row();
									$num_rows--;
									echo '<span>'. get_sub_field('job_title') .'</span>';
									if ( $num_rows == 0 ) { echo ''; }
									else { echo ', '; }
									endwhile;
							}
						restore_current_blog();
							?>
                            
                    </span><br>
                        <?php the_field('department', 'user_' . $user_db); ?>
                        <?php 
						$terms = get_field('department');
						if( $terms ) {
						  $count = count( $terms );
							$i = 0;
							$term_list = ' ';
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
                        <div id="directoryProfile-phone"><i style="color:#666;margin:4px;4px;" class="mk-moon-phone  mk-size-small"></i> Phone: <?php the_field('phone_number', 'user_'. $user_db ); ?></div>
                        <div id="directoryProfile-email"><i style="color:#666;margin:4px;4px;" class="mk-moon-envelop-2  mk-size-small"></i> Email: <a title="Contact <?php echo $value['display_name'] ; ?>" href="mailto:<?php the_field('email_address', 'user_'. $user_db ); ?>"><?php the_field('email_address', 'user_'. $user_db ); ?></a></div>
                    </p>
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
						the_field('building', 'user_'. $user_db );
						echo '">';
						the_field('building', 'user_'. $user_db );
						echo '</a> ';
						if( ! empty( $roomy ) ) { 
							echo ' Room: ';
							the_field('room_number', 'user_'. $user_db );
						}
						echo '</div>';	?>
    
                    <div class="clearboth"></div>
                </div>
            </div>
        </div>
    </div>	
</div>
<div id="divider-7" class="mk-divider  divider_full_width center shadow_line ">
	<div class="divider-inner">
		<span class="divider-shadow-left"></span><span class="divider-shadow-right"></span>
	</div>
</div>
<div class="clearboth"></div>
<!-- END REPEATER SECTION -->	

<?php
	}
}	
	?>
	
<style id='theme-dynamic-styles-inline-css' type='text/css'>
#divider-7 { padding:10px 0 30px; } 
#divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(https://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
.mk-divider.shadow_line .divider-inner { height:7px; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; }

.mk-image.border_shadow-frame .mk-image-inner { border:6px solid #ffffff; box-shadow:0 0 5px rgba(0, 0, 0, 0.25); } 

</style>	
	
<?php	
});// END SHORTCODE [show_faculty]?> 








<?php

add_shortcode('show_research', function() {


$values = get_field('choose_researchers');
if($values)
{ 
	foreach($values as $value)	{
         $user_db = $value['ID'];
?>


<?php switch_to_blog(1); 
$image_ucf = get_field('upload_headshot', 'user_' . $user_db .'');
$research_ucf = get_field('research_interests', 'user_'. $user_db );

$params = array( 'width' => 600, 'height' => 760 );
$imageCrop = bfi_thumb( $image_ucf['url'], $params );
$imageBackup = bfi_thumb( "/wp-content/uploads/2016/01/defaul-avatar_0.jpg", $params );

?>
<?php restore_current_blog(); ?>



<!-- START REPEATER SECTION -->	
<div class="wpb_row vc_row  mk-fullwidth-false  attched-false  vc_row-fluid  js-master-row ">
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<div class="mk-image  lightbox-enabled align-left border_shadow-frame inside-image " style="margin-bottom:10px">
        	<div class="mk-image-holder" style="max-width: 533px;">
            	<div class="mk-image-inner ">
                	<a href="/directory/<?php echo strtolower(get_field('first_name', 'user_' . $user_db)); ?>-<?php echo strtolower(get_field('last_name', 'user_' . $user_db)); ?>" target="_self" class="mk-image-link">
                    <?php if( $image_ucf ) { ?>
                    <img class="lightbox-false" alt="View <?php echo $value['display_name'] ; ?>'s Profile" title="View <?php echo $value['display_name'] ; ?>'s Profile" width="500" src="<?php echo $imageCrop; ?>">
                     <?php }
						else { ?> 
							<img class="lightbox-false" alt="View <?php echo $value['display_name'] ; ?>'s Profile" title="View <?php echo $value['display_name'] ; ?>'s Profile" src="<?php echo $imageBackup; ?>" itemprop="image" />        
					<?php } ?>
                    </a>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
    </div>
	<div style="" class="vc_col-sm-9 wpb_column column_container  _ height-full">
		<h2 id="fancy-title-2" class="mk-fancy-title  simple-style directoryNameFixer color-single">
			<span>
				<a title="View <?php echo $value['display_name'] ; ?>'s Profile" href="/directory/<?php echo strtolower(get_field('first_name', 'user_' . $user_db)); ?>-<?php echo strtolower(get_field('last_name', 'user_' . $user_db)); ?>" target="_parent"><?php echo $value['display_name'] ; ?><?php
	echo '<span class="directoryDegrees">';
		if( get_field('degrees', 'user_' . $user_db .'') ) {
			echo ', ';
			$num_rows = 0;
				while ( have_rows('degrees', 'user_' . $user_db .'') ) : the_row();
				$num_rows++;
				endwhile;
		
				while ( have_rows('degrees', 'user_' . $user_db .'') ) : the_row();
				$num_rows--;
				echo '<span>'. get_sub_field('degree') .'</span>';
				if ( $num_rows == 0 ) { echo ''; }
				else { echo ', '; }
				endwhile;
		}
	echo '</span>';	
		?>   	</a>			
            </span>
		</h2>
		<div id="list-3" class="mk-list-styles  mk-align-none  clear" data-charcode="f00c" data-family="awesome-icons">
		<?php 
			$termswer = get_field('research_interests', 'user_'. $user_db );
			if( $termswer ): 
			?>
				<ul>
				<?php foreach( $termswer as $term ): ?>
					<li style="text-transform:capitalize;"><svg  class="mk-svg-icon" data-name="mk-icon-ok" data-cacheid="icon-57c032d7801fd" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg><?php echo $term->name; ?></li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
    </div>
</div>


<div id="divider-7" class="mk-divider  divider_full_width center shadow_line ">
	<div class="divider-inner">
		<span class="divider-shadow-left"></span><span class="divider-shadow-right"></span>
	</div>
</div>
<div class="clearboth"></div>
<!-- END REPEATER SECTION -->	

<?php
	}
}	
	?>
	
<style id='theme-dynamic-styles-inline-css' type='text/css'>
#list-3 {margin-bottom:30px;} 
#list-3 ul { margin-left:0px !important; padding-left:0px !important; } 
#list-3 ul li { list-style:none !important;} 
#list-3 ul li .mk-svg-icon { fill:#ffc904; padding-right:10px !important; }
#fancy-title-2{letter-spacing:0px;text-transform:initial;font-size:22px;;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;line-height:15px !important; margin:15px 0px 20px 0px !important;}
.directoryDegrees { font-size:12px !important; font-weight:normal!important; line-height:0px !important; }
#divider-7 { padding:10px 0 30px; } 
#divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(https://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
.mk-divider.shadow_line .divider-inner { height:7px; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; }

.mk-image.border_shadow-frame .mk-image-inner { border:6px solid #ffffff; box-shadow:0 0 5px rgba(0, 0, 0, 0.25); } 

</style>	


	
<?php	
});// END SHORTCODE [show_research]?> 


<?php

add_shortcode('show_UCFannouncements', function() {
                           
$myfavetools = new WP_Query(array(
								'post_type'	=> 'announcements',
								'posts_per_page' => '1',
								'order'=>'DESC'
							)); 
?> 

<?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>

<!-- START THE REPEAT SECTION -->   

<div id="announ">
<span class="date"><?php echo get_the_date(); ?></span><br />
<?php the_title( '<strong>', '</strong>' ); ?><br />
<?php the_content();?>
</div>
<!-- END OF THE REPEAT SECTION -->
<?php endwhile; ?>

<?php wp_reset_query(); ?> 

<a href="<?php echo get_site_url(); ?>/announcements/" title="View All Accouncements">View All</a>
	
<?php	
});// END SHORTCODE [show_UCFannouncements]?> 






<?php
add_shortcode('show_announcements', function() {
?>
<!-- START REPEATER SECTION -->	

<?php $myannouncements = new WP_Query(array(
								'post_type'	=> 'announcement',
								'orderby'=>'title',
								'order'=>'ASC'
																	
							)); ?>
                            
                <?php while($myannouncements->have_posts()) : $myannouncements->the_post(); ?>
   				<!--START OF THE REPEAT SECTION -->
                <li style="list-style:none; font-size:16px !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
 <div style="margin-left:25px;">               
                <?php
$repeater = get_field('announcement_items');
$announdate = get_sub_field('announcement_date');
$last_row = end($repeater);
echo $last_row['announcement_date'];
echo $last_row['announcement_item'];
?>
</div>
                <!-- END OF THE REPEAT SECTION -->
   				<?php endwhile; ?>

<!-- END OF THE REPEAT SECTION -->	
<?php	
});// END SHORTCODE [show_announcements]?> 
















<?php
/**
 * Shortcode: [deptlist department=""]
 * Description: This is how stuff works with parameters
 */

function dept_option($atts){
	
	extract(shortcode_atts( array(
		'department' => 'Legal Studies',
	
	), $atts ));
	$daveandkait = '"' . $department . '"';
	$thistest = $user->display_name ;
	
	
	$args1 = array(
		'meta_key' => 'last_name',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'exclude' => array(1,8,9),
		'meta_query' => array(
			'relation' => 'AND',
			'department' => array(
				'key' => 'department',
				'value' => $daveandkait, // I WANT THIS AS A VARIABLE IN THE SHORTCODE
				'compare' => 'LIKE',
			),
		)
	);
	$subscribers = get_users($args1);
 			foreach ($subscribers as $user) { 
?>

<!-- START REPEATER SECTION -->	
<?php $user_db = $user->ID ;

$displayName = get_field('display_name', 'user_' . $user_db .'');
$image_ucf = get_field('upload_headshot', 'user_' . $user_db .'');
$jobs_ucf = get_field('job_titles', 'user_' . $user_db .'');
$jobtitle_ucf = get_sub_field('job_title');
$buildingMap = get_field('building', 'user_' . $user_db .'');
$roomy = get_field('room_number', 'user_' . $user_db .'');

$myFNAMEDirectory = strtolower(get_field('first_name', 'user_' . $user_db));
$myFNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myFNAMEDirectory);
$cohpaFNAME = preg_replace("/[\s_]/", "-", $myFNAME);

$myLNAMEDirectory = strtolower(get_field('last_name', 'user_' . $user_db));
$myLNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myLNAMEDirectory);
$cohpaLNAME = preg_replace("/[\s_]/", "-", $myLNAME);
?>



<!-- START REPEATER SECTION -->	
<div class="wpb_row vc_inner vc_row    attched-false   vc_row-fluid ">
	<div class="wpb_column vc_column_container vc_col-sm-2">
    	<div class="vc_column-inner ">
        	<div class="wpb_wrapper">
            	<div class="mk-image   align-left border_shadow-frame inside-image " style="margin-bottom:10px">
					<div class="mk-image-holder" style="max-width: 500px;">
                    	<div class="mk-image-inner ">
                        <a href="/directory/<?php echo $cohpaFNAME; ?>-<?php echo $cohpaLNAME; ?>" title="View <?php echo $user->display_name ; ?>'s Profile">
							<?php if( $image_ucf ) { ?>
                                <img class="lightbox-false" alt="View <?php echo $user->display_name ; ?>'s Profile" title="View <?php echo $user->display_name ; ?>'s Profile" width="500" src="<?php echo $image_ucf['url']; ?>">
                             <?php }
                                else { ?> 
                                    <img class="lightbox-false" alt="View <?php echo $user->display_name ; ?>'s Profile" title="View <?php echo $user->display_name ; ?>'s Profile" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image" />        
                            <?php } ?>
                        </a>    
                        </div>
                    </div>
					<div class="clearboth"></div>
				</div>
            </div>
        </div>
    </div>
	<div class="wpb_column vc_column_container vc_col-sm-6">
    	<div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div id="text-block-6" class="mk-text-block   ">
                    <h3 style="font-weight:bold;">
                        <a title="View <?php echo $user->display_name ; ?>'s Profile" href="/directory/<?php echo $cohpaFNAME; ?>-<?php echo $cohpaLNAME; ?>" target="_parent"><?php echo $user->display_name ; ?></a>
                    </h3>
                    <p><div id="showFacultyJobTitle">
                    	<?php
						switch_to_blog(1);
						
							if( get_field('job_titles', 'user_' . $user_db .'') ) {
								$num_rows = 0;
									while ( have_rows('job_titles', 'user_' . $user_db .'') ) : the_row();
									$num_rows++;
									endwhile;
							
									while ( have_rows('job_titles', 'user_' . $user_db .'') ) : the_row();
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
                        <?php the_field('department', 'user_' . $user_db); ?>
                        <?php 
						$terms = get_field('department');
						if( $terms ) {
						  $count = count( $terms );
							$i = 0;
							$term_list = ' ';
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
                        <div id="directoryProfile-phone"><i style="color:#666;margin:4px;" class="mk-moon-phone  mk-size-small"></i> Phone: <?php the_field('phone_number', 'user_'. $user_db ); ?></div>
                        <div id="directoryProfile-email"><i style="color:#666;margin:4px;" class="mk-moon-envelop-2  mk-size-small"></i> Email: <a title="Contact <?php echo $user->display_name ; ?>" href="mailto:<?php the_field('email_address', 'user_'. $user_db ); ?>"><?php the_field('email_address', 'user_'. $user_db ); ?></a></div>
                    </p>
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
						if ($buildingMap == 'Innovative Center – Suite 500') {echo 'http://map.ucf.edu/locations/8112/innovative-center-ic/';}
						if ($buildingMap == 'Innovative Center – Suite 300') {echo 'http://map.ucf.edu/locations/8112/innovative-center-ic/';}
						if ($buildingMap == 'Innovative Center – Suite 250') {echo 'http://map.ucf.edu/locations/8112/innovative-center-ic/';}
						if ($buildingMap == 'Barbara Ying Center') {echo 'http://map.ucf.edu/locations/71/barbara-ying-center-byc/';}
						if ($buildingMap == 'Building Partnership 1') {echo 'http://map.ucf.edu/locations/valencia-west/valencia-west/';}
						if ($buildingMap == 'Engineering 1') {echo 'http://map.ucf.edu/locations/40/engineering-i-eng1/';}
						if ($buildingMap == 'FAAST Center') {echo 'https://www.faast.org/programs/regional-demo/atlantic';}					 
						echo '" target="_blank" title="Map to ';
						the_field('building', 'user_'. $user_db );
						echo '">';
						the_field('building', 'user_'. $user_db );
						echo '</a> ';
						if( ! empty( $roomy ) ) { 
							echo ' Room: ';
							the_field('room_number', 'user_'. $user_db );
						}
						echo '</div>';	?>
    
                    <div class="clearboth"></div>
                </div>
            </div>
		</div>
    </div>	        

 <!-- INSERTED NEW SECTION -->            
	<div style="" class="vc_col-sm-4 wpb_column column_container ">

		<?php 
		if(get_field('cv', 'user_' . $user_db .'') || get_field('website_url', 'user_' . $user_db .'') || get_field('facebook_url', 'user_' . $user_db .'') || get_field('linkedin_url', 'user_' . $user_db .'')) {
		   ?>
		<h2 style="font-size: 16px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:normal;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e07f2d" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style="">Additional Info</span></h2>
		<?php  }?>	
		<div class="clearboth"></div>
		<div style="text-align: left;" class="mk-text-block  true">
			<p>
			<?php 
					if( get_field('cv', 'user_' . $user_db .'') || get_field('website_url', 'user_' . $user_db .'') || get_field('facebook_url', 'user_' . $user_db .'') || get_field('linkedin_url', 'user_' . $user_db .'')) {
					   echo '';
					
					if(get_field('cv', 'user_' . $user_db .'')) {
							echo '<div id="directoryProfile-FB"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-moon-file-pdf  mk-size-small"></i> <a href="';
							the_field('cv', 'user_' . $user_db .'');
							echo '" target="_blank">Curriculum Vitae</a></div>';
						}
						if(get_field('website_url', 'user_' . $user_db .'')) {
							echo '<div id="directoryProfile-FB"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-icon-external-link  mk-size-small"></i> <a href="';
							the_field('website_url', 'user_' . $user_db .'');
							echo '" target="_blank">Personal Website</a></div>';
						}
						if(get_field('facebook_url', 'user_' . $user_db .'')) {
							echo '<div id="directoryProfile-FB"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-moon-facebook-2  mk-size-small"></i> <a href="';
							the_field('facebook_url', 'user_' . $user_db .'');
							echo '" target="_blank">Facebook</a></div>';
						}
						if(get_field('linkedin_url', 'user_' . $user_db .'')) {
							echo '<div id="directoryProfile-Linkedin"><i style="color:#c1c1c1;margin:4px;4px;" class="mk-moon-linkedin  mk-size-small"></i> <a href="';
							the_field('linkedin_url', 'user_' . $user_db .'');
							echo '" target="_blank">Linkedin</a></div>';
						}
						
					   echo '<p>&nbsp;</p>';
					}?>

		<div class="clearboth"></div>
		</div> 
	</div>
            
 <!-- END INSERTED NEW SECTION -->              

</div>
<div id="divider-7" class="mk-divider  divider_full_width center shadow_line ">
	<div class="divider-inner">
		<span class="divider-shadow-left"></span><span class="divider-shadow-right"></span>
	</div>
</div>
<div class="clearboth"></div>
<!-- END REPEATER SECTION -->
 <?php } ?>
	
<style id='theme-dynamic-styles-inline-css' type='text/css'>
#divider-7 { padding:10px 0 30px; } 
#divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
.mk-divider.shadow_line .divider-inner { height:7px; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; }

.mk-image.border_shadow-frame .mk-image-inner { border:6px solid #ffffff; box-shadow:0 0 5px rgba(0, 0, 0, 0.25); } 

</style>
<?php	
// ENDING ROW	
}
add_shortcode( 'deptlist', 'dept_option' );
?>















<?php
/**
 * Shortcode: [researchlist department=""]
 * Description: This is how stuff works with parameters
 */

function research_option($atts){
	
	extract(shortcode_atts( array(
		'department' => 'Legal Studies',
	
	), $atts ));
	$daveandkait = '"' . $department . '"';
	$thistest = $user->display_name ;
	
	$args1 = array(
		'meta_key' => 'last_name',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'exclude' => array(1,8,9),
		'meta_query' => array(
			'relation' => 'AND',
			'department' => array(
				'key' => 'department',
				'value' => $daveandkait, // I WANT THIS AS A VARIABLE IN THE SHORTCODE
				'compare' => 'LIKE',
			),
		)
	);
	$subscribers = get_users($args1);
 			foreach ($subscribers as $user) { 
?>

<!-- START REPEATER SECTION -->	
<?php $user_db = $user->ID ;

$displayName = get_field('display_name', 'user_' . $user_db .'');
$image_ucf = get_field('upload_headshot', 'user_' . $user_db .'');
$jobs_ucf = get_field('job_titles', 'user_' . $user_db .'');
$jobtitle_ucf = get_sub_field('job_title');
$buildingMap = get_field('building', 'user_' . $user_db .'');
$roomy = get_field('room_number', 'user_' . $user_db .'');

$myFNAMEDirectory = strtolower(get_field('first_name', 'user_' . $user_db));
$myFNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myFNAMEDirectory);
$cohpaFNAME = preg_replace("/[\s_]/", "-", $myFNAME);

$myLNAMEDirectory = strtolower(get_field('last_name', 'user_' . $user_db));
$myLNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myLNAMEDirectory);
$cohpaLNAME = preg_replace("/[\s_]/", "-", $myLNAME);
?>


<!-- START REPEATER SECTION -->	
<?php 
	$researchitems = get_field('research_interests', 'user_'. $user_db );
	if( $researchitems ): 
?>
<div class="wpb_row vc_inner vc_row    attched-false   vc_row-fluid ">
	<div class="wpb_column vc_column_container vc_col-sm-3">
    	<div class="vc_column-inner ">
        	<div class="wpb_wrapper">
            	<div class="mk-image   align-left border_shadow-frame inside-image " style="margin-bottom:10px">
					<div class="mk-image-holder" style="max-width: 500px;">
                    	<div class="mk-image-inner ">
                        <a href="/directory/<?php echo $cohpaFNAME; ?>-<?php echo $cohpaLNAME; ?>" title="View <?php echo $user->display_name ; ?>'s Profile">
							<?php if( $image_ucf ) { ?>
                                <img class="lightbox-false" alt="View <?php echo $user->display_name ; ?>'s Profile" title="View <?php echo $user->display_name ; ?>'s Profile" width="500" src="<?php echo $image_ucf['url']; ?>">
                             <?php }
                                else { ?> 
                                    <img class="lightbox-false" alt="View <?php echo $user->display_name ; ?>'s Profile" title="View <?php echo $user->display_name ; ?>'s Profile" src="/wp-content/uploads/2016/01/defaul-avatar_0.jpg" itemprop="image" />        
                            <?php } ?>
                        </a>    
                        </div>
                    </div>
					<div class="clearboth"></div>
				</div>
            </div>
        </div>
    </div>
	<div class="wpb_column vc_column_container vc_col-sm-9">
    	<div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div id="text-block-6" class="mk-text-block   ">
                   <h2 id="fancy-title-2" class="mk-fancy-title  simple-style directoryNameFixer color-single">
						<span>
							<a title="View <?php echo $user->display_name ; ?>'s Profile" href="/directory/<?php echo $cohpaFNAME; ?>-<?php echo $cohpaLNAME; ?>" target="_parent"><?php echo $user->display_name ; ?><?php
				echo '<span class="directoryDegrees">';
					if( get_field('degrees', 'user_' . $user_db .'') ) {
						echo ', ';
						$num_rows = 0;
							while ( have_rows('degrees', 'user_' . $user_db .'') ) : the_row();
							$num_rows++;
							endwhile;

							while ( have_rows('degrees', 'user_' . $user_db .'') ) : the_row();
							$num_rows--;
							echo '<span>'. get_sub_field('degree') .'</span>';
							if ( $num_rows == 0 ) { echo ''; }
							else { echo ', '; }
							endwhile;
					}
				echo '</span>';	
					?>   	</a>			
						</span>
					</h2>
					<div id="directoryProfile-email" style="margin: -13px 0px 13px 0px !important;"><i style="color:#666;margin:4px;" class="mk-moon-envelop-2  mk-size-small"></i> Email: <a title="Contact <?php echo $user->display_name ; ?>" href="mailto:<?php the_field('email_address', 'user_'. $user_db ); ?>"><?php the_field('email_address', 'user_'. $user_db ); ?></a></div>
                   
                    <div class="clearboth"></div>
                    
                    <div id="list-3" class="mk-list-styles  mk-align-none  clear" data-charcode="f00c" data-family="awesome-icons">
						<?php 
							$termswer = get_field('research_interests', 'user_'. $user_db );
							if( $termswer ): 
						?>
							<ul>
							<?php foreach( $termswer as $term ): ?>
								<li style="text-transform:capitalize;"><svg  class="mk-svg-icon" data-name="mk-icon-ok" data-cacheid="icon-57c032d7801fd" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg><?php echo $term->name; ?></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
                </div>
            </div>
		</div>
    </div>	                     
</div>
<div id="divider-7" class="mk-divider  divider_full_width center shadow_line ">
	<div class="divider-inner">
		<span class="divider-shadow-left"></span><span class="divider-shadow-right"></span>
	</div>
</div>
<div class="clearboth"></div>
<?php endif; ?>
<!-- END REPEATER SECTION -->
 <?php } ?>
	
<style id='theme-dynamic-styles-inline-css' type='text/css'>
#list-3 {margin-bottom:30px;} 
#list-3 ul { margin-left:0px !important; padding-left:0px !important; } 
#list-3 ul li { list-style:none !important; margin-left: 0px !important;} 
#list-3 ul li .mk-svg-icon { fill:#ffc904; padding-right:10px !important; }
#fancy-title-2{letter-spacing:0px;text-transform:initial;font-size:22px;;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;line-height:15px !important; margin:15px 0px 20px 0px !important;}
.directoryDegrees { font-size:12px !important; font-weight:normal!important; line-height:0px !important; }	
#divider-7 { padding:10px 0 30px; } 
#divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
.mk-divider.shadow_line .divider-inner { height:7px; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; }

.mk-image.border_shadow-frame .mk-image-inner { border:6px solid #ffffff; box-shadow:0 0 5px rgba(0, 0, 0, 0.25); } 

</style>
<?php	
// ENDING ROW	
}
add_shortcode( 'researchlist', 'research_option' );
?>
















<?php
add_shortcode('search_research', function() {
?>
<!-- START FORM SECTION -->	
<?php
/**
 * The Template for displaying Author Search
 *
 * Override this template by copying it to yourtheme/simple-user-listing/search-author.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$search = ( get_query_var( 'as' ) ) ? get_query_var( 'as' )  : '';

?>

<div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">
				<section class="widget widget_search">

	<form class="mk-searchform" method="get" id="sul-searchform searchform" action="/staff/<?php the_permalink() ?>">
	<div style="" class="vc_col-sm-8 wpb_column column_container  _ height-full">
		<div class="wpb_raw_code wpb_content_element wpb_raw_html">
			<div class="wpb_wrapper">
                    	<input type="text" class="field text-input" name="as" id="sul-s" placeholder="<?php _e('Search by first or last name' ,'simple-user-listing');?>" value="<?php echo $search; ?>"/>
                  		<i class="mk-searchform-icon" style="margin-right:20px;"><svg  class="mk-svg-icon" data-name="mk-icon-search" data-cacheid="icon-58179f5179f89" style=" height:16px; width: 14.857142857143px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1664 1792"><path d="M1152 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"/></svg></i>
			</div>
		</div>
	</div>
	<div style="" class="vc_col-sm-4 wpb_column column_container  _ height-full">
		<div id="mk-button-2" class="mk-button-container _ relative width-full   block text-center  ">
            <input type="submit" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-medium mk-button--corner-rounded text-color-light _ relative text-center font-weight-700 no-backface  letter-spacing-1 block" style="border:0px solid; width:100% !important;" id="sul-searchsubmit" value="<?php _e('Search' ,'simple-user-listing');?>" />
		</div>
    </div>
    </form>
</section>

</div>

<div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">
	<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
		<div id="divider-3" class="mk-divider     divider_full_width center thick_solid  ">
			<div class="divider-inner"></div>
		</div>
		<div class="clearboth"></div>
	</div>
</div>
<style type='text/css'>
.divider-inner { display:block; } .mk-divider.custom-width.center { text-align:center; } .mk-divider.custom-width.center .divider-inner { margin:0 auto; } .mk-divider.custom-width.right .divider-inner { margin:0 0 0 auto; } @media handheld, only screen and (max-width:767px) { .mk-divider.custom-width.right, .mk-divider.custom-width.left { margin-left:auto; margin-right:auto; text-align:center; } } .mk-divider.center .divider-inner { margin:0 auto; } .mk-divider.right .divider-inner { margin:0 0 0 auto; } .mk-divider.divider_one_half .divider-inner { width:50%; } .mk-divider.divider_one_third .divider-inner { width:33.33%; } .mk-divider.divider_one_fourth .divider-inner { width:25%; } .mk-divider.double_dot .divider-inner { height:5px; border-top:1px dashed #dadada; border-bottom:1px dashed #dadada; } .mk-divider.thick_solid .divider-inner { border-top:2px solid #e5e5e5; border-top:2px solid rgba(0, 0, 0, 0.1); } .mk-divider.thin_solid .divider-inner { border-top:1px solid #e5e5e5; border-top:1px solid rgba(0, 0, 0, 0.1); position:relative; } .mk-divider.thin_solid .divider-inner:after { width:100%; position:absolute; left:0; top:0; } .mk-divider.single_dotted .divider-inner { border-top:1px dashed #dadada; } .mk-divider.shadow_line .divider-inner { height:7px; } .mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } .mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } .mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; } .mk-divider[class*='go_top'] .divider-inner { position:relative; height:12px; } .mk-divider[class*='go_top'] .divider-inner:before { top:6px; left:0; display:block; width:100%; height:1px; background-color:#e5e5e5; background-color:rgba(0, 0, 0, 0.1); content:""; } .mk-divider[class*='go_top'] .divider-inner .divider-go-top { position:absolute; top:-10px; right:0; float:right; padding-left:4px; } .mk-divider[class*='go_top'] .divider-inner .divider-go-top .mk-svg-icon { margin-left:6px; color:#cccccc; } .mk-divider.go_top_thick .divider-inner:before { height:2px; } .mk-divider.divider_page_divider { width:100%; }
#mk-button-2 {margin-bottom: 15px;margin-top: 0px;margin-right: 0px;}#mk-button-2 .mk-button {background-color: #ffc904;} #mk-button-2 .mk-button:hover {color:#ffffff;background-color:#222222;}#mk-button-2 .mk-button:hover .mk-svg-icon {color:#ffffff;}#divider-3 {padding:0px 0 20px;}#divider-3 .divider-inner {}#divider-3 .divider-inner:after {}</style>

<!-- END FORM SECTION -->	
<?php	
});// END SHORTCODE [search_research]?> 
