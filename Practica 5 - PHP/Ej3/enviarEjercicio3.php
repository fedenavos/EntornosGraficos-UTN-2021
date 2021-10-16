<?php
    $destino="fedenavos@gmail.com";
    $asunto="Su amigo le esta recomendando un sitio";
    $desde='From:' .$_POST['email'];
    $cuerpo= "
    \n
    Hola $_POST[nombre] !\n
    
    $_POST[mensaje]\n

    Asi que pasese por nuestro sitio *****.com.ar
    \n
    ";
    mail($destino,$asunto,$cuerpo,$desde);
    echo "Recomendación enviada con éxito.";
?>