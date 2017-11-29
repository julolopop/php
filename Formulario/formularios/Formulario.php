<?php

print "
<!DOCTYPE html>
<html lang=\"es\">
	<head>
			<title> Formulario </title>
			<meta charset=\"utf-8\"/>
	</head>
	<body>";

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$fecha = $_POST["fecha"];

$ciudad = $_POST["ciudad"];
$codigo = $_POST["codigo"];
$pais = $_POST["pais"];


$username = $_POST["username"];
$contra = $_POST["contra"];
$contra2 = $_POST["contra2"];


$frec = $_POST["frec"];
$acepta = isset($_POST["acepta"]);


	print "<p>El usuario " .$nombre. " " .$apellidos. "</p>
	<p> nacido en " .$fecha. "</p>
	<p> con usuario " .$username. " y email " .$email. "</p>
	<p> Se registra desde " .$ciudad. "con el codigo ".$codigo.", en " .$pais. "</p>";

	if ($contra == $contra2)
		print "<p>Completando el registro de contraseña correctamente</p>";
	else
		print "<p>no coinciden las contraseñas </p>";

	print "<p>novedades cada " .$frec. "</p>";
	if ($acepta)
	print "<p>acepta los terminos</p>";
else
	print "<p>no acepta  los terminos</p>";

	print "
    </body>
</html>";

?>