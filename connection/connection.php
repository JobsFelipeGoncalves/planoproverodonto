<?php
    // $host = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $banco = "proverodonto";
    // $porta = "";

    $host = "127.0.0.1";
    $usuario = "appwbc_podonto";
    $senha = "PoD$21@onto20";
    $banco = "appwbc_podonto";
    $porta = "3306";
    
    $conexao = new PDO("mysql:host=$host;dbname=".$banco, $usuario, $senha);

?>