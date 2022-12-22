<?php
include 'functions.php';
startSession();
$bd = connectDB();

if( !isset( $_POST['cliente'], $_POST['pagAberto'] ) )
{
	die("ERROR");
}
else
{
	echo alteraPagamentoCliente( $_POST['cliente'], $_SESSION[SESSIONL_EMPRESA], $_POST['pagAberto'] );
	die();
}


?>