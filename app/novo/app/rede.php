<!doctype html>
<html>
<head>
 
</script>
<title> Conheça os profissionais credenciados do Prover Odonto </title>
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
  <meta property="og:title"        content="Conheça os profissionais credenciados do Prover Odonto" />
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
    


     <section id = "rede-dentista" >
      <div class="container pt-5 pb-5">
          <div class="row ">
              <div class="col-md-6">
                <div class="texto-principal">
                  <h3 class = "fonte-semi-bold cor-azul ">Rede Credenciada</h3>                  
                </div>
             </div>
          </div>
      </div>
    </section>
      
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

    <div class="container-fluid fundo-branco">
      <div class="row">
        <div class="col">
          
            <iframe src="https://rede.odontosfera.com.br/RedeCredenciada.aspx?Operadora=422533" style = "width: 100%; height: 100vh; padding-top: 40px; border: 0px;"></iframe>

        </div>
      </div>
    </div>


    <?php require "components/footer.php"; ?>
  <script src="<?= BASE_JS ?>jquery.js"></script>
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>estilo.js"></script>


</body>
</html>
