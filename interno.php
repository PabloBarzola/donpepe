<?php
	//interno.php

	// Preguntar si NO existe la variable de sesión
	session_start();
	if(isset($_SESSION['id'])===false){
		echo "FUERA CHE";
		// Si la persona no está logueada lo mando a la home
		header("location: index.php");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Hola nombre!</title>
		<link href="estilos.css" rel="stylesheet">
	</head>

	<body>
		<h1>nombre, esta es la librería de Don Pepe!</h1>
		
		<a href="agregar.php">Agregar libro</a> |
		<a href="salir.php">Cerrar sesión</a>
		
		<hr>
		
		<div class="listado">
			<a href="#" class="listado-libro">
				<h2>Título libro
					<span class="listado-libro_autor">
						Autor
					</span>
				</h2>
				<img src="" alt="">
				<p>Precio: $XX<br>
				   Rating:  XX/5
				</p>
			</a>
		</div>
		
	</body>
</html>
