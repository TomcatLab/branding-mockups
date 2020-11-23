$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        items:1,
        dots:true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    });
    feather.replace();

    $.fn.BeerSlider = function ( options ) {
        options = options || {};
        return this.each(function() {
          new BeerSlider(this, options);
        });
    };
    $('.beer-slider').BeerSlider({width: 50});

    var nav = $('.navbar.navbar-main');
    var scrolled = false;

    $(window).scroll(function () {
        
        if (500 < $(window).scrollTop() && !scrolled) {
            nav.addClass('bg-invert');
            scrolled = true;
        }

        if (500 > $(window).scrollTop() && scrolled) {
            nav.removeClass('bg-invert');
            scrolled = false;      
        }
    });
});