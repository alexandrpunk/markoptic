<div class="mark-nav">

    <div class="container">
        <div class="bar-social">
            <ul>
                <li><a href="https://www.facebook.com/fundacionmarkoptic" target="_blank"><i class="fa fa-facebook-square fa-fw fa-2x"></i></a></li>
                <li><a href="https://twitter.com/fundmarkopticac" target="_blank"><i class="fa fa-twitter-square fa-fw fa-2x"></i></a></li>
                <li><a href="https://www.youtube.com/user/markopticmx" target="_blank"><i class="fa fa-youtube-play fa-fw fa-2x"></i></a></li>
                <li><a href="https://plus.google.com/+FundacionMarkopticOrgMxAC" target="_blank"><i class="fa fa-google-plus-square fa-fw fa-2x" target="_blank"></i></a></li>
            </ul>

        </div>
            <p class="top-right">
                <a href="#" data-toggle="modal" data-target="#contacto-modal">Contacto</a></p>
        
                <div class="input-group top-right hidden">
                    <input type="text" class="form-mark btn-bar bg-mark" placeholder="Buscar...">
                    <span class="input-group-btn">
                        <button class="btn btn-bar" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div> 
        
                        <div class="align-right" id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>       
    </div>
</div>

<div class="modal fade" id="contacto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="inc/contacto.post.php" method="POST" class="form" accept-charset="utf-8" role="form">
                <div class="modal-header" style="background: #31a463; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contacto</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Apellido" class="form-control" id="apellido" name="apellido" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="tel" placeholder="Teléfono" class="form-control" id="telefono" name="telefono" ></div>
                                </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" placeholder="Correo Electrónico" class="form-control" id="correo" name="correo" required=""></div>
                                </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Dejanos tu comentario..." rows="4" id="comentario" name="comentario" required="" style="resize: none;"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input id="submit" type="submit" name="submit" class="btn btn-success" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="contacto-success-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="background: #31a463; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ENHORABUENA!!</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <center><h4>Tu comentario fue enviado satisfactoriamente.</h4></center>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contacto-error-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="background: #31a463; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Error</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Ocurrió un error error, intenta enviar el comentario mas tarde</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                </div>
        </div>
    </div>
</div>
