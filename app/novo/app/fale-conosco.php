<!doctype html>
<html>
<head>
 
</script>
<title>Fale conosco | Prover Odonto </title>
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
  <meta property="og:title"        content="Fale conosco | Prover Odonto" />
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
    <section id = "fale-conosco" class = "fundo-azul">
      <div class="container pt-3" style = "">
          <div class="row ">
              <div class="col-md-6">
                <div class="texto-principal  pt-5 pb-5">
                  <h1 class = "negrito mb-4 display-4">Fale conosco</h1>
                  <p class = "fonte-24">Como podemos ajudar você? Fale com a gente! </p>
                </div>
             </div>
             <div class="col-md-1"></div>
             <div class="col-md">
                <div class="texto-principal ">
                  <img src="<?= BASE_IMG ?>extra/fale-conosco.png" class="img-fluid" style = "">
                </div>
             </div>
          </div>
      </div>
      </div>
    </section>

  <section id = "" class = "fundo-branco pt-5">
      <div class="container" style = "">
          <div class="row ">

             <div class="col-md fundo-branco">
                <div class="row">
                  <div class="col-md-5 pt-5 pb-5">                  

                    <div class="atalho-central text-center pb-5 mb-4" >                
                        <img src="<?= BASE_IMG ?>extra/central-atendimento.svg" width = "100"><br><br>
                        <span class = "cor-preto">Central de atendimento</span>
                        <h1 class = "negrito cor-azul">0800 002 9211</h1>
                        <br>
                        <a href="tel:08000029211" class = "botao-azul"> Ligar agora &#10140; </a>             
                    </div>

                    
                    <p class = "fonte-18 texto-centro-mobile"><span class = "negrito">Atendimento:</span> Segunda à Sexta-feira, das 07:00 às 17:30 horas.</p>
                  </div>

                  <div class="col-md-1"></div>

                  <div class="col-md-6">
                    <form  id="contato" method="post" class="pt-5 mb-5 pb-5 form-principal">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nomeContato">Nome completo <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="text" name="nomeContato" class="form-control" id="nomeContato" required maxlength="30" minlength="3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="emailContato">E-mail <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="email" name="emailContato" class="form-control" id="emailContato" required maxlength="60" minlength="5">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-12 col-md-12">
                                <label for="foneContato">Celular <span class = "fonte-10 fonte-regular" >(Obrigatório)</span></label>
                                <input type="phone" name="foneContato" class="form-control" id="foneContato" required minlength="8" maxlength="9">
                            </div>

                            <div class="form-group col-12 col-md-12">
                                <label for="cidadeContato">Cidade <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="text" name="cidadeContato" class="form-control" id="cidadeContato" required maxlength="60" minlength="5">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col mt-2">
                                <label for="assuntoContato">Departamento no qual você quer falar <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                  <select class="custom-select" name="assuntoContato" id="assuntoContato" style = "width: 100%;" required>
                                    <option value =""></option>
                                    <option value="Comercial">Comercial/produtos</option>
                                    <option value="Financeiro">Financeiro</option>
                                    <option value="Central de atendimento">Suporte ao cliente</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Outros">Outros</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                              <label for="mensagemContato">Como podemos ajudar? <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                              <textarea class="form-control" name="mensagemContato" id="mensagemContato" rows="5" maxlength="500" minlength="30" required></textarea>
                              <span class = "fig"></span>
                            </div>                    
                        </div>
                        
                        <div class="row mt-4">
                            <div class="form-group col">
                                Adicionar não sou um robo.
                            </div>
                            <div class="form-group col--3">
                                <button type="submit" type="submit" class="btn botao-azul">Enviar contato</button>
                            </div>
                        </div>
                    </form>
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
