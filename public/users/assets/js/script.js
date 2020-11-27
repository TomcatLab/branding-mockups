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
        
        if (200 < $(window).scrollTop() && !scrolled) {
            nav.addClass('bg-invert');
            scrolled = true;
        }

        if (200 > $(window).scrollTop() && scrolled) {
            nav.removeClass('bg-invert');
            scrolled = false;      
        }
    });

    let search = $("input.search");
    $(".search-form").submit(function(){
        if(search.val().length === 0){
            search.fadeToggle();
            search.focus();
            return false;
        }
    });
    search.focusout(function() {
        if(search.val().length === 0){
            search.fadeToggle();
        }
    });
    // $("button.search").click(function(){
    //     let search = $("input.search").val();
    //     if(isEmpty(search)){
    //         search.show();
    //     }else{
    //         search.hide();
    //     }
    // });
    $(".mockup.card").hover(function(){
    });
    
    $('.mockup.card').mouseenter(function () {
        $(this).find(".product-add-cart").fadeIn();
        $(this).find(".product-information").fadeOut();
    });
 
    $('.mockup.card').mouseleave(function () {
        $(this).find(".product-add-cart").fadeOut();
        $(this).find(".product-information").fadeIn();
    }).mouseleave();

    
    $(".mockup-image").mouseenter(function () {
        $(this).find(".overlap").fadeIn();
    });
 
    $(".mockup-image").mouseleave(function () {
        $(this).find(".overlap").fadeOut();
    }).mouseleave();

});