<?php

function AbrirConexion() {
	$dbhost = "localhost";
	$dbuser = "gallbo_markoptic";
	$dbpass = "markoptic2015";
	//$dbuser = "root";
	//$dbpass = "";
	$db = "gallbo_markoptic";
	$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
		if($link->connect_errno) {
			die("Error " . $link->connect_error);
		}
	return $link;
}

function contacto($data){
	$query = "INSERT INTO contacto (nombre, apellido, telefono, correo, comentario) 
	VALUES ('".$data["nombre"]."', '".$data["apellido"]."', '".$data["telefono"]."', '".$data["correo"]."', '".$data["comentario"]."');";
	$link = AbrirConexion();
	mysqli_set_charset($link, "utf8");
	if($t = $link->query($query)){
		return true;
	}else {
		die("Error: ". $link->error);
		return array();
	}
}

function envioCorreo($data){
	$para = 'info@fundacionmarkoptic.org.mx';
	$asunto = 'Nuevo Mensaje de Contacto';
	$mensaje = '
		<html>
			<head>
				<title>Nuevo Mensaje de Contacto</title>
			</head>
			<body>
				<h3 style="text-align:center;">Ha recibido un nuevo comentario a través del formulario de contacto</h3>
				<br>
				<h4>Datos del contacto</h4>
				<p>Nombre: '.$data["nombre"].'</p>
				<p>Apellido: '.$data["apellido"].'</p>
				<p>Teléfono: '.$data["telefono"].'</p>
				<p>Correo: '.$data["correo"].'</p>
				<p>Comentario: '.$data["comentario"].'</p>
			</body>
		</html>
	';
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$cabeceras .= 'From: ' . $data["correo"]. "\r\n";
	if (mail($para, $asunto, utf8_decode($mensaje), $cabeceras)) {
		return true;
	}
	else{
		return false;
	}
}

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$comentario = $_POST["comentario"];

$data = array("nombre" => $nombre,
		"apellido" => $apellido,
		"telefono" => $telefono,
		"correo" => $correo,
		"comentario" => $comentario
	);

if (contacto($data)) {
	if (envioCorreo($data)) {
		setcookie("cookieContact", "success", time()+10, '/');  /* expira en 10 seg */
		header('Location: ../');
	}
	else{
		setcookie("cookieContact", "error", time()+10, '/');  /* expira en 10 seg */
		header('Location: ../');
	}
}
else{
	setcookie("cookieContact", "error", time()+10, '/');  /* expira en 10 seg */
	header('Location: ../');
}




?>