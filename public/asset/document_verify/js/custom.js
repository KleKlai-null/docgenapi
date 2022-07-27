(function ($) {

  "use strict";

    // PRE LOADER
    $(window).load(function(){
      $('.preloader').fadeOut(3000); // set duration in brackets    
    });


    // MENU
    $('.menu-burger').on('click', function() {
      $('.menu-bg, .menu-items, .menu-burger').toggleClass('fs');
      $('.menu-burger').text() == "☰" ? $('.menu-burger').text('✕') : $('.menu-burger').text('☰');
    });


    // ABOUT SLIDER
    $('body').vegas({
        slides: [
            { src: '../asset/document_verify/images/slide-image01.jpg' },
            { src: '../asset/document_verify/images/slide-image02.jpg' }
        ],
        timer: false,
        transition: [ 'zoomOut', ]
    });

})(jQuery);
