<?php



//INCLUDES



include 'connectDB.php';



//TESTE



//CONSTANTS

define("SECURE", FALSE);    // ESTRITAMENTE PARA DESENVOLVIMENTO!!!!

define('SESSIONL_ID', 'SESSIONL_ID');

define('SESSIONL_TIMEOFFSET', 'SESSIONL_TIMEOFFSET');

define('SESSIONL_NOME', 'SESSIONL_NOME');

define('SESSIONL_STRING', 'SESSIONL_STRING'); 

//Não o nome do usuário ,da sessao msm

define('NOME_SESSION', 'NOME_SESSION');

define('APP_NAME', 'Prover saúde - Acesso ao credenciado');





function escape_string( $parametro )

{

	return  pg_escape_string( str_replace("\"", "'", trim( $parametro ) )  );

}





function escape_str( $parametro )

{

	return  pg_escape_string( str_replace("\"", "'", trim( $parametro ) )  );

}



function escape_int( $parametro )

{

	return preg_replace('/\D/', '', $parametro );

}







/*

* Usado para iniciar a session e verificar se a pessoa está logada

*/

function startSession( $checarLogin = true )

{

	if(session_id() == '')

	{

		$httponly = true;

		

		if (ini_set('session.use_only_cookies', 1) === FALSE) 

		{

			header("Location: index.php?page=error");

			exit();

		}

		

		$cookieParams = session_get_cookie_params();

		session_set_cookie_params($cookieParams["lifetime"],

			$cookieParams["path"], 

			$cookieParams["domain"], 

			SECURE,

			$httponly);

			

		session_name( NOME_SESSION );

		

	

		session_start();  

	

		if( $checarLogin )

		{

			if( !login_check() )

			{

				header('Location: login.php');

					

				die();

			}

		

		}

	

	}

	

}





/*

* Faz o login no sistema 

*

*/

function login($login, $password, $timeoffset )

{

	$login = escape_string( $login );

	$password= hash( "sha512", $password );//Nao precisa de escape string pois vai virar hash

	

	$bdcon = connectDB();

    $sql ="SELECT * FROM public.credenciado WHERE cre_log = '$login' LIMIT 1";

	$result = pg_exec( $bdcon, $sql );

	$numRows = pg_num_rows( $result );



    if ($numRows < 1)

	{

		

		return false;

	}

	

	$row  = @pg_fetch_array( $result, 0 );

	$db_password = $row['cre_sen'];

	$username = $row['cre_nmf'];

	$user_id = $row['cre_cod'];



	if ($db_password !=  $password ) 

	{

		//echo $sql;

		//echo $db_password." === ".$password;

		return false;

	}

		

	$user_browser = $_SERVER['HTTP_USER_AGENT'];

	$user_id = $user_id;

	$username = $username;	

	

	//echo "USERNAME ".$username;



	

	$_SESSION[ SESSIONL_ID ] = $user_id;

	$_SESSION[ SESSIONL_TIMEOFFSET ] = $timeoffset;

	$_SESSION[ SESSIONL_NOME ] = $username;

	$_SESSION[ SESSIONL_STRING ] = hash('sha512', $password . $user_browser );

	

	return true;

       

 }

 

 

 /*

* Verifica se o usuário está logado

* @return true ou false

*/

function login_check() 

{

	

	

	if ( ! isset($_SESSION[ SESSIONL_ID ], $_SESSION[ SESSIONL_NOME ], $_SESSION[ SESSIONL_STRING ] ) ) 

	{

		//echo "e";

		return false;

	}



	$bdcon = connectDB();

	

	$user_id = $_SESSION[ SESSIONL_ID ];

	$login_string = $_SESSION[ SESSIONL_STRING ];

	$username = $_SESSION[ SESSIONL_NOME ];

		

	$sql = "SELECT * FROM public.credenciado WHERE cre_cod = $user_id";

	$result= @pg_exec( $bdcon, $sql );

	$numRows = @pg_num_rows( $result );

	

	if ( $numRows < 1) 

	{

		//echo "s";

		return false;

	}

	

	$row = pg_fetch_array( $result );

	$db_password = $row['cre_sen'];

	$status = $row['cre_atv'] == 't' ? TRUE : FALSE;

	$user_browser = $_SERVER['HTTP_USER_AGENT'];

	$login_check = hash('sha512', $db_password . $user_browser);

	

	if ($login_check == $login_string)

	{

		if( !$status )

		{

			return false;

		}



		//echo "sasdfadsfadf";

		// Logged In!!!! 

		return true;

	} 

	else 

	{

	//echo "d";

		return false;

	}



}





/*

* Se o e-mail está cadastrado uma senha de segurança é enviada par este e-mail par arecuperar senha

* Se não existe apenas retorna uma mensagem

* @param String login : è o e-mail

*/	

function recuperaSenhaByEmail( $login )

{

	$login = escape_string( $login );



	$bd = connectDB();

	

	$sql = "SELECT cre_cod, cre_log, cre_nmf FROM credenciado WHERE cre_log = '".$login."';";

	$result = pg_query( $bd, $sql );

	$row = pg_fetch_array($result);

	$usuario = $row['cre_cod'];

	//echo $sql;



	if($row)

	{

		$token = gerarSenha();

		$token_hash = hash('sha512', $token);







		$insere = "UPDATE public.credenciado SET cre_trs = '$token_hash', cre_rsl = now() + '3 days' WHERE cre_log = '".$login."';";

		$res = pg_query($bd, $insere);

		

		if( $res == FALSE )

			return "Erro ao inserir";







		$res =  enviarEmail( $token, $row['cre_log'], strtoupper( $row['cre_nmf'] ) );



		if( $res == FALSE )

			return "Erro ao enviar e-mail";



			

		return $usuario;

	}

	else

	{

		return "E-mail inválido!";

	}

}





function getCredenciadoByToken($token)

{

	$bd = connectDB();



	$token 	= hash( "sha512", @escape_string($token));

	$sql 	= "SELECT cre_cod FROM public.credenciado WHERE cre_trs = '$token' AND cre_rsl >= now()::date";

	$result = pg_query( $bd, $sql );

	$row 	= pg_fetch_array($result);



	return $row == null ? null : $row['cre_cod'];

}



function alterarSenha( $credenciado , $novasenha)

{

		$bd = connectDB();

		

		$senha_hash = hash('sha512', $novasenha);

		

		$sql = "UPDATE public.credenciado SET cre_sen = '$senha_hash', cre_trs = null, cre_rsl = null WHERE cre_cod = ".$credenciado.";";

		

		$res = pg_query($bd, $sql);

			

		return $res == FALSE ? false : true;

}





/*

* Envia um e-mail enviando o código de segunça ( $senha ) para  mudança de senha para o $email

*/	

function enviarEmail($token, $email, $nomeUsuario)

{

	 

		$email_remetente = "suporte@apsdesenvolvimento.com.br"; // deve ser um email do dominio

		$link = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?token=".$token;

		

		$from_add = "suporte@apsdesenvolvimento.com.br"; 



		$to_add = $email; //<-- put your yahoo/gmail email address here

		

		$conteudo =  "Caro %username% , para recuperar sua senha digite acesse o link: %link%";

		$conteudo = str_replace( "%username%", $nomeUsuario, $conteudo );

		$conteudo = str_replace( "%link%", "<a href='$link' >$link</a>" , $conteudo );

	

		

		

		$subject = "Recuperar senha";

		$message = $conteudo;

		

		$headers  = "From: $from_add \r\n";

		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "X-Mailer: PHP \r\n";

		$headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";

		

		if(mail($to_add,$subject,$message,$headers)) 

		{

			$msg = "Mail sent OK".$email;

			return true;

		} 

		else 

		{

		   $msg = "Error sending email!";

		   return false;

		}

	 

 

 

}





/*

* usado para gerar aleatoriamente código se segurança e senhas novas

*/	

function gerarSenha()

{

	$tamanho = 8;

	$maiusculas = true;

	$numeros = true;

	$simbolos = false;



	$lmin = 'abcdefghijklmnopqrstuvwxyz';

	$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$num = '1234567890';

	$simb = '';

	$retorno = '';

	$caracteres = '';



	$caracteres .= $lmin;

	if ($maiusculas) $caracteres .= $lmai;

	if ($numeros) $caracteres .= $num;

	if ($simbolos) $caracteres .= $simb;



	$len = strlen($caracteres);

	for ($n = 1; $n <= $tamanho; $n++) 

	{

		$rand = mt_rand(1, $len);

		$retorno .= $caracteres[$rand-1];

	}

  

  	return $retorno;

}







/*

* Devolve um objeto usuario pelo id dele

*

*/

function getUsuario( $id )

{

	$id = escape_int ( $id );



	$con = connectDB();

	

	$sql = "SELECT  * FROM public.credenciado WHERE cre_cod = $id LIMIT 1";

	$result  = pg_exec( $con, $sql );

	$numRows = pg_num_rows( $result );

	

	if( $numRows < 1 )

	{

		return null;

	}

	

	$row = pg_fetch_array( $result );

	

	$retorno = array

	(

		'creCodigo' => $row['cre_cod'],

		'creNome' => $row['cre_nmf'],

		'podeGerarGuiaPessoal' => $row['cre_ggp'] == "t",

		'podeGerarGuiaEmpresa' => $row['cre_gge'] == "t"

	);

	

	return $retorno;

}





function getAssociadosByCod( $contrato, $matricula, $nome, $cpf )

{

	$contrato 	= escape_int( $contrato );
	$matricula 	= escape_str( $matricula );
	$nome 		= escape_str( $nome   );
	$cpf 		= escape_int( $cpf    );



	$con = connectDB();

	$sqlContrato = (!is_numeric($contrato) ? "" : "AND contrato.cnt_nmc = $contrato");
	

	$sql ="SELECT  cliente.cli_cod, cliente.cli_nme, cliente.cli_cpf, cliente.cli_dtn, cliente.cli_end, cliente.cli_tel, pc.pln_nme, cc.cnc_ccg, contrato.cnt_ccg, 

	to_char( cliente.cli_dtn, 'DD/MM/YYYY'  ) as cli_dtn, contrato.emc_cod as empresa_contrato, 

	to_char( contrato.cnt_dtv, 'DD/MM/YYYY'  ) as validade_contrato, contrato_em_dia( cliente.cli_cod::integer ) as contrato_em_dia 

	FROM public.cliente 

	JOIN public.contrato ON cliente.cnt_cod = contrato.cnt_cod

	JOIN public.contrato_cliente cc ON contrato.cnt_cod = cc.cnt_cod AND cliente.cli_cod = cc.cli_cod 

	JOIN public.plano_convenio pc ON cc.pln_cod = pc.pln_cod

	LEFT JOIN public.cliente titular ON cc.cnc_ctt = titular.cli_cod

	WHERE ( trim('$matricula') = '' OR cc.cnc_mat = '$matricula')

	$sqlContrato

	AND ( trim('$cpf') = '' OR cliente.cli_cpf = '$cpf' OR titular.cli_cpf = '$cpf' )

	AND cliente.cli_nme ILIKE '%$nome%'

	AND contrato_em_dia( cliente.cli_cod::integer )

	ORDER BY cli_nme";

	//echo $sql;

	$result  = pg_exec( $con, $sql );

	$numRows = pg_num_rows( $result );

	

	$retorno = array();



	while( $row = pg_fetch_array( $result ) )

	{

		$retorno[] = array

		(

			'cliCodigo' => $row['cli_cod'],

			'cliNome' => $row['cli_nme'],

			'cliCPF' => $row['cli_cpf'],

			'cliDtNascimento' => $row['cli_dtn'],

			'cliEndereco' => $row['cli_end'],

			'cliTelefone' => $row['cli_tel'],

			'cntValidade'  	=> $row['validade_contrato'],

			'cntVALIDO' 	=> $row['contrato_em_dia'] == 't',

			'cntEmpresa' => $row['empresa_contrato'],

			'cntNomePlano' => $row['pln_nme'],

			'cntPermitiGuiaClienteC' => $row['cnc_ccg'] == "t",

			'cntPermitiGuiaContrato' => $row['cnt_ccg'] == "t",

			'cntTipoContrato' => ($row['empresa_contrato'] == null ? "PESSOAL" : "EMPRESARIAL")

		

		);	

	}



	return $retorno;

}







function getGuiasDoDiaDoCliente( $cliente )
{

	$cliente = escape_int ( $cliente );
	$credenciado = $_SESSION[SESSIONL_ID];

	$con = connectDB();

	$sql = "SELECT gia_cod FROM public.guia
	 		WHERE cli_cod = $cliente 
	 		AND cre_cod = $credenciado 
	 		ORDER BY gia_dte DESC";
	//echo $sql;
	$result  = pg_exec( $con, $sql );
	
	$retorno = array();

	while( $row = pg_fetch_array( $result ) )
	{
		$retorno[] = getGuiaByID( $row['gia_cod'] );
	}

	return $retorno;
}






function getOrcamentosDoCliente( $cliente )
{

	$cliente = escape_int ( $cliente );
	$credenciado = $_SESSION[SESSIONL_ID];

	$con = connectDB();

	$sql = "SELECT gia_cod FROM public.guia_orcamento guia
	 		WHERE cli_cod = $cliente 
	 		AND cre_cod = $credenciado
	 		AND gia_dte > (now() - '60 days'::interval)
	 		ORDER BY gia_dte DESC";
	//echo $sql;
	$result  = pg_exec( $con, $sql );
	
	$retorno = array();

	while( $row = pg_fetch_array( $result ) )
	{
		$retorno[] = getOrcamentoByID( $row['gia_cod'] );
	}

	return $retorno;
}







function getAgendamentosCliente( $cliente )

{

	$cliente = escape_int ( $cliente );

	$credenciado = $_SESSION[SESSIONL_ID];



	$con = connectDB();

	//( SELECT prc_nme FROM public.guia_procedimento JOIN procedimento USING(prc_cod) WHERE gia_cod = ag.gia_cod )

			

	$sql = "SELECT *, to_char( agd_dth, 'DD/MM/YYYY') as data, to_char( agd_dth, 'HH24:MI') as hora,

			prc_nme as procedimentos

			FROM public.agenda ag

			JOIN public.guia USING ( gia_cod )

			JOIN public.procedimento USING( prc_cod )

			LEFT JOIN public.prestador ON ag.prt_cod  = prestador.prt_cod

			LEFT JOIN public.especialidade USING ( esp_cod )

	 		WHERE ag.cli_cod = $cliente 

	 		AND ag.cre_cod = $credenciado

	 		AND agd_dth::date >= now()::date

	 		ORDER BY agd_dth DESC";

	

	$result  = pg_exec( $con, $sql );

	$numRows = pg_num_rows( $result );

	

	$retorno = array();



	while( $row = pg_fetch_array( $result ) )

	{

		$retorno[] = array

		(

			'ageCodigo' => $row['agd_cod'],

			'ageData' => $row['data'],

			'ageHora' => $row['hora'],

			'agePrestador' => $row['prt_nme'],

			'ageEspecialidade' => $row['esp_nme'],

			'ageObservacoes' => $row['agd_obs'],

			'ageValorCliente'  	=> $row['agd_vcr'],

			'ageProcedimentos' 	=> $row['procedimentos'],

			'ageStatus' 		=> $row['agd_sts'],

			'giaCodigo' 		=> $row['gia_cod'],

			'giaStatus' 		=> $row['gia_sts'],

		

		);	

	}



	return $retorno;

}



function getProcedimentos( $busca )

{

	$busca = escape_string ( $busca );



	$con = connectDB();

			

	$sql = "SELECT * FROM public.procedimento

	 		WHERE ( prc_nme ILIKE  '%$busca%' OR prc_cod = '$busca' OR prc_cbh = '$busca' OR prc_amb = '$busca' ) AND prc_atv = true AND prc_auc = true";



	$result  = pg_exec( $con, $sql );

	$numRows = pg_num_rows( $result );

	

	$retorno = array();



	while( $row = pg_fetch_array( $result ) )

	{

		$retorno[] = array

		(

			'proCodigo' => $row['prc_cod'],

			'proNome' => $row['prc_nme']

		

		);	

	}



	return $retorno;

}







function getPrestadores( $busca )

{

	$busca = escape_string ( $busca );

	$credenciado = $_SESSION[SESSIONL_ID];



	$con = connectDB();

			

	$sql = "SELECT * FROM public.cred_prestador JOIN public.prestador USING( prt_cod )

	 		WHERE prt_nme ILIKE  '%$busca%' AND cre_cod = $credenciado";



	$result  = pg_exec( $con, $sql );

	$numRows = pg_num_rows( $result );

	

	$retorno = array();



	while( $row = pg_fetch_array( $result ) )

	{

		$retorno[] = array

		(

			'preCodigo' => $row['prt_cod'],

			'preNome' => $row['prt_nme']

		

		);	

	}



	return $retorno;

}



function getEspecialidades( $busca )

{

	$busca = escape_string ( $busca );

	$credenciado = $_SESSION[SESSIONL_ID];



	$con = connectDB();

			

	$sql = "SELECT * FROM public.especialidade WHERE esp_nme ILIKE  '%$busca%'";



	$result  = pg_exec( $con, $sql );

	$numRows = pg_num_rows( $result );

	

	$retorno = array();



	while( $row = pg_fetch_array( $result ) )

	{

		$retorno[] = array

		(

			'espCodigo' => $row['esp_cod'],

			'espNome' => $row['esp_nme']

		

		);	

	}



	return $retorno;

}





function novaGuia( $dados )

{

	$credenciado = $_SESSION[SESSIONL_ID];

	$objetoCredenciado = getUsuario( $credenciado );

	$cliente = $dados['cliente'];

	$observacoes = $dados['observacoes'];



	$con = connectDB();





	//----------------------------------------------------------------

	$sql = "SELECT contrato_em_dia( $cliente ) as contrato_em_dia";

	$result = pg_exec( $con, $sql );

	$row    = @pg_fetch_array( $result );

			

	if( $row == null )
		return array('error'=>"Erro de sql1");

	if( $row['contrato_em_dia'] == 'f' )
		return array( 'error' => "Carteira inativa");

	if( count($dados['procedimentos']) <= 0 )
		return array( 'error' => "Selecione pelo menos um procedimento");


	pg_exec( $con, "BEGIN TRANSACTION" );
	//----------------------------------------------------------------

	$sql = "SELECT co.cli_cod as clientefisico, co.emc_cod as clienteempresa, 

			cc.pln_cod as plano_cliente, co.cnt_ccg as permite_guia_contrato, cc.cnc_ccg as permite_guia_cont_cli, cc_tt.pln_cod as plano_tit

			FROM public.cliente cl 

			LEFT JOIN contrato_cliente cc ON (cl.cli_cod = cc.cli_cod AND cl.cnt_cod = cc.cnt_cod ) 

			LEFT JOIN contrato co ON cl.cnt_cod = co.cnt_cod

			LEFT JOIN contrato_cliente cc_tt ON (cc.cnc_ctt = cc_tt.cli_cod AND cc.cnt_cod = cc_tt.cnt_cod ) 

			WHERE cl.cli_cod = $cliente";

	$result = pg_exec( $con, $sql );

	$row    = @pg_fetch_array( $result );

	//echo $sql;



	if( $row == null )

		return array('error'=>"Erro de sql2");



	if( $row['permite_guia_contrato'] == 'f' )//Este contrato nao cria guias por credenciados

		return array( 'error' => "O contrato deste cliente está bloqueado para procedimentos não agendados");



	if( $row['permite_guia_cont_cli'] == 'f' )//Este cliente nao cria guias por credenciados

		return array( 'error' => "Este cliente está bloqueado para procedimentos não agendados");



	if( $row['clienteempresa'] != null && !$objetoCredenciado['podeGerarGuiaEmpresa'])//É empresarial

		return array( 'error' => "Você não tem permissão para gerar guias empresariais");



	if( $row['clientefisico']  != null && !$objetoCredenciado['podeGerarGuiaPessoal'])//É empresarial

		return array( 'error' => "Você não tem permissão para gerar guias pessoais");



	$plano = $row['plano_cliente'];

	if ($plano == null) {
		$plano =  $row['plano_tit'];
	}

	//----------------------------------------------------------------

	$sql = "INSERT INTO public.guia( gia_dte, cre_cod, cli_cod, gia_sts, pln_cod ) 
			VALUES ( now(), $credenciado, $cliente, 0, $plano ) RETURNING gia_cod";

	//echo $sql;

	$result = pg_exec( $con, $sql );

	$row = pg_fetch_array( $result );



	if( $result == false )

		return array('error'=>"Erro de sql3 ".$sql);





	$guia = $row['gia_cod'];

	



	//----------------------------------------------------------------

	foreach ($dados['procedimentos'] as $procedimento) 

	{

		//print_r($procedimento);



		$nomePrest		= trim($procedimento['proPrestador']);

		$prestador	  	= getPrestadorByNome( $nomePrest );

		

		$nomeEspec		= trim($procedimento['proEspecialidade']);

		$especiali	  	= getEspecialidadeByNome( $nomeEspec );

		

		$nomeProce		= trim($procedimento['proNome']);

		$procedimento 	= getProcedimentoByNome( $nomeProce );



		if( $procedimento == null )

			return array('error'=>"Procedimento não encontrato ( $nomeProce )");



		if( $prestador == null && strlen( $nomePrest ) > 0 )

			return array('error'=>"Prestador não encontrado ( $nomePrest )");

		

		if( $especiali == null && strlen( $nomeEspec ) > 0 )

			return array('error'=>"Especialidade não encontrada ( $nomeEspec )");



		$prestador 	= $prestador == null ? "null" : $prestador;

		$especiali 	= $especiali == null ? "null" : $especiali;



		$valorCred	= getValorProcedimento( $cliente, $procedimento, $prestador, $especiali )['valorCredenciado'];	

		$valorConv	= getValorProcedimento( $cliente, $procedimento, $prestador, $especiali )['valorConvenio'];	



		$valorCred = $valorCred == null ? "0" : $valorCred;

		$valorConv = $valorConv == null ? "0" : $valorConv;

		

		

		

		//if( $valor == null )

		//	return array('error'=>"Valor não encontrato para o procedimento ( $nomeProce )");



		$sql = "INSERT INTO public.guia_procedimento( gia_cod, prc_cod, gap_qtd, gap_vlr, gap_vlc, gap_sts, prt_cod )

		VALUES ( $guia, '$procedimento', 1, $valorCred, $valorConv, 0, $prestador )";



		$result = pg_exec( $con, $sql );



		if( $result == false )

			return array('error'=>"Erro de sql4");

	}

	$orcamentoExcluir = @escape_int(@$dados['orcamentoExcluir']);

	if($orcamentoExcluir != null)
	{
		$sql = "DELETE FROM guia_orcamento WHERE gia_cod = $orcamentoExcluir";

		$result = pg_exec( $con, $sql );

		if( $result == false )
			return array('error'=>"Erro de sql5");
	}


	pg_exec( $con, "COMMIT" );


	return getGuiaByID( $guia );

}

function novoOrcamento( $dados )
{

	$credenciado = $_SESSION[SESSIONL_ID];
	$objetoCredenciado = getUsuario( $credenciado );
	$cliente = $dados['cliente'];
	$observacoes = $dados['observacoes'];

	$con = connectDB();

	//----------------------------------------------------------------

	$sql = "SELECT contrato_em_dia( $cliente ) as contrato_em_dia";
	$res = pg_exec( $con, $sql );
	$row = @pg_fetch_array( $res );
			

	if( $row == null )
		return array('error'=>"Erro de sql6");

	if( $row['contrato_em_dia'] == 'f' )
		return array( 'error' => "Carteira inativa");

	if( count($dados['procedimentos']) <= 0 )
		return array( 'error' => "Selecione pelo menos um procedimento");


	pg_exec( $con, "BEGIN TRANSACTION" );
	//----------------------------------------------------------------

	$sql = "SELECT co.cli_cod as clientefisico, co.emc_cod as clienteempresa, 

			cc.pln_cod as plano_cliente, co.cnt_ccg as permite_guia_contrato, cc.cnc_ccg as permite_guia_cont_cli, cc_tt.pln_cod as plano_tit

			FROM public.cliente cl 

			LEFT JOIN contrato_cliente cc ON (cl.cli_cod = cc.cli_cod AND cl.cnt_cod = cc.cnt_cod ) 

			LEFT JOIN contrato co ON cl.cnt_cod = co.cnt_cod

			LEFT JOIN contrato_cliente cc_tt ON (cc.cnc_ctt = cc_tt.cli_cod AND cc.cnt_cod = cc_tt.cnt_cod ) 

			WHERE cl.cli_cod = $cliente";

	$res = pg_exec( $con, $sql );
	$row = @pg_fetch_array( $res );

	//echo $sql;

	if( $row == null )
		return array('error'=>"Erro de sql7");


	$plano = $row['plano_cliente'];

	if ($plano == null) {
		$plano =  $row['plano_tit'];
	}

	
	//----------------------------------------------------------------
	$sql = "INSERT INTO public.guia_orcamento( gia_dte, cre_cod, cli_cod, gia_sts, pln_cod )
			VALUES ( now(), $credenciado, $cliente, 0, $plano ) RETURNING gia_cod";

	//echo $sql;

	$result = pg_exec( $con, $sql );
	$row = pg_fetch_array( $result );

	if( $result == false )
		return array('error'=>"Erro de sql8");

	$guia = $row['gia_cod'];

	//----------------------------------------------------------------
	foreach ($dados['procedimentos'] as $procedimento) 
	{

		$nomePrest		= trim($procedimento['proPrestador']);
		$prestador	  	= getPrestadorByNome( $nomePrest );

		$nomeEspec		= trim($procedimento['proEspecialidade']);
		$especiali	  	= getEspecialidadeByNome( $nomeEspec );

		$nomeProce		= trim($procedimento['proNome']);
		$procedimento 	= getProcedimentoByNome( $nomeProce );



		if( $procedimento == null )
			return array('error' => "Procedimento não encontrato ( $nomeProce )");

		if( $prestador == null && strlen( $nomePrest ) > 0 )
			return array('error' => "Prestador não encontrado ( $nomePrest )");		

		if( $especiali == null && strlen( $nomeEspec ) > 0 )
			return array('error'=>"Especialidade não encontrada ( $nomeEspec )");

		$prestador 	= $prestador == null ? "null" : $prestador;
		$especiali 	= $especiali == null ? "null" : $especiali;

		$valorCred	= getValorProcedimento( $cliente, $procedimento, $prestador, $especiali )['valorCredenciado'];	
		$valorConv	= getValorProcedimento( $cliente, $procedimento, $prestador, $especiali )['valorConvenio'];	

		$valorCred = $valorCred == null ? "0" : $valorCred;
		$valorConv = $valorConv == null ? "0" : $valorConv;

		$sql = "INSERT INTO public.guia_orcamento_procedimento( gia_cod, prc_cod, gap_qtd, gap_vlr, gap_vlc, gap_sts, prt_cod )
		VALUES ( $guia, '$procedimento', 1, $valorCred, $valorConv, 0, $prestador )";

		$result = pg_exec( $con, $sql );

		if( $result == false )
			return array('error'=>"Erro de sql8");
	}

	pg_exec( $con, "COMMIT" );

	return getOrcamentoByID( $guia );
}



function getProcedimentoByNome( $nome )

{

		

	$con = connectDB();

	$sql = "SELECT * FROM public.procedimento 
			WHERE ( prc_nme ILIKE '$nome' OR prc_cod = '$nome' OR prc_cbh = '$nome' OR prc_amb = '$nome' ) 
			AND prc_atv = true 
			AND prc_auc = true LIMIT 1";

	//echo $sql;

	$result = pg_exec( $con, $sql );

	$row 	= pg_fetch_array( $result );



	if( $row == null )

		return null;

	else

		return $row['prc_cod'];

}





function getPrestadorByNome( $nome )

{

	$credenciado = $_SESSION[SESSIONL_ID];

		

	$con = connectDB();

	$sql = "SELECT * FROM public.cred_prestador JOIN public.prestador USING( prt_cod ) WHERE prt_nme ILIKE '$nome' AND cre_cod = $credenciado LIMIT 1";

	//echo $sql;

	$result = pg_exec( $con, $sql );

	$row 	= pg_fetch_array( $result );



	if( $row == null )

		return null;

	else

		return $row['prt_cod'];

}



function getEspecialidadeByNome( $nome )

{

		

	$con = connectDB();

	$sql = "SELECT * FROM public.especialidade WHERE esp_nme ILIKE '$nome' LIMIT 1";

	//echo $sql;

	$result = pg_exec( $con, $sql );

	$row 	= pg_fetch_array( $result );



	if( $row == null )

		return null;

	else

		return $row['esp_cod'];

}



function autorizarGuia( $guia )

{

	$guia = escape_int($guia);

	$con = connectDB();



	//--------------------------------------------------------------

	$sql = "SELECT contrato_em_dia( (SELECT cli_cod FROM guia WHERE gia_cod = $guia) ) as contrato_em_dia";

	$result = pg_exec( $con, $sql );

	$row    = @pg_fetch_array( $result );

	//echo $sql;



	if( $row == null )

		return array('error'=>"Erro de sql9");



	if( $row['contrato_em_dia'] == 'f' )

		return array( 'error' => "Carteira inativa");



	//--------------------------------------------------------------

	$sql = "UPDATE guia   SET gia_sts = 0 WHERE gia_cod = $guia";//GUIA AUTORIZADA

		$result = pg_exec( $con, $sql );



	if( $result == false )

		return array('error'=>"Erro de sql10");



	//--------------------------------------------------------------

	$sql = "UPDATE agenda SET agd_sts = 2 WHERE gia_cod = $guia";//ATENDIMENTO CANCELADO

	$result = pg_exec( $con, $sql );



	if( $result == false )

		return array('error'=>"Erro de sql11");



	//--------------------------------------------------------------



	return getGuiaByID( $guia );

}



function desautorizarGuia( $guia )

{

	$guia = escape_int($guia);

	$con = connectDB();



	//--------------------------------------------------------------

	$sql = "SELECT contrato_em_dia( (SELECT cli_cod FROM guia WHERE gia_cod = $guia) ) as contrato_em_dia";

	$result = pg_exec( $con, $sql );

	$row    = @pg_fetch_array( $result );

			

	if( $row == null )

		return array('error'=>"Erro de sql12");



	if( $row['contrato_em_dia'] == 'f' )

		return array( 'error' => "Carteira inativa");



	//--------------------------------------------------------------

	$sql = "UPDATE guia  SET gia_sts = 1 WHERE gia_cod = $guia";//GUIA NAO AUTORIZADA

		$result = pg_exec( $con, $sql );



	if( $result == false )

		return array('error'=>"Erro de sql13");



	//--------------------------------------------------------------

	$sql = "UPDATE agenda SET agd_sts = 0 WHERE gia_cod = $guia";//AGENDAMENTO NORMAL

	$result = pg_exec( $con, $sql );



	if( $result == false )

		return array('error'=>"Erro de sql14");



	//--------------------------------------------------------------



	return getGuiaByID( $guia );

}





function cancelarGuia( $guia )

{

	$guia = escape_int($guia);

	$con = connectDB();



	//--------------------------------------------------------------

	$sql = "SELECT contrato_em_dia( (SELECT cli_cod FROM guia WHERE gia_cod = $guia) ) as contrato_em_dia";

	$result = pg_exec( $con, $sql );

	$row    = @pg_fetch_array( $result );

			

	if( $row == null )

		return array('error'=>"Erro de sql15");



	if( $row['contrato_em_dia'] == 'f' )

		return array( 'error' => "Carteira inativa");



	//--------------------------------------------------------------

	$sql = "UPDATE guia  SET gia_sts = 2 WHERE gia_cod = $guia";//GUIA CANCELADA

		$result = pg_exec( $con, $sql );



	if( $result == false )

		return array('error'=>"Erro de sql16");



	//--------------------------------------------------------------

	$sql = "UPDATE agenda SET agd_sts = 3 WHERE gia_cod = $guia";//AGENDAMENTO CANCELADO

	$result = pg_exec( $con, $sql );



	if( $result == false )

		return array('error'=>"Erro de sql17");



	//--------------------------------------------------------------



	return getGuiaByID( $guia );

}



function getGuiaByAgendamento( $agenda )

{

	$con = connectDB();

	$sql = "SELECT gia_cod FROM public.agenda WHERE agd_cod = $agenda";

	$result = pg_exec( $con, $sql );

	$row = pg_fetch_array( $result );

	$guia = $row['gia_cod'];



	return getGuiaByID( $guia );

}





function getOrcamentoByID( $guia )
{
	$guia = escape_int ( $guia );

	$con = connectDB();

	$sql = "SELECT *
			, to_char( gia_dte, 'DD/MM/YYYY') as gia_dte 
			, to_char( cnt_dtv, 'DD/MM/YYYY') as cnt_dtv 
			FROM public.guia_orcamento guia
			JOIN public.cliente 		USING ( cli_cod )
			JOIN public.contrato  		ON cliente.cnt_cod = contrato.cnt_cod
			JOIN public.plano_convenio  ON guia.pln_cod = plano_convenio.pln_cod
			JOIN public.credenciado 	USING ( cre_cod )
			WHERE gia_cod = $guia;";

	$result  = pg_exec( $con, $sql );
	$row 	= pg_fetch_array( $result );
	
	$retorno = array
	(

		'giaCliente' => $row['cli_nme'],
		'giaClienteCPF' => $row['cli_cpf'],
		'giaStatus' => $row['gia_sts'],
		'cliPlano' => $row['pln_nme'],
		'cliNumContrato' => $row['cnt_nmc'],
		'cliValidadeContrato' => $row['cnt_dtv'],
		'giaCredenciado' => $row['cre_nmf'],
		'giaCodigo' => $row['gia_cod'],
		'giaDtGeracao' => $row['gia_dte'],
		'giaCredenciadoCNPJ' => $row['cre_cnj'],
		'giaObservacoes' => $row['gia_obs'],
		'giaProcedimentos' => getOrcamentoProcedimentos( $guia ),
		'error' => "OK"
	);	

	return $retorno;
}


function getGuiaByID( $guia )
{
	$guia = escape_int ( $guia );

	$con = connectDB();

	$sql = "SELECT *
			, to_char( gia_dte, 'DD/MM/YYYY') as gia_dte 
			, to_char( cnt_dtv, 'DD/MM/YYYY') as cnt_dtv 
			FROM public.guia 
			JOIN public.cliente 		USING ( cli_cod )
			JOIN public.contrato  		ON cliente.cnt_cod = contrato.cnt_cod
			JOIN public.plano_convenio  ON guia.pln_cod = plano_convenio.pln_cod
			JOIN public.credenciado 	USING ( cre_cod )
			JOIN public.cidade ON cidade.cid_cod = cliente.cid_cod
			WHERE gia_cod = $guia;";

	$result  = pg_exec( $con, $sql );
	$row 	= pg_fetch_array( $result );
	
	$retorno = array
	(

		'giaCliente' => $row['cli_nme'],
		'giaCidade' => $row['cid_nme'],
		'giaClienteCPF' => $row['cli_cpf'],
		'giaStatus' => $row['gia_sts'],
		'cliPlano' => $row['pln_nme'],
		'cliNumContrato' => $row['cnt_nmc'],
		'cliValidadeContrato' => $row['cnt_dtv'],
		'giaCredenciado' => $row['cre_nmf'],
		'giaCodigo' => $row['gia_cod'],
		'giaDtGeracao' => $row['gia_dte'],
		'giaCredenciadoCNPJ' => $row['cre_cnj'],
		'giaObservacoes' => $row['gia_obs'],
		'giaProcedimentos' => getGuiaProcedimentos( $guia ),
		'error' => "OK"
	);	

	return $retorno;
}





function getRelatorioGuias($status, $datade, $dataat, $associ )

{

	$status = trim(escape_string( $status ));

	$datade = trim(escape_string( $datade ));

	$dataat = trim(escape_string( $dataat ));

	$associ = trim(escape_string( $associ ));



	$credenciado = $_SESSION[SESSIONL_ID];



	$con = connectDB();

			

	$sql = "SELECT *

			, to_char( gia_dte, 'DD/MM/YYYY') as gia_dte 

			FROM public.guia 

			JOIN public.cliente 		USING ( cli_cod )

			WHERE cre_cod = $credenciado ";





	if( $status != 'T')

		$sql .=" AND gia_sts = $status ";



	if( $datade != null && $datade != "")

		$sql .=" AND gia_dte::date >= to_date('$datade','DD/MM/YYYY')";

	

	if( $dataat != null && $dataat != "")

		$sql .=" AND gia_dte::date <= to_date('$dataat','DD/MM/YYYY')";



	if( $associ != "")

		$sql .=" AND cli_nme ILIKE '%$associ%'";





	$result  = pg_exec( $con, $sql );



	$retorno = array();



	while( $row = pg_fetch_array( $result ) )

	{

		$retorno[] = array

		(

			'giaCodigo' => $row['gia_cod'],

			'giaCliente' => $row['cli_nme'],

			'giaStatus' => $row['gia_sts'],

			'giaNumMatricula' => $row['cli_nss'],

			'giaData'   => $row['gia_dte'],

			'giaProcedimentos' => getGuiaProcedimentos( $row['gia_cod'] ),

			'error' => "OK"

		);	

	}

	

	return $retorno;

}





function getGuiaProcedimentos( $guia )
{

	$guia = escape_int ( $guia );

	$con = connectDB();
			
	$sql = "SELECT * FROM public.guia_procedimento 
			LEFT JOIN public.prestador USING ( prt_cod )
			JOIN public.procedimento USING ( prc_cod )
			WHERE gia_cod = $guia;";

	$result  = pg_exec( $con, $sql );
	
	$retorno = array();

	while( $row = pg_fetch_array( $result ) )
	{
		$retorno[] = array
		(
			'gapCodigo' => $row['gap_cod'],
			'gapPrestador' => $row['prt_nme'],
			'gapProcedimento' => $row['prc_nme'],
			'gapValor' => $row['gap_vlr']
		);	
	}

	return $retorno;
}


function getOrcamentoProcedimentos( $orcamento )
{

	$orcamento = escape_int ( $orcamento );

	$con = connectDB();
			
	$sql = "SELECT * FROM public.guia_orcamento_procedimento 
			LEFT JOIN public.prestador USING ( prt_cod )
			LEFT JOIN public.especialidade USING ( esp_cod )
			JOIN public.procedimento USING ( prc_cod )
			WHERE gia_cod = $orcamento;";

	$result  = pg_exec( $con, $sql );
	
	$retorno = array();

	while( $row = pg_fetch_array( $result ) )
	{
		$retorno[] = array
		(
			'gapCodigo' => $row['gap_cod'],
			'gapPrestador' => $row['prt_nme'],
			'gapProcedimento' => $row['prc_nme'],
			'gapEspecialidade' => $row['esp_cod'],
			'gapValor' => $row['gap_vlr'],
		);	
	}

	return $retorno;
}





function getValorByNomeProcedimento( $cliente, $nomeProcedimento, $nomePrestador, $nomeEspecialidade )

{

	$procedimento 	= getProcedimentoByNome( $nomeProcedimento);

	$prestador 		= getPrestadorByNome( $nomePrestador);

	$especialidade 	= getEspecialidadeByNome( $nomeEspecialidade);



	if( $prestador == null && strlen( trim($nomePrestador) ) > 0 )

		return array('error'=>"Prestador não encontrado ( $nomePrestador )");

		

	if( $especialidade == null && strlen( trim($nomeEspecialidade) ) > 0 )

		return array('error'=>"Especialidade não encontrada ( $nomeEspecialidade )");



	if( $procedimento == null )

		return array('error' => "Não há procedimento com este nome ou código");

	

	return getValorProcedimento( $cliente, $procedimento, $prestador, $especialidade );

}



function getValorProcedimento( $cliente, $procedimento, $prestador, $especiali )

{

	$credenciado = $_SESSION[SESSIONL_ID];



	$con = connectDB();



	$prestador 	= $prestador == null ? "null" : $prestador;

	$especiali 	= $especiali == null ? "null" : $especiali;



	$sql = "SELECT * FROM getValorProcedimentoByPlano

			( 

				(SELECT pln_cod FROM contrato_cliente cc WHERE cli_cod = $cliente AND cnt_cod = (SELECT cnt_cod FROM cliente c WHERE c.cli_cod = cc.cli_cod ) ) 
				
				, null

				, $credenciado

				, '$procedimento'

				, $especiali

				, $prestador

			) 

			AS (valormedico numeric, valorhospital numeric, valortotal numeric);";



	error_log($sql);

	$result  = pg_exec( $con, $sql );

	$row 	 = pg_fetch_array( $result );

	//print_r($row);

	return array('error' => "OK", 'valorCredenciado' => $row['valormedico'], 'valorConvenio' => $row['valorhospital'] ) ;

}





?>