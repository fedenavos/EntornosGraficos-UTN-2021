<?php
    $fecha=date("d-m-Y");
    $hora= date("H :i:s");
    $destino="fedenavos@gmail.com";
    $asunto="Consulta en su página";
    $desde='From:' .$_POST['email'];
    $cuerpo= "
    \n
    Nombre: $_POST[nombre]\n
    Email: $_POST[email]\n
    Consulta: $_POST[cuerpo]\n
    Enviado: $fecha a las $hora\n
    \n
    ";
    mail($destino,$asunto,$cuerpo,$desde);
    echo "Su consulta ha sido enviada, en breve recibirá nuestra respuesta.";
?>