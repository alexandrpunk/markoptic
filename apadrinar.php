<?php
require 'inc/solicitar.php';
$title = 'Apadrinar';
$telefono='';

if(isset($_GET['ahijado']) && isset($_GET['padrino']) && $_GET['padrino']!= NULL &&  $_GET['ahijado']!= NULL){
        
        validar_ahijado($_GET['ahijado']);
        validar_padrinos($_GET['padrino']);
    }
    else{
        header('Location:historias');
    }


//revisa si el padrino ya esta registrado
function validar_padrinos($email_padrino){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error());}
    
    $sql = "select * from Padrinos where email = '".$email_padrino."';";
    $result = $con->query($sql);
    
    if($result->num_rows > 0){
        echo 'registrado<br>';
        $con->close();
        print_r ($result);
        // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["email"]. "<br>";
    }
        return $existe = TRUE;
        
    }else{
        echo 'no registrado';
        $con->close();
        return $existe = FALSE;
    }
    
}

function validar_ahijado($pagina_ahijado){
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error());}
    
    $sql = "select id_page from solicitud where id_page = '".$pagina_ahijado."';";
    $result = $con->query($sql);
    
    if($result->num_rows > 0){
        echo 'ahijado valido<br>';
        $con->close();
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
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required autofocus  maxlength="254" value='<?php echo htmlentities($nombre) ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="E-mail al cual se enviara el recibo">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required  maxlength="254" value='<?php echo htmlentities($_GET['padrino']) ?>'>
                            </div>
                               
                            <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="E-mail al cual se enviara el recibo">Telefono</label>
                                <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Numero telefonico de contacto" required  maxlength="254" value='<?php echo htmlentities($telefono) ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="direccion" data-toggle="tooltip" data-placement="right" title="Dirección Fiscal de facturación a la cual se hará el recibo">Domicilio</label>
                                <textarea id="direccion" name="direccion" class="form-control" placeholder="Ingrese Calle, Número, Colonia, Código postal, Ciudad, Estado y País" required rows="4"><?php echo htmlentities($direccion) ?></textarea>
                            </div>
                            
                            <div class="checkbox">
                              <label>
                               <input name="comprobante" id="comprobante" type="checkbox" value="1">
                                     <strong>Selecciones esta casilla si desea un recibo deducible de impuestos</strong>
                              </label>
                            </div>
                            
                            <div class="form-group">
                                <label for="rfc" data-toggle="tooltip" data-placement="right" title="Número del Registro Federal de Contribuyentes">R.F.C.</label>
                                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="Registro Federal del Contribuyente" required  maxlength="13" value='<?php echo htmlentities($rfc) ?>'>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 zero">
                                <div class="form-group">
                                <label for="monto" data-toggle="tooltip" data-placement="right" title="Especifique el monto de su donativo en pesos mexicanos, en caso de ser en moneda extranjera especifíquela en el campo de comentarios">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" name="monto" step="any" min="0" class="form-control" id="monto" placeholder="Monto del donativo" required value='<?php echo htmlentities($monto) ?>'>
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
                                <label for="referencia" data-toggle="tooltip" data-placement="right" title="Seleccione el motodo por el cual realizo su donativo">Metodo de pago</label>
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
                                <label for="comprobante" data-toggle="tooltip" data-placement="right" title="Para hacer mas agil la solicitud de su recibo, puede adjuntarnos el comprobante de su deposito escaneado">Comprobante <small>(opcional)</small></label>
                                <input type="file" name="comprobante">
                            </div>
                            
                            <div class="form-group">
                                <label for="captcha" data-toggle="tooltip" data-placement="right" title="Introdusca el codigo de seguridad de letras y numeros que aparecen en la siguiente imagen">Introduzca el codigo de verificacion:</label>
                                <p><img src="inc/captcha_code_file.php?rand=<?php echo rand(); ?>"
id="captchaimg" ></p>
                                <input class="form-control" id="captcha" name="captcha" type="text" style="width:300px;" required autocomplete="off">
                                <small>¿No puedes leer la imagen? Haz click <a href='javascript: refreshCaptcha();'>aqui</a> Para refrescarla</small> <hr/>
                            </div>

                              <button type="submit" id="enviar" class="btn btn-lg btn-mark center-block" name="enviar"><strong>Solicitar Recibo</strong></button>
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