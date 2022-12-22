<!doctype html>
<html>
<head>
 
</script>
<title> Baixe o APP Meu Prover Odonto </title>
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
  <meta property="og:title"        content="Baixe o APP Meu Prover Odonto" />
  <meta property="og:description"  content="O melhor em saúde bucal para você e sua família, sem coparticipação, sem burocracia com o valor que cabe no seu bolso." />
  <meta property="og:image"        content="<?= BASE_IMG ?>logo/logo_prover_odonto.png" />
  <link rel="icon" href="<?= BASE_IMG ?>logo/logo_prover_odonto_icon.png">
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
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
</head>
<body >
    <?php require "components/header.php"; ?>

    <section id = "app-pf" class = "fundo-branco text-center">
      <div class="container pt-5">
          <div class="row">
            <div class="col">
               <h1 class = "negrito mb-4 display-4 cor-azul">Baixe o aplicativo<br> <span class = ""> Prover Odonto</span></h1>
            </div>
          </div>
          <div class="row">
             <div class="col-md-5 m-auto">
                <div class="texto-principal ">
                  <img src="<?= BASE_IMG ?>extra/app-pf-ronei.png" class="img-fluid" style = "">
                </div>
             </div>
            
          </div>
      </div>
      </div>
    </section>
    <section id = "fale-conosco" class = "">
      <div class="container pt-5 pb-5" style = "">
          <div class="row pt-5">
            <div class="col-md-1"></div>
             <div class="col-md">
                <div class="texto-principal ">
                  <img src="<?= BASE_IMG ?>extra/app-pf.png" class="m-auto img-fluid para-mobile" style = "width: 200px;">
                  <img src="<?= BASE_IMG ?>extra/app-pf.png" class="img-fluid para-descktop" style = "">
                </div>
             </div>
             <div class="col-md-1"></div>
              <div class="col-md-5">
                <div class="texto-principal  pt-5 pb-5">
                  <h1 class = "negrito mb-4 display-4">Baixe o aplicativo <br>Meu Prover Odonto</h1>
                  <p class = "fonte-18">Com o aplicativo Meu Prover Odonto, você tem acesso rápido
e fácil com toda a comodidade de onde você estiver</p>
                  
                  <p class = "fonte-18">- Dados cadastrais</p>
                  <p class = "fonte-18">- Rede Credenciada completa</p>
                  <p class = "fonte-18">- Carteirinha Virtual</p>
                  <p class = "fonte-18">- Acompanhamento de Utilização de Serviços</p>
                  <p class = "fonte-18">- Canais de atendimentos</p>

                  <div class="row pt-2 pb-5">
                      <div class="col-md-6">
                          <a href="https://play.google.com/store/apps/details?id=br.com.odontosfera.proverodonto" target="_blank">
                              <img src="<?= BASE_IMG ?>extra/google-play.png" width = "200px" alt="">
                          </a>
                      </div>
                      <div class="col-md-6">
                          <a href="https://apps.apple.com/br/app/prover-odonto/id1556482392" target="_blank">
                              <img src="<?= BASE_IMG ?>extra/apple-store.png" width = "200px" alt="">
                          </a>
                      </div>
                  </div>

                </div>
             </div>
             <div class="col-md-1"></div>
            
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

</body>
</html>
