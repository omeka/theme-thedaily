(function($) {
    $(document).ready(function() {
        $('.search-toggle').click(function() {
            $('#top-nav.open').toggleClass('closed').toggleClass('open');
            $('#search-form').toggleClass('closed').toggleClass('open');
            if ($('#search-form').hasClass('open')) {
                $('#query').focus();
            }
        });
        $('.menu-toggle').click(function() {
            $('#search-form.open').toggleClass('closed').toggleClass('open');
            $('#top-nav').toggleClass('closed').toggleClass('open');
            if ($('#top-nav').hasClass('open')) {
                $('#top-nav > ul > li:first-child').focus();
            }
        });
    });
})(jQuery)