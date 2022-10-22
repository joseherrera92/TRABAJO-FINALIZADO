<?php  include "./Cabeza/footer.php"; ?>


<?php 
session_start();
 include "conexion.php";

//! negación, !isset = Que no exista
if (!isset($_SESSION['Nombre'])) {
    header('Location: inicio.php');
}

$codigo = $_GET["codigo"];
$nombre = $_GET["nombre"];
$cantidad = $_GET["cantidad"];
$precio = $_GET["precio"];


$consulta1 = "SELECT * FROM producto WHERE cod ='$codigo'";
$resultado1 = $con->query($consulta1);
$filas = $resultado1 ->fetch_array();
$sucursal =$filas[4];
$opera = $filas[2] - 1;
$consulta2 ="UPDATE producto SET cant = '$opera' WHERE cod = '$codigo' ";
$resultado2 = $con->query($consulta2);

if($con->query($consulta2)){
    header("Location: index.php");
}
   
?>
