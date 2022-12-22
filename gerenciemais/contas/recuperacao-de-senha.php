<?php include_once ('../aplicacao/configuracao.php');  include_once('../aplicacao/conexao.php');   ?>
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

  <?php $link_email = $URL_BASE."contas/recuperacao-de-senha.php?Acao=RecuperarSenha&Email=l.felipe.m.goncalves@gmail.com"; ?>

    <a href="<?= $link_email ?>">aqui</a>

  <!-- recuperacao-de-senha.php.php?Acao=NovaSenha&UrlRetorno=<?= $URL_BASE ?>&email=felipe@gmail.com&linkAcao=Ok -->
<?php 

    if(isset($_GET['Email']) && !empty($_GET['Email'])){

      $emailR = $_GET['Email'];
      $acaoR = $_GET['Acao'];

      

      $seleciona = "SELECT * FROM contas WHERE email = '$emailR' LIMIT 1";
      $acao = $conexao -> prepare($seleciona);
      $acao -> execute();

        if($acao -> rowCount () != 0){
          if($acaoR == "RecuperarSenha"){

            $altera = "UPDATE contas SET senhaResete = 'Inativo' WHERE email = '$emailR'";
            $acao_a = $conexao -> prepare($altera);
            $acao_a -> execute();

          }
            
          
        }
                            

    
?>
    <!-- LOGIN -->    
    <div class="container pt-5 pb-5" id="painel-entrar">
        <div class="row">
            <div class="col-12 col-md-6 desktop">
                <img src="<?= $URL_IMG ?>extras/2894058.jpg" alt="" class="img-fluid p-5 d-flex justify-content-center">
            </div>


            <div class="col-12 col-md p-5 justify-content-xl-center">

                  <img src="<?= $URL_IMG ?>logo/gerencie_mais.png" alt="" class = "logo-gm-login mb-4">
                  <div class = "repostas" id = "repostas"></div>

                  <form action="" class = "mt-5 mb-5" method = "post" id = "formNovaSenha">
                      <h3 class = "mb-4">Crie uma nova senha</h3>
                      
                      <div class="formulario formulario-login">
                        
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" id="senha-acesso" name = "senha" placeholder="Digite sua senha">
                          <label for="senha-acesso">Crie sua nova senha</label>
                        </div>

                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" id="senha-acesso" name = "senhaC" placeholder="Digite sua senha">
                          <label for="senha-acesso">Repita essa senha</label>
                        </div>
                        <input type="hidden" class="form-control" id="senha-acesso" name = "email" value = "<?= $emailR ?>">

                        <button type="submit" class="botao botao-vermelho-f">Salvar senha</button>
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

<?php
        }else{
            echo '
              <div class = "container">
                <div class="row">
                    <div class="col">
                        <div class=" text-center pt-3 pb-3">
                            <img src="'.$URL_IMG.'extras/2859689.jpg" alt="" class="img-fluid" width = "300px">
                            <br>
                            <h5>Ops! Link inválido!</h5>
                            <p>Parece que esse link inspirou ou não existe mais.</p>
                        </div>
                    </div>
                </div>    
              </div>        
            ';


        }

?>

    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_BASE ?>contas/acoes/gm.config.min.js"></script>

   
    <script src=""></script>
  </body>
</html>