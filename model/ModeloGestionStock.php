<?php
  include('Conexion.php');
  class ModeloGestionStock{
    public function insertSucusal($ciudad_suc, $comuna_suc, $dire_suc, $fono_suc, $mail_suc){
      $query = "INSERT INTO `sucursales`(`CIUDAD_SUC`, `COMUNA_SUC`, `DIRECCION_SUC`, `FONO_SUC`, `MAIL_SUC`) VALUES ('$ciudad_suc', '$comuna_suc', '$dire_suc', $fono_suc, '$mail_suc')";
      $stringConnection = Conexion::conectar();
      if(mysqli_query($stringConnection, $query)){

        $fila = mysqli_affected_rows($stringConnection);

        if($fila ==1 ){
          $msj = 'Registro de sucursal exitoso';
        } else {
          $msj = 'NO se ingresó ná ni ná';
        }
      }
      return $msj;
    }
    
    public function insertProducto( $categoria, $sucursal, $nombreProd, $descripcion, $precio, $cantidad){
      $query = "INSERT INTO `productos`( `ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`) VALUES ($categoria, '1-9', $sucursal ,'$nombreProd','$descripcion', $precio, $cantidad)";
      $stringConnection = Conexion::conectar();
      if(mysqli_query($stringConnection, $query)){

        $fila = mysqli_affected_rows($stringConnection);
        if($fila ==1 ){
          $msj = 'se ingresó su registro de producto';
        } else {
          $msj = 'NO se ingresó ná ni ná';
        }
      }
      return $msj;
    }
    public function busquedaProducto($nombre, $sucursal){
      if($sucursal > 0){
        $query = "SELECT * FROM `productos` WHERE (NOMBRE_PROD LIKE '%$nombre%') and (ID_SUCURSAL = $sucursal) or (ID_PRODUCTO  LIKE '%$nombre%') and (ID_SUCURSAL = $sucursal)";
      } else { 
        $query = "SELECT * FROM `productos` WHERE (NOMBRE_PROD LIKE '%$nombre%') or 
      (ID_PRODUCTO  LIKE '%$nombre%')";  }
      $stringConnection = Conexion::conectar();
      $datos = mysqli_query($stringConnection, $query);
      mysqli_close($stringConnection);
      return $datos;
    }
    public function listarSucursales(){
      $query = "SELECT * FROM `sucursales` WHERE 1";
      $stringConnection = Conexion::conectar();
      $datos = mysqli_query($stringConnection, $query);
      mysqli_close($stringConnection);
      return $datos;
    }

    public function listarCategorias(){
      $query = "SELECT * FROM `categorias` WHERE 1";
      $stringConnection = Conexion::conectar();
      $datos = mysqli_query($stringConnection, $query);
      mysqli_close($stringConnection);
      return $datos;
    }
  }