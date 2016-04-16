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

#revisa si se esta enviando e formulario o si solo se visita la pagina para llenar la informacion
if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    
     #se revisa  que enlace este correcto
    if(!empty($_GET['donador']) && !empty($_GET['ahijado'])){
        
        validar_ahijado($_GET['ahijado']);
        $datos =  validar_donador($_GET['donador']);
        $existe = $datos['existe'];
        $tipo = array('tipo' => 0,'texto' => 'Apadrinamiento');
    
    }
    elseif(!empty($_GET['donador']) && empty($_GET['ahijado'])){
        $datos =  validar_donador($_GET['donador']);
        $existe = $datos['existe'];
        $tipo = array('tipo' => 1,'texto' => 'Recibo deducible de Impuestos');
    }else{
                header('Location:historias');
                exit();
    }

 
    /* CONECTAR CON BASE DE DATOS ****************/
    $con = mysqli_connect(SERVER, USER, PASS, DB);
    mysqli_set_charset ( $con , "utf8");
    if ($con->connect_errno){die("ERROR DE CONEXION CON MYSQL: ".$con->connect_error);}
    
    #se guardan los datos del formulario en las variables correspondientes
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        
    #se sanitiza y se valida el email
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    }else{$_SESSION ['errors'] .="El Email n es valido\n";}
        
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $rfc = filter_var($_POST['rfc'], FILTER_SANITIZE_STRING);
    $comprobante=$_POST['comprobante'];
    $metodo = $_POST['metodo'];
    $monto = filter_var($_POST['monto'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
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
        
        if(!empty($_SESSION['id_donador'])){
        $con->query("INSERT INTO Donativos (metodo, monto, referencia, comprobante_donativo, comprobante_fiscal, id_donador, comentario)
            VALUES ('".$metodo."', '".$monto."', '".$referencia."', '".$doc_comprobante."', ".$comprobante.", '" .$_SESSION['id_donador']."', '".$comentario."');")
            or die("Ocurrio un error al tratar de guardar el donativo: ".$con->error);    
        $new_id= $con->insert_id; #se obtiene el id del donativo recien guardado
        $_SESSION['id_donador']=''; #se vacia la variable global del id del donador
        }else{
        $con->query("INSERT INTO Donadores (nombre, email, telefono, rfc, direccion) VALUES ('".$nombre."', '".$email."', '".$telefono."', '".$rfc."', '".$direccion."');")
            or die("Ocurrio un error al tratar de guardar el donador nuevo: ".$con->error); 
        $new_id= $con->insert_id; #se obtiene el id del donador recien guardado
            
        $con->query("INSERT INTO Donativos (metodo, monto, referencia, comprobante_donativo, comprobante_fiscal, id_donador, comentario)
            VALUES ('".$metodo."', '".$monto."', '".$referencia."', '".$doc_comprobante."', ".$comprobante.", '" .$new_id."', '".$comentario."');")
            or die("Ocurrio un error al tratar de guardar el donativo: ".$con->error);
        $new_id= $con->insert_id; #se obtiene el id del donativo recien guardado
        }
        
        if(!empty($_SESSION['id_solicitud'])){ #se revisa si esta seteado el valor de id para apadrinar a alguien se guarda al relacion de apadrinamiento
        $con->query("INSERT INTO Apadrinamientos (id_donativo, id_solicitud) VALUES ('".$new_id."', '".$_SESSION['id_solicitud']."');");
        $_SESSION['id_solicitud'] = '';  #se vacia la variable global del solicitante que se va a apadrinar
        $new_id= $con->insert_id; #se obtiene el id del apadrinamiento nuevo
        $con->close();
        }
        
        $_SESSION['donativo_valido']=TRUE;
        header('Location: /gracias');   

    }

}
else{   
    
    #se revisa  que enlace este correcto
    if(!empty($_GET['donador']) && !empty($_GET['ahijado'])){
        
        validar_ahijado($_GET['ahijado']);
        $datos =  validar_donador($_GET['donador']);
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $rfc = $datos['rfc'];
        $direccion = $datos['direccion'];
        $telefono = $datos['telefono'];
        $_SESSION ['ahijado'] = $_GET['ahijado'];
        $existe = $datos['existe'];
        $tipo = array('tipo' => 0,'texto' => 'Apadrinamiento');
    
    }
    elseif(!empty($_GET['donador']) && !isset($_GET['ahijado'])){
        $datos =  validar_donador($_GET['donador']);
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $rfc = $datos['rfc'];
        $direccion = $datos['direccion'];
        $telefono = $datos['telefono'];
        $existe = $datos['existe'];
        $tipo = array('tipo' => 1,'texto' => 'Recibo deducible de Impuestos');
        unset($_SESSION ['ahijado']);
    }else{
        header('Location:historias');
        exit();
    }
}

//funcion que valida si existe el donador, si existe rescata su informacion de la base de datos
function validar_donador($email_donador){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error($con));}
    
    $sql = "select * from Donadores where email = '".$email_donador."';";
    $result = $con->query($sql);
    
    if($result->num_rows > 0){
        #echo 'registrado<br>';
        $con->close();
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $email = $row["email"];
        $telefono = $row["telefono"];
        $rfc = $row["rfc"];
        $direccion = $row["direccion"];
        
        #se guarda el id del donador que ya esta registrado para poder usarlo despues
        $_SESSION['id_donador'] = $row["id"];

        #se regresan los datos del donador que ya estaba registrado
        return array('existe' => TRUE,'nombre' => $nombre, 'email' => $email, 'rfc' => $rfc, 'direccion' => $direccion, 'telefono' => $telefono);
        
    }else{
        $_SESSION['id_donador'] = '';
        $con->close();
        return array('existe' => FALSE,'nombre' => '', 'email' => $email_donador, 'rfc' => '', 'direccion' => '', 'telefono' => '');
    }
    
}

#revisa si el benificiario que quiere apadrinar existe
function validar_ahijado($pagina_ahijado){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error());}
    
    $sql = "select id from solicitud where id_page = '".$pagina_ahijado."';";
    $result = $con->query($sql);
    $con->close();
    
    if($result->num_rows > 0){
        #se guarda el id de la solicitud que se va a apadrinar
        $row = $result->fetch_assoc();
        $_SESSION['id_solicitud'] = $row["id"];
        return $existe = TRUE;
        
    }else{
        //al detectar que el ahijado no esta registrado en el sistema regresa al donador a la pagina de historias con un mensaje
        $con->close();
        header('Location: /historias');   
    }
    
}
