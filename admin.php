<?php
    require_once "etc/common.php";
    session_start();
    if(isset($_SESSION['bb_key']) AND isset($_SESSION['bb_usr']) AND isset($_SESSION['bb_rnk']))
    {
        if(base64_decode($_SESSION['bb_rnk']) == 1)
        {
?>

    <!Doctype html>
    <html>
        <head>
            <meta charset="<?php echo $paginaCodificacion?>">
            <title><?php echo $paginaTitulo?></title>
            <link rel="stylesheet" href="css/w32.css">
        </head>
        <body>
            <?php require_once "html/navBar.php "?>
            <div>
                <form action="admin.php" method="POST">
                    <input name="bb_tit" type="text" placeholder="Titulo">
                    <input name="bb_gen" type="text" placeholder="Genero">
                    <input name="bb_aut" type="text" placeholder="Autor">
                    <input type="submit" value="Ingresar">
                </form>
            </div>

            <?php
                require_once "etc/config.php";
                if(isset($_POST['bb_tit']) AND isset($_POST['bb_gen']) AND isset($_POST['bb_aut']))
                {
                    agregarLibro($_POST['bb_tit'], $_POST['bb_gen'], $_POST['bb_aut'], $miCon);
                }

                if(isset($_GET['Eliminar']))
                {
                    eliminarLibro($_GET['Eliminar'], $miCon);
                }
            ?>

            <div>
                <?php
                verLibros($miCon);
                ?>
            </div>
            
        </body>
    </html>

<?php
        }
        else
        {
            header("Location: Inicio.php");
        }
    }
    else
    {
        header("Location: $paginaPrincipal");
    }

?>