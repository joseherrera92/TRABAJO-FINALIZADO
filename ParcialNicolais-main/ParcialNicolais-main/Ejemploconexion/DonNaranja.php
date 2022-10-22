<?php
session_start();
include "conexion.php";

if (isset($_GET["aceptar"])) {

    $codigo = $_GET["codigo"];
    $cantidad = $_GET["cantidad"];
    $producto = $_GET["producto"];

    $consulta1 = "SELECT * FROM producto WHERE cod ='$codigo'";
    $resultado1 = $con->query($consulta1);

    if ($resultado1->num_rows == 1) {

        
        $filas = $resultado1->fetch_array();
        $opera = $filas[2] - $cantidad;

        $nombre = $filas[1];
        $precio = $filas[3];


        $consulta2 = "UPDATE producto SET cant = '$opera' WHERE cod = '$codigo' ";
        $resultado2 = $con->query($consulta2);

        $consultafactura = "INSERT INTO factura (id, nombre, cant, precio) 
        VALUES ('$codigo', '$producto', '$cantidad', '$precio')";

        $resul = $con->query($consultafactura);

        if ($con->query($consulta2)) {
            header("Location: DonNaranja.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/barra.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php
    include 'conexion.php';
    //session_start();
    $varsession = $_SESSION['Rol'];

    if ($varsession == 1) {
        echo "

        
        <h4> <a href='crear.php'>Añadir Producto</a></h4>
        
        ";
    }

    ?>
    <h4> <a href='index.php'>Volver</a> </h4>

    <table class="table table-responsive">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>

        <?php
        include "./conexion.php";

        $consulta = "SELECT * FROM producto";
        $resultado = $con->query($consulta);


        while ($filas = $resultado->fetch_array()) {
            if ($filas[4] == 1) {
                echo "
                <tr>
                    <td>" . $filas[0] . "</td>  
                    <td>" . $filas[1] . "</td>
                    <td>" . $filas[2] . "</td>
                    <td>" . $filas[3] . "</td>
                   
            ";
                if ($varsession == 1) {
                    echo "
        
                <td>
                    <a href='actualizar.php?codigo=" . $filas[0] . "&nombre=" . $filas[1] . "&cantidad=" . $filas[2] . "&precio=" . $filas[3] . "'>actualizar</a>
                    <a href='eliminar.php?codigo=" . $filas[0] . "'>eliminar</a>
                </td>
                
                ";
                }
                /*echo "
            <td>
            <a href='comprar.php?codigo=".$filas[0]."&nombre=".$filas[1]."&cantidad=".$filas[2]."&precio=".$filas[3]."'>Comprar</a>
           </td>
             ";*/
            }
        }

        ?>
        </tr>

    </table>
    <br>
    <h2>Venta de productos</h2>
    <br>
    <form action="" method="get">
        <table>
            <tr>
                <td>Codigo:</td>
                <td>Cantidad:</td>
                <td>producto:</td>

            </tr>
            <tr>
                <td><input type="text" id="codigo" name="codigo" placeholder="Ingrese el codigo" /></td>
                <td><input type="text" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" /></td>
                <td><input type="text" id="producto" name="producto" placeholder="Ingrese el producto" /></td>
            </tr>

        </table>
        <br>
        <input type="submit" name="aceptar" value="Agregar" />
    </form>
    <input type="button" name="aceptar" value="Generar Factura" onclick="location.href='factura.php'"/>
</body>
<?php include "./Cabeza/footer.php"; ?>

</html>