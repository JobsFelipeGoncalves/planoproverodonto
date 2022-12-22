<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['agenda']) )
{
	echo json_encode( getGuiaByAgendamento($_POST['agenda']) , JSON_UNESCAPED_UNICODE);
}
else
{
	echo "{'error':'Parâmetros inválidos'}";
} 

?>