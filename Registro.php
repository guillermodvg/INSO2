<?php
	if(!$_POST){
		$status = 'error';
		$data = json_decode($data, true);
		$msg = 'No se recibieron datos';
	}else{
		$nombre = filter_var($_POST['form_nombre'], FILTER_SANITIZE_STRING);
		$dni = $_POST['form_dni'];
		$edad = filter_var($_POST['form_edad'], FILTER_SANITIZE_STRING);
		$correo = filter_var($_POST['form_correo'], FILTER_SANITIZE_EMAIL);
		$contrasena = $_POST['form_contrasena'];
		$direccion=$_POST['form_direccion'];
	
		if(!isset($status)){
			$link = new PDO('mysql:host=localhost;dbname=inso2', 'root', '');

			$sql = '';
			$sql .= "('".$nombre."','".$dni."','".$edad."','".$correo."','".$contrasena."','".$direccion."'), ";
			$sql_insertar = "INSERT INTO clientes ( NombreCompleto, DNI, Edad, CorreoElectronico, Contraseña, Direccion) 
			VALUES ". $sql;
		
			$sql_insertar = substr("$sql_insertar", 0, -2);
			$query= $link->query($sql_insertar);
				
			$status = 'success';
			$data   = null;
			$msg    = 'Se guardaron los datos de registro de conductores';
		}
	}
	
		$array_res = array(
			'status' => $status,
			'data' => $data,
			'message' => $msg
		);
		//echo json_encode($array_res);
		header('Location: Inicio.html');
		
?>
