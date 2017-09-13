        <cms:set image="<cms:php> 
        $len = strlen($_SERVER['HTTP_HOST'])+8;
        $str='<cms:show fotografia />';
        $str = substr($str, $len);
        if(file_exists($str)){echo '<cms:show fotografia />';}else{echo 'img/placeholder.jpg';}
        </cms:php>" />

        <cms:set thumb="<cms:php> 
        $len = strlen($_SERVER['HTTP_HOST'])+8;
        $str='<cms:show fotografia />';
        $str = substr($str, $len);
        if(file_exists($str)){echo '<cms:show fotografia_thumb />';}else{echo 'img/placeholder.jpg';}
        </cms:php>" />

        <cms:set vinculacion="
                <cms:php> 
                $link = new mysqli('localhost', 'root', 'root', 'markoptic');
                    if($link->connect_errno) {
                        die('Error ' . $link->connect_error);
                    }

                    $query = 'SELECT v.nombre, v.logo FROM solicitud s
                    join Vinculaciones v on s.vinculacion = v.id
                    where id_page = <cms:show k_page_id />';

                    mysqli_set_charset($link, 'utf8');
                    $vinculaciones = $link->query($query)->fetch_array();
                    #echo $vinculaciones['logo'];  
                    echo '<img class=\'vinculaciones center-block\' alt=\''.$vinculaciones['nombre'].'\' src=\'img/vinculaciones/'.$vinculaciones['logo'].'\'>';  
                    // Free result set
                    mysqli_close($link);
                </cms:php>
        " />

        <div class="row hist-box sombra">
            <div class="col-md-4 col-sm-4">
                <a href="<cms:show image />" data-lightbox="image-1">
                    <img src="<cms:show thumb />" class="img-thumbnail center-block sombra">
                </a>
                <h3 class="text-capitalize text-center"><strong><cms:show k_page_title /></strong></h3>                             
            </div>

            <div class="col-md-8 col-sm-8">
                <dl class="dl-horizontal">
                    <dt  class="txt-mark">Solicitó:</dt>
                    <dd class="txt-gris"><i><cms:show dispositivo /> <cms:show descripcion /></i></dd>

                    <dt class="txt-mark">Edad:</dt>
                    <dd class="txt-gris"><i><cms:show edad /></i></dd>

                    <dt class="txt-mark">Vive en:</dt>
                    <dd class="txt-gris"><i><cms:show ciudad />, <cms:show estado />, <cms:show pais/></i></dd>

                    <dt class="txt-mark">¿Por qué lo necesita?</dt>
                    <dd class="txt-gris text-lowercase scroll-box"><i><cms:show necesidad /></i></dd>

                    <dt class="txt-mark">En Vinculacion con:</dt>
                    <cms:show vinculacion />
                </dl>
                <div class="text-center" style="margin-top:10px;">
                    <cms:if k_is_home >
                    <a class="btn btn-primary oswald" href="<cms:show k_page_link />" role="button">
                        Conoce la historia
                    </a>
                    </cms:if>
                    <a href="" class="btn btn-success oswald" data-toggle="modal"  OnClick="setinfo('<cms:show k_page_title />', '<cms:show k_page_id />')" data-target="#solicitar_email" >
                        Apadrinar
                    </a>
                </div>
            </div>
        </div>
        <cms:if k_paginated_bottom >
           <hr/>
            <cms:if k_paginate_link_prev >
                <a class="btn btn-md btn-mark oswald pull-left" href="<cms:show k_paginate_link_prev />">Historias recientes</a>
            </cms:if>
            <cms:if k_paginate_link_next >
                <a class="btn btn-md btn-mark oswald strong pull-right" href="<cms:show k_paginate_link_next />">Historias anteriores</a>
            </cms:if>
        </cms:if>