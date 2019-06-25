$('.page-scroll').on('click', function(e) {

    var temp = $(this).attr('href');
    var elementSection = $(temp);
    
    // start scrolled
    $('html,body').animate({
        scrollTop: elementSection.offset().top-75
    }, 1250, 'easeInOutExpo');

    e.preventDefault();

});