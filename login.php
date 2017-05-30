<?php
  include("header.php");

  $action = $_GET["a"];

  //Formulario de LOGIN
  if($action == null){
    if(isset($_SESSION ["userID"])){
      header ("Location: index.php");
    }else{
	  showHeader("Login");
      showLoginForm();
      if(isset($_SESSION["error"])){
        showError("red", $_SESSION["error"]);
        unset($_SESSION["error"]);//Borro sesion error
      }
	  if(isset($_SESSION["correcto"])){
        showError("green", $_SESSION["correcto"]);
        unset($_SESSION["correcto"]);
      }
    }

  //Validacion del LOGIN
  }else if($action == "loginCheck"){
		if(isset($_SESSION ["userID"])){
		  header ("Location: index.php");
		}else{
		  $username = htmlspecialchars($_POST["login"]);
		  $usePass = htmlspecialchars($_POST["password"]);
		  $queryPassword = "SELECT password, privilegios FROM usuarios WHERE username = '$username'";
		  $password = mysql_query($queryPassword);
		  $count = mysql_num_rows ($password);

		  if ($count == 0) {
			$_SESSION ["error"] = "No existe el usuario $username";
			$date = date('Y-m-d H:i:s');
			$queryLog = "INSERT INTO log (date, username, message) VALUES ('$date', '$username', 'Intendo fallido de conexion con usuario: $username.')";
			mysql_query($queryLog);
			header ("Location: login.php");
		  }else{
			$row = mysql_fetch_row($password);
			//MD5 codifica password
			if(md5($usePass) == $row[0]){
			  $_SESSION ["userID"] = $username;
			  $_SESSION ["privilegios"] = $row[1];
			  
			  if($_SESSION ["privilegios"] == 1){//Sesion ADMIN
				$date = date('Y-m-d H:i:s');
				$queryLog = "INSERT INTO log (date, username, message) VALUES ('$date', '$username', 'El administrador $username se logeo en el sistema.')";
				mysql_query($queryLog);
				header ("Location: sesion.php?a=admin");
				
			  }else if($_SESSION ["privilegios"] == 2){//Sesion SUBASTADOR
				$date = date('Y-m-d H:i:s');
				$queryLog = "INSERT INTO log (date, username, message) VALUES ('$date', '$username', 'El subastador $username se logeo en el sistema.')";
				mysql_query($queryLog);
				header ("Location: sesion.php?a=subastador");
				
			  }else if($_SESSION ["privilegios"] == 3){//Sesion POSTOR
				$date = date('Y-m-d H:i:s');
				$queryLog = "INSERT INTO log (date, username, message) VALUES ('$date', '$username', 'El postor $username se logeo en el sistema.')";
				mysql_query($queryLog);
				header ("Location: sesion.php?a=postor");  
			  }
			}else{
				$_SESSION ["error"] = "Contrasenia incorrecta";
				$date = date('Y-m-d H:i:s');
				$queryLog = "INSERT INTO log (date, username, message) VALUES ('$date', '$username', 'Intendo fallido de conexion con usuario: $username.')";
				mysql_query($queryLog);
				header ("Location: login.php");
			}
		  }
		}
	//Subastas
    }else if($actionA == "subastas"){
		showHeaderOnload("Subasta - Login", "showSubastasActivas()");
		obtenerSubastasActivas();
		//showSubastasAbiertas();
		showFooter();
	//Cierre de sesion
	}else if($actionA == "logout"){
		session_destroy();
		header('Location: login.php');
	//ayuda
	}else if($actionA == "ayuda"){
		showHeader("Ayuda");
		showAyuda();
		showFooter();
	}

?>
