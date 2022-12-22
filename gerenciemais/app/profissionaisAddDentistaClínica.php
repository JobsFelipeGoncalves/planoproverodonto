<?php 
    include_once ('../aplicacao/configuracao.php'); 

     //recupera das da url
     $retorno = $_GET['Retorno'];

    if(isset($_GET['Tipo'])){

        $tipoAdicao = $_GET['Tipo'];

        if ($tipoAdicao == "NovoDentista") {
            $tipoAdicaoTexto = "Novo(a) Dentista";
            $tipoBanco = "Dentista";
        }

        if ($tipoAdicao == "NovoClinica") {
            $tipoAdicaoTexto = "Novo(a) clínica";
            $tipoBanco = "Clínica";
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
                    <a href="profissionais.php?Acao=Listar" class = "links">Profissionais</a>
                    <span class="material-icons-round icones">chevron_right</span>
                    <span class = "cor-preto-b">Dentista em uma clínica</span>
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
        $clinica = $recebeDados['clinica'];
        $nome = $recebeDados['nome'];
        //cro
        $cro = $recebeDados['cro'];
        $ufCRO = $recebeDados['croUF'];

        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;

       


        // var_dump($recebeDados)
        $inserir = "INSERT INTO credenciados_ext (id, status, data, autor, clinica, nome, cro, croUF) 
                    VALUES ('$identificador', 'Publicado', '$data', '$USUARIO_ATUAL', '$clinica', '$nome', '$cro', '$ufCRO')";

                    $acao = $conexao -> prepare ($inserir);
                    $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

            echo    "<script type = 'text/JavaScript'>
                        window.location = '". $URL_BASE."app/profissionais.php?Acao=Listar';
                    </script>";

        }else{

            echo "não cadastrado";

        }
        
    }

    // SE CLICAR EM ENVIAR E CONTINUAR

     //verifica se existe clique no botao de "enviar"
     if(!empty($recebeDados["enviar_continuar"])){

        //remove os espeços do inicio e final dos campos
        $recebeDados = array_map("trim", $recebeDados);

        //cria um id rotativo
        $idRotativo = rand(000000000,999999999); 
        $identificador = $idRotativo;

        //recebe os campos do formulários

        //dados básico
        $clinicaReferencia = $recebeDados['clinicaReferencia'];
        $clinica = $recebeDados['clinica'];
        $nome = $recebeDados['nome'];
        //cro
        $cro = $recebeDados['cro'];
        $ufCRO = $recebeDados['croUF'];

        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;

       


        // var_dump($recebeDados)
        $inserir = "INSERT INTO credenciados_ext (id, status, data, autor, clinica, nome, cro, croUF) 
                    VALUES ('$identificador', 'Publicado', '$data', '$USUARIO_ATUAL', '$clinica', '$nome', '$cro', '$ufCRO')";

                    $acao = $conexao -> prepare ($inserir);
                    $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

            echo    "<script type = 'text/JavaScript'>
                        window.location = '". $URL_BASE ."app/profissionaisAddDentistaClínica.php?Status=Ok&ClinicaRef=". $clinica ."';
                        
                    </script>";

        }else{

            echo "não cadastrado";

        }
        
    }

?>

    <!-- formulário -->    
    <form action="" class = "gm-formularios" id = "profissionaisAdd" method = "post">
        <div class="container w-75 mb-3">

        
<?php
//se receber status positivop
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
                    <h5>Clínica de atendimento</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="box-form">
                

                                      
                    <div class="row mb-3">
                            <div class="col-md">
                                <div class="mb-3">
                                <?php  if(isset($_GET['ClinicaRef'])){ $ClinicaRef =  $_GET['ClinicaRef'];  ?>
                                <input type="hidden" value = "<?= $ClinicaRef ?>" name = "clinicaReferencia">
                                <?php } ?>
                                <label for="numero" class="form-label">Selecione a clínica de atendimento</label>

                                    <select class="form-select" name = "clinica" aria-label="Default select example">

                                    <?php
                                         if(isset($_GET['ClinicaRef'])){
                                            $ClinicaRef =  $_GET['ClinicaRef']; 

                                            $seleciona = "SELECT id, nomeFantasia, cnpj FROM credenciados WHERE id ='$ClinicaRef' LIMIT 1";
                                            $consulta = $conexao -> prepare($seleciona);
                                            $consulta -> execute();                                             
                                            if(($consulta) AND ($consulta -> rowCount () != 0)){
                                                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

                                    ?>
                                                
                                                <option value="<?= $registo['id'] ?>"><?= $registo['nomeFantasia'] ?> - CNPJ <?= $registo['cnpj'] ?></option>
                                    <?php   } } }else{ 

                                            $seleciona = "SELECT id, nomeFantasia, cnpj FROM credenciados WHERE nomeFantasia != '' ORDER BY ordem DESC";
                                            $consulta = $conexao -> prepare($seleciona);
                                            $consulta -> execute();                                            
                                            if(($consulta) AND ($consulta -> rowCount () != 0)){
                                                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    
                                            <option value="<?= $registo['id'] ?>"><?= $registo['nomeFantasia'] ?> - CNPJ <?= $registo['cnpj'] ?>  </option>

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
                    <h5>Dados do registro</h5>  
                </div>
            </div>
            <div class="row mb-4">
                
                <div class="col-12 col-md-12">
                    <div class="box-form">

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome completo</label>
                                    <input type="text" name = "nome" class="form-control" id="nome" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="cro" class="form-label">Número Conselho Regional de Odontologia (CRO) </label>
                                    <input type="text" name = "cro" class="form-control" id="cro" required maxlength = "5">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="croUF" class="form-label">UF do CRO</label>
                                    <select class="form-select" name ="croUF" id = "croUF" required>
                                        <option selected>Selecionar</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                        </div>
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->
            <div class="row mb-2">
                <div class="col-md-1">
                    <input type="submit" name = "enviar" class = "botao botao-escuro-a" value = "Salvar">
                </div>
                
                <div class="col-md-2">
                    <input type="submit" name = "enviar_continuar" class = "botao botao-vermelho" value = "Salvar e adicionar novo">
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
   
    <script src=""></script>
  </body>
</html>