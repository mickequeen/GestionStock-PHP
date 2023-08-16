<?php
  include('./../model/ModeloGestionStock.php');
  $modeloGestionStock = new ModeloGestionStock();
  $sucursales = $modeloGestionStock->listarSucursales();

?>
<!--  -->
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
  <section>
    <div class="container">
      <div class="row">
  
        <div class="col-12">
          <h3 class="text-center">Búsqueda de producto</h3>
        </div>
      </div>
      <div class="row justify-content-around ">

        <div class="col-sm-6 col-xs-6 col-md-6">
          <div class="space-top">
            <form action="../controller/ControllerBusquedaProd.php" method="POST">
              <label class="">Ingrese Nombre o Código de producto</label>
              <input type="text" class="form-control" name="nombre_cod" maxlength="40" required autofocus>              
              
              <label class="">Sucursal </label>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="sucursal_busqueda">
              <option value="0">Seleccionar Sucursal</option>
                <?php
                foreach ($sucursales as $sucursal) {
                  $id_suc = $sucursal['ID_SUCURSAL'];
                  $comuna_suc = $sucursal['COMUNA_SUC'];
                  echo '<option value="'.$id_suc.'">'.$comuna_suc.'</option>';
                }
                ?>
              </select>
          </div>
        </div>

        <div class="col-sm-4 col-xs-4 col-md-4 pl-5">
          <div class="space-top">
            <button class="btn btn-lg btn-success btn-block" style="height:60px; display: flex; align-items: center; justify-content: center;margin-top: 55px;" type="submit">
              Ingresar Búsqueda
            </button>
            </form>
          </div>
          <a href="./../view/menuAdmin.php">
            <div class="btn btn-lg btn-secondary btn-block mt-3 cursor" style="height:60px; display: flex; align-items: center; justify-content: center;" >
              ⇦ Volver a menú
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

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
</body>

</html>