<?php
    session_start();
    if(isset($_SESSION['bb_key']) AND isset($_SESSION['bb_usr']) AND isset($_SESSION['bb_rnk']))
    {
        require_once "etc/common.php";
?>

    <!Doctype html>
    <html>
        <head>
            <meta charset="<?php echo $paginaCodificacion?>">
            <title><?php echo $paginaTitulo?></title>
            <link rel="stylesheet" href="css/w36.css">
        </head>
        <body>
            <?php require_once "html/navBar.php "?>
            <div>
            <?php 
                require_once "etc/config.php";

                misLibros(base64_decode($_SESSION['bb_usr']), $miCon);

                if(isset($_GET['Devolver']))
                {
                    devolverLibro(base64_decode($_SESSION['bb_usr']), $_GET['Devolver'], $miCon);
                }

            ?>
            </div>
        </body>
    </html>


<?php
    }
    else
    {
         header("Location: $paginaPrincipal");
    }
?>