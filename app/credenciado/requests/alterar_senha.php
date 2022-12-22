<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['senha1'], $_POST['senha2']) )
{
	$senha1 = trim($_POST['senha1']);
    $senha2 = trim($_POST['senha2']);
	$credenciado = $_SESSION[SESSIONL_ID];

	$result = array();

    if( str_len( $senha1 ) < 5 )
    {
        $result = array("error" => "A senha deve ter pelo menos 5 caracteres");
    }
	if( $senha1 != $senha2 )
    {
        $result = array("error" => "Senhas diferentes");
    }
    else if ( alterarSenha( $credenciado , $senha1) == false )
    {
        $result = array("error" => "Erro desconhecido");
    }
    else
    {
        $result = array("error" => "OK");
    }

	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "{'error':'Parâmetros inválidos'}";
} 

?>