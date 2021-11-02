<?php
    //Veo si recibo datos del formulario
    if(isset($_POST["estilo"])){
    //es que estoy recibiendo un estilo nuevo, lo tengo que meter en las cookies
    $estilo = $_POST["estilo"];
    //meto el estilo en una cookie
    setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
    }else{
    //si no he recibido el estilo que desea el usuario en la página, miro si hay una cookie creada
    if(isset($_COOKIE["estilo"])){
    //es que tengo la cookie
    $estilo = $_COOKIE["estilo"];
    }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <title>Ejercicio 1</title>
    <?php
    //miro si he tengo un estilo definido, porque entonces tengo que cargar la correspondiente hoja de estilos
    if (isset($estilo)){
    echo '<link rel="STYLESHEET" type="text/css" href="' . $estilo . '.css">';
    }
    ?>
</head>
<body>
    <h1>Federico Navós - Ejercicio 1 Práctica 7</h1>
    Crear una página que puede configurarse con distintos estilos CSS. El usuario es quien decide qué
aspecto desea que tenga la página, por medio de un formulario. Luego la página es capaz de
recordar, entre los distintos accesos que realice el usuario, el aspecto que había elegido para
mostrar la web. 
    <p>
    <form action="Ejercicio1.php" method="post"> Aquí
    puedes seleccionar el estilo que prefieres en la página:
    <br>
    <select name="estilo">
        <option value="verde">Verde
        <option value="rojo">Rojo
        <option value="azul">Azul
    </select>
    <input type="submit" value="Actualizar el estilo">
    </form>
</body>
</html>