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
<?php switch_to_blog(1); ?>
<?php $user_db = $user->ID ;

$displayName = get_field('display_name', 'user_' . $user_db .'');
$image_ucf = get_field('upload_headshot', 'user_' . $user_db .'');
$jobs_ucf = get_field('job_titles', 'user_' . $user_db .'');
$jobtitle_ucf = get_sub_field('job_title');
$buildingMap = get_field('building', 'user_' . $user_db .'');
$roomy = get_field('room_number', 'user_' . $user_db .'');
$getcv = get_field('cv', 'user_' . $user_db .'');
$myFNAMEDirectory = strtolower(get_field('first_name', 'user_' . $user_db));
$myFNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myFNAMEDirectory);
$cohpaFNAME = preg_replace("/[\s_]/", "-", $myFNAME);

$myLNAMEDirectory = strtolower(get_field('last_name', 'user_' . $user_db));
$myLNAME = preg_replace("/[^a-z0-9_\s-]/", "", $myLNAMEDirectory);
$cohpaLNAME = preg_replace("/[\s_]/", "-", $myLNAME);
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
                       
                   <div data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none newdirectoryspacing  clear" data-family=""><ul>    
                        <li><svg  class="mk-svg-icon" data-name="mk-moon-phone" data-cacheid="icon-5a553bfdc3fd3" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 320c-32 32-32 64-64 64s-64-32-96-64-64-64-64-96l64-64s-64-128-96-128l-96 96c0 64 65.75 193.75 128 256s192 128 256 128c0 0 96-64 96-96s-96-128-128-96z"/></svg>Phone: <?php the_field('phone_number', 'user_'. $user_db ); ?></li>
                        <li><svg  class="mk-svg-icon" data-name="mk-icon-envelope" data-cacheid="icon-5a55331319080" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"/></svg>Email: <a title="Contact <?php echo $user->display_name ; ?>" href="mailto:<?php the_field('email_address', 'user_'. $user_db ); ?>"><?php the_field('email_address', 'user_'. $user_db ); ?></a></li>
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
						echo '</li>';	?>
   					 </ul></div>
                    <div class="clearboth"></div>
                </div>
            </div>
		</div>
    </div>	        

 <!-- INSERTED NEW SECTION -->            
	<div style="" class="vc_col-sm-4 wpb_column column_container ">

		<?php 
		if( $getcv || get_field('website_url', 'user_' . $user_db .'') || get_field('facebook_url', 'user_' . $user_db .'') || get_field('linkedin_url', 'user_' . $user_db .'')) {
		   ?>
		<h2 style="font-size: 16px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:normal;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5762ba5e07f2d" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style="">Additional Info</span></h2>
		<?php  }?>	
		<div class="clearboth"></div>
		<div style="text-align: left;" class="mk-text-block  true">
			<p>
			<div data-charcode="mk-icon-phone" class="mk-list-styles  mk-align-none newdirectoryspacing  clear" data-family=""><ul>
			<?php 
					if( $getcv || get_field('website_url', 'user_' . $user_db .'') || get_field('facebook_url', 'user_' . $user_db .'') || get_field('linkedin_url', 'user_' . $user_db .'')) {
					   echo '';
					
					if($getcv) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-icon-file-text" data-cacheid="icon-5a577c25b6b92" style="fill: #999; height:16px; width: 13.714285714286px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1792"><path d="M1468 476q14 14 28 36h-472v-472q22 14 36 28zm-476 164h544v1056q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h800v544q0 40 28 68t68 28zm160 736v-64q0-14-9-23t-23-9h-704q-14 0-23 9t-9 23v64q0 14 9 23t23 9h704q14 0 23-9t9-23zm0-256v-64q0-14-9-23t-23-9h-704q-14 0-23 9t-9 23v64q0 14 9 23t23 9h704q14 0 23-9t9-23zm0-256v-64q0-14-9-23t-23-9h-704q-14 0-23 9t-9 23v64q0 14 9 23t23 9h704q14 0 23-9t9-23z"/></svg><a href="';
							echo $getcv;
							echo '" target="_blank">Curriculum Vitae</a></li>';
						}
						if(get_field('website_url', 'user_' . $user_db .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-globe" data-cacheid="icon-5a5761fdb02a2" style="fill: #999; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 32c-132.548 0-240 107.452-240 240 0 132.549 107.452 240 240 240 132.549 0 240-107.451 240-240 0-132.548-107.451-240-240-240zm135.795 320c4.29-20.227 6.998-41.696 7.879-64h63.723c-1.668 22.098-6.812 43.557-15.34 64h-56.262zm-271.59-160c-4.29 20.227-6.998 41.696-7.879 64h-63.722c1.668-22.097 6.811-43.557 15.339-64h56.262zm238.813 0c4.807 20.481 7.699 41.927 8.64 64h-95.658v-64h87.018zm-87.018-32v-93.669c7.295 2.123 14.522 5.685 21.614 10.685 13.291 9.37 26.006 23.804 36.77 41.743 7.441 12.401 13.876 26.208 19.248 41.242h-77.632zm-90.384-41.242c10.764-17.939 23.478-32.374 36.77-41.743 7.091-5 14.319-8.562 21.614-10.685v93.67h-77.632c5.373-15.033 11.808-28.84 19.248-41.242zm58.384 73.242v64h-95.657c.94-22.073 3.833-43.519 8.639-64h87.018zm-176.056 160c-8.528-20.443-13.671-41.902-15.339-64h63.722c.881 22.304 3.589 43.773 7.879 64h-56.262zm80.399-64h95.657v64h-87.018c-4.806-20.48-7.699-41.927-8.639-64zm95.657 96v93.67c-7.294-2.123-14.522-5.686-21.614-10.685-13.292-9.37-26.007-23.805-36.77-41.743-7.441-12.402-13.875-26.209-19.249-41.242h77.633zm90.384 41.242c-10.764 17.938-23.479 32.373-36.77 41.743-7.092 4.999-14.319 8.562-21.614 10.685v-93.67h77.633c-5.373 15.033-11.808 28.84-19.249 41.242zm-58.384-73.242v-64h95.657c-.94 22.073-3.833 43.52-8.64 64h-87.017zm127.674-96c-.881-22.304-3.589-43.773-7.879-64h56.262c8.528 20.443 13.672 41.903 15.34 64h-63.723zm31.655-96h-47.95c-9.319-29.381-22.188-55.147-37.658-75.714 21.268 10.17 40.529 23.808 57.357 40.636 10.74 10.739 20.181 22.469 28.251 35.078zm-322.407-35.078c16.829-16.829 36.09-30.466 57.357-40.636-15.471 20.567-28.338 46.333-37.658 75.714h-47.949c8.069-12.609 17.511-24.339 28.25-35.078zm-28.25 259.078h47.949c9.32 29.381 22.188 55.147 37.659 75.715-21.268-10.17-40.529-23.808-57.357-40.637-10.74-10.739-20.182-22.469-28.251-35.078zm322.406 35.078c-16.828 16.829-36.09 30.467-57.357 40.637 15.471-20.567 28.339-46.334 37.658-75.715h47.95c-8.07 12.609-17.511 24.339-28.251 35.078z"/></svg><a href="';
							the_field('website_url', 'user_' . $user_db .'');
							echo '" target="_blank">Personal Website</a></li>';
						}
						if(get_field('facebook_url', 'user_' . $user_db .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-square-facebook" data-cacheid="icon-5a567fa482bd1" style="fill: #3b5998; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M444-6.4h-376c-37.555 0-68 30.445-68 68v376c0 37.555 30.445 68 68 68h376c37.555 0 68-30.445 68-68v-376c0-37.555-30.445-68-68-68zm-123.943 159.299h-49.041c-7.42 0-14.918 7.452-14.918 12.99v19.487h63.723c-2.081 28.41-6.407 64.679-6.407 64.679h-57.565v159.545h-63.929v-159.545h-32.756v-64.474h32.756v-33.53c0-8.098-1.706-62.336 70.46-62.336h57.678v63.183z"/></svg><a href="';
							the_field('facebook_url', 'user_' . $user_db .'');
							echo '" target="_blank">Facebook</a></li>';
						}
						if(get_field('linkedin_url', 'user_' . $user_db .'')) {
							echo '<li><svg  class="mk-svg-icon" data-name="mk-moon-linkedin" data-cacheid="icon-5a567fa48352f" style="fill: #007bb6; height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M426 0h-340c-47.3 0-86 38.7-86 86v340c0 47.3 38.7 86 86 86h340c47.3 0 86-38.7 86-86v-340c0-47.3-38.7-86-86-86zm-234 416h-64v-224h64v224zm-32-256c-17.673 0-32-14.327-32-32s14.327-32 32-32 32 14.327 32 32-14.327 32-32 32zm256 256h-64v-128c0-17.673-14.327-32-32-32s-32 14.327-32 32v128h-64v-224h64v39.736c13.199-18.132 33.376-39.736 56-39.736 39.765 0 72 35.817 72 80v144z"/></svg><a href="';
							the_field('linkedin_url', 'user_' . $user_db .'');
							echo '" target="_blank">Linkedin</a></li>';
						}
						
					   echo '<p>&nbsp;</p>';
					}?>
		</ul></div>
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






<!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<?php

add_shortcode('internlist', 'dept_option' ); 
			  
function dept_option($atts){
	
	extract(shortcode_atts( array(
		'main_intern_category' => 'Local',
	
	), $atts ));
	
$kaitlynjanosik = 'Other';                           
$myfavetools = new WP_Query(array(
								'post_type'	=> 'internship',
								'orderby'=>'title',
								'order'=>'ASC',
								'meta_query' => array(
									'relation' => 'AND',
									'main_intern_category' => array(
										'key' => 'main_intern_category',
										'value' => $kaitlynjanosik, // I WANT THIS AS A VARIABLE IN THE SHORTCODE
										'compare' => 'LIKE',
									),)
							)); 
?> 

<?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>

<!-- START THE REPEAT SECTION -->   
<div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
	<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
		<h2 id="fancy-title-3" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_title(); ?></span>
		</h2>
		<div class="clearboth"></div>

		<div class=" vc_custom_1520863964717">
			<div id="text-block-4" class="mk-text-block   internTextFix">
				<p><?php the_content();?></p>
				<div class="clearboth"></div>
			</div>
		</div>
		<h2 id="fancy-title-5" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span>Contact Information:</span>
		</h2>
		<div class="clearboth"></div>
	</div>
</div>

<div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
	<div style="" class="vc_col-sm-6 wpb_column column_container  _ height-full">
		<h2 id="fancy-title-6" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('contact_intern_name'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-7" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('contact_intern_jobtitle'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-8" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('intern_address'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-9" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('intern_phone'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-10" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><a href="mailto:<?php the_field('intern_email'); ?>"><?php the_field('intern_email'); ?></a></span>
		</h2>
		<div class="clearboth"></div>
	</div>
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<div id="mk-button-11" class="mk-button-container _ relative width-full   block text-center internButtonFix">
			<a  href="<?php the_field('intern_website'); ?>"   target="_self" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-x-large mk-button--corner-pointed text-color-dark _ relative text-center font-weight-700 no-backface  letter-spacing-2 block">
						 <span class="mk-button--text">Website</span>
			</a>
		</div>
	</div>
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<div id="mk-button-12" class="mk-button-container _ relative width-full   block text-center internButtonFix">
			<a  href="<?php the_field('intern_app_url'); ?>"   target="_self" class="mk-button js-smooth-scroll mk-button--dimension-outline mk-button--size-x-large mk-button--corner-pointed skin-dark _ relative text-center font-weight-700 no-backface  letter-spacing-2 block">
				<span class="mk-button--text">Application</span>
			</a>
		</div>
	</div>
</div>

<div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
	<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
		<div id="divider-13" class="mk-divider     divider_full_width center thin_solid  ">
			<div class="divider-inner"></div>
	
		</div>
		<div class="clearboth"></div>
	</div>
</div>
<!-- END OF THE REPEAT SECTION -->
<?php endwhile; ?>
<style id="mk-shortcode-dynamic-styles" type="text/css">#fancy-title-2{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-2 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-2 { text-align:center !important; } } #fancy-title-3{letter-spacing:0px;text-transform:initial;font-size:18px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-3 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-3 { text-align:center !important; } } #text-block-4 { margin-bottom:0px; text-align:left; } #fancy-title-5{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-5 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-5 { text-align:center !important; } } #fancy-title-6{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-6 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-6 { text-align:center !important; } } #fancy-title-7{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-7 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-7 { text-align:center !important; } } #fancy-title-8{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-8 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-8 { text-align:center !important; } } #fancy-title-9{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-9 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-9 { text-align:center !important; } } #fancy-title-10{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-10 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-10 { text-align:center !important; } } #mk-button-11 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #mk-button-11 .mk-button { background-color:#ffc904; } #mk-button-11 .mk-button:hover { color:#ffffff !important; background-color:#212121; } #mk-button-11 .mk-button:hover .mk-svg-icon { color:#ffffff !important; } #mk-button-12 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #divider-13 { padding:10px 0 40px; } #divider-13 .divider-inner { border-top-width:1px; } #divider-13 .divider-inner:after { } #fancy-title-14{letter-spacing:0px;text-transform:initial;font-size:18px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-14 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-14 { text-align:center !important; } } #text-block-15 { margin-bottom:0px; text-align:left; } #fancy-title-16{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-16 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-16 { text-align:center !important; } } #fancy-title-17{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-17 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-17 { text-align:center !important; } } #fancy-title-18{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-18 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-18 { text-align:center !important; } } #fancy-title-19{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-19 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-19 { text-align:center !important; } } #fancy-title-20{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-20 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-20 { text-align:center !important; } } #fancy-title-21{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-21 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-21 { text-align:center !important; } } #mk-button-22 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #mk-button-22 .mk-button { background-color:#ffc904; } #mk-button-22 .mk-button:hover { color:#ffffff !important; background-color:#212121; } #mk-button-22 .mk-button:hover .mk-svg-icon { color:#ffffff !important; } #mk-button-23 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #divider-24 { padding:10px 0 10px; } #divider-24 .divider-inner { border-top-width:1px; } #divider-24 .divider-inner:after { }</style>
<?php wp_reset_query(); ?> 

	
<?php	
}// END SHORTCODE [internlist]?> 






<!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
















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
add_shortcode('show_books', function() {
?>
<!-- START REPEATER SECTION -->	

<?php $mybooklist = new WP_Query(array(
								'post_type'	=> 'faculty_books',
								'order'=>'DESC'
																	
							)); ?>
                            
<?php while($mybooklist->have_posts()) : $mybooklist->the_post(); ?>
<!--START OF THE REPEAT SECTION -->
<?php the_title(); ?>
 <div>               
<?php //the_field('book_citation'); ?><br>
<?php //the_field('book_url'); ?><br>
<?php //the_field('book_department'); ?><br>
<?php //the_field('book_faculty'); ?>

</div>
                <!-- END OF THE REPEAT SECTION -->
   				<?php endwhile; ?>

<!-- END OF THE REPEAT SECTION -->	
<?php	
});// END SHORTCODE [show_books]?> 












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

	<form class="mk-searchform" method="get" id="sul-searchform searchform" action="/staff/">
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
});// END SHORTCODE [search_faculty]?> 


