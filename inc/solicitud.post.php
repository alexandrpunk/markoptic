<?php

require_once("solicitud.repo.php");

$peticion = $_POST["peticion"];

if ($peticion == "Protesis") {

	$arreglo_op = $_POST['chk'];
	$num = count($arreglo_op);

	for ($n=0; $n < $num ; $n++) { 

		$peticion = $_POST["peticion"];
		$descripcion = $arreglo_op[$n];
		$porque = $_POST["porque"];
		$medio_difusion = $_POST["medio_difusion"];
		$vinculacion = $_POST["vinculacion"];

		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$sexo = $_POST["sexo"];
		$fecha_nac = $_POST["fecha_nac"];
		$edad = $_POST["edad"];
		$pais = $_POST["pais"];
		$estado = $_POST["estado"];
		$ciudad = $_POST["ciudad"];
		$direccion = $_POST["direccion"];
		$colonia = $_POST["colonia"];
		$cp = $_POST["cp"];
		$telefono = $_POST["telefono"];
		$email = $_POST["email"];


		$t_nombre = $_POST["t_nombre"];
		$t_apellido = $_POST["t_apellido"];
		$t_sexo = $_POST["t_sexo"];
		$t_fecha_nac = $_POST["t_fecha_nac"];
		$t_edad = $_POST["t_edad"];
		$t_pais = $_POST["t_pais"];
		$t_estado = $_POST["t_estado"];
		$t_ciudad = $_POST["t_ciudad"];
		$t_direccion = $_POST["t_direccion"];
		$t_colonia = $_POST["t_colonia"];
		$t_cp = $_POST["t_cp"];
		$t_telefono = $_POST["t_telefono"];
		$t_email = $_POST["t_email"];
		$t_parentesco = $_POST["t_parentesco"];

		$ds = array("peticion" => $peticion,
					"descripcion" => $descripcion,
					"porque" => $porque,
					"medio_difusion" => $medio_difusion,
                    "vinculacion" => $vinculacion
					);

		$id_solicitud = Solicitud1($ds);

		$nombre_pais = Pais($pais);
		$nombre_estado = Estado($estado);
		$nombre_ciudad = Localidad($ciudad);

		$t_nombre_pais = TPais($t_pais);
		$t_nombre_estado = TEstado($t_estado);
		$t_nombre_ciudad = TLocalidad($t_ciudad);

		if ($peticion == "Colchon Antiescaras") {
			$link = AbrirConexion();
			$result_folio = $link->query("SELECT * FROM solicitud WHERE (folio LIKE 'CA%') ORDER BY id DESC LIMIT 1");
			$row = $result_folio->fetch_array(MYSQLI_ASSOC);
			$ultimo_folio = $row["folio"];
			$s = explode("-", $ultimo_folio);
			$num_folio = $s[1]+1;
			$folio_numero = str_pad($num_folio, 5, "0", STR_PAD_LEFT);
			$folio = 'CA-'.$folio_numero;
		}
		elseif (($peticion == "Protesis") && ($descripcion == "Superior Izquierda" || $descripcion == "Superior Derecha")) {
			$link = AbrirConexion();
			$result_folio = $link->query("SELECT * FROM solicitud WHERE (folio LIKE 'PS%') ORDER BY id DESC LIMIT 1");
			$row = $result_folio->fetch_array(MYSQLI_ASSOC);
			$ultimo_folio = $row["folio"];
			$s = explode("-", $ultimo_folio);
			$num_folio = $s[1]+1;
			$folio_numero = str_pad($num_folio, 5, "0", STR_PAD_LEFT);
			$folio = 'PS-'.$folio_numero;
		}
		elseif (($peticion == "Protesis") && ($descripcion == "Inferior Derecha" || $descripcion == "Inferior Izquierda")) {
			$link = AbrirConexion();
			$result_folio = $link->query("SELECT * FROM solicitud WHERE (folio LIKE 'PI%') ORDER BY id DESC LIMIT 1");
			$row = $result_folio->fetch_array(MYSQLI_ASSOC);
			$ultimo_folio = $row["folio"];
			$s = explode("-", $ultimo_folio);
			$num_folio = $s[1]+1;
			$folio_numero = str_pad($num_folio, 5, "0", STR_PAD_LEFT);
			$folio = 'PI-'.$folio_numero;
		}

		$db = array("nombre" => $nombre,
					"apellido" => $apellido,
					"sexo" => $sexo,
					"fecha_nac" => $fecha_nac,
					"edad" => $edad,
					"pais" => $pais,
					"estado" => $estado,
					"ciudad" => $ciudad,
					"direccion" => $direccion,
					"colonia" => $colonia,
					"cp" => $cp,
					"telefono" => $telefono,
					"email" => $email,
					"id_solicitud" => $id_solicitud
			);

		$data = array("peticion" => $peticion,
						"descripcion" => $descripcion,
						"porque" => $porque,
						"medio_difusion" => $medio_difusion,
                        "vinculacion" => $vinculacion,
						"nombre" => $nombre,
						"folio" => $folio,
						"apellido" => $apellido,
						"sexo" => $sexo,
						"fecha_nac" => $fecha_nac,
						"edad" => $edad,
						"pais" => $nombre_pais,
						"estado" => $nombre_estado,
						"ciudad" => $nombre_ciudad,
						"direccion" => $direccion,
						"colonia" => $colonia,
						"cp" => $cp,
						"telefono" => $telefono,
						"email" => $email,
						"t_nombre" => $t_nombre,
						"t_apellido" => $t_apellido,
						"t_sexo" => $t_sexo,
						"t_fecha_nac" => $t_fecha_nac,
						"t_edad" => $t_edad,
						"t_pais" => $t_nombre_pais,
						"t_estado" => $t_nombre_estado,
						"t_ciudad" => $t_nombre_ciudad,
						"t_direccion" => $t_direccion,
						"t_colonia" => $t_colonia,
						"t_cp" => $t_cp,
						"t_telefono" => $t_telefono,
						"t_email" => $t_email,
						"t_parentesco" => $t_parentesco
				);

		//3
		if(update_folio($folio,$id_solicitud)){
			$id_beneficiario = beneficiario($db);
			if ($t_nombre != "") {

				$dt = array("t_nombre" => $t_nombre,
							"t_apellido" => $t_apellido,
							"t_sexo" => $t_sexo,
							"t_fecha_nac" => $t_fecha_nac,
							"t_edad" => $t_edad,
							"t_pais" => $t_pais,
							"t_estado" => $t_estado,
							"t_ciudad" => $t_ciudad,
							"t_direccion" => $t_direccion,
							"t_colonia" => $t_colonia,
							"t_cp" => $t_cp,
							"t_telefono" => $t_telefono,
							"t_email" => $t_email,
							"t_parentesco" => $t_parentesco,
							"id_solicitud" => $id_solicitud,
							"id_beneficiario" => $id_beneficiario
						);

				if (tutor($dt)) {

					$targetPath = "../adj-solicitudes/";
					$zip_file = $targetPath . $folio . '.zip';
					move_uploaded_file($folio, $targetPath);
					$zip = new ZipArchive;
					$res = $zip->open($zip_file, ZipArchive::CREATE);
					if (isset($_FILES['adjunto1']['name'])) {
						if (!empty($_FILES['adjunto1']['name'])) {
							$zip->addFile($_FILES['adjunto1']['tmp_name'], $_FILES['adjunto1']['name']);
                            
                            #Se guarda una copia de la primer fotografia subida para la publicacion de la historia automatica
                            $convert = new Imagick($_FILES['adjunto1']['tmp_name']);
                            $convert->setImageFormat('jpeg');
                            $convert->writeImage( '../cms/uploads/image/historias/'.$folio.'.jpg');

						}
					}
					if (isset($_FILES['adjunto2']['name'])) {
						if (!empty($_FILES['adjunto2']['name'])) {
							$zip->addFile($_FILES['adjunto2']['tmp_name'], $_FILES['adjunto2']['name']);
						}
					}
					if (isset($_FILES['adjunto3']['name'])) {
						if (!empty($_FILES['adjunto3']['name'])) {
							$zip->addFile($_FILES['adjunto3']['tmp_name'], $_FILES['adjunto3']['name']);
						}
					}

					$zip->close();
					//if (file_exists($zip_file)) {
				    	if(update_adj($zip_file,$id_solicitud)){
				    		if (envioEmails($data)) {
				    			header('Location: /solicitud-concluida');
				    		}
				    		else{
				    			echo "error 1";
				    		}
				    	}
				    	else{
				    		echo "error 2";
				    	}
					/*}
					else{
						echo "error 3";
					}*/

					
				}
			}
			else{
				$targetPath = "../adj-solicitudes/";
				$zip_file = $targetPath . $folio . '.zip';
				move_uploaded_file($folio, $targetPath);
				$zip = new ZipArchive;
				$res = $zip->open($zip_file, ZipArchive::CREATE);
				if (isset($_FILES['adjunto1']['name'])) {
					if (!empty($_FILES['adjunto1']['name'])) {
						$zip->addFile($_FILES['adjunto1']['tmp_name'], $_FILES['adjunto1']['name']);
                        
                        #Se guarda una copia de la primer fotografia subida para la publicacion de la historia automatica
                        $convert = new Imagick($_FILES['adjunto1']['tmp_name']);
                        $convert->setImageFormat('jpeg');
                        $convert->writeImage( '../cms/uploads/image/historias/'.$folio.'.jpg');

                        
					}
				}
				if (isset($_FILES['adjunto2']['name'])) {
					if (!empty($_FILES['adjunto2']['name'])) {
						$zip->addFile($_FILES['adjunto2']['tmp_name'], $_FILES['adjunto2']['name']);
					}
				}
				if (isset($_FILES['adjunto3']['name'])) {
					if (!empty($_FILES['adjunto3']['name'])) {
						$zip->addFile($_FILES['adjunto3']['tmp_name'], $_FILES['adjunto3']['name']);
					}
				}

				$zip->close();
				//if (file_exists($zip_file)) {
			    	if(update_adj($zip_file,$id_solicitud)){
			    		if (envioEmails($data)) {
			    			header('Location: /solicitud-concluida');
			    		}
			    		else{
			    			echo "error 4";
			    		}
			    	}
			    	else{
			    		echo "error 5";
			    	}
			}
		}

	}
}
else{

	$peticion = $_POST["peticion"];
	$porque = $_POST["porque"];
	$medio_difusion = $_POST["medio_difusion"];
    $vinculacion = $_POST["vinculacion"];

	if ($peticion == "Colchon Antiescaras") {
		$descripcion = "";
	}

	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$sexo = $_POST["sexo"];
	$fecha_nac = $_POST["fecha_nac"];
	$edad = $_POST["edad"];
	$pais = $_POST["pais"];
	$estado = $_POST["estado"];
	$ciudad = $_POST["ciudad"];
	$direccion = $_POST["direccion"];
	$colonia = $_POST["colonia"];
	$cp = $_POST["cp"];
	$telefono = $_POST["telefono"];
	$email = $_POST["email"];


	$t_nombre = $_POST["t_nombre"];
	$t_apellido = $_POST["t_apellido"];
	$t_sexo = $_POST["t_sexo"];
	$t_fecha_nac = $_POST["t_fecha_nac"];
	$t_edad = $_POST["t_edad"];
	$t_pais = $_POST["t_pais"];
	$t_estado = $_POST["t_estado"];
	$t_ciudad = $_POST["t_ciudad"];
	$t_direccion = $_POST["t_direccion"];
	$t_colonia = $_POST["t_colonia"];
	$t_cp = $_POST["t_cp"];
	$t_telefono = $_POST["t_telefono"];
	$t_email = $_POST["t_email"];
	$t_parentesco = $_POST["t_parentesco"];

	$ds = array("peticion" => $peticion,
				"descripcion" => $descripcion,
				"porque" => $porque,
				"medio_difusion" => $medio_difusion,
                "vinculacion" => $vinculacion
				);

		$nombre_pais = Pais($pais);
		$nombre_estado = Estado($estado);
		$nombre_ciudad = Localidad($ciudad);

		$t_nombre_pais = TPais($t_pais);
		$t_nombre_estado = TEstado($t_estado);
		$t_nombre_ciudad = TLocalidad($t_ciudad);

	$id_solicitud = Solicitud1($ds);


	if ($peticion == "Colchon Antiescaras") {
		$link = AbrirConexion();
		$result_folio = $link->query("SELECT * FROM solicitud WHERE (folio LIKE 'CA%') ORDER BY id DESC LIMIT 1");
		$row = $result_folio->fetch_array(MYSQLI_ASSOC);
		$ultimo_folio = $row["folio"];
		$s = explode("-", $ultimo_folio);
		$num_folio = $s[1]+1;
		$folio_numero = str_pad($num_folio, 5, "0", STR_PAD_LEFT);
		$folio = 'CA-'.$folio_numero;
	}
	elseif (($peticion == "Protesis") && ($descripcion == "Superior Izquierda" || $descripcion == "Superior Derecha")) {
		$link = AbrirConexion();
		$result_folio = $link->query("SELECT * FROM solicitud WHERE (folio LIKE 'PS%') ORDER BY id DESC LIMIT 1");
		$row = $result_folio->fetch_array(MYSQLI_ASSOC);
		$ultimo_folio = $row["folio"];
		$s = explode("-", $ultimo_folio);
		$num_folio = $s[1]+1;
		$folio_numero = str_pad($num_folio, 5, "0", STR_PAD_LEFT);
		$folio = 'PS-'.$folio_numero;
	}
	elseif (($peticion == "Protesis") && ($descripcion == "Inferior Derecha" || $descripcion == "Inferior Izquierda")) {
		$link = AbrirConexion();
		$result_folio = $link->query("SELECT * FROM solicitud WHERE (folio LIKE 'PI%') ORDER BY id DESC LIMIT 1");
		$row = $result_folio->fetch_array(MYSQLI_ASSOC);
		$ultimo_folio = $row["folio"];
		$s = explode("-", $ultimo_folio);
		$num_folio = $s[1]+1;
		$folio_numero = str_pad($num_folio, 5, "0", STR_PAD_LEFT);
		$folio = 'PI-'.$folio_numero;
	}


	$db = array("nombre" => $nombre,
				"apellido" => $apellido,
				"sexo" => $sexo,
				"fecha_nac" => $fecha_nac,
				"edad" => $edad,
				"pais" => $pais,
				"estado" => $estado,
				"ciudad" => $ciudad,
				"direccion" => $direccion,
				"colonia" => $colonia,
				"cp" => $cp,
				"telefono" => $telefono,
				"email" => $email,
				"id_solicitud" => $id_solicitud
		);

	$data = array("peticion" => $peticion,
					"descripcion" => $descripcion,
					"porque" => $porque,
					"medio_difusion" => $medio_difusion,
                    "vinculacion" => $vinculacion,
					"nombre" => $nombre,
					"folio" => $folio,
					"apellido" => $apellido,
					"sexo" => $sexo,
					"fecha_nac" => $fecha_nac,
					"edad" => $edad,
					"pais" => $nombre_pais,
					"estado" => $nombre_estado,
					"ciudad" => $nombre_ciudad,
					"direccion" => $direccion,
					"colonia" => $colonia,
					"cp" => $cp,
					"telefono" => $telefono,
					"email" => $email,
					"t_nombre" => $t_nombre,
					"t_pais" => $t_nombre_pais,
					"t_estado" => $t_nombre_estado,
					"t_ciudad" => $t_nombre_ciudad,
					"t_edad" => $t_edad,
					"t_pais" => $t_pais,
					"t_estado" => $t_estado,
					"t_ciudad" => $t_ciudad,
					"t_direccion" => $t_direccion,
					"t_colonia" => $t_colonia,
					"t_cp" => $t_cp,
					"t_telefono" => $t_telefono,
					"t_email" => $t_email,
					"t_parentesco" => $t_parentesco
			);

	//3
	if(update_folio($folio,$id_solicitud)) {
		$id_beneficiario = beneficiario($db);
		if ($t_nombre != "") {

			$dt = array("t_nombre" => $t_nombre,
						"t_apellido" => $t_apellido,
						"t_sexo" => $t_sexo,
						"t_fecha_nac" => $t_fecha_nac,
						"t_edad" => $t_edad,
						"t_pais" => $t_pais,
						"t_estado" => $t_estado,
						"t_ciudad" => $t_ciudad,
						"t_direccion" => $t_direccion,
						"t_colonia" => $t_colonia,
						"t_cp" => $t_cp,
						"t_telefono" => $t_telefono,
						"t_email" => $t_email,
						"t_parentesco" => $t_parentesco,
						"id_solicitud" => $id_solicitud,
						"id_beneficiario" => $id_beneficiario
					);

			if (tutor($dt)) {

				$targetPath = "../adj-solicitudes/";
				$zip_file = $targetPath . $folio . '.zip';
				move_uploaded_file($folio, $targetPath);
				$zip = new ZipArchive;
				$res = $zip->open($zip_file, ZipArchive::CREATE);
				if (isset($_FILES['adjunto1']['name'])) {
					if (!empty($_FILES['adjunto1']['name'])) {
						$zip->addFile($_FILES['adjunto1']['tmp_name'], $_FILES['adjunto1']['name']);
                        
                        #Se guarda una copia de la primer fotografia subida para la publicacion de la historia automatica
                        $convert = new Imagick($_FILES['adjunto1']['tmp_name']);
                        $convert->setImageFormat('jpeg');
                        $convert->writeImage( '../cms/uploads/image/historias/'.$folio.'.jpg');
					}
				}
				if (isset($_FILES['adjunto2']['name'])) {
					if (!empty($_FILES['adjunto2']['name'])) {
						$zip->addFile($_FILES['adjunto2']['tmp_name'], $_FILES['adjunto2']['name']);
					}
				}
				if (isset($_FILES['adjunto3']['name'])) {
					if (!empty($_FILES['adjunto3']['name'])) {
						$zip->addFile($_FILES['adjunto3']['tmp_name'], $_FILES['adjunto3']['name']);
					}
				}

				$zip->close();
				//if (file_exists($zip_file)) {
			    	if(update_adj($zip_file,$id_solicitud)){
			    		if (envioEmails($data)) {
			    			header('Location: /solicitud-concluida');
			    		}
			    		else{
			    			echo "error 1";
			    		}
			    	}
			    	else{
			    		echo "error 2";
			    	}
				/*}
				else{
					echo "error 3";
				}*/

				
			}
		}
		else {
			$targetPath = "../adj-solicitudes/";
			$zip_file = $targetPath . $folio . '.zip';
			move_uploaded_file($folio, $targetPath);
			$zip = new ZipArchive;
			$res = $zip->open($zip_file, ZipArchive::CREATE);
			if (isset($_FILES['adjunto1']['name'])) {
				if (!empty($_FILES['adjunto1']['name'])) {
					$zip->addFile($_FILES['adjunto1']['tmp_name'], $_FILES['adjunto1']['name']);
                    
                        #Se guarda una copia de la primer fotografia subida para la publicacion de la historia automatica
                        $convert = new Imagick($_FILES['adjunto1']['tmp_name']);
                        $convert->setImageFormat('jpeg');
                        $convert->writeImage( '../cms/uploads/image/historias/'.$folio.'.jpg');
				}
			}
			if (isset($_FILES['adjunto2']['name'])) {
				if (!empty($_FILES['adjunto2']['name'])) {
					$zip->addFile($_FILES['adjunto2']['tmp_name'], $_FILES['adjunto2']['name']);
				}
			}
			if (isset($_FILES['adjunto3']['name'])) {
				if (!empty($_FILES['adjunto3']['name'])) {
					$zip->addFile($_FILES['adjunto3']['tmp_name'], $_FILES['adjunto3']['name']);
				}
			}

			$zip->close();
		    	if(update_adj($zip_file,$id_solicitud)) {
		    		if (envioEmails($data)) {
		    			header('Location: /solicitud-concluida');
		    		}
		    		else{
		    			echo "error 4";
		    		}
		    	}
		    	else{
		    		echo "error 5";
		    	}
        }
	}

}




?>
