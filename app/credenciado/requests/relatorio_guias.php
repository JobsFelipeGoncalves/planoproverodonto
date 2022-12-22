<?php
include_once '../util/functions.php';
startSession();

if( isset( $_POST['status'], $_POST['datade'], $_POST['dataat'], $_POST['nomeas'] ) )
{
	$result = getRelatorioGuias( $_POST['status'], $_POST['datade'], $_POST['dataat'], $_POST['nomeas'] );
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
	echo "[]s";
} 

?>