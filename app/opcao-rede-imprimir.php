<?php
	include_once ("connection/connection.php");
	
	if(isset($_GET['estado']) && isset($_GET['cidade'])){




?>

<!doctype html>
<html>
<head> 
</script>
<title> Imprimindo rede credenciada Prover Odonto</title>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots"                content="index, follow" />

  <link rel="icon" href="<?= BASE_IMG ?>logo/logo_prover_odonto_icon.png">
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.responsivo.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>owl.carousel.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>animate.min.css">
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JGL33EVGE2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-JGL33EVGE2');
    </script>
</head>
<body class = "" >

	<section>
		<div class="container-fluid fundo-azul-fraco pt-2 pb-2 text-center">
			<div class="row">
				<div class="col">
					Precione <strong> Ctrl + P </strong>ou clique <a href="#imprimir" class="botao-linha" onClick="window.print()">aqui</a> para imprimir
					
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container mt-5 mb-2 pb-3" style="border-bottom: 1px solid #909090;">
			<div class="row">
				<div class="col-12 col-md-4 mb-3">
					<img src="<?= BASE_IMG ?>logo/logo_prover_odonto.png" alt = "Logo prover odonto" width = "250px">
				</div>
				<div class="col">
					<h3 class = "cor-azul">Rede Credenciada Prover Odonto</h3>
					<?php
						$dia = date('d'); $mes = date('m'); $ano = date('Y');
				        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
				        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i');
				        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;
					?>
					<p>Atualizada em <?= $data ?><br>Você pode agendar suas consultas diretamente com o prestador. <br>Caso tenha dúvidas, ligue 0800 002 9211.</p>
					
				</div>
			</div>
		</div>
	</section>


	<?php
		if($_GET['cidade'] == "todos"){

			$recebeEstado = $_GET['estado'];
			$recebeCidade = $_GET['cidade'];


			 // pesquisa ESTADO
      $consultaEstadoRecebido = "SELECT * FROM estado WHERE id = '$recebeEstado'";
      $consultasEstado = $conexao -> prepare($consultaEstadoRecebido);
      $consultasEstado -> execute();

      if(($consultasEstado) AND ($consultasEstado -> rowCount () != 0)){
        while($dadosEstado = $consultasEstado -> fetch(PDO::FETCH_ASSOC)){

        	//pesquisa CIDADE
              $pesquisaCidade = "SELECT * FROM cidade WHERE estado = '". $dadosEstado['id'] ."'";
              $consultaCidade = $conexao -> prepare($pesquisaCidade);
              $consultaCidade -> execute();


                  if(($consultaCidade) AND ($consultaCidade -> rowCount () != 0)){
                    while($dadosCidade = $consultaCidade -> fetch(PDO::FETCH_ASSOC)){


                  $profissionaisSel =  "SELECT * FROM credenciados WHERE cidade = '". $dadosCidade['id'] ."'";
                  $constaProf = $conexao -> prepare($profissionaisSel);
                  $constaProf -> execute();

                  if($constaProf -> rowCount () != 0){
       	

	?>



	<section>
		<div class="container mb-3">
			<div class="row">
				<div class="col" >
					<h5 class = "mt-4 mb-4">Profissionais em <span class="cor-azul negrito"><?= $dadosCidade['nome'] ?> - <?= $dadosEstado['nome'] ?></h5>

					<?php

						$pesquisaPrestador = "SELECT * FROM credenciados WHERE cidade = '".$dadosCidade['id']."' AND estado = '".$dadosEstado['id']."' ORDER BY nome ASC";
					  $selecionaPrestador = $conexao -> prepare($pesquisaPrestador);
					  $selecionaPrestador -> execute();

				      if(($selecionaPrestador) AND ($selecionaPrestador -> rowCount () != 0)){
				        while($dadosPrestador = $selecionaPrestador -> fetch(PDO::FETCH_ASSOC)){

				          if($dadosPrestador['status'] == "Publicado"){

				          	if($dadosPrestador['tipoCred'] == "Dentista"){ 
				          		$tituloPrestador = $dadosPrestador['nome']; 
				          		$registoPrestador = "CRO ".$dadosPrestador['numeroCRO']."/".$dadosPrestador['estadoCRO']; 
				          	}elseif($dadosPrestador['tipoCred'] == "Clínica"){ 
				          		$tituloPrestador = $dadosPrestador['nomeFantasia']; 
				          		$registoPrestador = "CNPJ ". $dadosPrestador['cnpj']; 
				          	}

					?>
					<!-- ============================= list | inicio ===================================== -->
						<div class="row ml-1 mr-1 mb-3 p-2" style = "border: 1px solid #ccc; border-radius: 5px;">
							<div class="col-11 col-md-11">
									<div class="row mb-1 mt-3">
										<div class="col-md">
											<p class = "fonte-18">
												<b><?= $tituloPrestador ?></b><br>
												<span class = "fonte-12"><?= $registoPrestador ?></span>
											</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<p class = "fonte-12 "> <b> Especialidade</b><br>
												<span class = "fonte-12">
													<?php echo $dadosPrestador['espConsulta'] != "" ?  $dadosPrestador['espConsulta']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espUrgencia'] != "" ?  $dadosPrestador['espUrgencia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espCirugia'] != "" ?  $dadosPrestador['espCirugia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espRadiologia'] != "" ?  $dadosPrestador['espRadiologia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espOdontopediatra'] != "" ?  $dadosPrestador['espOdontopediatra']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espDentistica'] != "" ?  $dadosPrestador['espDentistica']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espPeriodontia'] != "" ?  $dadosPrestador['espPeriodontia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espProteses'] != "" ?  $dadosPrestador['espProteses'] : "";  ?>
												</span>
											</p>											
										</div>
										 <?php if($dadosPrestador['tipoCred'] == "Clínica") {?>
										<div class="col-md-4">
											<p class = "fonte-14 "><b>Profissionais</b><br>
												<span class = "fonte-12">
													<?php 
                            $selecionaPrestadorInterno = "SELECT * FROM credenciados_ext WHERE clinica ='". $dadosPrestador['id'] ."'";
                            $consultaPrestadorInterno = $conexao -> prepare($selecionaPrestadorInterno);
                            $consultaPrestadorInterno -> execute();

                                if(($consultaPrestadorInterno) AND ($consultaPrestadorInterno -> rowCount () != 0)){
                                  while($dadosPrestadorInterno = $consultaPrestadorInterno -> fetch(PDO::FETCH_ASSOC)){
                                      if($dadosPrestadorInterno['status'] == "Publicado"){
                                        echo "- Dr(a). ".$dadosPrestadorInterno['nome']." - CRO ".$dadosPrestadorInterno['cro']."/".$dadosPrestadorInterno['croUF']."<br>";
                                      }
                                  }
                                }
                          ?>
												</span>
											</p>											
										</div>
										  <?php } // if verifica se é CLINICA ?>
										<div class="col-md">

												<div class="row">
													<div class="col col-md-12">
														<p class = "fonte-14 "> <b> Endereço </b><br>
															<span class = "fonte-12">
																	<?php echo $dadosPrestador['endereco'] != "" ?  $dadosPrestador['endereco']."," : " ";  ?>
                                  <?php echo $dadosPrestador['numero'] != "" ?  $dadosPrestador['numero']."," : " ";  ?>
                                  <?php echo $dadosPrestador['complemento'] != "" ?  $dadosPrestador['complemento']."," : " ";  ?>
                                  <?= $dadosCidade['nome'] ?>-<?= $dadosEstado['nome'] ?> - 
                                  <?php echo $dadosPrestador['cep'] != "" ?  "CEP: ".$dadosPrestador['cep'] : " ";  ?>
															</span>
														</p>
													</div>
												</div>
												

												<div class="row">

													<div class="col-md-4">
														<p class = "fonte-14"> <b> Celular</b><br><span class = "fonte-12"><?= $dadosPrestador['telefoneC'] ?></span></p>
													</div>
													<?php if($dadosPrestador['telefoneO'] != ""){ ?>
													<div class="col-md-4">
														<p class = "fonte-14 "><b> Celular </b><br><span class = "fonte-12"><?= $dadosPrestador['telefoneO'] ?></span></p>
													</div>
													<?php } ?>	
													<?php if($dadosPrestador['telefoneF'] != ""){ ?>
													<div class="col-md-4">
														<p class = "fonte-14 "><b> Telefone</b><br><span class = "fonte-12"><?= $dadosPrestador['telefoneF'] ?></span></p>
													</div>
													<?php } ?>
																									
												</div>												

										</div>
									</div>

							</div>
						</div>

					<!-- ============================= list | fim ===================================== -->
					<?php

									} #if "publicado"
			        } #while credenciado
			      } #if credenciado
					?>	

				</div>
			</div>
		</div>
	</section>

	<?php
									} #conta credenciados na cidade

								} #while cidade
            	} #if cidade


				} #while estado
      } #if estado


		}elseif($_GET['cidade'] != "todos"){

	
						$recebeEstado = $_GET['estado'];
			$recebeCidade = $_GET['cidade'];


			 // pesquisa ESTADO
      $consultaEstadoRecebido = "SELECT * FROM estado WHERE id = '$recebeEstado'";
      $consultasEstado = $conexao -> prepare($consultaEstadoRecebido);
      $consultasEstado -> execute();

      if(($consultasEstado) AND ($consultasEstado -> rowCount () != 0)){
        while($dadosEstado = $consultasEstado -> fetch(PDO::FETCH_ASSOC)){

         //pesquisa CIDADE
              $pesquisaCidade = "SELECT * FROM cidade WHERE id = '". $recebeCidade ."' AND estado = '". $dadosEstado['id'] ."'";
              $consultaCidade = $conexao -> prepare($pesquisaCidade);
              $consultaCidade -> execute();

                  if(($consultaCidade) AND ($consultaCidade -> rowCount () != 0)){
                    while($dadosCidade = $consultaCidade -> fetch(PDO::FETCH_ASSOC)){

       	

	?>



	<section>
		<div class="container">
			<div class="row">
				<div class="col" >
					<h5 class = "mt-4 mb-4">Profissionais em <span class="cor-azul negrito"><?= $dadosCidade['nome'] ?> - <?= $dadosEstado['nome'] ?></h5>

					<?php

						$pesquisaPrestador = "SELECT * FROM credenciados WHERE cidade = '".$dadosCidade['id']."' AND estado = '".$dadosEstado['id']."' ORDER BY nome ASC";
					  $selecionaPrestador = $conexao -> prepare($pesquisaPrestador);
					  $selecionaPrestador -> execute();

				      if(($selecionaPrestador) AND ($selecionaPrestador -> rowCount () != 0)){
				        while($dadosPrestador = $selecionaPrestador -> fetch(PDO::FETCH_ASSOC)){

				          if($dadosPrestador['status'] == "Publicado"){

				          	if($dadosPrestador['tipoCred'] == "Dentista"){ 
				          		$tituloPrestador = $dadosPrestador['nome']; 
				          		$registoPrestador = "CRO ".$dadosPrestador['numeroCRO']."/".$dadosPrestador['estadoCRO']; 
				          	}elseif($dadosPrestador['tipoCred'] == "Clínica"){ 
				          		$tituloPrestador = $dadosPrestador['nomeFantasia']; 
				          		$registoPrestador = "CNPJ ". $dadosPrestador['cnpj']; 
				          	}

					?>
					<!-- ============================= list | inicio ===================================== -->
						<div class="row ml-1 mr-1 mb-3 p-2" style = "border: 1px solid #ccc; border-radius: 5px;">
							<div class="col-11 col-md-11">
									<div class="row mb-1 mt-3">
										<div class="col-md">
											<p class = "fonte-18">
												<b><?= $tituloPrestador ?></b><br>
												<span class = "fonte-12"><?= $registoPrestador ?></span>
											</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<p class = "fonte-12 "> <b> Especialidade</b><br>
												<span class = "fonte-12">
													<?php echo $dadosPrestador['espConsulta'] != "" ?  $dadosPrestador['espConsulta']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espUrgencia'] != "" ?  $dadosPrestador['espUrgencia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espCirugia'] != "" ?  $dadosPrestador['espCirugia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espRadiologia'] != "" ?  $dadosPrestador['espRadiologia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espOdontopediatra'] != "" ?  $dadosPrestador['espOdontopediatra']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espDentistica'] != "" ?  $dadosPrestador['espDentistica']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espPeriodontia'] != "" ?  $dadosPrestador['espPeriodontia']."<br>" : " ";  ?>
                          <?php echo $dadosPrestador['espProteses'] != "" ?  $dadosPrestador['espProteses'] : "";  ?>
												</span>
											</p>											
										</div>
										 <?php if($dadosPrestador['tipoCred'] == "Clínica") {?>
										<div class="col-md-4">
											<p class = "fonte-14 "><b>Profissionais</b><br>
												<span class = "fonte-12">
													<?php 
                            $selecionaPrestadorInterno = "SELECT * FROM credenciados_ext WHERE clinica ='". $dadosPrestador['id'] ."'";
                            $consultaPrestadorInterno = $conexao -> prepare($selecionaPrestadorInterno);
                            $consultaPrestadorInterno -> execute();

                                if(($consultaPrestadorInterno) AND ($consultaPrestadorInterno -> rowCount () != 0)){
                                  while($dadosPrestadorInterno = $consultaPrestadorInterno -> fetch(PDO::FETCH_ASSOC)){
                                      if($dadosPrestadorInterno['status'] == "Publicado"){
                                        echo "- Dr(a). ".$dadosPrestadorInterno['nome']." - CRO ".$dadosPrestadorInterno['cro']."/".$dadosPrestadorInterno['croUF']."<br>";
                                      }
                                  }
                                }
                          ?>
												</span>
											</p>											
										</div>
										  <?php } // if verifica se é CLINICA ?>
										<div class="col-md">

												<div class="row">
													<div class="col col-md-12">
														<p class = "fonte-14 "> <b> Endereço </b><br>
															<span class = "fonte-12">
																	<?php echo $dadosPrestador['endereco'] != "" ?  $dadosPrestador['endereco']."," : " ";  ?>
                                  <?php echo $dadosPrestador['numero'] != "" ?  $dadosPrestador['numero']."," : " ";  ?>
                                  <?php echo $dadosPrestador['complemento'] != "" ?  $dadosPrestador['complemento']."," : " ";  ?>
                                  <?= $dadosCidade['nome'] ?>-<?= $dadosEstado['nome'] ?> - 
                                  <?php echo $dadosPrestador['cep'] != "" ?  "CEP: ".$dadosPrestador['cep'] : " ";  ?>
															</span>
														</p>
													</div>
												</div>
												

												<div class="row">

													<div class="col-md-4">
														<p class = "fonte-14"> <b> Celular</b><br><span class = "fonte-12"><?= $dadosPrestador['telefoneC'] ?></span></p>
													</div>
													<?php if($dadosPrestador['telefoneO'] != ""){ ?>
													<div class="col-md-4">
														<p class = "fonte-14 "><b> Celular </b><br><span class = "fonte-12"><?= $dadosPrestador['telefoneO'] ?></span></p>
													</div>
													<?php } ?>	
													<?php if($dadosPrestador['telefoneF'] != ""){ ?>
													<div class="col-md-4">
														<p class = "fonte-14 "><b> Telefone</b><br><span class = "fonte-12"><?= $dadosPrestador['telefoneF'] ?></span></p>
													</div>
													<?php } ?>
																									
												</div>												

										</div>
									</div>

							</div>
						</div>

					<!-- ============================= list | fim ===================================== -->
					<?php

									} #if "publicado"
			        } #while credenciado
			      } #if credenciado
					?>	

				</div>
			</div>
		</div>
	</section>

	<?php

								} #while cidade
            	} #if cidade


				} #while estado
      } #if estado





		} #verifica se é "!= todos"
	?>


</body>
</html>
<?php


	} #if verifica se existe os termos
	else{

		echo '
			<script type="text/javascript">
				setTimeout(function() {
				    window.location.href = "'. BASE .'";
				}, 0000);
			</script>

		';

	}
?>