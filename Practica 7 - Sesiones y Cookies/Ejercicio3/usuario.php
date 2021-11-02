<?php
    setcookie('usuario', $_POST['usuario'], time() + (60 * 60 * 24 * 90));
    header('Location: Ejercicio3.php');
?>