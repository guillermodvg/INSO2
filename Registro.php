<?php
	//Conexion con la base de datos y el servidor
	$link = mysqli_connect("localhost","root","","inso2") or die ("<h2>No se encuentra el servidor</h2>");;

	//Obtenemos los valores del formulario
	$nombre = $_POST['form_nombre'];
	$edad = $_POST['form_edad'];
	$correo = $_POST['form_correo'];
	$Pass = $_POST['form_contraseña'];
	$rPass = $_POST['form_contraseña2'];

	//Obtengo la longitud del un String
	$req = (strlen($nombre)*strlen($edad)*strlen($correo)*strlen($Pass)*strlen($rPass)) or die ("<h2>No se han rellenado todos los huecos</h2>");

	//Confirmacion de Password
	if($Pass != $rPass){
		die('Las contraseñas no coinciden');
	}
		
	//Se encripta la contraseña
	$contraseniaUsuario = md5($Pass);

	//Introduzco datos a la BD
	mysqli_query($link,"INSERT INTO clientes VALUES ('','$nombre','$edad','$correo','$Pass')") or die ("<h2>Error</h2>"); 
?>
