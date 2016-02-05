<?php include 'inc/estadisticas.php';?>

<div class="col-md-3 zero">
    <div class="panel panel-default panel-mark col-md-12 col-sm-6" >
    <div class="panel-heading panel-heading-mark" id="rosado">SOLICITA TU DONACION</div>
    <div class="panel-body panel-body-mark">
        <a href="solicitud" class="sbut center-block">
            <img src="img/handy.png" class="animated tada">
            <span>Solicita aquí uno de nuestros dispositivos</span>
        </a>
        <a href="estadisticas" class="sbut center-block" id="counter">
            <span><?php echo $total; ?> Solicitudes</span>
        </a>
        <a href="historias" id="hist">Conoce a los solicitantes</a>
    </div>
</div>
    
<div class="panel panel-default panel-mark col-md-12 col-sm-6 ">
    <div class="panel-heading panel-heading-mark" id="militar">CERTIFICACIONES</div>
    <div style="padding:10px;" class="panel-body panel-body-mark">
        <a href="files/iit-cemefi.pdf" target="_blank">
        <img style="max-width:60%" class="img-responsive center-block" src="img/it.png">
        </a>
    </div>
</div>

<div class="panel panel-default panel-mark col-md-12 col-sm-6 " >
    <div class="panel-heading panel-heading-mark" id="morado">FORMA PARTE</div>
    <div class="panel-body panel-body-mark">
        <a href="#summon" data-toggle="modal" class="dlink"><span class="center-block img-thumbnail text-center">
            <img class="img-responsive center-block" src="img/summon.png" />
            <h4 class="txt-mark oswald"><strong>Haz tus Residencias Profesionales con nosotros</strong></h4>
        </span></a>
    </div>
</div>
    
<div class="panel panel-default panel-mark col-md-12 col-sm-6">
    <div class="panel-heading panel-heading-mark" id="reflex">DANOS LIKE</div>
    <div style="padding:10px;" class="panel-body panel-body-mark">
<div class="fb-page" data-href="https://www.facebook.com/fundacionmarkoptic" data-height="350" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/fundacionmarkoptic"><a href="https://www.facebook.com/fundacionmarkoptic">Fundación Markoptic A.C.</a></blockquote></div></div>
    </div>
</div>

<div class="panel panel-default panel-mark col-md-12 col-sm-6 ">
    <div class="panel-heading panel-heading-mark" id="cyan">SIGUENOS</div>
    <div style="padding:10px;" class="panel-body panel-body-mark">
<a class="twitter-timeline" href="https://twitter.com/Markoptic_AC" data-widget-id="619245592129044481">Tweets por el @Markoptic_AC.</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</div>
</div>

    <?php include 'lmodal.php';?> 
