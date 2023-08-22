<?php
  $id_prod = $_POST['id_prod'];
  $cat_prod = $_POST['cat_prod'];
  $id_suc = $_POST['id_suc'];
  $nombre_prod = $_POST['nombre_prod'];
  $desc = $_POST['descripcion'];
  $precio_prod = $_POST['precio_prod'];
  $stock_prod = $_POST['stock_prod'];
  $estado = $_POST['estado'];
?>
<html>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
  <section>
    <div class="container">
      <div class="row">
        <div  class="col-sm-12 col-xs-12 col-md-12">
          <h3 class="text-center">Resumen de producto a <b>Actualizar</b></h3>
        </div>
      </div>
      <div class="row justify-content-around ">
        <div class="col-sm-12 col-xs-12 col-md-12 center">
          <div class="space-top">
          <table class="table table-bordered table-dark">
            <thead>
              <tr>
                <th scope="col">ID del Producto</th>
                <th scope="col">Categoría</th>
                <th scope="col">Sucursal</th>
                <th scope="col">Nombre del Producto</th>
                <th scope="col">Descripción</th>
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
                <td><?php echo $desc; ?></td>
                <td><?php echo $precio_prod; ?></td>
                <td><?php echo $stock_prod; ?></td>
                <td><?php echo $estado; ?></td>
              </tr>
            </tbody>
          </table>
          <form action="../controller/ControllerActualizarProd.php" method="POST">
          <input type="hidden" name="id_prod" value="<?php echo $id_prod; ?>">
          <input type="hidden"  class="form-control" name="cat_prod" value="<?php echo $cat_prod; ?>">
          <input type="hidden"   class="form-control" name="id_suc" value="<?php echo $id_suc; ?>" >
          <label for="nombre_prod">Nombre del producto</label>
          <input required type="text"  class="form-control" name="nombre_prod" value="<?php echo $nombre_prod; ?>">
          <label for="precio_prod">Precio de venta</label>
          <input required type="text"  class="form-control" name="precio_prod" value="<?php echo $precio_prod; ?>">
          <label for="descripcion">Descripción del producto</label>
          <input required type="text"  class="form-control" name="descripcion" value="<?php echo $desc; ?>">
          <input type="hidden"  class="form-control" name="stock_prod" value="<?php echo $stock_prod; ?>">
          <button class="btn btn-lg btn-info btn-block" type="submit">
          <p> Actualizar datos del producto</p>
          </button>
          </form>
          <a href="./../view/busquedaProducto.php">
          <div  class="btn btn-lg btn-secondary btn-block mt-3 cursor" style="height:60px; display: flex; align-items: center; justify-content: center;">
            ⇦  Volver a Menú de Búsqueda
          </div>
        </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
  </script>
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
</body>

</html>