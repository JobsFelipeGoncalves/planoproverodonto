<?php 

include_once ('../aplicacao/configuracao.php'); 


?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= $URL_CSS ?>estilo.min.css" rel="stylesheet">

    <title>Entrar | Gerencie mais</title>
  </head>
  <body>

    <!-- LOGIN -->    
    <div class="container pt-5 pb-5" id="painel-entrar">
        <div class="row">
            <div class="col-12 col-md-6 desktop">
                <img src="<?= $URL_IMG ?>extras/2894058.jpg" alt="" class="img-fluid p-5 d-flex justify-content-center">
            </div>


            <div class="col-12 col-md p-5 justify-content-xl-center">

                  <img src="<?= $URL_IMG ?>logo/gerencie_mais.png" alt="" class = "logo-gm-login mb-4">
                  <div class = "repostas" id = "repostas"></div>

                  <form id = "formEsqueciSenha" action="" class = "mt-5 mb-5" method = "post">
                      <h3 class = "mb-4">Esqueceu a senha?</h3>
                      <p>Vamos recuperar a sua senha através do seu e-mail.</p>
                      <div class="formulario formulario-login">
                        <div class="form-floating mb-3">
                          <input type="email" name = "email" class="form-control" id="email-acesso" placeholder="name@example.com" required>
                          <label for="email-acesso">Digite seu e-mail</label>
                        </div>

                        <button type="submit" class="botao botao-vermelho-f">Confirmar</button>
                      </div>
                  </form>              

                  <div class="col">
                      <hr>
                      <span class = "fonte-12">&copy; <?= date('Y') ?> Gerencie mais. Todos os direitos reservados a 
                    <a href="https://felipe-goncalves.github.io" target = "_blank" class = "links">Felipe Gonçalves</a>.</span>
                  </div>
            </div>

            <div class="col-md-1"></div>

        </div>
    </div>

    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_BASE ?>contas/acoes/gm.config.min.js"></script>

   
    <script src=""></script>
  </body>
</html>