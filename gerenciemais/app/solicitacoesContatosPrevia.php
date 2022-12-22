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
    <title>Prévia contatos | Gerencie mais</title>
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
                    <a href="<?= $URL_BASE ?>app/solicitacoesContatos.php?Acao=Listar" class = "links">Contatos</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Prévia</span>
                </div>

            </div>
        </div>
    </div>

<?php

if(isset($_GET['Rotativo'])){


    $RotativoRecebido = $_GET['Rotativo'];

    $seleciona = "SELECT * FROM pedidoscontatos WHERE id = '$RotativoRecebido' ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

                    if(isset($_GET['Status'])){
                        $statusGet = $_GET['Status'];
                        if($statusGet == 'MarcarLido'){
                            $altera = "UPDATE pedidoscontatos SET status='Lido' WHERE id = '$RotativoRecebido'";
                            $consultaAltera = $conexao -> prepare($altera);
                            $consultaAltera -> execute();
                        }
                    }

                
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
                                <div class="mb-3">
                                    <p>Nome completo</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['nome'] ?></p>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <p>Enviado em</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['data'] ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-1">
                            <div class="col-md">
                                <div class="mb-3">
                                    <p>Telefone fixo</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['telefone'] ?></p>
                                    <?php
                                        function deixarNumero($string){
                                            return preg_replace("/[^0-9]/", "", $string);
                                        }
                                    ?>
                                     <p class = "mt-2 mb-4"><a href="https://api.whatsapp.com/send?phone=<?= deixarNumero($registo['telefone'])?>" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">mark_chat_unread</span>Envie um WhatsApp </a></p>
                                    <p class = "mt-2 mb-4"><a href="tel:<?= deixarNumero($registo['telefone'])?>" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">call</span>Ligar</a></p>
                                   
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <p>E-mail</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['email'] ?></p>
                                    <p class = "mt-2 mb-4"><a href="mailto:<?= $registo['email'] ?>" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">mark_as_unread</span>Enviar mensagem</a></p>
                                </div>
                            </div>
                            
                            <div class="col-md">
                                <div class="mb-3">
                                    <p>Local</p>
                                    <p class = "fonte-18 cor-preto"><?= $registo['cidade'] ?>/<?= $registo['estado'] ?></p>
                                </div>
                            </div>
                        </div>                        
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->



            <div class="row mb-2">
                <div class="col-md">
                    <h5>Dúvida do(a) <?= $registo['nome'] ?></h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="gm-box">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="">
                                    <p>Assunto</p> 
                                    <p class = "fonte-18 cor-preto">
                                        <?= $registo['assunto'] ?>
                                    </p>
                                    <!-- <p class = "mt-2 mb-2"><a href="http://maps.google.com.br/maps?q=proversaudedourados" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">location_on</span> Abrir mapa</a></p> -->
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="">
                                    <p>Dúvida/Mensagem</p> 
                                    <p class = "fonte-18 cor-preto">
                                        <?= $registo['texto'] ?>
                                    </p>
                                    <!-- <p class = "mt-2 mb-2"><a href="http://maps.google.com.br/maps?q=proversaudedourados" class = "botao botao-cinza-m" target = "_blank"><span class="material-icons-round icones">location_on</span> Abrir mapa</a></p> -->
                                </div>
                            </div>
                        </div>

                            
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