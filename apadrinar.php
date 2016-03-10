<?php
require 'inc/solicitar.php';
 $title = 'Apadrinar';

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
                    <div class="panel-heading panel-heading-mark" id="militar">Solicitud de Recibo Deducible de Impuestos</div>
                    <div class="panel-body panel-body-mark">    
                        
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="POST" id="solicitud" class="news" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="nombre" data-toggle="tooltip" data-placement="right" title="Nombre completo de la persona o Razón Social a la cual se hará el recibo">Nombre o Razón Social</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required autofocus  maxlength="254" value='<?php echo htmlentities($nombre) ?>'>
                              </div>
                            
                              <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="E-mail al cual se enviara el recibo">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required  maxlength="254" value='<?php echo htmlentities($email) ?>'>
                              </div>
                            
                            <div class="form-group">
                                <label for="direccion" data-toggle="tooltip" data-placement="right" title="Dirección Fiscal de facturación a la cual se hará el recibo">Domicilio Fiscal</label>
                                <textarea id="direccion" name="direccion" class="form-control" placeholder="Ingrese Calle, Número, Colonia, Código postal, Ciudad, Estado y País" required rows="4"><?php echo htmlentities($direccion) ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="rfc" data-toggle="tooltip" data-placement="right" title="Número del Registro Federal de Contribuyentes">R.F.C.</label>
                                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="Registro Federal del Contribuyente" required  maxlength="13" value='<?php echo htmlentities($rfc) ?>'>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 zero">
                                <div class="form-group">
                                <label for="monto" data-toggle="tooltip" data-placement="right" title="Especifique el monto de su donativo en pesos mexicanos, en caso de ser en moneda extranjera especifíquela en el campo de comentarios">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" name="monto" step="any" min="0" class="form-control" id="monto" placeholder="Monto del donativo" required value='<?php echo htmlentities($monto) ?>'>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 zero col-sm-6">
                                <div class="form-group">
                                 
                                 <label for="referencia" data-toggle="tooltip" data-placement="right" title="Numero de referencia del depósito, transferencia bancaria o transferencia por PayPal">No. de Referencia</label>
                                <input type="number" min="0" name="referencia" class="form-control" id="referencia" placeholder="Numero de Referencia" required value='<?php echo htmlentities($referencia) ?>'>
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