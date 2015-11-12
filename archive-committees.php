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
										
                        
                        
                        <div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-false  attched-false vc_row-fluid">
	<div style="" class="vc_col-sm-12 wpb_column column_container ">
			<h2 style="font-size: 30px;text-align:left;color: #3d3d3d;font-style:inherit;font-weight:inherit;padding-top:0px;padding-bottom:0px; text-transform:initial;letter-spacing:0px;" id="fancy-title-5644ac1d72b3d" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style "><span style="">College-Level</span></h2><div class="clearboth"></div>
	<div class=" "><div class="mk-fancy-table mk-shortcode table-style2">
			
<div id="tableTextLeft">
<table width="100%">
<thead>
<tr>
<th>Academics</th>
<th>Charge</th>
<th>Members</th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="3">
<h2 class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style " style="font-size: 14px; text-align: left; color: #3d3d3d; font-style: inherit; font-weight: bold; padding-top: 0px; padding-bottom: 0px; text-transform: initial; letter-spacing: 0px; margin-bottom: 0px;">Undergraduate &amp; Graduate</h2>
</td>
</tr>
<tr>
<td><a title="Academic Affairs Committee" href="https://www.cohpa.ucf.edu/committees/academic-affairs-committee/">Academic Affairs Committee</a></td>
<td>Reviews &amp; approves new programs, program revisions</td>
<td>Faculty</td>
</tr>
<tr>
<td><a title="Divisional Review Committee" href="https://www.cohpa.ucf.edu/committees/divisional-review-committee/">Divisional Review Committee</a></td>
<td>Reviews &amp; evaluates program quality</td>
<td>Faculty or Staff</td>
</tr>
<tr>
<td><a title="Student Affairs Committee" href="https://www.cohpa.ucf.edu/committees/student-affairs-committee/">Student Affairs Committee</a></td>
<td>Reviews grade appeals, academic advising matters</td>
<td>Faculty</td>
</tr>
<tr>
<td><a title="Student Advisory Council" href="https://www.cohpa.ucf.edu/committees/student-advisory-council/">Student Advisory Council</a></td>
<td>Advises dean on student needs, views</td>
<td>Students</td>
</tr>
</tbody>
</table>
</div>

	</div></div>
	</div></div>
                        
                        
                        
                        
                        
                        
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