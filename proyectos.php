<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Proyectos' order='1'>
</cms:template>
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
                    <div class="panel-heading panel-heading-mark" id="naranja">PROYECTOS</div>
                    <div class="panel-body panel-body-mark">                
  
                    <div class="postit">
                       <a href="img/arm.png" data-lightbox="image-1"><img class="thumb-new" src="img/thumb/thumb-arm.jpg"></a>

                        <h2 class="txt-mark">Prótesis de Miembro superior</h2>
                        <p>Es un dispositivo medico terapéutico, desarrollado para regresar algunos movimientos naturales de la mano, a personas con discapacidad motriz. Todo esto es posible gracias al diseño innovador y tecnológico con el que se creó la Prótesis Robótica, ya que internamente cuenta con motores y un circuito electrónico que hacen diferentes tipos de movimientos, como girar la muñeca  y mover los dedos de manera independiente.<br>
                        Como Fundación ofrecemos este dispositivo a personas de escasos recursos económicos que estén interesados en aumentar sus capacidades físicas y les permita ejercer una vida social y productiva plena, al mismo tiempo brindamos la asistencia necesaria para el uso correcto de dicho dispositivo, mediante el apoyo de un grupo de especialistas del área Psicología, Traumatología y Terapistas.</p>
                </div>
                <hr/>


                    </div>
                </div>     
            </div>

                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script async src="js/lightbox.min.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>
