<?php
include_once 'util/functions.php';
$mensagem = "";

startSession( false );

if( login_check() )
{
	header('Location: index.php');
}

//print_r( $_GET );

if( isset( $_POST['usuario'] , $_POST['senha'], $_POST['timeoffset'] )  )
{
	$login      = trim( $_POST['usuario']      );
    $password   = trim( $_POST['senha']        ); // The hashed password.
    $timeoffset = trim( $_POST['timeoffset']   );
	
	$resultado = login( $login ,  $password, $timeoffset ); 
	
	if( $resultado )
	{

		$mensagem = "Logando";	
		header('Location: index.php');
	}
	else
	{
		$mensagem = "Usuário não encontrado";
	}
	
}


?>

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title> <?php echo APP_NAME ; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css"  rel="stylesheet" type="text/css" />
        <link href="css/css_geral.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <br/><br/>
        <div style="width:100%">
            <img src="imagens/logo.png" style="width:400px;margin: 0 auto;display: block;"/>
	    </div>
        
        <div class="form-box" id="login-box" style="margin-top:30px;">
            <div class="header">Painel de credenciado</div>
			<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="login_form">
                <div class="body bg-gray">
				<?php if(isset($mensagem))
							echo $mensagem; ?>

                    <input type="hidden" name="timeoffset" id="timeoffset" value=""/>

                    <script type="text/javascript">

                    $(document).ready( function()
                    {
                        $("#login_form").submit( function()
                        {
                            $("#timeoffset").val( new Date().getTimezoneOffset() );
                        });
                    });
                    </script>

                    <div class="form-group">
                        <input type="text" name="usuario" class="form-control" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" class="form-control" placeholder="Senha"/>
                    </div>          
                  
                </div>
                <div class="footer bg-gray">                                                               
                    <button type="submit" class="btn bg-blue btn-block">Entrar</button>  
                    
                    <p><a href="recupera_senha.php">Esqueci minha senha </a></p>
                    
                </div>
            </form>
<!---
            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>-->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>