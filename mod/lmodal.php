    <!-- Convocatoria -->
<div class="modal fade" id="summon" tabindex="-1" role="dialog" aria-labelledby="Mejorar la Calidad de Vida">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-mark modal-morado">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="summon">Haz tus Residencias Profesionales con Nosotros</h4>
      </div>
        <div class="modal-body">
            <img class="img-responsive center-block" src="img/summon.png">
            <p class="news">Fundación Markoptic A.C. abre la convocatoria para que formes parte de nuestro equipo este siguiente periodo escolar Agosto-Diciembre 2015, en nuestras distintas áreas de acción y participes en los proyectos que tenemos preparados para ti.</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal contacto -->
<div class="modal fade" id="contacto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header modal-mark">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contacto</h4>
                </div>
                <form action="inc/contacto.post.php" method="POST" class="form" accept-charset="utf-8" role="form">
                <div class="modal-body">
                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Nombre" class="form-control" id="c_nombre" name="c_nombre" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Apellido" class="form-control" id="c_apellido" name="c_apellido" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="tel" placeholder="Teléfono" class="form-control" id="c_telefono" name="c_telefono" ></div>
                                </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" placeholder="Correo Electrónico" class="form-control" id="c_correo" name="c_correo" required=""></div>
                                </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Dejanos tu comentario..." rows="4" id="c_comentario" name="c_comentario" required="" style="resize: none;"></textarea>
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
                <div class="modal-header">
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
                <div class="modal-header">
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
