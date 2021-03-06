<?php

global $post,
$mk_options;



$single_layout = get_post_meta( $post->ID, '_layout', true );
$padding = get_post_meta( $post->ID, '_padding', true );
$padding = ($padding == 'true') ? 'no-padding' : '';

if($single_layout == 'default' || empty($single_layout)) {
	$single_layout = $mk_options['single_layout'];
}


/*
Image dimensions
*/
$image_height = $mk_options['single_featured_image_height'];
$image_width = mk_content_width($single_layout);


$profilenews = get_posts(array(			 
    'post_type' => 'post', // "post" because I'm calling regular blog posts? 
    'meta_query' => array(
  array(  
    'key' => 'directory_news', // slug of custom field
    'value' => '"' . get_the_ID() . '"', // keep this to match current profile
    'compare' => 'LIKE'
       )
 )
 ));




function social_networks_meta() {
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$output = '<meta property="og:image" content="'.$image_src_array[ 0 ].'"/>'. "\n";
	$output .= '<meta property="og:url" content="'.get_permalink().'"/>'. "\n";
	$output .= '<meta property="og:title" content="'.get_the_title().'"/>'. "\n";
	echo $output;
}
add_action('wp_head', 'social_networks_meta');





get_header(); ?>


 <link rel='stylesheet' id='js_composer_front-css'  href='http://davidjanosik.com/cohpa/wp-content/plugins/js_composer_theme/assets/css/js_composer.css?ver=4.4.2' type='text/css' media='all' />                           


<div id="theme-page">
<div class="mk-main-wrapper-holder">
	<div class="theme-page-wrapper mk-main-wrapper left-layout  mk-grid vc_row-fluid">
		<div class="theme-content <?php echo $padding; ?>">
		<article id="<?php the_ID(); ?>" <?php post_class(); ?>>
        
        
<div class="clearboth"></div>
                            
                            


<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-4 wpb_column column_container ">
		<div class="mk-image-shortcode mk-shortcode  lightbox-enabled align-left border_shadow-frame inside-image " style="max-width: 250px; margin-bottom:10px">
            <div class="mk-image-inner">
            	    <?php 
					
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );			
		$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
   		$image_output_src = bfi_thumb($image_src_array[0], array(
        'width' => '600',
        'height' => '700'
   		 ));
		
		if (has_post_thumbnail()) {
			echo '<img class="lightbox-true" alt="' . get_the_title() . '" title="' . get_the_title() . '" src="'. mk_thumbnail_image_gen($image_output_src, $image_width, $image_height) . '" itemprop="image" />';
			echo '<div class="mk-image-overlay"></div><a href="' . $image[0] . '" alt="" data-fancybox-group="image-shortcode-" title="" class="mk-lightbox  mk-image-shortcode-lightbox"><i class="mk-jupiter-icon-plus-circle"></i></a>';
		}else {
			
			echo '<img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . get_site_url() . '/wp-content/uploads/2015/02/blank-profile.jpg" width="238" height="221" itemprop="image" />';
		}
		
		
		
					
					
					
					
					
					
					
					
					
					
					
					
					?>
                    
                    
                    
                    
                </div><div class="clearboth"></div></div>
	</div>
    
    
	<div style="" class="vc_col-sm-8 wpb_column column_container ">
    
       <div class="single-social-section">

            <?php if($mk_options['single_blog_social'] == 'true' ) : ?>
            <div class="blog-share-container">
                <div class="blog-single-share mk-toggle-trigger"><i class="mk-moon-share-2"></i></div>
                <ul class="single-share-box mk-box-to-trigger">
                    <li><a class="facebook-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>
                    <li><a class="twitter-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-moon-twitter"></i></a></li>
                    <li><a class="googleplus-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>
                    <li><a class="pinterest-share" data-image="<?php echo $image_src_array[0]; ?>" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>
                    <li><a class="linkedin-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>
                </ul>
            </div>
            <?php endif; ?>
            <a class="mk-blog-print" onClick="window.print()" href="#" title="<?php _e('Print', 'mk_framework'); ?>"><i class="mk-moon-print-3"></i></a>
        <div class="clearboth"></div>
        </div>
	
    <h2 class="blog-single-title"><?php the_title(); ?></h2>
    
	<div><h3>Job Title</h3></div>

    
    
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
    
    <?php if(get_field('phone_number')) { 
 		echo '<div id="directoryProfile-phone"><i style="color:#666;margin:4px;4px;" class="mk-moon-phone  mk-size-small"></i> Phone: ';
		the_field('phone_number');
		echo '</div>';
	}?>
    <?php if(get_field('email_address')) { 
 		echo '<div id="directoryProfile-email"><i style="color:#666;margin:4px;4px;" class="mk-moon-envelop-2  mk-size-small"></i> Email: <a href="mailto:';
		the_field('email_address');
		echo '">';
		the_field('email_address');
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
	if(get_field('room_number')) { 
		echo ' Room: ';
		the_field('room_number');
	}
	echo '</div>';
	?>  
    
    
    
	</div>
    </div>
    
    
    <!-- START DIVIDER -->
    <div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
    <div style="" class="vc_col-sm-12 wpb_column column_container ">
			<div style="padding: 20px 0 40px;" class="mk-divider mk-shortcode divider_full_width center shadow_line "><div class="divider-inner"><span class="divider-shadow-left"></span><span class="divider-shadow-right"></span></div></div><div class="clearboth"></div>
	</div></div>
    <!-- END DIVIDER -->
    
    
    
    <div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-9 wpb_column column_container ">


<?php 
if(get_field('biography_info') || get_field('research_info')) {
   echo '<div id="mk-tabs-54db5aa2f2863" class="mk-shortcode mk-tabs default-style  horizental-style"><ul class="mk-tabs-tabs">';
		
		if(get_field('biography_info')) { 
				echo '<li><a href="#1423603736-1-73">Biography</a></li>';
			}
		if(get_field('research_info')) { 
				echo '<li><a href="#1423603736-2-45">Research</a></li>';
			}
echo '<li><a href="#1423658400557-2-0">Courses</a></li>';
		
		if($profilenews) { 
				echo '<li><a href="#1423658400557-2-999">News</a></li>';
			}
echo '<div class="clearboth"></div></ul><div class="mk-tabs-panes">';

			
	 if(get_field('biography_info')) { 
 		echo '<div id="1423603736-1-73" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Biography</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
		the_field('biography_info');
		echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
	}
			
			
     if(get_field('research_info')) { 
 		echo '<div id="1423603736-2-45" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Research</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';
		the_field('research_info');
		echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
	}   
	
	
		if($profilenews) { 
	// THIS IS MY NEWS POSTS SECTION 
 		echo '<div id="1423658400557-2-999" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>News</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  ">';

	echo '<ul>';
	foreach( $profilenews as $profilenew ) {
		echo '<li><a href="' . get_permalink( $profilenew->ID ) . '">' . get_the_title( $profilenew->ID ) . '</a></li>';
	}
	echo '</ul>';


/* Restore original Post Data */
wp_reset_postdata();

		
		
		echo '<div class="clearboth"></div></div><div class="clearboth"></div></div>';
}
            

echo '<div id="1423658400557-2-0" class="mk-tabs-pane"><div class="title-mobile"><i class=""></i>Courses</div>	<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><p>Course number 1</p><p>course number 2</p><p>course number 3</p><div class="clearboth"></div></div> <div class="clearboth"></div></div><div class="clearboth"></div></div>';	




echo '<div class="clearboth"></div></div><div id="ajax-54db5aa2f2863" class="mk-dynamic-styles"> #mk-tabs-54db5aa2f2863 .mk-tabs-tabs li.ui-tabs-active a, #mk-tabs-54db5aa2f2863 .mk-tabs-panes, #mk-tabs-54db5aa2f2863 .mk-fancy-title span{ background-color: #fff; }';
}?>    
</div></div>

 
    
<div style="" class="vc_col-sm-3 wpb_column column_container vc_custom_1423659749038 ">

 <!-- START PROFESSIONAL LINKS --> 
 <?php
   if(get_field('cv') || get_field('personal_website')) {
	echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Professional LInks</span></h3>';
                
    if(get_field('cv')) {
		echo '<div id="directoryProfile-cv"><i style="color:#666;margin:4px;4px;" class="mk-moon-vcard  mk-size-small"></i> <a href="';
		the_field('cv');
		echo '" target="_blank">Curriculum Vitae</a></div>';
	}
	
	if(get_field('personal_website')) {
		echo '<div id="directoryProfile-link"><i style="color:#666;margin:4px;4px;" class="mk-icon-external-link  mk-size-small"></i> <a href="';
		the_field('personal_website');
		echo '" target="_blank">Personal Website</a></div>';
	}
    
echo '<p>&nbsp;</p><div id="facultytabContainer"></div><div id="facultytabpage_2" class="facultytabpage"></div><h2></h2><div class="clearboth"></div></div>';

}?>	
<!-- END PROFESSIONAL LINKS --> 



<!-- START SOCIAL LINKS SECTION --> 
<?php 
if(get_field('facebook_url') || get_field('linkedin_url') || get_field('twitter_url') || get_field('google+_url') || get_field('youtube_url')) {
   echo '<div style=" margin-bottom:0px;text-align: left;" class="mk-text-block  "><h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-false"><span >Social Networks</span></h3><div id="cohpa-directoryDetail-rightcolumn"><div id="cohpa-directoryDetail-rightcolumn-GRAY">';

if(get_field('facebook_url')) {
		echo '<div id="directoryProfile-FB"><i style="color:#3b5998;margin:4px;4px;" class="mk-moon-facebook-2  mk-size-small"></i> <a href="';
		the_field('facebook_url');
		echo '" target="_blank">Facebook</a></div>';
	}
	if(get_field('linkedin_url')) {
		echo '<div id="directoryProfile-Linkedin"><i style="color:#007bb6;margin:4px;4px;" class="mk-moon-linkedin  mk-size-small"></i> <a href="';
		the_field('linkedin_url');
		echo '" target="_blank">Linkedin</a></div>';
	}
	if(get_field('twitter_url')) {
		echo '<div id="directoryProfile-Twitter"><i style="color:#00aced;margin:4px;4px;" class="mk-moon-twitter-2  mk-size-small"></i> <a href="';
		the_field('twitter_url');
		echo '" target="_blank">Twitter</a></div>';
	}
	if(get_field('google+_url')) {
		echo '<div id="directoryProfile-Google"><i style="color:#dd4b39;margin:4px;4px;" class="mk-moon-google-plus-3  mk-size-small"></i> <a href="';
		the_field('google+_url');
		echo '" target="_blank">Google+</a></div>';
	}
	if(get_field('youtube_url')) {
		echo '<div id="directoryProfile-YouTube"><i style="color:#bb0000;margin:4px;4px;" class="mk-moon-youtube  mk-size-small"></i> <a href="';
		the_field('youtube_url');
		echo '" target="_blank">YouTube</a></div>';
	}
   echo '</div></div><div id="facultytabContainer"></div><div id="facultytabpage_2" class="facultytabpage"></div><h2></h2><div class="clearboth"></div></div>';
}?>     	
<!-- END SOCIAL LINKS SECTION --> 



 
	</div></div>
						<div class="clearboth"></div>
													</div>
                
        					<aside id="mk-sidebar" class="mk-builtin">
    <div class="sidebar-wrapper">  
            <?php echo do_shortcode ('[mk_button dimension="flat" corner_style="pointed" size="medium" outline_skin="dark" outline_active_color="#ffffff" outline_hover_color="#333333" bg_color="#212121" btn_hover_bg="#ffc904" text_color="light" icon="mk-moon-arrow-left-6" icon_anim="none" url="/cohpa/directory" target="_self" align="center" fullwidth="true" button_custom_width="0" margin_top="0" margin_bottom="15" btn_hover_txt_color="#000000"]Back to the Directory[/mk_button]');   ?>
       
			<?php  dynamic_sidebar( 'directory' );  ?>
              </div>
</aside>	<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>
<?php get_footer(); ?>
