<?php
session_start();
?>
<html>
<body>
<?php
if (!isset($_SESSION["contador"])){
 $_SESSION["contador"] = 1;
}else{
 $_SESSION["contador"]++;
} ?>
<a href= "sesionCantidadPag.php">Ver cantidad de veces que se visito la página</a>
</body>
</html>