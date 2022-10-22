<?php
    include "conexion.php";

    $codigo = $_GET["codigo"];
 
    $consulta = "DELETE FROM producto WHERE cod=$codigo";


    if($con->query($consulta)){
        header("Location: Inventario.php");
    }else{
        echo "Los datos no fueron eliminados...";
    }
?>