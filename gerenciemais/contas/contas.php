<?php ob_start(); include_once ('../../aplicacao/configuracao.php'); ?>
<!doctype html>
<html lang="pt-br">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author"  content="Felipe M Goncalves - l.felipe.m.goncalves@gmail.com"/>

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= $URL_CSS ?>estilo.min.css" rel="stylesheet">
    <title>Contas de Acesso | Gerencie mais</title>
  </head>
  <body>
    
    <!-- top -->    
    <?php require_once('header.php'); ?>

    <!-- navegação -->
    <div class="navegacao-pagina mb-4" id="navegacao-pagina">
        <div class="container pt-3 pb-4">
            <div class="row">
                <div class="col-md fonte-20">
                    <!-- <a href="" class = "botao-navegacao" alt = "Voltar" title = "Clique para retornar"><i class="fi-rr-arrow-small-left icones fonte-30"></i></a> -->
                    <a href="<?= $URL_BASE ?>app/?Acao=Inicio" class = "links">Início</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Contas de acesso</span>
                </div>

            </div>
        </div>
    </div>

    
    <!-- listagem -->    
    <div class="container w-75 mb-3">
<?php
    if(isset($_GET['Status'])){
        if($_GET['Status'] =="Ok"){        
            echo '
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success show" role="alert">
                            <strong>Pronto!</strong> 
                            Seu conteúdo foi publicado.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>            
            ';
        }

        if($_GET['Status'] =="AcaoRealizada"){        
            echo '
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success show" role="alert">
                            <strong>Pronto!</strong> 
                            Seu conteúdo foi atualizado com sucesso.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>            
            ';
        }
    }
?>

        <div class="row mb-2 mt-2 pt-3 pb-2">
            <div class="col-md-3">
                <a href="novaconta.php?Retorno=<?= $URL_ATUAL ?>" data-bs-toggle="modal" data-bs-target="#modal_nova_conta" class = "botao botao-vermelho-f" title = "Clique para criar um novo conteúdo"> + Adicionar novo</a>
                        <!-- Modal OCULTAR CONTEUDO -->
                        <div class="modal fade" id="modal_nova_conta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-5">
                                        <img src="<?= $URL_IMG ?>extras/3249757.jpg" width = "250px" alt="">
                                        <h5>Convide uma(a) novo(a) colaborador(a)?</h5>
                                        <!-- <p class = "p-2">Adicione o e-mail do colaborador(a) que você deseja adicionar, e enviaremos um convite para ele(a).</p> -->

                                        <form action="" class = "">
                                            <div class="formulario formulario-login">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="email-acesso" placeholder="name@example.com">
                                                    <label for="email-acesso">Digite o e-mail que enviaremos um convite</label>
                                                </div>
                                            </div>
                                        </form>     

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                    <input type="submit" name = "enviar" class = "botao botao-vermelho-f" value = "Enviar convite">
                                </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        
       
        <div class="row mb-4">
            <div class="col-md pesquisa-rapida">
                <hr> 
            </div>
        </div>

        <div class="row ">
            <div class="col-12 col-md-12">

                <div class="box">
                    <div class="listas-de-conteudo">
<?php
    //recebe a paginacao
    $paginaAtual = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);
    $paginaRecebida = (!empty($paginaAtual)) ? $paginaAtual : 1; 

    //quatindade de registro
    $limiteRegistro = 15;

    //calculo do inico da visualização
    $inicio =  ($limiteRegistro * $paginaRecebida) - $limiteRegistro;

    $seleciona = "SELECT * FROM privacidades WHERE status != 'Lixeira' ORDER BY ordem DESC LIMIT $inicio, $limiteRegistro  ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

?>
                         <div class = "row listas-de-conteudo-item ">
                            <div class="col-md-10">
                                <p class = "fonte-16"><?= $registo['titulo'] ?></p>
                                <p class = "fonte-12">Publicado em <?= $registo['data'] ?> por <?= $registo['autor'] ?></p>
                            </div>
                            <div class="col-2 col-md-1 text-left"><!-- status publicacao -->
                                <?php if($registo['status'] == "Publicado"){ $bg = "success"; $title = "Esse conteúdo está publicado"; } elseif($registo['status'] == "Lixeira"){ $bg = "warning";  $title = "Conteúdo está em 'Rascunho' e não aparece no seu site"; } elseif($registo['status'] == "Oculto"){ $bg = "primary"; $title = "Conteúdo está em 'Oculto' e não aparece no seu site"; } ?>
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
                                        <li><a class="dropdown-item" href="centralDePrivacidadeEdicao.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Editar&Rotativo=<?= $registo['id'] ?>&Status=Editando"><span class="material-icons-round icones">lock</span>Bloquear</a></li>
                                        <li><a class="dropdown-item" href="centralDePrivacidadeEdicao.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Editar&Rotativo=<?= $registo['id'] ?>&Status=Editando"><span class="material-icons-round icones">lock_open</span>Desbloquear</a></li>
                                        <li><a class="dropdown-item" href="centralDePrivacidadeEdicao.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Editar&Rotativo=<?= $registo['id'] ?>&Status=Editando"><span class="material-icons-round icones">manage_accounts</span>Permissões</a></li>
                                        <li><a class="dropdown-item" href="centralDePrivacidadeEdicao.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Editar&Rotativo=<?= $registo['id'] ?>&Status=Editando"><span class="material-icons-round icones">person_remove</span>Excluir conta</a></li>
                                        <!-- <li><a class="dropdown-item" href="profissionalPrevia.php?Retorno=<?= $URL_ATUAL ?>&Acao=Visualizar&Rotativo=023928342348273497238472&Status=Previa"><span class="material-icons-round icones">description</span>Ver detalhes</a></li> -->
                                        <li><a class="dropdown-item" href="centralDePrivacidadeEdicao.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Editar&Rotativo=<?= $registo['id'] ?>&Status=Editando"><span class="material-icons-round icones">create</span>Editar</a></li>
                                        <?php if($registo['status'] == "Oculto") { $iconeVisivel = "remove_red_eye"; $textoVisivel = "Deixar visivel"; $textoLink = "Desocultar"; ?>
                                        <li><a class="dropdown-item" href = "centralDePrivacidade.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=<?= $textoLink ?>&Rotativo=<?= $registo['id'] ?>&Status=<?= $textoLink ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span> <?= $textoVisivel ?></a></li>
                                        <?php }elseif($registo['status'] != "Oculto"){ $iconeVisivel =  "visibility_off"; $textoVisivel = "Ocultar"; $textoLink = "Ocultar"; ?>
                                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal_ocultar_<?= $registo['id'] ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span> <?= $textoVisivel ?></a></li>
                                        <?php } ?>
                                        <!-- <li><a class="dropdown-item" href="centralDePrivacidade.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Lixeira&Rotativo=<?= $registo['id'] ?>&Status=MoverLixeira"><span class="material-icons-round icones">delete</span> Lixeira</a></li> -->
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal_lixo_<?= $registo['id'] ?>"><span class="material-icons-round icones">delete</span> Lixeira</a></li>
                                    </ul>

                                     <!-- Modal OCULTAR CONTEUDO -->
                                     <div class="modal fade" id="modal_ocultar_<?= $registo['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center pl-5 pr-5">
                                                        <img src="<?= $URL_IMG ?>extras/3249757.jpg" width = "250px" alt="">
                                                        <h5>Ocultar esse conteúdo?</h5>
                                                        <p class = "p-2">Ao clicar em <strong>"Sim, ocultar"</strong>, o "<?= $registo['titulo'] ?>" não será visível para os usuários.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href = "centralDePrivacidade.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=<?= $textoLink ?>&Rotativo=<?= $registo['id'] ?>&Status=<?= $textoLink ?>" class="botao botao-vermelho-f">Sim, ocultar</a>
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
                                                        <h5>Mover para a lixeira?</h5>
                                                        <p class = "p-2">Você pode recuperar o "<?= $registo['titulo'] ?>" lá na lixeira depois, ok?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href = "centralDePrivacidade.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Lixeira&Rotativo=<?= $registo['id'] ?>&Status=MoverLixeira" class="botao botao-vermelho-f">Mover para o lixo</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div><!-- lista-item -->
<?php  
                 }#fecha while

                 //Conta a quantidade de registo no meu banco
                 $contaRegisto = "SELECT COUNT(id) AS numeroAchado FROM privacidades";
                    $quantidadeRegistros = $conexao -> prepare($contaRegisto);
                    $quantidadeRegistros -> execute();
                    $quantidadePesquisa = $quantidadeRegistros -> fetch(PDO::FETCH_ASSOC);

                    //arredondo valor
                    $quantidadePagina = ceil (($quantidadePesquisa['numeroAchado'] / $limiteRegistro) - 1 );

                    //maximo de link para exibir antes e depois do atual
                    $maximoDeLink = 2;

?>

                    </div><!-- listas-de-conteudo-->

                </div><!-- box -->
            </div><!-- col-md -->            
        </div><!-- row -->

        <div class="row mt-5">
            <div class="col-md">
                <nav aria-label="..." class = "paginacao">
                    <ul class="pagination justify-content-end">
                        <!-- <li class="page-item "><a class="page-link" href="?pagina=1&Acao=Listar">Primeira página</a></li> -->

                            <?php for ($paginaAnterior = $paginaRecebida - $maximoDeLink; $paginaAnterior <= $paginaRecebida - 1; $paginaAnterior ++) { if($paginaAnterior >= 1){ ?>
                            <li class="page-item"><a class="page-link" href="?pagina=<?= $paginaAnterior ?>&Acao=Listar"><?= $paginaAnterior ?></a></li>
                            <?php } }#fim "if" e "for" anterior ?>

                                <li class="page-item active"><a class="page-link " href="#"><?= $paginaRecebida ?></a></li>

                            <?php for($proximaPagina =  $paginaRecebida + 1; $proximaPagina <= $paginaRecebida + $maximoDeLink; $proximaPagina ++){ if($proximaPagina <= $quantidadePagina){ ?>
                            <li class="page-item"><a class="page-link" href="?pagina=<?= $proximaPagina ?>&Acao=Listar"><?= $proximaPagina ?></a></li>
                            <?php } }#fim "if" e "for" proximo ?>
                            
                        <!-- <li class="page-item"><a class="page-link" href="?pagina=<?= $quantidadePagina ?>&Acao=Listar">Última página</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
<?php
            }else{
                echo '
                    <div class="row">
                        <div class="col">
                            <div class=" text-center pt-3 pb-3">
                                <img src="'.$URL_IMG.'extras/3024051.jpg" alt="" class="img-fluid" width = "300px">
                                <br>
                                <h5>Parece que você ainda não criou algo.</h5>
                                <p>Clique em "Adicionar novo".</p>
                            </div>
                        </div>
                    </div>            
                ';
            }
?>                   
              
    </div><!-- row e container -->


    <!-- footer -->
    <?php require_once('footer.php'); ?>

    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>

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
            if ($acaoRecebida == "Ocultar") {

                // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "UPDATE privacidades SET status = 'Oculto' WHERE id = '$acoRotativo'";
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
            if ($acaoRecebida == "Desocultar") {

               // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "UPDATE privacidades SET status = 'Publicado' WHERE id = '$acoRotativo'";
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
                 $selecionaAcao = "UPDATE privacidades SET status = 'Lixeira' WHERE id = '$acoRotativo'";
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