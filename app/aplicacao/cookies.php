<?php
	//criacao de cookies
	$nome = "SiteProverOdonto";
	$chave = "site_prover_odonto";
	$tempo = time() + 60 * 60 * 24;
	$caminho = "";
	$dominio = "";
	$ssl =  "true";

	$sessao = setcookie($nome, $chave, $tempo, $caminho, $dominio, $ssl);
	

  if(isset($sessao)){
?>



<?php
  }
?>