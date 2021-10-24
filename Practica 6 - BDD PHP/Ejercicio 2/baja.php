<html>
<head>
<title>Baja Ciudad</title>
</head>
<body>
<?php
    include("conexion.php");
    $ciudad = $_POST['ciudad'];
    $vSql = "SELECT Count(id) as cantidad FROM ciudades WHERE ciudad='$ciudad'";
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
    $vCantCiudades = mysqli_fetch_assoc($vResultado);
    if ($vCantCiudades ['cantidad']!=0){
        $vSql = "DELETE FROM ciudades WHERE ciudad='$ciudad'";
        mysqli_query($link, $vSql) or die (mysqli_error($link));
        echo ("La ciudad fue eliminada correctamente<br>");
        echo ("<A href='menu.html'>VOLVER AL ABM</A>");
        mysqli_free_result($vResultado);
    }
    else {
        echo("La ciudad ingresada no existe<br>");
        echo("<A href='menu.html'>VOLVER AL MENU</A>");
    }
    // Cerrar la conexion
    mysqli_close($link);
?></body></html>