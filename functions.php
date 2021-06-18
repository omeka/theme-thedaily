<?php
function thedaily_random_featured_records_html($recordType, $featuredRecords)
{
    $html = '';

    $recordSinglePartial = [
        'exhibit' => 'exhibit-builder/exhibits/single.php',
        'collection' => 'collections/single.php',
        'item' => 'items/single.php',
    ];
    
    if ($featuredRecords) {
        foreach ($featuredRecords as $featuredRecord) {
            $html .= get_view()->partial($recordSinglePartial[$recordType], array($recordType => $featuredRecord));
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

function thedaily_display_featured_records() 
{
    $recordTypes = ['Exhibit', 'Collection', 'Item'];

    $randomRecordCount = 0;
    $randomRecordHtml = '';
    
    foreach ($recordTypes as $recordType) {
        if ($recordType == 'Exhibit' && !plugin_is_active('ExhibitBuilder')) {
            continue;
        }
        $randomRecords = null;
        $randomRecords = thedaily_get_random_featured_records($recordType);
        
        if ((get_theme_option("Display Featured $recordType") !== '0') && ($randomRecords !== null)) {
            $randomRecordCount += count($randomRecords);
            $randomRecordHtml .= thedaily_random_featured_records_html(strtolower($recordType), $randomRecords);
        }
    }
       
    $html = '<div id="featured" class="layout-' . $randomRecordCount . '">';
    $html .= $randomRecordHtml;
    $html .= '</div>';

    return $html;
}

function thedaily_output_text_track_file($textFile) {
    $kind = metadata($textFile, array('Dublin Core', 'Type'));
    $language = metadata($textFile, array('Dublin Core', 'Language'));
    $label = metadata($textFile, array('Dublin Core', 'Title'));

    if (!$kind) {
        $kind = 'subtitles';
    }

    if (!$language) {
        $language = get_html_lang();
    }

    $trackSrc = html_escape($textFile->getWebPath('original'));

    if ($label) {
        $labelPart = ' label="' . $label . '"';
    } else {
        $labelPart = '';
    }

    $track = '<track kind="' . $kind . '" src="' . $trackSrc . '" srclang="' . $language . '"' . $labelPart . '>';

    return $track;
}

function thedaily_check_for_tracks($files) {
    foreach ($files as $file) {
        if ($file->getExtension() == "vtt") {
            return true;
        }
    }
    return false;
}

?>