<?php 
    include_once ('../aplicacao/configuracao.php'); 

    //recupera das da url
    $retorno = $_GET['Retorno'];


      //recebe os campos do formulário
      $recebeDadosAssunto = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
      //verifica se existe clique no botao de "enviar"
      if(!empty($recebeDadosAssunto["enviar_assunto"])){
            //remove os espeços do inicio e final dos campos
            $recebeDadosAssunto = array_map("trim", $recebeDadosAssunto);

                //cria um id rotativo
            $idRotativo = rand(000000000,999999999); 
            $identificador = $idRotativo;


            //recebe os campos do formulários
            $titulo = $recebeDadosAssunto['titulo'];

            //geração da data da publicação
            $dia = date('d'); $mes = date('m'); $ano = date('Y');
            $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
            date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
            $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;


            // var_dump($recebeDados);
            $inserir = "INSERT INTO ajuda_assunto (id, status, data, assunto)  
                        VALUES ('$identificador', 'Publicado', '$data', '$titulo')";

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
    

    <title>Editando assunto | Central de Ajuda | Gerencie mais</title>
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
                    <a href="centralDePrivacidade.php?Acao=Lista" class = "links">Central de Ajuda</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b"> editando assunto</span>
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
        $titulo = $recebeDados['titulo'];
        $conteudo = $recebeDados['conteudo'];
        $slug = $titulo;

        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;

        //remove os acentos e sinais
        $slug = str_replace ('"',"", $slug);
        $slug = str_replace ("'","", $slug);
        $slug = str_replace (" ","-", $slug);
        $slug = str_replace ("à","a", $slug);
        $slug = str_replace ("á","a", $slug);
        $slug = str_replace ("â","a", $slug);
        $slug = str_replace ("ã","a", $slug);
        $slug = str_replace ("à","a", $slug);
        $slug = str_replace ("é","e", $slug);
        $slug = str_replace ("è","e", $slug);
        $slug = str_replace ("ê","e", $slug);
        $slug = str_replace ("í","i", $slug);
        $slug = str_replace ("î","i", $slug);
        $slug = str_replace ("ì","i", $slug);
        $slug = str_replace ("õ","o", $slug);
        $slug = str_replace ("ó","o", $slug);
        $slug = str_replace ("ò","o", $slug);
        $slug = str_replace ("ô","o", $slug);
        $slug = str_replace ("ç","c", $slug);
        $slug = str_replace ("!","", $slug);
        $slug = str_replace ("?","", $slug);
        $slug = str_replace (";","", $slug);
        $slug = str_replace (",","", $slug);
        $slug = str_replace (".","", $slug);

        //deixa tudo em minusculo
        $slug = strtolower ($slug);

        // var_dump($recebeDados);
        $inserir = "INSERT INTO privacidades (id, slug, status, data, autor, titulo, conteudo)  
                    VALUES ('$identificador', '$slug', 'Publicado', '$data', '$USUARIO_ATUAL', '$titulo', '$conteudo')";

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

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="f-campo" class="form-label">Declare o seu assunto</label>
                                    <input type="text" name = "titulo" class="form-control" id="f-campo">
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                                <!-- <a href="centralDeAjudaAdd.php?Retorno=<?= $URL_ATUAL ?>&Acao=NovoAssunto&Status=Criando&Rotativo=<?php echo $idRotativo = rand(0000000000,9999999999); ?>" class = "botao botao-cinza float-right" title = "Clique para criar um novo conteúdo"> + Novo assunto</a> -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_limpar_lixo" class = "botao botao-cinza" title = "Clique para criar um novo conteúdo"> Novo assunto </a>

                                <!-- Modal ELIMINAR -->
                                <div class="modal fade" id="modal_limpar_lixo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">

                                        
                                        <form action="" class = "gm-formularios" id = "AjudaAdd" method = "post">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-left pl-5 pr-5">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="f-campo" class="form-label">Crie um novo assunto</label>
                                                                <input type="text" name = "tituloAssunto" class="form-control" id="f-campo" required>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="botao botao-nulo" data-bs-dismiss="modal">Cancelar</button>
                                                    <input type="submit" name = "enviar_assunto" class = "botao botao-vermelho" value = "Publicar">
                                                </div>
                                            </div>
                                        
                                        </form>
                                    </div>
                                </div><!-- fim modal -->
                            </div>
                        </div>
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->


            <div class="row mb-2">
                <div class="col-md">
                    <h5>Conteúdo</h5>  
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
                <div class="col-md">
                    <input type="submit" name = "enviar" class = "botao botao-vermelho" value = "Publicar">
                </div>
            </div>
        </div><!-- row e container -->
    </form>

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