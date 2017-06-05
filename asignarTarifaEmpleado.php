<?php
$mysql_usuario = "root";
$mysql_password = "";
$mysql_host = "localhost";
$mysql_database = "inso2";

$conexion = new mysqli($mysql_host, $mysql_usuario, $mysql_password,'inso2');

if(!empty($_POST['form_dni'])){
$dniCliente = $_POST['form_dni'];
}
if (isset($_POST['escogeTarifa1'])) {
        $consulta = "UPDATE clientes SET Tarifa = 'Delfin' WHERE DNI = '$dniCliente'";
	$resultado = $conexion->query($consulta);
  } if (isset($_POST['escogeTarifa2'])) {
        $consulta = "UPDATE clientes SET Tarifa = 'Fermin' WHERE DNI = '$dniCliente'";
	$resultado = $conexion->query($consulta);
  }if (isset($_POST['escogeTarifa3'])) {
        $consulta = "UPDATE clientes SET Tarifa = 'Diegui' WHERE DNI = '$dniCliente'";
	$resultado = $conexion->query($consulta);
  }


//Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GesTel</title>
        <link rel="stylesheet" href="usuarioInicio.css"/>
        <script type="application/javascript" src="reservaBus.js"></script>
    </head>
    <body>
        <header>
            <h1>Asignar Tarifas a Clientes</h1>
        </header>
            <form action="" method="POST">
			<p><label for="form_nombre">Introduce un DNI: </label><input type="text" id="form_dni" name="form_dni"></p>
                <fieldset>
                    <legend>Tarifas Disponibles</legend>
		    		<p><label for="form_nombre">Tarifa Delfin :</label>
					<input type="submit" name="escogeTarifa1" value="Asignar la Tarifa Delfin" /></p>
                 	 <p><label for="form_nombre">Tarifa 2 :</label>
					
					<input type="submit" name="escogeTarifa2" value="Asignar la Tarifa 2" /></p>
					<p><label for="form_nombre">Tarifa 3 :</label>
					
					<input type="submit" name="escogeTarifa3" value="Asignar la Tarifa 3" /></p>
<a href="usuarioInicio.html"> <input type="button" value="Volver"/></a>
                </fieldset>
            </form> 
</html>
