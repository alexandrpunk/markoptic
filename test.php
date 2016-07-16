<?php
$ahijado="236";
$email="hola@mundo.com";
$link=$_SERVER['HTTP_HOST']."/donativo?ahijado=".$ahijado."&donador=".$email;
echo '<a href="http://'.$link.'" targe="_blank">hola mundo</a>'; ?>