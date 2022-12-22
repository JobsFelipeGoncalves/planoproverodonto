<?php
include_once 'util/functions.php';
startSession( false );



$indexEnviar = "index.php";
 
// Desfaz todos os valores da sessão  
$_SESSION = array();
 
// obtém os parâmetros da sessão 
$params = session_get_cookie_params();
 
// Deleta o cookie em uso. 
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// Destrói a sessão 
session_destroy();
header('Location: '.$indexEnviar );


?>