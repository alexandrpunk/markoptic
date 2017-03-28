<?php

$title = 'Quiero Donar';

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
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="morado">UNETE A NUESTRO EQUIPO DE TRABAJO</div>
                    <div class="panel-body panel-body-mark">
                        <div class="col-md-4">
                            <a class="unete" style="background-color:#63C62F" href="#residencias" data-toggle="modal">
                                <img class="img-responsive" src="img/residencias_w.svg">
                                <p>Residencias</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="unete" style="background-color:#25AAE3;" href="#voluntariado" data-toggle="modal">
                            <img class="img-responsive" src="img/voluntarios_w.svg">
                            <p>Voluntariado</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="unete" style="background-color:#E92A6F;-" href="#trabajo" data-toggle="modal">
                            <img class="img-responsive" src="img/trabajo_w.svg">
                            <p>Bolsa de Trabajo</p>
                            </a>
                        </div>
                    </div>
                </div>     
            </div>
                
                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
    <?php require 'mod/footer.php';?>
    <?php require 'mod/scripts.php';?>
    
<!-- residencias -->
<div class="modal fade" id="residencias" tabindex="-1" role="dialog" aria-labelledby="Mejorar la Calidad de Vida">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-mark modal-verde">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="residencias">Haz tus residencias con nosotros</h4>
      </div>
        <div class="modal-body">
            <img class="img-unete" src="img/residencias.svg">
            <p class="news text-center">
                ¡Únete al equipo! Libera tu servicio social y residencias con nosotros. Envía tus datos a 
                <a href="mailto:residencias@markoptic.mx" target="_blank">residencias@markoptic.mx</a>
            </p>
      </div>
    </div>
  </div>
</div>
    
<!-- voluntariado -->
<div class="modal fade" id="voluntariado" tabindex="-1" role="dialog" aria-labelledby="Mejorar la Calidad de Vida">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-mark modal-cyan">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="residencias">¡Se parte de nuestro programa de voluntarios!</h4>
      </div>
        <div class="modal-body">
            <img class="img-unete" src="img/voluntarios.svg">
            <p class="news text-center">
               Únete a nosotros y participa en nuestras actividades. Comunícate con nosotros al Telefono: <strong>715 21 66</strong> o al correo
                <strong><a href="mailto:info@fundacionmarkoptic.org.mx" target="_blank">info@fundacionmarkoptic.org.mx</a></p></strong>
      </div>
    </div>
  </div>
</div>

<!-- Bolsa de trabajo -->
<div class="modal fade" id="trabajo" tabindex="-1" role="dialog" aria-labelledby="Mejorar la Calidad de Vida">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-mark modal-magenta">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="residencias">Forma parte de nuestro equipo de trabajo</h4>
      </div>
        <div class="modal-body">
            <img class="img-unete" src="img/trabajo.svg">
            <p class="news text-center">
                Te invitamos a formar parte del equipo de trabajo de grupo <strong>Gallbo - Markoptic</strong>, consulta nuestras vacantes en los siguientes enlaces: </p>
                <ul>
                    <li><a href="files/BT_FM.pdf" target="_blank">Bolsa de Trabajo Fundacion Markoptic</a></li>
                    <li><a href="files/BT_Gallbo.pdf" target="_blank">Bolsa de Trabajo Gallbo Recalmacion Estrategica</a></li>
                    <li><a href="files/BT_CIM.pdf" target="_blank">Bolsa de Trabajo Centro de investigacion Markoptic</a></li>
                </ul>
                <p class="news text-center">Haznos llegar tu curriculum y solicitud a la direccion <br><strong><a href="mailto:curriculum@markoptic.mx" target="_blank">curriculum@markoptic.mx</a></p></strong></p>
           
      </div>
    </div>
  </div>
</div>

</body>
</html>
