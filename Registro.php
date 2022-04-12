<?php
    require_once "etc/common.php";

    session_start();

    if(isset($_SESSION['bb_key']) AND isset($_SESSION['bb_usr']) AND isset($_SESSION['bb_rnk']))
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
            <link rel="stylesheet" href="css/w34.css">
        </head>
        <body>
            <div class="login2">
                <form method="POST" action="core/registrar.php">
                    <input class="txt" type="text" name="bb_nme" placeholder="Nombre">
                    <input class="txt" type="text" name="bb_app" placeholder="Apellido Paterno">
                    <input class="txt" type="text" name="bb_amm" placeholder="Apellido Materno">
                    <input class="txt" type="email" name="bb_cor" placeholder="Correo">
                    <input class="txt" type="email" name="bb_rco" placeholder="Repetir Correo">
                    <select name="bb_sex" class="opt">
                        <option value="null" selected>Sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="NS">No Especificar</option>
                    </select>
                    <select name="bb_pai" class="opt">
                        <option value="null" selected>Pais</option>
                        <option value="México">México</option>
                    </select>
                    <select name="bb_est" class="opt">
                        <option value="null" selected>Estado</option>
                        <option value="Durango">Durango</option>
                    </select>
                    <select name="bb_mun" class="opt">
                        <option value="null" selected>Localidad</option>
                        <option value="Victoria de Durango">Victoria de Durango</option>
                    </select>
                    <input class="txt" type="password" name="bb_psw" placeholder="Contraseña">
                    <input class="txt" type="password" name="bb_rps" placeholder="Repetir Contraseña">
                    <input class="btn" type="submit" name="bb_reg" value="Registrar">
                </form>
            </div>
        </body>
    </html>
<?php
    }
?>