<!-- Carousel================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators hide">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <cms:pages masterpage='publicacion.php' folder='importantes' startcount='1' limit='5'>
                    <cms:if k_count='1'>
                        <div style="background-image:url(<cms:show publicacion_image />)" class="item active">
                            <div class="carousel-caption">
                                <a href="<cms:show k_page_link />">
                                    <h4 class="oswald"><cms:show k_page_title /></h4>
                                </a>
                            </div>
                        </div>
                        <cms:else />
                        <div style="background-image:url(<cms:show publicacion_image />)" class="item">
                            <div class="carousel-caption">
                                <a href="<cms:show k_page_link />">
                                    <h4 class="oswald"><cms:show k_page_title /></h4>
                                </a>
                            </div>
                        </div>
                    </cms:if>
                </cms:pages>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
        <!-- /.carousel -->