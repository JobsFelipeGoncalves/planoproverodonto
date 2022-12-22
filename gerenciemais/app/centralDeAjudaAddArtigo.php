<?php 
    include_once ('../aplicacao/configuracao.php'); 

     //recupera das da url
     $retorno = $_GET['Retorno'];
     $assuntoRef = $_GET['AssuntoRef'];

   
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <title>Adiconando Profissionais | Gerencie mais</title>
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
                    <a href="centralDeAjuda.php?Acao=Listar" class = "links">Central de Ajuda</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <a href="<?= $retorno."&Rotativo=". $assuntoRef ?>" class = "links">Assunto</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Adicionando artigo</span>
                </div>

            </div>
        </div>
    </div>

<?php


    //recebe os campos do formulário
    $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    //verifica se existe clique no botao de "enviar"
    if(!empty($recebeDados["enviar"])){

        //remove os espeços do inicio e final dos campos
        $recebeDados = array_map("trim", $recebeDados);

        //cria um id rotativo
        $idRotativo = rand(000000000,999999999); 
        $identificador = $idRotativo;

        //recebe os campos do formulários

        //dados básico
        $titulo = $recebeDados['titulo'];
        $conteudo = $recebeDados['conteudo'];

        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;

       


        // var_dump($recebeDados)
        $inserir = "INSERT INTO ajuda (id, status, autor, data, assunto, titulo, conteudo) 
                    VALUES ('$identificador', 'Publicado', '$data', '$USUARIO_ATUAL', '$assuntoRef', '$titulo', '$conteudo')";

                    $acao = $conexao -> prepare ($inserir);
                    $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

            echo    "<script type = 'text/JavaScript'>
                        window.location = '". $retorno ."&Rotativo=". $assuntoRef ."';
                    </script>";

        }else{

            echo "não cadastrado";

        }
        
    }

?>
 <!-- formulário -->    
 <form action="" class = "gm-formularios" id = "profissionaisAdd" method = "post">
        <div class="container w-75 mb-3">
        <div class="row mb-2">
                <div class="col-md">
                    <h5>Artigo</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="box-form">
                

                                      
                    <div class="row mb-3">
                            <div class="col-md">
                                <div class="mb-3">
                                <?php  if(isset($_GET['AssuntoRef'])){ $assuntoRef =  $_GET['AssuntoRef'];  ?>
                                <input type="hidden" value = "<?= $assuntoRef ?>" name = "assuntoReferencia">
                                <?php } ?>
                                <label for="numero" class="form-label">Selecione o assunto para adicionar um artigo</label>

                                    <select class="form-select" name = "assunto" aria-label="Default select example">

                                    <?php
                                         if(isset($_GET['AssuntoRef'])){
                                            $assuntoRef =  $_GET['AssuntoRef']; 

                                            $seleciona = "SELECT id, assunto FROM ajuda_assunto WHERE id ='$assuntoRef' LIMIT 1";
                                            $consulta = $conexao -> prepare($seleciona);
                                            $consulta -> execute();                                             
                                            if(($consulta) AND ($consulta -> rowCount () != 0)){
                                                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

                                    ?>
                                                
                                                <option value="<?= $registo['id'] ?>"><?= $registo['assunto'] ?></option>
                                    <?php   } } }else{ 

                                            $seleciona = "SELECT id, assunto FROM ajuda_assunto WHERE assunto != '' ORDER BY ordem DESC";
                                            $consulta = $conexao -> prepare($seleciona);
                                            $consulta -> execute();                                            
                                            if(($consulta) AND ($consulta -> rowCount () != 0)){
                                                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    
                                            <option value="<?= $registo['id'] ?>"><?= $registo['assunto'] ?> </option>

                                    <?php
                                        } } }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->
            <div class="row mb-2">
                <div class="col-md">
                    <h5>Artigos do assunto</h5>  
                </div>
            </div>
            <div class="row mb-4">
                
                <div class="col-12 col-md-12">
                    <div class="box-form">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="f-campo" class="form-label">Titulo</label>
                                    <input type="text" name = "titulo" class="form-control" id="f-campo" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md">
                            <label for="f-campo" class="form-label">Conteúdo</label>
                            <textarea id="summernote" name="conteudo" required></textarea>
                            </div>
                        </div>
                        
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->
            <div class="row mb-2">
                
                <div class="col-md-2">
                    <input type="submit" name = "enviar" class = "botao botao-vermelho" value = "Salvar">
                </div>
            </div>
        </div><!-- row e container -->
    </form>


    <!-- footer -->
    <?php

         require_once('footer.php'); ?>

    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_JS ?>jquery.mask.min.js"></script>
    <script src="<?= $URL_JS ?>estilo.min.js"></script>    
   
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
        placeholder: 'Digite seu conteúdo aqui...',
        tabsize: 5,
        height: 300,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['insert', ['link']],
            // ['insert', ['link', 'picture', 'video']],
            ['view', ['codeview', 'help']]       
        ]
      });
    });
  </script>
  </body>
</html>