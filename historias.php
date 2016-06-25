<?php
session_start();
require_once( 'cms/cms.php' );
?>

<cms:template title='Historias' clonable='1' order='2'>
      
    <cms:editable   name='edad'
                    desc='Edad del solicitante'
                    validator='non_negative_integer'
                    type='text'
                    order='1'
    />
    
    <cms:editable   name='ciudad'
                    desc='ciudad donde vive'
                    type='text'
                    order='2'
    />
    
    <cms:editable   name='estado'
                    desc='estado donde vive'
                    type='text'
                    order='3'
    />
    
    <cms:editable   name='pais'
                    desc='pais donde vive'
                    type='text'
                    order='4'
    />
    
    <cms:editable   name='dispositivo'
                    desc='Que dispositivo necesita'
                    type='text'
                    order='5'
    />
    
    <cms:editable   name='descripcion'
                    desc='descripcion del dispositivo solicitado'
                    type='textarea'
                    order='6'
    />
        
    <cms:editable   name='necesidad'
                    desc='Porque necesita la ayuda'
                    type='textarea'
                    order='7'
    />
    
    <cms:editable   name='fotografia'
                    label='fotografia del solicitante'
                    desc='fotografia del solicitanten'
                    show_preview='1'
                    preview_height='200'
                    type='image'
                    order='8'
    />
    
    <cms:editable   name="fotografia_thumb"
                    assoc_field="fotografia"
                    label="Miniatura de la fotografia"
                    desc="Miniatura de la fotografia"
                    width='170'
                    height='170'
                    crop='1'
                    type="thumbnail"
                    order='9'
    />
    <cms:folder name="sin-fotografia" title="sin fotografia" />
</cms:template>
<?php require 'mod/head.php';?>

</head>
<body>
<cms:editable type='message' name='admin_navlinks' dynamic='default_data' order='-100'>cms_navlinks.html</cms:editable>
<?php require 'mod/navbar.php';?>
    <div class="container">
        
        <?php require 'mod/header.php';?>
        
        <div class="row">
            <div class="col-md-9">
                
                <?php require 'mod/menu.php';?>
                <cms:if k_is_page >
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A: <cms:show k_page_title /></div>
                    <div  class="panel-body panel-body-mark">

                        <cms:set img_val="<cms:php> echo(substr('<cms:show fotografia/>', 25));</cms:php>" />
                            <div class="row hist-box sombra">
                               
                                <div class="col-md-4 col-sm-4">
                                    <a href='
                                    <cms:if "<cms:exists "../<cms:show img_val />" />" >
                                        <cms:show fotografia />
                                    </cms:if>' data-lightbox="image-1">
                                    <img class="img-thumbnail center-block sombra" src='
                                   <cms:if "<cms:exists "../<cms:show img_val />" />" >
                                        <cms:show fotografia_thumb />
                                    <cms:else />
                                        img/placeholder.jpg
                                    </cms:if>'>
                                    </a>
                                    <h3 class="text-capitalize text-center"><strong><cms:show k_page_title /></strong></h3>                             
                                </div>
                                
                                <div class="col-md-8 col-sm-8">
                                    <dl class="dl-horizontal">
                                        <dt  class="txt-mark">Solicito:</dt>
                                        <dd><i><cms:show dispositivo /> <cms:show descripcion /></i></dd>
                                    
                                        <dt class="txt-mark">Edad:</dt>
                                        <dd><i><cms:show edad /></i></dd>
                                        
                                        <dt class="txt-mark">Vive en:</dt>
                                        <dd><i><cms:show ciudad />, <cms:show estado />, <cms:show pais/></i></dd>
                                        
                                        <dt class="txt-mark">¿Porque lo necesita?</dt>
                                        <dd class="text-lowercase"><i><cms:show necesidad /></i></dd>
                                    </dl>
                                    
                                    <center>
                                    <a href="" class="btn btn-pad" id="cyan" data-toggle="modal"  OnClick="setinfo('<cms:show k_page_title />', '<cms:show k_page_id />')" data-target="#solicitar_email" >Apadrinar</a> 
                                    </center>
                                </div>
                                
                        </div>
                    
                    </div>
                </div>
                        
                <cms:else />
                    <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A QUIENES NECESITAN TU APOYO</div>
                    <div  class="panel-body panel-body-mark">                    
                    <cms:pages masterpage='historias.php' limit='5' paginate='1'>
                    
                        <cms:set img_val="<cms:php> echo(substr('<cms:show fotografia/>', 25));</cms:php>" />
                            <div class="row hist-box sombra">
                               
                                <div class="col-md-4 col-sm-4">
                                    <a href='
                                    <cms:if "<cms:exists "../<cms:show img_val />" />" >
                                        <cms:show fotografia />
                                    </cms:if>' data-lightbox="image-1">
                                    <img class="img-thumbnail center-block sombra" src='
                                   <cms:if "<cms:exists "../<cms:show img_val />" />" >
                                        <cms:show fotografia_thumb />
                                    <cms:else />
                                        img/placeholder.jpg
                                    </cms:if>'>
                                    </a>
                                    <h3 class="text-capitalize text-center"><strong><cms:show k_page_title /></strong></h3>                             
                                </div>
                                
                                <div class="col-md-8 col-sm-8">
                                    <dl class="dl-horizontal">
                                        <dt  class="txt-mark">Solicito:</dt>
                                        <dd><i><cms:show dispositivo /> <cms:show descripcion /></i></dd>
                                    
                                        <dt class="txt-mark">Edad:</dt>
                                        <dd><i><cms:show edad /></i></dd>
                                        
                                        <dt class="txt-mark">Vive en:</dt>
                                        <dd><i><cms:show ciudad />, <cms:show estado />, <cms:show pais/></i></dd>
                                        
                                        <dt class="txt-mark">¿Porque lo necesita?</dt>
                                        <dd class="text-lowercase scroll-box"><i><cms:show necesidad /></i></dd>
                                    </dl>
                                    <center>
                                        <a class="btn btn-pad" id="verde" href="<cms:show k_page_link />" role="button">Conoce la historia</a> 
                                        <a href="" class="btn btn-pad" id="cyan" data-toggle="modal"  OnClick="setinfo('<cms:show k_page_title />', '<cms:show k_page_id />')" data-target="#solicitar_email" >Apadrinar</a>
                                    </center>
                                </div>
                                
                               
                                
                            </div>

                    
                    
                    <cms:if k_paginated_bottom >
                       <hr/>
                        <cms:if k_paginate_link_prev >
                            <a class="btn btn-md btn-mark pull-left" href="<cms:show k_paginate_link_prev />">Historias recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                            <a class="btn btn-md btn-mark strong pull-right" href="<cms:show k_paginate_link_next />">Historias anteriores</a>
                        </cms:if>
                    </cms:if>
                    </cms:pages>
                    </div>
                    </div>
                    </cms:if>
            </div>

                <?php require 'mod/lateral.php';?>

        </div>
    </div>

    
<?php require 'mod/footer.php';?>

<!-- moda de solicitud de email -->
<div class="modal fade" id="solicitar_email" tabindex="-1" role="dialog" aria-labelledby="Correo electronico del padrino">
    <div class="modal-dialog modal-content" role="document">
        <div class="modal-header modal-mark modal-morado text-center" ><h4 class="zero oswald">Apadrina la historia de <span class='nombre_hist'>&nbsp;</span></h4></div>
        <div class="modal-body"> 
            
            <p class="news">Gracias por su interes en apadrinar la historia de <span class='nombre_hist'>&nbsp;</span>, para inciar el proceso primero debe proporcionarnos su nombre y correo electronico.</p>
            
            <form action="" method="post" autocomplete="off" id="preregistro">
                <div class="form-group">
                    <label class="control-label"  for="correo">Correo Electronico:</label>
                    <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo@electronico" required  oninput="verificar()">
                </div>
                <div class="form-group">
                    <label class="control-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" autofocus name="nombre" placeholder="Nombre completo" disabled required>
                </div>
                <input class="btn btn-success" type="submit" href="javascript:;" value="Siguiente" id="registro">
            </form>
            
            <div style="display:none;" id="info">
                <a class="btn btn-success">Apadrinar a <span class='nombre_hist'>&nbsp;</span></a>
            </div>
            
      </div>
    </div>
</div>


<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>

<script>
   //variables globales 
historia='';
id='';
    
// hace que funcione el autofocus en le modal

$('.modal').on('shown.bs.modal', function(){$(this).find('[autofocus]').focus();});

//pone nombre de la historia en los enlaces y el modal
function setinfo(nombre_hist,id_hist){
    historia = nombre_hist;
    id = id_hist;

    x = document.getElementsByClassName("nombre_hist");
    console.log("id a apadrinar: "+id);
    for (i = 0; i < x.length; i++) {
        x[i].innerHTML = historia;
    }
};

        
function verificar(){
        var parametros = {
                "proceso" : 1,
                "correo"  : document.getElementById("correo").value
        };
    
        if(parametros.correo.length >= 6){
            document.getElementById("nombre").disabled = false;
            $.ajax({
                    data:  parametros,
                    dataType: 'json',
                    url:   'inc/solicitar.php',
                    type:  'post',
                    success:  function (data) {
                        
                        if(data.hasOwnProperty('error')){
                            console.log("nombre del donador: "+data.error_message);
                        }else{
                            if(data.hasOwnProperty('nombre')){
                            document.getElementById("nombre").value = data.nombre;
                            console.log("se proceso la informacion\n");
                            console.log("nombre del donador: "+data.nombre);
                            console.log("id a apadrinar: "+id);
                            }else{
                            document.getElementById('registro').onclick =
                                                                function(){
                                                                    registrar();
                                                                };
                            }
                        }
                    }
            });
        }
}
    
function registrar(nombre, correo, page, historia){
        var parametros = {
                "proceso" : 2,
                "nombre"  : nombre,
                "correo"  : correo,
                "page"    : page,
                "historia": historia
                
        };
        $.ajax({
                data:  parametros,
                url:   'inc/solicitar.php',
                type:  'post',
                dataType: 'json',
                success:  function (data) {
                        console.log("Response: "+data.message);
                        $( "#preregistro" ).fadeOut();
                        $( "#info" ).fadeIn();
                }
        });
}
    
</script> 
    
</body>
</html>
<?php COUCH::invoke(); ?>

