<?php

        session_start();
        ob_start();

        include_once('../../aplicacao/configuracao.php');          
        include_once('../../aplicacao/conexao.php');          

        

        //recebe os campos do formulário
        $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //remove os espeços do inicio e final dos campos
        $recebeDados = array_map("trim", $recebeDados);

        //recebe os campos do formulários
        $email = $recebeDados['email'];
        $senha = $recebeDados ['senha'];

        $seleciona = "SELECT * FROM contas WHERE email = '$email' AND status = 'Ativo' LIMIT 1";
                     $acao = $conexao -> prepare($seleciona);
                     $acao -> execute();

                     if(($acao) AND ($acao -> rowCount () != 0)){

                            while($registo = $acao -> fetch(PDO::FETCH_ASSOC)){

                                if(password_verify($senha, $registo['senha'])){


                                    $_SESSION['nomeSessao'] = $registo['nome'];
                                    $_SESSION['emailSessao'] = $registo['email'];
                                    $_SESSION['idSessao'] = $registo['id'];

                                    echo '
                                            <div class = "gm-mensagens">
                                                <div class="row">
                                                    <div class="col text-left">
                                                        <div class="alert alert-success show" role="alert">
                                                            <strong>Tudo certo!</strong> <br>
                                                            Entrando no Gerencie mais.
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>   
                                    ';

                                    

                                    echo '
                                        <script type="text/javascript">
                                            setTimeout(function() { window.location.href = "../app/?Acao=Inicio"; }, 2000);
                                        </script>       
                                    ';


                                }else{

                                    $_SESSION['msg'] = '
                                        <div class = "gm-mensagens">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="alert alert-danger show" role="alert">
                                                        <strong>Ops!</strong> <br>
                                                        O email ou senha estão incorretos.
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>         
                                    ';

                                       

                                }

                            }

                        


                     }else{

                            // echo '
                            //     <div class = "gm-mensagens">
                            //         <div class="row">
                            //             <div class="col">
                            //                 <div class="alert alert-danger show" role="alert">
                            //                     <strong>Ops!</strong> <br>
                            //                     O email ou senha estão incorretos.
                            //                 </div>
                            //             </div>
                            //         </div>    
                            //     </div>         
                            // ';

                            $_SESSION['msg'] = '
                                <div class = "gm-mensagens">
                                    <div class="row">
                                        <div class="col">
                                            <div class="alert alert-danger show" role="alert">
                                                <strong>Ops!</strong> <br>
                                                O email ou senha estão incorretos.
                                            </div>
                                        </div>
                                    </div>    
                                </div>         
                            ';



                     }

                     if(isset($_SESSION['msg'])){

                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);

                     }
      
        // $altera = "UPDATE contas SET nivelAcesso = '$nivel' WHERE id = '$idRecuperadoAcesso'";

        //             $acao = $conexao -> prepare ($altera);
        //             $acao -> execute ();


        //             if($acao){

        //                     echo '
        //                         <div class = "gm-mensagens">
        //                             <div class="row">
        //                                 <div class="col text-left">
        //                                     <div class="alert alert-success show" role="alert">
        //                                         <strong>Pronto!</strong> <br>
        //                                         Nível de acesso alterado com sucesso.
        //                                     </div>
        //                                 </div>
        //                             </div>    
        //                         </div>         
        //                     ';

        //                     echo '
        //                         <script type="text/javascript">
        //                             setTimeout(function() { window.location.href = "geralcontas.php?Acao=Lista"; }, 5000);
        //                         </script>       
        //                     ';

        //             }else{

        //                     echo '
        //                         <div class = "gm-mensagens">
        //                             <div class="row">
        //                                 <div class="col">
        //                                     <div class="alert alert-danger show" role="alert">
        //                                         <strong>Ops!</strong> <br>
        //                                         Ocorreu um erro ao mudar o nível de acesso. Tente mais tarde.
        //                                     </div>
        //                                 </div>
        //                             </div>    
        //                         </div>         
        //                     ';

        //             }


?>