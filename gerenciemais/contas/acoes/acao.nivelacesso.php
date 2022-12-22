<?php
        include_once('../../aplicacao/configuracao.php');          
        include_once('../../aplicacao/conexao.php');          

        //recebe os campos do formulário
        // echo "aa";
        $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //remove os espeços do inicio e final dos campos
        $recebeDados = array_map("trim", $recebeDados);

        //recebe os campos do formulários
        echo $nivel = $recebeDados['nivelAcesso']."<br>";
        echo $urlRec = $recebeDados['urlAtual']."<br>";
        echo $contaRecuperada = $recebeDados['contaRecuperada'];
      
        $altera = "UPDATE contas SET nivelAcesso = '$nivel' WHERE id = '".$contaRecuperada."'";

                    $acao = $conexao -> prepare ($altera);
                    $acao -> execute ();


                    if($acao){

                            echo '
                                <div class = "gm-mensagens">
                                    <div class="row">
                                        <div class="col text-left">
                                            <div class="alert alert-success show" role="alert">
                                                <strong>Pronto!</strong> <br>
                                                Nível de acesso alterado com sucesso.
                                            </div>
                                        </div>
                                    </div>    
                                </div>         
                            ';

                            echo '
                                <script type="text/javascript">
                                    setTimeout(function() { window.location.href = "'. $urlRec .'"; }, 1000);
                                </script>       
                            ';

                    }else{

                            echo '
                                <div class = "gm-mensagens">
                                    <div class="row">
                                        <div class="col">
                                            <div class="alert alert-danger show" role="alert">
                                                <strong>Ops!</strong> <br>
                                                Ocorreu um erro ao mudar o nível de acesso. Tente mais tarde.
                                            </div>
                                        </div>
                                    </div>    
                                </div>         
                            ';

                    }


?>