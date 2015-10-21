<?php $titulo = "Solicitud Concluida"; ?>
<?php require 'mod/head.php';?>


<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">Solicitud Concluida</div>
                    <div class="panel-body panel-body-mark">
                    <img class="img-responsive" src="img/solicitud-concluida.svg">
                    <h4 style="text-align: justify;">
                        Le agradecemos la confianza depositada en Fundación Markoptic A.C., en breve recibirá un correo donde podrá verificar su información, así como el folio con el que quedo registrada su solicitud.
                        <br>En Fundación Markoptic A.C. trabajamos por el bienestar de las personas.
                    </h4>   
                    </div>
                </div>
                <div style="margin:15px;"><center><a href="index" class="btn btn-success">Volver a la Pagina Principal</a></center></div>
            </div>
            
            <div class="col-md-3">
                
                <?php require 'mod/lateral.php';?>
                
            </div>
        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/mmodal.php';?>
    
<?php require 'mod/scripts.php';?>

<script type="text/javascript" src="js/funciones.js"></script>
    
</body>
</html>
