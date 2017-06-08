<?php
$mysql_usuario = "root";
$mysql_password = "";
$mysql_host = "localhost";
$mysql_database = "inso2";

$conexion = new mysqli($mysql_host, $mysql_usuario, $mysql_password,'inso2');
if (isset($_POST['muestraDatos'])){
if(!empty($_POST['form_dni'])){
$dniCliente = $_POST['form_dni'];
$consulta = "SELECT * FROM clientes WHERE DNI='$dniCliente'";
$resultado = $conexion->query($consulta);

$fila = $resultado->fetch_array(MYSQLI_ASSOC);
}}if (isset($_POST['GuardarDatos'])){
$dniCliente = $_POST['form_nif'];
$nombre=$_POST['form_nombre'];
$edad=$_POST['form_edad'];
$correo=$_POST['form_correo'];
$direccion=$_POST['form_direccion'];
$tarifa=$_POST['form_tarifa'];
$tel1=$_POST['form_telefono1'];
$tel2=$_POST['form_telefono2'];
$tel3=$_POST['form_telefono3'];
$consulta = "UPDATE clientes SET NombreCompleto = '$nombre', DNI = '$dniCliente', Edad = '$edad', CorreoElectronico = '$correo', Direccion = '$direccion', Tarifa = '$tarifa', Telefono1 = '$tel1', Telefono2 = '$tel2', Telefono3 = '$tel3' WHERE DNI = '$dniCliente'";
$resultado = $conexion->query($consulta);
}
//Cerrar la conexión
mysqli_close($conexion);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TelTel</title>
        <link rel="stylesheet" href="usuarioInicio.css"/>
        <script type="application/javascript" src="reservaBus.js"></script>
    </head>
    <body>
        <header>
            <h1>Modificar Datos de Clientes</h1>
        </header>
            <form action="" method="POST">
					<p><label for="form_nombre">Introduce un DNI: </label><input type="text" id="form_dni" name="form_dni">
					<input type="submit" name="muestraDatos" value="Mostrar Datos de Cliente"/></p>
		<center>
                <fieldset>
                    <legend>Opciones Usuario</legend>
		    <p><label for="nombre">Nombre *</label><input type="text" id="form_nombre" name="form_nombre" value="<?php if(!empty($fila)){echo $fila['NombreCompleto'];}?>"/></p>	
                    <p><label for="form_nif">NIF *</label><input type="text" id="form_nif" name="form_nif" value="<?php if(!empty($fila)){ echo $fila['DNI'];}?>"/></p><p><label for="form_nif">Edad *</label><input type="text"  name="form_edad" value="<?php if(!empty($fila)){ echo $fila['Edad'];}?>"/></p>
                    <p><label for="form_no">Correo Electronico *</label><input type="text" name="form_correo" value="<?php if(!empty($fila)){echo $fila['CorreoElectronico'];}?>"/></p>
                    <p><label for="form_no">Dirección *</label><input type="text" id="form_direccion" name="form_direccion" value="<?php if(!empty($fila)){echo $fila['Direccion'];}?>"/></p>
					<p><label for="form_nombre">Tarifa *</label><input type="text" id="form_tarifa" name="form_tarifa" value="<?php if(!empty($fila)){ echo $fila['Tarifa'];}?>"></p>	
					<p><label for="form_nombre">Telefono 1 *</label><input type="text" id="form_telefono1" name="form_telefono1" value="<?php if(!empty($fila)){echo $fila['Telefono1'];}?>"></p>		
					<p><label for="form_nombre">Telefono 2 *</label><input type="text" id="form_telefono2" name="form_telefono2" value="<?php if(!empty($fila)){echo $fila['Telefono2'];}?>"></p>	
					<p><label for="form_nombre">Telefono 3 *</label><input type="text" id="form_telefono3" name="form_telefono3" value="<?php if(!empty($fila)){ echo $fila['Telefono3'];}?>"></p>		
                    <p><input type="submit" name="GuardarDatos" value="Guardar Datos de Clientes" onclick="compruebaReserva();"/><a href="usuarioInicio.html"> <input type="button" value="Volver"/></a></p>
                </fieldset>
		</center>
            </form> 
</html>
