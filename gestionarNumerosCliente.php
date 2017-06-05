<?php
$mysql_usuario = "root";
$mysql_password = "";
$mysql_host = "localhost";
$mysql_database = "inso2";

$conexion = new mysqli($mysql_host, $mysql_usuario, $mysql_password,'inso2');


$dniCliente = $_POST['form_dni'];
$telefono1 = $_POST['form_numero1'];
$telefono2 = $_POST['form_numero2'];
$telefono3 = $_POST['form_numero3'];

//Preparar la consulta

$consulta = "SELECT Telefono1, Telefono2, Telefono3 FROM clientes WHERE DNI='$dniCliente'";
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
        <title>GesTel</title>
        <link rel="stylesheet" href="usuarioInicio.css"/>
        <script type="application/javascript" src="reservaBus.js"></script>
    </head>
    <body>
        <header>
            <h1>Gestionar Numeros de Telefono</h1>
        </header>
            <form action="" method="POST">
			<p><label for="form_nombre">Introduce un DNI: </label><input type="text" id="form_dni" name="form_dni">
			<input type="submit" name="muestraDatos" value="Mostrar Numeros de Telefono"/></p>
                <fieldset>
                    <legend>Tarifas Disponibles</legend>
		    		<p><label for="form_numero1">Numero 1 :</label>
				<input type="text" name="form_numero1" id="form_numero1" value="<?php echo $fila['Telefono1']?>"/></p>
                  		<p><label for="form_numero2">Numero 2 :</label>
				<input type="text" name="form_numero2" id="form_numero2" value="<?php echo $fila['Telefono2']?>"/></p>
				<p><label for="form_numero3">Numero 3 :</label>
				<input type="text" name="form_numero3" id="form_numero3" value="<?php echo $fila['Telefono3']?>"/></p>
				<input type="button" name="guardaNumeros" value="Guardar"/><a href="clienteInicio.html"> <input type="button" value="Volver"/></a>
                </fieldset>
            </form> 
</html>
