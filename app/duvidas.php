<!doctype html>
<html lang="pt-br">
<head>

<title>Está com dúvida? Entenda como funciona plano Prover Odonto</title>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="description"           content="Veja algumas das perguntas frequentes que fazem sobre o plano odontológico Prover Odonto. "/> 
  <meta name="keywords"              content="ajuda, dúvidas, perguntas frequentes, quem pode contratar?, agregados, dependentes, valores, pagamento, forma de pagamento, reajuste, coberturas, plano odontológico prover odonto, prover odonto, prover, odonto, dental, dente, dente de leite, crianças, odontologia, odontológico, canal, tratamento de canal, aparelhos, colocando aparelhos, extrações de dentes, dentes do siso, siso, plano odontológico, plano odontológico familiar, plano odontológico individual, plano odontológico para empresas, plano empresarial, plano familiar, plano individual, dentistas, clínica odontológica, consultas, urgência, emergência,  radiologia, odontopediatria, periodontia, tratamento de gengiva, endodontia, tratamento de canal, dentística, restaurações, cirurgias, rede de dentista, Dourados, Campo Grande, Ivinhema, Nova Andradina, Angélica, Aquidauana, Bonito, index, MS, Mato Grosso do Sul"/>
  <meta name="robots"                content="index, follow" />

  <meta property="og:locale"       content="pt_BR">
  <meta property="og:site_name"    content="Prover Odonto - Plano Odontológico">
  <meta property="og:url"          content="<?= BASE ?>" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="Está com dúvida? Entenda o Prover Odonto | Prover Odonto" />
  <meta property="og:description"  content="Veja algumas das perguntas frequentes que fazem sobre o plano odontológico Prover Odonto." />
  <meta property="og:image"        content="<?= BASE_IMG ?>logo/logo_prover_odonto.png" />
  <meta name="author"              content="Felipe Goncalves - l.felipe.m.goncalves@gmail.com | Marketing Grupo Prover"/>
  

  <link rel="canonical" href="<?= BASE ?>tire-suas-duvidas">

  <link rel="icon" href="<?= BASE_IMG ?>logo/logo_prover_odonto_icon.png">
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>animate.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.responsivo.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>owl.carousel.min.css">
  
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JGL33EVGE2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-JGL33EVGE2');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1146341286102180');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1146341286102180&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

</head>
<body >
    <?php require "components/header.php"; ?>
    <section id = "fale-conosco" class = "fundo-azul">
      <div class="container pt-4" style = "">
          <div class="row ">
              <div class="col-md-6 wow animate__animated animate__fadeIn" data-wow-delay="0.5s">
                <div class="texto-principal texto-centro-mobile pt-5 pb-5">
                  <h1 class = "negrito mb-4 mt-3 display-4">Dúvidas?</h1>
                  <p class = "fonte-24 espaco-texto">Veja algumas das perguntas frequentes que fazem para nós. Caso não encontre o que você procura. Fale com um consultor.</p>
                  <!-- <p class = "mt-2">
                      <a href="<?= BASE ?>falar-com-um-consultor" class = "botao-branco-menor">Falar com consultor</a>
                  </p> -->
                </div>
             </div>
             <div class="col-md-1"></div>
             <div class="col-md">
                <div class="texto-principal wow animate__animated animate__fadeInRight" data-wow-delay="0.5s">
                  <img src="<?= BASE_IMG ?>extra/fale-conosco.png" class="img-fluid" style = "">
                </div>
             </div>
          </div>
      </div>
      </div>
    </section>

    <section id = "duvidas" class = "fundo-branco pt-5 pb-5">

        <?php
            $selecionarTopico =  "SELECT * FROM ajuda_assunto WHERE status = 'Publicado'";
            $consultaTopico = $conexao -> prepare($selecionarTopico);
            $consultaTopico -> execute();

            if(($consultaTopico) AND ($consultaTopico -> rowCount () != 0)){
                
                while($dadosTopico = $consultaTopico -> fetch(PDO::FETCH_ASSOC)){
                
        ?>
      <div class="container" style = "">

        

        <!-- lista duvidas -->
          <div class="row pb-5 mt-5 wow animate__animated animate__fadeIn" data-wow-delay="0.5s" style = "border-bottom: 2px solid #ededed;">
            <div class="col-md-4">
                <h2 class = "negrito"><?= $dadosTopico['assunto']; ?></h2>
            </div>

            <div class="col-md-8">
                
                <?php 

                    $selecioneArtigo = "SELECT * FROM ajuda WHERE status = 'Publicado' AND assunto = '". $dadosTopico['id'] ."'";
                    $consultaArtigo = $conexao -> prepare($selecioneArtigo);
                    $consultaArtigo -> execute();

                    if(($consultaArtigo) AND ($consultaArtigo -> rowCount() != 0)){

                        while($dadosArtigo = $consultaArtigo -> fetch(PDO::FETCH_ASSOC)){


                        

                ?>
                        <div class="accordion" id="accordionDuvidas<?= $dadosArtigo['id'] ?>">
                            <div class="card mb-3">
                              <div class="card-header" id="heading<?= $dadosArtigo['id'] ?>">
                                <h2 class="mb-0">
                                  <a class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $dadosArtigo['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $dadosArtigo['id'] ?>">
                                    <?= $dadosArtigo['titulo'] ?>
                                    <span class = "fonte-14 texto-negrito cor-azul float-right mt-1">&#9660;</span>
                                  </a>
                                </h2>
                            </div>

                              <div id="collapse<?= $dadosArtigo['id'] ?>" class="collapse" aria-labelledby="heading<?= $dadosArtigo['id'] ?>" data-parent="#accordionDuvidas<?= $dadosArtigo['id'] ?>">
                                <div class="card-body">

                                  <?= $dadosArtigo['conteudo'] ?>

                                </div>
                              </div>
                            </div>               

                        </div> <!-- acordion -->
                        <?php }} ?>
            </div>   
          </div>
          <!-- lista duvidas - fim -->

      </div>
      <?php }} ?>
    </section>
                



   <?php require "components/footer.php"; ?>
   
  <script src="<?= BASE_JS ?>jquery.js"></script>
  <script src="<?= BASE ?>app/aplicacao/aplicacao.js"></script>
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>jquery.mask.min.js"></script>
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
