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
    <div class="row ">
      <div class="col-12">
        <h2 class="mb-3 text-center" style="color: fff" >Resultado de la búsqueda</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-xs-12 col-md-12">
        <table class="table table-bordered table-dark">
        <thead>
          <tr style='border: 1px solid #ccc;'>
            <th scope="col">ID Producto</th>
            <th scope="col">ID Categoría</th>
            <th scope="col">ID Sucursal</th>
            <th scope="col">Nombre Producto</th>
            <th scope="col">Descripción Producto</th>
            <th scope="col">Precio Venta</th>
            <th scope="col">Stock</th>
            <th scope="col">Estado</th>
            <th scope="col">Cambiar Estado</th>
            <th scope="col">Actualizar Producto</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
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
            <td>'.$id.'</td>
            <td>'.$cat.'</td>
            <td>'.$id_suc.'</td>
            <td>'.$nombre_prod.'</td>
            <td>'.$desc.'</td>
            <td>'.$precio.'</td>
            <td>'.$stock.'</td>
            <td>'.$estado.'</td>
            <td>
              '.(($estado=='Activo'? ' <form action="../view/desactivarProducto.php" method="POST">' :  '<form action="../view/activarProducto.php" method="POST">')).'
              <input type="hidden" name="id_prod" value="'.$id.'">
              <input type="hidden" name="cat_prod" value="'.$cat.'">
              <input type="hidden" name="id_suc" value="'.$id_suc.'">
              <input type="hidden" name="nombre_prod" value="'.$nombre_prod.'">
              <input type="hidden" name="precio_prod" value="'.$precio.'">
              <input type="hidden" name="stock_prod" value="'.$stock.'">
              <input type="hidden" name="estado" value="'.$estado.'">
              <button class="btn btn-lg '.(($estado== 'Activo'? 'btn-outline-warning' : 'btn-outline-primary')).' btn-block" type="submit">
              <p style="padding: 0; margin: 0">'.(($estado== 'Activo'? 'Desactivar' : 'Activar')).'</p>
              </button>
              </form>
            </td>
            <td>
            <form action="../view/actualizarProducto.php" method="POST">
            <input type="hidden" name="id_prod" value="'.$id.'">
            <input type="hidden" name="cat_prod" value="'.$cat.'">
            <input type="hidden" name="id_suc" value="'.$id_suc.'">
            <input type="hidden" name="nombre_prod" value="'.$nombre_prod.'">
            <input type="hidden" name="descripcion" value="'.$desc.'">
            <input type="hidden" name="precio_prod" value="'.$precio.'">
            <input type="hidden" name="stock_prod" value="'.$stock.'">
            <input type="hidden" name="estado" value="'.$estado.'">
            <button class="btn btn-lg btn-outline-info btn-block" type="submit">
            <p style="padding: 0; margin: 0"> Actualizar </p>
            </button>
            </form>
          </td>
            <td>
            <form action="../view/eliminarProducto.php" method="POST">
            <input type="hidden" name="id_prod" value="'.$id.'">
            <input type="hidden" name="cat_prod" value="'.$cat.'">
            <input type="hidden" name="id_suc" value="'.$id_suc.'">
            <input type="hidden" name="nombre_prod" value="'.$nombre_prod.'">
            <input type="hidden" name="precio_prod" value="'.$precio.'">
            <input type="hidden" name="stock_prod" value="'.$stock.'">
            <input type="hidden" name="estado" value="'.$estado.'">
            <button class="btn btn-lg btn-danger btn-block" type="submit">
            <p style="padding: 0; margin: 0"> ELIMINAR </p>
            </button>
            </form>
          </td>

          </tr>';
          }
          ?>
        </tbody>
      </table>
    
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="./../view/busquedaProducto.php">
          <div class="btn btn-lg btn-secondary btn-block mt-3 cursor" style="height:60px; display: flex; align-items: center; justify-content: center;">
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