<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['guia']) )
{
	$result = cancelarGuia( $_POST['guia'] );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "{'error':'Parâmetros inválidos'}";
} 

?>