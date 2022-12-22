<?php 
    include_once ('../aplicacao/configuracao.php'); 

    @$retorno = $_GET['Retorno'];
   


   

?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author"  content="Felipe M Goncalves - l.felipe.m.goncalves@gmail.com"/>

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= $URL_CSS ?>estilo.min.css" rel="stylesheet">
    <title>Prévia Ajuda | Gerencie mais</title>
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
                    <a href="<?= $URL_BASE ?>app/centralDeAjuda.php?Acao=Listar" class = "links">Central de Ajuda</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Prévia</span>
                </div>

            </div>
        </div>
    </div>

<?php

if(isset($_GET['Rotativo'])){


    $RotativoRecebido = $_GET['Rotativo'];

    $seleciona = "SELECT * FROM ajuda_assunto WHERE id = '$RotativoRecebido' ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

                    if(isset($_GET['Status'])){
                        $statusGet = $_GET['Status'];
                        if($statusGet == 'MarcarLido'){
                            $altera = "UPDATE pedidosconsultor SET status='Lido' WHERE id = '$RotativoRecebido'";
                            $consultaAltera = $conexao -> prepare($altera);
                            $consultaAltera -> execute();
                        }
                    }

                    $assuntoReferencia = $registo['id'];

                
?>
    
    
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

            <div class="row mb-2">
                <div class="col-md">
                    <h5>Dados básicos</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="gm-box">

                        <div class="row mb-3">


                            <div class="col-md">
                                <div class="">
                                    <p>Titulo do Assunto</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['assunto'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->



            <div class="row mb-2">
                <div class="col-md">
                    <h5>Artigos do Assunto</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="gm-box">

                    <div class="row">
                        <div class="col-md mb-5 mt-3">
                            <a href="centralDeAjudaAddArtigo.php?AssuntoRef=<?= $assuntoReferencia ?>&Retorno=<?=  $URL_ATUAL ?>&Acao=Novo&Status=Criando" class = "botao botao-vermelho-f"> Criar novo artigo </a>
                        </div>
                    </div>

<?php
    $assuntoReferencia = $registo['id'];
    $selecionaArtigo = "SELECT * FROM ajuda WHERE assunto = '$assuntoReferencia' ";
    $consultaArtigo = $conexao -> prepare($selecionaArtigo);
    $consultaArtigo -> execute();

        if(($consultaArtigo) AND ($consultaArtigo -> rowCount () != 0)){

            while($registoArtigo = $consultaArtigo -> fetch(PDO::FETCH_ASSOC)){

?>

                        <div class="itens-conteudo">     
                                               
                            <div class="row mb-2 mt-2">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <p>Titulo</p>
                                        <p class = "fonte-18 cor-preto"><?= $registoArtigo['titulo'] ?><br>
                                            <?php if($registoArtigo['status'] == "Publicado"){ $bg = "success"; $title = "Esse conteúdo está publicado"; }elseif($registoArtigo['status'] == "Oculto"){ $bg = "primary"; $title = "Conteúdo está em 'Oculto' e não aparece no seu site"; } elseif($registoArtigo['status'] == "Lixeira"){ $bg = "warning";  $title = "Conteúdo está em 'Rascunho' e não aparece no seu site"; } ?>
                                            <span class="badge bg-<?= $bg ?> fonte-12 mt-2" title = "<?= $title ?>"><?= $registoArtigo['status'] ?></span>    
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <a class="botao botao-cinza-m" title = "Clique para editar" href="centralDeAjudaEdicaoArtigo.php?_Retorno_ext=<?= $URL_ATUAL ?>&Acao=Editar&_Rotativo_ext=<?= $registoArtigo['id'] ?>&AssuntoRef=<?= $assuntoReferencia ?>"><span class="material-icons-round icones">create</span></a> 
                                            </div>
                                            <div class="col-md-3">
                                            <?php if($registoArtigo['status'] == "Oculto") { $iconeVisivel = "remove_red_eye"; $textoVisivel = "Deixar visivel"; $textoLink = "Desocultar"; ?>
                                                <a class="botao botao-cinza-m" title = "Clique para ocultar conteúdo" href="acoesAjuda.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=<?= $textoLink ?>&_Rotativo_ext=<?= $registoArtigo['id'] ?>&Rotativo=<?= $assuntoReferencia ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span></a>
                                            <?php }elseif($registoArtigo['status'] != "Oculto"){ $iconeVisivel =  "visibility_off"; $textoVisivel = "Ocultar"; $textoLink = "Ocultar";  ?>
                                                <a class="botao botao-cinza-m" title = "Clique para ocultar conteúdo" href="acoesAjuda.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=<?= $textoLink ?>&_Rotativo_ext=<?= $registoArtigo['id'] ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span></a>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3">
                                            <?php if($registoArtigo['status'] == "Lixeira") { $iconeVisivelL = "restore"; $textoVisivelL = "Restaurar"; $textoLinkL = "Restaurar"; }
                                                  elseif($registoArtigo['status'] != "Lixeira") { $iconeVisivelL = "delete"; $textoVisivelL = "para a lixeira"; $textoLinkL = "Lixeira"; }?>
                                                    <a class="botao botao-cinza-m" title = "Clique para enviar para <?= $textoVisivelL ?>" href="acoesAjuda.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=<?= $textoLinkL ?>&_Rotativo_ext=<?= $registoArtigo['id'] ?>"><span class="material-icons-round icones"><?=  $iconeVisivelL ?></span></a>
                                            </div>

                                            <?php if($registoArtigo['status'] == "Lixeira") { ?>
                                            <div class="col-md-3">
                                                    <a class="botao botao-cinza-m" href="#" data-bs-toggle="modal" data-bs-target="#modal_lixo_<?= $registoArtigo['id'] ?>" title = "Clique para excluir o profissional permanentemente" ><span class="material-icons-round icones">delete_forever</span></a>
                                            </div>

                                                    <!-- Modal MOVENDO PARA A LIXEIRA -->
                                                    <div class="modal fade" id="modal_lixo_<?= $registoArtigo['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center pl-5 pr-5">
                                                                    <img src="<?= $URL_IMG ?>extras/32980671.jpg" width = "250px" alt="">
                                                                    <h5>Deseja excluir mesmo?</h5>
                                                                    <p class = "p-2">Ao clicar em "Sim, eliminar", você estará excluindo permanentimente "<?= $registoArtigo['titulo'] ?>" do banco de dados e não poderá ser recuperado. </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                                <a href = "acoesAjuda.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=Excluir&_Rotativo_ext=<?= $registoArtigo['id'] ?>" class="botao botao-vermelho-f">Sim, eliminar</a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class = "mt-2 mb-4">                        
                        </div>

<?php }  }else{
                echo '
                    <div class="row">
                        <div class="col">
                            <div class=" text-center pt-3 pb-3">
                                <img src="'.$URL_IMG.'extras/3024051.jpg" alt="" class="img-fluid" width = "300px">
                                <br>
                                <h5>Você ainda não adicionou artigos aqui.</h5>
                                <p class = "mt-5"><a href="centralDeAjudaAddArtigo.php?AssuntoRef='. $assuntoReferencia .'&Retorno='. $URL_ATUAL .'&Acao=Novo&Status=Criando" class = "botao botao-vermelho-f"> Criar artigo </a></p>
                            </div>
                        </div>
                    </div>            
                ';
            }

?> 

                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->
<?php
        }#fim verifica se é clinica
    

        }else{
        echo '
        
            <div class="row">
                <div class="col">
                    <div class=" text-center pt-3 pb-3">
                        <img src="'.$URL_IMG.'extras/3054292.jpg" alt="" class="img-fluid" width = "300px">
                        <br>
                        <h5>Ops! Algo deu errado ao carregar o conteúdo</h5>
                        <p class = "mt-5"><a href="'.$retorno.'" class = "botao botao-vermelho-f"> Voltar </a></p>
                    </div>
                </div>
            </div>            
        ';
        }

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
       
    ?>
   
  </body>
</html>