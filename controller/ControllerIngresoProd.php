<?php
include ('./../model/ModeloGestionStock.php');
$nombreProd = $_POST['nombreProd']; 
$categoria = $_POST['categoria'];
$sucursal = $_POST['sucursal_prod']; 
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad']; 
$precio = $_POST['precio']; 

$objProducto = new ModeloGestionStock();
$msj = $objProducto -> insertProducto($categoria, $sucursal, $nombreProd, $descripcion, $precio, $cantidad);

echo "<html>
<head>
</head>
<body style='background-color: #263238;
padding-top: 50px;
font-family: 'Open Sans', sans-serif;'>
  <section >
    <div style='display: flex; align-items: center; justify-content: center'>
      <h3 style='color:#fff;'>Resumen de producto ingresado en la Base de datos</h3>
    </div>
    <table class='default' style='margin: 0 auto;'>
    <tr>
      <td style='outline: 1px solid; padding: 10px; color: #fff; font-weight: bold;'>Nombre Producto</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff; font-weight: bold;'>Categoría</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff; font-weight: bold;'>Sucursal</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff; font-weight: bold;'>Descripción</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff; font-weight: bold;'>Cantidad</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff; font-weight: bold;'>Precio</td>
    </tr>
    <tr>
      <td style='outline: 1px solid; padding: 10px; color: #fff'>$nombreProd</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff'>$categoria</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff'>$sucursal</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff'>$descripcion</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff'>$cantidad</td>
      <td style='outline: 1px solid; padding: 10px; color: #fff'>$ $precio CLP</td>
    </tr>
    </table>
  </section>
</body>
</html>";
