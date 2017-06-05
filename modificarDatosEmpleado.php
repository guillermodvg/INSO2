<?php
$mysql_usuario = "root";
$mysql_password = "";
$mysql_host = "localhost";
$mysql_database = "inso2";

$conexion = new mysqli($mysql_host, $mysql_usuario, $mysql_password,'inso2');


$dniCliente = $_POST['form_dni'];
if(!empty$_POST['form_dni']

//Preparar la consulta
$consulta = "SELECT * FROM clientes WHERE DNI='$dniCliente'";
//Ejecutar la consulta
$resultado = $conexion->query($consulta);


//Se crea una tabla para mostrar los resultados


//Extraer fila a fila con un búcle while
$fila = $resultado->fetch_array(MYSQLI_ASSOC);

//Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TelTel</title>
        <link rel="stylesheet" href="usuarioInicio.css"/>
        <script type="application/javascript"></script>
    </head>
    <body>
        <header>
            <h1>Modificar Datos de Clientes</h1>
        </header>
            <form>
					<p><label for="form_nombre">Introduce un DNI: </label><input type="text" id="form_dni" name="form_dni">
					<input type="button" name="muestraDatos" value="Mostrar Datos de Cliente"/></p>
		<center>
                <fieldset>
                    <legend>Opciones Usuario</legend>
		    <p><label for="form_nombre">Nombre *</label><input type="text" id="form_nombre" name="form_nombre"></p>	
                    <p><label for="form_nombre">NIF *</label><input type="text" id="form_nif" name="form_nif"></p>
                    <p><label for="form_nombre">Dirección *</label><input type="text" id="form_direccion" name="form_direccion"></p>
					<p><label for="form_nombre">Tarifa *</label><input type="text" id="form_tarifa" name="form_tarifa"></p>	
					<p><label for="form_nombre">Telefono 1 *</label><input type="text" id="form_telefono1" name="form_telefono1"></p>		
					<p><label for="form_nombre">Telefono 2 *</label><input type="text" id="form_telefono2" name="form_telefono2"></p>	
					<p><label for="form_nombre">Telefono 3 *</label><input type="text" id="form_telefono3" name="form_telefono3"></p>	
                    <p><input type="button" name="GuardarDatos" value="Guardar Datos de Clientes" onclick="compruebaReserva();"/><a href="usuarioInicio.html"> <input type="button" value="Volver"/></a></p>
                </fieldset>
		</center>
            </form> 
</html>
