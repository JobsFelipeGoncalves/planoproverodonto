<!doctype html>
<html>
<head>
 
</script>
  <title>Prover Odonto - 1ª Operadora Odontológica do Mato Grosso do Sul</title>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"           content="O melhor em saúde bucal para você e sua família, a partir de R$ 39,90. Sem coparticipação, sem burocracia com o valor que cabe no seu bolso."/>
  <meta name="author"                content="Marketing Prover Odonto"/>
  <meta name="keywords"              content="index, odontologia, dentistas, consultas, Diagnósticos bucais, urgência, emergência, odontopediatria, radiologia, dentística, campo grande, dourados, ivinhema, bonito, MS"/>
  <meta name="robots"                content="index, follow" />

  <meta property="og:site_name"    content="Prover Odonto - O plano odontológico perfeito para você e sua família, a partir de R$ 39,90.">
  <meta property="og:url"          content="<?= BASE ?>" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="Prover Odonto - O plano odontológico perfeito para você e sua família." />
  <meta property="og:description"  content="O melhor em saúde bucal para você e sua família, a partir de R$ 39,90. Sem coparticipação, sem burocracia com o valor que cabe no seu bolso." />
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


<section id = "destaque" class = "">
  <div class="owl-carousel owl-theme">
    <div class="item">
        <div class="destaque-item" style = "background-image: url('<?= BASE_IMG ?>fundo/banner_prover_odonto_novo.png'); background-color: #2897cf;">
            <div class="container pt-5 pb-5" >
                <div class="row  pb-5 mt-5 mb-5">
                    <div class="col-sm-12  col-md-5">
                      <div class="texto-principal">
                        <h1 class = "negrito mb-4 display-4 cor-branco">Mais motivos para <b>Sorrir!</b></h1>
                        <h5 class = "fonte-28 cor-azul-fraco">Conheça o Dental Life! O plano odontológico  perfeito para você e sua família!</h5>
                        <p class = "mt-5">
                            <div class="row">
                                <div class="col">
                                  <p class = "">
                                      <a href="<?= BASE ?>planos/para-voce" class ="botao-amarelo">Quero saber mais  &#10140;</a>
                                  </p>
                                </div>
                            </div>
                        </p>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <div class="item">
        <div class="destaque-item" style = "background-image: url('<?= BASE_IMG ?>fundo/banner_prover_odonto_empresa.png'); background-color: #2d9ed7;">
            <div class="container pt-5 pb-5" >
                <div class="row  pb-5 mt-5 mb-5">
                    <div class="col-md-6">
                      <div class="texto-principal">
                        <h1 class = "negrito mb-4 display-4 cor-branco">Sua empresa mais valorizada! </h1>
                        <h5 class = "fonte-28 cor-azul-fraco">Conheça o Business Dental Life, leve mais qualidade de vida para sua empresa e seus colaboradores.</h5>
                        <p class = "mt-5">
                            <div class="row">
                                <div class="col">
                                  <p class = "">
                                      <a href="<?= BASE ?>planos/para-empresas" class ="botao-amarelo">Quero saber mais  &#10140;</a>
                                  </p>
                                </div>
                            </div>
                        </p>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <div class="item">
        <div class="destaque-item" style = "background-image: url('<?= BASE_IMG ?>fundo/banner_prover_odonto_aplicativo.png'); background-color: #b8cfff;">
            <div class="container pt-5 pb-5" >
                <div class="row  pb-5 mt-5 mb-5">
                    <div class="col-md-5">
                      <div class="texto-principal">
                        <h1 class = "negrito mb-4 display-4 cor-azul">Aplicativo Prover Odonto </h1>
                        <h5 class = "fonte-28 cor-preto">Baixe o aplicativo Prover Odonto e tenha a carterinha virtual sempre com você.</h5>
                        <p class = "mt-5">
                            <div class="row">
                                <div class="col">
                                  <p class = "">
                                      <a href="<?= BASE ?>aplicativo-meu-prover-odonto" class ="botao-azul">Baixar agora  &#10140;</a>
                                  </p>
                                </div>
                            </div>
                        </p>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class = " owl-theme">
    <div class="owl-controls"><div class="custom-nav owl-nav"></div></div>
  </div><!-- owl-theme-->
</section>

    <section id = "atalho-index" class = "fundo-azul-fraco pb-5 pt-5 text-center">
      <div class="container">
        <div class="row">

          <div class="col-md-4 mb-3">
            <a href="https://cliente.odontosfera.com.br/login.aspx?operadora=422533" target="_blank">
              <div class="atalho-index-box" >                
                  <img src="<?= BASE_IMG ?>extra/codigos-de-barra.png" width = "100"><br>
                  2ª via do boleto &#10140;             
              </div>
            </a>            
          </div>

          <div class="col-md-4 mb-3">
            <a href="<?= BASE ?>rede-credenciada/busque-um-dentista" >
              <div class="atalho-index-box" >                
                  <img src="<?= BASE_IMG ?>extra/rede-credenciada-index.png" width = "100"><br>
                  Rede credenciada  &#10140;             
              </div>
            </a>            
          </div>

          <div class="col-md-4 mb-3">
            <a href="<?= BASE ?>falar-com-um-consultor" >
              <div class="atalho-index-box" >                
                  <img src="<?= BASE_IMG ?>extra/fale-com-um-consultor.png" width = "100"><br>
                  Falar com um consultor  &#10140;             
              </div>
            </a>            
          </div>

        </div>
      </div>
    </section>

    <section id = "pq-p-odonto" class = "fundo-branco">
      <div class="container pt-5 ">
        <div class="row pt-5  mt-3 mb-3 text-center">
          <div class="col-md">
            <h1 class = " fonte-bold mb-4 cor-azul display-4">Mais motivos para sorrir!</h1>
          </div>
        </div>
        <div class="row texto-centro-mobile">
          <div class="col-md-6 pt-5" >
               
              <div class="row mb-4">
                <div class="col-md-1 mb-3"><img class ="" src = "<?= BASE_IMG ?>extra/check.svg" width = "37px"></div>
                <div class="col-md-10 fonte-18">Ampla rede credenciada em todo o estado do Mato Grosso do Sul</div>
              </div>

              <div class="row mb-4">
                <div class="col-md-1 mb-3"><img src = "<?= BASE_IMG ?>extra/check.svg" width = "37px"></div>
                <div class="col-md-10 fonte-18">Liberdade para escolher o dentista credenciado na especialidade desejada;</div>
              </div>

              <div class="row mb-4">
                <div class="col-md-1 mb-3"><img src = "<?= BASE_IMG ?>extra/check.svg" width = "37px"></div>
                <div class="col-md-10 fonte-18">Agendamento direto no consultório do profissional credenciado, sem a necessidade de retirar guias e realizar perícias;</div>
              </div>

          </div>
          <div class="col-md-6 pt-5 pb-5" >

              <div class="row  mb-4">
                <div class="col-md-1 mb-3"><img src = "<?= BASE_IMG ?>extra/check.svg" width = "37px"></div>
                <div class="col-md-10 fonte-18">Atendimentos de urgências e emergências;</div>
              </div>

              <div class="row mb-4">
                <div class="col-md-1 mb-3"><img src = "<?= BASE_IMG ?>extra/check.svg" width = "37px"></div>
                <div class="col-md-10 fonte-18">Processos rápidos e sem burocracia de aprovação dos tratamentos;</div>
              </div>

              <div class="row mb-4">
                <div class="col-md-1 mb-3"><img src = "<?= BASE_IMG ?>extra/check.svg" width = "37px"></div>
                <div class="col-md-10 fonte-18">Inclusão de familiares sem limite de idade;</div>
              </div>

              <div class="row mb-4">
                <div class="col-md-1 mb-3"><img src = "<?= BASE_IMG ?>extra/check.svg" width = "37px"></div>
                <div class="col-md-10 fonte-18">Central de atendimento;</div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <section id = "planos-video" class = "">
      <div class="container pt-5 ">
        <div class="row pt-5  text-center">
          <div class="col-md">
                <video poster="<?= BASE_IMG ?>extra/video_prover_odonto.png" controls>
                  <source src="<?= BASE_VIDEO ?>prover_odonto.mp4" type="video/mp4">
                  <source src="<?= BASE_VIDEO ?>prover_odonto.ogg" type="video/ogg">
                    Seu navegador não suporta o vídeo :(
                </video>
          </div>
        </div>
      </div>
    </section>

    <section id = "planos" class = "fundo-azul-fraco pb-3">
      <div class="container pb-5">
        <div class="row pt-3 text-center">
          <div class="col-md pt-5">
              <h1 class = " fonte-bold mb-4 cor-azul display-4">Escolha o plano ideal, escolha <br>Prover Odonto!</h1>
              <h3>Temos os planos perfeito para você, sua família ou empresa.</h3>
          </div>
        </div>
        <div class="row pt-3"> 


          <div class="col-md-2"></div>

          <div class="col-md-8 pt-5 pb-5">
            <div class="owl-carousel owl-theme">
              <div class="item">

                  <div class="card planos-box planos-box-pf text-center" style = "">
                    <div class="card-body">
                      <span class="card-text fonte-12 cor-cinza-escuro">PESSOA FÍSICA</span>
                      <img src="<?= BASE_IMG ?>logo/prover_odonto_dental_life.png" width = "200" class="img-fluid">

                      <h2 class="card-title negrito cor-azul">R$ 39,90 <sub class = "italico normal fonte-18">/mês</sub></h2>
                      <p class="card-text fonte-12 italico">*Valor mensal por pessoa</p>
                      <ul class="list-group text-left list-group-flush">
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Consultas e Diagnóstico </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Urgência e Emergência </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Prevenção da Saúde Bucal </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Dentística <span class = "fonte-12 italico">(Restaurações)</span></li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Odontopediatria <span class = "fonte-12 italico">(Para crianças)</span></li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Endodontia <span class = "fonte-12 italico">(Tratamento de canal)</span> </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Periodontia <span class = "fonte-12 italico">(Tratamento de gengiva)</span> </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Radiologia</li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Cirurgias </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Inclusão de familiares (Opcional)</li>
                      </ul>

                    </div>
                    <div class="card-body mt-3">
                        <a href="https://marketplace.odontosfera.com.br/Produto/Comprar/YzNlOTc3OWQtNmQwMC00ZmJmLWE0NzgtMjExMjAwZjc5YjQy" target = "_blank" class = "botao-azul">Solicitar plano</a>
                        <BR><BR><BR>
                        <a href="<?= BASE ?>planos/para-voce" class = "botao-nulo">Saiba mais &#10140;</a>
                    </div>
                  </div>

              </div>
              <div class="item">
                <div class="card planos-box planos-box-pj text-center" >
                  <div class="card-body ">
                     <span class="card-text fonte-12 cor-cinza-escuro">PESSOA JURÍDICA</span>
                      <img src="<?= BASE_IMG ?>logo/prover_odonto_business_dental_life.png" width = "180" class="img-fluid">

                      <h2 class="card-title negrito cor-amarelo">R$ 24,90 <sub class = "italico normal fonte-18">/mês</sub></h2>
                      <p class="card-text fonte-12 italico">*Valor mensal por pessoa</p>
                      <ul class="list-group text-left list-group-flush">
                       <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Consultas e Diagnóstico </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Urgência e Emergência </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Prevenção da Saúde Bucal </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Dentística <span class = "fonte-12 italico">(Restaurações)</span></li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Odontopediatria <span class = "fonte-12 italico">(Para crianças)</span></li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Endodontia <span class = "fonte-12 italico">(Tratamento de canal)</span> </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Periodontia <span class = "fonte-12 italico">(Tratamento de gengiva)</span> </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Radiologia</li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Cirurgias </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Inclusão de familiares (Opcional) </li>
                        <li class="list-group-item"><span class = "negrito cor-verde fonte-18">&#10004;</span> Desconto em folha (Opcional) </li>
                      </ul>
                      </ul>
                    </div>
                    <div class="card-body mt-3">
                        <a href="https://marketplace.odontosfera.com.br/Produto/Comprar/YzNlOTc3OWQtNmQwMC00ZmJmLWE0NzgtMjExMjAwZjc5YjQy" target = "_blank" class = "botao-amarelo">Solicitar plano</a>
                        <BR><BR><BR>
                        <a href="<?= BASE ?>planos/para-empresas" class = "botao-nulo">Saiba mais &#10140;</a>
                    </div>
                </div>

              </div>
            </div>
            <div class = " owl-theme">
              <div class="owl-controls"><div class="custom-nav owl-nav"></div></div>
            </div><!-- owl-theme-->
          </div>

          <div class="col-md-2"></div>

        </div>
      </div>
    </section>

<!--     <section id = "procure-um-dentista" class = "pt-3 pb-3">
      <div class="container pt-5 pb-5">
        <div class="row mt-5 mb-5 pt-5 pb-5">
          <div class="col-md-5">
            <h1 class = "fonte-bold cor-azul mb-4 display-4">Encontre um dentista ou uma clínica.</h1>
            <h5 class = "mb-5">
              Acesse a nossa rede credenciada
              para encontrar um dentista ou uma 
              clínica especializada mais próxima
              de você.
            </h5>
            <p>
              <a href="<?= BASE ?>rede-credenciada/busque-um-dentista" class ="botao-azul">Acessar a Rede Credenciada</a>
            </p>
          </div>
        </div>
      </div>
    </section>
 -->
    <section id = "duvidas" class = "pt-5 pb-5">
      <div class="container pt-5 pb-5">        
        <div class="row m-auto pt-5 pb-5">

          <div class="col-md-5">
            <h1 class = "fonte-bold cor-azul display-4">Ainda ficou com dúvidas?</h1>   
            <p class = "fonte-18">Separamos algumas das perguntas mais frequentes para ajudar você.</p>        
          </div>
          <div class="col-md-1"></div>
          <div class="col-md">

                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            O que é carência?
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                          Carência é o tempo de espera para realizar um procedimentos após contratar o plano dontológico Prover Odonto, que podem variar de 24 horas à 180 dias.<br><br>
                          Fale com um consultor para conhecer os procedimentos que contem carências<br><br>
                          <a href="<?= BASE ?>falar-com-um-consultor" target = "_blank" class = "botao-branco-menor">Fale com um Consultor</a>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Como funciona os agendamentos de consultas?
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                          Aos adiquiri o plano Prover Odonto e cumprir as carências necessárias, o seu primeiro agendamento deverá ser feito através da nossa central de atendimento, onde você conhecerá os profissionais disponíveis na sua região. Nas futuras consultas 
                          você pode ir diretamente em nosso prestador credenciado.<br><br>
                          Central de atendimento: <a href="tel:08000029211" target = "_blank" class = "botao-linha">0800 002 9211</a> digite opção 1.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Como acessar a nossa rede credenciada?
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                          A rede credenciada é onde você encontra todos os profissionais e clínicas que atendem pelo plano Prover Odonto. <br><br>
                          Você pode acessar pelo aplicativo "Prover Odonto" disponível pela <a href = "https://apps.apple.com/br/app/prover-odonto/id1556482392" class = "botao-linha" target="_blank">Apple Store</a> ou <a href = "https://play.google.com/store/apps/details?id=br.com.odontosfera.proverodonto" class = "botao-linha" target="_blank">Google Play</a>. <br><br>
                          Outra forma é através do nosso site na aba <a href = "<?= BASE ?>rede-credenciada/busque-um-dentista" class = "botao-linha" target="_blank">Rede Credenciada</a>.
                        </div>
                      </div>
                    </div>

                  </div>

          </div>
        </div>
      </div>
    </section>

    <?php require "components/footer.php"; ?>
  <script src="<?= BASE_JS ?>jquery.js"></script>  
  <script src="<?= BASE_JS ?>estilo.js"></script>
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>

</body>
</html>
