<?php
require 'inc/solicitar.php';

$title = 'Apadrinar una historia';

require 'mod/head.php';

?>

</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        <div class="row">
            <div class="col-md-9">
                
                
                <?php require 'mod/menu.php';?>
                
                    <?php
                        if(!empty($_SESSION ['errors'])){
                        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.nl2br($_SESSION ['errors']).'</strong></div>';
                        }
                    ?>
                    
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="militar">
                        <a class="pull-left" href="#" onClick="history.go(-1);return true;"><i class="fa fa-chevron-left" aria-hidden="true"></i> regresar
</a>
                        Solicitud de <?php echo $tipo['texto'];?>
                      </div>
                    <div class="panel-body panel-body-mark">
                    
      
                     <?php
                     if(isset($data_hist)){
                        echo '<div class="well sombra" style="margin:0;">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="cms/uploads/image/',$data_hist['foto'].'" data-lightbox="image-1"><img class="img-thumbnail center-block sombra" src="cms/uploads/image/'.$data_hist['thumb'].'"></a>
                            </div>
                            <div class="col-md-9">
                                <label class="txt-mark">Nombre:</label><p><strong>'.$data_hist['nombre'].'</strong></p>
                                <label class="txt-mark">Edad:</label><p>'.$data_hist['edad'].'</p>
                                <label class="txt-mark">Vive en:</label><p>'.$data_hist['ubicacion'].'</p>
                                <label class="txt-mark">Solicito:</label><p class="text-justify"><i>'.$data_hist['solicito'].'</i></p>
                            </div>
                        </div>
                    </div><hr />'; } 
                    ?>
                    
                     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) . '?'.http_build_query($_GET); ?>"  method="POST" id="solicitud" class="news" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nombre" data-toggle="tooltip" data-placement="right" title="Nombre completo de la persona o Razón Social a la cual se hará el recibo">Nombre o Razón Social</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required autofocus  maxlength="254" value='<?php echo htmlentities($nombre); ?>' <?php if($data_donador['existe']){echo 'readonly';}?> >
                            </div>
                            
                            <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="E-mail al cual se enviara el recibo">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required  maxlength="254" value='<?php echo htmlentities($email); ?>' <?php if($data_donador['existe']){echo 'readonly';}?> autocomplete="off">
                            </div>
                               
                            <div class="form-group">
                                <label for="telefono" data-toggle="tooltip" data-placement="right" title="Numero telefonico personal">Telefono</label>
                                <input type="tel" pattern="[\d\.\-\s\+\(\)]{3,}" title='el numero telefonico debe contener 3 numeros minimo y solo puede contener numeros, espacios y los siguientes singos: "+-()."' name="telefono" class="form-control" id="telefono" placeholder="Numero telefonico de contacto" required  maxlength="20" value='<?php echo htmlentities($telefono) ?>' <?php if($existe_donativo){echo 'readonly';}?>>
                            </div>
                            
                            <div class="form-group">
                                <label for="direccion" data-toggle="tooltip" data-placement="right" title="Dirección Fiscal de facturación a la cual se hará el recibo">Domicilio</label>
                                <textarea id="direccion" name="direccion" class="form-control" placeholder="Ingrese Calle, Número, Colonia, Código postal, Ciudad, Estado y País" required rows="4" <?php if($existe_donativo){echo 'readonly';}?>><?php echo htmlentities($direccion); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="rfc" data-toggle="tooltip" data-placement="right" title="Número del Registro Federal de Contribuyentes">R.F.C.</label>
                                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="Registro Federal del Contribuyente" required  maxlength="13" value='<?php echo htmlentities($rfc); ?>' <?php if($existe_donativo){echo 'readonly';}?>>
                            </div>
                            
                            <div class="col-md-4 col-sm-4 zero">
                                <div class="form-group">
                                <label for="monto" data-toggle="tooltip" data-placement="right" title="Especifique el monto de su donativo en pesos mexicanos, en caso de ser en moneda extranjera especifíquela en el campo de comentarios">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" name="monto" step="any" min="0" class="form-control" id="monto" placeholder="Monto del donativo" required value='<?php echo htmlentities($monto); ?>' autocomplete="off">
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 zero col-sm-4">
                                <div class="form-group">
                                 <label for="referencia" data-toggle="tooltip" data-placement="right" title="Numero de referencia del depósito, transferencia bancaria o transferencia por PayPal">Referencia</label>
                                <input type="text" name="referencia" class="form-control" id="referencia" placeholder="Referencia del donativo" maxlength="45"  required value='<?php echo htmlentities($referencia) ?>' autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="col-md-4 zero col-sm-4">
                                <div class="form-group">
                                <label for="metodo" data-toggle="tooltip" data-placement="right" title="Seleccione el motodo por el cual realizo su donativo">Metodo de pago</label>
                                <select class="form-control" name="metodo" class="form-control" id="metodo" placeholder="Metdo de pago" required value='<?php echo htmlentities($metodo) ?>' autocomplete="off">
                                    <option value="1">Deposito</option>
                                    <option value="2">Transferencia bancaria</option>
                                    <option value="3">Paypal</option>
                                </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="comentario" data-toggle="tooltip" data-placement="right" title="Si tiene algún comentario o indicación adicional puede hacerlo en este campo">Comentarios</label>
                                <textarea rows="4" id="comentario" name="comentario" class="form-control" placeholder="Déjanos tu comentario" autocomplete="off"><?php echo htmlentities($comentario) ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="doc_comprobante" data-toggle="tooltip" data-placement="right" title="Para hacer mas agil la solicitud de su recibo, puede adjuntarnos el comprobante de su deposito escaneado">Comprobante <small>(opcional)</small></label>
                                <input type="file" name="doc_comprobante">
                                <small>debe ser una imagen en formato jpg, gif, png o pdf no mayor a 2Mb.</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="captcha" data-toggle="tooltip" data-placement="right" title="Introdusca el codigo de seguridad de letras y numeros que aparecen en la siguiente imagen">Introduzca el codigo de verificacion:</label>
                                <p><img src="inc/captcha_code_file.php?rand=<?php echo rand(); ?>"
id="captchaimg" ></p>
                                <input class="form-control" id="captcha" name="captcha" type="text" style="width:300px;" required autocomplete="off">
                                <small>¿No puedes leer la imagen? Haz click <a href='javascript: refreshCaptcha();'>aqui</a> Para refrescarla</small> <hr/>
                            </div>
                              
                        <?php
                        if($tipo['tipo']){
                            echo '<input name="comprobante" type="hidden" value="1" />';
                        }else{
                            echo '<div class="checkbox">
                              <label>
                              <input name="comprobante" type="hidden" value="0" />
                               <input name="comprobante" id="comprobante" type="checkbox" value="1">
                                     <strong>Seleccione esta casilla si desea un recibo deducible de impuestos</strong>
                              </label>
                            </div>';
                        }
                        ?>                        
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
<?php  if(!$tipo['tipo']){echo '<script src="js/lightbox.min.js"></script>';} ?>

    
</body>
</html>