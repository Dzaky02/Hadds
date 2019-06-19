$(document).ready( function(){
    var scroll_start = 0;
    var start_change = $('#change-navbar-here');
    var offset = start_change.offset();

    if (start_change.length) {
        $(document).scroll(function(params) {
            scroll_start = $(this).scrollTop();

            if (scroll_start > offset.top) {
                $('.navbar-custom').css('background-color', 'rgba(0, 186, 225, 1)');
            } else {
                $('.navbar-custom').css('background-color', 'rgba(0, 186, 225, 0)');
            }
        })
    }
})