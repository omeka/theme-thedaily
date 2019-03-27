<?php
function thedaily_random_featured_records_html($recordType, $featuredRecords)
{
    $html = '';
    $recordSinglePartial = '';
    
    switch ($recordType) {
        case 'exhibit':
            $recordSinglePartial = 'exhibit-builder/exhibits/single.php';
            break;
        case 'item';
            $recordSinglePartial = 'items/single.php';
            break;
        case 'collection';
            $recordSinglePartial = 'collections/single.php';
            break;
    }
    
    if ($featuredRecords) {
        foreach ($featuredRecords as $featuredRecord) {
            $html .= get_view()->partial($recordSinglePartial, array($recordType => $featuredRecord));
        }
    }
    
    if ($recordType == 'exhibit') {
        $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);        
    }

    return $html;
}

function thedaily_get_random_featured_records($record, $num = 0, $hasImage = true)
{
    return get_records($record, array('featured' => 1,
                                     'sort_field' => 'random',
                                     'hasImage' => $hasImage), $num);
}

function thedaily_display_featured_records() {
    $recordTypes = ['Exhibit', 'Collection', 'Item'];

    $randomRecordCount = 0;
    $randomRecordHtml = '';
    
    foreach ($recordTypes as $recordType) {
        $randomRecords = null;
        $randomRecords = thedaily_get_random_featured_records($recordType);
        
        if ((get_theme_option("Display Featured $recordType") !== '0') && ($randomRecords !== null)) {
            if ($recordType == 'Exhibit' && !plugin_is_active('ExhibitBuilder')) {
                return;
            }
            $randomRecordCount += count($randomRecords);
            $randomRecordHtml .= thedaily_random_featured_records_html(strtolower($recordType), $randomRecords);
        }
    }
       
    $html = '<div id="featured" class="layout-' . $randomRecordCount . '">';
    $html .= $randomRecordHtml;
    $html .= '</div>';

    return $html;
}

?>