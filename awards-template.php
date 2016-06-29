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
	<div id="mk-tabs-2" class="mk-tabs  mobile-true  vertical-left default-style  vertical-style    js-el" data-mk-component="Tabs">

		<ul id="mk-tabs-tabs-2" class="mk-tabs-tabs">
			<li class="mk-tabs-tab  is-active"><a href="#"> Tab 1</a></li>
            <li class="mk-tabs-tab "><a href="#"> Tab 2</a></li>
			<div class="clearboth"></div>
		</ul>
		<div class="mk-tabs-panes page-bg-color">
        
			<div id="1467220440-1-70" class="mk-tabs-pane is-active">
				<div class="title-mobile">
					<i></i>Tab 1	
                </div>
				<div class="mk-tabs-pane-content">
					<div id="text-block-3" class="mk-text-block   ">
						<p>INSERT NAME HERE</p>
						<div class="clearboth"></div>
					</div>
				</div>	
				<div class="clearboth"></div>
			</div>
            
			<div id="1467220440-2-44" class="mk-tabs-pane">
				<div class="title-mobile">
					<i></i>Tab 2	
                </div>
				<div class="mk-tabs-pane-content">
					<div id="text-block-4" class="mk-text-block   ">
						<p>INSERT TAB 2 CONTENT</p>
						<div class="clearboth"></div>	
                    </div>
				</div>	
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>
</div>
<!-- END THE CUSTOM SECTION --> 

                
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
