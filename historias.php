<?php session_start();?>

<?php require_once( 'cms/cms.php' ); ?>
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
                <cms:if k_is_page >
                <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A: <cms:show k_page_title /></div>
                    <div  class="panel-body panel-body-mark">
                       
                        <div class="well sombra" style="margin:0;">
                            <div class="row">
                               
                                <div class="col-md-3 col-sm-3">
                                <a href="<cms:show fotografia />" data-lightbox="image-1"><img class="img-thumbnail center-block sombra" src="<cms:show fotografia_thumb />"></a>
                                <a href="" class="btn-pad" id="cyan" data-toggle="modal" OnClick="setinfo('<cms:show k_page_id />', '<cms:show k_page_title />')" data-target="#solicitar_email">Apadrinar</a>
                                </div>
                                
                                <div class="col-md-9 col-sm-9">
                                    <label class="txt-mark">Nombre:</label><p><strong><cms:show k_page_title /></strong></p>
                                    <label class="txt-mark">Edad:</label><p><cms:show edad /></p>
                                    <label class="txt-mark">Vive en:</label><p><cms:show ciudad />, <cms:show estado />, <cms:show pais/></p>
                                    <label class="txt-mark">Solicito:</label><p class="text-justify"><i><cms:show dispositivo /></i></p>
                                    <label class="txt-mark">Descripcion de su necesidad:</label><p class="text-justify"><i><cms:show descripcion /></i></p>
                                    <label class="txt-mark">¿Por que lo necesita?:</label><p class="text-justify"><i><cms:show necesidad /></i></p>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                        
                    <cms:else />
                    <div class="panel panel-default panel-mark  animated fadeIn">
                    <div class="panel-heading panel-heading-mark" id="rosado">CONOCE A QUIENES NECESITAN TU APOYO</div>
                    <div  class="panel-body panel-body-mark">                    
                    <cms:pages masterpage='historias.php' limit='10' paginate='1'>
                        <div class="well sombra">
                            <div class="row">
                               
                                <div class="col-md-3 col-sm-3">
                                <a href="<cms:show fotografia />" data-lightbox="image-1"><img class="img-thumbnail center-block sombra" src="<cms:show fotografia_thumb />"></a>
                                <a href="<cms:show k_page_link />" class="btn-pad" id="verde">Conoce su historia</a>
                                <a href="" class="btn-pad" id="cyan" data-toggle="modal"  OnClick="setinfo('<cms:show k_page_id />', '<cms:show k_page_title />')" data-target="#solicitar_email" >Apadrinar</a>
                                </div>
                                
                                <div class="col-md-9 col-sm-9">
                                    <label class="txt-mark">Nombre:</label><p><strong><cms:show k_page_title /></strong></p>
                                    <label class="txt-mark">Edad:</label><p><cms:show edad /></p>
                                    <label class="txt-mark">Vive en:</label><p><cms:show ciudad />, <cms:show estado />, <cms:show pais/></p>
                                    <label class="txt-mark">Solicito:</label><p class="text-justify"><i><cms:show dispositivo /></i></p>
                                </div>
                                
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
     <div class="modal-header"><strong>Apadrina la historia de <span id='nombre'>&nbsp;</span></strong></div>
      <div class="modal-body">
        <form id="donar">
           <p class="news" style="margin-top:0;">Tu donativo puede ayudar a mejorar una vida, si quieres apadrinar esta historia ingresa tu correo electronico y haz click en el boton de apadrinar.</p>
            <input onload="focusOnInput()" type="email" name="correo_donador" id="correo_donador" class="form-control" placeholder="Correo Electronico" required  maxlength="255" autofocus>
            <button type="submit" id="donar" class="btn btn-mark" style="margin-top:10px;" name="donar"><strong>Apadrinar esta historia</strong></button>
        </form>       
      </div>
    </div>
</div>


<?php require 'mod/scripts.php';?>
<script src="js/lightbox.min.js"></script>
<script src="js/donar.js"></script>
    
</body>
</html>
<?php COUCH::invoke(); ?>

