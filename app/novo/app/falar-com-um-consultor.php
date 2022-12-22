<!doctype html>
<html>
<head>
 
</script>
<title> Fale com um consultor Prover Odonto </title>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"           content="O melhor em saúde bucal para você e sua família, sem coparticipação, sem burocracia com o valor que cabe no seu bolso."/>
  <meta name="author"                content="Marketing Prover Odonto"/>
  <meta name="keywords"              content="index, odontologia, dentistas, consultas, Diagnósticos bucais, urgência, emergência, odontopediatria, radiologia, dentística, campo grande, dourados, ivinhema, bonito, MS"/>
  <meta name="robots"                content="index, follow" />

  <meta property="og:site_name"    content="Fale com um consultor Prover Odonto">
  <meta property="og:url"          content="<?= BASE ?>" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="Fale com um consultor Prover Odonto" />
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
    <section id = "fale-com-um-consultor" class = "fundo-branco">
      <div class="container-fluid " style = "">
          <div class="row ">

              <div class="col-md-6 fundo-azul">
                  <div class="row">
                    <div class="col-md-2"></div> 
                    <div class="col-md-9">
                        <div class="pt-5 ">
                          <h1 class = "fonte-semi-bold cor-azul-fraco display-4">Ficou com dúvidas?</h1>
                          <p class = "fonte-24">Fale com um consultor Prover Odonto, para tirar suas dúvidas! Preencha o formulário que entraremos em contato com você.</p>
                        </div>

                        <div class = "img-ronei">
                            <img src="<?= BASE_IMG ?>extra/fale-com-um-consultor-ronei.png" class="img-fluid" style = "">
                        </div>
                    </div> 
                  </div> 
              </div>

             <div class="col-md-6 fundo-branco">
                <div class="row">
                  <div class="col-md-1">
                    
                  </div>
                  <div class="col-md-9">
                    <form id = "faleComConsultor" method="post"  class="pt-5 pb-3 form-principal">
                        <div class="row pt-5">
                            <div class="form-group col">
                                <label for="NomeConsultor">Nome completo <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="text" name = "NomeConsultor" class="form-control" id="NomeConsultor" required maxlength="30" minlength="5">
                            </div>
                        </div>

                        <div class="row ">
                            <div class="form-group col">
                                <label for="emailConsultor">E-mail<span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="email" name = "emailConsultor" class="form-control" id="emailConsultor" required maxlength="50" minlength="5">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-12 col-md">
                                <label for="celularConsultor">Celular <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="phone" name="celularConsultor" class="form-control" id="celularConsultor" required maxlength="60" minlength="5">
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-12 col-md">
                                <label for="cidadeConsultor">Cidade <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="text" name="cidadeConsultor" class="form-control" id="cidadeConsultor" required maxlength="60" minlength="5">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col mt-2">
                                <label for="assuntoConsultor">Qual o plano da sua dúvida/interesse? <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                  <select class="custom-select" name="assuntoConsultor" id="assuntoConsultor" style = "width: 100%;" required>
                                    <option value =""></option>
                                    <option value="para mim">Para mim</option>
                                    <option value="para a familia">Para a família</option>
                                    <option value="para empresa">Para empresa</option>
                                    <option value="colocar agredados">Colocar agregados</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                              <label for="duvidaConsultor">Qual a sua dúvida? <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                              <textarea class="form-control" name="duvidaConsultor" id="duvidaConsultor" rows="5" maxlength="500" minlength="30" required></textarea>
                            </div>                    
                        </div>
                        
                        <div class="row mt-4">
                            <div class="form-group col">
                                Adicionar não sou um robo.
                            </div>
                            <div class="form-group col--3">
                                <button type="submit" class="btn botao-azul">Solicitar contato</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="col-md-1">
                    
                  </div>
                </div>

                <div id = "repostas" class= "repostas"></div> 

             </div>
          </div>
      </div>
    </section>

   <?php require "components/footer.php"; ?>
   
  <script src="<?= BASE_JS ?>jquery.js"></script>
  <script src="<?= BASE ?>app/aplicacao/aplicacao.js"></script>
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>jquery.mask.min.js"></script>
  <script src="<?= BASE_JS ?>estilo.js"></script>

</body>
</html>
