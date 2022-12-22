<?php 
    include_once ('../aplicacao/configuracao.php'); 

     //recupera das da url
     @$retorno = $_GET['Retorno'];

   
?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= $URL_CSS ?>estilo.min.css" rel="stylesheet">

    <title>Bem-vindo | Primeiro Acesso | Gerencie mais</title>
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

        <div class="row">
          <div class="col-md">
          <?php
              if(isset($_GET['Status'])){
                  if($_GET['Status'] =="Ok"){        
                      echo '
                          <div class="row">
                              <div class="col">
                                  <div class="alert alert-success show" role="alert">
                                      <strong>Pronto!</strong> 
                                      Convite foi enviado para o e-mail do colaborador.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                              </div>
                          </div>            
                      ';
                  }

                  if($_GET['Status'] =="Erro"){        
                      echo '
                          <div class="row">
                              <div class="col">
                                  <div class="alert alert-danger show" role="alert">
                                      <strong>Ops!</strong> 
                                      Não foi possível enviar um convite. Tente mais tarde.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                              </div>
                          </div>            
                      ';
                  }
              }
             
               
               $link_email = $URL_BASE."contas/primeiroacesso.php?Acao=PrimeiroAcesso&Convite=Desativado&Status=Pendente&Email=felipe@gmail.com&conta=929282737363636";
 
          ?>

              <a href="<?= $link_email ?>">Clique</a>
          </div>
        </div>

<?php 
    //verifica se existe o e-mail
    if(isset($_GET['Email']) && isset($_GET['Convite'])){
    
        $email_r = $_GET['Email'];
        $convite_r = $_GET['Convite'];
        $conta_r = $_GET['conta'];

        $seleciona_r = "SELECT * FROM contas WHERE email = '$email_r' AND id = '$conta_r' AND convite = 'Ativo' LIMIT 1"; 
        $consulta_r = $conexao -> prepare($seleciona_r);
        $consulta_r -> execute();

        if(($consulta_r) AND ($consulta_r -> rowCount () != 0)){
            while($registo_r = $consulta_r -> fetch(PDO::FETCH_ASSOC)){        
    
?>
        <div class="row w-75 m-auto mt-4">
            <div class="col-md-9">
                <h5 class = "mb-4">Bem-vindo(a)! Vamos fazer o seu primeiro acesso</h5>
            </div>
        </div>

        <div class="row w-75 m-auto mt- mb-2">
            <div class="col-md-6">
                <div class = "repostas" id = "repostas"></div>
                <form action="" class = "gm-formularios" method = "post" id = "formPrimeiroAcesso">
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
                                    <input type="email" name = "email" class="form-control" id="email" value = "<?= $registo_r['email'] ?>" disabled title = "Você ainda não pode alterar o seu e-mail de acesso">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" name = "senha" class="form-control" id="senha" value = "<?= $registo_r['senha'] ?>" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="senhaC" class="form-label">Digite novamente sua senha</label>
                                    <input type="password" name = "senhaC" class="form-control" id="senhaC" value = "<?= $registo_r['senha'] ?>" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md">
                                <input type = "hidden" name = "contaRecuperado" value = "<?= $conta_r; ?>">
                                <input type="submit" name = "enviar" class = "botao botao-vermelho" value = "Salvar e entrar">
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