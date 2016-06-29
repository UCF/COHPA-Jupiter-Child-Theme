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
<style type='text/css'>
#mk-tabs-2 .mk-tabs-tabs .is-active a,#mk-tabs-2 .mk-tabs-panes, #mk-tabs-2 .mk-fancy-title span {    background-color: #ffffff}
#text-block-3 {     margin-bottom:0px;     text-align:left;}
 /* 1467220702 - */ .vc_row { position:relative; } .vc_inner.mk-grid { margin:0 auto; } .mk-tabs .mk-tabs-panes .mk-tabs-pane { z-index:8; } .mk-tabs.default-style .mk-tabs-tabs { z-index:10; } .mk-tabs.default-style .mk-tabs-panes { z-index:1; } .mk-tabs { margin-bottom:20px; } .mk-tabs .mk-svg-icon { vertical-align:middle; } .mk-tabs .mk-tabs-tabs li { position:relative; display:inline; float:left; margin:0; padding:0; } @media handheld, only screen and (max-width:767px) { .mk-tabs .mk-tabs-tabs li { float:none; display:block; } } .mk-tabs .mk-tabs-tabs li a { display:block; margin:0; outline:none; color:#444444; white-space:nowrap; font-weight:bold; font-size:13px; line-height:24px; cursor:pointer; } .mk-tabs .mk-tabs-panes .title-mobile { display:none; color:#444444; white-space:nowrap; font-weight:bold; font-size:14px; line-height:24px; margin-bottom:15px; background-color:rgba(0, 0, 0, 0.05); border-bottom:2px solid rgba(0, 0, 0, 0.1); padding:5px 10px; } .mk-tabs .mk-tabs-panes .mk-tabs-pane { position:relative; } @media handheld, only screen and (max-width:767px) { .mk-tabs.mobile-true .mk-tabs-tabs { display:none; } .mk-tabs.mobile-true .mk-tabs-panes .title-mobile { display:block; } .mk-tabs.mobile-true .mk-tabs-panes .mk-tabs-pane { margin-bottom:20px; } } .mk-tabs.default-style { margin-bottom:20px; } .mk-tabs.default-style .mk-tabs-tabs { position:relative; margin:0 0 -1px 0 !important; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-tabs { margin-bottom:20px !important; margin-left:0 !important; } } .mk-tabs.default-style .mk-tabs-tabs li a { padding:10px 20px; border:1px solid #e5e5e5; border-left:none; background-color:#ebebeb; background-color:rgba(0, 0, 0, 0.05); } .mk-tabs.default-style .mk-tabs-tabs li:first-child a { border-left:1px solid #e5e5e5; border-top-left-radius:2px; -moz-border-radius-topleft:2px; } .mk-tabs.default-style .mk-tabs-tabs li:last-of-type a { border-top-right-radius:2px; -moz-border-radius-topright:2px; } .mk-tabs.default-style .mk-tabs-tabs li:hover svg { fill:#868686 !important; } .mk-tabs.default-style .mk-tabs-tabs li.tab-with-icon a { padding:10px 20px 10px 14px !important; line-height:24px; } .mk-tabs.default-style .mk-svg-icon { margin-right:8px; fill:#b9b9b9; height:16px; } .mk-tabs.default-style .mk-tabs-tabs li.is-active a { padding-bottom:11px !important; border-bottom:none !important; cursor:default; background:-o-linear-gradient(top, transparent, transparent); background-color:transparent; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-tabs li.is-active a { border:1px solid #e5e5e5 !important; } } .mk-tabs.default-style .mk-tabs-panes { border:1px solid #e5e5e5; position:relative; margin:0; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-panes { border:0; } } .mk-tabs.default-style .mk-tabs-panes .mk-tabs-pane { padding:0; } .mk-tabs.default-style .mk-tabs-panes .mk-tabs-pane.is-active { padding:25px 25px 20px; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style .mk-tabs-panes .mk-tabs-pane { padding:0 !important; } .mk-tabs.mobile-true .mk-tabs-pane { display:block; } .mk-tabs-pane-content { padding:0 20px; } .mk-tabs .vc_column_container>.vc_column-inner { padding-left:0; padding-right:0; } } .mk-tabs.default-style.vertical-style .mk-tabs-tabs { float:left; margin:0 -1px 0 0 !important; width:25%; border:1px solid #e5e5e5; border-right:none; border-bottom:none; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li { display:block; float:none; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li a { border:1px solid #e5e5e5; border-top:none; border-left:none; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li:last-of-type a { border-top-right-radius:0; -moz-border-radius-topright:0; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li.is-active a { padding-right:21px !important; border-right:1px solid #ffffff; border-bottom:1px solid #e5e5e5 !important; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs li a { white-space:normal; } .mk-tabs.default-style.vertical-style .mk-tabs-panes { float:left; width:75%; border:none; border:1px solid #e5e5e5; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style.vertical-style .mk-tabs-panes { float:none !important; width:100% !important; border:0 !important; } } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs { float:right; margin:0 0 0 -1px !important; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs { width:100%; margin-bottom:20px !important; float:none; } } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs li a { border:1px solid #e5e5e5; border-top:none; border-left:none; } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-tabs li.is-active a { margin-left:-1px !important; border-bottom:1px solid #e5e5e5 !important; border-left:none !important; } .mk-tabs.default-style.vertical-style.vertical-right .mk-tabs-panes { float:right; } @media handheld, only screen and (max-width:767px) { .mk-tabs.default-style.vertical-style.mobile-true .mk-tabs-tabs { width:100%; margin-bottom:20px !important; margin-right:0 !important; float:none; } .mk-tabs.default-style.vertical-style.mobile-true .mk-tabs-tabs li.is-active a { border:1px solid #e5e5e5 !important; margin:0 !important; } .mk-tabs.default-style.vertical-style.mobile-true.vertical-right .mk-tabs-tabs li.is-active a { border:1px solid #e5e5e5 !important; margin:0 !important; } } @media handheld, only screen and (max-width:600px) { .mk-tabs.default-style.vertical-style .mk-tabs-panes { width:60%; } .mk-tabs.default-style.vertical-style .mk-tabs-tabs { width:40%; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs { border-bottom:1px solid #e5e5e5; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs li { display:block; float:none; border-bottom:none; border-left:1px solid #e5e5e5; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs li a { border-bottom:none !important; } .mk-tabs.default-style.horizental-style .mk-tabs-tabs li:first-child a { border-left:none !important; } } .mk-tabs.simple-style .mk-tabs-tabs { margin:0; border-bottom:2px solid #eeeeee; } .mk-tabs.simple-style .mk-tabs-tabs li a { padding:14px 18px; margin:0 0 -2px 0; } @media handheld, only screen and (max-width:767px) { .mk-tabs.simple-style .mk-tabs-tabs li a { margin:0; } } .mk-tabs.simple-style .mk-tabs-tabs li.tab-with-icon a { line-height:22px; } .mk-tabs.simple-style .mk-svg-icon { height:20px; width:20px; margin-right:6px; } .mk-tabs.simple-style .mk-tabs-tabs li.is-active a { border-bottom-style:solid; border-bottom-width:2px; } .mk-tabs.simple-style .mk-tabs-panes { padding:25px 0 15px; } @media handheld, only screen and (max-width:780px) { .mk-tabs.simple-style .mk-tabs-tabs { border-bottom:none !important; } .mk-tabs.simple-style .mk-tabs-tabs li { float:none !important; display:block !important; } .mk-tabs.simple-style .mk-tabs-tabs li a { border-bottom:2px solid #eeeeee; } } .mk-tabs-pane { overflow:hidden; height:0; } .mk-tabs-pane.is-active { height:auto; } @media handheld, only screen and (max-width:780px) { .mobile-true .mk-tabs-pane { height:auto; } }
</style>

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
