<?php echo head(array('bodyid'=>'home')); ?>

<?php if (get_theme_option('Homepage Text') && (get_theme_option('Homepage Text Position') !== 'bottom')): ?>
<div id="intro">
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
</div>
<?php endif; ?>

<!-- Featured Item -->
<div id="featured" class="layout-<?php echo thedaily_featured_count(); ?>">
    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('thedaily_display_random_featured_exhibits')): ?>
    <!-- Featured Exhibit -->
    <?php echo thedaily_display_random_featured_exhibits(0); ?>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection') !== '0' && count(get_random_featured_collection()) > 0): ?>
    <?php echo random_featured_collection(0); ?>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Item') !== '0' && count(get_random_featured_items()) > 0): ?>
    <?php echo random_featured_items(0); ?>
    <?php endif; ?>
</div><!--end featured-item-->

<?php if (get_theme_option('Homepage Text') && (get_theme_option('Homepage Text Position') == 'bottom')): ?>
<div id="intro">
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
</div>
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
