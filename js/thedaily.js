(function($) {
    var manageModal = function(targetSelector) {
        var targetElement = $(targetSelector);
        targetElement.toggleClass('open');

        var firstFocus = targetElement.find(':focusable').first();
        var lastFocus = targetElement.find(':focusable').last();
        firstFocus.focus();
        lastFocus.on('keydown', function(e) {
            if (e.key == "Tab" && !e.shiftKey) {
                e.preventDefault();
                firstFocus.focus();
            }
        });

        firstFocus.on('keydown', function(e) {
            if ((e.key == "Tab") && e.shiftKey) {
                e.preventDefault();
                lastFocus.focus();
            }
        });
    };

    $(document).ready(function() {
        $(document).on('click', '#search-toggle', function() {
            manageModal('#search-modal');
        });

        $(document).on('click', '#nav-toggle', function() {
            manageModal('#nav-modal');
        });

        $('header').on('click', '.close-button', function() {
            var closeButton = $(this);
            var openButton = $(closeButton.data('open-button'));
            closeButton.parent().removeClass('open');
            openButton.focus();
        });

        $(document).on('keydown', function(event) {
            if (event.key == "Escape") {
                var openModal = $('[aria-role="modal"].open');
                var openButtonSelector = openModal.find('.close-button').data('open-button');
                openModal.removeClass('open');
                $(openButtonSelector).focus();
            }
        });
    });
})(jQuery)