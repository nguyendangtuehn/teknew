<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <?php if (is_search()) { ?>
       <meta name="robots" content="noindex, nofollow" /> 
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
           if (function_exists('is_tag') && is_tag()) {
              single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
           elseif (is_archive()) {
              wp_title(''); echo ' - '; }
           elseif (is_search()) {
              echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
           elseif (!(is_404()) && (is_single()) || (is_page())) {
              wp_title(''); echo ' - '; }
           elseif (is_404()) {
              echo 'Not Found - '; }
           if (is_home()) {
              bloginfo('name'); echo ' - Trang chủ '; bloginfo('description'); }
           else {
               bloginfo('name'); }
           if ($paged>1) {
              echo ' - page '. $paged; }
        ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page-wrap">         
   <div class="navbar-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="header" class="pull-left">
                        <h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div role="navigation" class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo get_option('home'); ?>" class="navbar-brand">Trang chủ</a>
                    </div>
                    <div class="navbar-collapse collapse">
                         <?php // Loading WordPress Custom Menu
                            wp_nav_menu( array(
                               'menu_class'      => 'nav navbar-nav',
                               'menu_id'         => 'main-menu',
                               'walker'          => new Cwd_wp_bootstrapwp_Walker_Nav_Menu()
                           ) );
                         ?>
                         <div class="navbar-form navbar-right">
                             <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>             
                