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
});