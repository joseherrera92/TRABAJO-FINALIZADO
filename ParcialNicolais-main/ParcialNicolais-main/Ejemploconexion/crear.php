<?php
include "conexion.php";

if (isset($_GET["verificar"])) {


    $codigo = $_GET["cod"];
    $nombre = $_GET["nombre"];
    $cantidad = $_GET["cantidad"];
    $precio = $_GET["precio"];
    $sucursal = $_GET["sucursal"];

    if ($codigo != "" && $nombre != "" && $cantidad != "" && $precio != "" && $sucursal != "") {
        $consulta = "INSERT INTO producto (cod, nombre, cant, precio, sucursal) VALUES ('$codigo', '$nombre', '$cantidad', '$precio', '$sucursal')";

        if ($con->query($consulta)) {
            echo "Los datos han sido creados";
            header('Location: index.php');
        } else {
            echo "Error al crear datos";
        }
    } else {
        echo "Despeguela";
    }
}

if (isset($_GET["volver"])) {
    header('Location: index.php');
}

?>

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
    <form action="crear.php" method="$_GET">
        <input type="number" id="cod" class="fadeIn second" name="cod" placeholder="codigo" require>
        <input type="text" id="nombre" class="fadeIn third" name="nombre" placeholder="nombre" require>
        <input type="number" id="cantidad" class="fadeIn third" name="cantidad" placeholder="cantidad" require>
        <input type="number" id="precio" class="fadeIn third" name="precio" placeholder="precio" require>
        <div class="content-select">
            <select id="sucursal" name="sucursal" require>
                <option value="1">Naranja</option>
                <option value="2">Mango</option>
                <option value="3">Mora</option>
                <option value="4">Guineo</option>
                <option value="5">Auyama</option>
                <option value="6">Banano</option>

            </select>
            <i></i>
        </div>
        <input type="submit" class="fadeIn fourth" value="Agregar Producto" name="verificar">
        

    </form>

    <form action="crear.php" method="$_GET">

        <input type="submit" class="fadeIn fourth" value="Volver" name="volver">

    </form>

</body>
<?php include "./Cabeza/footer.php";?>
</html>