<?php

    // $host = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $banco = "proverodonto";
    // $porta = "";
    $host = "162.214.188.99";
    $usuario = "appwbc_podonto";
    $senha = "PoD$21@onto20";
    $banco = "appwbc_podonto";
    $porta = "3306";    
    //conexao com o bando de dados com porta
    //$conexao = new PDO("mysql:host=$host;port=$porta;dbname=".$banco, $usuario, $senha);
    
    //conexao com o bando de dados csem porta
    $conexao = new PDO("mysql:host=$host;dbname=".$banco, $usuario, $senha);
