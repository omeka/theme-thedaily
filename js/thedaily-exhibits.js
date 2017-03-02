(function($) {
    $(document).ready(function() {

        // Exhibit sidebar scrolling

        var $sidebar   = $("#exhibit-pages"), 
            $window    = $(window),
            offset     = $sidebar.offset(),
            topPadding = 15;

        var sidebarScroller = function() {
            $window.scroll(function() {
                if ($window.scrollTop() > offset.top) {
                    $sidebar.stop().animate({
                        marginTop: $window.scrollTop() - offset.top + topPadding
                    });
                } else {
                    $sidebar.stop().animate({
                        marginTop: 0
                    });
                }
            });
        };

        if ($window.width() > 640) {
            sidebarScroller();
        }

        $window.resize(function() {
            if ($(this).width() > 640) {
                sidebarScroller();
            } else {
                $window.unbind('scroll');
            }
        });

        // Exhibit sidebar submenu toggle management

        $('#exhibit-pages li ul').each(function() {
            var subpages = $(this)
            var subpageToggle = '<button class="subpages-toggle collapsed" aria-label="Expand"></button>'
            subpages.siblings('a').addClass('has-children');
            subpages.before(subpageToggle);
            $('.has-children').parent('li').addClass('collapsed');
        });

        $('li.parent, li.current').children('.subpages-toggle').attr('class', 'subpages-toggle expanded').attr('aria-label', 'Collapse');
        $('li.parent.collapsed, li.current.collapsed').removeClass('collapsed').addClass('expanded');

        $('#exhibit-pages').on('click', '.subpages-toggle', function() {
            var subpageToggle = $(this);
            subpageToggle.toggleClass('collapsed').toggleClass('expanded');
            subpageToggle.parent('li').toggleClass('collapsed').toggleClass('expanded');
            if (subpageToggle.hasClass('collapsed')) {
                subpageToggle.attr('aria-label', 'Expand');
            } else {
                subpageToggle.attr('aria-label', 'Collapsed');
            }
        });
    });
})(jQuery)