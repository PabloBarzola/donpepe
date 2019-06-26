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

		<?php
			// 1. Conectarse a la BD
			include("conexion.php");

			// 2.Crear la consulta
    		$consulta = "SELECT * FROM libros ORDER BY titulo asc"; 
    
			// 3.Ejecutar la consulta
			$select_ej = mysqli_query($conexion, $consulta);

			// 4.Preguntar si todo anduvo bien
    		if($select_ej === false) echo "Error, ver SQL";
    		else {            
        		$cant = mysqli_num_rows($select_ej);

        		if ($cant===0){
            		echo "No tengo libros de ese estilo";
        		}
        	else{
				// ---------------- DANGER ZONE -------------------				
				} 
			}
		?>
	
		<table border='1'>
			<tr>
				<td>Título</td>
				<td>Autor</td>
				<td>Precio</td>
			</tr>

		<?php 
		while($reg = mysqli_fetch_array($select_ej)){
		
			echo "<tr>";
				
				echo "<td>".$reg['titulo']."</td>";
				echo "<td>".$reg['autor']."</td>";
				echo "<td>".$reg['precio']."</td>";
				echo "<td><a href='editar.php?id=" . $reg['id_libro'] . "'>Editar</a></td>";

			echo "</tr>";

		}?>
		</table>		
	</body>
</html>
