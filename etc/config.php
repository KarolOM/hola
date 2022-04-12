<?php

    $miHost = "localhost";
    $miUsr = "root";
    $miPsw = "";
    $miDB = "mibiblio";
    $miDSN = "mysql:host=$miHost;dbname=$miDB";

    $misOpciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try
    {
        $miCon = new PDO($miDSN, $miUsr, $miPsw, $misOpciones);
    }
    catch(PDOException $e)
    {
        echo "Fallo al conectar con la base de datos: [".$e->getMessage()."]";
    }

    function comprobarUsr($nombre, $apellidoPaterno, $apellidoMaterno, $conexion)
    {
        $consulta = "SELECT * FROM bb_datos WHERE bb_nombre='$nombre' AND bb_apellidoP='$apellidoPaterno' AND bb_apellidoM='$apellidoPaterno' ";

        if($resultado = $conexion->query($consulta))
        {
            if($resultado->fetchColumn() == 0)
            {
                $resultado == null;
                $conexion == null;
                return true;
            }
            else
            {
                $resultado == null;
                $conexion == null;
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function comprobarCorreo($correo, $conexion)
    {
        $consulta = "SELECT * FROM bb_usrs WHERE bb_cor='$correo'";

        if($resultado = $conexion->query($consulta))
        {
            if($resultado->fetchColumn() == 0)
            {
                $resultado == null;
                $conexion == null;
                return true;
            }
            else
            {
                $resultado == null;
                $conexion == null;
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function ingresarUsr($nombre, $app, $amm, $sex, $pais, $estado, $municipio, $correo, $psw, $conexion)
    {
        $key = $nombre.$correo.$psw;

        $key = base64_encode($key);
        $psw = base64_encode($psw);

        $consultaI = "INSERT INTO bb_usrs (bb_nme, bb_cor, bb_psw, bb_rnk, bb_key) VALUES ('$nombre', '$correo', '$psw', '0', '$key')";
        $consultaII = "INSERT INTO bb_datos(bb_nombre, bb_apellidoP, bb_apellidoM, bb_Sexo, bb_Pais, bb_Estado, bb_Municipio, bb_key) VALUES ('$nombre', '$app', '$amm', '$sex', '$pais', '$estado', '$municipio', '$key')";

        if($resultado = $conexion->query($consultaI))
        {
            if($resultado = $conexion->query($consultaII))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function buscarLibro($Titulo, $conexion)
        {
            $consulta = "SELECT * FROM bb_libros WHERE bb_Titulo = '$Titulo'";

            if($resultado = $conexion->query($consulta))
            {
                $fila = $resultado->fetch(PDO::FETCH_ASSOC);
                if($fila != false)
                {
                    echo "<table class='tbl'>";
                    echo "<tr>";
                    echo "<td>Titulo</td>";
                    echo "<td>Genero</td>";
                    echo "<td>Autor</td>";
                    echo "<td>Estado</td>";
                    echo "<td>Acciones</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>".$fila['bb_Titulo']."</td>";
                    echo "<td>".$fila['bb_Genero']."</td>";
                    echo "<td>".$fila['bb_Autor']."</td>";
                    echo "<td>".($fila['bb_Estado'] == 0 ? "Disponible": "Prestado")."</td>";
                    echo "<td>".($fila['bb_Estado'] == 0 ? "<a href='Inicio.php?Prestamo=".$fila["bb_Titulo"]."'>Pedir</a>": "")."</td>";
                    echo "</tr>";
                    echo "</table>";
                
                }
            }
            else
            {
                echo "<div>No hay resultados...</div>";
            }
        }

        function prestarLibro($Titulo, $poseedor, $conexion)
        {
            $consultaI = "INSERT INTO bb_prestamos (bb_Titulo, bb_poseedor) VALUES('$Titulo', '$poseedor')";
            $consultaII = "UPDATE bb_libros SET bb_Estado = '1' WHERE bb_Titulo = '$Titulo'";

            if($resultado = $conexion->query($consultaI))
            {
                if($resultado = $conexion->query($consultaII))
                {
                    echo "<div>Libro prestado con exito</div>";
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        function misLibros($id, $conexion)
        {
            $consulta = "SELECT * FROM bb_prestamos WHERE bb_poseedor = '$id'";

            if($resultado = $conexion->query($consulta))
            {
                echo "<table>";
                echo "<tr>";
                echo "<td>Titulo</td>";
                echo "<td>Acciones</td>";
                echo "</tr>";
                while($fila = $resultado->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr>";
                    echo "<td>".$fila['bb_Titulo']."</td>";
                    echo "<td><a href='Prestamos.php?Devolver=".$fila['bb_Titulo']."'>Devolver</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                
            }
            else
            {
                echo "<div>No hay resultados...</div>";
            }
        }

        function devolverLibro($id, $Titulo, $conexion)
        {
            $consultaI = "DELETE FROM bb_prestamos WHERE bb_Titulo = '$Titulo' AND bb_poseedor = '$id'";
            $consultaII = "UPDATE bb_libros SET bb_Estado = '0' WHERE bb_Titulo = '$Titulo'";

            if($resultado = $conexion->query($consultaI))
            {
                if($resultado = $conexion->query($consultaII))
                {
                    echo "<div>Libro devuelto con exito</div>";
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        function iniciarSesion($bb_cor, $bb_psw, $conexion)
        {
            $consulta = "SELECT * FROM bb_usrs WHERE bb_cor='$bb_cor' AND bb_psw='$bb_psw'";

            if($resultado = $conexion->query($consulta))
            {
                $fila = $resultado->fetch(PDO::FETCH_ASSOC);
                if($fila != false)
                {
                    session_start();
                    $_SESSION['bb_key'] = $fila['bb_key'];
                    $_SESSION['bb_usr'] = base64_encode($fila['bb_nme']);
                    $_SESSION['bb_rnk'] = base64_encode($fila['bb_rnk']);
                    header("Location: ../Inicio.php");
                }
                else
                {
                    header("Location: Error.php?tipo=Error_Usuarios");
                }
            }
            else
            {
                return false;
            }
        }

        function agregarLibro($tit, $gen, $aut, $conexion)
        {
            $consulta = "INSERT INTO bb_libros (bb_Titulo, bb_Genero, bb_Autor, bb_Estado) VALUES ('$tit', '$gen', '$aut', '0')";

            if($resultado = $conexion->query($consulta))
            {   
                echo "<div>Libro ingresado</div>";
            }
            else
            {
                return false;
            }

        }

        function verLibros( $conexion)
        {
            $consulta = "SELECT * FROM bb_libros";

            if($resultado = $conexion->query($consulta))
            {
                echo "<table>";
                echo "<tr>";
                echo "<td>Titulo</td>";
                echo "<td>Genero</td>";
                echo "<td>Autor</td>";
                echo "<td>Estado</td>";
                echo "<td>Acciones</td>";
                echo "</tr>";
                while($fila = $resultado->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr>";
                    echo "<td>".$fila['bb_Titulo']."</td>";
                    echo "<td>".$fila['bb_Genero']."</td>";
                    echo "<td>".$fila['bb_Autor']."</td>";
                    echo "<td>".$fila['bb_Estado']."</td>";
                    echo "<td><a href='admin.php?Eliminar=".$fila['bb_Titulo']."'>Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                
            }
            else
            {
                echo "<div>No hay resultados...</div>";
            }
        }

        function eliminarLibro($titulo, $conexion)
        {
            $consultaI = "DELETE FROM bb_libros WHERE bb_Titulo = '$titulo'";
            if($resultado = $conexion->query($consultaI))
            {
                echo "Libro eliminado";
                return true;
            }
            else
            {
                return true;
            }
        }

?>  