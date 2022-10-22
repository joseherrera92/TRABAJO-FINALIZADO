<?php 
        //session_start();
        include "conexion.php";
        $consulta1= "DELETE FROM factura";
        $resultado1 = $con->query($consulta1);
        header('Location: index.php');
?>