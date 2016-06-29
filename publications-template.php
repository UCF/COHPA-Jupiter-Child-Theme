<?php
/*
Template Name: Publications Page
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

<div id="theme-page" class="master-holder clearfix" role="main" itemprop="mainContentOfPage" >
	<div class="mk-main-wrapper-holder">
		<div id="mk-page-id-677" class="theme-page-wrapper mk-main-wrapper mk-grid full-layout  ">
			<div class="theme-content " itemprop="mainContentOfPage">
            	<div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">
                
                <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
						<?php //the_content();?>
                  <?php endwhile; ?>
                <?php wp_reset_query(); ?> 
                
                
                	<!-- START THE CUSTOM SECTION -->	
    <div style="" class="vc_col-sm-4 wpb_column column_container  _ height-full">
        <div class="mk-image   align-center  mk-animate-element left-to-right border_shadow-frame inside-image " style="margin-bottom:10px">
            <div class="mk-image-holder" style="max-width: 600px;">
                <div class="mk-image-inner ">
                    <a href="<?php the_field('engage_pdf'); ?>" target="_self" class="mk-image-link">
                        <img class="lightbox-false" alt="<?php the_field('engage_title'); ?>" title="<?php the_field('engage_title'); ?>" width="600" height="776" src="<?php the_field('engage_photo'); ?>" />
                    </a>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
        <h2 style="font-size: 20px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6b618" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
        	<span style=""><?php the_field('engage_title'); ?></span>
        </h2>
        <div class="clearboth"></div>
        <h2 style="font-size: 14px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6ba0d" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><em>Date Issued: <?php the_field('engage_date'); ?></em></span>
        </h2>
        <div class="clearboth"></div>
        <h2 style="font-size: 12px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6bde8" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><?php the_field('engage_description'); ?></span>
        </h2>
        <div class="clearboth"></div>
    </div>       
     
    
    
    <div style="" class="vc_col-sm-4 wpb_column column_container  _ height-full">
        <div class="mk-image   align-center  mk-animate-element top-to-bottom border_shadow-frame inside-image " style="margin-bottom:10px">
            <div class="mk-image-holder" style="max-width: 600px;">
                <div class="mk-image-inner ">
                    <a href="<?php the_field('focus_pdf'); ?>" target="_self" class="mk-image-link">
                        <img class="lightbox-false" alt="<?php the_field('focus_title'); ?>" title="<?php the_field('focus_title'); ?>" width="600" height="776" src="<?php the_field('focus_photo'); ?>" />
                    </a>
                </div>
            </div>
            <div class="clearboth"></div></div><h2 style="font-size: 20px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6d16b" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><?php the_field('focus_title'); ?></span></h2><div class="clearboth"></div><h2 style="font-size: 14px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6d557" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><em>Date Issued: <?php the_field('focus_date'); ?></em></span></h2><div class="clearboth"></div><h2 style="font-size: 12px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6d93f" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><?php the_field('focus_description'); ?></span></h2><div class="clearboth"></div>
	</div>
    
    
    <div style="" class="vc_col-sm-4 wpb_column column_container  _ height-full">
        <div class="mk-image   align-center  mk-animate-element right-to-left border_shadow-frame inside-image " style="margin-bottom:10px">
            <div class="mk-image-holder" style="max-width: 600px;">
                <div class="mk-image-inner ">
                    <a href="<?php the_field('lead_pdf'); ?>" target="_self" class="mk-image-link">
                        <img class="lightbox-false" alt="<?php the_field('lead_title'); ?>" title="<?php the_field('lead_title'); ?>" width="600" height="776" src="<?php the_field('lead_photo'); ?>" />
                    </a>
                </div>
            </div>
            <div class="clearboth"></div></div><h2 style="font-size: 20px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6e8df" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><?php the_field('lead_title'); ?></span></h2><div class="clearboth"></div><h2 style="font-size: 14px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6ecc6" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><em>Date Issued: <?php the_field('lead_date'); ?></em></span></h2><div class="clearboth"></div><h2 style="font-size: 12px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568fbd6f6f0ad" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><?php the_field('lead_description'); ?></span></h2><div class="clearboth"></div>
	</div>
<!-- END THE CUSTOM SECTION --> 

                
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
