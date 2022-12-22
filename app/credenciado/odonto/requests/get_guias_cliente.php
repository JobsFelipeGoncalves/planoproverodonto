<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['cliente']) )
{
	$result = getGuiasDoDiaDoCliente( $_POST['cliente'] );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "[]";
} 

?>