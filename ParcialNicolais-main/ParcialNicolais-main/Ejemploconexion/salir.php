<?php
    session_start();
    //Eliminar: unset
    unset($_SESSION['Nombre']);
    unset($_SESSION['Rol']);

    session_destroy();

    header('Location: inicio.php');

?>