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
                  <?php endwhile; ?>
                <?php wp_reset_query(); ?>  
                
                
                
<!-- START THE CUSTOM SECTION -->

<?php if (have_rows('scholarly_books') ):
				while (have_rows('scholarly_books') ): the_row(); ?>
                
<!-- START THE REPEAT SECTION -->
               
<div style="float:left;" class="vc_col-sm-6 wpb_column column_container ">
	<div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid vc_custom_1452017887231">
    	<div class="wpb_column vc_column_container vc_col-sm-3">
        	<div class="wpb_wrapper">
            	<div class="mk-image-shortcode mk-shortcode   align-left mk-animate-element fade-in simple-frame inside-image " style="max-width: 800px; margin-bottom:10px">
                	<div class="mk-image-inner">
                    	<img class="lightbox-false" alt="" title="" src="<?php the_sub_field('book_cover'); ?>" />
                    </div>
                    <div class="clearboth"></div>
                </div>
            </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-9">
        	<div class="wpb_wrapper">
            	<h2 style="font-size: 20px;color: #3d3d3d;font-weight:bold; margin-bottom:8px;" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
                	<?php the_sub_field('book_title'); ?>
                </h2>
                <div class="mk-text-block  true">
                	<?php the_sub_field('book_citation'); ?>
					<em>Published in: <?php the_sub_field('publish_date'); ?></em>
					<div class="clearboth"></div>
                </div>
            </div>
        </div>
    </div>
	<div class="mk-shortcode mk-padding-shortcode" style="height:40px"></div>
</div>


<!-- END OF THE REPEAT SECTION -->

<?php endwhile; ?>
             <?php endif; ?>

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
