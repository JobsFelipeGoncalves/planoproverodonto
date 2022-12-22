<?php include_once ('../aplicacao/configuracao.php'); ?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author"  content="Felipe M Goncalves - l.felipe.m.goncalves@gmail.com"/>

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= $URL_CSS ?>estilo.min.css" rel="stylesheet">
    <title>Contatos | Lixo | Gerencie mais</title>
  </head>
  <body>
    
    <!-- top -->    
    <?php require_once('header.php'); ?>

    <!-- navegação -->
    <div class="navegacao-pagina" id="navegacao-pagina">
        <div class="container pt-3 pb-4">
            <div class="row">
                <div class="col-md fonte-20">
                    <!-- <a href="" class = "botao-navegacao" alt = "Voltar" title = "Clique para retornar"><i class="fi-rr-arrow-small-left icones fonte-30"></i></a> -->
                    <a href="<?= $URL_BASE ?>app/?Acao=Inicio" class = "links">Início</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <a href="<?= $URL_BASE ?>app/solicitacoesConsultor.php?Acao=Listar" class = "links">Fale com um consultor</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Lixeira</span>
                </div>

            </div>
        </div>
    </div>



    <!-- listagem -->    
    <div class="container w-75 mb-3 mt-4">

        <div class="row mb-2 mt-2 pt-3 pb-2">
            <div class="col-md-10"></div>
            <div class="col-md-2">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_limpar_lixo" class = "botao botao-vermelho-f" title = "Clique para criar um novo conteúdo"> Limpar lixeira</a>

                <!-- Modal ELIMINAR -->
                <div class="modal fade" id="modal_limpar_lixo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center pl-5 pr-5">
                                    <img src="<?= $URL_IMG ?>extras/32980671.jpg" width = "200px" alt="">
                                    <h5>Deseja excluir tudo?</h5>
                                    <p class = "p-2">Ao fazer essa ação você irá <strong>excluir permanentemente todos os dados da lixeira</strong> e não poderá ser recuperado.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                <a href = "solicitacoesConsultorLixo.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=LimparLixo&Status=LimparLixo" class="botao botao-vermelho-f">Excluir tudo</a>
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
       

        <?php
            if(isset($_GET['Status'])){

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

        <div class="row mb-4 mb-2 mt-2">
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

    $seleciona = "SELECT * FROM  pedidosconsultor WHERE status = 'Lixeira' ORDER BY ordem DESC LIMIT $inicio, $limiteRegistro  ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

                

?>
                        <div class = "row listas-de-conteudo-item "> 
                            <div class="col-md-9">
                                <p class = "fonte-16"><b class = "cor-"><?= $registo['nome'] ?></b> solicitou um contato</p>
                                <p class = "fonte-12">Recebido em <?= $registo['data'] ?></p>
                            </div>
                            <div class="col-2 col-md-2 text-left"><!-- status publicacao -->
                                <?php if($registo['status'] == "Lido"){ $bg = "success"; $title = "Esse pedido já foi lido"; }elseif($registo['status'] == "Não lido"){ $bg = "danger"; $title = "Esse pedido ainda não foi lido"; } ?>
                                <span class="badge bg-<?= $bg ?> fonte-11 mt-2" title = "<?= $title ?>"><?= $registo['status'] ?></span>
                            </div><!-- col-md status pulicacao -->

                            <div class="col-md-1 text-center">
                                <!-- opções de ação -->
                                <div class="dropdown">
                                    <a class="botao botao-nulo dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-icons-round icones">more_vert</span>
                                        <span class="para-mobile">Opções</span>
                                        <!-- futuramente colocar um modal -->
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="solicitacoesConsultorPrevia.php?Acao=Visualizar&Rotativo=<?= $registo['id'] ?>&Status=AbertoLixeira"><span class="material-icons-round icones">description</span>Ver detalhes</a></li>
                                        
                                        <li><a class="dropdown-item" href = "solicitacoesConsultorLixo.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Restaurar&Rotativo=<?= $registo['id'] ?>&Status=Restaurar"><span class="material-icons-round icones">auto_delete</span>Restaurar</a></li>
                                        
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal_lixo_<?= $registo['id'] ?>"><span class="material-icons-round icones">delete</span> Eliminar</a></li>
                                        
                                    </ul>


                                        <!-- Modal MOVENDO PARA A LIXEIRA -->
                                        <div class="modal fade" id="modal_lixo_<?= $registo['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center pl-5 pr-5">
                                                <img src="<?= $URL_IMG ?>extras/32980671.jpg" width = "200px" alt="">
                                                        <h5>Deseja excluir mesmo?</h5>
                                                        <p class = "p-2">Ao clicar em <strong>"Sim, eliminar"</strong>, você estará excluindo permanentimente "<?= $registo['nome'] ?>" do banco de dados e não poderá ser recuperado.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href = "solicitacoesConsultorLixo.php?Retorno=<?= $URL_ATUAL ?>&novaAcao=Excluir&Rotativo=<?= $registo['id'] ?>&Status=Excluir" class="botao botao-vermelho-f">Sim, eliminar</a>
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
                 $contaRegisto = "SELECT COUNT(id) AS numeroAchado FROM  pedidosconsultor";
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
                            <?php for ($paginaAnterior = $paginaRecebida - $maximoDeLink; $paginaAnterior <= $paginaRecebida - 1; $paginaAnterior ++) { if($paginaAnterior >= 1){ ?>
                            <li class="page-item"><a class="page-link" href="?pagina=<?= $paginaAnterior ?>&Acao=Listar"><?= $paginaAnterior ?></a></li>
                            <?php } }#fim "if" e "for" anterior ?>

                                <li class="page-item active"><a class="page-link " href="#"><?= $paginaRecebida ?></a></li>

                            <?php for($proximaPagina =  $paginaRecebida + 1; $proximaPagina <= $paginaRecebida + $maximoDeLink; $proximaPagina ++){ if($proximaPagina <= $quantidadePagina){ ?>
                            <li class="page-item"><a class="page-link" href="?pagina=<?= $proximaPagina ?>&Acao=Listar"><?= $proximaPagina ?></a></li>
                            <?php } }#fim "if" e "for" proximo ?>
                            
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
                                <img src="'.$URL_IMG.'extras/2859689.jpg" alt="" class="img-fluid" width = "300px">
                                <br>
                                <h5>Lixeira vazia!</h5>
                                <p>Você ainda não mandou nada para a lixeira ou já limpou ela mais cedo.</p>
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

            //RESTAURANDO
            if ($acaoRecebida == "Restaurar") {

                // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "UPDATE pedidosconsultor SET status = 'Não lido' WHERE id = '$acoRotativo'";
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
            if ($acaoRecebida == "Excluir") {

                // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "DELETE FROM pedidosconsultor WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                    if($consultaAcao){                            
                        echo    
                            "<script type = 'text/JavaScript'>
                                window.location = '". $acaoRetorno ."&Status=AcaoRealizada';
                            </script>";
                            
                    }else{

                        echo "Clínica não foi excluida, pois ocorreu um erro.";

                    }

            }

            //excluir
            if ($acaoRecebida == "LimparLixo") {

                // echo "Ok! Vamos ocultar conteúdo";
                 $selecionaAcao = "DELETE FROM pedidosconsultor WHERE status = 'Lixeira'";
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