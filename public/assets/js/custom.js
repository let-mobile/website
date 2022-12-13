jQuery('#MN-slider').lightSlider({
    keyPress:false,
    item:9,
    loop:true,
    auto: true,
    arrows: true,
    slideMargin: 20,
    pager: false,
    responsive : [
        {
            breakpoint:788,
            settings: {
                item:2,
                slideMove:3,
                slideMargin:10,
              }
        },
        {
            breakpoint:580,
            settings: {
                item:2,
                slideMove:1,
                slideMargin:6,
              } 
        },
    ],
    onSliderLoad: function() {
        jQuery('#MN-slider').removeClass('cS-hidden');
    } 
});

jQuery('#Detail-slider').lightSlider({
    keyPress:false,
    item:1,
    loop:true,
    auto: true,
    arrows: true,
    slideMargin: 6,
    pager: true,
    responsive : [
        {
            breakpoint:788,
            settings: {
                item:2,
                slideMove:3,
                slideMargin:10,
              }
        },
        {
            breakpoint:580,
            settings: {
                item:1,
                slideMove:1,
                slideMargin:6,
              } 
        },
    ],
    onSliderLoad: function() {
        jQuery('#Detail-slider').removeClass('cS-hidden');
    } 
});

// Counter Count

$('.counter-count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
      
      //chnage count up speed here
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

// Upload Image

