<?php

function AbrirConexion() {
	$dbhost = "localhost";
	$dbuser = "gallbo_markoptic";
	$dbpass = "markoptic2015";
    $db = "gallbo_markoptic";
	//$dbuser = "root";
	//$dbpass = "root";
    //$db = "markoptic";
	$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
		if($link->connect_errno) {
			die("Error " . $link->connect_error);
		}
	return $link;
}

function Paises( ) {
	$query = "SELECT id, nombre FROM paises";
	$link = AbrirConexion();
	$paises = array();
	
	if($r = $link->query($query)){
		while($t = $r->fetch_assoc()) {
			$paises[] = $t;
		}		
		$r->free();
		$link->close();
	}else {
		die("Error: ". $link->error);
		return array();
	}
	
	return $paises;
}

function Estados($id_pais) {
	$query = "SELECT id, id_pais, nombre FROM regiones WHERE id_pais = '".$id_pais."'";
	$link = AbrirConexion();
	$estados = array();
	
	if($r = $link->query($query)){
		while($t = $r->fetch_assoc()) {
			$estados[] = $t;
		}		
		$r->free();
		$link->close();
	}else {
		die("Error: ". $link->error);
		return array();
	}
	
	return $estados;
}

function Localidades($id_estado) {
	$query = "SELECT id, id_region, id_pais, nombre FROM localidades WHERE id_region = '".$id_estado."'";
	$link = AbrirConexion();
	$localidades = array();
	
	if($r = $link->query($query)){
		while($t = $r->fetch_assoc()) {
			$localidades[] = $t;
		}		
		$r->free();
		$link->close();
	}else {
		die("Error: ". $link->error);
		return array();
	}
	
	return $localidades;
}

function Solicitud1($ds){
	$query = "INSERT INTO solicitud (peticion, opcion_protesis, porque, medio_difusion) VALUES ('".$ds["peticion"]."', '".$ds["opcion_protesis"]."', '".$ds["porque"]."', '".$ds["medio_difusion"]."');";
	$link = AbrirConexion();
	if($r = $link->query($query)){
		$id_solicitud = $link->insert_id;
		return $id_solicitud;
	}else {
		die("Error: ". $link->error);
		return array();
	}
}

function update_folio($folio, $id_solicitud){
	$query = "UPDATE solicitud SET folio = '".$folio."' WHERE id = '".$id_solicitud."' ";
	$link = AbrirConexion();
	if($s = $link->query($query)){
		return true;
	}else {
		die("Error: ". $link->error);
		return array();
	}
}

function beneficiario($db){
	$query_beneficiario = "INSERT INTO beneficiario_solicitud (nombre, apellido, sexo, fecha_nac, edad, direccion, colonia, cp, ciudad, estado, pais, telefono, email, id_solicitud) 
	VALUES ('".$db["nombre"]."', '".$db["apellido"]."', '".$db["sexo"]."', '".$db["fecha_nac"]."', '".$db["edad"]."', '".$db["direccion"]."', '".$db["colonia"]."', '".$db["cp"]."', '".$db["ciudad"]."', '".$db["estado"]."', '".$db["pais"]."', '".$db["telefono"]."', '".$db["email"]."', '".$db["id_solicitud"]."');";
	$link = AbrirConexion();
	if($t = $link->query($query_beneficiario)){
		$id_beneficiario = $link->insert_id;
		return $id_beneficiario;
	}else {
		die("Error: ". $link->error);
		return array();
	}
}

function tutor($dt){
	$query_tutor = "INSERT INTO tutor_beneficiario (nombre, apellido, sexo, fecha_nac, edad, direccion, colonia, cp, ciudad, estado, pais, telefono, email, parentesco, id_solicitud, id_beneficiario) 
	VALUES ('".$dt["t_nombre"]."', '".$dt["t_apellido"]."', '".$dt["t_sexo"]."', '".$dt["t_fecha_nac"]."', '".$dt["t_edad"]."', '".$dt["t_direccion"]."', '".$dt["t_colonia"]."', '".$dt["t_cp"]."', '".$dt["t_ciudad"]."', '".$dt["t_estado"]."', '".$dt["t_pais"]."', '".$dt["t_telefono"]."', '".$dt["t_email"]."', '".$dt["t_parentesco"]."', '".$dt["id_solicitud"]."', '".$dt["id_beneficiario"]."');";
	$link = AbrirConexion();
	if($t = $link->query($query_tutor)){
		return true;
	}else {
		die("Error: ". $link->error);
		return array();
	}
}

function update_adj($zip_file, $id_solicitud){
	$query = "UPDATE solicitud SET adjunto = '".$zip_file."' WHERE id = '".$id_solicitud."' ";
	$link = AbrirConexion();
	if($s = $link->query($query)){
		return true;
	}else {
		die("Error: ". $link->error);
		return array();
	}
}

function envioEmails($data){
	$para = $data["email"] .', '. $data["t_email"];
	$asunto = 'Solicitud Exitosa';
	$mensaje = '
		<html>
			<head>
				<title>Solicitud Exitosa</title>
			</head>
			<body>
				<h3 style="text-align:center;">Solicitud Exitosa</h3>
				<h4>Tu numero de folio es: '.$data["folio"].'</h4>
				<p>Los datos proporcionados fueron los siguientes:</p>
				<table>
					<tr>
						<td>Solicitud:</td><td>'.$data["peticion"].'</td>
					</tr>
					<tr>
						<td>Opción:</td> <td>'.$data["opcion_protesis"].'</td>
					</tr>
					<tr>
						<td>Porque la necesitas:</td> <td>'.$data["porque"].'</td>
					</tr>
					<tr>
						<td>Medio por el cual supiste de nosotros:</td> <td>'.$data["medio_difusion"].'</td>
					</tr>
				</table>
				<table style="display:inline; margin:20px;">
					<caption><h4>Datos del Beneficiario:</h4></caption>
					<tr>
						<td>Nombre:</td>
						<td>'.$data["nombre"].'</td>
					</tr>
					<tr>
						<td>Apellido:</td>
						<td>'.$data["apellido"].'</td>
					</tr>
					<tr>
						<td>Sexo:</td>
						<td>'.$data["sexo"].'</td>
					</tr>
					<tr>
						<td>Fecha Nacimiento:</td>
						<td>'.$data["fecha_nac"].'</td>
					</tr>
					<tr>
						<td>Edad:</td>
						<td>'.$data["edad"].'</td>
					</tr>
					<tr>
						<td>Dirección:</td>
						<td>'.$data["direccion"].'</td>
					</tr>
					<tr>
						<td>Colonia:</td>
						<td>'.$data["colonia"].'</td>
					</tr>
					<tr>
						<td>Código Postal:</td>
						<td>'.$data["cp"].'</td>
					</tr>
					<tr>
						<td>Ciudad:</td>
						<td>'.$data["ciudad"].'</td>
					</tr>
					<tr>
						<td>Estado:</td>
						<td>'.$data["estado"].'</td>
					</tr>
					<tr>
						<td>País:</td>
						<td>'.$data["pais"].'</td>
					</tr>
					<tr>
						<td>Teléfono:</td>
						<td>'.$data["telefono"].'</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>'.$data["email"].'</td>
					</tr>
				</table>
				<table style="display:inline; margin:20px;">
					<caption><h4>Datos del Tutor:</h4></caption>
					<tr>
						<td>Nombre:</td>
						<td>'.$data["t_nombre"].'</td>
					</tr>
					<tr>
						<td>Apellido:</td>
						<td>'.$data["t_apellido"].'</td>
					</tr>
					<tr>
						<td>Sexo:</td>
						<td>'.$data["t_sexo"].'</td>
					</tr>
					<tr>
						<td>Fecha Nacimiento:</td>
						<td>'.$data["t_fecha_nac"].'</td>
					</tr>
					<tr>
						<td>Edad:</td>
						<td>'.$data["t_edad"].'</td>
					</tr>
					<tr>
						<td>Dirección:</td>
						<td>'.$data["t_direccion"].'</td>
					</tr>
					<tr>
						<td>Colonia:</td>
						<td>'.$data["t_colonia"].'</td>
					</tr>
					<tr>
						<td>Código Postal:</td>
						<td>'.$data["t_cp"].'</td>
					</tr>
					<tr>
						<td>Ciudad:</td>
						<td>'.$data["t_ciudad"].'</td>
					</tr>
					<tr>
						<td>Estado:</td>
						<td>'.$data["t_estado"].'</td>
					</tr>
					<tr>
						<td>País:</td>
						<td>'.$data["t_pais"].'</td>
					</tr>
					<tr>
						<td>Teléfono:</td>
						<td>'.$data["t_telefono"].'</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>'.$data["t_email"].'</td>
					</tr>
					<tr>
						<td>Parentesco:</td>
						<td>'.$data["t_parentesco"].'</td>
					</tr>
				</table>
				<p style="font-size: 18px;">Próximamente nos pondremos en contacto con usted.
				<br>
				Para cualquier duda o aclaración o si desea recibir más información por favor marcar al teléfono (667) 7 15 17 14 o mande un E-mail a info@fundacionmarkoptic.org.mx
				</p>
			</body>
		</html>
	';
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$cabeceras .= 'From: info@fundacionmarkoptic.org.mx' . "\r\n";
	$cabeceras .= 'Cc: info@fundacionmarkoptic.org.mx' . "\r\n";

	if (mail($para, $asunto, utf8_decode($mensaje), $cabeceras)) {
		return true;
	}
	else{
		return false;
	}
}

?>