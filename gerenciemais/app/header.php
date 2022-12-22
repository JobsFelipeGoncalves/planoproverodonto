<?php
    if(!isset($_SESSION['idSessao']) AND !isset($_SESSION['emailSessao'])){

        ob_start();
        unset( $_SESSION['idSessao'], $_SESSION['emailSessao']);

            echo '
                <script type="text/javascript">
                    setTimeout(function() { window.location.href = "../contas/entrar.php?Acao=Entrar&Login=Invalido&Sessao=Encerrado&Status=LoginInvalido"; }, 0000);
                </script>       
            ';

    }
?>
    
    <!-- div apoio -->
    <header class = "header fixed-top">
        <!-- header -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="row">

                    <div class="col col-m-2">
                        <a href="#recursos" alt = "Abrir recursos" title = "Abrir recursos" class = "icone-recursos" data-bs-toggle="offcanvas" data-bs-target="#menu-recursos" aria-controls="menu-recursos">
                            <span class="material-icons-round icones">widgets</span> 
                        </a>
                    </div>

                    <div class="col col-md">
                        <a class="navbar-brand" href="<?= $URL_BASE ?>app/?Acao=Inicio">
                            <img src="<?= $URL_IMG ?>/logo/gerencie_mais.png" alt="" class = "logo-gm">
                        </a>
                    </div>
                </div>


            </div>
        </nav>
    </header>
    <div class="espaco-extra"></div>

    <!-- menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="menu-recursos" aria-labelledby="menu-recursosLabel">
        <div class="offcanvas-header">
            <a class="navbar-brand" href="<?= $URL_BASE ?>app/?Acao=Inicio">
                <img src="<?= $URL_IMG ?>/logo/gerencie_mais.png" alt="" class = "logo-gm-menu">
            </a>
            <!-- <h5 class="offcanvas-title" id="menu-recursosLabel">Recursos</h5> -->
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-4">

            <div class="links-menu">

                <div class="row mb-4">
                    <div class="col-md-3">
                        <img src="<?= $URL_IMG ?>perfil/venture_roberto_vetor.png" class = "img-fluid nav-perfil-menu" alt="">
                    </div>
                    <div class="col-md">
                        <p class = "d-flex align-items-center">
                            <h5><?= $nomeUserLogadoS ?></h5>
                            <a href="../contas/minhaconta.php?Acao=ListarConta&Conta=<?= $_SESSION['idSessao'] ?>&RetornoUrl=<?= $URL_ATUAL ?>" class = "links">Minha conta &#10132;</a>
                        </p>
                    </div>
                </div>

<?php if ($nivelUserLogadoS == "Editor" || $nivelUserLogadoS == "Mestre"){ ?>

                <p class="cor-preto-c maiusculo fonte-16">
                    Conteúdos
                </p>
                <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profissionais.php?Acao=Listar">
                        <span class="material-icons-round icones">assignment_ind</span> Profissionais credenciados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="centralDeAjuda.php?Acao=Lista">
                        <span class="material-icons-round icones">help_center</span> Central de Ajuda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="centralDePrivacidade.php?Acao=Lista">
                        <span class="material-icons-round icones">shield</span> Central de Privacidade
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="material-icons-round icones">description</span> Páginas
                        </a>
                    </li> -->
                </ul>

        
<?php } ?>
<?php if ($nivelUserLogadoS == "Consultor" || $nivelUserLogadoS == "Mestre"){ ?>
                <p class="cor-preto-c maiusculo fonte-16">
                    SOLICITAÇÕES
                </p>

                <ul class="nav flex-column mb-4">      
<?php if ($nivelUserLogadoS == "Editor" || $nivelUserLogadoS == "Mestre"){ ?>
                <li class="nav-item">
                <?php
                        $selecionCredenciados =  "SELECT * FROM pedidoscredenciados WHERE status = 'Não lido'";
                        $selecionCredenciados = $conexao -> prepare($selecionCredenciados);
                        $selecionCredenciados -> execute();

                        $contaCredenciados = $selecionCredenciados -> rowCount ();
                        

                    ?>  
                    <a class="nav-link" href="solicitacoesCredenciados.php?Acao=Listar">
                        <span class="material-icons-round icones">badge</span> Credenciamentos <?php if( $contaCredenciados != 0){ echo '<span class="badge bg-danger">'.$contaCredenciados .'</span>'; } ?>
                    </a>
                </li>
<?php } ?>              
                    <li class="nav-item">
                        <?php
                            $selecionContatos =  "SELECT * FROM pedidoscontatos WHERE status = 'Não lido'";
                            $selecionContatos = $conexao -> prepare($selecionContatos);
                            $selecionContatos -> execute();

                            $contaContatos = $selecionContatos -> rowCount ();

                        ?>  
                        <a class="nav-link" href="solicitacoesContatos.php?Acao=Listar">
                            <span class="material-icons-round icones">perm_contact_calendar</span> Contatos <?php if( $contaContatos != 0){ echo '<span class="badge bg-danger">'.$contaContatos .'</span>'; } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                    <?php
                            $selecionConsultor =  "SELECT * FROM pedidosconsultor WHERE status = 'Não lido'";
                            $selecionConsultor = $conexao -> prepare($selecionConsultor);
                            $selecionConsultor -> execute();

                            $contaConsultor = $selecionConsultor -> rowCount ();

                        ?>  
                        <a class="nav-link" href="solicitacoesConsultor.php?Acao=Listar">
                            <span class="material-icons-round icones">question_answer</span> Fale com um consultor <?php if( $contaConsultor != 0){ echo '<span class="badge bg-danger">'.$contaConsultor .'</span>'; } ?>
                        </a>
                    </li>
                    
                </ul>
<?php } ?>
                
                <!-- <p class="cor-preto-c maiusculo fonte-16">
                    Desempenho <span class="badge bg-secondary">BETA</span>
                </p>
                <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                        <span class="material-icons-round icones">travel_explore</span> Otimização de busca <span class="badge bg-secondary">NOVO</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span class="material-icons-round icones">extension</span> Integrações <span class="badge bg-secondary">NOVO</span>
                        </a>
                    </li>
                </ul>     -->
<?php if ($nivelUserLogadoS == "Mestre"){ ?>               
                <p class="cor-preto-c maiusculo fonte-16">
                    Acessos
                </p>
                <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../contas/geralcontas.php?Acao=Lista">
                        <span class="material-icons-round icones">people</span>  Contas de acesso
                        </a>
                    </li>
                </ul>
<?php } ?>
                <hr>
                <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?Encerrar=Sair">
                            <span class="material-icons-round icones">logout</span>   Sair do Gm
                        </a>
                    </li>
                </ul>
               
            </div>
        </div>
    </div>

    <?php

        if(isset($_GET['Encerrar'])){

            if($_GET['Encerrar'] == "Sair"){

                @session_start();
                ob_start();
                unset( $_SESSION['nomeSessao'], $_SESSION['emailSessao'], $_SESSION['idSessao']);

                    echo '
                        <script type="text/javascript">
                            setTimeout(function() { window.location.href = "../contas/entrar.php?Acao=Entrar&Login=Invalido&Sessao=Encerrado"; }, 1000);
                        </script>       
                    ';

            }

        }

        


    ?>