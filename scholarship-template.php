<?php
/*
Template Name: Scholarships
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
<div id="theme-page" class="master-holder clearfix" role="main" itemprop="mainContentOfPage" >
	<div class="mk-main-wrapper-holder">
		<div id="mk-page-id-2750" class="theme-page-wrapper mk-main-wrapper mk-grid full-layout  ">
			<div class="theme-content <?php echo $padding; ?>" itemprop="mainContentOfPage">
                 
                        
 <!-- START MY NEW TEST SECTION -->
<div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row ">		
	<div style="" class="vc_col-sm-9 wpb_column column_container  _ height-full">
		<div id="text-block-2" class="mk-text-block   ">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
						<?php the_content();?>
                  <?php endwhile; ?>
                <?php wp_reset_query(); ?>    
			<div class="clearboth"></div>
		</div>
	</div>
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
		<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
	</div>
</div>
<!-- END MY NEW TEST SECTION -->                           
                        
                        
                        
                        
                        
                        
<!-- START THE CUSTOM SECTION -->
<?php 
if(is_page( 539 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 15)  // COLLEGE WIDE
								)
							)); }
	
elseif (is_page( 547 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 16) // COMMUNICATION SCIENCES & DISORDERS
								)
							)); }
	
elseif (is_page( 555 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 17) // CRIMINAL JUSTICE
								)
							)); }
elseif (is_page( 556 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 18) // HEALTH MANAGEMENT
								)
							)); }
	
elseif (is_page( 557 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 19) // HEALTH PROFESSIONS
								)
							)); }
elseif (is_page( 558 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 20) // LEGAL STUDIES
								)
							)); }
	
elseif (is_page( 559 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 21) // PUBLIC ADMINISTRATION
								)
							)); }
elseif (is_page( 560 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 22) // PUBLIC AFFAIRS
								)
							)); }
	
elseif (is_page( 561 )) {
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'scholarship_cat',
									'field' => 'term_id',
									'terms' => 23) // SOCIAL WORK
								)
							)); }
else {                                  
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'scholarship',
								'orderby'=>'title',
								'order'=>'ASC'
							)); }
?> 
   
                

                
				
				<?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>

 
 
 
 
 
 
 
 
                
<!-- START THE REPEAT SECTION -->               
<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-12 wpb_column column_container ">
		<h2 style="font-size: 30px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568d5c104e1fc" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style=""><?php the_title(); ?></span></h2>
        <div class="clearboth"></div>
        <div id="list-style-568d5c104e58b" class="mk-list-styles mk-shortcode mk-align-none " style="margin-bottom:30px">
        	<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>Recipient Criteria:</span></h3>
            	<div id="list-4" class="mk-list-styles  mk-align-none  clear" data-charcode="f00c" data-family="awesome-icons">
				<?php the_field('criteria'); ?>
                </div>
		</div>
        <div id="list-style-568d5c104ed55" class="mk-list-styles mk-shortcode mk-align-none " style="margin-bottom:30px">
        	<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>Required Attachments for Application Submission:</span></h3>
            	<?php the_field('attachments'); ?>
		</div>
        
        <div id="mk-button-4" class="mk-button-container _ relative    inline left  ">
			<a  href="https://my.ucf.edu"  target="_self" class="mk-button js-smooth-scroll mk-button--dimension-flat mk-button--size-medium mk-button--corner-rounded text-color-dark _ relative text-center font-weight-700 no-backface  letter-spacing-1 inline">
				 <span class="mk-button--text">Award: <?php the_field('award_amount'); ?></span>
			</a>
		</div>
        

        
        
    <div class="clearboth"></div>
    <div class="mk-shortcode mk-padding-shortcode" style="height:70px"></div>
    <div class="clearboth"></div>
    </div>
</div>
<!-- END OF THE REPEAT SECTION -->
<?php endwhile; ?>

<?php wp_reset_query(); ?> 
																		
<style>  
	#list-style-568d5c104e58b ul li:before { font-family:FontAwesome !important; content: "\f00c" !important; color:#ffc904 !important; display: inline-block; width:20px;}
	#list-style-568d5c104ed55 ul li:before { font-family:FontAwesome !important; content: "\f15c" !important; color:#ffc904 !important; display: inline-block; width:20px; }
	.button-568d5c104f525 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } 
	.button-568d5c104f525 { background-color:#e8e8e8 !important; } 
	.mk-button.button-568d5c104f525.flat-dimension:hover { background-color:#252525 !important; color:#ffc904 !important; } 
	
	#text-block-2 {     margin-bottom:0px;     text-align:left;}
	#padding-3 {height: 40px;}
	#list-4 {margin-bottom:30px}
	
	#mk-button-4 {margin-bottom: 15px;margin-top: 0px;margin-right: 15px; }
	#mk-button-4 .mk-button--corner-rounded {padding: 14px 24px;line-height: 100%;border-radius: 3px; color:#333;}
	#mk-button-4 .mk-button {display: inline-block;max-width: 100%;}
	#mk-button-4 .mk-button {
		background-color: #e8e8e8;
		-o-transition:.3s;
  		-ms-transition:.3s;
  		-moz-transition:.3s;
  		-webkit-transition:.3s;
  		/* ...and now for the proper property */
  		transition:.3s;
	} 
	#mk-button-4 .mk-button:hover {color:#ffc904;background-color:#000000;}
	#mk-button-4 .mk-button:hover .mk-svg-icon {color:#ffc904;}
	
	 /* 1467225562 - */ .vc_row { position:relative; } .vc_inner.mk-grid { margin:0 auto; } .mk-list-styles.mk-align-left ul { display:inline-block; float:left; } .mk-list-styles.mk-align-right ul { display:inline-block; float:right; } .mk-list-styles ul { margin:0; padding:0; list-style:none; } .mk-list-styles ul li { position:relative; margin:0 0 6px 0; padding:0 0px 0 10px; line-height:24px !important; } .mk-list-styles ul li .mk-svg-icon{ position:absolute; top:4px; left:0; height:16px; }
</style>
<!-- END OF THE CUSTOM SECTION -->
                        
                        
					
                    
                    
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
