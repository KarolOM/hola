<ul>
    <li><a href="Inicio.php">Inicio</a></li>
    <li><a href="Prestamos.php">Mis Prestamos</a></li>
    <li><form action="Inicio.php" method="GET"><input type="text" class="txt" name="Buscar" placeholder="Buscar..."><input class="btn" type="submit" value="Buscar..."></form></li>
    <li><a><?php echo base64_decode($_SESSION['bb_usr'])?></a></li>
    <li><a><?php if(base64_decode($_SESSION['bb_rnk']) == "0"){ echo "Estandar";}else if(base64_decode($_SESSION['bb_rnk']) == "1"){echo "Administrador";}  ?></a></li>
    <?php echo base64_decode($_SESSION['bb_rnk']) == "1" ? "<li><a href='admin.php'>Administrar Libros</a></li>":"" ?>
    <li><a href="Salir.php">Salir</a></li>
</ul>