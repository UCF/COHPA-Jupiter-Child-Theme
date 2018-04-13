
<?php

add_shortcode('internlist', function() {
$kaitlynjanosik = 'Other';                           
$myfavetools = new WP_Query(array(
								'post_type'	=> 'internship',
								'orderby'=>'title',
								'order'=>'ASC',
								'meta_query' => array(
									'relation' => 'AND',
									'main_intern_category' => array(
										'key' => 'main_intern_category',
										'value' => $kaitlynjanosik, // I WANT THIS AS A VARIABLE IN THE SHORTCODE
										'compare' => 'LIKE',
									),)
							)); 
?> 

<?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>

<!-- START THE REPEAT SECTION -->   
<div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
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
		<h2 id="fancy-title-5" class="mk-fancy-title  simple-style  titleFIX color-single">
			<span>Contact Information:</span>
		</h2>
		<div class="clearboth"></div>
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
		<div id="mk-button-11" class="mk-button-container _ relative width-full   block text-center internButtonFix">
			<a  href="<?php the_field('intern_website'); ?>"   target="_self" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-x-large mk-button--corner-pointed text-color-dark _ relative text-center font-weight-700 no-backface  letter-spacing-2 block">
						 <span class="mk-button--text">Website</span>
			</a>
		</div>
	</div>
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<div id="mk-button-12" class="mk-button-container _ relative width-full   block text-center internButtonFix">
			<a  href="<?php the_field('intern_app_url'); ?>"   target="_self" class="mk-button js-smooth-scroll mk-button--dimension-outline mk-button--size-x-large mk-button--corner-pointed skin-dark _ relative text-center font-weight-700 no-backface  letter-spacing-2 block">
				<span class="mk-button--text">Application</span>
			</a>
		</div>
	</div>
</div>

<div  class="wpb_row vc_row vc_row-fluid  mk-fullwidth-false  attched-false     js-master-row ">
	<div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
		<div id="divider-13" class="mk-divider     divider_full_width center thin_solid  ">
			<div class="divider-inner"></div>
	
		</div>
		<div class="clearboth"></div>
	</div>
</div>
<!-- END OF THE REPEAT SECTION -->
<?php endwhile; ?>
<style id="mk-shortcode-dynamic-styles" type="text/css">#fancy-title-2{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-2 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-2 { text-align:center !important; } } #fancy-title-3{letter-spacing:0px;text-transform:initial;font-size:18px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-3 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-3 { text-align:center !important; } } #text-block-4 { margin-bottom:0px; text-align:left; } #fancy-title-5{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-5 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-5 { text-align:center !important; } } #fancy-title-6{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-6 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-6 { text-align:center !important; } } #fancy-title-7{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-7 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-7 { text-align:center !important; } } #fancy-title-8{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-8 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-8 { text-align:center !important; } } #fancy-title-9{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-9 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-9 { text-align:center !important; } } #fancy-title-10{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-10 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-10 { text-align:center !important; } } #mk-button-11 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #mk-button-11 .mk-button { background-color:#ffc904; } #mk-button-11 .mk-button:hover { color:#ffffff !important; background-color:#212121; } #mk-button-11 .mk-button:hover .mk-svg-icon { color:#ffffff !important; } #mk-button-12 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #divider-13 { padding:10px 0 40px; } #divider-13 .divider-inner { border-top-width:1px; } #divider-13 .divider-inner:after { } #fancy-title-14{letter-spacing:0px;text-transform:initial;font-size:18px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-14 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-14 { text-align:center !important; } } #text-block-15 { margin-bottom:0px; text-align:left; } #fancy-title-16{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-16 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-16 { text-align:center !important; } } #fancy-title-17{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px;}#fancy-title-17 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-17 { text-align:center !important; } } #fancy-title-18{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-18 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-18 { text-align:center !important; } } #fancy-title-19{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-19 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-19 { text-align:center !important; } } #fancy-title-20{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-20 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-20 { text-align:center !important; } } #fancy-title-21{letter-spacing:0px;text-transform:initial;font-size:14px;color:;text-align:left;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px;}#fancy-title-21 span{} @media handheld, only screen and (max-width:767px) { #fancy-title-21 { text-align:center !important; } } #mk-button-22 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #mk-button-22 .mk-button { background-color:#ffc904; } #mk-button-22 .mk-button:hover { color:#ffffff !important; background-color:#212121; } #mk-button-22 .mk-button:hover .mk-svg-icon { color:#ffffff !important; } #mk-button-23 { margin-bottom:0px; margin-top:0px; margin-right:0px; } #divider-24 { padding:10px 0 10px; } #divider-24 .divider-inner { border-top-width:1px; } #divider-24 .divider-inner:after { }</style>
<?php wp_reset_query(); ?> 

	
<?php	
});// END SHORTCODE [internlist]?> 
