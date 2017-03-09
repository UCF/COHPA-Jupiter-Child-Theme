<?php
/*
Template Name: Announcements
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
                        <?php the_title( '<h3>', '</h3>' ); ?>
						<?php the_content();?>
                  <?php endwhile; ?>
                <?php wp_reset_query(); ?>    
			<div class="clearboth"></div>
            
            
            
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
else {                                  
	$myfavetools = new WP_Query(array(
								'post_type'	=> 'announcements',
								'order'=>'DESC'
							)); }
?> 

<?php while($myfavetools->have_posts()) : $myfavetools->the_post(); ?>

<!-- START THE REPEAT SECTION -->   
<strong><?php echo get_the_date(); ?></strong> - <?php the_content();?>

<!-- END OF THE REPEAT SECTION -->
<?php endwhile; ?>

<?php wp_reset_query(); ?> 
            
            
            
            
            
            
		</div>
	</div>
    
	<div style="" class="vc_col-sm-3 wpb_column column_container  _ height-full">
        <?php get_sidebar('scholarships'); ?>
	</div>
    
</div>
<!-- END MY NEW TEST SECTION -->                           
                        
                        
                        
                        
                        
                        

																		
<style>  
.theme-page-wrapper #mk-sidebar.mk-builtin {
    width: 100% !important;
}
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
