<?php
include('conexion.php');

$Cant_por_Pag = 3;
$pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;
if (!$pagina) {
$inicio = 0;
$pagina=1;
}
else {
$inicio = ($pagina - 1) * $Cant_por_Pag;
}

//Arma la instrucción SQL y luego la ejecuta
$vSql = "SELECT * FROM ciudades";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$vCantCiudades = mysqli_num_rows($vResultado);

$total_paginas = ceil($vCantCiudades/ $Cant_por_Pag);
echo "Numero de registros encontrados: " . $vCantCiudades . "<br>";
echo "Se muestran paginas de " . $Cant_por_Pag . " registros cada una<br>";
echo "Mostrando la pagina " . $pagina . " de " . $total_paginas . "<p>";
$vSql = "SELECT * FROM ciudades"." limit " . $inicio . "," . $Cant_por_Pag;
$vResultado = mysqli_query($link, $vSql);
$vCantCiudades=mysqli_num_rows($vResultado);

if ($vCantCiudades==0){
    echo ("No hay ciudades.<br>");
    echo ("<A href='menu.html'>VOLVER AL ABM</A>");
}
else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado con paginacion</title>
</head>
<body>
    <h1>Lista de ciudades</h1>  
    <table border="1">
        <tr align="center">
            <td>Id</td>
            <td>Ciudad</td>
            <td>País</td>
            <td>Habitantes</td>
            <td>Superficie</td>
            <td>Tiene metro?</td>
        </tr>

        <?php
            while($fila = mysqli_fetch_array($vResultado)) {        
        ?>

        <tr align="center">
            <td><?php echo($fila['id']); ?></td>
            <td><?php echo($fila['ciudad']); ?></td>
            <td><?php echo($fila['pais']); ?></td>
            <td><?php echo($fila['habitantes']); ?></td>
            <td><?php echo($fila['superficie']); ?></td>
            <td> <?php if($fila['tieneMetro']) { echo("Si"); } else { echo("No"); } ?> </td>
        </tr>
        
        <?php

            }
        ?>
        
    </table>
    
    <?php
        if ($total_paginas > 1){
        for ($i=1;$i<=$total_paginas;$i++){
        if ($pagina == $i)
        //si muestro el índice de la página actual, no coloco enlace
        echo $pagina . " ";
        else
        //si la página no es la actual, coloco el enlace para ir a esa página
        echo "<a href='consultaPaginada.php?pagina=" . $i ."'>" . $i . "</a> ";}
    }
    ?>
    <p>&nbsp;</p>

    <A href='menu.html'>VOLVER AL MENU</A>

</body>
</html>

<?php
}
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>