<?php include_once ("connection/connection.php"); ?>
<!doctype html>
<html lang="pt-br">
<head>
 <title>Dentista e clínicas que atendem pelo Prover Odonto | Prover Odonto</title>

  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="description"           content="Enconte um dentista ou clínica que atendem pelo plano odontológico Prover Odonto perto de você."/> 
  <meta name="keywords"              content="credenciamento, rede credenciadas, dentistas que atendem pelo Prover Odonto, clínicas que atendem pelo Prover odonto, plano odontológico prover odonto, prover odonto, prover, odonto, dental, dente, dente de leite, crianças, odontologia, odontológico, canal, tratamento de canal, aparelhos, colocando aparelhos, extrações de dentes, dentes do siso, siso, plano odontológico, plano odontológico familiar, plano odontológico individual, plano odontológico para empresas, plano empresarial, plano familiar, plano individual, dentistas, clínica odontológica, consultas, urgência, emergência,  radiologia, odontopediatria, periodontia, tratamento de gengiva, endodontia, tratamento de canal, dentística, restaurações, cirurgias, rede de dentista, Dourados, Campo Grande, Ivinhema, Nova Andradina, Angélica, Aquidauana, Bonito, index, MS, Mato Grosso do Sul"/>
  <meta name="robots"                content="index, follow" />

  <meta property="og:locale"       content="pt_BR">
  <meta property="og:site_name"    content="Prover Odonto - Encontre um dentista ou clínica do convênio Prover Odonto ">
  <meta property="og:url"          content="<?= BASE ?>rede-credenciada" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="Dentista e clínicas que atendem pelo Prover Odonto | Prover Odonto" />
  <meta property="og:description"  content="Enconte um dentista ou clínica que atendem pelo plano odontológico Prover Odonto perto de você." />
  <meta property="og:image"        content="<?= BASE_IMG ?>logo/logo_prover_odonto.png" />
  <meta name="author"              content="Felipe Goncalves - l.felipe.m.goncalves@gmail.com | Marketing Grupo Prover"/>
  

  <link rel="canonical" href="<?= BASE ?>rede-credenciada">

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
<body class = "fundo-azul-fraco" >
    <?php require "components/header.php"; ?>
    <div class="alert alert-dismissible fade show fundo-azul-fraco pt-1 pb-0 mt-4 para-mobile" role="alert">
          <div class="container-fluid">
                  <div class="row">
                      <div class="col-3">
                        <img src="<?= BASE_IMG ?>extra/icon-app.png" class = "m-auto img-fluid" style = "border-radius: 10px; width: 53px;">
                      </div>
                      <div class="col-7">
                       <p class="fonte-16 negrito cor-azul-escuro espaco-texto mt-0">Baixe o Aplicativo <span class = "cor-azul">Prover Odonto Beneficiário!</span></p>
                      </div>
                      <div class="col-2 mt-3">
                          <a href="<?= BASE ?>aplicativo-meu-prover-odonto" class ="botao-azul-menor">Baixar</a> 
                      </div>
                    </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -23px; margin-right: -10px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
          </div>
      </div>

     <section id = "encontre-um-credenciado" class = "">
      <div class="container pt-5 pb-5" style = "">
          <div class="row pt-3 pb-5">
              <div class="col-md-6 wow animate__animated animate__fadeIn" data-wow-delay="0.1s">
               <img src="<?= BASE_IMG ?>extra/fundo-seja-credenciado.png" class="img-fluid" style = "margin-top: -10px;">
             </div>


              <div class="col-md-6 wow animate__animated animate__fadeIn" data-wow-delay="0.1s">
                <div class="texto-principal pt-5 mb-5 pb-5">
                  <!-- <h1 class = "negrito mb-4 display-4 cor-azul"></h1> -->
                  
                  <h1 class = "fonte-semi-bold cor-azul display-4">Encontre um Dentista ou Clínica credenciada perto de você!</h1>
                  <div class="row mt-5">
                      <div class="col-12 col-md-12">
                            <a href="https://rede.odontosfera.com.br/RedeCredenciada.aspx?Operadora=422533" class ="botao-azul" target="_blank">Acessar rede credenciada &#8599;</a>

                          <!-- form id = "form-rede-credenciada" class = "form-principal" method="post" action="<?= BASE ?>rede-credenciada/dentistas-e-clinicas">
                            <div class="row">
                              <div class="form-group col-12 col-md-6">
                                 <label for="estadoCred">Selecione seu estado <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                  <select class="custom-select estadoCred"  id = "estadoCred" name="estadoCred" required>
                                    <option value="" checked>Escolha seu estado</option>
                                    <?php   
                                      $selecionaEstado = "SELECT * FROM estado ORDER BY nome ASC";
                                          $consultaEstado = $conexao -> prepare($selecionaEstado);
                                          $consultaEstado -> execute();

                                          if(($consultaEstado) AND ($consultaEstado -> rowCount () != 0)){
                                            while($registoEstado = $consultaEstado -> fetch(PDO::FETCH_ASSOC)){

                                              $profissionaisSeleciona =  "SELECT * FROM credenciados WHERE estado = '".$registoEstado['id']."'";
                                              $constaProfissionais = $conexao -> prepare($profissionaisSeleciona);
                                              $constaProfissionais -> execute();

                                              if($constaProfissionais -> rowCount () != 0){                                             

                                    ?>
                                          <option value="<?= $registoEstado['id'] ?>"><?= $registoEstado['nome'] ?></option>
                                    <?php       
                                              } // if profissionais
                                            }
                                        }

                                    ?>
                                  </select>
                              </div>
                              <div class="form-group col-12 col-md-6">
                                 <label for="cidadeCred">Selecione sua cidade <span class = "fonte-10 fonte-regular">(Obrigatório)</span></label>
                                  <select class="custom-select cidadeCred" name = "cidadeCred" id="cidadeCred" required>
                                            <option value = "" checked>Selecione o estado</option>
                                        </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <button type="submit" class="botao-azul" name="buscaDentista" style = "width: 100% !important; text-align: center;">Buscar profissionais</button>
                              </div>
                            </div>
                                  

                                  
                                  
                                </form> -->
                        
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
  
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>estilo.js"></script>
  <script src="<?= BASE_JS ?>estilo.js"></script>
  <script src="<?= BASE_JS ?>wow.js"></script>
  <script src="<?= BASE ?>app/aplicacao/aplicacao.js"></script>

  <script type="text/javascript">
        $("#estadoCred").on("change",function(){
          var cod_estado = $("#estadoCred").val();
          $.ajax({
            url: '#',
            // url: '../app/cidade-estado.php',
            type: 'POST',
            // data:{estado:'cod_estado'},
            data:{estadoCred:cod_estado},
            beforeSend: function(){
              $("#cidadeCred").css({'background-color':'#fff'});
              $("#cidadeCred").html("Carregando...");
              },
              success: function(data)
              {
                $("#cidadeCred").css({'display':'block'});
                $("#cidadeCred").html(data);
              },
              error: function(data)
              {
                $("#cidadeCred").css({'display':'block'});
                $("#cidadeCred").html("Houve um erro ao carregar");
              }
            });
        });
  </script>
  <?php

      error_reporting(E_ALL & ~ E_NOTICE); 

      if(isset($_POST['estadoCred'])){

      @$idEstado = $_POST['estadoCred'];
      $nomeEstadoCidade = "- Todas as cidades";
      $sqlConsulta = "SELECT * FROM cidade WHERE estado = '$idEstado' ORDER BY nome ASC";
      $sqlSeleciona = $conexao -> prepare($sqlConsulta);
      $sqlSeleciona -> execute();

            echo '<option value="todos">- Todas as cidades</option>';

          if(($sqlSeleciona) AND ($sqlSeleciona -> rowCount () != 0)){
              while($registoCidade  = $sqlSeleciona -> fetch(PDO::FETCH_ASSOC)){

                  $cidadeEscolhida = $registoCidade['id'];

                  $profissionaisSel =  "SELECT * FROM credenciados WHERE cidade = '$cidadeEscolhida'";
                  $constaProf = $conexao -> prepare($profissionaisSel);
                  $constaProf -> execute();

                      if($constaProf -> rowCount () != 0){
                           echo '<option value="'.$registoCidade['id'].'">'.$registoCidade['nome'].'</option>';
                      } 
              }
          }
   
      }  
         
 ?>
  

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