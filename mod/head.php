<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Fundación Markoptic A.C., brindando ayuda a personas con alguna discapacidad física, con la firme tarea de DONAR Dispositivos Medico Tecnológicos.">
    <meta name="author" content="Jesus Alejandro Sandoval Lopez">

    <title>Fundacion Markoptic -
        <?php
        if(isset($title)){
            echo $title;
        }else
        echo'<cms:if k_template_is_clonable>
            <cms:if k_is_page>
                <cms:show k_page_title />
            <cms:else />
                <cms:show k_template_title />
            </cms:if>
        <cms:else />
            <cms:show k_template_title />
        </cms:if>';
        ?>
    </title>
    <?php
    include_once("analyticstracking.php");
    require 'style.php';
    ?>
