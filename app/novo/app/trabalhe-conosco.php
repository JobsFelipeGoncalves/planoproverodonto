<!doctype html>
<html>
<head>
 
</script>
<title> Trabalhe conosco - Prover Odonto </title>
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
  <meta property="og:title"        content="Fale conosco - Prover Odonto " />
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
    <section id = "fale-conosco" class = "fundo-amarelo" >
      <div class="container " style = "">
          <div class="row pt-4">
              <div class="col-md-7 pt-5">
                <div class="texto-principal pb-5">
                  <h1 class = "negrito mb-4 display-4">Trabalhe conosco</h1>
                  <p class = "fonte-24">Venha fazer parte da nossa equipe.</p>
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

                  <div class="col-md-2"></div>

                  <div class="col-md-8">
                    <form id = "trabalhe-conosco" class="pt-5 mb-5 pb-5 form-principal"  enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nomeJob">Nome completo <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="text" name = "nomeJob" class="form-control" id="nomeJob" required maxlength="30" minlength="5">
                            </div>
                        </div>

                        <div class="row">
                           <div class="form-group col-12">
                                <label for="emailJob">E-mail <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="email" name = "emailJob" class="form-control" id="emailJob" required required maxlength="60" minlength="5">
                            </div>
                        </div>

                        <div class="row">                            

                            <div class="form-group col-12 col-md-6">
                                <label for="celularJob">Celular <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="phone" class="form-control" name = "foneJob" id="celularJob" required minlength="8" maxlength="9">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="cidadeJob">Cidade <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="text" name = "cidadeJob" class="form-control" id="cidadeJob" required maxlength="30" minlength="5">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col">
                              <label for="sobreJob">Descreva sobre você <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                              <textarea class="form-control" id="sobreJob" name="sobreJob" rows="5" maxlength="800" minlength="30" required></textarea >
                            </div>                    
                        </div>

                        <div class="row">
                            <div class="col-md pb-2">
                                <hr>
                             </div>
                        </div>

                         <div class="row">
                            <div class="form-group col mt-2">
                                <label for="setorJob">Setor do seu enteresse <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                  <select class="custom-select" name = "setorJob" id="setorJob" style = "width: 100%;" required>
                                    <option></option>
                                    <option value="Comercial">Comercial - Vendas/representante</option>
                                    <option value="Central de atendimento">Relacionamento - Central de atendimento</option>
                                    <option value="Administratico">Administrativo</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Outros">Outros</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md form-group">
                                <label for="arquivoJob">Envie seu currículo <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                <input type="file" name = "arquivo" required class="form-control-file" id="arquivoJob">
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

                  <div class="col-md-2"></div>
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
