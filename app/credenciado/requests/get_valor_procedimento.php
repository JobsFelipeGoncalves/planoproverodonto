<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['cliente'], $_POST['procedimento'], $_POST['prestador'], $_POST['especialidade']) )
{
	$result = getValorByNomeProcedimento( $_POST['cliente'],$_POST['procedimento'], $_POST['prestador'], $_POST['especialidade'] );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "{'error':'Parâmetros inválidos'}";
} 

?>