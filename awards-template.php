<?php
/*
Template Name: Awards
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

<div id="mk-page-section-568c239d0b628" data-intro-effect="false" class="full-width-568c239d0b628  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " >
</div>
          
<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-12 wpb_column column_container ">
		<div id="mk-tabs-568d2e73ba7e9" class="mk-shortcode mobile-true mk-tabs vertical-left default-style  vertical-style  ">
        	<ul class="mk-tabs-tabs">
            	<?php $myfavetools = new WP_Query(array(
								'post_type'	=> 'awards',
								'orderby'=>'title',
								'order'=>'DESC'
																	
							)); ?>
                            
                <?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>
   				<!--START OF THE REPEAT SECTION -->
                <li><a href="#<?php the_title(); ?>"><?php the_title(); ?></a></li>
                <!-- END OF THE REPEAT SECTION -->
   				<?php endwhile; ?>

                <div class="clearboth"></div>
            </ul>
            <div class="mk-tabs-panes">
                <?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>
   				<!--START OF THE REPEAT SECTION -->
                <div id="<?php the_title(); ?>" class="mk-tabs-pane">
                	<div class="title-mobile"><?php the_title(); ?></div>
                    <div style="text-align: left;" class="mk-text-block  true">
                    	<?php
						if ( is_page( 491 )  ) {  
							the_field('faculty_content'); 
						} else { 
							the_field('student_content'); 
						}	
						?>
						<div class="clearboth"></div>
                    </div> 
					<div class="clearboth"></div>
                </div>
				
                <!-- END OF THE REPEAT SECTION -->
   				<?php endwhile; ?>
                <?php wp_reset_query(); ?> 

                <div class="clearboth"></div>
            </div>
            <div class="clearboth"></div>
        </div>
        <div id="ajax-568d2e73ba7e9" class="mk-dynamic-styles"><!--  #mk-tabs-568d2e73ba7e9 .mk-tabs-tabs li.ui-tabs-active a, #mk-tabs-568d2e73ba7e9 .mk-tabs-panes, #mk-tabs-568d2e73ba7e9 .mk-fancy-title span{ background-color:#ffffff; }--></div>
	</div>
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
