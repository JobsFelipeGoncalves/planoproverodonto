<?php include_once ('../aplicacao/configuracao.php');  ?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author"  content="Felipe M Goncalves - l.felipe.m.goncalves@gmail.com"/>

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= $URL_CSS ?>estilo.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <title>Painel | Gerencie mais</title>
  </head>
  <body>
    
    <!-- top -->    
    <?php require_once('header.php'); ?>

    <!-- painel -->    
    <div class="container mt-4 ">
        <div class="row">
            <div class="col-11 col-md-10 m-auto text-center">
                <!-- <img src="<?= $URL_IMG ?>/logo/gerencie_mais_icone.png" alt="" class = "logo-gm-icon m-2"><br> -->
                <p class = "fonte-30 cor-preto-a">Bem-vindo(a) ao Gerencie mais, <?= $nomeUserLogadoS ?>! <br>O que vamos gerenciar hoje?</p>
                <p class = "mt-5">
                    <a href="#recursos" class = "botao botao-vermelho-f" data-bs-toggle="offcanvas" data-bs-target="#menu-recursos" aria-controls="menu-recursos">
                        Acessar recursos
                    </a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 m-auto text-center">
                <img src="<?= $URL_IMG ?>extras/2894988.jpg" alt="" class="img-fluid p-3 d-flex justify-content-center">
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php require_once('footer.php'); ?>

    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
   
    <script src=""></script>
  </body>
</html>