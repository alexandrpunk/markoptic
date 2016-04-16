<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Quiero donar' order='17'></cms:template>
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
                    <div class="panel-heading panel-heading-mark" id="rosado">HAZ TU DONACIÓN</div>
                    <div class="panel-body panel-body-mark">    
                    <img class="banerd center-block img-responsive" src="img/donar.svg">
                    <p class="text-center" style="margin-top:15px;">Agradecemos tu participación como donador, puedes seleccionar cualquiera de nuestras opciones y formar parte de esta gran causa.</p>
                    <div class="row text-center">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                             <a class="don-a" href="#cheque" data-toggle="modal"><div class="don-btn"  id="verde">
                            <img src="img/cheque.png">
                            <p>Depósito en cheque</p>
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
                            <p>Depósito en efectivo</p>
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
                     <p class="text-center">Una ves hecho tu donativo tienes 2 opciones</p>
                    <center>
                    <a class="btn btn-lg btn-primary" href="historias"><strong>Apadrinar a un solicitante</strong></a>
                    <a class="btn btn-lg btn-success" data-toggle="modal" OnClick="sethistoria('<cms:show k_page_id />')" data-target="#solicitar_email"><strong>Solicitar mi comprobante fiscal</strong></a>
                    </center>
                     <p class="text-center" style="margin-top:15px;">"Unidos todos hacemos más. Tu donación desarrolla tecnología que transforma vidas".</p>
                     
                     
                    </div>
                </div>     
            </div>
                
                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/mmodal.php';?>

<!-- moda de solicitud de email -->
<div class="modal fade" id="solicitar_email" tabindex="-1" role="dialog" aria-labelledby="Correo electronico del padrino">
    <div class="modal-dialog modal-content" role="document">
     <div class="modal-header"><strong>Solicitar Recibo deducible de impuestos</strong></div>
      <div class="modal-body">
        <form id="donar">
           <p class="news" style="margin-top:0;">Para solicitar tu recibo deducible primero debes ingresar tu correo electronico.</p>
            <input onload="focusOnInput()" type="email" name="correo_donador" id="correo_donador" class="form-control" placeholder="Correo Electronico" required  maxlength="255" autofocus>
            <button type="submit" id="donar" class="btn btn-mark" style="margin-top:10px;" name="donar"><strong>Apadrinar esta historia</strong></button>
        </form>       
      </div>
    </div>
</div>
    
<?php require 'mod/scripts.php';?>

<script src="js/donar.js"></script>

</body>
</html>
<?php COUCH::invoke(); ?>
