<?php
        include_once('../../aplicacao/configuracao.php');          
        include_once('../../aplicacao/conexao.php');        
        
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
      
        require 'lib/vendor/phpmailer/phpmailer/src/Exception.php';
        require 'lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require 'lib/vendor/phpmailer/phpmailer/src/SMTP.php';
      
        require 'lib/vendor/autoload.php';

        //recebe os campos do formulário
        $recebeDadosConvite = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //remove os espeços do inicio e final dos campos
        $recebeDadosConvite = array_map("trim", $recebeDadosConvite);

        //cria um id rotativo
        $idRotativo = rand(000000000,999999999); 
        $identificador = $idRotativo;


        //recebe os campos do formulários
        $nome = $recebeDadosConvite['nomeAcesso'];
        $email = $recebeDadosConvite['emailAcesso'];
        $nivel = $recebeDadosConvite['nivelAcesso'];


        //verfica se existe o e-mail
        $seleciona_email = "SELECT * FROM contas WHERE email = '$email'";
        $consulta_email = $conexao -> prepare($seleciona_email);
        $consulta_email -> execute();

        //verifica se já existe algum e-mail registrado.
        if($consulta_email -> rowCount () == 0){

            //Inseri o novo usuário no banco gerando um novo convite
            $inserir = "INSERT INTO contas (id, status, email, nome, nivelAcesso, convite)  
                        VALUES ('$identificador', 'Pendente', '$email', '$nome', '$nivel', 'Ativo')";

                        $acao = $conexao -> prepare ($inserir);
                        $acao -> execute ();


                        if($acao){

                            $link_email = $URL_BASE."contas/primeiroacesso.php?Acao=PrimeiroAcesso&Convite=Ativo&Status=Pendente&Email=". $email ."&conta=".$identificador;
                            try {
                                //Server settings
                                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                $mail->CharSet = 'UTF-8';
                                $mail->isSMTP();                                            //Send using SMTP
                                $mail->Host       = 'smtp.proverodonto.com.br';                     //Set the SMTP server to send through smtp.kinghost.net
                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                $mail->Username   = 'relacionamento@proverodonto.com.br';                     //SMTP username
                                $mail->Password   = 'RelCliOdoProv@2021';                               //SMTP password
                                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                $mail->SMTPSecure = 'ssl';    // SSL REQUERIDO pelo GMail
                        
                                //Recipients
                                $mail->setFrom('relacionamento@proverodonto.com.br', 'Convite para administrar um conta');
                                $mail->addAddress('felipegoncalves@proversaude.com.br');     //Add a recipient
                                // $mail->addAddress('ellen@example.com');               //Name is optional
                        
                        
                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = $nome.' enviou uma mensagem pelo seu site';
                                $mail->Body    = '
                                                
                                        
                                        <!-- INICIO DO E-MAIL 

                                        © Gerencie mais - E-mails V.1.0
                                        Todos os Direitos Reservados.
                                        Desenvolvido por Felipe Gonçalves. 

                                        -->
                                        <div 
                                            id = "gm-email-box"
                                            class = "gm-email-box grade-principal"
                                            style = "min-width: 300px;
                                                    max-width: 600px;
                                                    padding: 10px;
                                                    margin: 10px;
                                                    border:0px solid red;
                                                    color: darkslategray;
                                                    font-family: "Montserrat", sans-serif; 
                                                    font-size: 16px;">
                                                
                                                
                                                <div id = "gm-email-topo"
                                                    class = "gm-email-topo"
                                                    style = "width: 100%;
                                                            padding-top: 30px;
                                                            padding-bottom: 30px;
                                                            border: 0px solid blue;
                                                            text-align: center;">
                                                    
                                                    <img src = "https://github.com/felipe-goncalves/marcas/blob/main/gerencie_mais.png?raw=true" 
                                                        alt = "Gerencie mais por Felipe Gonçalves"
                                                        title = "Gerencie mais por Felipe Gonçalves"
                                                        style = "width: 250px;
                                                                height: auto;"/>
                                                </div><!-- gm-email-topo -->
                                            
                                                <div div = "gm-email-corpo"
                                                    class = "gm-email-corpo"
                                                    style = "width: 80%;
                                                            margin: 5%;
                                                            padding: 5%;
                                                            text-align: center;">
                                                    
                                                    <img src = "https://github.com/felipe-goncalves/extras/blob/main/3255309.jpg?raw=true" 
                                                        alt = "Gerencie mais por Felipe Gonçalves"
                                                        title = "Gerencie mais por Felipe Gonçalves"
                                                        style = "width: 300px;
                                                                height: auto;"/>
                                                    
                                                    <h1 class = "titulo-gm-email"
                                                        style = "color: #FF3A50;">
                                                        Venha gerenciar conosco.
                                                    </h1>
                                                    
                                                    <p >
                                                        Você recebeu um convite para ajudar a gerenciar o site <strong style = "color: #FF3A50;">'. $URL_BASE_CLIENT .'</strong>. Aceite e crie sua conta.
                                                    </p>
                                                    <p>
                                                        <a href = "'. $link_email .'"
                                                        class = "gm-email-botao"
                                                        style = "padding: 8px 16px; 
                                                                    color: #FFF; 
                                                                    background: #FF3A50;
                                                                    font-weight: 600; 
                                                                    line-height: 1.5; 
                                                                    text-align: center; 
                                                                    text-decoration: none; 
                                                                    border-radius: 4px; 
                                                                    display: inline-block; 
                                                                    vertical-align: middle; 
                                                                    cursor: pointer; 
                                                                    -webkit-user-select: none; 
                                                                    -moz-user-select: none; 
                                                                    user-select: none;">
                                                            Aceitar convite
                                                        </a>
                                                    </p>
                                                    
                                                </div> <!-- gm-email-corpo -->
                                            
                                                <div id = "gm-email-rodape"
                                                    class = "gm-email-rodape"
                                                    style = "width: 80%;
                                                            margin: 5%;
                                                            padding: 5%;
                                                            text-align: center;">
                                                    
                                                    <p class = "gm-email-texto"
                                                    style = "color: darkgrey;
                                                                font-size: 14px;">
                                                        Não é necessário responder esse e-mail, pois o mesmo é automático.
                                                    </p>
                                                    
                                                    <p class = "gm-email-texto"
                                                    style = "font-size: 12px;
                                                                color: darkgrey">
                                                        &copy; Gerencie mais.
                                                        Todos os Direitos Reservados.<br>
                                                        Criado e desenvolvido por
                                                        <a href = "https://felipe-goncalves.github.io/"
                                                        target = "_blank"
                                                        style = "color: #FF3A50;
                                                                    text-decoration: none;
                                                                    font-weight: 600;
                                                                    cursor: pointer; 
                                                                    -webkit-user-select: none; 
                                                                    -moz-user-select: none; 
                                                                    user-select: none;">
                                                            Felipe Gonçalves
                                                        </a>.
                                                        <br><br>
                                                        <img src = "https://github.com/felipe-goncalves/felipe-goncalves.github.io/blob/master/simbolo-fg.png?raw=true" 
                                                        alt = "Gerencie mais por Felipe Gonçalves"
                                                        title = "Gerencie mais por Felipe Gonçalves"
                                                        style = "width: 40px;
                                                                height: auto;"/>
                                                    </p>
                                                    
                                                </div> <!-- gm-email-rodape -->
                                            
                                        </div><!-- gm-email-box -->
                                        <!-- FIM DO E-MAIL -->
                        
                                                ';
                        
                                $mail->AltBody = "

                                                Venha gerenciar conosco!
                                                ..

                                                Você recebeu um convite para ajudar a gerenciar o site ". $URL_BASE_CLIENT .". Aceite e crie sua conta.
                                                Aceitar e criar conta: [". $link_email ."]
                                                
                                                --
                                                Não é necessário responder esse e-mail, pois o mesmo é automático.
                                                © Gerencie mais. Todos os Direitos Reservados.
                                                Criado e desenvolvido por Felipe Gonaçalves.
                                                [https://felipe-goncalves.github.io/]
                        
                                                ";
                        
                        
                        
                        
                                    if($mail->send()){
                                        echo '
                                            <div class = "gm-mensagens">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="alert alert-success show" role="alert">
                                                            <strong>Tudo certo!</strong> <br>
                                                            Veja se você recebeu um link no e-mail informado.
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>         
                                        ';
                            
                            
                                    }else{

                                        echo '
                                            <div class = "gm-mensagens">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="alert alert-danger show" role="alert">
                                                            <strong>Algo deu errado!</strong> <br>
                                                            Não conseguimos enviar uma recuperação para o e-mail informado.
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>         
                                        ';

                                    }
                        
                            } catch (Exception $e) {
                        
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                // echo '
                                //     <div class = "gm-mensagens">
                                //         <div class="row">
                                //             <div class="col">
                                //                 <div class="alert alert-danger show" role="alert">
                                //                     <strong>Algo deu errado!</strong> <br>
                                //                     Não conseguimos enviar uma recuperação para o e-mail informado.
                                //                 </div>
                                //             </div>
                                //         </div>    
                                //     </div>         
                                // ';
                        
                            }

                            

                        }else{

                            echo '
                                <div class = "gm-mensagens">
                                    <div class="row">
                                        <div class="col">
                                            <div class="alert alert-danger show" role="alert">
                                                <strong>Hum!</strong> <br>
                                                Algo deu errado ao tentar enviar o convite. Tente mais tarde.
                                            </div>
                                        </div>
                                    </div>    
                                </div>         
                            ';
                            
                        }

            

        }else{

            echo '
                <div class = "gm-mensagens">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-warning show" role="alert">
                                <strong>Ops!</strong> <br>
                                Esse e-mail já foi cadastrado. Tente outro.
                            </div>
                        </div>
                    </div>    
                </div>         
            ';

        }

?>