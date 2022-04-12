<?php

    $paginaPrincipal = "login.php";
    $paginaInicio = "Inicio.php";
    $paginaError = "Error.php";
    $paginaTitulo = "Biblioteca Escolar";
    $paginaCodificacion = "utf-8";


    function escaparHtml($html) 
    {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    }

?>