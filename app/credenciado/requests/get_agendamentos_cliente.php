<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['cliente']) )
{
	$result = getAgendamentosCliente( $_POST['cliente'] );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "[]s";
} 

?>