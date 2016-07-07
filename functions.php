<?php
function thedaily_display_random_featured_exhibits($num)
{
    $html = '';
    $featuredExhibits = thedaily_get_random_featured_exhibits($num);
    if ($featuredExhibits) {
        foreach ($featuredExhibits as $featuredExhibit) {
            $html .= get_view()->partial('exhibit-builder/exhibits/single.php', array('exhibit' => $featuredExhibit));
        }
    } else {
        $html .= '<p>' . __('You have no featured exhibits.') . '</p>';
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

function thedaily_featured_count() {
    $count = 0;
    if (get_theme_option('Display Featured Item') !== '0' && count(get_random_featured_items()) > 0) {
        $count += count(get_random_featured_items(0));
    }
    if (get_theme_option('Display Featured Collection') !== '0' && count(get_random_featured_collection()) > 0) {
        $count += count(get_random_featured_collection(0));
    }
    if ((get_theme_option('Display Featured Exhibit') !== '0')
        && plugin_is_active('ExhibitBuilder')
        && function_exists('thedaily_display_random_featured_exhibits'))
    {
        $count += count(thedaily_get_random_featured_exhibits(0));
    }
    return $count;
}

?>