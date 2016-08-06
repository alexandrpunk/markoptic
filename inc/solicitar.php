
<?php

session_start();

include ("inc/db_config.php");

    $nombre = '';
    $email = '';
    $telefono= '';
    $direccion = '';
    $comprobante=0;
    $rfc = '';
    $monto = '';
    $referencia = '';
    $metodo = '';
    $comentario = '';
    $doc_comprobante = '';
    $existe = FALSE;
    $tipo = '';
    $_SESSION ['errors']='';
    $existe_donativo=false;
    $correo_fundacion = MAILFUNDACION;

#revisa si se esta enviando e formulario o si solo se visita la pagina para llenar la informacion

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if (isset($_POST['proceso'])){
        
        #este es el registro de los interesados en apadrinar
        include ("db_config.php");
        $data = array('error_message'=> '', 'message'=>'');
        switch ($_POST['proceso']) {
                
            case 1: #aqui se revisa si el interesado ya esta geistrado y se rellenan los campos de forma auomatica
                
                #se sanitiza y se valida el email 
                if(filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL)){
                    $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
                }else{
                    $data['error'] = TRUE;
                    $data['error_message'] .= "el correo es incorrecto\n";  
                    break;
                }
                
                        
                $datos =  validar_donador($email);
                if($datos['existe']){
                    $data['id'] = $datos["id_donador"];
                    $data['nombre'] = $datos["nombre"];
                }

                break;
                
            case 2: #se guarda el nuevo interesado en apadrinar y la relacion

                #se sanitiza y se valida el email
                if(filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL)){
                    $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
                }else{
                    $data['error'] = TRUE;
                    $data['error_message'] .= "el correo es incorrecto\n"; 
                    break;
                }
                
                $datos =  validar_donador($email);
                
                if($datos['existe']){
                    break;
                }else{
                    
                    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);

                    $ahijado = $_POST['page'];
                    $historia = $_POST['historia'];

                    validar_ahijado($ahijado);
                    
                    $data['message'] .= "se va a registrar el interesado\n";  

                    #se registran los datos y la relacion
                    $con = mysqli_connect(SERVER, USER, PASS, DB);
                    mysqli_set_charset ( $con , "utf8");
                    if ($con->connect_errno){
                    $data['error'] = TRUE;
                    $data['error_message'] .= "no se pudo conectar a la base de datos\n"; 
                    break;
                    }
                    
                    if(!$con->query("INSERT INTO Donadores (nombre, email) VALUES ('".$nombre."', '".$email."');")){
                        $data['error'] = TRUE;
                        $data['error_message'] .= "no se pudo insertar el nuevo donador: ".$con->error."\n"; 
                        break;
                    }
                    
                    $data['message'] .= "INSERT INTO Donadores (nombre, email) VALUES ('".$nombre."', '".$email."');\n";  
                    
                    $new_id = $con->insert_id; #se obtiene el id del donador recien guardado
                    $data['message'] .= "id del nuevo donador".$new_id."\n";  
                    
                    if(!$con->query("INSERT INTO Relaciones (id_donador, id_page) VALUES ('".$new_id."', '".$ahijado."');")){
                        $data['error'] = TRUE;
                        $data['error_message'] .= "Ocurrio un error al tratar de guardar la relacion nueva: ".$con->error."\n"; 
                        break;
                    }
                    
                    $data['message'] .= "INSERT INTO Relaciones (id_donador, id_page) VALUES ('".$new_id."', '".$ahijado."');\n";
                    $con ->close();
                }
                #se envian los correos electronicos
                enviar_correo_interes($historia, $nombre, $ahijado, $email);
                break;
                
            case 3: #solo se guarda al relacion en caso de que ya exista el interesado a apadrinar
            
                #se sanitiza y se valida el email
                if(filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL)){
                    $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
                }else{
                    $data['error'] = TRUE;
                    $data['error_message'] .= "el correo es incorrecto\n"; 
                    break;
                }
                
                $datos =  validar_donador($email);
                
                #se registran los datos y la relacion
                    $con = mysqli_connect(SERVER, USER, PASS, DB);
                    mysqli_set_charset ( $con , "utf8");
                    if ($con->connect_errno){
                    $data['error'] = TRUE;
                    $data['error_message'] .= "no se pudo conectar a la base de datos\n"; 
                    break;
                    }
                
                    $ahijado = $_POST['page'];
                    $historia = $_POST['historia'];
                
                    if(!$con->query("INSERT INTO Relaciones (id_donador, id_page) VALUES ('".$datos['id_donador']."', '".$_POST['page']."');")){
                        $data['error'] = TRUE;
                        $data['error_message'] .= "Ocurrio un error al tratar de guardar la relacion nueva: ".$con->error."\n"; 
                        break;
                    }
                    
                    $data['message'] .= "INSERT INTO Relaciones (id_donador, id_page) VALUES ('".$datos['id_donador']."', '".$_POST['page']."');\n";
                    $con ->close();
                #en envian los correos electronicos
                enviar_correo_interes($historia, $datos['nombre'], $ahijado, $email);
                break;               
        }
        exit(json_encode($data));

         
    #fin del proceso de registro de interesado en apadrinar    
    }else{
    #proceso de registro del donador y del apadrinamiento
    #se revisa que enlace este correcto
    if(!empty($_GET['donador']) && !empty($_GET['ahijado'])){
        
        validar_ahijado($_GET['ahijado']);
        $data_donador =  validar_donador($_GET['donador']);
        
        if($data_donador['existe'])
            $existe_donativo=check_donativos($data_donador['id_donador']);
        
        $data_hist = get_historia($_GET['ahijado']);
        $tipo = array('tipo' => 0,'texto' => 'Apadrinamiento');
    
    }
    elseif(!empty($_GET['donador']) && empty($_GET['ahijado'])){
        $data_donador =  validar_donador($_GET['donador']);
        
        if($data_donador['existe'])
            $existe_donativo=check_donativos($data_donador['id_donador']);
        
        $tipo = array('tipo' => 1,'texto' => 'Recibo deducible de Impuestos');
    }else{
                header('Location:historias');
                exit();
    }

    /* CONECTAR CON BASE DE DATOS ****************/
    $con = mysqli_connect(SERVER, USER, PASS, DB);
    if ($con->connect_errno){die("ERROR DE CONEXION CON MYSQL 1: ".$con->connect_error);}
    mysqli_set_charset ( $con , "utf8");
    
    #se guardan los datos del formulario en las variables correspondientes
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        
    #se sanitiza y se valida el email
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    }else{$_SESSION ['errors'] .="El Email n es valido\n";}
    
    #se sanitizn los demas datos
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $rfc = filter_var($_POST['rfc'], FILTER_SANITIZE_STRING);
    $comprobante=$_POST['comprobante'];
    $metodo = $_POST['metodo'];
        if($_POST['monto'] > 0){
            $monto = filter_var($_POST['monto'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        }else{$_SESSION ['errors'] .="El monto no puede ser 0\n";}
    
    $referencia = filter_var($_POST['referencia'], FILTER_SANITIZE_NUMBER_INT);
    $comentario = filter_var($_POST['comentario'], FILTER_SANITIZE_STRING);
        
    #se revisa si se subio algun documento para el comprobante de donativo y se revisa su tamaño
    if (is_uploaded_file($_FILES['doc_comprobante']['tmp_name'])){
        if ($_FILES['doc_comprobante']['size']>2097152){
            $_SESSION ['errors'] .="El archivo es mayor que 2Mb, debes reduzcirlo antes de subirlo\n";
        }
        
        #valida el formato del archivo
        $allowed =  array('gif','png' ,'jpg', 'pdf');
        $filename = $_FILES['doc_comprobante']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed)){
             $_SESSION ['errors'] .="Tu archivo tiene que ser .jpg, .png, .gif o .pdf. Otros archivos no son permitidos\n";
        }
        
        #se genera el nombre final del archivo
        $doc_comprobante=date('dmYhis').'-'.$_POST['referencia'].'-'.$_POST['rfc'].'.'.$ext;
        $add='files/comprobantes/'.$doc_comprobante; #es la ruta donde se guardara el archivo
    }
    
    #se comprueba si el captcha es valido
    if(empty($_SESSION['captcha']) || strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$_SESSION ['errors'] .= "¡El codigo de verificacion no coincide!\n";
	}   
    
 
    if(empty($_SESSION ['errors'])){
        if (is_uploaded_file($_FILES['doc_comprobante']['tmp_name'])){
            move_uploaded_file($_FILES['doc_comprobante']['tmp_name'],$add) or die("Ocurrio un error al tratar de guardar su documento");
        }
        
        if(!$data_donador['existe']){#se valida si el donador existe 
            #si no existe se registra el nuevo donador
            $con->query("INSERT INTO Donadores (nombre, email, telefono, rfc, direccion) VALUES ('".$nombre."', '".$email."', '".$telefono."', '".$rfc."', '".$direccion."');")
                or die("Ocurrio un error al tratar de guardar el donador nuevo: ".$con->error); 
            $id_donador= $con->insert_id; #se obtiene el id del donador recien guardado

        }else{
            if(!$existe_donativo){#si el donador ya esta registrado pero no tiene algun donativo previo se actualizan los datos faltantes y se registra el donativo
                $con->query("UPDATE Donadores SET telefono= '".$telefono."', rfc= '".$rfc."', direccion= '".$direccion."' WHERE id=".$data_donador['id_donador'].";")or die("Ocurrio un error al tratar de actualizar los datos del donador: ".$con->error);
            }
             $id_donador=$data_donador['id_donador'];
        }
        
        $con->query("INSERT INTO Donativos (metodo, monto, referencia, comprobante_donativo, comprobante_fiscal, id_donador, comentario)
        VALUES ('".$metodo."', '".$monto."', '".$referencia."', '".$doc_comprobante."', ".$comprobante.", '" .$id_donador."', '".$comentario."');")
            or die("Ocurrio un error al tratar de guardar el donativo: ".$con->error);    
        $id_donativo= $con->insert_id; #se obtiene el id del donativo recien guardado
        
        #se revisa el tipo de dondatio, si el tipo es 1 (true en el if) es una donativo, si es un 0 (false) es una apadrinamineto
        if(!$tipo['tipo']){
        $con->query("INSERT INTO Apadrinamientos (id_donativo, id_solicitud) VALUES ('".$id_donativo."', '".$_SESSION['id_solicitud']."');")
            or die("Ocurrio un error al tratar de guardar el apadrinamiento: ".$con->error);
        $_SESSION['id_solicitud'] = '';  #se vacia la variable global de la solcitud que se va a apadrinar
        }
        
        if($comprobante){
            $comp = '<p><strong>solicito recibo deducible de impuestos: </strong></p>';
        }else{
            $comp = '<p><strong>No solicito recibo deducible de impuestos: </strong></p>';
        }
        
        if(!$tipo['tipo']){#se genera el correo  enviar en caso de ser apadrinamiento

            $titulo = 'Fundacion Markoptic - Has apadrinado a: '.$data_hist['nombre'];
            $titulo_b = 'Se acaba de recibir una solicitud de apadrinamiento';
            $titulo = "=?UTF-8?B?".base64_encode($titulo)."=?=";
            $titulo_b = "=?UTF-8?B?".base64_encode($titulo_b)."=?=";
            
            // Cuerpo o mensaje
            $mensaje = '
                <html>
                <head>
                <title>Gracias por su D onativo</title>
                <style>
                body{
                    text-align: center;
                    font-family: sans-serif;
                }
                .logo {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }

                h1 {
                    margin-left: 40px;
                } 
                </style>
                </head>
                <body>

                <img class="logo" src="data:image/png;base64,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"/>

                <h1>¡MUCHAS GRACIAS POR TU DONATIVO!</h1>
                    <p><strong>Estimado(a) '.$nombre.'</strong></p>
                    <p>Felicidades, tu apoyo ayudará a mejorar la calidad de vida de '.$data_hist['nombre'].',</p>
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/historias.php?p='.$data_hist['id_page'].'" target="_blank">Lee su historia de nuevo</a>
                    <p>ahora usted es parte de la Conciencia Social,</p>
                    <p>le agradecemos su confianza.</p>
                <h3>¡Bienvenido al Club &quot;Dar Para Donar&quot;!</h3>
                <img class="logo" src="data:image/png;base64,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"/>
                </body>
                </html>
                ';
            if (isset($doc_comprobante)) {
                $info='
                    <html>
                    <head>
                    <title>Se acaba de recibir una solicitud de apadrinamiento</title>
                    </head>
                    <body>
                    <h1>Se recibio un donativo</h1>
                    <p>Los datos del donante son los siguientes</p>
                    <p><strong>Nombre: </strong>'.$nombre.'</p>
                    <p><strong>email: </strong>'.$email.'</p>
                    <p><strong>direccion: </strong>'.$direccion.'</p>
                    <p><strong>rfc: </strong>'.$rfc.'</p>
                    <p><strong>Monto del Donativo: </strong>$'.$monto.'</p>
                    <p><strong>-Codigo Referencia: </strong>'.$referencia.'</p>
                    <p><strong>Comentario: </strong>'.$comentario.'</p>'.$comp.'
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/files/comprobantes/'.$doc_comprobante.'" target="_blank">Comprobante</a>
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/historias.php?p='.$data_hist['id_page'].'" target="_blank"><p><strong>Se a apadrino a:'.$data_hist['nombre'].'</strong></p></a>
                    </body>
                    </html>';
            }else{
                    $info='
                    <html>
                    <head>
                   <title>Se acaba de recibir una solicitud de apadrinamiento</title>
                    </head>
                    <body>
                    <h1>Se recibio un donativo</h1>
                    <p>Los datos del donante son los siguientes</p>
                    <p><strong>Nombre: </strong>'.$nombre.'</p>
                    <p><strong>email: </strong>'.$email.'</p>
                    <p><strong>direccion: </strong>'.$direccion.'</p>
                    <p><strong>rfc: </strong>'.$rfc.'</p>
                    <p><strong>Monto del Donativo: </strong>$'.$monto.'</p>
                    <p><strong>Codigo Referencia: </strong>'.$referencia.'</p>
                    <p><strong>Comentario: </strong>'.$comentario.'</p>'.$comp.'
                    <p><strong>No se agrego ningun comprobante</strong></p>
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/historias.php?p='.$data_hist['id_page'].'" target="_blank"><p><strong>Se a apadrino a: '.$data_hist['nombre'].'</strong></p></a>
                    </body>
                    </html>';
            }
            
        }
        else{#en caso de solo ser una solicitud de recibo se envian los datos al correo
            $titulo = 'Fundacion Markoptic - Gracias por tu Donativo';
            $titulo_b = 'Se acaba de recibir una solicitud de recibo por un donativo';
            $titulo = "=?UTF-8?B?".base64_encode($titulo)."=?=";
            $titulo_b = "=?UTF-8?B?".base64_encode($titulo_b)."=?=";
                 // Cuerpo o mensaje
            $mensaje = '
                <html>
                <head>
                <title>Gracias por su Donativo</title>
                <style>
                body{
                    text-align: center;
                    font-family: sans-serif;
                }
                .logo {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }

                h1 {
                    margin-left: 40px;
                } 
                </style>
                </head>
                <body>

                <img class="logo" src="data:image/png;base64,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"/>

                <h1>¡MUCHAS GRACIAS POR TU DONATIVO!</h1>
                    <p><strong>Estimado(a) '.$nombre.'</strong></p>
                    <p>Felicidades, su apoyo favorece a las personas con alguna discapacidad motriz,</p>
                    <p>ahora usted es parte de la Conciencia Social,</p>
                    <p>le agradecemos su confianza.</p>
                <h3>Bienvenido al Club &quot;Dar Para Donar&quot;.</h3>
                <img class="logo" src="data:image/png;base64,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"/>
                </body>
                </html>';
            
            if (isset($doc_comprobante)) {
                $info='
                    <html>
                    <head>
                    <title>Se acaba de recibir un donativo</title>
                    </head>
                    <body>
                    <h1>Se recibio un donativo</h1>
                    <p>Los datos del donante son los siguientes</p>
                    <p><strong>Nombre: </strong>'.$nombre.'</p>
                    <p><strong>email: </strong>'.$email.'</p>
                    <p><strong>direccion: </strong>'.$direccion.'</p>
                    <p><strong>rfc: </strong>'.$rfc.'</p>
                    <p><strong>Monto del Donativo: </strong>$'.$monto.'</p>
                    <p><strong>-Codigo Referencia: </strong>'.$referencia.'</p>
                    <p><strong>Comentario: </strong>'.$comentario.'</p>
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/files/comprobantes/'.$doc_comprobante.'" target="_blank">Comprobante</a>
                    </body>
                    </html>';
            }else{
                    $info='
                    <html>
                    <head>
                    <title>Se acaba de recibir un donativo</title>
                    </head>
                    <body>
                    <h1>Se recibio un donativo</h1>
                    <p>Los datos del donante son los siguientes</p>
                    <p><strong>Nombre: </strong>'.$nombre.'</p>
                    <p><strong>email: </strong>'.$email.'</p>
                    <p><strong>direccion: </strong>'.$direccion.'</p>
                    <p><strong>rfc: </strong>'.$rfc.'</p>
                    <p><strong>Monto del Donativo: </strong>$'.$monto.'</p>
                    <p><strong>Codigo Referencia: </strong>'.$referencia.'</p>
                    <p><strong>Comentario: </strong>'.$comentario.'</p>
                    <p><strong>No se agrego ningun comprobante</strong></p>
                    </body>
                    </html>';
            }

            
        }
        
                    #se envia el correo electronico al donador y al coreo de informacion de la fundacion con los datos
                    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                    $cabeceras .= 'From: Donativo Fundacion Markoptic <donativo@fundacionmarkoptic.org.mx>' . "\r\n";
                    $cabeceras .= 'X-Mailer: PHP/'.phpversion(). "\r\n";

                    // enviamos el correo!
                    mail($email, $titulo, $mensaje, $cabeceras);
                    mail(MAILFUNDACION, $titulo_b, $info, $cabeceras);

        
        $_SESSION['donativo_valido']=TRUE;
        header('Location: /gracias');   

    }

    }
}
#######################
##### seccion GET #####
#######################
else{ #se formatea el formulario a ser llenado y se recupera la informacion pertinenete en caso de estar disponible   
    
    #se revisa  que enlace este correcto
    if(!empty($_GET['donador']) && !empty($_GET['ahijado'])){
                
        validar_ahijado($_GET['ahijado']);
        $data_donador =  validar_donador($_GET['donador']);
        
        if($data_donador['existe'])
            $existe_donativo=check_donativos($data_donador['id_donador']);

        
        if($data_donador['existe']){        
            $nombre = $data_donador['nombre'];
            $email = $data_donador['email'];
            $rfc = $data_donador['rfc'];
            $direccion = $data_donador['direccion'];
            $telefono = $data_donador['telefono'];    
        }
        $data_hist = get_historia($_GET['ahijado']);
        $tipo = array('tipo' => 0,'texto' => 'Apadrinamiento');
            
    }
    elseif(!empty($_GET['donador']) && !isset($_GET['ahijado'])){
        $data_donador =  validar_donador($_GET['donador']);
        
        if($data_donador['existe'])
            $existe_donativo=check_donativos($data_donador['id_donador']);

        if($data_donador['existe']){        
            $nombre = $data_donador['nombre'];
            $email = $data_donador['email'];
            $rfc = $data_donador['rfc'];
            $direccion = $data_donador['direccion'];
            $telefono = $data_donador['telefono'];    
        }else{
            $email = $_GET['donador'];
        }
        
        $tipo = array('tipo' => 1,'texto' => 'Recibo deducible de Impuestos');
    }else{
        header('Location:historias');
        exit();
    }

}

###################
##### METODOS #####
################### 
//funcion que valida si existe el donador, si existe rescata su informacion de la base de datos
function validar_donador($email_donador){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL4:". mysql_error($con));}
    
    $sql = "select * from Donadores where email = '".$email_donador."';";
    $result = $con->query($sql);
    
    if($result->num_rows > 0){
        $con->close();
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $email = $row["email"];
        $telefono = $row["telefono"];
        $rfc = $row["rfc"];
        $direccion = $row["direccion"];
        
        #se regresan los datos del donador que ya estaba registrado
        return array('existe' => TRUE, 'id_donador' => $row["id"],'nombre' => $nombre, 'email' => $email, 'rfc' => $rfc, 'direccion' => $direccion, 'telefono' => $telefono);
        
    }else{
        $con->close();
        return array('existe' => FALSE);
        #return array('existe' => FALSE,'nombre' => '', 'email' => $email_donador, 'rfc' => '', 'direccion' => '', 'telefono' => '');
    }
    
}

function get_historia($page_id){
    
        $con = mysqli_connect(SERVER, USER, PASS, DB2);
        mysqli_set_charset ( $con , "utf8");

        if (!$con){die("ERROR DE CONEXION CON MYSQL3:". mysql_error());}

        $result = $con->query("select * from cmscouch_pages where id = ".$page_id.";");
        $row = $result->fetch_assoc();
        $id_page = $row['id'];
        $nombre_ahijado = $row['page_title'];
        $result->free();

        $result = $con->query("select * from cmscouch_data_text where page_id = ".$page_id.";");

        while($data = $result->fetch_assoc()){
            $row[] = $data;
        }

        $edad = $row[0]['value'];#edad

        $foto = $row[2]['value'];#foto
        $foto = substr($foto, 1);

        $thumb = $row[3]['value'];#thumb 
        $thumb = substr($thumb, 1);

        $solicito = $row[4]['value'];#que solicito
        $ubicacion = $row[5]['value'].", ".$row[6]['value'].", ".$row[7]['value'];
        $result->free();
        $con->close();
    
        return array('id_page' => $id_page,'nombre' => $nombre_ahijado,'edad' => $edad, 'foto' => $foto, 'thumb' => $thumb, 'solicito' => $solicito, 'ubicacion' => $ubicacion);
    
}

#revisa si el benificiario que quiere apadrinar existe
function validar_ahijado($page_id){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL5:". mysql_error());}
    
    $sql = "select id from solicitud where id_page = '".$page_id."';";
    $result = $con->query($sql);
    $con->close();
    
    if($result->num_rows > 0){
        #se guarda el id de la solicitud que se va a apadrinar
        $row = $result->fetch_assoc();
        $_SESSION['id_solicitud'] = $row["id"];
    }else{
        //al detectar que el ahijado no esta registrado en el sistema regresa al donador a la pagina de historias con un mensaje
        $con->close();
        header('Location: /historias');   
    }
    
}

#revisa si el donador ya tiene algun donativo registrado
function check_donativos($id_donador){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL5:". mysql_error());}
    
    $sql = "select id from Donativos where id_donador = '".$id_donador."';";
    $result = $con->query($sql);
    $con->close();
    
    if($result->num_rows > 0){
        $result->free();
        return true;
    }else{
        $result->free();
        return false;
    }
    
}

function enviar_correo_interes($historia, $nombre, $ahijado, $email){
    #se envia el correo electronico con la informacion al interesado
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $cabeceras .= 'From: Donativo Fundacion Markoptic <donativo@fundacionmarkoptic.org.mx>' . "\r\n";
    $cabeceras .= 'X-Mailer: PHP/'.phpversion(). "\r\n";

    #cuerpo del mensaje
    $titulo="Gracias por su interes en apadrinar a: ".$historia;
    $titulo = "=?UTF-8?B?".base64_encode($titulo)."=?=";
    $link="http://".$_SERVER['HTTP_HOST']."/donativo?ahijado=".$ahijado."&donador=".$email;
    $mensaje='
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Gracias por su interes en apadrinar a: '.$historia.'</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="margin: 0; padding: 0; font-family:Tahoma, Geneva, sans-serif;color:#454545;background:#fff;">
    <table align="center" cellpadding="0" cellspacing="0" style="max-width:600px; border-top:10px solid #31a463;">
    <tr>
        <td><h2 style="margin:10px;text-align:center; font-size:1.35em;">Gracias por su interes en apadrinar a: '.$historia.'</h2></td>
        <td>
            <a href="http://www.fundacionmarkoptic.org.mx" target="_blank"><img style="margin:10px 0;" src="data:image/png;base64,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"></a>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" colspan="2">
            <h3 style="margin:10px;color:#31a463;">¿Qué debo hacer para apadrinar esta historia?</h3>
            <p style="font-size:0.95em;">
            Tu donativo puede ayudar a mejorar una vida, si quieres apadrinar esta historia primero debes realizar un donativo mediante alguna de las tres formas que te mencionamos a continuacion.
            </p>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr align="center" valign="middle">
                        <td style="background:#63c62f;color:#fff;width:33%;border:solid 1px #54a729;">
                            <h4 style="margin:5px;">Depósito</h4>
                        </td>
                        <td style="background:#F05B6F;color:#fff;width:33%;border:solid 1px #d44d60;">
                            <h4 style="margin:5px;">Transferencia Electrónica</h4>
                        </td>
                        <td style="background:#25AAE3;color:#fff;width:33%;border:solid 1px #208dbc;">
                            <h4 style="margin:5px;">Paypal</h4>
                        </td>
                    </tr>
                    <tr align="center" valign="top" style="font-size:0.95em;">
                        <td style="padding:8px;width:33%;background:#f5f5f5;border:solid 1px #dedede; border-top:none;">
                            <p>Puedes hacer tu donativo mediante depósito en efectivo o cheque en nuestra cuenta bancaria (las donaciones en efectivo solo serán recibidas mediante depósito bancario):</p>
                                <p><b>Banco:</b></p>
                                Banco Bajio
                                <p><b>Nombre:</b></p>
                                Fundación Markoptic A.C.
                                <p><b>Cuenta:</b></p>
                                0155513280201
                        </td>
                        <td style="padding:8px;width:34%;background:#eaeaea;border-bottom:solid 1px #dedede; border-top:none;">
                            <p>Si deseas hacer tu donativo mediante Transferencia Electrónica Bancaria los datos son los siguientes.</p>
                                    <p><b>Banco:</b></p>
                                    Banco Bajio
                                    <p><b>Nombre:</b></p>
                                    Fundación Markoptic A.C.
                                    <p><b>CLABE:</b></p>
                                    030730900007328992
                        </td>
                        <td style="padding:8px;width:33%;background:#f5f5f5;border:solid 1px #dedede; border-top:none;">
                            <p>También puedes hacer tu donativo a través de Paypal, solo debe hacer clic en el siguiente enlace.</p>
                            <a style="padding:5px;margin:10%;display:block;background:#25AAE3;color:#fff;text-decoration:none;font-weight:bold;border-radius:3px;font-size:0.9em" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YDDHME7ZN8YRL">Donar con Paypal</a>
                        </td>
                    </tr>
                </table>

            <h3 style="margin:10px;color:#31a463;">Ya hice mi donativo, ¿qué hago ahora?</h3>

            <p>Una vez hecho el donativo solo haz click en el siguiente enlace para llenar el formulario de apadrinamiento, además podrás solicitar un recibo deducible de impuestos en caso de necesitarlo.</p>
            <a href="'.$link.'" target="_blank" style="padding:5px;margin:10px;display:block;width:35%;background:#2db1a1;color:#fff;text-decoration:none;font-weight:bold;border-radius:5px;font-size:0.95em">Registrar mi donativo de apadrinamiento</a>
        </td>
    </tr>
    <tr align="center" valign="middle" style="background:#31a463; color:#fff; font-family:sans-serif; font-weight:bolder;">
        <td colspan="2"><a style="margin:5px;display:block;color:#fff;text-decoration:none;" href="http://'.$_SERVER['HTTP_HOST'].'target="_blank">Fundación Markoptic A.C.</a></td>
    </tr>

    </table>
    </body>
    </html>';
    
    // enviamos el correo al interesado!
    mail($email,$titulo,$mensaje,$cabeceras);
    
    #se genera el correo a enviar a la fundacion con los datos del interesado

    $titulo= 'Se aregistrado a: '.$nombre.' como interesado en apadrinar una historia';
    $titulo = "=?UTF-8?B?".base64_encode($titulo)."=?=";
    $link="http://".$_SERVER['HTTP_HOST']."/historias?p=".$ahijado;
    $mensaje='
    <html>
    <head>
    <title>Se aregistrado a: '.$nombre.' como interesado en apadrinar una historia</title>
    </head>
    <body>
    <h1>Se registro un nuevo interesado en donar</h1>
    <p>Los datos del interesado son los siguientes</p>
    <p><strong>Nombre: </strong>'.$nombre.'</p>
    <p><strong>email: </strong>'.$email.'</p>
    <br>
    <h2>Esta interesado en apadrinar a:</h2>
    <p><strong>Nombre:</strong> <a href="'.$link.'" target="_blank">'.$historia.'</a></p>
    </body>
    </html>';

    //envamos la informacion del interesado a la fundacion
    mail(MAILFUNDACION,$titulo,$mensaje,$cabeceras);    
}