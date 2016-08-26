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
$research_ucf = get_field('research_interests', 'user_'. $user_db );

$params = array( 'width' => 600, 'height' => 760 );
$imageCrop = bfi_thumb( $image_ucf['url'], $params );

?>
<?php restore_current_blog(); ?>



<!-- START REPEATER SECTION -->	
<div class="wpb_row vc_row  mk-fullwidth-false  attched-false  vc_row-fluid  js-master-row ">
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<div class="mk-image  lightbox-enabled align-left border_shadow-frame inside-image " style="margin-bottom:10px">
        	<div class="mk-image-holder" style="max-width: 533px;">
            	<div class="mk-image-inner ">
                	<a href="#" target="_self" class="mk-image-link">
                    	<img class="lightbox-true" alt="" title="" width="533" height="800" src="<?php echo $imageCrop; ?>" />
                    </a>
                    <div class="mk-image-overlay"></div>
                    <a href="/directory/<?php echo strtolower(get_field('first_name', 'user_' . $user_db)); ?>-<?php echo strtolower(get_field('last_name', 'user_' . $user_db)); ?>" alt="" data-fancybox-group="image-shortcode-" title="" class="mk-lightbox  mk-image-lightbox"><svg  class="mk-svg-icon" data-name="mk-jupiter-icon-plus-circle" data-cacheid="icon-57c032d77f233" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"/></svg></a>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
    </div>
	<div style="" class="vc_col-sm-9 wpb_column column_container  _ height-full">
		<h2 id="fancy-title-2" class="mk-fancy-title  simple-style directoryNameFixer color-single">
			<span>
				<a title="View <?php echo $value['display_name'] ; ?>'s Profile" href="/directory/<?php echo strtolower(get_field('first_name', 'user_' . $user_db)); ?>-<?php echo strtolower(get_field('last_name', 'user_' . $user_db)); ?>" target="_parent"><?php echo $value['display_name'] ; ?><?php 
		if( get_field('degrees', 'user_'. $user_db ) ) {
			while ( have_rows('degrees', 'user_'. $user_db ) ) : the_row();
			 $arrayDegree[] = get_sub_field('degree', 'user_'. $user_db ); 
			endwhile;
			$degreeIDs = implode(', ', $arrayDegree);

		   echo '<span class="directoryDegrees">, ' . $degreeIDs . '</span>';
		}
		?></a>			
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
#fancy-title-2{letter-spacing:0px;text-transform:initial;font-size:25px;;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;line-height:15px !important; margin:15px 0px 20px 0px !important;}
.directoryDegrees { font-size:12px !important; font-weight:normal!important; line-height:0px !important; }
#divider-7 { padding:10px 0 30px; } 
#divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(https://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
.mk-divider.shadow_line .divider-inner { height:7px; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } 
.mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; }

.mk-image.border_shadow-frame .mk-image-inner { border:6px solid #ffffff; box-shadow:0 0 5px rgba(0, 0, 0, 0.25); } 

</style>	

<style id='theme-dynamic-styles-inline-css' type='text/css'>
body { background-color:#fff; } .mk-header { background-color:#212121;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover; } .mk-header-bg { background-color:#fff;background-image:url(http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/2015/11/UCFgradient.png);background-repeat:repeat-x;background-position:center center; } .mk-classic-nav-bg { background-color:#ffc904; } #theme-page { background-color:#fff; } #mk-footer { background-color:#212121;background-image:url(http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/2016/07/COHPAFooterBg.jpg);background-repeat:no-repeat;background-position:left bottom;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover; } #mk-boxed-layout { -webkit-box-shadow:0 0 0px rgba(0, 0, 0, 0); -moz-box-shadow:0 0 0px rgba(0, 0, 0, 0); box-shadow:0 0 0px rgba(0, 0, 0, 0); } .mk-news-tab .mk-tabs-tabs .is-active a, .mk-fancy-title.pattern-style span, .mk-fancy-title.pattern-style.color-gradient span:after, .page-bg-color { background-color:#fff; } .page-title { font-size:20px; color:#ffc904; text-transform:uppercase; font-weight:inherit; letter-spacing:2px; } .page-subtitle { font-size:14px; line-height:100%; color:#a3a3a3; font-size:14px; text-transform:none; } .mk-header { border-bottom:1px solid #ededed; } .header-style-1 .mk-header-padding-wrapper, .header-style-2 .mk-header-padding-wrapper, .header-style-3 .mk-header-padding-wrapper { padding-top:216px; } @font-face { font-family:'star'; src:url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.eot'); src:url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.eot?#iefix') format('embedded-opentype'), url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.woff') format('woff'), url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.ttf') format('truetype'), url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.svg#star') format('svg'); font-weight:normal; font-style:normal; } @font-face { font-family:'WooCommerce'; src:url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.eot'); src:url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.eot?#iefix') format('embedded-opentype'), url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.woff') format('woff'), url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.ttf') format('truetype'), url('http://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.svg#WooCommerce') format('svg'); font-weight:normal; font-style:normal; }#fancy-title-2{letter-spacing:0px;text-transform:initial;font-size:25px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-2 span{} #list-3 {margin-bottom:30px} #list-3 ul li .mk-svg-icon { fill:#ffc904 } #text-block-4 { margin-bottom:0px; text-align:left; } #mk-header .header-logo a img { max-width:500px; } .mk-header-toolbar .mk-header-social svg { fill:#666 !important; } .mk-header-toolbar .mk-header-social svg:hover { fill:#ffc904 !important; } .mk-blog-magazine-item.magazine-thumb-post .the-title { margin-top:0px !important; } .mk-blog-thumbnail-item .item-wrapper h3 { font-weight:bold !important; } .mk-blog-author { display:none !important; } .mk-blog-thumbnail-item .item-wrapper { padding:10px 30px !important; } .mk-blog-meta-wrapper a{ color:#999; } .mk-blog-meta-wrapper a:hover{ color:#0052d6; } label.screen-reader-text { display:none !important; } .textwidget .page-numbers{ display:none !important; } select[name = archive-dropdown] { width:100% !important; } #mk-font-icons-31 .font-icon svg{ margin-top:-30px !important; padding-top:-30px !important; } #socialiconFIX .font-icon svg:hover { fill:#ffc904 !important; } #socialiconFIX .vc_col-has-fill>.vc_column-inner, .vc_row-has-fill+.vc_row-full-width+.vc_row>.vc_column_container>.vc_column-inner, .vc_row-has-fill+.vc_row>.vc_column_container>.vc_column-inner, .vc_row-has-fill+.vc_vc_row>.vc_row>.vc_vc_column>.vc_column_container>.vc_column-inner, .vc_row-has-fill+.vc_vc_row_inner>.vc_row>.vc_vc_column_inner>.vc_column_container>.vc_column-inner, .vc_row-has-fill>.vc_column_container>.vc_column-inner, .vc_row-has-fill>.vc_row>.vc_vc_column>.vc_column_container>.vc_column-inner, .vc_row-has-fill>.vc_vc_column_inner>.vc_column_container>.vc_column-inner { padding-top:5px !important; } .ical .amrcol2 h4 { font-weight:bold !important; margin:0px !important; padding:0px !important; } .wp-caption-text { font-size:12px !important; color:#666 !important; line-height:1.66em !important; } li { font-size:14px !important; line-height:2em !important; } ol li { margin-bottom:15px !important; } .mk-box-icon.boxed-style h4 { margin-bottom:0px !important; } .table-style1 thead tr th{ background-color:#212121 !important; text-transform:none !important; white-space:nowrap !important; } .mk-fancy-table.table-style1 tr { background-color:rgba(0,0,0,.01); } .mk-toggle.fancy-style .mk-toggle-title { font-size:16px !important; } .single-post #mk-breadcrumbs { display:none; } #mk-sidebar .widget .textwidget a { color:#4285f4 !important; } #mk-sidebar .widget .textwidget a:hover { color:#0052d6 !important; } .sidebar-wrapper .menu .current_page_item { background-color:#212121!important; color:#ffc904 !important; } .sidebar-wrapper .menu .current_page_item a{ color:#ffc904 !important; } .sidebar-wrapper .menu .current_page_item a:hover{ color:#ffc904 !important; } .sidebar-wrapper .menu { background-color:#f6f6f6 !important; color:#ffc904 !important; } .sidebar-wrapper .menu a{ color:#666 !important; } .sidebar-wrapper .menu a:hover{ color:#0052d6 !important; } .scholarshipDeadline { background-color:#e61d91 !important; border-color:#9f0259 !important; } .scholarshipDeadline p{ color:#fff !important; } .scholarshipDeadline strong { color:#000 !important; } table.ical { width:100% !important; padding:0px !important; } table.ical .summary h4{ font-size:16px !important; } table.ical td.amrcol1{ width:25% !important; white-space:nowrap !important; text-align:center !important; } table.ical td.amrcol2{ width:75% !important; text-align:left !important; } table.ical tr.odd{ background-color:#f2f2f2; } table.ical .eventdate { background-color:#ffc904 !important; display:block !important; border:1px solid #eab104; width:45px !important; height:45px !important; font-size:16px !important; font-weight:bold !important; padding:14px 8px 5px 8px !important; text-decoration:none !important; line-height:18px !important; color:#000; } table.ical .eventdate .dtstart{ border-bottom:none !important; cursor:initial !important; } #calprop0 { display:none; } #tableTextLeft table thead tr th{ text-align:left !important; } #tableTextLeft table tbody tr td{ text-align:left !important; } :target:before { content:""; display:inline-block; height:100px; margin:-100px 0 0; } #directoryNews li { font-size:16px !important; line-height:1.26em !important; margin-bottom:20px !important; } #directoryCourseTitle { font-weight:bold; font-size:18px; margin-bottom:6px; } #directoryJobTitle { font-size:18px !important; font-weight:bold !important; margin:20px 0px 0px 0px !important; } #directoryDepartments { font-size:16px !important; font-weight:normal !important; margin-bottom:20px !important; } .directoryDegrees { font-size:18px !important; font-weight:normal !important; } .directoryNameFixer {margin-bottom:4px;} #capitalText { text-transform:capitalize; } .titleFIX { margin-bottom:0px !important; } .zindexFIXtop { z-index:9999; } .zindexFIXbottom { z-index:-9999; } .ical h4 { padding-top:0px !important; margin-top:0px !important; } #homeLINKS ul li a { color:#999 !important; } #homeLINKS ul li a:hover { color:#ffc904 !important; } .sidebar-wrapper .menu .sub-menu { background-color:#eaeaea !important; } #mk-breadcrumbs .mk-breadcrumbs-inner { float:left !important; margin-left:10px !important; }
</style>
	
<?php	
});// END SHORTCODE [show_research]?> 