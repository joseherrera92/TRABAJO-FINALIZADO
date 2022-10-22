<?php
    include "conexion.php";
    

    if(isset($_GET["actualizar"])){
        $codigo = $_GET["cod"];
        $nombre = $_GET["nombre"];
        $cantidad = $_GET["cantidad"];
        $precio = $_GET["precio"];

        $consulta = "UPDATE producto SET nombre ='$nombre', cant ='$cantidad', precio ='$precio' WHERE cod ='$codigo'";

        if($con->query($consulta)){
            echo "Datos actualizados en el exito...";
        }else{
            echo "Datos no actualizados...";
        }
        header('Location: Inventario.php');
    }
    
?>
<?php include "./Cabeza/header.php";?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrearDatos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<form action="actualizar.php" method="$_GET">
        <?php
        $codigo = $_GET["codigo"];
        $nombre = $_GET["nombre"];
        $cantidad = $_GET["cantidad"];
        $precio = $_GET["precio"];
        echo '
            <input type="number" id="cod" class="fadeIn second" name="cod" placeholder="codigo" value="'.$codigo.'" />
            <input type="text" id="nombre" class="fadeIn third" name="nombre" placeholder="nombre" value="'.$nombre.'">
            <input type="number" id="cantidad" class="fadeIn third" name="cantidad" placeholder="cantidad" value="'.$cantidad.'">
            <input type="number" id="precio" class="fadeIn third" name="precio" placeholder="precio" value="'.$precio.'">
            <input type="submit" class="fadeIn fourth" value="actualizar" name="actualizar">
           
            </form>
    
            <form action="crear.php" method="$_GET">
            
            <input type="submit" class="fadeIn fourth" value="Volver" name="volver">
        '
        ?>
 </form>
</body>
<?php include "./Cabeza/footer.php";?>
</html>