<?php
	// login_pr.php
	
	
	// 0. Recibir los datos del formulario
	$usuario = $_POST['usuario'];
	$clave = md5($_POST['clave']);

	// 1. Conectarse a la BD
	include("conexion.php");

	// 2.Crear la consulta
	$select = "SELECT * 
				 FROM usuarios 
	   			WHERE usuario = '$usuario'
				  AND clave = '$clave'";

	// 3.Ejecutar la consulta
	$select_ej = mysqli_query($conexion, $select);

   // 4.Preguntar si todo anduvo bien
   if($select_ej === false) echo "Error, ver SQL";
   else {            
	   $cant = mysqli_num_rows($select_ej);

	   if ($cant===0){
		   echo "Usuario o contraseña erronea";
	   }
	   else{
		   	//echo "Perfecto ingresaste";
		   	//echo "<br><br>";	  
		   
		   	$reg = mysqli_fetch_array($select_ej);

		   	//echo $reg['id_usuario'];

			session_start();
			$_SESSION['id'] = $reg['id_usuario'];
			//echo $_SESSION['id'];

			header("location: interno.php");

		   // ---------------- DANGER ZONE -------------------
	   }
   }

?>