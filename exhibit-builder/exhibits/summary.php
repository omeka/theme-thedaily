<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<?php
$pageTree = exhibit_builder_page_tree();
if ($pageTree):
?>
<div id="exhibit-wrap">
    <?php $exhibitNavScroll = (get_theme_option('navigation_scroll') && (get_theme_option('navigation_scroll') == 1)); ?>
    <nav id="exhibit-pages" <?php echo ($exhibitNavScroll) ? 'class="scroll"' : ''; ?>>
        <?php echo $pageTree; ?>
    </nav>
    <?php endif; ?>
    
    <div id="exhibit-body">
        <h1><?php echo metadata('exhibit', 'title'); ?></h1>
        <?php echo exhibit_builder_page_nav(); ?>
        
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
        <div class="exhibit-description">
            <?php echo $exhibitDescription; ?>
        </div>
        <?php endif; ?>
        
        <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
        <div class="exhibit-credits">
            <h3><?php echo __('Credits'); ?></h3>
            <p><?php echo $exhibitCredits; ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php echo foot(); ?>
