<?php $titulo = "publicacion"; ?>
<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-body panel-body-mark">                
                         
                        <h1 class="txt-mark oswald">Titulo de la publicacion</h1>
                        <p><small><strong>publicado por: juan perez, el: 21/10/2015.</strong></small></p>
                        
                        <hr />
                        <p class="text-justify"><img class="pull-left thumbnail note-img" src="http://placehold.it/220x230">Es un dispositivo medico terapéutico, desarrollado para regresar algunos movimientos naturales de la mano, a personas con discapacidad motriz. Todo esto es posible gracias al diseño innovador y tecnológico con el que se creó la Prótesis Robótica, ya que internamente cuenta con motores y un circuito electrónico que hacen diferentes tipos de movimientos, como girar la muñeca  y mover los dedos de manera independiente.
                        Como Fundación ofrecemos este dispositivo a personas de escasos recursos económicos que estén interesados en aumentar sus capacidades físicas y les permita ejercer una vida social y productiva plena, al mismo tiempo brindamos la asistencia necesaria para el uso correcto de dicho dispositivo, mediante el apoyo de un grupo de especialistas del área Psicología, Traumatología y Terapistas.</p>
<p class="oswald"><small><strong>Compartenos: </strong></small><i id="share"></i></p>

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
    
<script src="js/lightbox.min.js"></script>
<script src="js/jssocials.min.js"></script>
        <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: "inside",
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest"]
        });
    </script>
    
</body>
</html>
