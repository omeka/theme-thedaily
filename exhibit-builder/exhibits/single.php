<div class="exhibit record">
    <?php if ($exhibitImage = record_image($exhibit, 'fullsize')): ?>
        <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
    <?php endif; ?>
    <div class="featured-meta">
        <h3><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h3>
        <?php if ($description = metadata($exhibit, 'description', array('no_escape' => true))): ?>
        <p><?php echo snippet_by_word_count($description); ?></p>
        <?php endif; ?>
    </div>
</div>
