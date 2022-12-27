<?php
    @session_start();
    @ob_start();

    //inclui minha conexao com o bando de dados
    include_once ("conexao.php");

    //url do cliente
    $URL_BASE_CLIENT = "https://proverodonto.com.br/";
    //$URL_BASE_CLIENT = "http://localhost/proverodonto/";

    //bases Gerencie mais
    $URL_BASE = $URL_BASE_CLIENT."gerenciemais/";
    // $URL_BASE = "http://localhost/gerenciemais/";
    $URL_IMG = $URL_BASE."imagens/";
    $URL_CSS = $URL_BASE."scripts/css/";
    $URL_JS  = $URL_BASE."scripts/js/";
    $VERSAO_GM = '2.0';

    //url gerado pelo servidor
    $URL_ATUAL = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    //verifica o suauário que esta logado
    // $USUARIO_ATUAL = "Roberto Venture";
    if(isset($_SESSION['idSessao'])){

        //recupera os dados da sessao
        $idSessaoR = $_SESSION['idSessao'];

        $selecionaSessao = "SELECT * FROM contas WHERE id  = '". $idSessaoR ."'";
        $acaoSessao = $conexao -> prepare($selecionaSessao);
        $acaoSessao -> execute();

            if(($acaoSessao) AND ($acaoSessao -> rowCount () != 0)){

                while($registoSessao = $acaoSessao -> fetch(PDO::FETCH_ASSOC)){

                    $nomeUserLogado = $registoSessao['nome'];
                    $emailUserLogado = $registoSessao['email'];
                    $nivelUserLogado = $registoSessao['nivelAcesso'];

                    $USUARIO_ATUAL = $registoSessao['nome'];
                }
            }
                $nomeUserLogadoS =  $nomeUserLogado;
                $emailUserLogadoS = $emailUserLogado;
                $nivelUserLogadoS = $nivelUserLogado;
    }
    

?>