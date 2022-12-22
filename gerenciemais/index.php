<?php include_once ('aplicacao/configuracao.php'); ?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= $URL_CSS ?>estilo.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <title>Entrar | Gerencie mais</title>
  </head>
  <body>

    <!-- LOGIN -->    
    <div class="container pt-5 pb-5" id="painel-entrar">
        <div class="row">
            <div class="col-md-5 text-center m-auto">

              <img src="<?= $URL_IMG ?>logo/gerencie_mais.png" alt="" class = "logo-gm-login mb-4">
              <br>
              <p class = "fonte-16 cor-cinza">Carregando recursos...</p><br>
                <div class="spinner-grow text-danger" role="status">
                  <span class="visually-hidden">Carregando recursos...</span>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
		setTimeout(function() {
		    window.location.href = "<?= $URL_BASE ?>contas/entrar.php?Acao=Entrar&Login=Invalido";
		}, 5000);
	</script>
    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
   
    <script src=""></script>
  </body>
</html>