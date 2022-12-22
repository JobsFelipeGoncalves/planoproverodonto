<?php
    function deixarNumero($string){
        return preg_replace("/[^0-9]/", "", $string);
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
 <title>Dentista e clínicas que atendem pelo Prover Odonto na sua região | Prover Odonto</title>

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
  <meta property="og:title"        content="Dentista e clínicas que atendem pelo Prover Odonto na sua região | Prover Odonto" />
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
<body class = "" >
    <?php require "components/header.php"; ?>
<!-- aviso do app -->
    <div class="alert alert-dismissible fade show pt-2 pb-0 mt-4 para-mobile" role="alert">
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


  <!-- pesquisa da rede credenciada -->
     <section id = "rede-credenciada-pesquisa" class = "fundo-azul-fraco">
      <div class="container pt-4" style = "">
          <div class="row ">
              <div class="col-md-12 wow animate__animated animate__fadeInDown" data-wow-delay="0s">
                <div class="texto-principal pt-3 mb-0 pb-3">
                  
                  
                  <div class="row mt-1">
                      <div class="col-12 col-md-12 text-center">
                        <h5 class = "fonte-normal cor-azul"><a href="<?= BASE ?>rede-credenciada" class = "botao-linha"> &#8672; Voltar a pesquisar</a></h5>
                      </div>
                  </div>
                </div>
             </div>
          </div>
      </div>
    </section>


<?php
  $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  if(isset($_REQUEST['buscaDentista'])){

     //remove os espeços do inicio e final dos campos
      $recebeDados = array_map("trim", $recebeDados);
      $recebeCidade = $recebeDados['cidadeCred'];
      $recebeEstado = $recebeDados['estadoCred'];


      if($recebeCidade != "todos"){

//================================================== CIDADE INDIVIDUAL #INICIO ===================================================//


      // pesquisa ESTADO
      $consultaEstadoRecebido = "SELECT * FROM estado WHERE id = '$recebeEstado'";
      $consultasEstado = $conexao -> prepare($consultaEstadoRecebido);
      $consultasEstado -> execute();

      if(($consultasEstado) AND ($consultasEstado -> rowCount () != 0)){
        while($dadosEstado = $consultasEstado -> fetch(PDO::FETCH_ASSOC)){

              //pesquisa CIDADE
              $pesquisaCidade = "SELECT * FROM cidade WHERE id = '". $recebeCidade ."' AND estado = '". $dadosEstado['id'] ."'";
              $consultaCidade = $conexao -> prepare($pesquisaCidade);
              $consultaCidade -> execute();

                  if(($consultaCidade) AND ($consultaCidade -> rowCount () != 0)){
                    while($dadosCidade = $consultaCidade -> fetch(PDO::FETCH_ASSOC)){

                  

?>




  <section>
    <div class="container">
      <div class="row">
        <div class="col-10">
          
         <!--  <a href="imprimirRedeCred.php?Estado=<?= $recebeEstado ?>&Cidade=<?= $recebeCidade ?>" class = "btn" title = "Imprimir rede" target="_blank">Imprimir</a> -->
         <!-- <a href="<?= BASE ?>acessar-rede-credenciada/imprimir/<?= $recebeEstado ?>/<?= $recebeCidade ?>" class = "btn" title = "Imprimir rede" target="_blank">Imprimir</a> -->
         <div class="atalho-imprimir wow animate__animated animate__fadeInLeft" data-wow-delay="1s">
            <a href="<?= BASE ?>imprimir/rede-credenciada/<?= $recebeEstado ?>/<?= $recebeCidade ?>" target="_blank" class = "botao-atalho"><img src="<?= BASE_IMG ?>extra/imprimir.png" ><span class = "desc-atalho">Imprimir</span></a>
          </div>

        </div>
      </div>
    </div>
  </section>


<!-- pesquisa da rede -->
  <section id="rede-credenciada-lista" class = " fundo-branco">
    <div class="container">
      <!-- ### -->
      <div class="row">
        <div class="col-md pt-5 pb-3">
            <h5 class = "fonte-normal cor-preto animate__animated animate__fadeInUp" data-wow-delay="1s">Profissionais em <span class="cor-azul negrito"><?= $dadosCidade['nome'] ?>/<?= $dadosEstado['uf'] ?></span></h5>
        </div>
      </div>
      <div class="row pb-5 animate__animated animate__fadeIn" data-wow-delay="1.2s">
          <div class="col-md">
              <div class="accordion" id="accordionExample">
<?php
 
  $pesquisaPrestador = "SELECT * FROM credenciados WHERE cidade = '".$dadosCidade['id']."' AND estado = '".$dadosEstado['id']."' ORDER BY nome ASC";
  $selecionaPrestador = $conexao -> prepare($pesquisaPrestador);
  $selecionaPrestador -> execute();

      if(($selecionaPrestador) AND ($selecionaPrestador -> rowCount () != 0)){
        while($dadosPrestador = $selecionaPrestador -> fetch(PDO::FETCH_ASSOC)){

          if($dadosPrestador['status'] == "Publicado"){

?>
                <div class="card">
                  <div class="card-header" id="heading__<?= $dadosPrestador['id'] ?>">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne__<?= $dadosPrestador['id'] ?>" aria-expanded="true" aria-controls="collapseOne__<?= $dadosPrestador['id'] ?>">
                        <?php 
                          if($dadosPrestador['tipoCred'] == "Dentista"){ $tituloPrestador = $dadosPrestador['nome']; $registoPrestador = "CRO ".$dadosPrestador['numeroCRO']."/".$dadosPrestador['estadoCRO']; } 
                          elseif($dadosPrestador['tipoCred'] == "Clínica"){ $tituloPrestador = $dadosPrestador['nomeFantasia']; $registoPrestador = "CNPJ ". $dadosPrestador['cnpj']; }
                        ?>
                          <?= $tituloPrestador ?> <br><span class="badge badge-primary"><?= $dadosPrestador['tipoCred'] ?></span> <span class = "fonte-14 cor-cinza-escuro"><?= $registoPrestador ?></span>
                          <span class = "fonte-14 texto-negrito cor-azul float-right mt-0">&#9660;</span>
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne__<?= $dadosPrestador['id'] ?>" class="collapse " aria-labelledby="heading__<?= $dadosPrestador['id'] ?>" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <h5 class="cor-azul fonte-18">
                                  <?= $tituloPrestador ?> 
                                  <span class = "fonte-14 cor-preto"><br><?=$registoPrestador?> </span>

                                </h5>
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-12 col-md">

                                <div class="row mb-3"><div class="col-md">
                                  <div class="rede-cred-dados-dentista">
                                      <h5 class="cor-azul fonte-14">
                                        Endereço / Local de atendimento
                                      </h5>
                                      <p class="fonte-14 ">
                                        <?php echo $dadosPrestador['endereco'] != "" ?  $dadosPrestador['endereco']."," : " ";  ?>
                                        <?php echo $dadosPrestador['numero'] != "" ?  $dadosPrestador['numero']."," : " ";  ?>
                                        <?php echo $dadosPrestador['complemento'] != "" ?  $dadosPrestador['complemento']."," : " ";  ?>
                                        <?php echo $dadosPrestador['bairro'] != "" ?  $dadosPrestador['bairro']."," : " ";  ?>
                                        <?= $dadosCidade['nome'] ?>-<?= $dadosEstado['nome'] ?> - 
                                        <?php echo $dadosPrestador['cep'] != "" ?  "CEP: ".$dadosPrestador['cep'] : " ";  ?>
                                      </p>  
                                      <p class="fonte-12">
                                        <a href="http://maps.google.com.br/maps?q=<?= $dadosPrestador['endereco'].",".$dadosPrestador['numero'].",".$dadosPrestador['bairro'].",".$dadosCidade['nome'].",".$dadosEstado['nome'].",".$dadosPrestador['cep']; ?>" target="_blank" class = "botao-azul-menor">Ver no mapa</a>
                                      </p>                              
                                    </div>
                                </div></div>
                                <hr>
                                <div class="row mb-3">
                                  <div class="col-md-12">
                                    <div class="rede-cred-dados-dentista">
                                        <h5 class=" cor-azul fonte-14">
                                          Celular
                                        </h5>
                                        <p class="fonte-14 ">
                                           <?= $dadosPrestador['telefoneC'] ?>  
                                           <a href="https://api.whatsapp.com/send?phone=<?= deixarNumero($dadosPrestador['telefoneC'])?>" target="_blank" class = "botao-verde-menor">WhatsApp </a>
                                            <a href="tel:<?= deixarNumero($dadosPrestador['telefoneC'])?>" target="_blank" class = "botao-azul-menor">Ligar</a>
                                        </p>                    
                                      </div>
                                  </div>
                                  <?php if($dadosPrestador['telefoneF'] != ""){ ?>
                                  <div class="col-md-12">
                                    <div class="rede-cred-dados-dentista">
                                        <h5 class=" cor-azul fonte-14">
                                          Telefone
                                        </h5>
                                        <p class="fonte-14 ">
                                          <?= $dadosPrestador['telefoneF'] ?>
                                          <a href="tel:<?= deixarNumero($dadosPrestador['telefoneF'])?>" target="_blank" class = "botao-azul-menor">Ligar</a>
                                        </p>                        
                                      </div>
                                  </div>
                                  <?php } ?>
                                  
                                  <?php if($dadosPrestador['telefoneO'] != ""){ ?>
                                  <div class="col-md-12">
                                    <div class="rede-cred-dados-dentista">
                                        <h5 class=" cor-azul fonte-14">
                                          Celular
                                        </h5>
                                        <p class="fonte-14 ">
                                           <?= $dadosPrestador['telefoneO'] ?>
                                            <a href="tel:<?= deixarNumero($dadosPrestador['telefoneO'])?>" target="_blank" class = "botao-azul-menor">Ligar</a>

                                        </p>                          
                                      </div>
                                  </div>
                                <?php } ?>
                                </div>

                          </div><!-- -->
                          <div class="col-12 col-md-3">
                              <div class="row"><div class="col-md">
                                  <div class="rede-cred-dados-dentista">
                                    <h5 class="cor-azul fonte-14">
                                      Especialidade / Atuação 
                                    </h5>
                                    <p class="fonte-12">
                                      <?php echo $dadosPrestador['espConsulta'] != "" ?  $dadosPrestador['espConsulta']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espUrgencia'] != "" ?  $dadosPrestador['espUrgencia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espCirugia'] != "" ?  $dadosPrestador['espCirugia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espRadiologia'] != "" ?  $dadosPrestador['espRadiologia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espOdontopediatra'] != "" ?  $dadosPrestador['espOdontopediatra']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espDentistica'] != "" ?  $dadosPrestador['espDentistica']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espPeriodontia'] != "" ?  $dadosPrestador['espPeriodontia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espProteses'] != "" ?  $dadosPrestador['espProteses'] : "";  ?>
                                    </p>                              
                                  </div>                                 
                              </div></div>

                          </div><!-- -->
                          <?php if($dadosPrestador['tipoCred'] == "Clínica") {?>
                          <div class="col-12 col-md-4">
                              <div class="row"><div class="col-md">
                                  <div class="rede-cred-dados-dentista">
                                    <h5 class="cor-azul fonte-14">
                                      Profissionais atendendo
                                    </h5>
                                    <p class="fonte-14">
                                        <?php 
                                          $selecionaPrestadorInterno = "SELECT * FROM credenciados_ext WHERE clinica ='". $dadosPrestador['id'] ."'";
                                          $consultaPrestadorInterno = $conexao -> prepare($selecionaPrestadorInterno);
                                          $consultaPrestadorInterno -> execute();

                                              if(($consultaPrestadorInterno) AND ($consultaPrestadorInterno -> rowCount () != 0)){
                                                while($dadosPrestadorInterno = $consultaPrestadorInterno -> fetch(PDO::FETCH_ASSOC)){
                                                    if($dadosPrestadorInterno['status'] == "Publicado"){
                                                      echo "- <strong>".$dadosPrestadorInterno['nome']."</strong> - CRO ".$dadosPrestadorInterno['cro']."/".$dadosPrestadorInterno['croUF']."<br>";
                                                    }
                                                }
                                              }
                                        ?>
                                    </p>                              
                                  </div>                                 
                              </div></div>
                          </div><!-- -->
                         <?php } // if verifica se é CLINICA ?>
                        </div>

                        

                    </div>

                </div>
              </div>

<?php 
      } // verifica se estiver "publicado"
    }// while de prestador de serviço

  } // if else de verifica se existe algum registo de dentista na cidade
  else{

?>
               <div class="row w-75 m-auto text-center">
                  <div class="col">
                    <img src="<?= BASE_IMG ?>/extra/rede-credenciada-index.png">
                      <h5>Nenhum dentista ou clínica encontrado em <strong class = "cor-azul"><?= $dadosCidade['nome'] ?>/<?= $dadosEstado['uf'] ?></strong>.</h5>
                      <p>Você pode verificar nas cidade vizinhas. Se mesmo assim você não encontrou clique aqui.</p>
                  </div>
                </div>

                <div class="row text-center">
                  <div class="col">
                        <a href="<?= BASE ?>rede-credenciada" class = "botao-azul-menor">Voltar a pesquisar</a>
                        <BR><BR><BR>
                        <!-- <a href="<?= BASE ?>planos/para-voce" class = "botao-nulo">Solicitar &#10140;</a> -->
                  </div>
                </div>
<?php

  } // if else de verifica se existe algum registo de dentista na cidade

?>
              </div>
          </div>
          </div>
      </div>
    </div>
  </section>


      
<?php
                  } // while de cidade
                } //if de cidade

        }// while de estado
      } // if de estado




//================================================== CIDADE INDIVIDUAL #FIM ===================================================//


    } # VERIFICA DE CIDADE RECEBIDA FOR DIFERENTE DE "todos"
    elseif($recebeCidade == "todos"){
      $recebeCidade = $recebeDados['cidadeCred'];
      $recebeEstado = $recebeDados['estadoCred'];
//================================================== GRUPO DE CIDADE #INICIO ===================================================//

    // pesquisa ESTADO
      $consultaEstadoRecebido = "SELECT * FROM estado WHERE id = '$recebeEstado'";
      $consultasEstado = $conexao -> prepare($consultaEstadoRecebido);
      $consultasEstado -> execute();

      if(($consultasEstado) AND ($consultasEstado -> rowCount () != 0)){
        while($dadosEstado = $consultasEstado -> fetch(PDO::FETCH_ASSOC)){

              //pesquisa CIDADE
              $pesquisaCidade = "SELECT * FROM cidade WHERE estado = '". $dadosEstado['id'] ."'";
              $consultaCidade = $conexao -> prepare($pesquisaCidade);
              $consultaCidade -> execute();


                  if(($consultaCidade) AND ($consultaCidade -> rowCount () != 0)){
                    while($dadosCidade = $consultaCidade -> fetch(PDO::FETCH_ASSOC)){


                  $profissionaisSel =  "SELECT * FROM credenciados WHERE cidade = '". $dadosCidade['id'] ."'";
                  $constaProf = $conexao -> prepare($profissionaisSel);
                  $constaProf -> execute();

                  if($constaProf -> rowCount () != 0){

                  

?>




  <section>
    <div class="container">
      <div class="row">
        <div class="col-10">
          
         <!--  <a href="imprimirRedeCred.php?Estado=<?= $recebeEstado ?>&Cidade=<?= $recebeCidade ?>" class = "btn" title = "Imprimir rede" target="_blank">Imprimir</a> -->
         <!-- <a href="<?= BASE ?>acessar-rede-credenciada/imprimir/<?= $recebeEstado ?>/<?= $recebeCidade ?>" class = "btn" title = "Imprimir rede" target="_blank">Imprimir</a> -->
         <div class="atalho-imprimir wow animate__animated animate__fadeInLeft" data-wow-delay="1s">
            <a href="<?= BASE ?>imprimir/rede-credenciada/<?= $recebeEstado ?>/<?= $recebeCidade ?>" target="_blank" class = "botao-atalho"><img src="<?= BASE_IMG ?>extra/imprimir.png" ><span class = "desc-atalho">Imprimir</span></a>
          </div>

        </div>
      </div>
    </div>
  </section>


<!-- pesquisa da rede -->
  <section id="rede-credenciada-lista" class = " fundo-branco">
    <div class="container">
      <!-- ### -->
      <div class="row">
        <div class="col-md pt-5 pb-3">
            <h5 class = "fonte-normal cor-preto animate__animated animate__fadeInUp" data-wow-delay="1s">Profissionais em <span class="cor-azul negrito"><?= $dadosCidade['nome'] ?>/<?= $dadosEstado['uf'] ?></span></h5>
        </div>
      </div>
      <div class="row pb-5 animate__animated animate__fadeIn" data-wow-delay="1.2s">
          <div class="col-md">
              <div class="accordion" id="accordionExample">
<?php
 
  $pesquisaPrestador = "SELECT * FROM credenciados WHERE cidade = '".$dadosCidade['id']."' ORDER BY nome ASC";
  $selecionaPrestador = $conexao -> prepare($pesquisaPrestador);
  $selecionaPrestador -> execute();

      if(($selecionaPrestador) AND ($selecionaPrestador -> rowCount () != 0)){
        while($dadosPrestador = $selecionaPrestador -> fetch(PDO::FETCH_ASSOC)){



          if($dadosPrestador['status'] == "Publicado"){


?>
                <div class="card">
                  <div class="card-header" id="heading__<?= $dadosPrestador['id'] ?>">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne__<?= $dadosPrestador['id'] ?>" aria-expanded="true" aria-controls="collapseOne__<?= $dadosPrestador['id'] ?>">
                        <?php 
                          if($dadosPrestador['tipoCred'] == "Dentista"){ $tituloPrestador = $dadosPrestador['nome']; $registoPrestador = "CRO ".$dadosPrestador['numeroCRO']."/".$dadosPrestador['estadoCRO']; } 
                          elseif($dadosPrestador['tipoCred'] == "Clínica"){ $tituloPrestador = $dadosPrestador['nomeFantasia']; $registoPrestador = "CNPJ ". $dadosPrestador['cnpj']; }
                        ?>
                          <?= $tituloPrestador ?> <br><span class="badge badge-primary"><?= $dadosPrestador['tipoCred'] ?></span> <span class = "fonte-14 cor-cinza-escuro"><?= $registoPrestador ?></span>
                                                    <span class = "fonte-14 texto-negrito cor-azul float-right mt-0">&#9660;</span>

                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne__<?= $dadosPrestador['id'] ?>" class="collapse " aria-labelledby="heading__<?= $dadosPrestador['id'] ?>" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <h5 class="cor-azul fonte-18">
                                  <?= $tituloPrestador ?> 
                                  <span class = "fonte-14 cor-preto"><br><?=$registoPrestador?> </span>
                                </h5>
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-12 col-md">

                                <div class="row mb-3"><div class="col-md">
                                  <div class="rede-cred-dados-dentista">
                                      <h5 class="cor-azul fonte-14">
                                        Endereço / Local de atendimento
                                      </h5>
                                      <p class="fonte-14 ">
                                        <?php echo $dadosPrestador['endereco'] != "" ?  $dadosPrestador['endereco']."," : " ";  ?>
                                        <?php echo $dadosPrestador['numero'] != "" ?  $dadosPrestador['numero']."," : " ";  ?>
                                        <?php echo $dadosPrestador['complemento'] != "" ?  $dadosPrestador['complemento']."," : " ";  ?>
                                        <?php echo $dadosPrestador['bairro'] != "" ?  $dadosPrestador['bairro']."," : " ";  ?>
                                        <?= $dadosCidade['nome'] ?>-<?= $dadosEstado['nome'] ?> - 
                                        <?php echo $dadosPrestador['cep'] != "" ?  "CEP: ".$dadosPrestador['cep'] : " ";  ?>
                                      </p>  
                                      <p class="fonte-12">
                                        <a href="http://maps.google.com.br/maps?q=<?= $dadosPrestador['endereco'].",".$dadosPrestador['numero'].",".$dadosPrestador['bairro'].",".$dadosCidade['nome'].",".$dadosEstado['nome'].",".$dadosPrestador['cep']; ?>" target="_blank" class = "botao-azul-menor">Ver no mapa</a>
                                      </p>                              
                                    </div>
                                </div></div>
                                <hr>
                                <div class="row mb-3">
                                  <div class="col-md-12">
                                    <div class="rede-cred-dados-dentista">
                                        <h5 class=" cor-azul fonte-14">
                                          Celular
                                        </h5>
                                        <p class="fonte-14 ">
                                           <?= $dadosPrestador['telefoneC'] ?> 
                                           <a href="https://api.whatsapp.com/send?phone=<?= deixarNumero($dadosPrestador['telefoneC'])?>" target="_blank" class = "botao-verde-menor">WhatsApp</a>
                                            <a href="tel:<?= deixarNumero($dadosPrestador['telefoneC'])?>" target="_blank" class = "botao-azul-menor">Ligar</a>
                                        </p>                    
                                      </div>
                                  </div>
                                  <?php if($dadosPrestador['telefoneF'] != ""){ ?>
                                  <div class="col-md-12">
                                    <div class="rede-cred-dados-dentista">
                                        <h5 class=" cor-azul fonte-14">
                                          Telefone
                                        </h5>
                                        <p class="fonte-14 ">
                                          <?= $dadosPrestador['telefoneF'] ?>
                                          <a href="tel:<?= deixarNumero($dadosPrestador['telefoneF'])?>" target="_blank" class = "botao-azul-menor">Ligar</a>
                                        </p>                        
                                      </div>
                                  </div>
                                  <?php } ?>
                                  
                                  <?php if($dadosPrestador['telefoneO'] != ""){ ?>
                                  <div class="col-md-12">
                                    <div class="rede-cred-dados-dentista">
                                        <h5 class=" cor-azul fonte-14">
                                          Celular
                                        </h5>
                                        <p class="fonte-14 ">
                                           <?= $dadosPrestador['telefoneO'] ?>
                                            <a href="tel:<?= deixarNumero($dadosPrestador['telefoneO'])?>" target="_blank" class = "botao-azul-menor">Ligar</a>

                                        </p>                          
                                      </div>
                                  </div>
                                <?php } ?>
                                </div>

                          </div><!-- -->
                          <div class="col-12 col-md-3">
                              <div class="row"><div class="col-md">
                                  <div class="rede-cred-dados-dentista">
                                    <h5 class="cor-azul fonte-14">
                                      Especialidade / Atuação 
                                    </h5>
                                    <p class="fonte-14">
                                      <?php echo $dadosPrestador['espConsulta'] != "" ?  $dadosPrestador['espConsulta']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espUrgencia'] != "" ?  $dadosPrestador['espUrgencia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espCirugia'] != "" ?  $dadosPrestador['espCirugia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espRadiologia'] != "" ?  $dadosPrestador['espRadiologia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espOdontopediatra'] != "" ?  $dadosPrestador['espOdontopediatra']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espDentistica'] != "" ?  $dadosPrestador['espDentistica']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espPeriodontia'] != "" ?  $dadosPrestador['espPeriodontia']."<br>" : " ";  ?>
                                      <?php echo $dadosPrestador['espProteses'] != "" ?  $dadosPrestador['espProteses'] : "";  ?>
                                    </p>                              
                                  </div>                                 
                              </div></div>

                          </div><!-- -->
                          <?php if($dadosPrestador['tipoCred'] == "Clínica") {?>
                          <div class="col-12 col-md-4">
                              <div class="row"><div class="col-md">
                                  <div class="rede-cred-dados-dentista">
                                    <h5 class="cor-azul fonte-14">
                                      Profissionais atendendo
                                    </h5>
                                    <p class="fonte-14">
                                        <?php 
                                          $selecionaPrestadorInterno = "SELECT * FROM credenciados_ext WHERE clinica ='". $dadosPrestador['id'] ."'";
                                          $consultaPrestadorInterno = $conexao -> prepare($selecionaPrestadorInterno);
                                          $consultaPrestadorInterno -> execute();

                                              if(($consultaPrestadorInterno) AND ($consultaPrestadorInterno -> rowCount () != 0)){
                                                while($dadosPrestadorInterno = $consultaPrestadorInterno -> fetch(PDO::FETCH_ASSOC)){
                                                    if($dadosPrestadorInterno['status'] == "Publicado"){
                                                      echo "- <strong>".$dadosPrestadorInterno['nome']."</strong> - CRO ".$dadosPrestadorInterno['cro']."/".$dadosPrestadorInterno['croUF']."<br>";
                                                    }
                                                }
                                              }
                                        ?>
                                    </p>                              
                                  </div>                                 
                              </div></div>
                          </div><!-- -->
                         <?php } // if verifica se é CLINICA ?>

                        </div>

                        

                    </div>

                </div>
              </div>
<?php 

      } // verifica se estiver "publicado"
    }// while de prestador de serviço

  } // if else de verifica se existe algum registo de dentista na cidade
  else{

?>
               <div class="row w-75 m-auto text-center">
                  <div class="col">
                    <img src="<?= BASE_IMG ?>/extra/rede-credenciada-index.png">
                      <h5>Nenhum dentista ou clínica encontrado em <strong class = "cor-azul"><?= $dadosCidade['nome'] ?>/<?= $dadosEstado['uf'] ?></strong>.</h5>
                      <p>Você pode verificar nas cidade vizinhas. Se mesmo assim você não encontrou clique aqui.</p>
                  </div>
                </div>

                <div class="row text-center">
                  <div class="col">
                        <a href="<?= BASE ?>acessar-rede-credenciada-alt" class = "botao-azul-menor">Voltar a pesquisar</a>
                        <BR><BR><BR>
                        <!-- <a href="<?= BASE ?>planos/para-voce" class = "botao-nulo">Solicitar &#10140;</a> -->
                  </div>
                </div>
<?php
  
  } // if else de verifica se existe algum registo de dentista na cidade

?>
              </div>
          </div>
      </div>
    </div>
  </section>


      
<?php
                  } // while de cidade
                  } //verifica se existe prestador na cidade
                } //if de cidade

        }// while de estado
      } // if de estado


//================================================== GRUPO DE CIDADE #FIM ===================================================//

    } # 

  } // /ifesle _REQUEST
  else{

?>  
  <section>
    <div class="container">
      <div class="row w-75 m-auto text-center">
                  <div class="col">
                    <img src="<?= BASE_IMG ?>/extra/rede-credenciada-index.png">
                      <h5>Ops!</h5>
                      <p>É necessário realizar a pesquisa para obter algum resultado.</p>
                  </div>
                </div>

                <div class="row text-center">
                  <div class="col">
                        <a href="<?= BASE ?>rede-credenciada" class = "botao-azul-menor">Voltar a pesquisar</a>
                        <BR><BR><BR>
                        <!-- <a href="<?= BASE ?>planos/para-voce" class = "botao-nulo">Solicitar &#10140;</a> -->
                  </div>
                </div>
    </div>
  </section>
 <?php 
  } //ifesle _REQUEST
  
?>




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