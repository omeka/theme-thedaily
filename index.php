<?php echo head(array('bodyid'=>'home')); ?>

<?php if (get_theme_option('Homepage Text') && (get_theme_option('Homepage Text Position') !== 'bottom')): ?>
<div id="intro">
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
</div>
<?php endif; ?>

<?php echo thedaily_display_featured_records(); ?>

<?php if (get_theme_option('Homepage Text') && (get_theme_option('Homepage Text Position') == 'bottom')): ?>
<div id="intro">
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
</div>
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
