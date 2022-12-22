<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['dados']) )
{
	$dados = json_decode($_POST['dados'], true);

	$result = novoOrcamento( $dados );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "{'error':'Parâmetros inválidos'}";
} 

?>