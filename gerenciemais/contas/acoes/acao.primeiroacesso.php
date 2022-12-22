<?php

    include_once('../../aplicacao/configuracao.php');          
    include_once('../../aplicacao/conexao.php');  

     //recebe os campos do formulário
     $recebeDadosConvite = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      
    //remove os espeços do inicio e final dos campos
      $recebeDadosConvite = array_map("trim", $recebeDadosConvite);
     
      //recebe os campos do formulários
      $nome = $recebeDadosConvite['nome'];
      $sobrenome = $recebeDadosConvite['sobrenome'];
      $senha = $recebeDadosConvite['senha'];
      $senhaC = $recebeDadosConvite['senhaC'];
      $contaRecuperado = $recebeDadosConvite['contaRecuperado'];
      $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);



      if($senhaC != $senha){

          echo '
                <div class = "gm-mensagens">
                  <div class="row">
                      <div class="col">
                          <div class="alert alert-danger show" role="alert">
                              <strong>Ops!</strong> <br><br>
                              As senhas não as mesmas. Elas precisam ser identicas.
                          </div>
                      </div>
                  </div>    
                </div>         
              ';

      }else{

        $inserir = "UPDATE contas SET status = 'Ativo', nome = '$nome', sobrenome = '$sobrenome', senha= '$hashed_senha', convite = 'Inativo' WHERE id = '$contaRecuperado'";
        $acao = $conexao -> prepare ($inserir);
        $acao -> execute();

            //verifica se cadastrou
            if($acao){
                echo '
                    <div class = "gm-mensagens">
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-success show" role="alert">
                                    <strong>Pronto!</strong> <br><br>
                                    Cadastro realizados. Vamos fazer o login agora, ok? 
                                </div>
                            </div>
                        </div>    
                    </div>         
                ';

                echo '
                    <script type="text/javascript">
                        setTimeout(function() { window.location.href = "'.$URL_BASE.' "; }, 5000);
                    </script>       
                ';



            }else{

                echo '
                    <div class = "gm-mensagens">
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger show" role="alert">
                                    <strong>Ops!</strong> <br><br>
                                    As senhas não as mesmas. Elas precisam ser identicas.
                                </div>
                            </div>
                        </div>    
                    </div>         
                ';

            }
        
      }

      // var_dump($recebeDados);
     