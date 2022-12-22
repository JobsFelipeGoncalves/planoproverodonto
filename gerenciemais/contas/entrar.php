<?php 
  
    include_once ('../aplicacao/configuracao.php'); 

    if(isset($_SESSION['idSessao']) AND isset($_SESSION['emailSessao'])){

      echo '
        <script type="text/javascript">
            setTimeout(function() { window.location.href = "../app/?Acao=Inicio"; }, 0000);
        </script>       
    ';

    }
?>
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
<?php
    if(isset($_GET['Status'])){

      if($_GET['Status'] == "LoginInvalido"){

          echo '
          
            <div class="container pt-2">
                      <div class="row">
                          <div class="col text-left">
                              <div class="alert alert-primary show" role="alert">
                                  <strong>Algo deu errado!</strong>
                                  É necessário realizar o login para utilizar o Gerencie Mais.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" style = "position: absolute; top: 6px; right: 10px; margin: 5px;" aria-label="Close"></button>

                              </div>
                          </div>
                      </div> 
            </div>
          
          ';

      }

    }
?>
    
    <div class="container pt-5 pb-5" id="painel-entrar">
        <div class="row">
            <div class="col-12 col-md-6 desktop">
                <img src="<?= $URL_IMG ?>extras/2894058.jpg" alt="" class="img-fluid p-5 d-flex justify-content-center">
            </div>


            <div class="col-12 col-md p-5 justify-content-xl-center">

                  <img src="<?= $URL_IMG ?>logo/gerencie_mais.png" alt="" class = "logo-gm-login mb-4">
                  <div class = "repostas" id = "repostas"></div>

                  <form class = "gm-formulario mt-5 mb-5" id = "formEntrar" method = "post">
                      <h3 class = "mb-4">Entre com sua conta</h3>
                      <div class="formulario formulario-login">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" id="email-acesso" name = "email" placeholder="name@example.com" required>
                          <label for="email-acesso">Digite seu e-mail</label>
                        </div>

                        <div class="form-floating">
                          <input type="password" class="form-control" id="senha-acesso" name = "senha" placeholder="Digite sua senha" required>
                          <label for="senha-acesso">Digite sua senha</label>
                        </div>

                        <div class="form-text mt-3 mb-4">
                          Esqueceu a senha? Clique <a class = "links" href = "esqueci-minha-senha.php?Acao=RecuperarSenha&UrlRetorno=<?= $URL_BASE ?>">aqui</a>.
                        </div>

                        <button type="submit" class="botao botao-vermelho-f">Entrar agora</button>
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