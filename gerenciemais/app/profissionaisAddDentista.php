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
                    <span class = "cor-preto-b"><?= $tipoAdicaoTexto ?></span>
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
        $inserir = "INSERT INTO credenciados (id, status, data, autor, tipoCred, nome, nomeFantasia, cnpj, telefoneF, telefoneC, telefoneO, numeroCRO, estadoCRO, endereco, numero, complemento, bairro, estado, cidade, cep, espConsulta, espUrgencia, espCirugia, espRadiologia, espOdontopediatra, espDentistica, espPeriodontia, espEndodontia, espProteses) 
                    VALUES ('$identificador', 'Publicado', '$data', '$USUARIO_ATUAL', '$tipoBanco', '$nome', '$nomeFantasia', '$cnpj', '$foneF', '$foneC', '$foneA', '$cro', '$ufCRO', '$endereco', '$numero', '$complemento', '$bairro', '$estado', '$cidade', '$cep', '$consultasDiagnosticos', '$urgencia', '$cirurgia', '$radiologia', '$odontopediatra', '$dentistica', '$periodontia', '$endodontia', '$proteses' )";

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

    if(!empty($recebeDados["enviar_continuar"])){

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
        $inserir = "INSERT INTO credenciados (id, status, data, autor, tipoCred, nome, nomeFantasia, cnpj, telefoneF, telefoneC, telefoneO, numeroCRO, estadoCRO, endereco, numero, complemento, bairro, estado, cidade, cep, espConsulta, espUrgencia, espCirugia, espRadiologia, espOdontopediatra, espDentistica, espPeriodontia, espEndodontia, espProteses) 
                    VALUES ('$identificador', 'Publicado', '$data', '$USUARIO_ATUAL', '$tipoBanco', '$nome', '$nomeFantasia', '$cnpj', '$foneF', '$foneC', '$foneA', '$cro', '$ufCRO', '$endereco', '$numero', '$complemento', '$bairro', '$estado', '$cidade', '$cep', '$consultasDiagnosticos', '$urgencia', '$cirurgia', '$radiologia', '$odontopediatra', '$dentistica', '$periodontia', '$endodontia', '$proteses' )";

                    $acao = $conexao -> prepare ($inserir);
                    $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

            echo    "<script type = 'text/JavaScript'>
                        window.location = 'profissionaisAddDentistaClínica.php?Acao=NovoDentistaNumaClinica&Status=Ok&ClinicaRef=$identificador';
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
                    <h5>Dados básicos</h5>  
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="box-form">
<?php if ($tipoAdicao == "NovoDentista") { // VERIFICA O TIPO DE ENTRADA ?>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome completo </label>
                                    <input type="text" name = "nome" class="form-control" id="nome" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                    
                                </div>
                            </div>
                        </div>
<?php }elseif($tipoAdicao == "NovoClinica") { ?>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nomeFantasia" class="form-label">Nome Fantasia</label>
                                    <input type="text" name = "nomeFantasia" class="form-control" id="nomeFantasia">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="cnpj" class="form-label">CNPJ</label>
                                    <input type="text" name = "cnpj" class="form-control" id="cnpj">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                        </div>
<?php } ?>
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="foneF" class="form-label">Telefone (Fixo) </label>
                                    <input type="text" name = "foneF" class="form-control" id="foneF">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="foneC" class="form-label">Telefone (Celular) </label>
                                    <input type="text" name = "foneC" class="form-control" id="foneC">
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="foneA" class="form-label">Telefone (Alternativo) </label>
                                    <input type="text" name = "foneA" class="form-control" id="foneA">
                                </div>
                            </div>
                        </div>
                        
                            
                    </div><!-- box-form -->
                </div><!-- col-md -->            
            </div><!-- row -->

<?php if ($tipoAdicao == "NovoDentista") { // VERIFICA O TIPO DE ENTRADA ?>
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
                                    <input type="text" name = "cro" class="form-control" id="cro" maxlength = "5" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="ufCRO" class="form-label">UF do CRO</label>
                                    <select class="form-select" name ="ufCRO" id = "ufCRO" required>
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
                                        <input class="form-check-input" name = "consultasDiagnosticos" type="checkbox" value="Consultas e Diagnóstico" id="consultasDiagnosticos">
                                        <label class="form-check-label" for="consultasDiagnosticos">
                                            Cosultas e diagnósticos
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "urgencia" type="checkbox" value="Urgência e Emergência" id="urgencia">
                                        <label class="form-check-label" for="urgencia">
                                            Urgência/Emergência
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "cirurgia" type="checkbox" value="Cirurgia" id="Cirurgia">
                                        <label class="form-check-label" for="Cirurgia">
                                            Cirurgia
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "radiologia" type="checkbox" value="Radiologia" id="radiologia">
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
                                        <input class="form-check-input" name = "odontopediatra" type="checkbox" value="Odontopediatra" id="Odontopediatra">
                                        <label class="form-check-label" for="Odontopediatra">
                                            Odontopediatra
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "dentistica" type="checkbox" value="Dentística" id="dentistica">
                                        <label class="form-check-label" for="dentistica">
                                            Dentística
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "periodontia" type="checkbox" value="Periodontia" id="Periodontia">
                                        <label class="form-check-label" for="Periodontia">
                                            Periodontia
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name = "endodontia" type="checkbox" value="Endodontia" id="endodontia">
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
                                        <input class="form-check-input" name = "proteses" type="checkbox" value="Próteses" id="proteses">
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
                                    <input type="text" name = "endereco" class="form-control" id="endereco" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" name = "numero" class="form-control" id="numero">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="Complemento" class="form-label">Complemento</label>
                                    <input type="text" name = "complemento" class="form-control" id="Complemento">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="Bairro" class="form-label">Bairro</label>
                                    <input type="text" name = "bairro" class="form-control" id="Bairro">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">       
                            <div class="col-md">
                                    <div class="mb-3">
                                        <label for="estado" class="form-label selectpicker">Estado</label>
                                        
                                        <select class="form-select" name = "estado" id="estado" required>
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
                                        </select>
                                        <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                    </div>
                                </div>


                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <select class="form-select" name = "cidade" id="cidade" style = "background-color: #ededed;">
                                            <option value="">Selecione o estado antes</option>
                                        </select>
                                        <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                    </div>
                                </div>    
                            <!-- <div class="col-md">
                                <div class="mb-3">
                                    <label for="Estado" class="form-label">Estado</label>
                                    <input type="text" name = "estado" class="form-control" id="Estado" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="Cidade" class="form-label">Cidade</label>
                                    <input type="text" name = "cidade" class="form-control" id="Cidade" required>
                                    <div class="form-text"><span class="badge bg-secondary">Obrigatório</span></div>
                                </div>
                            </div> -->
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="text" name = "cep" class="form-control" id="cep">
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
            <?php if($tipoAdicao == "NovoClinica") { ?>
                <div class="col-md-2">
                    <input type="submit" name = "enviar_continuar" class = "botao botao-vermelho" value = "Salvar e continuar">
                </div>
            <?php } ?>
                <div class="col-md-9"></div>
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
    
  </body>
</html>