<!doctype html>
<html>
<head>
 
</script>
<title> Encontre um dentista Prover Odonto</title>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"           content="O melhor em saúde bucal para você e sua família, sem coparticipação, sem burocracia com o valor que cabe no seu bolso."/>
  <meta name="author"                content="Marketing Prover Odonto"/>
  <meta name="keywords"              content="index, odontologia, dentistas, consultas, Diagnósticos bucais, urgência, emergência, odontopediatria, radiologia, dentística, campo grande, dourados, ivinhema, bonito, MS"/>
  <meta name="robots"                content="index, follow" />

  <meta property="og:site_name"    content="Prover Odonto - O plano odontológico perfeito para você e sua família.">
  <meta property="og:url"          content="<?= BASE ?>" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="Encontre um dentista | Prover Odonto" />
  <meta property="og:description"  content="O melhor em saúde bucal para você e sua família, sem coparticipação, sem burocracia com o valor que cabe no seu bolso." />
  <meta property="og:image"        content="<?= BASE_IMG ?>logo/logo_prover_odonto.png" />
  <link rel="icon" href="<?= BASE_IMG ?>logo/logo_prover_odonto_icon.png">
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.responsivo.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>owl.carousel.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>animate.min.css">
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JGL33EVGE2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-JGL33EVGE2');
    </script>
</head>
<body class = "fundo-azul-fraco" >
    <?php require "components/header.php"; ?>
<div class="alert alert-dismissible fade show fundo-azul-fraco pt-4 pb-4 para-mobile" role="alert">
      <div class="container-fluid">
              <div class="row">
                  <div class="col-3">

                    <img src="<?= BASE_IMG ?>extra/icon-app.png" class = "m-auto" style = "border-radius: 10px; width: 53px;">
                  </div>
                  <div class="col">
                   <p class="fonte-18 negrito cor-azul">Baixe o aplicativo Prover Odonto!</p>
                   
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-12">
                    Se você já é cliente Prover Odonto, baixe o aplicativo para visualizar melhor a rede credenciada e muito mais.<br><br>
                      <a href="<?= BASE ?>aplicativo-meu-prover-odonto" class ="botao-azul-menor">Baixar agora</a>                      
                </div>
              </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
      </div>
  </div>

     <section id = "encontre-um-credenciado" class = "">
      <div class="container pt-5 pb-5" style = "">
          <div class="row pt-3 pb-5">
              <div class="col-md-5 wow animate__animated animate__fadeInLeft" data-wow-delay="0.1s">
                <div class="texto-principal pt-5 mb-5 pb-5">
                  <!-- <h1 class = "negrito mb-4 display-4 cor-azul"></h1> -->
                  <h1 class = "fonte-semi-bold cor-azul display-4">Encontre um dentista perto de você!</h1>
                  <p class = "fonte-24">Acesse a nossa rede credenciada para encontrar um dentista ou uma clínica especializada mais próxima de você.</p>

                  <div class="row">
                      <div class="col-12 col-md-8">
                        <p class = "mt-5">
                            <a href="<?= BASE ?>rede-credenciada/busque-um-dentista/profissionais" class ="botao-azul">Acessar Rede Credenciada</a>
                        </p>
                      </div>
                  </div>
                  
                </div>
             </div>

              <div class="col-md-7 wow animate__animated animate__fadeInRight" data-wow-delay="0.1s">
               <img src="<?= BASE_IMG ?>extra/fundo-rede-credenciada.png" class="img-fluid" style = "margin-top: -10px;">
             </div>
          </div>
      </div>
      </div>
    </section>


    <?php require "components/footer.php"; ?>
  <script src="<?= BASE_JS ?>jquery.js"></script>
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>estilo.js"></script>
  <script src="<?= BASE_JS ?>wow.js"></script>
  <script>
   var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
          // the callback is fired every time an animation is started
          // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null,    // optional scroll container selector, otherwise use window,
        resetAnimation: true,     // reset animation on end (default is true)
      }
    );
    wow.init();
  </script>


</body>
</html>
