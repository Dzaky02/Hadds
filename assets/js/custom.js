// Parallax background
$(window).scroll(function() {
    parallax();
});

function parallax() {
    
    var wScroll = $(window).scrollTop();

    $('.parallax--bg').css('background-position', 'center '+(wScroll*0.5)+'px')
}

// Navbar setting when scrolled
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

// Auto scroll nav-link clicked
$('.page-scroll').on('click', function(e) {

    var temp = $(this).attr('href');
    var elementSection = $(temp);
    
    // start scrolled
    $('html,body').animate({
        scrollTop: elementSection.offset().top-75
    }, 1250, 'easeInOutExpo');

    e.preventDefault();

});

// Swiper function for our team
var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    initialSlide : 1,
    coverflowEffect: {
      rotate: 10,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows : true,
    },
  });