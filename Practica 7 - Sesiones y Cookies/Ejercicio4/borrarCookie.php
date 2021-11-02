
<?php
    setcookie('noticia', null, time() - 60);
    header('Location: Ejercicio4.php');
?>