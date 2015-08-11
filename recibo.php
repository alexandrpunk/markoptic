<?php $titulo = "Solicitud de Recibo deducible de Impuestos"; ?>

<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="militar">Solicitud de recibo deducible de impuestos</div>
                    <div class="panel-body panel-body-mark">    
                        
                        <form action="inc/solicitar"  method="POST" id="solicitud" class="news">
                              <div class="form-group">
                                <label for="nombre" data-toggle="tooltip" data-placement="right" title="Noombre de la personal o Razon Social a la cual se hara el recibo">Nombre o o Razon Social</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" required autofocus  maxlength="254">
                              </div>
                            
                              <div class="form-group">
                                <label for="email" data-toggle="tooltip" data-placement="right" title="Email al cual se enviara el recibo">Correo Electronico</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="correo electronico" required  maxlength="254">
                              </div>
                            
                            <div class="form-group">
                                <label for="direccion" data-toggle="tooltip" data-placement="right" title="Direccion de facturacion a la cual se hara el recibo">Direccion</label>
                                <textarea id="direccion" name="direccion" class="form-control" placeholder="Ingrese su direccion de facturacion" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="rfc" data-toggle="tooltip" data-placement="right" title="Numero del registro federal de Contribuyentes">R.F.C.</label>
                                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="Registro Federal de Contribuyente" required  maxlength="13">
                            </div>
                            
                            <div class="col-md-6 col-sm-6 zero">
                                <div class="form-group">
                                <label for="monto" data-toggle="tooltip" data-placement="right" title="Especifique el monto de su doantivo, en caso de ser en moneda extrabjera especifiquela en el campo de comentarios">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" name="monto" step="any" min="0" class="form-control" id="monto" placeholder="Monto del donativo" required>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 zero col-sm-6">
                                <div class="form-group">
                                 
                                 <label for="referencia" data-toggle="tooltip" data-placement="right" title="Numero de referencia del deposito, transferencia bancaria o transferencia por paypal">No. de Referencia</label>
                                <input type="number" min="0" name="referencia" class="form-control" id="referencia" placeholder="Numero de Referencia" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="comentario" data-toggle="tooltip" data-placement="right" title="Si tiene algun comentario o indicacion especial puede hacerlos en este campo">Comentarios</label>
                                <textarea id="comentario" name="comentario" class="form-control" placeholder="Dejenos algun comentario"></textarea>
                            </div>

                              <button type="submit" id="enviar" class="btn btn-info btn-block" name="enviar">Solicitar</button>
                        </form>

                    </div>
                </div>     
            </div>
            
            <div class="col-md-3">
                
                <?php require 'mod/lateral.php';?>
                
            </div>
        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script src="js/form.js"></script>

    
</body>
</html>
