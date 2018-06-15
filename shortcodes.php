<?php /* [internlist maincat="" subcat=""] */ function interncat( $atts ) {
    $a = shortcode_atts( array(
        'maincat' => 'Local',
    ), $atts );
$myinterntools = new WP_Query(array(
'post_type'	=> 'internship',
'orderby'=>'title',
'posts_per_page' => -1,
'order'=>'ASC',
'meta_query' => array(
	'relation' => 'AND',
	'main_intern_category' => array(
		'key' => 'main_intern_category',
		'value' => $a['maincat'], // I WANT THIS AS A VARIABLE IN THE SHORTCODE
		'compare' => 'LIKE',
	), ) )); 	while($myinterntools->have_posts()) : $myinterntools->the_post();?>	<!-- START THE REPEAT SECTION --> <div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
	<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
		<h2 id="fancy-title-3" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_title(); ?></span>
		</h2>
		<div class="clearboth"></div>
		<div class=" vc_custom_1520863964717">
			<div id="text-block-4" class="mk-text-block   internTextFix">
				<p><?php the_content();?></p>
				<div class="clearboth"></div>
			</div>
		</div>				
		<?php if (get_field('contact_intern_name') || get_field('intern_address') || get_field('intern_phone') || get_field('intern_email')): ?>
		<h2 id="fancy-title-5" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span>Contact Information:</span>
		</h2>
		<?php endif; ?> <div class="clearboth"></div>
	</div>
</div>
<div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
	<div style="" class="vc_col-sm-6 wpb_column column_container  _ height-full">
		<h2 id="fancy-title-6" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('contact_intern_name'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-7" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('contact_intern_jobtitle'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-8" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('intern_address'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-9" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><?php the_field('intern_phone'); ?></span>
		</h2>
		<div class="clearboth"></div>
		<h2 id="fancy-title-10" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span><a href="mailto:<?php the_field('intern_email'); ?>"><?php the_field('intern_email'); ?></a></span>
		</h2>
		<div class="clearboth"></div>
	</div>
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<?php if (get_field('intern_website')): ?>
		<div id="mk-button-11" class="mk-button-container _ relative width-full   block text-center internButtonFix">
			<a  href="<?php the_field('intern_website'); ?>"   target="_self" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-x-large mk-button--corner-pointed text-color-dark _ relative text-center font-weight-700 no-backface  letter-spacing-2 block">
						 <span class="mk-button--text">Website</span>
			</a>
		</div>
		<?php endif; ?> </div>
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<?php if (get_field('intern_app_url')): ?>
		<div id="mk-button-12" class="mk-button-container _ relative width-full   block text-center internButtonFix">
			<a  href="<?php the_field('intern_app_url'); ?>"   target="_self" class="mk-button js-smooth-scroll mk-button--dimension-outline mk-button--size-x-large mk-button--corner-pointed skin-dark _ relative text-center font-weight-700 no-backface  letter-spacing-2 block">
				<span class="mk-button--text">Application</span>
			</a>
		</div>
		<?php endif; ?> </div>
</div>
<div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
	<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
		<div id="divider-13" class="mk-divider     divider_full_width center thin_solid  ">
			<div class="divider-inner"></div>
		</div>
		<div class="clearboth"></div>
	</div>
</div><!-- END OF THE REPEAT SECTION -->		
<?php endwhile; ?> <style id="mk-shortcode-dynamic-styles" type="text/css">#fancy-title-2{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-2 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-2 { text-align:center !important; } } #fancy-title-3{letter-spacing:0px;text-transform:initial;font-size:18px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-3 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-3 { text-align:center !important; } } #text-block-4 { margin-bottom:0px; text-align:left; } #fancy-title-5{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-5 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-5 { text-align:center !important; } } #fancy-title-6{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-6 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-6 { text-align:center !important; } } #fancy-title-7{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-7 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-7 { text-align:center !important; } } #fancy-title-8{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-8 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-8 { text-align:center !important; } } #fancy-title-9{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-9 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-9 { text-align:center !important; } } #fancy-title-10{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-10 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-10 { text-align:center !important; } } #mk-button-11 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #mk-button-11 .mk-button { background-color:#ffc904; } #mk-button-11 .mk-button:hover { color:#ffffff !important; background-color:#212121; } #mk-button-11 .mk-button:hover .mk-svg-icon { color:#ffffff !important; } #mk-button-12 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #divider-13 { padding:10px 0 40px; } #divider-13 .divider-inner { border-top-width:1px; } #divider-13 .divider-inner:after { } #fancy-title-14{letter-spacing:0px;text-transform:initial;font-size:18px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-14 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-14 { text-align:center !important; } } #text-block-15 { margin-bottom:0px; text-align:left; } #fancy-title-16{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-16 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-16 { text-align:center !important; } } #fancy-title-17{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-17 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-17 { text-align:center !important; } } #fancy-title-18{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-18 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-18 { text-align:center !important; } } #fancy-title-19{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-19 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-19 { text-align:center !important; } } #fancy-title-20{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-20 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-20 { text-align:center !important; } } #fancy-title-21{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-21 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-21 { text-align:center !important; } } #mk-button-22 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #mk-button-22 .mk-button { background-color:#ffc904; } #mk-button-22 .mk-button:hover { color:#ffffff !important; background-color:#212121; } #mk-button-22 .mk-button:hover .mk-svg-icon { color:#ffffff !important; } #mk-button-23 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #divider-24 { padding:10px 0 10px; } #divider-24 .divider-inner { border-top-width:1px; } #divider-24 .divider-inner:after { }</style>
<?php wp_reset_query(); ?>  <?php	} add_shortcode( 'internlist', 'interncat' ); ?>  <?php add_shortcode('show_books', function() { ?><!-- START REPEATER SECTION --><?php $mybooklist = new WP_Query(array(
								'post_type'	=> 'faculty_books',
								'order'=>'DESC'
							)); ?> <?php while($mybooklist->have_posts()) : $mybooklist->the_post(); ?><!--START OF THE REPEAT SECTION --><?php the_title(); ?> <div></div><!-- END OF THE REPEAT SECTION --> <?php endwhile; ?><!-- END OF THE REPEAT SECTION --> <?php }); // END SHORTCODE [show_books]?><?php add_shortcode('search_research', function() { ?><!-- START FORM SECTION -->	<?php /*** The Template for displaying Author Search */ if ( ! defined( 'ABSPATH' ) ) exit;  $search = ( get_query_var( 'as' ) ) ? get_query_var( 'as' )  : ''; ?><div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row "> <section class="widget widget_search">	<form class="mk-searchform" method="get" id="sul-searchform searchform" action="/staff/">	<div style="" class="vc_col-sm-8 wpb_column column_container  _ height-full">		<div class="wpb_raw_code wpb_content_element wpb_raw_html">
			<div class="wpb_wrapper">
                    	<input type="text" class="field text-input" name="as" id="sul-s" placeholder="<?php _e('Search by first or last name' ,'simple-user-listing');?>" value="<?php echo $search; ?>"/>
                  		<i class="mk-searchform-icon" style="margin-right:20px;"><svg  class="mk-svg-icon" data-name="mk-icon-search" data-cacheid="icon-58179f5179f89" style=" height:16px; width: 14.857142857143px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1664 1792"><path d="M1152 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"/></svg></i>
			</div>
		</div>
	</div>
	<div style="" class="vc_col-sm-4 wpb_column column_container  _ height-full">
		<div id="mk-button-2" class="mk-button-container _ relative width-full   block text-center  ">
            <input type="submit" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-medium mk-button--corner-rounded text-color-light _ relative text-center font-weight-700 no-backface  letter-spacing-1 block" style="border:0px solid; width:100% !important;" id="sul-searchsubmit" value="<?php _e('Search' ,'simple-user-listing');?>" />
		</div>
    </div>
    </form>
</section>
</div>
<div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">
	<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
		<div id="divider-3" class="mk-divider     divider_full_width center thick_solid  ">
			<div class="divider-inner"></div>
		</div>
		<div class="clearboth"></div>
	</div>
</div>
<style type='text/css'>
.divider-inner { display:block; } .mk-divider.custom-width.center { text-align:center; } .mk-divider.custom-width.center .divider-inner { margin:0 auto; } .mk-divider.custom-width.right .divider-inner { margin:0 0 0 auto; } @media handheld, only screen and (max-width:767px) { .mk-divider.custom-width.right, .mk-divider.custom-width.left { margin-left:auto; margin-right:auto; text-align:center; } } .mk-divider.center .divider-inner { margin:0 auto; } .mk-divider.right .divider-inner { margin:0 0 0 auto; } .mk-divider.divider_one_half .divider-inner { width:50%; } .mk-divider.divider_one_third .divider-inner { width:33.33%; } .mk-divider.divider_one_fourth .divider-inner { width:25%; } .mk-divider.double_dot .divider-inner { height:5px; border-top:1px dashed #dadada; border-bottom:1px dashed #dadada; } .mk-divider.thick_solid .divider-inner { border-top:2px solid #e5e5e5; border-top:2px solid rgba(0, 0, 0, 0.1); } .mk-divider.thin_solid .divider-inner { border-top:1px solid #e5e5e5; border-top:1px solid rgba(0, 0, 0, 0.1); position:relative; } .mk-divider.thin_solid .divider-inner:after { width:100%; position:absolute; left:0; top:0; } .mk-divider.single_dotted .divider-inner { border-top:1px dashed #dadada; } .mk-divider.shadow_line .divider-inner { height:7px; } .mk-divider.shadow_line .divider-inner .divider-shadow-left, .mk-divider.shadow_line .divider-inner .divider-shadow-right { display:inline-block; width:50%; height:7px; background-repeat:no-repeat; } .mk-divider.shadow_line .divider-inner .divider-shadow-left { background-position:left center; } .mk-divider.shadow_line .divider-inner .divider-shadow-right { background-position:right center; } .mk-divider[class*='go_top'] .divider-inner { position:relative; height:12px; } .mk-divider[class*='go_top'] .divider-inner:before { top:6px; left:0; display:block; width:100%; height:1px; background-color:#e5e5e5; background-color:rgba(0, 0, 0, 0.1); content:""; } .mk-divider[class*='go_top'] .divider-inner .divider-go-top { position:absolute; top:-10px; right:0; float:right; padding-left:4px; } .mk-divider[class*='go_top'] .divider-inner .divider-go-top .mk-svg-icon { margin-left:6px; color:#cccccc; } .mk-divider.go_top_thick .divider-inner:before { height:2px; } .mk-divider.divider_page_divider { width:100%; }
#mk-button-2 {margin-bottom: 15px;margin-top: 0px;margin-right: 0px;}#mk-button-2 .mk-button {background-color: #ffc904;} #mk-button-2 .mk-button:hover {color:#ffffff;background-color:#222222;}#mk-button-2 .mk-button:hover .mk-svg-icon {color:#ffffff;}#divider-3 {padding:0px 0 20px;}#divider-3 .divider-inner {}#divider-3 .divider-inner:after {}</style><!-- END FORM SECTION -->	<?php	});// END SHORTCODE [search_faculty]?>