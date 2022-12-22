<?php
include_once 'util/functions.php';
$mensagem="";
$passo = 1;
$token = "";

$bd = connectDB();

if( isset( $_POST['usuario'] ))
{ 
    $passo = 2;
    
    $resultado = recuperaSenhaByEmail($_POST['usuario'] );
    
    if( is_numeric( $resultado ))
    {
        $passo = 2;
        $mensagem = "Foi enviado um e-mail com as instruções para alteração de senha";
    }
    else
    {
        $passo = 1;
        $mensagem = $resultado;
    }
}
else //Está fazendo um post informando a nova senha e o token(hidden input)
if( isset( $_POST['token'], $_POST['novasenha1'], $_POST['novasenha2'] ))
{
    $senha1 = trim($_POST['novasenha1']);
    $senha2 = trim($_POST['novasenha2']);
    $token  = trim($_POST['token']);
    $credenciado = getCredenciadoByToken( $token );
    
    if( $senha1 != $senha2 )
    {
        $passo = 3;
        $mensagem= "Senhas diferentes";
    }

    if( $credenciado == null )
    {
        $passo = 3;
        $mensagem= "Token inválido";
    }

    $result = alterarSenha( $credenciado, $senha1 );


    if( $result == false )
    {
        $passo = 3;
        $mensagem= "Erro desconhecido";
    }
    else
    {
        $passo = 4;
        $mensagem= "Senha alterada com sucesso";
    }

}
else //Acessa pelo link do e-mail, vai pro passo 3, onde aparecem os campos de senha
if( isset( $_GET['token'] ))
{
    $token  = trim($_GET['token']);
    $credenciado = getCredenciadoByToken( $token );
    
    if( $credenciado == null )
    {
        die("Token inválido");
    }
    else
    {
        $passo = 3;
        $mensagem = "";
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
	
        <div class="form-box" id="login-box">

            <?php if( $passo == 1 ): ?>


                    <div class="header">1. Informe seu e-mail</div>
                    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="body bg-gray">
                            <div class="form-group">
                                <?php echo $mensagem; ?>
                                <input type="text" name="usuario" class="form-control" placeholder="E-mail"/>
                            </div>
                        </div>
                    
                         <div class="footer">                                                               
                                <button type="submit" class="btn bg-blue btn-block">Enviar</button>  
                         </div>
                    </form>

             <?php endif; ?>

             <?php if( $passo == 2 ): ?>


                    <div class="header">Acesse seu e-mail</div>
                    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="body bg-gray">
                            <div class="form-group">
                                <h3><?php echo $mensagem; ?></h3>
                                <a href="login.php" target="_blanck">Ir para pagina de login</a>
                            </div>
                        </div>
                    </form>

             <?php endif; ?>

             <?php if( $passo == 3 ): ?>


                    <div class="header">Alterar senha</div>
                    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="body bg-gray">
                            <div class="form-group">
                                <?php echo $mensagem; ?>
                                <input type="hidden" name="token"  value="<?php echo $token; ?>"/>
                                <input type="text"   name="novasenha1" class="form-control" placeholder="Nova senha"/>
                                <br/>
                                <input type="text"   name="novasenha2" class="form-control" placeholder="Repita a senha"/>
                            </div>
                        </div>
                    
                         <div class="footer">                                                               
                                <button type="submit" class="btn bg-blue btn-block">Enviar</button>  
                         </div>
                    </form>

             <?php endif; ?>



             <?php if( $passo == 4 ): ?>


                    <div class="header">Recuperação concluída</div>
                    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="body bg-gray">
                            <div class="form-group">
                                <h3><?php echo $mensagem; ?></h3>
                                <a href="login.php" target="_blanck">Ir para pagina de login</a>
                            </div>
                        </div>
                    </form>

             <?php endif; ?>



       </div>


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>