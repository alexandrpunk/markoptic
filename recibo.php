<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Solicitar Recibo' order='12'></cms:template>
<?php require 'mod/head.php';?>

</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="militar">Solicitud de Recibo Deducible de Impuestos</div>
                    <div class="panel-body panel-body-mark">    
                        
                        <form action="inc/solicitar"  method="POST" id="solicitud" class="news">
                              <div class="form-group">
                                <label for="nombre" data-toggle="tooltip" data-placement="right" title="Nombre completo de la persona o Razón Social a la cual se hará el recibo">Nombre o Razón Social</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required autofocus  maxlength="254">
                              </div>
                            
                              <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="E-mail al cual se enviara el recibo">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required  maxlength="254">
                              </div>
                            
                            <div class="form-group">
                                <label for="direccion" data-toggle="tooltip" data-placement="right" title="Dirección Fiscal de facturación a la cual se hará el recibo">Domicilio Fiscal</label>
                                <textarea id="direccion" name="direccion" class="form-control" placeholder="Ingrese Calle, Número, Colonia, Código postal, Ciudad, Estado y País" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="rfc" data-toggle="tooltip" data-placement="right" title="Número del Registro Federal de Contribuyentes">R.F.C.</label>
                                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="Registro Federal del Contribuyente" required  maxlength="13">
                            </div>
                            
                            <div class="col-md-6 col-sm-6 zero">
                                <div class="form-group">
                                <label for="monto" data-toggle="tooltip" data-placement="right" title="Especifique el monto de su donativo en pesos mexicanos, en caso de ser en moneda extranjera especifíquela en el campo de comentarios">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" name="monto" step="any" min="0" class="form-control" id="monto" placeholder="Monto del donativo" required>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 zero col-sm-6">
                                <div class="form-group">
                                 
                                 <label for="referencia" data-toggle="tooltip" data-placement="right" title="Numero de referencia del depósito, transferencia bancaria o transferencia por PayPal">No. de Referencia</label>
                                <input type="number" min="0" name="referencia" class="form-control" id="referencia" placeholder="Numero de Referencia" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="comentario" data-toggle="tooltip" data-placement="right" title="Si tiene algún comentario o indicación adicional puede hacerlo en este campo">Comentarios</label>
                                <textarea id="comentario" name="comentario" class="form-control" placeholder="Déjanos tu comentario"></textarea>
                            </div>

                              <button type="submit" id="enviar" class="btn btn-info btn-block" name="enviar">Solicitar</button>
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

    
</body>
</html>
<?php COUCH::invoke(); ?>
