<?php
$title = 'Apadrinar una historia';

session_start();
include ("inc/db_config.php");

if(DEBUG == "true"){
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);
}

    $errors = '';
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

#revisa si se esta enviando e formulario o si solo se visita la pagina para llenar la informacion
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    #se comprueba si el cpatcha es valido
    if(empty($_SESSION['captcha']) || strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "¡El codigo de verificacion no coincide!\n";
	}    
    
    
    /* CONECTAR CON BASE DE DATOS ****************/
    $con = mysqli_connect(SERVER, USER, PASS, DB);
    mysqli_set_charset ( $con , "utf8");
    if ($con->connect_errno){die("ERROR DE CONEXION CON MYSQL: ".$con->connect_error);}
    
    #se revisa si es un donador existente o si es un donador nuevo
    if(isset($_SESSION['id_donador'])){
    #donador existente
    $metodo = $_POST['metodo'];
    $monto = filter_var($_POST['monto'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $referencia = filter_var($_POST['referencia'], FILTER_SANITIZE_NUMBER_INT);
    $comentario = filter_var($_POST['comentario'], FILTER_SANITIZE_STRING);
        
    #se revisa si se subio algun documento para el comprobante de donativo y se revisa su tamaño
    if (is_uploaded_file($_FILES['doc_comprobante']['tmp_name'])){
        if ($_FILES['doc_comprobante']['size']>2097152){
            $errors .="El archivo es mayor que 2Mb, debes reduzcirlo antes de subirlo\n";
        }
        
        #valida el formato del archivo
        $allowed =  array('gif','png' ,'jpg', 'pdf');
        $filename = $_FILES['doc_comprobante']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed)){
             $errors .="Tu archivo tiene que ser .jpg, .png, .gif o .pdf. Otros archivos no son permitidos\n";
        }
        
        #se genera el nombre del archivo
        $doc_comprobante=date('dmYhis').'-'.$_POST['referencia'].'-'.$_POST['rfc'].'.'.$ext;
        $add='files/comprobantes/'.$doc_comprobante;#es la ruta donde se guardara ela rchivo
        if (empty($errors)){
            if (!move_uploaded_file($_FILES['doc_comprobante']['tmp_name'],$add)){ #se guarda el archivo
               $errors .="Ocurrio un error durante la subida del documento vuelva a intentarlo\n";
            }
        }
    }
    
    #se genera la consulta para guardar el donativo
    $sql = "INSERT INTO Donativos (metodo, monto, referencia, comprobante_donativo, comprobante_fiscal, id_donador, comentario) VALUES ('".$metodo."', '".$monto."', '".$referencia."', '".$doc_comprobante."', '".$comprobante."', '" .$_SESSION['id_donador']."', '".$comentario."');";     
    
    }
    else{
    #donador nuevo
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        
    #se sanitiza y se valida el email
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    }
    else{$errors .="El Email n es valido\n";}
        
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $rfc = filter_var($_POST['rfc'], FILTER_SANITIZE_STRING);
    $metodo = $_POST['metodo'];
    $monto = filter_var($_POST['monto'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $referencia = filter_var($_POST['referencia'], FILTER_SANITIZE_NUMBER_INT);
    $comentario = filter_var($_POST['comentario'], FILTER_SANITIZE_STRING);
    }
        
    if(empty($errors)){
        
        if(!empty($_SESSION['id_donador'])){
            
        #se guarda el donativo
        $con->query($sql) or die("Ocurrio un error al tratar de guardar el donativo: ".$con->error);
        $new_id= $con->insert_id; #se obtiene el id del donativo recien guardado
        
        #se crea la asociacion del donativo con la solicitud del beneficiario
       $con->query("INSERT INTO Apadrinamientos (id_donativo, id_solicitud) VALUES ('".$new_id."', '".$_SESSION['id_solicitud']."');")
            or die("Ocurrio un error al tratar de guardar el apadrinamiento: ".$con->error);
            
        }
         
               
    }

    
#header('Location: ' . $_SERVER['HTTP_REFERER']);
#exit;
}
else{   
        #se revisa  que enlace este correcto
        if(!empty($_GET['padrino']) && !empty($_GET['ahijado'])){
        
        validar_ahijado($_GET['ahijado']);
        $datos =  validar_padrinos($_GET['padrino']);
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $rfc = $datos['rfc'];
        $direccion = $datos['direccion'];
        $telefono = $datos['telefono'];
        $_SESSION ['ahijado'] = $_GET['ahijado'];
        #echo $_SESSION['id_donador'];
    
    }
    elseif(empty($_GET['padrino']) && empty($_GET['ahijado'])){

    }else{
                header('Location:historias');
    }
}

//funcion que valida si existe el donador, si existe rescata su informacion de la base de datos
function validar_padrinos($email_padrino){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error($con));}
    
    $sql = "select * from Donadores where email = '".$email_padrino."';";
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
        echo 'no registrado';
        $con->close();
        return array('existe' => FALSE,'nombre' => '', 'email' => $email_padrino, 'rfc' => '', 'direccion' => '', 'telefono' => '');
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
        //al detectar que el ahijado no esta registrado en el sistema regresa al padrino a la pagina de historias con un mensaje
        $con->close();
        $_SESSION['solicitante_no_valido']='El solicitante que intenta apadrinar no es valido, intente de nuevo';
        header('Location: /historias');   
    }
    
}


;?>



<?php require 'mod/head.php';?>

</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        <div class="row">
            <div class="col-md-9">
                
                
                <?php require 'mod/menu.php';?>
                
                    <?php
                        if(!empty($errors)){
                        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.nl2br($errors).'</strong></div>';
                        }
                    ?>
                    
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="militar">Solicitud de apadrinamiento</div>
                    <div class="panel-body panel-body-mark">  
                     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="POST" id="solicitud" class="news" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nombre" data-toggle="tooltip" data-placement="right" title="Nombre completo de la persona o Razón Social a la cual se hará el recibo">Nombre o Razón Social del padrino</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required autofocus  maxlength="254" value='<?php echo htmlentities($nombre); ?>' <?php if($datos["existe"]){echo 'disabled';}?> >
                            </div>
                            
                            <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="E-mail al cual se enviara el recibo">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required  maxlength="254" value='<?php echo htmlentities($email); ?>' <?php if($datos["existe"]){echo 'disabled';}?>>
                            </div>
                               
                            <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="E-mail al cual se enviara el recibo">Telefono</label>
                                <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Numero telefonico de contacto" required  maxlength="254" value='<?php echo htmlentities($telefono) ?>' <?php if($datos["existe"]){echo 'disabled';}?>>
                            </div>
                            
                            <div class="form-group">
                                <label for="direccion" data-toggle="tooltip" data-placement="right" title="Dirección Fiscal de facturación a la cual se hará el recibo">Domicilio</label>
                                <textarea id="direccion" name="direccion" class="form-control" placeholder="Ingrese Calle, Número, Colonia, Código postal, Ciudad, Estado y País" required rows="4" <?php if($datos["existe"]){echo 'disabled';}?>><?php echo htmlentities($direccion); ?></textarea>
                            </div>
                            
                            <div class="checkbox">
                              <label>
                               <input name="comprobante" id="comprobante" type="checkbox" value="1">
                                     <strong>Selecciones esta casilla si desea un recibo deducible de impuestos</strong>
                              </label>
                            </div>
                            
                            <div class="form-group">
                                <label for="rfc" data-toggle="tooltip" data-placement="right" title="Número del Registro Federal de Contribuyentes">R.F.C.</label>
                                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="Registro Federal del Contribuyente" required  maxlength="13" value='<?php echo htmlentities($rfc); ?>' <?php if($datos["existe"]){echo 'disabled';}?>>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 zero">
                                <div class="form-group">
                                <label for="monto" data-toggle="tooltip" data-placement="right" title="Especifique el monto de su donativo en pesos mexicanos, en caso de ser en moneda extranjera especifíquela en el campo de comentarios">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" name="monto" step="any" min="0" class="form-control" id="monto" placeholder="Monto del donativo" required value='<?php echo htmlentities($monto); ?>'>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 zero col-sm-4">
                                <div class="form-group">
                                 <label for="referencia" data-toggle="tooltip" data-placement="right" title="Numero de referencia del depósito, transferencia bancaria o transferencia por PayPal">No. de Referencia</label>
                                <input type="number" min="0" name="referencia" class="form-control" id="referencia" placeholder="Numero de Referencia" required value='<?php echo htmlentities($referencia) ?>'>
                                </div>
                            </div>
                            
                            <div class="col-md-4 zero col-sm-4">
                                <div class="form-group">
                                <label for="metodo" data-toggle="tooltip" data-placement="right" title="Seleccione el motodo por el cual realizo su donativo">Metodo de pago</label>
                                <select class="form-control" name="metodo" class="form-control" id="metodo" placeholder="Metdo de pago" required value='<?php echo htmlentities($metodo) ?>'>
                                    <option value="1">Deposito</option>
                                    <option value="2">Transferencia bancaria</option>
                                    <option value="3">Paypal</option>
                                </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="comentario" data-toggle="tooltip" data-placement="right" title="Si tiene algún comentario o indicación adicional puede hacerlo en este campo">Comentarios</label>
                                <textarea rows="4" id="comentario" name="comentario" class="form-control" placeholder="Déjanos tu comentario"><?php echo htmlentities($comentario) ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="doc_comprobante" data-toggle="tooltip" data-placement="right" title="Para hacer mas agil la solicitud de su recibo, puede adjuntarnos el comprobante de su deposito escaneado">Comprobante <small>(opcional)</small></label>
                                <input type="file" name="doc_comprobante">
                            </div>
                            
                            <div class="form-group">
                                <label for="captcha" data-toggle="tooltip" data-placement="right" title="Introdusca el codigo de seguridad de letras y numeros que aparecen en la siguiente imagen">Introduzca el codigo de verificacion:</label>
                                <p><img src="inc/captcha_code_file.php?rand=<?php echo rand(); ?>"
id="captchaimg" ></p>
                                <input class="form-control" id="captcha" name="captcha" type="text" style="width:300px;" required autocomplete="off">
                                <small>¿No puedes leer la imagen? Haz click <a href='javascript: refreshCaptcha();'>aqui</a> Para refrescarla</small> <hr/>
                            </div>

                              <button type="submit" id="apadrinar" class="btn btn-lg btn-mark center-block" name="apadrinar"><strong>Apadrinar</strong></button>
                        </form>
                    </div>
                </div>     
            </div>
                
                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script src="js/form.js"></script>
    
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

    
</body>
</html>