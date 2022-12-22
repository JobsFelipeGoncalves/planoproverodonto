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
                <span class = "mb-4 fonte-20"">Minha conta</span>
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
                <form action="" class = "gm-formularios" method = "post" id = "formMinhaConta">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name = "nome" class="form-control" id="nome" value="<?= $registo_r['nome'] ?>" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="sobrenome" class="form-label">Sobrenome</label>
                                    <input type="text" name = "sobrenome" class="form-control" id="sobrenome" value = "<?= $registo_r['sobrenome'] ?>">
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
                                    <input type="email" name = "email" class="form-control" id="email" value = "<?= $registo_r['email'] ?>" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3 mt-3">
                                <a href="" data-bs-toggle="modal" data-bs-target="#modal_nova_conta" class = "botao botao-escuro-linha" title = "Clique para criar um novo conteúdo">Alterar senha</a>
                                </div>
                                <input type="hidden" name = "urlAtual" class="form-control" id="urlAtual" value = "<?= $URL_ATUAL ?>">

                            </div>

                            <!-- <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" name = "senha" class="form-control" id="senha" value = "" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="senhaC" class="form-label">Digite novamente sua senha</label>
                                    <input type="password" name = "senhaC" class="form-control" id="senhaC" value = "" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div> -->
                        </div>

                        <div class="row mb-3">
                            <div class="col-md">
                                <hr>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md">
                                <input type = "hidden" name = "contaRecuperado" value = "<?= $conta_r; ?>">
                                <input type="submit" name = "enviar" class = "botao botao-vermelho" value = "Salvar">
                            </div>
                        </div>       
                </form>
               
            </div>
            <div class="col-12 col-md">
                <img src="<?= $URL_IMG ?>extras/3255309.jpg" alt="" class="img-fluid p-5 d-flex justify-content-top">
            </div>
        </div>


                    <!-- Modal TROCA SENHA -->
                    <div class="modal fade" id="modal_nova_conta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                                <div class="modal-content">
                                
                                    <form action="" class = "gm-formularios" method="post" id = "formNovaSenhaMC">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class = "repostas" id = "repostas"></div>
                                        <div class="modal-body p-5 pt-1 pb-3 w-100 m-auto">
                                            <div class="row text-center mb-3">
                                                <div class="col-md">
                                                  <h5>Crie uma nova senha</h5>
                                                  <!-- <p class = "p-2">Adicione o e-mail do colaborador(a) que você deseja adicionar, e enviaremos um convite para ele(a).</p> -->
                                                </div>
                                            </div>
                                            
                                            <div class="row text-left mb-3">
                                              <div class="col-md-12 mb-3">
                                                  <label for="nomeAcesso" class="form-label">Nova senha</label>
                                                  <input type="password" name = "senha" class="form-control" id="senha" required>
                                                  <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                  <label for="senhaC" class="form-label">Repita a senha</label>
                                                  <input type="password" name = "senhaC" class="form-control" id="senhaC" required>
                                                  <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                                </div>
                                            </div>
                                            <input type="hidden" name = "urlAtual" class="form-control" id="urlAtual" value = "<?= $URL_ATUAL ?>">
                                            <input type="hidden" name = "contaRecuperado" class="form-control" id="contaRecuperado" value = "<?= $conta_r ?>">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                            <input type="submit" name = "enviar_convite" class = "botao botao-vermelho-f" value = "Criar senha">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  <!-- modal -->

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