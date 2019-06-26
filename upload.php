<?php
	// upload.php
	
	// Conseguir ID del libro
	$id = $_POST['id'];
	
	echo "El ID del libro es $id";
	
	// Configuración
	
	// Creamos la carpeta vacía
	$folder = "cover/"; // Carpeta a la que queremos subir los archivos
	
	$maxlimit = 3500000; // Máximo límite de tamaño (en bits), menos de 0.5mb
	$allowed_ext = "jpg,png,gif,webp,jpeg"; // Extensiones permitidas (usar una coma para separarlas)
	$overwrite = "yes"; // Permitir sobreescritura? (yes/no)
	$match = ""; 
	$filesize = $_FILES['userfile']['size']; // toma el tamaño del archivo
	// slugify
	$filename = strtolower($_FILES['userfile']['name']); // toma el nombre del archivo y lo pasa a minúsculas
	if(!$filename || $filename==""){ // mira si no se ha seleccionado ningún archivo
	   $error = "- Ningún archivo selecccionado para subir.<br>";
	}elseif(file_exists($folder.$filename) && $overwrite=="no"){ // comprueba si el archivo existe ya
	   $error = "- El archivo <b>$filename</b> ya existe<br>";
	}
	// comprobar tamaño de archivo
	if($filesize < 1){ // el archivo está vacío
	   $error .= "- Archivo vacío.<br>";
	}elseif($filesize > $maxlimit){ // el archivo supera el máximo
	   $error .= "- Este archivo supera el máximo tamaño permitido.<br>";
	}
	$file_ext = preg_split("/\./",$filename); 
	$allowed_ext = preg_split("/\,/",$allowed_ext); // verifica extension
	foreach($allowed_ext as $ext){
	   if($ext==$file_ext[1]) $match = "1"; // Permite el archivo
	}
	if(!$match){
	   $error = "- Este tipo de archivo no est&aacute; permitido: $filename<br>";
	}
	if(isset($error)==true){
	   print "Se ha producido el siguiente error al subir el archivo:<br> $error"; // Muestra los errores
	}else{
		// Acá le cambio el nombre al archivo
		//        ID     .     EXT
		$nombre = $id . "." . $file_ext[1];		


		// Para que no de error al intentar subir el archivo a la carpeta
		// dar permiso 777 sobre la misma
		// sudo chmod -R 777 /opt/lampp/htdocs/clase5/libreria/cover
		
	   if(move_uploaded_file($_FILES['userfile']['tmp_name'], $folder.$nombre)){ // Finalmente sube el archivo
		  print "</br><b>$nombre</b> se ha subido correctamente!"; 
	   }else{
		  print "Error! Puede que el tamaño supere el máximo permitido por el servidor. Inténtelo de nuevo."; // Otro error
	   }
	}
?>