<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($author = option('author')): ?>
    <meta name="author" content="<?php echo $author; ?>" />
    <?php endif; ?>
    <?php if ($copyright = option('copyright')): ?>
    <meta name="copyright" content="<?php echo $copyright; ?>" />
    <?php endif; ?>
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('style', 'iconfonts'));
    queue_css_url('https://fonts.googleapis.com/css?family=Archivo+Black|Assistant:200,300,400');
    echo head_css();
    echo $this->partial('common/custom_colors.php');
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_file(array('globals'));
    queue_js_file(array('thedaily'), 'js');
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">

        <header role="banner">

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>

            <div id="search-container" role="search">
                <button type="button" class="search-toggle" title="<?php echo __('Toggle search'); ?>"></button>
                <?php 
                    $showAdvanced = get_theme_option('use_advanced_search');
                    $formClass = ($showAdvanced) ? 'with-advanced closed' : 'closed';
                    echo search_form(array('show_advanced' => $showAdvanced, 'form_attributes' => array('role' => 'search', 'class' => $formClass))); 
                ?>
            </div>


            <nav id="top-nav" role="navigation" class="closed">
                <button type="button" class="menu-toggle" aria-label="<?php echo __('Toggle menu'); ?>"></button>
                <?php echo public_nav_main(); ?>
            </nav>

        </header>

          <?php echo theme_header_image(); ?>

        <article id="content" role="main">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
