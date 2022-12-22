$(document).ready(function(){

     

  // JavaScript Document
  var owl = $('#destaque .owl-carousel');
  owl.owlCarousel({
    items: 1,
    nav: true,
    navText: [
        '<img src="require/img/extra/left.png" alt="Seta esquerda" class="img-fluid" width="40">',
        '<img src="require/img/extra/right.png" alt="Seta direita" class="img-fluid"  width="40">'
    ],
    navContainer: '#destaque .custom-nav',
    loop: true,
    margin: 10,
    dots: true,
    autoWidth:false,
    autoplay:true,
    autoplayTimeout:7000,
    autoplayHoverPause:true,
    smartSpeed: 1000,
    responsive:{
        0:{
          items:1,
          nav:false
        },

        360: {
          items:1,
          nav: false
        },

        768: {
          items:1,
          nav: false
        }
    }
  });

    // JavaScript Document
  var owl = $('#planos .owl-carousel');
  owl.owlCarousel({
    items: 2,
    nav: false,
    navText: [
        '<img src="require/img/extra/left.png" alt="Seta esquerda" class="img-fluid" width="35">',
        '<img src="require/img/extra/right.png" alt="Seta direita" class="img-fluid"  width="35">'
    ],
    navContainer: '#planos .custom-nav',
    loop: false,
    margin: 10,
    dots: false,
    autoWidth:false,
    autoplay:false,
    responsive:{
        0:{
          items:1,
          nav:false
        },

        360: {
          items:1,
          nav: false
        },

        768: {
          items:2,
          nav: false
        }
    }
  });

    // JavaScript Document
  var owl = $('#planos-solo .owl-carousel');
  owl.owlCarousel({
    items: 1,
    nav: false,
    navText: [
        '<img src="require/img/extra/left.png" alt="Seta esquerda" class="img-fluid" width="40">',
        '<img src="require/img/extra/right.png" alt="Seta direita" class="img-fluid"  width="40">'
    ],
    navContainer: '#planos-solo .custom-nav',
    loop: false,
    margin: 10,
    dots: false,
    autoWidth:false,
    autoplay:false,
    responsive:{
        0:{
          items:1,
          nav:false
        },

        360: {
          items:1,
          nav: false
        },

        768: {
          items:1,
          nav: false
        }
    }
  });

     // JavaScript Document
  var owl = $('#planos-quem-somos .owl-carousel');
  owl.owlCarousel({
    items: 2,
    nav: false,
    navText: [
        '<img src="../require/img/extra/left.png" alt="<" class="img-fluid" width="35">',
        '<img src="../require/img/extra/right.png" alt=">" class="img-fluid"  width="35">'
    ],
    navContainer: '#planos-quem-somos .custom-nav',
    loop: false,
    margin: 10,
    dots: false,
    autoWidth:false,
    autoplay:false,
    responsive:{
        0:{
          items:1,
          nav:false
        },

        360: {
          items:1,
          nav: false
        },

        768: {
          items:2,
          nav: false
        }
    }
  });

   $("#foneContato").mask("(99) 9 9999-9999");
   $("#celularJob").mask("(99) 9 9999-9999");
   $("#celularConsultor").mask("(99) 9 9999-9999");
   $("#CelularCredenciado").mask("(99) 9 9999-9999");


});
