<?php
/*
Template Name: Scholarly Books
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
						<div class="clearboth"></div>
						<?php wp_link_pages( 'before=<div id="mk-page-links">'.__( 'Pages:', 'mk_framework' ).'&after=</div>' ); ?>
				<?php endwhile; ?>
						
      <?php wp_reset_query(); ?>                  





</div></div></div><div id="mk-page-section-568c239d0b628" data-intro-effect="false" class="full-width-568c239d0b628  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " ><div class="mk-grid vc_row-fluid page-section-content"><div class="mk-padding-wrapper">

<!-- START THE REPEAT SECTION -->
<?php if (have_rows('scholarly_books') ):
				while (have_rows('scholarly_books') ): the_row(); ?>
                
                
<div style="float:left;" class="vc_col-sm-6 wpb_column column_container ">
			
            <div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid vc_custom_1452017887231"><div class="wpb_column vc_column_container vc_col-sm-3"><div class="wpb_wrapper"><div class="mk-image-shortcode mk-shortcode   align-left mk-animate-element fade-in simple-frame inside-image " style="max-width: 800px; margin-bottom:10px"><div class="mk-image-inner"><a href="#" target="_self" class="mk-image-shortcode-link"><img class="lightbox-false" alt="" title="" src="<?php the_sub_field('book_cover'); ?>" /></a></div><div class="clearboth"></div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-9"><div class="wpb_wrapper"><h2 style="font-size: 20px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; margin-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568c239d0d942" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><a href="#"><?php the_sub_field('book_title'); ?></a></span></h2><div style="text-align: left;" class="mk-text-block  true"><p><?php the_sub_field('book_citation'); ?></p>
<em>Published in: <?php $date = the_sub_field('publish_date'); echo date('F dS Y', $date);?></em>
<div class="clearboth"></div></div> </div></div></div>
<div class="mk-shortcode mk-padding-shortcode" style="height:40px"></div>
</div>


<!-- END OF THE REPEAT SECTION -->

<?php endwhile; ?>
             <?php endif; ?>





    </div><div class="clearboth"></div></div><div class="clearboth"></div></div><div class="mk-main-wrapper-holder"><div class="theme-page-wrapper  full-layout mk-grid vc_row-fluid row-fluid"><div class="theme-content "><div id="ajax-568c239d0b628" class="mk-dynamic-styles"><!--  .full-width-568c239d0b628 { min-height:100px; padding:0px 0 0px; margin-bottom:0px; } #background-layer--568c239d0b628 { background-position:left top; background-repeat:repeat; ; } --></div>
						<div class="clearboth"></div>
																				       
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                        

		</div>			
		<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
		<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>
<?php get_footer(); ?>