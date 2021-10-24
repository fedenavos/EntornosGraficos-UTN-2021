<html>
<head>
<title>Modificacion Ciudad</title>
</head>
<body>
<?php
    include("conexion.php");
    $ciudad = $_POST['ciudad'];
    $vSql = "SELECT * FROM ciudades WHERE ciudad='$ciudad'";
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
    $fila = mysqli_fetch_array($vResultado);
    if(mysqli_num_rows($vResultado) == 0) {
        echo("La ciudad ingresada no existe<br>");
        echo("<A href='menu.html'>VOLVER AL MENU</A>");
    }
    else {
?>

<form action="modificacion.php" method="post">
    <fieldset>
        <label for="ciudad">Ciudad:</label>
        <input id="ciudad" name="ciudad" type="text" value="<?php echo($fila['ciudad']); ?>" readonly>

        <label for="pais">País:</label>
        <input id="pais" name="pais" type="text" value="<?php echo($fila['pais']); ?>">
    </fieldset>
    <fieldset>
        <label for="habitantes">Cantidad de habitantes:</label>
        <input id="habitantes" name="habitantes" type="text" value="<?php echo($fila['habitantes']); ?>">

        <label for="superficie">Superficie:</label>
        <input id="superficie" name="superficie" type="text" value="<?php echo($fila['superficie']); ?>">

        <label for="metro">Tiene metro?</label>

        <?php
            if($fila['tieneMetro'] == 1) {
                echo(
                    '<input type="radio" name="metro" id="metro" value="1" checked> Si
                    <input type="radio" name="metro" id="metro" value="0"> No'
                );
            } else {
                echo(
                    '<input type="radio" name="metro" id="metro" value="1"> Si
                    <input type="radio" name="metro" id="metro" value="0" checked> No'
                );
            }
        ?>
    </fieldset>
    <input type="submit" value="Modificar">
</form>
<p><a href="menu.html">Volver al menu</a></p>

<?php
    }
    // Liberar conjunto de resultados
    mysqli_free_result($vResultado);
    // Cerrar la conexion
    mysqli_close($link);
?>
</body>
</html>