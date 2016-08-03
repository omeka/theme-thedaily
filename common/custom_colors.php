<?php
    ($buttonBg = get_theme_option('button_background')) || ($buttonBg = "#FFFF00");
    ($buttonText = get_theme_option('button_text')) || ($buttonText = "#000000");
    ($exhibitNavBg = get_theme_option('eb_nav_background')) || ($linkColor = "#FFFF00");
    ($exhibitNavText = get_theme_option('eb_nav_text')) || ($linkText = "#000000");
    ($featuredBg = get_theme_option('featured_background')) || ($featuredBg = "#000000");
    ($featuredText = get_theme_option('featured_text')) || ($featuredText = "#FFFFFF");
    ($topNavHighlightText = get_theme_option('top_nav_highlight_text')) || ($buttonBg = "#FFFF00");
?>

<style>

p a,
span a,
.secondary-nav li a,
.pagination a,
.item-pagination a,
#sort-links a,
.element-text a,
#exhibit-page-navigation a,
#featured .featured-meta h3,
.button,
button,
input[type="submit"] {
    background-color: <?php echo $buttonBg; ?>;
    color: <?php echo $buttonText; ?>;
}

.button,
button,
input[type="submit"] {
    border-color: <?php echo $buttonText; ?>
}

#exhibit-pages {
    background-color: <?php echo $exhibitNavBg; ?>;
    color: <?php echo $exhibitNavText; ?>;
}

#featured .featured-meta > * {
    background-color: <?php echo $featuredBg; ?>;
    color: <?php echo $featuredText; ?>;
}

#top-nav > ul > li > a {
    color: <?php echo $topNavHighlightText; ?>;
}

</style>