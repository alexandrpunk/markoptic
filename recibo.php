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
                    <div class="panel-heading panel-heading-mark" id="rosado">HAZ TU DONACIÓN</div>
                    <div class="panel-body panel-body-mark">    
                        <form>
                              <div class="form-group">
                                <label for="nombre">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre completo">
                              </div>
                            
                              <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <input type="email" class="form-control" id="email" placeholder="correo electronico">
                              </div>
                            
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <textarea id="direccion" class="form-control" placeholder="Ingrese su direccion de facturacion"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="rfc">R.F.C.</label>
                                <input id="rfc" class="form-control" placeholder="Registro Federal de Contribuyente">
                            </div>
                            
                            <div class="col-md-6 col-sm-6 zero">
                                <div class="form-group">
                                <label for="monto">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" class="form-control" id="monto" placeholder="monto">
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 zero col-sm-6">
                                <div class="form-group">
                                 
                                 <label for="referencia">No. de Referencia</label>
                                <input type="number" class="form-control" id="referencia" placeholder="Numero de autorizacion">
                                </div>
                            </div>
                         


                         
                              <button type="submit" class="btn btn-primary">Solicitar</button>
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
    
</body>
</html>
