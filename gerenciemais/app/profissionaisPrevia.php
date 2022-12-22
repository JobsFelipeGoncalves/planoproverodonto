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
    <title>Prévia Profissional | Gerencie mais</title>
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
                    <a href="profissionais.php?Acao=Listar" class = "links">Profissionais</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Prévia</span>
                </div>

            </div>
        </div>
    </div>

<?php

if(isset($_GET['Rotativo'])){


    $RotativoRecebido = $_GET['Rotativo'];

    $seleciona = "SELECT * FROM credenciados WHERE id = '$RotativoRecebido' ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){



                
?>
    
    
    <div class="container w-75 mb-3">

            <div class="row mb-2 mt-2 pt-3 pb-2">
                <div class="col-md-10"><!-- nulo --></div>
                <div class="col-md-2">
                    <a class = "botao botao-cinza" href="profissionaisEdicao.php?Retorno=<?= $URL_ATUAL ?>&Acao=Editar&Rotativo=<?= $RotativoRecebido ?>&Status=Editando"><span class="material-icons-round icones">create</span>Editar</a>
                </div> 
            </div>

            
            <div class="row mb-4">
                <div class="col-md pesquisa-rapida">
                    <hr>    
                </div>
            </div>

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

                    <?php 
                        if($registo['tipoCred'] == 'Dentista'){

                        
                    ?>
                    
                        <div class="row mb-3">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <p>Nome</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['nome'] ?></p>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <p>Conselho Regional de Odontologia (CRO)</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['numeroCRO'] ?>/<?= $registo['estadoCRO'] ?></p>
                                </div>
                            </div>
                        </div>


                       <?php
                             }elseif($registo['tipoCred'] == 'Clínica'){

                           
                       ?>
                        <div class="row mb-3">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <p>Nome fantasia</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['nomeFantasia'] ?></p>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <p>CNPJ</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['cnpj'] ?></p>
                                </div>
                            </div>
                        </div>


                        <?php } ?>

                        <div class="row mb-1">
                            <div class="col-md">
                                <div class="mb-3">
                                    <p>Telefone fixo</p>
                                    <p class = "fonte-18 cor-preto"><?php echo $registo['telefoneF']  != "" ?  $registo['telefoneF'] : "<span class = 'cor-preto-c fonte-14'>NÚMERO NÃO ADICIONADO</span>"; ?></p>
                                    <!-- <p class = "mt-2 mb-4"><a href="" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">call</span>Ligar agora </a></p> -->
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <p>Telefone celular</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['telefoneC'] ?></p>
                                    <!-- <p class = "mt-2 mb-4"><a href="" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">phone_iphone</span>Ligar agora </a></p> -->
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <p>Telefone alternativo</p>
                                    <p class = "fonte-18 cor-preto"><?php echo $registo['telefoneO']  != "" ?  $registo['telefoneO'] : "<span class = 'cor-preto-c fonte-14'>NÚMERO NÃO ADICIONADO</span>"; ?></p>
                                    <!-- <p class = "mt-2 mb-4"><a href="" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">call</span>Ligar agora </a></p> -->
                                </div>
                            </div>
                        </div>
                        
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->


            <div class="row mb-2">
                <div class="col-md">
                    <h5>Especialidades</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="gm-box">

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="">
                                    <p>Especialidade(s) de atendimento </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="">
                            <p class = "fonte-18 cor-preto">
                                <?php echo $registo['espConsulta'] != "" ?  $registo['espConsulta']."," : " ";  ?>
                                <?php echo $registo['espUrgencia'] != "" ?  $registo['espUrgencia']."," : " ";  ?>
                                <?php echo $registo['espCirugia'] != "" ?  $registo['espCirugia']."," : " ";  ?>
                                <?php echo $registo['espRadiologia'] != "" ?  $registo['espRadiologia']."," : " ";  ?>
                                <?php echo $registo['espOdontopediatra'] != "" ?  $registo['espOdontopediatra']."," : " ";  ?>
                                <?php echo $registo['espDentistica'] != "" ?  $registo['espDentistica']."," : " ";  ?>
                                <?php echo $registo['espPeriodontia'] != "" ?  $registo['espPeriodontia']."," : " ";  ?>
                                <?php echo $registo['espPeriodontia'] != "" ?  $registo['espPeriodontia']."," : " ";  ?>
                                <?php echo $registo['espProteses'] != "" ?  $registo['espProteses'] : " ";  ?>
                            
                            </p>
                            </div>
                        </div>

                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->

            <div class="row mb-2">
                <div class="col-md">
                    <h5>Local de atendimento</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="gm-box">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="">
                                    <p>Endereço</p> 
                                    <p class = "fonte-18 cor-preto">
                                    <?php echo $registo['endereco'] != "" ?  $registo['endereco']."," : " ";  ?>
                                    <?php echo $registo['numero'] != "" ?  $registo['numero']."," : " ";  ?>
                                    <?php echo $registo['complemento'] != "" ?  $registo['complemento']."," : " ";  ?>
                                    <?php echo $registo['bairro'] != "" ?  $registo['bairro']."," : " ";  ?>
                                    <?php 
                                        if($registo['cidade'] != ''){
                                            $dadosCidade = $registo['cidade'];
                                            $selecioneCidade = "SELECT * FROM cidade WHERE id = '$dadosCidade'";
                                            $consultaCidade = $conexao -> prepare($selecioneCidade);
                                            $consultaCidade -> execute();
                                                if(($consultaCidade) AND ($consultaCidade -> rowCount () != 0)){
                                                    while($registoCidade = $consultaCidade -> fetch(PDO::FETCH_ASSOC)){
                                                        echo $registoCidade['nome'].",";
                                                    }
                                                }
                                        }
                                        // echo $registo['cidade'] != "" ?  $registo['cidade']."," : " ";  
                                        
                                    ?>
                                    <?php 
                                        if($registo['estado'] != ''){
                                            $dadosEstado = $registo['estado'];
                                            $selecioneEstado = "SELECT * FROM estado WHERE id = '$dadosEstado'";
                                            $consultaEstado = $conexao -> prepare($selecioneEstado);
                                            $consultaEstado -> execute();
                                                if(($consultaEstado) AND ($consultaEstado -> rowCount () != 0)){
                                                    while($registoEstado = $consultaEstado -> fetch(PDO::FETCH_ASSOC)){
                                                        echo $registoEstado['nome'].",";
                                                    }
                                                }
                                        }
                                        
                                    ?>
                                    <?php echo $registo['cep'] != "" ?  $registo['cep'] : " ";  ?>
                                    </p>
                                    <!-- <p class = "mt-2 mb-2"><a href="http://maps.google.com.br/maps?q=proversaudedourados" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">location_on</span> Abrir mapa</a></p> -->
                                </div>
                            </div>
                        </div>

                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->

        <?php 

        if($registo['tipoCred'] == 'Clínica'){

        ?>

            <div class="row mb-2">
                <div class="col-md">
                    <h5>Dentista(s) em <?= $registo['nomeFantasia'] ?></h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="gm-box">
<?php
    $clinicaReferencia = $registo['id'];
    $selecionaDentista = "SELECT * FROM credenciados_ext WHERE clinica = '$clinicaReferencia' ";
    $consultaDentista = $conexao -> prepare($selecionaDentista);
    $consultaDentista -> execute();

        if(($consultaDentista) AND ($consultaDentista -> rowCount () != 0)){

            while($registoDentista = $consultaDentista -> fetch(PDO::FETCH_ASSOC)){

?>

                        <div class="itens-conteudo">                        
                            <div class="row mb-2 mt-2">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <p>Nome</p>
                                        <p class = "fonte-18 cor-preto"><?= $registoDentista['nome'] ?><br>
                                            <?php if($registoDentista['status'] == "Publicado"){ $bg = "success"; $title = "Esse conteúdo está publicado"; }elseif($registoDentista['status'] == "Oculto"){ $bg = "primary"; $title = "Conteúdo está em 'Oculto' e não aparece no seu site"; } elseif($registoDentista['status'] == "Lixeira"){ $bg = "warning";  $title = "Conteúdo está em 'Rascunho' e não aparece no seu site"; } ?>
                                            <span class="badge bg-<?= $bg ?> fonte-12 mt-2" title = "<?= $title ?>"><?= $registoDentista['status'] ?></span>    
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <p>Conselho Regional de Odontologia (CRO)</p>
                                        <p class = "fonte-18 cor-preto"><?= $registoDentista['cro'] ?>/<?= $registoDentista['croUF'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <a class="botao botao-cinza-m" title = "Clique para editar" href="profissionaisAddDentistaClínicaEditar.php?_Retorno_ext=<?= $URL_ATUAL ?>&Acao=Editar&_Rotativo_ext=<?= $registoDentista['id'] ?>&ClinicaRef=<?= $clinicaReferencia ?>"><span class="material-icons-round icones">create</span></a> 
                                            </div>
                                            <div class="col-md-3">
                                            <?php if($registoDentista['status'] == "Oculto") { $iconeVisivel = "remove_red_eye"; $textoVisivel = "Deixar visivel"; $textoLink = "Desocultar"; ?>
                                                <a class="botao botao-cinza-m" title = "Clique para ocultar conteúdo" href="acoes.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=<?= $textoLink ?>&_Rotativo_ext=<?= $registoDentista['id'] ?>&Rotativo=<?= $clinicaReferencia ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span></a>
                                            <?php }elseif($registoDentista['status'] != "Oculto"){ $iconeVisivel =  "visibility_off"; $textoVisivel = "Ocultar"; $textoLink = "Ocultar";  ?>
                                                <a class="botao botao-cinza-m" title = "Clique para ocultar conteúdo" href="acoes.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=<?= $textoLink ?>&_Rotativo_ext=<?= $registoDentista['id'] ?>"><span class="material-icons-round icones"><?= $iconeVisivel ?></span></a>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3">
                                            <?php if($registoDentista['status'] == "Lixeira") { $iconeVisivelL = "restore"; $textoVisivelL = "Restaurar"; $textoLinkL = "Restaurar"; }
                                                  elseif($registoDentista['status'] != "Lixeira") { $iconeVisivelL = "delete"; $textoVisivelL = "para a lixeira"; $textoLinkL = "Lixeira"; }?>
                                                    <a class="botao botao-cinza-m" title = "Clique para enviar para <?= $textoVisivelL ?>" href="acoes.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=<?= $textoLinkL ?>&_Rotativo_ext=<?= $registoDentista['id'] ?>"><span class="material-icons-round icones"><?=  $iconeVisivelL ?></span></a>
                                            </div>

                                            <?php if($registoDentista['status'] == "Lixeira") { ?>
                                            <div class="col-md-3">
                                                    <a class="botao botao-cinza-m" href="#" data-bs-toggle="modal" data-bs-target="#modal_lixo_<?= $registoDentista['id'] ?>" title = "Clique para excluir o profissional permanentemente" ><span class="material-icons-round icones">delete_forever</span></a>
                                            </div>

                                                    <!-- Modal MOVENDO PARA A LIXEIRA -->
                                                    <div class="modal fade" id="modal_lixo_<?= $registoDentista['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center pl-5 pr-5">
                                                                    <img src="<?= $URL_IMG ?>extras/32980671.jpg" width = "250px" alt="">
                                                                    <h5>Deseja excluir mesmo?</h5>
                                                                    <p class = "p-2">Ao clicar em "Sim, eliminar", você estará excluindo permanentimente "<?= $registoDentista['nome'] ?>" do banco de dados e não poderá ser recuperado. </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                                <a href = "acoes.php?_Retorno_ext=<?= $URL_ATUAL ?>&_novaAcao_ext=Excluir&_Rotativo_ext=<?= $registoDentista['id'] ?>" class="botao botao-vermelho-f">Sim, eliminar</a>
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
                                <h5>Você ainda não adicionou profissionais nesse clínica.</h5>
                                <p class = "mt-5"><a href="profissionaisAddDentistaClínica.php?ClinicaRef='. $clinicaReferencia .'&Retorno='. $URL_ATUAL .'&Acao=Novo&Tipo=DentistaNumaClinica&Status=Criando" class = "botao botao-vermelho-f"> Add profissional </a></p>
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
    
        }

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