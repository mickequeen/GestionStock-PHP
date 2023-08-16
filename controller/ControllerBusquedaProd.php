<?php
include ('./../model/ModeloGestionStock.php');

$nombre_codigo = $_POST['nombre_cod']; 
$sucursal = $_POST['sucursal_busqueda'];

$objBusqueda = new ModeloGestionStock();
$respuesta = $objBusqueda->busquedaProducto($nombre_codigo, $sucursal);
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<head>
  <title>Busqueda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-3" style="color: fff" >Resultado de la búsqueda</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <table style='border: 1px solid #ccc;'>
        <tr style='border: 1px solid #ccc;'>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>ID Producto</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>ID Categoría</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>ID Sucursal</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>Nombre Producto</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>Descripción Producto</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>Precio Venta</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>Stock</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>Estado</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>Cambiar Estado</th>
          <th style='border: 1px solid #ccc; color: #ccc; padding: 3px 10px;'>Eliminar</th>
        </tr>";
        <?php
        foreach($respuesta as $value){
          $id = $value['ID_PRODUCTO'];
          $cat = $value['ID_CATEGORIA'];
          $id_suc = $value['ID_SUCURSAL'];
          $nombre_prod = $value['NOMBRE_PROD'];
          $desc = $value['DESCRIPCION_PROD'];
          $precio = $value['PRECIO_VTA'];
          $stock = $value['STOCK_PROD'];
          $estado = $value['ESTADO_PROD'];
          echo '<tr>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$id.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$cat.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$id_suc.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$nombre_prod.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$desc.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$precio.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$stock.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">'.$estado.'</td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">
            '.(($estado=='activo'? ' <form action="../view/DesactivarProducto.php" method="POST">' :  '<form action="../view/ActivarProducto.php" method="POST">')).'
            <input type="hidden" name="id_fruta" value="'.$id.'">
            <input type="hidden" name="nombre_fruta" value="'.$cat.'">
            <input type="hidden" name="precio_fruta" value="'.$id_suc.'">
            <input type="hidden" name="sucursal_fruta" value="'.$nombre_prod.'">
            <input type="hidden" name="cantidad_fruta" value="'.$precio.'">
            <input type="hidden" name="cantidad_fruta" value="'.$stock.'">
            <button class="btn btn-lg '.(($estado== 'Activo'? 'btn-warning' : 'btn-info')).' btn-block" type="submit">
            <p>'.(($estado== 'Activo'? 'Desactivar' : 'Activar')).'</p>
            </button>
            </form>
          </td>
          <td style="border: 1px solid #ccc; color:#ccc; padding:3px 10px; text-align:center">
          <form action="../view/EliminarProducto.php" method="POST">
          <input type="hidden" name="id_fruta" value="'.$id.'">
          <input type="hidden" name="nombre_fruta" value="'.$cat.'">
          <input type="hidden" name="precio_fruta" value="'.$id_suc.'">
          <input type="hidden" name="sucursal_fruta" value="'.$nombre_prod.'">
          <input type="hidden" name="cantidad_fruta" value="'.$precio.'">
          <input type="hidden" name="cantidad_fruta" value="'.$stock.'">
          <button class="btn btn-lg btn-danger btn-block" type="submit">
          <p> ELIMINAR</p>
          </button>
          </form>
        </td>

        </tr>';
        }
        ?>

      </table>
    
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="./../view/busquedaProducto.php">
          <div  style="width:17em;" class="btn btn-lg btn-primary btn-block cursor mt-3">
            ⇦  Volver a Menú de Búsqueda
          </div>
        </a>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <script type="text/javascript">
  </script>
</body>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    body {
      background-color: #263238;
      padding-top: 50px;
      font-family: 'Open Sans', sans-serif;
    }

    h3 {
      color: #ecf0f1;
    }

    p {
      padding-top: 10px;
      color: #ecf0f1;
      font-size: 1.0em;
    }

    a {
      color: #f1c40f;
    }

    a:hover {
      color: #efa039;
      text-decoration: none;
    }

    label {
      color: #ecf0f1;
      padding-top: 10px;
      font-size: 1.6rem;
    }

    button {
      margin-top: 20px;
    }

    .border-login {
      border-right: 1px solid #fff;
      min-height: 450px;
      float: right;
    }

    .space-top {
      padding-top: 50px;
    }

    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: normal;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border-radius: 0;
    }
  </style>
</html>