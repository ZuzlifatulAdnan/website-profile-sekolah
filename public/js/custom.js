/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

$(document).ready(function () {
    // Toggle dropdown on click for mobile devices
    $('.dropdown-toggle').click(function (e) {
        e.preventDefault();
        
        if ($(window).width() < 768) {
            var $dropdownMenu = $(this).next('.dropdown-menu');
            
            if ($dropdownMenu.is(':visible')) {
                $dropdownMenu.removeClass('show').slideUp();
            } else {
                $('.dropdown-menu').removeClass('show').slideUp();
                $dropdownMenu.addClass('show').slideDown();
            }
        }
    });

    // Close dropdown when clicked outside (mobile)
    $(document).click(function (e) {
        if ($(window).width() < 768) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show').slideUp();
            }
        }
    });

    // Reset dropdown state when resizing window
    $(window).resize(function () {
        if ($(window).width() >= 768) {
            $('.dropdown-menu').removeAttr('style').removeClass('show');
        }
    });
});
