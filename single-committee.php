<?php
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
                
<!-- START MY CONTENT -->
                
<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-12 wpb_column column_container ">
			

<div id="mk-tabs-5644eb6a0ecec" class="mk-shortcode mobile-true mk-tabs simple-style  ">
	<ul class="mk-tabs-tabs">
    	<li><a href="#1447354239-1-18">About</a></li>
        <li><a href="#1447354239-2-76">Members</a></li>
        <?php if( have_rows('manage_minutes') ):?><li><a href="#1447354402671-2-0">Minutes</a></li><?php endif; ?>
        <li><a href="#1447354418752-3-5">Schedule</a></li>
        <div class="clearboth"></div>
    </ul>
    
    <div class="mk-tabs-panes">			
			<div id="1447354239-1-18" class="mk-tabs-pane"><div class="title-mobile">About</div>	<div style="text-align: left;" class="mk-text-block  true"><?php the_field('content'); ?>
<div class="clearboth"></div></div> 
			<div class="clearboth"></div></div>
			<div id="1447354239-2-76" class="mk-tabs-pane"><div class="title-mobile">Members</div>	<div style="text-align: left;" class="mk-text-block  true"><p>Insert Members List</p>
<div class="clearboth"></div></div> 
			<div class="clearboth"></div></div>
<?php if( have_rows('manage_minutes') ):?>            
<div id="1447354402671-2-0" class="mk-tabs-pane"><div class="title-mobile">Minutes</div>

<?php while( have_rows('manage_minutes') ): the_row(); ?>
	<h2 style="font-size: 20px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5644eb6a10466" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><?php the_sub_field('year'); ?></span></h2>
    <div class="clearboth"></div>
    
	<div class="wpb_raw_code wpb_content_element wpb_raw_html">
		<div class="wpb_wrapper">
        <?php if( have_rows('content') ):?> 
        <?php while( have_rows('content') ): the_row(); ?>   
			<div style="width: 25%; text-align: center; float:left;"><a href="<?php the_sub_field('pdf_upload'); ?>" title="Meeting Notes from <?php the_sub_field('date_of_meeting'); ?>"><?php the_sub_field('date_of_meeting'); ?></a></div>
		<?php endwhile; ?>
        <?php endif; ?>

		</div>
	</div>

	<div class="wpb_raw_code wpb_content_element wpb_raw_html">
		<div class="wpb_wrapper">
			<div style="clear:both;"></div>
		</div>
	</div>
<div style="padding: 20px 0 20px;" class="mk-divider mk-shortcode divider_full_width center double_dot "><div class="divider-inner" style=""></div></div><div class="clearboth"></div>
			<div class="clearboth"></div></div>
<?php endwhile; ?>          
<?php endif; ?>




			<div id="1447354418752-3-5" class="mk-tabs-pane"><div class="title-mobile">Schedule</div><h2 style="font-size: 20px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5644eb6a11009" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style="">Fall 2014 Schedule</span></h2><div class="clearboth"></div>	<div style="text-align: left;" class="mk-text-block  true"><p>Schedules are subject to change.</p>
<div class="clearboth"></div></div> <div style="padding: 20px 0 20px;" class="mk-divider mk-shortcode divider_full_width center double_dot "><div class="divider-inner" style=""></div></div><div class="clearboth"></div><div id="box-icon-5644eb6a11bc0" style="margin-bottom:30px;" class="   simple_ultimate-style mk-box-icon"><div class="left-side "><i style="color:#ffc904;" class="mk-moon-calendar medium mk-main-ico"></i><div class="box-detail-wrapper medium-size"><h4 style="font-size:18px;font-weight:bold;">October 7, 2014</h4><p>Location: <a class="color-darkGold" title="Map to HPA I" href="http://map.ucf.edu/locations/80/health-public-affairs-i/" target="_blank">HPA I</a> Room: 304<br />
10:00 am</p>
</div><div class="clearboth"></div></div></div><div id="ajax-5644eb6a11bc0" class="mk-dynamic-styles"><!-- --></div>
			<div class="clearboth"></div></div><div class="clearboth"></div></div><div class="clearboth"></div></div><div id="ajax-5644eb6a0ecec" class="mk-dynamic-styles"><!--  #mk-tabs-5644eb6a0ecec .mk-tabs-tabs li.ui-tabs-active a, #mk-tabs-5644eb6a0ecec .mk-tabs-panes, #mk-tabs-5644eb6a0ecec .mk-fancy-title span{ background-color:#ffffff; }--></div>


	</div></div>                     
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
<!-- END MY CONTENT -->
                        
						<div class="clearboth"></div>
				<?php endwhile; ?>

				</div>
			
		<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
		<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>
<?php get_footer(); ?>