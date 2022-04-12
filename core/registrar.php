<?php
    require_once "../etc/common.php";

    session_start();

    if(isset($_SESSION['bb_key']) AND isset($_SESSION['bb_usr']) AND isset($_SESSION['bb_rnk']))
    {
        header("Location: $paginaInicio");
    }
    else
    {

    if( isset($_POST['bb_nme']) &&
        isset($_POST['bb_app']) &&
        isset($_POST['bb_amm']) &&
        isset($_POST['bb_cor']) &&
        isset($_POST['bb_rco']) &&
        isset($_POST['bb_sex']) &&
        isset($_POST['bb_pai']) &&
        isset($_POST['bb_est']) &&
        isset($_POST['bb_mun']) &&
        isset($_POST['bb_psw']) &&
        isset($_POST['bb_rps'])
    )
    {
        if($_POST['bb_sex'] !== "null")
        {
            if($_POST['bb_pai'] !== "null")
            {
                if($_POST['bb_est'] !== "null")
                {
                    if($_POST['bb_mun'] !== "null")
                    {
                        if($_POST['bb_cor'] == $_POST['bb_rco'])
                        {
                            if($_POST['bb_psw'] == $_POST['bb_rps'])
                            {
                                $bb_nme = escaparHtml($_POST['bb_nme']);
                                $bb_app = escaparHtml($_POST['bb_app']);
                                $bb_amm = escaparHtml($_POST['bb_amm']);
                                $bb_cor = escaparHtml($_POST['bb_cor']);
                                $bb_psw = escaparHtml($_POST['bb_psw']);
                                $bb_sex = escaparHtml($_POST['bb_sex']);
                                $bb_pai = escaparHtml($_POST['bb_pai']);
                                $bb_est = escaparHtml($_POST['bb_est']);
                                $bb_mun = escaparHtml($_POST['bb_mun']);
                                $bb_rnk = 0;

                                require_once "../etc/config.php";

                                if(comprobarUsr($bb_nme, $bb_app, $bb_amm, $miCon)) //devuelve true si no hay coincidencia y false si las hay
                                {
                                    if(comprobarCorreo($bb_cor, $miCon)) //lo mismo que arriba
                                    {
                                        if(ingresarUsr($bb_nme, $bb_app, $bb_amm, $bb_sex, $bb_pai, $bb_est, $bb_mun,$bb_cor, $bb_psw, $miCon))
                                        {
                                            session_start();
                                            $_SESSION['bb_key'] = base64_encode($bb_nme.$bb_cor.$bb_cor);
                                            $_SESSION['bb_usr'] = base64_encode($bb_nme);
                                            $_SESSION['bb_rnk'] = base64_encode("0");
                                            header("Location: ../Inicio.php");
                                        }
                                        else
                                        header("Location: ../$paginaError?tipo=Falla_Al_Ingresar");
                                    }
                                    else
                                    header("Location: ../$paginaError?tipo=Correo_Ya_Registrado");
                                }
                                else
                                header("Location: ../$paginaError?tipo=Nombre_Ya_Registrado");
                            }
                            else
                            header("Location: ../$paginaError?tipo=Cotrasena_No_Iguales");
                        }
                        else
                        header("Location: ../$paginaError?tipo=Correos_No_Iguales");
                    }
                    else
                    header("Location: ../$paginaError?tipo=Municipio_No_Especificado");
                }
                else
                header("Location: ../$paginaError?tipo=Estado_No_Especificado");
            }
            else
            header("Location: ../$paginaError?tipo=Pais_No_Especificado");
        }
        else
        header("Location: ../$paginaError?tipo=Sexo_No_Especificado");
    }
    else
    {
        header("Location: ../$paginaError?tipo=Formulario_Vacio");
    }
    }
?>