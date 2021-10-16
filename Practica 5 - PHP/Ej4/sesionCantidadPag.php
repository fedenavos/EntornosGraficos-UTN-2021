<?php
session_start();
?>
<html>
<body>
<a href="sesionContador.php"></a>
<?php
echo "Has visitado " . ($_SESSION["contador"]) . " páginas";
?>
<br>
<br>
<a href="sesionContador.php">Ir a contador</a>
</body>
</html>