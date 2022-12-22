<?php
//$banco="resultnowms", $usuario="resultnowms", $senha="rhematec26", $hostname="mysql.w1agencia.com.br"
//$banco="resultnow", $usuario="root", $senha="", $hostname="localhost"
//function connect($banco="resultnowms", $usuario="resultnowms", $senha="rhematec26", $hostname="mysql.resultnowms.com.br") {
function connect($banco="resultnowms", $usuario="root", $senha="", $hostname="localhost") {
	$connect = mysqli_connect($hostname, $usuario, $senha, $banco);

	if(!$connect) {
		die (trigger_error("Não foi possível estabelecer a conexão"));
		return false;
	} else {	
		return $connect;
	}
}
?>