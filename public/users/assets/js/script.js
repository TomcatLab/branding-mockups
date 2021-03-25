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

    $("#paypal").addClass('d-none');
    $("#card").addClass('d-none');

    $('.selectPayment').click(function(){
        $(".btn-payment").addClass('d-none');
        $(".selectPayment").removeClass('active');
        let selectedPayment = $(this).attr('data-payment');
        $("#"+selectedPayment).removeClass('d-none');
        $("#option-"+selectedPayment).addClass('active');
    });

    $('a.download').click(function(e) {
        e.preventDefault();  //stop the browser from following        
        window.location.href = $(this).attr('href');
    });

});

function AddToCart(product_id){
    $.ajax({
        type: "POST",
        url: "/user/cart/add-item",
        data: {
           ProductId : product_id
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN':csrf_token,
            // 'Authorization':'Basic xxxxxxxxxxxxx',
            //'Content-Type':'application/json'
        },
        success: function(data, textStatus, xhr){
            if(xhr.status == 200){
                console.log(data,textStatus,xhr);     
            }
        },
    });
}
function RemoveFromCart(CartItemId){
    $.ajax({
        type: "POST",
        url: "/user/cart/remove-item",
        data: {
           CartItemId : CartItemId
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN':csrf_token,
            // 'Authorization':'Basic xxxxxxxxxxxxx',
            //'Content-Type':'application/json'
        },
        success: function(data, textStatus, xhr){
            if(xhr.status == 200){
                //$("#"+data.cartItemId).remove();
                location.reload();
            }
        },
    });
}