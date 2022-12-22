<?php 
    include_once ('../aplicacao/configuracao.php'); 

     //recupera das da url
     $retorno = $_GET['Retorno'];
     $rotativo = $_GET['Rotativo'];

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
                    <span class = "cor-preto-b">Editando</span>
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
        @$nome = $recebeDados['nome'];
        @$cnpj = $recebeDados['cnpj'];
        @$nomeFantasia = $recebeDados['nomeFantasia'];

        $foneF = $recebeDados['foneF'];
        $foneC = $recebeDados['foneC'];
        $foneA = $recebeDados['foneA'];

        //cro
        @$cro = $recebeDados['cro'];
        @$ufCRO = $recebeDados['ufCRO'];

        //respecialidades
        @$consultasDiagnosticos = $recebeDados['consultasDiagnosticos'];
        @$urgencia = $recebeDados['urgencia'];
        @$cirurgia = $recebeDados['cirurgia'];
        @$radiologia = $recebeDados['radiologia'];
        @$odontopediatra = $recebeDados['odontopediatra'];
        @$dentistica = $recebeDados['dentistica'];
        @$periodontia = $recebeDados['periodontia'];
        @$endodontia = $recebeDados['endodontia'];
        @$proteses = $recebeDados['proteses'];

        //local de atendimento
        $endereco = $recebeDados['endereco'];
        $numero = $recebeDados['numero'];
        $complemento = $recebeDados['complemento'];
        $bairro = $recebeDados['bairro'];
        $estado = $recebeDados['estado'];
        $cidade = $recebeDados['cidade'];
        $cep = $recebeDados['cep'];

        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;

       


        // var_dump($recebeDados)
        $inserir = "UPDATE credenciados SET 
                    nome = '$nome',
                    nomeFantasia = '$nomeFantasia', 
                    cnpj = '$cnpj', 
                    telefoneF = '$foneF', 
                    telefoneC = '$foneC', 
                    telefoneO = '$foneA', 
                    numeroCRO = '$cro', 
                    estadoCRO = '$ufCRO', 
                    endereco = '$endereco', 
                    numero = '$numero', 
                    complemento = '$complemento', 
                    estado = '$estado', 
                    cidade = '$cidade', 
                    cep = '$cep', 
                    espConsulta = '$consultasDiagnosticos', 
                    espUrgencia = '$urgencia', 
                    espCirugia = '$cirurgia', 
                    espRadiologia = '$radiologia', 
                    espOdontopediatra = '$odontopediatra', 
                    espDentistica = '$dentistica', 
                    espPeriodontia = '$periodontia', 
                    espEndodontia = '$endodontia',
                    espProteses =  '$proteses'
                    WHERE id = $rotativo";

                    $acao = $conexao -> prepare ($inserir);
                    $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

            echo    "<script type = 'text/JavaScript'>
                        window.location = '". $retorno ."&Status=Ok&Rotativo=".$rotativo ."';
                    </script>";

        }else{

            echo "não cadastrado<br>";
            echo "\nPDO::errorInfo():\n";
            $conexao->errorInfo();

        }
        
    }


?>


<?php

if($rotativo != ''){


    $seleciona = "SELECT * FROM credenciados WHERE id = '$rotativo' LIMIT 1 ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

                    if($registo['tipoCred'] ==  'Clínica'){

                        $titulo = $registo['nomeFantasia'];
                        
                    }elseif($registo['tipoCred'] ==  'Dentista'){
                        
                        $titulo = $registo['nome'];

                    }

?>
    
    <!-- formulário -->    
    <form action="" class = "gm-formularios" id = "profissionaisAdd" method = "post">
        <div class="container w-75 mb-3">
            <div class="row mb-2">
                <div class="col-md">
                    <h5>Dados básicos</h5>  
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="box-form">
<?php if ($registo['tipoCred'] == "Dentista") { // VERIFICA O TIPO DE ENTRADA ?>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome completo </label>
                                    <input type="text" name = "nome" class="form-control" id="nome" value = "<?= $titulo ?>" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                    
                                </div>
                            </div>
                        </div>
<?php }elseif($registo['tipoCred'] == "Clínica") { ?>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nomeFantasia" class="form-label">Nome Fantasia</label>
                                    <input type="text" name = "nomeFantasia" class="form-control" value = "<?= $titulo ?>" id="nomeFantasia">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="cnpj" class="form-label">CNPJ</label>
                                    <input type="text" name = "cnpj" class="form-control" id="cnpj" value = "<?= $registo['cnpj'] ?>">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                        </div>
<?php } ?>
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="foneF" class="form-label">Telefone (Fixo) </label>
                                    <input type="text" name = "foneF" class="form-control" id="foneF" value = "<?= $registo['telefoneF'] ?>">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="foneC" class="form-label">Telefone (Celular) </label>
                                    <input type="text" name = "foneC" class="form-control" id="foneC" value = "<?= $registo['telefoneC'] ?>">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="foneA" class="form-label">Telefone (Alternativo) </label>
                                    <input type="text" name = "foneA" class="form-control" id="foneA" value = "<?= $registo['telefoneO'] ?>">
                                </div>
                            </div>
                        </div>
                        
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->

<?php if ($registo['tipoCred'] == "Dentista") { // VERIFICA O TIPO DE ENTRADA ?>
            <div class="row mb-2">
                <div class="col-md">
                    <h5>Dados do registro</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="box-form">

                        <div class="row mb-2">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="cro" class="form-label">Número Conselho Regional de Odontologia (CRO) </label>
                                    <input type="text" name = "cro" class="form-control" id="cro" required value = "<?= $registo['numeroCRO'] ?>">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="ufCRO" class="form-label">UF do CRO</label>
                                    <input type="text" name = "ufCRO" class="form-control" id="ufCRO" value = "<?= $registo['estadoCRO'] ?>" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                        </div>
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->
<?php } ?>
            <div class="row mb-2">
                <div class="col-md">
                    <h5>Especialidades</h5>  
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="box-form">

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="">
                                    <label for="f-campo" class="form-label">Seleciona a(s) especialidade(s) de atendimento </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        
                                        <input class="form-check-input" name = "consultasDiagnosticos" type="checkbox" value="Consultas e Diagnóstico" id="consultasDiagnosticos" <?php echo $registo['espConsulta'] != "" ? "checked" : " ";  ?> >
                                        <label class="form-check-label" for="consultasDiagnosticos">
                                            Cosultas e diagnósticos
                                        </label>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "urgencia" type="checkbox" value="Urgência e Emergência" id="urgencia"  <?php echo $registo['espUrgencia'] != "" ? "checked" : " ";  ?>>
                                        <label class="form-check-label" for="urgencia">
                                            Urgência/Emergência
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "cirurgia" type="checkbox" value="Cirurgia" id="Cirurgia"  <?php echo $registo['espCirugia'] != "" ? "checked" : " ";  ?>>
                                        <label class="form-check-label" for="Cirurgia">
                                            Cirurgia
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "radiologia" type="checkbox" value="Radiologia" id="radiologia" <?php echo $registo['espRadiologia'] != "" ?  "checked" : " ";  ?>>
                                        <label class="form-check-label" for="radiologia">
                                            Radiologia
                                        </label>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                            
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "odontopediatra" type="checkbox" value="Odontopediatra" id="Odontopediatra" <?php echo $registo['espOdontopediatra'] != "" ? "checked" : " ";  ?>>
                                        <label class="form-check-label" for="Odontopediatra">
                                            Odontopediatra
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "dentistica" type="checkbox" value="Dentística" id="dentistica" <?php echo $registo['espDentistica'] != "" ?  "checked" : " ";  ?>>
                                        <label class="form-check-label" for="dentistica">
                                            Dentística
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "periodontia" type="checkbox" value="Periodontia" id="Periodontia" <?php echo $registo['espPeriodontia'] != "" ?  "checked" : " ";  ?>>
                                        <label class="form-check-label" for="Periodontia">
                                            Periodontia
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "endodontia" type="checkbox" value="Endodontia" id="endodontia" <?php echo $registo['espPeriodontia'] != "" ?  "checked" : " ";  ?>>
                                        <label class="form-check-label" for="endodontia">
                                            Endodontia
                                        </label>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "proteses" type="checkbox" value="Próteses" id="proteses" <?php echo $registo['espProteses'] != "" ?  "checked" : " ";  ?>>
                                        <label class="form-check-label" for="proteses">
                                            Próteses
                                        </label>
                                    </div>
                                </div>
                            </div>                        
                        </div>

                        <div class="row ">
                            <div class="col-md">
                                <div class="">
                                    <p class = "fonte-12 box-form">*Caso não selecione nenhuma das opções, por padrão, aparecerá "Consultas e Diagnósticos" na rede credenciada</p>
                                </div>
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
                    <div class="box-form">

                    <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" name = "endereco" class="form-control" id="endereco" value = "<?= $registo['endereco'] ?>" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" name = "numero" class="form-control"value = "<?= $registo['numero'] ?>"  id="numero">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="Complemento" class="form-label">Complemento</label>
                                    <input type="text" name = "complemento" class="form-control" id="Complemento" value = "<?= $registo['complemento'] ?>">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="Bairro" class="form-label">Bairro</label>
                                    <input type="text" name = "bairro" class="form-control" id="Bairro" value = "<?= $registo['bairro'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">                            
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="estado" class="form-label selectpicker">Estado</label>
                                        
                                        <select class="form-select" name = "estado" id="estado" required>
                                        <?php
                                        if($registo['estado'] != ''){
                                                $dadosEstado = $registo['estado'];
                                                $selecioneEstado = "SELECT * FROM estado WHERE id = '$dadosEstado'";
                                                $consultaEstado = $conexao -> prepare($selecioneEstado);
                                                $consultaEstado -> execute();
                                                    if(($consultaEstado) AND ($consultaEstado -> rowCount () != 0)){
                                                        while($registoEstado = $consultaEstado -> fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                            <optgroup label = "Estado atual">
                                                <option value="<?= $registoEstado['id'] ?>"><?= $registoEstado['nome'] ?></option>
                                            </optgroup>
                                            
                                        <?php } } }?>
                                            <optgroup label = "Mudar para">
                                                <?php
                                                    $selecionaEstado = "SELECT * FROM estado ORDER BY nome ASC ";
                                                    $consultaEstado = $conexao -> prepare($selecionaEstado);
                                                    $consultaEstado -> execute();

                                                    if(($consultaEstado) AND ($consultaEstado -> rowCount () != 0)){

                                                        while($registoEstado = $consultaEstado -> fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                                <option value="<?= $registoEstado['id'] ?>"><?= $registoEstado['nome'] ?></option>
                                                <?php 
                                                        }}
                                                ?>
                                            </optgroup>
                                        </select>   
                                   
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="Cidade" class="form-label">Cidade</label>
                                    <select class="form-select" name = "cidade" id="cidade" style = "background-color: #ededed;">
                                    <?php
                                    if($registo['cidade'] != ''){
                                            $dadosCidade = $registo['cidade'];
                                            $selecioneCidade = "SELECT * FROM cidade WHERE id = '$dadosCidade'";
                                            $consultaCidade = $conexao -> prepare($selecioneCidade);
                                            $consultaCidade -> execute();
                                                if(($consultaCidade) AND ($consultaCidade -> rowCount () != 0)){
                                                    while($registoCidade = $consultaCidade -> fetch(PDO::FETCH_ASSOC)){
                                    ?>  
                                        <optgroup label = "Cidade atual">
                                             <option value="<?= $registoCidade['id'] ?>"><?= $registoCidade['nome'] ?></option>
                                        </optgroup>
                                            

                                    <?php } } }  ?>
                                        <optgroup label = "Mudar para">
                                            <option value="">Para mudar escolha o Estado antes</option>
                                        </select>
                                    
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="text" name = "cep" class="form-control" value = "<?= $registo['cep'] ?>" id="cep">
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
           
                <div class="col-md-11"></div>
            </div>



        </div><!-- row e container -->
    </form>

    <?php 

        }}}else{
            echo '
            <div class = "container">
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
            </div>         
            ';
        }

?>

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