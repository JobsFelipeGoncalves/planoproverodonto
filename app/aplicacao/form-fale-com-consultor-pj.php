<?php
  include_once ("../../connection/connection.php");

  $nomeempresa = $_POST['NomeEmpresaConsultor'];
  $nColaboradores = $_POST['numeroColaboradoresConsultor'];

	$nome = $_POST['NomeConsultor'];
  $estado = $_POST['estadoConsultor'];
	$cidade = $_POST['cidadeConsultor'];
  $email = $_POST['emailConsultor'];
	$fone = $_POST['celularConsultor'];
	$assunto = $_POST['assuntoConsultor'];
	$mensagem = $_POST['duvidaConsultor'];
	$email_remetente = "relaciomento@proverodonto.com.br";

  //Variáveis
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  function deixarNumero($string){
    return preg_replace("/[^0-9]/", "", $string);
  }


        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;

        //remove os espeços do inicio e final dos campos
        // $recebeDados = array_map("trim", $recebeDados);

        // //cria um id rotativo
        // $idRotativo = rand(000000000,999999999); 
        // $identificador = $idRotativo;

        // // var_dump($recebeDados)
        // $inserir = "INSERT INTO pedidosconsultor  (id, status, data, nome, email, telefone, estado, cidade, assunto, texto) 
        //             VALUES ('$identificador', 'Não lido', '$data', '$nome', '$email', '$fone', '$estado', '$cidade', '$assunto', '$mensagem')";

        //             $acao = $conexao -> prepare ($inserir);
        //             $acao -> execute ();

        // //verifica se cadastrou
        // if($acao) {

            //Compo E-mail
                $arquivo = '
                     <div class="main" style = "margin: auto; font-family: Arial; font-size: 16px; max-width: 500px; padding: 20px; min-width: 300px; border: 0px solid red;">
                      <div class="topo-mail" style = "width: 100%;  border-bottom: 1px solid #ccc; padding: 15px 0px;">
                        <img src="http://www.proverodonto.com.br/require/img/logo/logo_prover_odonto.png" alt="" width="200px;">
                      </div>

                      <div class="corpo-mail" style = "width: 100%; margin-top: 20px; padding: 10px 0px; border-bottom: 0px solid #ccc; color: #909090;">
                        <h1 style = "color: #2897cf">'.$nome.' quer mais informações sobre o plano Prover Odonto para Empresas.</h1>
                        <p style = "font-size: 18px;">
                          Esses são os dados dele(a):
                        </p>
                        <p style = "padding: 20px; margin: 10px; border-radius: 3px; background-color: #fafafa; border-left: 2px solid #2897cf;">
                          <span style = "color: #c1c1c1;">Nome de empresa</span><br>
                          <span style = "font-size: 20px; color: #707070;">'.$nomeempresa.'</span>
                          <br><br>
                          <span style = "color: #c1c1c1;">Nº de colaboradores</span><br>
                          <span style = "font-size: 20px; color: #707070;">'.$nColaboradores.'</span>
                          <br><br>
                          <span style = "color: #c1c1c1;">Nome</span><br>
                          <span style = "font-size: 20px; color: #707070;">'.$nome.'</span>
                          <br><br>
                          <span style = "color: #c1c1c1;">Telefone</span><br>
                          <span style = "font-size: 20px; color: #707070;">'.$fone.'</span><br>
                          <span style = "font-style: italic;">Se o número for WhatsApp, clique <a href = "https://api.whatsapp.com/send?phone='.deixarNumero($fone).'" target="_blank" style = "font-weight: bold; color: #2897cf; text-decoration: none;">aqui</a> para conversar</span>
                          <br><br>
                          <span style = "color: #c1c1c1;">E-mail</span><br>
                          <span style = "font-size: 20px; color: #707070;">'.$email.'</span><br>
                          <span style = "font-style: italic;">Clique <a href = "mailto:'.$email.'" target="_blank" style = "font-weight: bold; color: #2897cf; text-decoration: none;">aqui</a> para conversar por e-mail</span>
                          <br><br>
                          <span style = "color: #c1c1c1;">Cidade</span><br>
                          <span style = "font-size: 20px; color: #707070;">'.$cidade.'/'.$estado.'</span>
                          <br><br>
                          <i style = "font-size: 14px; color: #c1c1c1;">Mensagem enviada em '.$data_envio.' às '.$hora_envio.'</i><br>

                        </p>
                      </div>

                      <div class="ropade-mail" style = " font-size: 13px; color: #909090; width: 100%; margin-top: 20px;  border-top: 1px solid #ccc; padding: 15px 0px;">

                        <p>Formulario de origem<b> Fale com um consultor</b>. <Br>
                          &#x1D55A; | Não é necessário responder esse e-mail, pois são automáticos vindos dos formulários do site Prover Odonto.</p>
                        <p >
                          © Prover Odonto - ANS - º 42253-3.<br>
                          Todos os Direitos Reservados ao Grupo Prover Odontologia LTDA
                        </p>
                      </div>
                  </div>
                ';
                
                //Emails para quem será enviado o formulário
                $destino = "marketing@proverodonto.com.br";
                $assunto = "[ Fale com consultor PJ | Prover Odonto ] ".$nome." solicitou uma proposta do Prover Odonto Empresarial";

                //Este sempre deverá existir para garantir a exibição correta dos caracteres
                $headers  = "MIME-Version: 1.0\n";
                $headers .= "Content-type: text/html; charset=UTF-8\n";
                $headers .= "De: $nome <$email_remetente>";

                if(mail($destino, $assunto, $arquivo, $headers)){
                       echo '
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Prontinho!!!</strong> <br>
                                Em breve CONSULTOR entrará em contato com você! Fique atento nos canais que você informou.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                          ';

                          echo '
                              <script type="text/javascript">
                              setTimeout(function() {
                                  window.location.href = "https://proverodonto.com.br/";
                              }, 3000);
                            </script>
                          ';
                  }else{
                    echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>Ops!!!</strong> <br>
                          Algo deu errado! Tente mais tarde!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    ';
                  }

      // }else{
      //   echo '
      //       <div class="alert alert-warning alert-dismissible fade show" role="alert">
      //         <strong>Ops!!!</strong> <br>
      //         Algo deu errado! Tente mais tarde!
      //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      //           <span aria-hidden="true">&times;</span>
      //         </button>
      //       </div>
      //   ';
    
      // }




?>
