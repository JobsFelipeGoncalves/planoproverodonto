<?php
      error_reporting(E_ALL & ~ E_NOTICE); 

      if(isset($_POST['estadoCred'])){

        @$idEstado = $_POST['estadoCred'];
        $nomeEstadoCidade = "- Todas as cidades";
        $sqlConsulta = "SELECT * FROM cidade WHERE estado = '$idEstado' ORDER BY nome ASC";
        $sqlSeleciona = $conexao -> prepare($sqlConsulta);
        $sqlSeleciona -> execute();

            echo '<option value="todos">- Todas as cidades</option>';

            if(($sqlSeleciona) AND ($sqlSeleciona -> rowCount () != 0)){
                while($registoCidade  = $sqlSeleciona -> fetch(PDO::FETCH_ASSOC)){

                  $cidadeEscolhida = $registoCidade['id'];

                  $profissionaisSel =  "SELECT * FROM credenciados WHERE cidade = '$cidadeEscolhida'";
                  $constaProf = $conexao -> prepare($profissionaisSel);
                  $constaProf -> execute();

                      if($constaProf -> rowCount () != 0){
                           echo '<option value="'.$registoCidade['id'].'">'.$registoCidade['nome'].'</option>';
                      } 
                }
            }
   
      }  
?>