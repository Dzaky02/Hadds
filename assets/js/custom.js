$(document).scroll( function(){
    var $element = $('.navbar');
    var navbarCustomClass = 'navbar-when-scrolled';
    var smallShadows = 'shadow';

    if ($(document).scrollTop() >= 100) {
        // If user scrolled more than 100 pixel
        $element.addClass(navbarCustomClass);
        $element.addClass(smallShadows);
    } else {
        $element.removeClass(navbarCustomClass);
        $element.removeClass(smallShadows);
    }
});