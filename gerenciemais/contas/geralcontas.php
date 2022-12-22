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

    <title>Geral das contas | Gerencie mais</title>
  </head>
  <body>

    
    <div class="container pt-2 pb-5" id="painel-entrar">
        <div class="row">
            <div class = "col-md">
                    <a href="<?= $URL_BASE ?>app/?Acao=Inicio" class = "links"> <span class="material-icons-round icones">arrow_back</span>Voltar ao painel</a>
                    
                    <!-- <a href="<?= $URL_BASE ?>app/centralDeAjuda.php?Acao=Listar" class = "links">Central de Ajuda</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Prévia</span> -->
            </div>
        </div>
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
                  if($_GET['Status'] =="AcaoRealizada"){        
                      echo '
                        <div class = "gm-mensagens">
                            <div class="row ">
                                <div class="col">
                                    <div class="p-4 alert alert-success show" role="alert">
                                        <strong>Pronto!</strong> <br>
                                        Ação realizada com sucesso!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style = "position: absolute; top: 5px; right: 5px;"></button>
                                    </div>
                                </div>
                            </div>       
                        </div> 
                      ';
                  }

                  if($_GET['Status'] =="Erro"){        
                      echo '
                      <div class = "gm-mensagens">
                          <div class="row">
                              <div class="col">
                                  <div class="p-4 alert alert-danger show" role="alert">
                                      <strong>Ocorreu algo!</strong> <br>
                                      Não foi possível fazer essa ação. Tente mais tarde.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style = "position: absolute; top: 5px; right: 5px;"></button>
                                      </div>
                              </div>
                            </div>
                        </div>            
                      ';
                  }
              }

             
          ?>
          </div>
        </div>

        <div class="row w-75 m-auto mt-4">
            <div class="col-md-3">
                <h5 class = "mb-4">Contas de acesso</h5>
            </div>
        </div>

        <div class="row w-75 m-auto mt-4 mb-5">
            <div class="col-md-3">
                <a href="" data-bs-toggle="modal" data-bs-target="#modal_nova_conta" class = "botao botao-vermelho-f" title = "Clique para criar um novo conteúdo">Novo acesso</a>


                      <!-- Modal OCULTAR CONTEUDO -->
                        <div class="modal fade" id="modal_nova_conta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class = "repostas" id = "repostas"></div>
                                    <form action="" class = "gm-formularios" method="post" id = "formConvite">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5 pt-1 pb-3 w-100 m-auto">
                                            <div class="row text-center mb-3">
                                                <div class="col-md">
                                                  <img src="<?= $URL_IMG ?>/extras/3646374.jpg" width = "250px" alt=""><br>
                                                  <h5>Convide um(a) novo(a) colaborador(a)</h5>
                                                  <!-- <p class = "p-2">Adicione o e-mail do colaborador(a) que você deseja adicionar, e enviaremos um convite para ele(a).</p> -->
                                                </div>
                                            </div>

                                            <div class="row text-left mb-3">
                                              <div class="col-md">
                                                  <label for="nomeAcesso" class="form-label">Primeiro nome</label>
                                                  <input type="text" name = "nomeAcesso" class="form-control" id="nomeAcesso" required>
                                                  <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                                </div>
                                                <div class="col-md">
                                                  <label for="emailAcesso" class="form-label">E-mail</label>
                                                  <input type="email" name = "emailAcesso" class="form-control" id="emailAcesso" required>
                                                  <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                                </div>
                                            </div>

                                            <div class="row text-left mb-3">
                                                <div class="col-md">
                                                  <label for="nivelAcesso" class="form-label selectpicker">Nível de acesso</label>                                      
                                                  <select class="form-select" name = "nivelAcesso" id="nivelAcesso" required>
                                                      <option value=""></option>
                                                      
                                                      <option value="Consultor">Consultor - Acesso: Solicitações de 'Contatos' e 'Fale com um consultor' </option>
                                                      <option value="Editor">Editor - Acesso: 'Profissionais', 'Solicitações de 'Credenciamentos', 'Central de ajuda' e 'Central de Privacidade'</option>
                                                      <option value="Mestre">Mestre - Acesse todas as abas</option>
                                                  </select>
                                                  <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                            <input type="submit" name = "enviar_convite" class = "botao botao-vermelho-f" value = "Enviar convite">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  <!-- modal -->
            </div>
        </div>

        

        <div class="row w-75 m-auto">
            <div class="col-12 col-md-12 justify-content-xl-center">
            <div class="box">
                    <div class="listas-de-conteudo">
<?php
    //recebe a paginacao
    $paginaAtual = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

    $seleciona = "SELECT * FROM contas WHERE status != 'Lixeira' ORDER BY ordem DESC ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

?>
                         <div class = "row listas-de-conteudo-item ">
                            <div class="col-md-10">
                                <p class = "fonte-16"><?= $registo['nome'] ?></p>
                                <p class = "fonte-14"><?= $registo['nivelAcesso'] ?> | <?= $registo['email'] ?></p>
                            </div>
                            <div class="col-2 col-md-1 text-left"><!-- status publicacao -->
                                <?php if($registo['status'] == "Ativo"){ $bg = "success"; $title = "Ativo"; }
                                  elseif($registo['status'] == "Pendente" ){ $bg = "primary";  $title = "Pendente"; } 
                                  elseif($registo['status'] == "Bloqueado"){ $bg = "warning"; $title = "Bloqueado"; } ?>
                                <span class="badge bg-<?= $bg ?> fonte-11 mt-2" title = "<?= $title ?>"><?= $registo['status'] ?></span>
                            </div><!-- col-md status pulicacao -->

                            <div class="col-md-1 text-center">
                                <!-- opções de ação -->
                                <div class="dropdown">
                                    <a class="botao botao-nulo dropdown-toggle" title = "Clique para abrir mais opções" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-icons-round icones">more_vert</span>
                                        <span class="para-mobile">Opções</span>
                                        <!-- futuramente colocar um modal -->
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                        <?php if($registo['status'] != "Pendente") { ?>
                                            <?php if($registo['status'] == "Bloqueado") { $iconeVisivel = "lock_open"; $textoVisivel = "Desbloquear"; $textoLink = "Desbloquear"; ?>
                                            <li><a class="dropdown-item" href = "geralcontas.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=<?= $textoLink ?>&Rotativo=<?= $registo['id'] ?>&Status=<?= $textoLink ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span> <?= $textoVisivel ?></a></li>
                                            <?php }elseif($registo['status'] == "Ativo"){ $iconeVisivel =  "lock"; $textoVisivel = "Bloquear"; $textoLink = "Bloquear"; ?>
                                            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal_block_<?= $registo['id'] ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span> <?= $textoVisivel ?></a></li>
                                            <?php } ?>
                                        <?php } ?>
                                            <li><a class="dropdown-item " href="niveldeacesso.php?Acao=ListaConta&Conta=<?= $registo['id'] ?>"><span class="material-icons-round icones">manage_accounts</span> Nível de acesso</a></li>
                                            <li><a class="dropdown-item cor-vermelho" href="#" data-bs-toggle="modal" data-bs-target="#modal_lixo_<?= $registo['id'] ?>"><span class="material-icons-round icones">delete</span> Excluir</a></li>
                                    </ul>


                                         <!-- Modal MOVENDO PARA A LIXEIRA -->
                                         <div class="modal fade" id="modal_block_<?= $registo['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center pl-5 pr-5">
                                                <img src="<?= $URL_IMG ?>extras/3249757.jpg" width = "250px" alt="">
                                                        <h5>Bloquear <?= $registo['nome'] ?>?</h5>
                                                        <p class = "p-2">Ao fazer essa ação, o usuário "<?= $registo['nome'] ?>" não poderá acessar o Gerencie mais.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href = "geralcontas.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Bloquear&Rotativo=<?= $registo['id'] ?>&Status=BloquearConta" class="botao botao-vermelho-f">Sim, bloquear</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- Modal MOVENDO PARA A LIXEIRA -->
                                        <div class="modal fade" id="modal_lixo_<?= $registo['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center pl-5 pr-5">
                                                <img src="<?= $URL_IMG ?>extras/3249757.jpg" width = "250px" alt="">
                                                        <h5>Excluir para sempre?</h5>
                                                        <p class = "p-2">Ao clicar em "Sim, excluir conta", a conta de <strong>"<?= $registo['nome'] ?>"</strong> não poderá mais acessar o Gerencie mais.<br> Tem certeza disso?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href = "geralcontas.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Excluir&Rotativo=<?= $registo['id'] ?>&Status=ExcluirConta" class="botao botao-vermelho-f">Sim, excluir conta</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div><!-- lista-item -->
<?php  
                 }#fecha while
              }#if principal

?>

                    </div><!-- listas-de-conteudo-->

                </div><!-- box -->

            </div>
        </div>
    </div>
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
   
<?php
        //Edicao dos botoes
        //verifica se existe a tag ação da url
        if (isset($_GET['novaAcao'])) {

            //recebendo valores das tags pela URL
            $acaoRecebida = $_GET['novaAcao'];
            $acaoRetorno = $_GET['Retorno'];
            $acaoStatus = $_GET['Status'];
            $acoRotativo = $_GET['Rotativo'];

            //OCUTANDO conteúdo
            if ($acaoRecebida == "Bloquear") {

                // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "UPDATE contas SET status = 'Bloqueado' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                    if($consultaAcao){
                        
                        echo    
                            "<script type = 'text/JavaScript'>
                                window.location = '". $acaoRetorno ."&Status=AcaoRealizada';
                            </script>";

                    }
                    else{
                        echo "algo deu errado";
                    }

            }

            //DESOCUTANDO conteúdo
            if ($acaoRecebida == "Desbloquear") {

               // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "UPDATE contas SET status = 'Ativo' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                    if($consultaAcao){
                        
                        echo    
                            "<script type = 'text/JavaScript'>
                                window.location = '". $acaoRetorno ."&Status=AcaoRealizada';
                            </script>";
                            
                    }

            }

            //MOVENDO PRA LIXEIRA conteúdo
            if ($acaoRecebida == "Lixeira") {

                 // echo "Ok! Vamos ocultar conteúdo";
                 $selecionaAcao = "UPDATE contas SET status = 'Lixeira' WHERE id = '$acoRotativo'";
                 $consultaAcao = $conexao -> prepare($selecionaAcao);
                 $consultaAcao -> execute();
 
                     if($consultaAcao){
                         
                         echo    
                             "<script type = 'text/JavaScript'>
                                 window.location = '". $acaoRetorno ."&Status=AcaoRealizada';
                             </script>";
                             
                     }

            }

            //MOVENDO PRA LIXEIRA conteúdo
            if ($acaoRecebida == "Excluir") {

                // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "DELETE FROM contas WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                    if($consultaAcao){
                        
                        echo    
                            "<script type = 'text/JavaScript'>
                                window.location = '". $acaoRetorno ."&Status=AcaoRealizada';
                            </script>";
                            
                    }

           }

        }
    ?>
  </body>
</html>