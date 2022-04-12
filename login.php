<?php
    require_once "etc/common.php";
    session_start();

    if(isset($_SESSION['bb_key']) AND !empty($_SESSION['bb_usr']) AND !empty($_SESSION['bb_rnk']))
    {
        header("Location: $paginaInicio");
    }
    else
    {
?>
    <!Doctype html>
    <html>
        <head>
            <meta charset="<?php echo $paginaCodificacion?>">
            <title><?php echo $paginaTitulo?></title>
            <link rel="stylesheet" href="css/log.css">
        </head>
        <body>
            <section class="form-login">
            
            <div >
                <form method="POST" action="core/iniciar.php">
                    <h5> Inicio de Sesion</h5>
                    <input class="controls" name="bb_cor" type="email" placeholder="Correo">
                    <input class="controls" name="bb_psw" type="password" placeholder="Contraseña">
                    <input class="buttons" type="submit" value="Ingresar">
                </form>
            </div>
            </section>
        </body>
    </html>
<?php
    }
?>