<?php
function thedaily_display_random_featured_exhibits($num)
{
    $html = '';
    $featuredExhibits = thedaily_get_random_featured_exhibits($num);
    if ($featuredExhibits) {
        foreach ($featuredExhibits as $featuredExhibit) {
            $html .= get_view()->partial('exhibit-builder/exhibits/single.php', array('exhibit' => $featuredExhibit));
        }
    }
    $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
    return $html;
}

function thedaily_get_random_featured_exhibits($num = 5, $hasImage = null)
{
    return get_records('Exhibit', array('featured' => 1,
                                     'sort_field' => 'random',
                                     'hasImage' => $hasImage), $num);
}

function thedaily_show_featured_records() {
    $randomItems = get_random_featured_items();
    $randomCollections = get_random_featured_collection();
    $randomExhibits = thedaily_get_random_featured_exhibits(0);
    
    $randomItemCount = 0;
    $randomCollectionCount = 0;
    $randomExhibitCount = 0;
    
    $randomRecordHtml = '';

    if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('thedaily_display_random_featured_exhibits')) {
        $showRandomExhibits = true;
        $randomExhibitCount = count($randomExhibits);
        $randomRecordHtml .= thedaily_display_random_featured_exhibits(0);
    }

    if ((get_theme_option('Display Featured Collection') !== '0') && ($randomCollections !== null)) {
        $showRandomCollections = true;
        $randomCollectionCount = count($randomCollections);
        $randomRecordHtml .= random_featured_collection();
    }
    
    if ((get_theme_option('Display Featured Item') !== '0') && ($randomItems !== null)) {
        $showRandomItems = true;
        $randomItemCount = count($randomItems);
        $randomRecordHtml .= random_featured_items(0);
    }
    
    $randomRecordCount = $randomItemCount + $randomCollectionCount + $randomExhibitCount;
    
    $html = '<div id="featured" class="layout-' . $randomRecordCount . '">';
    $html .= $randomRecordHtml;
    $html .= '</div>';

    return $html;
}

?>