<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['contrato'], $_POST['matricula'], $_POST['nome'], $_POST['cpf']) )
{
	$result = getAssociadosByCod( $_POST['contrato'], $_POST['matricula'], $_POST['nome'], $_POST['cpf'] );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "[]s";
} 

?>