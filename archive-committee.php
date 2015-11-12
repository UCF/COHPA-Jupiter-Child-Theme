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
<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
<?php 
$program = get_field('program');
if($program) ): ?>
<tr>
<td colspan="3">
<h2 class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style " style="font-size: 14px; text-align: left; color: #3d3d3d; font-style: inherit; font-weight: bold; padding-top: 0px; padding-bottom: 0px; text-transform: initial; letter-spacing: 0px; margin-bottom: 0px;"><?php echo $program->name; ?></h2>
</td>
</tr>
<?php endif; ?>
<tr>
<td><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
<td><?php the_field('charge'); ?></td>
<td><?php the_field('member_type'); ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>

	</div></div>
	</div></div>


				</div>
			
		<?php if ( $page_layout != 'full' ) get_sidebar(); ?>
		<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>
<?php get_footer(); ?>