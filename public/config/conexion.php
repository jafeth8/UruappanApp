<?php
$DB_HOST="localhost";//Servidor donde se encuentra alojada nuestra base de datos
$DB_NAME= "uruappandb";// Nombre de la base de datos
$DB_USER= "root";//Usuario de la base de datos
$DB_PASS= "";//Contraseña del usuario de la base de datos
	# conectare la base de datos
    //$con=mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    $con=new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

   
?>
