<?php
session_start();
extract($_REQUEST);

$link = mysqli_connect("localhost", "root", "password") or die ("Problemas de
conexión a la base de datos");
mysqli_select_db($link, "compras");

if(!isset($cantidad)){$cantidad=1;} 
$vSql = "select * from catalogo where id='".$id."'";
$vResultado = mysqli_query($link, $vSql);
$row = mysqli_fetch_array($vResultado);

if(isset($_SESSION['carro']))
$carro=$_SESSION['carro']; 

$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'producto'=>
$row['producto'],'precio'=>$row['precio'],'id'=>$id); 

$_SESSION['carro']=$carro; 
header("Location:catalogo.php?".SID);
?>