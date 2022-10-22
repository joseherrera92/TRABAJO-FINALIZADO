<?php
include "./conexion.php";

session_start();
if (isset($_SESSION['nombre'])) {
  header('Location: ./index.php');
}

if (isset($_GET["verificar"])) {
  $usuario = $_GET["nombre"];
  $contrasena = $_GET["contra"];

  $consulta = "SELECT id, idRol FROM usuario WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
  $resultado = $con->query($consulta);

  if ($resultado->num_rows == 1) {

    $fila = $resultado->fetch_array();


    $_SESSION['Nombre'] = $usuario;
    $_SESSION['Rol'] = $fila[1];

    
    header('Location: index.php');
  } else {
    echo "
      <script>
      alert('Despeguela ome anorí');
      </script>            
     ";
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
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>
      <h2 class="inactive underlineHover"><a href="./registro.php">Sign Up</a></h2>
     

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="image/logobanano.png" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="inicio.php" method="$_GET">
        <input type="text" id="login" class="fadeIn second" name="nombre" placeholder="login" require>
        <input type="password" id="password" class="fadeIn third" name="contra" placeholder="password" require>
        <input type="submit" class="fadeIn fourth" value="Log In" name="verificar">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>
</body>
<?php include "./Cabeza/footer.php";?>
</html>