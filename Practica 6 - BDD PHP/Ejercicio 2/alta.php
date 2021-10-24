<html>
<head>
<title>Alta Ciudad</title>
</head>
<body>
<?php
    include("conexion.php");
    //Captura datos desde el Form anterior
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = $_POST['metro'];
    //Arma la instrucción SQL y luego la ejecuta
    $vSql = "SELECT Count(id) as cantidad FROM ciudades WHERE ciudad='$ciudad'";
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
    $vCantCiudades = mysqli_fetch_assoc($vResultado);
    if ($vCantCiudades ['cantidad']!=0){
        echo ("La ciudad ya existe<br>");
        echo ("<A href='menu.html'>VOLVER AL ABM</A>");
    }
    else {
        $vSql = "INSERT INTO ciudades (`ciudad`, `pais`, `habitantes`, `superficie`, `tieneMetro`)
                    values ('$ciudad', '$pais', '$habitantes', '$superficie', '$tieneMetro')";
        mysqli_query($link, $vSql) or die (mysqli_error($link));
        echo("La ciudad fue agregada correctamente<br>");
        echo("<A href='menu.html'>VOLVER AL MENU</A>");
        // Liberar conjunto de resultados
        mysqli_free_result($vResultado);
    }
    // Cerrar la conexion
    mysqli_close($link);
?></body></html>