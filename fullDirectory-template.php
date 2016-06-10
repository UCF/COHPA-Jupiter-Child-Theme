<?php
/*
Template Name: Directory Listing
*/


global $post,
$mk_options;
$page_layout = get_post_meta( $post->ID, '_layout', true );
$padding = get_post_meta( $post->ID, '_padding', true );


if ( empty( $page_layout ) ) {
	$page_layout = 'full';
}
$padding = ($padding == 'true') ? 'no-padding' : '';

get_header(); ?>
<div id="theme-page" <?php echo get_schema_markup('main'); ?>>
	<div class="mk-main-wrapper-holder">
		<div id="mk-page-id-<?php echo $post->ID; ?>" class="theme-page-wrapper mk-main-wrapper <?php echo $page_layout; ?>-layout <?php echo $padding; ?> mk-grid vc_row-fluid">
			<div class="theme-content <?php echo $padding; ?>" itemprop="mainContentOfPage">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
						<?php the_content();?>
                  <?php endwhile; ?>
                <?php wp_reset_query(); ?>       
                        
                        
<!-- START THE CUSTOM SECTION -->

<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
    
     
     <div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid vc_custom_1455896967960">
	<div style="" class="vc_col-sm-2 wpb_column column_container ">
			<div class="mk-image-shortcode mk-shortcode   align-left single_line-frame inside-image " style="max-width: 600px; margin-bottom:10px"><div class="mk-image-inner"><a href="#" target="_self" class="mk-image-shortcode-link"><img class="lightbox-false" alt="" title="" src="http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/bfi_thumb/david-headshot-mkvq9zv6svldlz02s8jfvwa3h52dffhj4jne5yzcrc.jpg" /></a></div><div class="clearboth"></div></div>
	</div>
	<div style="" class="vc_col-sm-6 wpb_column column_container ">
			<h2 style="font-size: 25px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-575b11ad34b3b" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style directoryNameFixer"><span style=""><a title="David Janosik" href="https://www.cohpa.ucf.edu/directory/david-janosik/" target="_parent">David Janosik</a></span></h2><div class="clearboth"></div>	<div style=" margin-bottom:10px;text-align: left;" class="mk-text-block  true"><div id="cohpa-directory-name"><strong>Web Applications Developer</strong><br />
<span class="color-lightgray">Dean&#8217;s Office</span><br />
<span class="color-lightgray">Phone: </span>407-823-5884<br />
<span class="color-lightgray">Email: </span><a title="Contact David Janosik" href="mailto:djanosik@ucf.edu">djanosik@ucf.edu</a></div>
<div class="clearboth"></div></div> 	<div style="text-align: left;" class="mk-text-block  true"><div id="cohpa-directory-name"></div>
<div>Location: <a class="color-darkGold" title="Map to HPA I" href="http://map.ucf.edu/locations/80/health-public-affairs-i/" target="_blank">HPA I</a> Room: 341</div>
<div class="clearboth"></div></div> 
	</div>
	<div style="" class="vc_col-sm-4 wpb_column column_container ">
			<h2 style="font-size: 16px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:normal;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-575b11ad3535c" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style="">Additional Info</span></h2><div class="clearboth"></div>	<div style="text-align: left;" class="mk-text-block  true"><p><a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent"><i class="mk-icon-file-pdf-o mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Curriculum Vitae</a><br />
<a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent"><i class="mk-icon-external-link-square mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Personal Website</a><br />
<a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent"><i class="mk-icon-facebook-square mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Facebook</a><br />
<a title="Curriculum Vitae for David Janosik" href="https://www.cohpa.ucf.edu/media/496089/janosik-2013.pdf" target="_parent"><i class="mk-moon-linkedin mk-size-small" style="color: #c1c1c1; margin: 4px 4px;"></i> Linkedin</a></p>
<div class="clearboth"></div></div> 
	</div></div>
	
<?php
$args = array(
	'order' => 'ASC',
    'orderby' => 'display_name',
);

// The Query
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		echo '<p>' . $user->display_name . '</p>';
	}
} else {
	echo 'No users found.';
}
?>
    
</div>
						
<!-- END THE CUSTOM SECTION -->
                        
                        
					
                    
                    
                    <div class="clearboth"></div>
					<?php wp_link_pages( 'before=<div id="mk-page-links">'.__( 'Pages:', 'mk_framework' ).'&after=</div>' ); ?>
						<?php
						if($mk_options['pages_comments'] == 'true') {
							if ( comments_open() ) :
							comments_template( '', true ); 	
							endif;
						}
						?>
				</div>
			
		<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
		<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>
<?php get_footer(); ?>
