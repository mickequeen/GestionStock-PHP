<?php
include ('./../model/ModeloGestionStock.php');

$ciudad_suc = $_POST['ciudad_sucursal']; 
$comuna_suc = $_POST['comuna_sucursal'];
$dire_suc = $_POST['direccion_sucursal'];
$fono_suc = $_POST['telefono_sucursal'];
$mail_suc = $_POST['mail_sucursal'];

$objSucursal = new ModeloGestionStock();
$msj = $objSucursal->insertSucusal($ciudad_suc, $comuna_suc, $dire_suc, $fono_suc, $mail_suc);

echo $msj;