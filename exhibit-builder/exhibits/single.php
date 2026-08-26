<?php $headingLevel = (isset($headingLevel)) ? $headingLevel : '3'; ?>
<div class="exhibit record">
    <?php if ($exhibitImage = record_image($exhibit, 'fullsize')): ?>
        <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
    <?php endif; ?>
    <div class="featured-meta">
        <h<?php echo $headingLevel; ?>><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h<?php echo $headingLevel; ?>>
        <?php if ($description = metadata($exhibit, 'description', array('no_escape' => true))): ?>
        <p><?php echo snippet_by_word_count($description); ?></p>
        <?php endif; ?>
    </div>
</div>
