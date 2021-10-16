<?php 
    $destinatario = "fedenavos@gmail.com ";
    $asunto = "Ejercicio 1 - Enviar email con HTML";
    $cuerpo = ' 
    <html> 
    <head> 
        <title>Envio de mail</title> 
    </head> 
    <body> 
        <h1>Entornos gráficos</h1>
        <h2>Ejercicio 1</h2> 
        <p> 
        <b>Esto es parte del Ejercicio 1 de la práctica 5 de PHP</b>
    </body> 
    </html> 
    '; 
    // Para enviar un correo HTML debe establecerse la cabecera Content-type 
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    //dirección del remitente concatenada con otras direcciones 
    $headers .= "From: fedenavos@gmail.com\r\n"; 
    
    mail($destinatario,$asunto,$cuerpo,$headers)
?>