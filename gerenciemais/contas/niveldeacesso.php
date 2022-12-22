<?php 
    include_once ('../aplicacao/configuracao.php'); 

     //recupera das da url
     @$retorno = $_GET['Retorno'];

   

    if(!isset($_SESSION['idSessao']) AND !isset($_SESSION['emailSessao'])){

        ob_start();
        unset( $_SESSION['idSessao'], $_SESSION['emailSessao']);

            echo '
                <script type="text/javascript">
                    setTimeout(function() { window.location.href = "../contas/entrar.php?Acao=Entrar&Login=Invalido&Sessao=Encerrado&Status=LoginInvalido"; }, 0000);
                </script>       
            ';

    }

    if($nivelUserLogadoS != "Mestre"){


        echo '
            <script type="text/javascript">
                setTimeout(function() { window.location.href = "../app/?Acao=Inicio&Lista=SemPermissao"; }, 0000);
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

    <title>Minha conta no Gerencie mais</title>
  </head>
  <body>

    <!-- LOGIN -->    
    <div class="container pt-2 pb-5" id="painel-entrar">

      
        <div class="row w-75">
            <div class="col-md mb-2 mt-4">
                <!-- marca -->
                <img src="<?= $URL_IMG ?>logo/gerencie_mais.png" alt="" class = "logo-gm-login mb-4">
            </div>
        </div>

        <div class="row w-75 m-auto mt-4 mb-5">
            <div class="col-md-12">
                <?php 
                    if(isset($_GET['RetornoUrl'])){ 
                    $RetornoUrl = $_GET['RetornoUrl']; 

                    echo ' <a href = "'.$RetornoUrl.'" class = "mf-3"><span class="material-icons-round icones">arrow_back</span></a>';

                    } else{
                ?>
                    <a href = "geralcontas.php?Acao=Lista" class = "mf-3"><span class="material-icons-round icones">arrow_back</span></a>
                <?php
                    }
                ?>
                <span class = "mb-4 fonte-20">Contas de acesso</span>
                <span class="material-icons-round icones">chevron_right</span>
                <span class = "mb-4 fonte-20"">Nível de acesso</span>
            </div>
        </div>

        <div class="row">
          <div class="col-md">

          </div>
        </div>

<?php 
    //verifica se existe o e-mail
    if(isset($_GET['Conta'])){
    
        $conta_r = $_GET['Conta'];

        $seleciona_r = "SELECT * FROM contas WHERE id = '$conta_r' LIMIT 1"; 
        $consulta_r = $conexao -> prepare($seleciona_r);
        $consulta_r -> execute();

        if(($consulta_r) AND ($consulta_r -> rowCount () != 0)){
            while($registo_r = $consulta_r -> fetch(PDO::FETCH_ASSOC)){        
    
                
?>
    

        <div class="row w-75 m-auto mt- mb-2">
            <div class="col-md-6">
                <div class = "repostas" id = "repostas"></div>
                <form action="" class = "gm-formularios" method = "post" id = "formMudaNivelAcesso">
                        <div class="row mb-3">

                        <div class="col-md mb-3">
                            <label for="nivelAcesso" class="form-label selectpicker">Nível de acesso</label>                                      
                            <select class="form-select" name = "nivelAcesso" id="nivelAcesso" required>
                                <optgroup label = "Nível de acesso atual">
                                    <option value="<?= $registo_r['nivelAcesso'] ?>"><?= $registo_r['nivelAcesso'] ?></option>
                                </optgroup>

                                <optgroup label = "Mudar nível de acesso para">
                                    <option value="Consultor">Consultor - Acesso: Solicitações de 'Contatos' e 'Fale com um consultor' </option>
                                    <option value="Editor">Editor - Acesso: 'Profissionais', 'Solicitações de 'Credenciamentos', 'Central de ajuda' e 'Central de Privacidade'</option>
                                    <option value="Mestre">Mestre - Acesse todas as abas</option>
                                </optgroup>
                                
                                
                                
                            </select>
                            <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>


                        </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name = "nome" class="form-control" id="nome" value="<?= $registo_r['nome'] ?>" disabled title = "Somente o dono na conta pode fazer alteração dessa informação" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="sobrenome" class="form-label">Sobrenome</label>
                                    <input type="text" name = "sobrenome" class="form-control" id="sobrenome" value = "<?= $registo_r['sobrenome'] ?>" disabled title = "Somente o dono na conta pode fazer alteração dessa informação">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md">
                                <hr>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail de acesso</label>
                                    <input type="email" name = "email" class="form-control" id="email" value = "<?= $registo_r['email'] ?>" required disabled title = "Somente o dono na conta pode fazer alteração dessa informação">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md">
                                <hr>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md">
                                <input type="hidden" name = "urlAtual" class="form-control" id="urlAtual" value = "<?= $URL_ATUAL ?>">
                                <input type = "hidden" name = "contaRecuperada" value = "<?= $conta_r; ?>">
                                <input type="submit" name = "enviar" class = "botao botao-vermelho" value = "Salvar">
                            </div>
                        </div>       
                </form>
               
            </div>
            <div class="col-12 col-md">
                <img src="<?= $URL_IMG ?>extras/3255309.jpg" alt="" class="img-fluid p-5 d-flex justify-content-top">
            </div>
        </div>


<?php   
                   

                }#while

            }else{
                echo '
                    <div class="row">
                        <div class="col">
                            <div class=" text-center pt-3 pb-3">
                                <img src="'.$URL_IMG.'extras/2859689.jpg" alt="" class="img-fluid" width = "300px">
                                <br>
                                <h5>Ops! Link inválido!</h5>
                                <p>Parece que esse link inspirou ou não existe.</p>
                            </div>
                        </div>
                    </div>            
                ';
            }


        }else{
            echo '
                <div class="row">
                    <div class="col">
                        <div class=" text-center pt-3 pb-3">
                            <img src="'.$URL_IMG.'extras/2859689.jpg" alt="" class="img-fluid" width = "300px">
                            <br>
                            <h5>Ops! Link inválido!</h5>
                            <p>Parece que esse link inspirou ou não existe.</p>
                        </div>
                    </div>
                </div>            
            ';
        }

?>
    </div><!-- container -->

              

   <!-- rodape -->
   <footer>
        <div class="container rodape p-3">
            <div class="row">
                <div class="col">
                    <hr>
                    <span class = "fonte-12">&copy; <?= date('Y') ?> Gerencie mais. Todos os direitos reservados a 
                    <a href="https://felipe-goncalves.github.io" target = "_blank" class = "links">Felipe Gonçalves</a>.</span>
                </div>
            </div>
        </div>
                    
    </footer>
    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_BASE ?>contas/acoes/gm.config.min.js"></script>
   
    <script src=""></script>
  </body>
</html>