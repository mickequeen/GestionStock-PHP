<?php

include ('./../model/ModeloGestionStock.php');

$id_prod =$_POST['id_prod'];
$cat_prod =$_POST['cat_prod'];
$id_suc =$_POST['id_suc'];
$nombre_prod =$_POST['nombre_prod'];
$precio_prod =$_POST['precio_prod'];
$stock_prod =$_POST['stock_prod'];

$objDesactivar = new ModeloGestionStock();
$respuesta = $objDesactivar->desactivarProducto($id_prod);

?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<head>
  <title>desactivar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-3  text-center" style="color: fff" ><?php echo $respuesta; ?></h2>
      </div>
    </div>
    <div class="row justify-content-around">
      <div class="col-sm-12 col-xs-12 col-md-12">
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">ID del Producto</th>
            <th scope="col">Categoría</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Nombre del Producto</th>
            <th scope="col">Precio venta</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $id_prod; ?></td>
            <td><?php echo $cat_prod; ?></td>
            <td><?php echo $id_suc; ?></td>
            <td><?php echo $nombre_prod; ?></td>
            <td><?php echo $precio_prod; ?></td>
            <td><?php echo $stock_prod; ?></td>
            <td>Inactivo</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-xs-12 col-md-12">
        <a href="./../view/busquedaProducto.php">
          <div  class="btn btn-lg btn-secondary btn-block mt-3 cursor" style="height:60px; display: flex; align-items: center; justify-content: center;">
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

