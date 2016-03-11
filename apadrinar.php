<?php
require 'inc/solicitar.php';
 $title = 'Apadrinar';

    if(isset($_GET['ahijado']) && isset($_GET['padrino']) && $_GET['padrino']!= NULL &&  $_GET['ahijado']!= NULL){
        $pagina_ahijado= $_GET['ahijado'];
        $email_padrino= $_GET['padrino'];
        echo $pagina_ahijado;
        echo $email_padrino;
    }
    else{
        header('Location:historias');
    }

function validar_padrinos($email_padrino){

//consulta para tratar de obtener los datos del padrino
$con = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset ( $con , "utf8");

if (!$con){die("ERROR DE CONEXION CON MYSQL:". mysql_error());}
    
    $sql = "select id from Padrinos where email = '".$email_padrino."';";
    $result = $con->query($sql);
    
    if($result->num_rows > 0){
        echo " se encontro el  email: ";
        echo $email_padrino;
        echo '<br>Total results: ' . $result->num_rows;

    }else{
        echo " no se encontro el email";
        echo $email_padrino;
        echo '<br>Total results: ' . $result->num_rows;
    }
    
}

validar_padrinos($email_padrino);

;?>

<?php require 'mod/head.php';?>

</head>
<body>
    
<?php require 'mod/navbar.php';?>

    <div class="container">
        
        <?php require 'mod/header.php';?>
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                
                    <?php
                        if(!empty($errors)){
                        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.nl2br($errors).'</strong></div>';
                        }
                    ?>
                    
                  <div class="panel panel-default panel-mark animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="militar">Solicitud de Recibo Deducible de Impuestos</div>
                    <div class="panel-body panel-body-mark">    
                        
                    </div>
                </div>     
            </div>
                
                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>
    
<?php require 'mod/scripts.php';?>
    
<script src="js/form.js"></script>
    
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

    
</body>
</html>