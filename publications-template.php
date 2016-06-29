<?php
/*
Template Name: Publications Page
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

<div id="theme-page" class="master-holder clearfix" <?php echo get_schema_markup('main'); ?>>
            <div class="mk-main-wrapper-holder">
                <div <?php echo $wrapper_id; ?> class="theme-page-wrapper <?php
        echo $wrapper_class; ?> <?php
        echo $layout; ?>-layout <?php
        echo $padding; ?> ">
                      <div class="theme-content <?php
        echo $padding; ?>" itemprop="mainContentOfPage">
                            <?php
        echo $content;
?>                      
                      <div class="clearboth"></div>
                      <?php
        if (mk_is_pages_comments_enabled()) {
            if (comments_open()) {
                comments_template('', true);
            }
        }
?>
                      </div>
                <?php
        if ($layout != 'full') { get_sidebar(); } ?>
                <div class="clearboth"></div>
                
                </div>
            </div>

<?php get_footer(); ?>
