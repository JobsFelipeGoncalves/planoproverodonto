<?php

    //conexao com o banco
    include_once ('../aplicacao/conexao.php'); 
    include_once ('../aplicacao/configuracao.php'); 

    /* BOTÕES CREDENCIADOS EXT */
    if (isset($_GET['_novaAcao_ext'])) {
        //recebendo valores das tags pela URL
        $acaoRecebida = $_GET['_novaAcao_ext'];
        $acaoRetorno = $_GET['_Retorno_ext'];
        $acoRotativo = $_GET['_Rotativo_ext'];   
        $clinicaRef  = $_GET['Rotativo'];
        //OCULTA
        if ($acaoRecebida == "Ocultar") {

            $selecionaAcao = "UPDATE credenciados_ext SET status = 'Oculto' WHERE id = '$acoRotativo'";
            $consultaAcao = $conexao -> prepare($selecionaAcao);
            $consultaAcao -> execute();

            if($consultaAcao){ 
                header('Location:'. $acaoRetorno .'?Acao=Visualizar&Rotativo='. $clinicaRef .'&Status=AcaoRealizada');
            }else{ 
                echo  "algo deu errado"; 
            }

        }
        //DESOCUTA
        if ($acaoRecebida == "Desocultar") {

            $selecionaAcao = "UPDATE credenciados_ext SET status = 'Publicado' WHERE id = '$acoRotativo'";
            $consultaAcao = $conexao -> prepare($selecionaAcao);
            $consultaAcao -> execute();

            if($consultaAcao){ 
                header('Location:'. $acaoRetorno .'?Acao=Visualizar&Rotativo='. $clinicaRef .'&Status=AcaoRealizada');
            }else{ 
                echo  "algo deu errado"; 
            }

        }

        //MOVENDO PRA LIXEIRA conteúdo
        if ($acaoRecebida == "Lixeira") {

             // echo "Ok! Vamos ocultar conteúdo";
             $selecionaAcao = "UPDATE credenciados_ext SET status = 'Lixeira' WHERE id = '$acoRotativo'";
             $consultaAcao = $conexao -> prepare($selecionaAcao);
             $consultaAcao -> execute();

            if($consultaAcao){ 
                header('Location:'. $acaoRetorno .'?Acao=Visualizar&Rotativo='. $clinicaRef .'&Status=AcaoRealizada');
            }else{ 
                echo  "algo deu errado"; 
            }

        }

        //MOVENDO PRA LIXEIRA conteúdo
        if ($acaoRecebida == "Restaurar") {

            // echo "Ok! Vamos ocultar conteúdo";
            $selecionaAcao = "UPDATE credenciados_ext SET status = 'Publicado' WHERE id = '$acoRotativo'";
            $consultaAcao = $conexao -> prepare($selecionaAcao);
            $consultaAcao -> execute();

           if($consultaAcao){ 
               header('Location:'. $acaoRetorno .'?Acao=Visualizar&Rotativo='. $clinicaRef .'&Status=AcaoRealizada');
           }else{ 
               echo  "algo deu errado"; 
           }

       }


        //MOVENDO PRA LIXEIRA conteúdo
        if ($acaoRecebida == "Excluir") {

            // echo "Ok! Vamos ocultar conteúdo";
            $selecionaAcao = "DELETE FROM credenciados_ext WHERE id = '$acoRotativo'";
            $consultaAcao = $conexao -> prepare($selecionaAcao);
            $consultaAcao -> execute();

           if($consultaAcao){ 
               header('Location:'. $acaoRetorno .'?Acao=Visualizar&Rotativo='. $clinicaRef .'&Status=AcaoRealizada');
           }else{ 
               echo  "algo deu errado"; 
           }

       }

    }
    

?>