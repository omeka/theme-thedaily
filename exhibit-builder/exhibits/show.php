<?php
queue_js_file(array('thedaily-exhibits'), 'js');
queue_js_string('
    jQuery("document").ready(function() {
        var levels = jQuery(".parent").length;
        jQuery(".current ul, .parent ul").parents("#exhibit-pages").addClass("max-tree-" + levels);
    });
');
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<div id="exhibit-wrap">
    <?php $exhibitNavScroll = (get_theme_option('navigation_scroll') && (get_theme_option('navigation_scroll') == 1)); ?>
    <nav id="exhibit-pages" <?php echo ($exhibitNavScroll) ? 'class="scroll"' : ''; ?>>
        <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
        <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
    </nav>
    
    <div id="exhibit-body">
        <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>
        
        <div id="exhibit-blocks">
        <?php exhibit_builder_render_exhibit_page(); ?>
        </div>
    </div>
</div>

<?php echo foot(); ?>
