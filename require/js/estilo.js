$(document).ready(function(){

  const cookieBox = document.querySelector(".cookies"),
    acceptBtn = cookieBox.querySelector("button");
    acceptBtn.onclick = ()=>{
      //configurando cookie por 1 mês, após um mês ele expirará automaticamente
      document.cookie = "ProverOdonto=Site_Prover_Odonto; max-age="+60*60*24*30;
      if(document.cookie){ //se o cookie estiver definido
        cookieBox.classList.add("cookies-esconder"); 
          // setTimeout(function() {
          //   window.location.href = "#";
          // });
      }else{ //se o cookie não estiver definido, avise um erro
        alert("O cookie não pode ser definido! Desbloqueie este site da configuração de cookies do seu navegador.");
      }
    }
    let checkCookie = document.cookie.indexOf("ProverOdonto=Site_Prover_Odonto");
    checkCookie != -1 ? cookieBox.classList.add("cookies-esconder") : cookieBox.classList.remove("cookies-esconder");


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
        },

        800: {
          items:1,
          nav: false
        },

        900: {
          items:2,
          nav: false
        }
    }
  });

     // JavaScript Document
  var owl = $('#planos-po-on .owl-carousel');
  owl.owlCarousel({
    nav: false,
    navText: [
        '<img src="../require/img/extra/left.png" alt="Seta esquerda" class="img-fluid" width="35">',
        '<img src="../require/img/extra/right.png" alt="Seta direita" class="img-fluid"  width="35">'
    ],
    navContainer: '#planos-po-on  .custom-nav',
    loop: false,
    margin: 10,
    dots: false,
    autoWidth:true,
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
        },

        1000: {
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
