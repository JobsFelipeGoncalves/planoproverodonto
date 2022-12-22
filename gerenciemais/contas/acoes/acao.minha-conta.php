<?php


    include_once('../../aplicacao/configuracao.php');          
    include_once('../../aplicacao/conexao.php');  

 //recebe os campos do formulário
 $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  
//remove os espeços do inicio e final dos campos
  $recebeDados = array_map("trim", $recebeDados);
 
  //recebe os campos do formulários
  $urlAtual = $recebeDados['urlAtual'];
  $nome = $recebeDados['nome'];
  $sobrenome = $recebeDados['sobrenome'];
  $contaRecuperado = $recebeDados['contaRecuperado'];
  $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);
  $email =  $recebeDados['email'];



  $inserir = "UPDATE contas SET nome = '$nome', sobrenome = '$sobrenome', email = '$email' WHERE id = '$contaRecuperado'";
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
                              Alteração realizada. 
                          </div>
                      </div>
                  </div>    
              </div>         
          ';

          echo '
              <script type="text/javascript">
                  setTimeout(function() { window.location.href = "'.$urlAtual.' "; }, 5000);
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



?>