<?php

include ('./../model/ModeloGestionStock.php');

$ciudad_suc = $_POST['ciudad_sucursal']; 
$comuna_suc = $_POST['comuna_sucursal'];
$dire_suc = $_POST['direccion_sucursal'];
$fono_suc = $_POST['telefono_sucursal'];
$mail_suc = $_POST['mail_sucursal'];

$objSucursal = new ModeloGestionStock();
$msj = $objSucursal->insertSucusal($ciudad_suc, $comuna_suc, $dire_suc, $fono_suc, $mail_suc);

?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<head>
  <title>activar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-xs-12 col-md-12 ">
        <h2 class="mb-3 text-center" style="color: fff" ><?php echo $msj; ?></h2>
      </div>
    </div>
    <div class="row justify-content-around">
      <div  class="col-sm-12 col-xs-12 col-md-12 ">
        <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">Ciudad Sucursal</th>
            <th scope="col">Comuna Sucursal</th>
            <th scope="col">Dirección Sucursal</th>
            <th scope="col">Fono Sucursal</th>
            <th scope="col">Mail Sucursal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $ciudad_suc; ?></td>
            <td><?php echo $comuna_suc; ?></td>
            <td><?php echo $dire_suc; ?></td>
            <td><?php echo $fono_suc; ?></td>
            <td><?php echo $mail_suc; ?></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-xs-12 col-md-12 ">
        <a href="./../view/menuAdmin.php">
          <div class="btn btn-lg btn-secondary btn-block mt-3 cursor" style="height:60px; display: flex; align-items: center; justify-content: center;">
            ⇦  Volver a Menú Principal
          </div>
        </a>
      </div>
    </div>
  </div>

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

