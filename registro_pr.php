<?php
	// registro_pr.php

	// 0. Recibir los datos del formulario
	$usuario = $_POST['usuario'];
	$clave = md5($_POST['clave']);
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];

	// 1. Conectarse a la BD
	include("conexion.php");

	// 2.Crear el insert
    $insertar = "INSERT INTO usuarios 
    VALUES(NULL
    ,'$usuario'
    ,'$clave'
	,'$nombre'
	,'$email')";
	
	// 3.Ejecutar el insert
	$insertar_ej = mysqli_query($conexion, $insertar);

	// 4. Preguntar si todo anduvo bien
	if($insertar_ej === true) {
		echo "Registro insertado!";
		header("location: index.php");
	}
    else echo "Error, ver SQL";
	
?>