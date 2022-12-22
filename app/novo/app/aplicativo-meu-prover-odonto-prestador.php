<!doctype html>
<html>
<head>
 
</script>
<title> Aplicativo Prover Odonto Prestadores </title>
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
  <meta property="og:title"        content="Aplicativo Prover Odonto Prestadores " />
  <meta property="og:description"  content="O melhor em saúde bucal para você e sua família, sem coparticipação, sem burocracia com o valor que cabe no seu bolso." />
  <meta property="og:image"        content="<?= BASE_IMG ?>logo/logo_prover_odonto_icon.png" />
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

    <section id = "aplicativo-prestador" class="pt-5 ">
        <div class="container pt-5 pb-5">
            <div class="row mb-2 mt-2">

                <div class="col-1"><!-- nulo --></div>

                <div class="col-md-4 ">
                    <img src="<?= BASE_IMG ?>extra/1501.png" width = "300px" class=" img-fluid para-descktop" style = "margin-top: -100px;">                    
                    <img src="<?= BASE_IMG ?>extra/1501.png" width = "150px" class="m-auto img-fluid para-mobile">
                </div>

                <div class="col-1"><!-- nulo --></div>

                <div class="col-md-5 mt-2 pt-2">
                    <h1 class = "mt-3 mb-3 negrito">Aplicativo Prover Odonto: Prestador</h1>
                    <p class = "fonte-18 mt-5">Com o aplicativo PROVER ODONTO PRESTADOR, você tem a facilidade e agilidade na hora de fazer lançamentos dos procedimentos realizados.</p>

                    <div class="row pt-2">
                      <div class="col-md-6">
                          <a href="https://play.google.com/store/apps/details?id=br.com.odontosfera.proverodontoprestador" target="_blank">
                              <img src="<?= BASE_IMG ?>extra/google-play.png" width = "180px" alt="">
                          </a>
                      </div>
                      <div class="col-md-6">
                          <a href="https://apps.apple.com/br/app/prover-odonto-prestador/id1557940948" target="_blank">
                              <img src="<?= BASE_IMG ?>extra/apple-store.png" width = "180px" alt="">
                          </a>
                      </div>
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

</body>
</html>
