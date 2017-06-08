<?php
$mysql_usuario = "root";
$mysql_password = "";
$mysql_host = "localhost";
$mysql_database = "inso2";

$conexion = new mysqli($mysql_host, $mysql_usuario, $mysql_password,'inso2');

if(!empty($_POST['form_dni'])){
$dniCliente = $_POST['form_dni'];

//Preparar la consulta
$consulta = "SELECT * FROM clientes WHERE DNI='$dniCliente'";
//Ejecutar la consulta
$resultado = $conexion->query($consulta);


//Se crea una tabla para mostrar los resultados


//Extraer fila a fila con un búcle while
$fila = $resultado->fetch_array(MYSQLI_ASSOC);
}
//Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TelTel</title>
        <link rel="stylesheet" href="consultaDatoss.css"/>
    </head>
    <body><center>
        <header>
            <h1>Consultar Datos de Clientes</h1>
        </header>
	</center>
            <form action="" method="POST">
		
					<p><label for="form_dni">Introduce un DNI: </label><input type="text" name="form_dni" id="form_dni"/>
					<input type="submit" name="muestraDatos" value="Mostrar Datos de Cliente"/></p>
	</form>
	<form action="" method="POST">
<center>
                <fieldset>
                    <legend>Opciones Usuario</legend>
		    <p><label for="nombre">Nombre *</label><input type="text" id="form_nombre" name="form_nombre" value="<?php if(!empty($fila)){echo $fila['NombreCompleto'];}?>"/></p>	
                    <p><label for="form_nif">NIF *</label><input type="text" id="form_nif" name="form_nif" value="<?php if(!empty($fila)){ echo $fila['DNI'];}?>"/></p>
<p><label for="form_nif">Edad *</label><input type="text" id="form_nif" name="form_nif" value="<?php if(!empty($fila)){echo $fila['Edad'];}?>"/></p>
<p><label for="form_nif">Correo Electronico *</label><input type="text" id="form_nif" name="form_nif" value="<?php if(!empty($fila)){echo $fila['CorreoElectronico'];}?>"/></p>
                    <p><label for="form_no">Dirección *</label><input type="text" id="form_direccion" name="form_direccion" value="<?php if(!empty($fila)){echo $fila['Direccion'];}?>"/></p>
					<p><label for="form_nombre">Tarifa *</label><input type="text" id="form_tarifa" name="form_tarifa" value="<?php if(!empty($fila)){ echo $fila['Tarifa'];}?>"></p>	
					<p><label for="form_nombre">Telefono 1 *</label><input type="text" id="form_telefono1" name="form_telefono1" value="<?php if(!empty($fila)){echo $fila['Telefono1'];}?>"></p>		
					<p><label for="form_nombre">Telefono 2 *</label><input type="text" id="form_telefono2" name="form_telefono2" value="<?php if(!empty($fila)){echo $fila['Telefono2'];}?>"></p>	
					<p><label for="form_nombre">Telefono 3 *</label><input type="text" id="form_telefono3" name="form_telefono3" value="<?php if(!empty($fila)){ echo $fila['Telefono3'];}?>"></p>
                    <p><a href="modificarDatosEmpleado.php"><input type="button" name="modificaDatos" value="Modifica Datos de Clientes"/></a><a href="usuarioInicio.html"> <input type="button" value="Volver"/></a></p>

                </fieldset>
		</center>
            </form> 
</html>


