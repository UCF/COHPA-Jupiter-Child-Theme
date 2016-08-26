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
$research_ucf = get_field('research_interests', 'user_' . $user_id .'');
?>
<?php restore_current_blog(); ?>


<!-- START REPEATER SECTION -->	
<div class="wpb_row vc_row  mk-fullwidth-false  attched-false  vc_row-fluid  js-master-row ">
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<div class="mk-image  lightbox-enabled align-left border_shadow-frame inside-image " style="margin-bottom:10px">
        	<div class="mk-image-holder" style="max-width: 533px;">
            	<div class="mk-image-inner ">
                	<a href="#" target="_self" class="mk-image-link">
                    	<img class="lightbox-true" alt="" title="" width="533" height="800" src="http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/bfi_thumb/david-headshot-mkvq9zv6svldlz02s8jfxz372s9g77upzwqwygl4d4.jpg" />
                    </a>
                    <div class="mk-image-overlay"></div>
                    <a href="http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/2016/01/david-headshot.jpg" alt="" data-fancybox-group="image-shortcode-" title="" class="mk-lightbox  mk-image-lightbox"><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-plus-circle" data-cacheid="icon-57c032d77f233" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"/></svg></a>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
    </div>
	<div style="" class="vc_col-sm-9 wpb_column column_container  _ height-full">
		<h2 id="fancy-title-2" class="mk-fancy-title  simple-style directoryNameFixer color-single">
			<span>
				<a title="View <?php echo $value['display_name'] ; ?>'s Profile" href="/directory/<?php echo strtolower(get_field('first_name', 'user_' . $user_db)); ?>-<?php echo strtolower(get_field('last_name', 'user_' . $user_db)); ?>" target="_parent"><?php echo $value['display_name'] ; ?></a>			
            </span>
		</h2>
		<div id="list-3" class="mk-list-styles  mk-align-none  clear" data-charcode="f00c" data-family="awesome-icons">
			<ul>
                <li><svg  class="mk-svg-icon" data-name="mk-icon-ok" data-cacheid="icon-57c032d7801fd" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>Therapeutic Modalities (Application Or Knowledge Base)</li>
                <li><svg  class="mk-svg-icon" data-name="mk-icon-ok" data-cacheid="icon-57c032d7801fd" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>Education (Health Or Allied Health)</li>
                <li><svg  class="mk-svg-icon" data-name="mk-icon-ok" data-cacheid="icon-57c032d7801fd" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>Athletic Training Administration And Policy</li>
                <li><svg  class="mk-svg-icon" data-name="mk-icon-ok" data-cacheid="icon-57c032d7801fd" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>Athletic Trainer Knowledge And Attitudes Regarding Heat Illness Prevention And Treatment</li>
			</ul>
		</div>

               
	<?php 
        $termswer = get_field('research_interests', 'user_'. $user_db );
        if( $termswer ): 
        ?>
            <ul>
            <?php foreach( $termswer as $term ): ?>
                <li><svg  class="mk-svg-icon" data-name="mk-icon-ok" data-cacheid="icon-57c032d7801fd" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg><?php echo $term->name; ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
  <br />
         
         
      
        
        
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
});// END SHORTCODE [show_research]?> 