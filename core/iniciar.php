<?php
require_once "../etc/common.php";

session_start();

if(isset($_SESSION['bb_key']) AND isset($_SESSION['bb_usr']) AND isset($_SESSION['bb_rnk']))
{
    header("Location: $paginaInicio");
}
else
{
    if(isset($_POST['bb_cor']) AND isset($_POST['bb_psw']))
    {
        require_once "../etc/config.php";
        $bb_psw = base64_encode($_POST['bb_psw']);

        iniciarSesion($_POST['bb_cor'], $bb_psw, $miCon);
        
    }
    else
    {
        header("Location: ../$paginaError?tipo=Formulario_Vacio");
    }
}

?>