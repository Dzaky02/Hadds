$(document).scroll( function(){
    var $element = $('.navbar');
    var navbarCustomClass = 'navbar-when-scrolled';

    if ($(document).scrollTop() >= 100) {
        // If user scrolled more than 100 pixel
        $element.addClass(navbarCustomClass);
    } else {
        $element.removeClass(navbarCustomClass);
    }
});