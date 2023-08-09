<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h5 class="text-center mb-3">Usuario ingresado con éxito</h5>
          <h2 class="text-center">Menú Administrador</h2>
        </div>
      </div>
      <div class="row justify-content-around ">
        <div class="col-sm-4 col-xs-4 col-md-4">
          <div class="space-top">
            <a href="./ingresoProducto.php">
              <button class="btn btn-lg btn-success btn-block" type="submit">
                Ingresar Producto
              </button>
            </a>

            <a href="./ingresoSucursal.php">
              <button class="btn btn-lg btn-success btn-block" type="submit">
               Ingresar Sucursal
              </button>
            </a>

            <a href="./">
              <button class="btn btn-lg btn-success btn-block" type="submit">
               Ingresar Usuario
              </button>
            </a>

      
          </div>
        </div>

        <div class="col-sm-4 col-xs-4 col-md-4">
          <div class="space-top">
            <a href="./">
              <button class="btn btn-lg btn-success btn-block" type="submit">
               Buscar Producto de inventario
              </button>
            </a>

            <a href="./dashboard.php">
              <button class="btn btn-lg btn-success btn-block" type="submit">
               Volver a menú principal
              </button>
            </a>
          </div>
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

    h3, h2,  h5 {
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