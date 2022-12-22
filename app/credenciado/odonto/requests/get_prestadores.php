<?php
include_once '../util/functions.php';
startSession();

if( isset($_POST['nome']) )
{
	$result = getPrestadores( $_POST['nome'] );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "[]s";
} 

?>