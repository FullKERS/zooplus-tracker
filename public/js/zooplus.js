$(document).on('click', 'tr[data-widget="expandable-table"]', function () {
    const $icon = $(this).find('.icon-campaigne');
    if ($icon.hasClass('fa-folder-plus')) {
        $icon.removeClass('fa-folder-plus').addClass('fa-folder-minus');
    } else {
        $icon.removeClass('fa-folder-minus').addClass('fa-folder-plus');
    }
});

