<?php
/*
Template Name: Awards Page
*/


get_header(); ?>

<div id="theme-page" class="master-holder clearfix" role="main" itemprop="mainContentOfPage" >
	<div class="mk-main-wrapper-holder">
		<div id="mk-page-id-677" class="theme-page-wrapper mk-main-wrapper mk-grid full-layout  ">
			<div class="theme-content " itemprop="mainContentOfPage">
            	<div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">
                
                <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
						<?php the_content();?>
                  <?php endwhile; ?>
                <?php wp_reset_query(); ?> 
                
                
<!-- START THE CUSTOM SECTION -->	
<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
	<div id="mk-tabs-2" class="mk-tabs  mobile-true  vertical-left default-style  vertical-style    js-el"	data-mk-component="Tabs">
		<ul id="mk-tabs-tabs-2" class="mk-tabs-tabs">
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
        
        <div class="mk-tabs-panes page-bg-color">
        <?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>
			<div id="<?php the_title(); ?>" class="mk-tabs-pane is-active">
				<div class="title-mobile">
					<i></i> <?php the_title(); ?>	
                </div>
				<div class="mk-tabs-pane-content">
					<div id="text-block-3" class="mk-text-block   ">
						<?php
						if ( is_page( 491 )  ) {  
							the_field('faculty_content'); 
						} else { 
							the_field('student_content'); 
						}	
						?>
						<div class="clearboth"></div>
					</div>
				</div>	
				<div class="clearboth"></div>
			</div>
  		<?php endwhile; ?>
        <?php wp_reset_query(); ?>
        </div>
        
        
	</div>
</div>
 
<!-- END THE CUSTOM SECTION --> 

                
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
