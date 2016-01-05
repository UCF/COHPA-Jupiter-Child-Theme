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
						<?php
						if($mk_options['pages_comments'] == 'true') {
							if ( comments_open() ) :
							comments_template( '', true ); 	
							endif;
						}
						?>
				</div>
                        
                        
                        
                        
 <div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-12 wpb_column column_container ">
			<div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid vc_custom_1452017887231"><div class="wpb_column vc_column_container vc_col-sm-3"><div class="wpb_wrapper"><div class="mk-image-shortcode mk-shortcode   align-left mk-animate-element fade-in simple-frame inside-image " style="max-width: 800px; margin-bottom:10px"><div class="mk-image-inner"><a href="#" target="_self" class="mk-image-shortcode-link"><img class="lightbox-false" alt="" title="" src="http://cohpacmsdev.smca.ucf.edu/wp-content/uploads/2015/11/9781611636857_thumb.jpg" /></a></div><div class="clearboth"></div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-9"><div class="wpb_wrapper"><h2 style="font-size: 20px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568c136ea54c1" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><a href="#">A Primer on Crime and Delinquency Theory</a></span></h2><div class="clearboth"></div>	<div style="text-align: left;" class="mk-text-block  true"><p>By <strong>Robert M. Bohm</strong>, professor of criminal justice, and Brenda L. Vogel</p>
<p><em>Published in: February 2015</em></p>
<div class="clearboth"></div></div> </div></div></div>
	</div></div>
						<div class="clearboth"></div>
																				</div>
			
				<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>
                      
                        
                        
                        
                        
						<?php wp_link_pages( 'before=<div id="mk-page-links">'.__( 'Pages:', 'mk_framework' ).'&after=</div>' ); ?>
				<?php endwhile; ?>
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
