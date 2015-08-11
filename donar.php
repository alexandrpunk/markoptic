<?php $titulo = "Quiero Donar"; ?>
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
                    <img class="banerd center-block img-responsive" src="img/donar.svg">
                    <p class="text-center" style="margin-top:15px;">Agradecemos tu participación como donar, puedes seleccionar cualquiera de nuestras opciones y formar parte de esta gran causa.</p>
                    <div class="row text-center">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                         <a class="don-a" href="#cheque" data-toggle="modal"><div class="don-btn"  id="verde">
                        <img src="img/cheque.png">
                        <p>Deposito en cheque</p>
                        </div></a>                  
                    </div>
                        
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a class="don-a" href="#transfer" data-toggle="modal"><div class="don-btn"  id="rosado">
                        <img src="img/trasnferencia.png">
                        <p>Transferencia Bancaria</p>
                        </div></a> 
                    </div>
                        
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a class="don-a" href="#efectivo" data-toggle="modal">
                        <div class="don-btn"  id="naranja">
                        <img src="img/deposito.png">
                        <p>Deposito en efectivo</p>
                        </div></a> 
                    </div>
                        
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a class="don-a" href="#paypal" data-toggle="modal">
                        <div class="don-btn"  id="cyan">
                        <img src="img/paypal.png">
                        <p>PayPal</p>
                        </div></a>
                    </div>
                        
                    </div>    
                     <h3 style="margin:20px 5%;" class="text-center decor-donar"><span class="decor-span">¿Deseas tu recibo deducible de impuestos?</span></h3>
                    <center><a class="btn btn-lg btn-success" href="recibo">Tramitalo aqui</a></center>
                     <p class="text-center" style="margin-top:15px;">Unidos todos hacemos mas. Tu donacion desarrolla tecnologia que transforma vidas.</p>
                        
                    <div class="text-center" ><a href="files/aspectoslegales.pdf" target="_blank">Ver Aspectos Legales</a></div>
                    </div>
                </div>     
            </div>
            
            <div class="col-md-3">
                
                <?php require 'mod/lateral.php';?>
                
            </div>
        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/mmodal.php';?>
    
<?php require 'mod/scripts.php';?>
    
</body>
</html>
