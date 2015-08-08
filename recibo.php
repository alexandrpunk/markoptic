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
                            <div class="col-md-6"></div>
                         
                                <label for="monto">Monto del Donativo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" class="form-control" id="monto" placeholder="monto">
                                </div>
                                 
                                 <label for="autorizacion">No. de Autorizacion</label>
                                <input type="number" class="form-control" id="autorizacion" placeholder="Numero de autorizacion">
                         
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
