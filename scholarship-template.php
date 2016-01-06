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
<div id="theme-page" <?php echo get_schema_markup('main'); ?>>
	<div class="mk-main-wrapper-holder">
		<div id="mk-page-id-<?php echo $post->ID; ?>" class="theme-page-wrapper mk-main-wrapper <?php echo $page_layout; ?>-layout <?php echo $padding; ?> mk-grid vc_row-fluid">
			<div class="theme-content <?php echo $padding; ?>" itemprop="mainContentOfPage">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
						<?php the_content();?>
						<div class="clearboth"></div>
						
						
<!-- START THE CUSTOM SECTION -->
<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-12 wpb_column column_container ">
		<h2 style="font-size: 30px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-568d5c104e1fc" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style="">College of Health and Public Affairs Doctoral Scholarship</span></h2>
        <div class="clearboth"></div>
        <div id="list-style-568d5c104e58b" class="mk-list-styles mk-shortcode mk-align-none " style="margin-bottom:30px">
        	<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>Recipient Criteria:</span></h3>
            	<ul>
					<li>Must have completed a minimum of 9 doctoral credit hours and be enrolled in a doctoral degree program in the College of Health and Public Affairs</li>
					<li>Must have a minimum overall 3.5 GPA</li>
					<li>Must provide an essay (two or less pages, double spaced, 12 point font) outlining how their career pathway aligns with the COHPA mission of &#8220;Strengthening Communities. Changing Lives&#8221;.</li>
					<li>Must provide a letter of recommendation from a full-time faculty member from their academic program in the College of Health and Public Affairs</li>
				</ul>
		</div>
        <div id="list-style-568d5c104ed55" class="mk-list-styles mk-shortcode mk-align-none " style="margin-bottom:30px">
        	<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>Required Attachments for Application Submission:</span></h3>
            	<ul>
                    <li>GPS Report</li>
                    <li>Essay</li>
                    <li>Letter of Recommendation</li>
                    <li>Resume</li>
                </ul>
		</div>
        <div class="mk-button-align left">
        	<a href="https://my.ucf.edu" target="_self"  class="mk-button dark button-568d5c104f525 dark-color  flat-dimension large pointed   ">
            	<span>Award: 2 awards at $2,000 each</span>
            </a>
        </div>
    <div class="clearboth"></div>
    <div class="mk-shortcode mk-padding-shortcode" style="height:80px"></div>
    <div class="clearboth"></div>
</div>
																		
<style>  
	#list-style-568d5c104e58b ul li:before { font-family:FontAwesome !important; content: "\f00c" !important; color:#ffc904 !important; }
	#list-style-568d5c104ed55 ul li:before { font-family:Icomoon !important; content: "\4a" !important; color:#ffc904 !important; }
	.button-568d5c104f525 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } 
	.button-568d5c104f525 { background-color:#e8e8e8 !important; } 
	.mk-button.button-568d5c104f525.flat-dimension:hover { background-color:#252525 !important; color:#ffc904 !important; } 
</style>
<div class="clearboth"></div>
<!-- END OF THE CUSTOM SECTION -->
					
						
						
						
						
						
						
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
