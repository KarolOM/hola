<?php
require_once "etc/common.php";
    session_start();
    if(isset($_SESSION['bb_key']) AND isset($_SESSION['bb_usr']) AND isset($_SESSION['bb_rnk']))
    {
?>

    <!Doctype html>
    <html>
        <head>
            <meta charset="<?php echo $paginaCodificacion?>">
            <title><?php echo $paginaTitulo?></title>
            <link rel="stylesheet" href="css/w35.css">
        </head>
        <body>
            
               
            <?php require_once "html/navBar.php "?>
            <div>
            <?php
                if(isset($_GET["Buscar"]))
                {
                    require_once "etc/config.php";

                    buscarLibro($_GET["Buscar"], $miCon);
                }
                if(isset($_GET["Prestamo"]))
                {
                    require_once "etc/config.php";

                    echo "<h1>Prestamo</h1>";
                    echo $_GET["Prestamo"];
                    prestarLibro($_GET['Prestamo'], base64_decode($_SESSION['bb_usr']), $miCon);
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