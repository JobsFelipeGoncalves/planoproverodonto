<?php

error_reporting(E_ALL & ~ E_NOTICE);      
include_once ('../aplicacao/configuracao.php'); 

    $sql = $conexao->prepare("SELECT * FROM cidade WHERE estado = '".$_POST['cod_estado']."'");
	$sql->execute();
	$fetchAll = $sql->fetchAll();
	foreach($fetchAll as $cidades)
	{
	    echo '<option value="'.$cidades['id'].'">'.$cidades['nome'].'</option>';
	}

?>