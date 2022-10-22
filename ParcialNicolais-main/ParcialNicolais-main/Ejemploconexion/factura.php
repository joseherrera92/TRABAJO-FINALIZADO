<?php include "./Cabeza/header.php"; ?>
<!DOCTYPE html>
<html lang="en">


<body>
    
    <div style="max-height: 400px ;">
    <form action="" method="post">
        Numero Id <br><input type="text" name="idCliente" id="idCliente" placeholder="idCliente" /><br><br>
        Nombre Cliente <br><input type="text" name="nombreCliente" id="nombreCliente" placeholder="Nombre" /><br><br>
        Direccion <br><input type="text" name="direccionCliente" id="direccionCliente" placeholder="Direccion" /><br><br>
        Telefono <br><input type="text" name="telefonoCliente" id="telefonoCliente" placeholder="Telefono" /><br><br>
        <input type="submit" name="Continuar" value="Generar Factura" />
    </form>
    </div>

    <div >
    <table style="border: 5px" >
        <?php
        include "conexion.php";
        
        echo "
    <br><br><br>
";

        if (isset($_POST["Continuar"])) {
            $id = $_POST["idCliente"];
            $nombreClient = $_POST["nombreCliente"];
            $direccion = $_POST["direccionCliente"];
            $telefono = $_POST["telefonoCliente"];

            $consulta = "SELECT * FROM factura";
            $resultado = $con->query($consulta);

            echo "
            <tr>
            <th>idCliente</th>
            <th>Cliente</th>
            <th>Dirección</th>
            <th>Telefono</th>
            </tr>
                    <tr>
                          <td>" . $id . "</td>
                          <td>" . $nombreClient . "</td>
                          <td>" . $direccion . "</td>
                          <td>" . $telefono . "</td>
                    </tr>
  ";
            $total = 0;
            $multi = 0;

            echo "
            <tr>
            <th>id</th>
            <th>producto</th>
            <th>cantidad</th>
            <th>precio</th>
        </tr>
            ";
            while ($fila = $resultado->fetch_array()) {
                $multi = $fila[2] * $fila[3];
                $total = $total + $multi;
                echo "         
                    <tr>
                        <td align='center'>" . $fila[0] . "</td>
                        <td align='center'>" . $fila[1] . "</td>
                        <td align='center'>" . $fila[2] . "</td>
                        <td align='center'>" . $fila[3] . "</td>
                    </tr>
                    
                ";
            }
            
            echo "TOTAL A PAGAR: {$total}";
        }
       
         
        ?>
       
    </table>
    </div>
    <input type="button" name="finalizar" value="finalizar" onclick="location.href='finalizar.php'"/>
    <?php 
        //if(isset($_GET["finalizar"])){
        // $consulta1= "DELETE FROM factura";
        // $resultado1 = $con->query($consulta1);
        // header("Location: inventario.php");
        //}
    ?>




</body>

</html>



<?php include "./Cabeza/footer.php"; ?>