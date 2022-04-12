<?php
    require_once "etc/common.php";

    session_start();

    if(isset($_SESSION['bb_key']) AND isset($_SESSION['bb_usr']) AND isset($_SESSION['bb_rnk']))
    {
        header("Location: $paginaInicio");
    }
    else
    {
        header("Location: $paginaPrincipal");
    }

    //Sesiones
    //$_SESSION['bb_key']
    //$_SESSION['bb_usr'] b64
    //$_SESSION['bb_rnk'] b64

?>



