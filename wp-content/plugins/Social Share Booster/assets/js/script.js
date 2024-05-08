(function ($) {
    $(document).ready(function () {
        var $shareIcon = $('.ssb-floating-share-icon');
        var $sharePanel = $('.ssb-share-panel');

        $shareIcon.on('click', function () {
            $sharePanel.toggle();
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest($shareIcon).length && !$(e.target).closest($sharePanel).length) {
                $sharePanel.hide();
            }
        });
    });
})(jQuery);