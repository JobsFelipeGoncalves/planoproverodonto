<?php 
    include_once ('../aplicacao/configuracao.php'); 

    //recupera das da url
    $retorno = $_GET['Retorno'];
    $idAssunto = $_GET['Rotativo'];
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
    

    <title>Editando Assunto | Central de Ajuda | Gerencie mais</title>
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
                    <a href="centralDeAjuda.php?Acao=Lista" class = "links">Central de Ajuda</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b"> Editando assunto</span>
                </div>

            </div>
        </div>
    </div>

<?php
      //recebe os campos do formulário
      $recebeDadosAssunto = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
      //verifica se existe clique no botao de "enviar"
      if(!empty($recebeDadosAssunto["enviar"])){
            //remove os espeços do inicio e final dos campos
            $recebeDadosAssunto = array_map("trim", $recebeDadosAssunto);

            //recebe os campos do formulários
            $titulo = $recebeDadosAssunto['titulo'];


            // var_dump($recebeDados);
            $inserir = "UPDATE ajuda_assunto SET assunto = '$titulo' WHERE id = $idAssunto";

                        $acao = $conexao -> prepare ($inserir);
                        $acao -> execute ();

            //verifica se cadastrou
            if($acao -> rowCount()) {

                echo    "<script type = 'text/JavaScript'>
                        window.location = '". $retorno ."&Status=Ok';
                        </script>";

            }else{

                echo "não cadastrado";

            }
      }
?>


<?php



$seleciona = "SELECT * FROM ajuda_assunto WHERE id = '$idAssunto' LIMIT 1";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

?>



    <!-- formulário -->    
    <form action="" class = "gm-formularios" id = "profissionaisAdd" method = "post">
        <div class="container w-75 mb-3">
        <div class="row mb-2">
                <div class="col-md">
                    <h5>Assunto</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="box-form">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="f-campo" class="form-label">Declare o seu assunto</label>
                                    <input type="text" name = "titulo" class="form-control" id="f-campo" value = "<?= $registo['assunto'] ?>">
                                </div>
                            </div>
                        </div>
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->


            <div class="row mb-2">
                <div class="col-md">
                    <input type="submit" name = "enviar" class = "botao botao-vermelho" value = "Publicar">
                </div>
            </div>
        </div><!-- row e container -->
    </form>


<?php 
                }}

?>
    <!-- footer -->
    <?php require_once('footer.php'); ?>

    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>

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