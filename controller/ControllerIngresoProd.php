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
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous'>
<head>
</head>
<body style='background-color: #263238;
padding-top: 50px;
font-family: 'Open Sans', sans-serif;'>
  <section >
    <div style='display: flex; align-items: center; justify-content: center'>
      <h3 class='mb-3' style='color:#fff;'>Resumen de producto ingresado en la Base de datos</h3>
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
    <div class='mt-3' style='display: flex; justify-content: center;'>
      <a href='./../view/menuAdmin.php'>
        <div class='btn btn-lg btn-secondary btn-block mt-3 cursor' style='height:60px; display: flex; align-items: center; justify-content: center;'> ⇦ Volver a menú
        </div>
      </a>
    </div>
   
  </section>
</body>
</html>";
