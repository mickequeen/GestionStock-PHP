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
          $msj = 'NO se pudo registrar sucursal';
        }
      } else {
        $msj = 'Error al ingresar sucursal';
      }
      return $msj;
    }
    
    public function insertProducto( $categoria, $sucursal, $nombreProd, $descripcion, $precio, $cantidad){
      $query = "INSERT INTO `productos`( `ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD` ) VALUES ($categoria, '1-9', $sucursal ,'$nombreProd','$descripcion', $precio, $cantidad, 'Activo')";
      $stringConnection = Conexion::conectar();
      if(mysqli_query($stringConnection, $query)){
        $fila = mysqli_affected_rows($stringConnection);
        if($fila ==1 ){
          $msj = 'Se ingresó su registro de producto';
        } else {
          $msj = 'NO se ingresó producto';
        }
      }
      else{
        $msj = 'Error al ingresar producto';
      }
      return $msj;
    }
    public function activarProducto(  $id_prod){
      $query = "UPDATE `productos` SET `ESTADO_PROD`='Activo' WHERE ID_PRODUCTO = $id_prod";
      $stringConnection = Conexion::conectar();
      if(mysqli_query($stringConnection, $query)){
        $fila = mysqli_affected_rows($stringConnection);
        if($fila ==1 ){
          $msj = 'Resumen de producto activado con éxito';
        } else {
          $msj = 'No se pudo activar el siguiente producto';
        }
      } else{
        $msj = 'Error al activar producto';
      }
      return $msj;
    }

    public function desactivarProducto($id_prod){
      $query = "UPDATE `productos` SET `ESTADO_PROD`='Inactivo' WHERE ID_PRODUCTO = $id_prod";
      $stringConnection = Conexion::conectar();
      if(mysqli_query($stringConnection, $query)){
        $fila = mysqli_affected_rows($stringConnection);
        if($fila ==1 ){
          $msj = 'Resumen de producto desactivado con éxito';
        } else {
          $msj = 'No se pudo desactivar siguiente el producto';
        }
      } else{
        $msj = 'Error al desactivar producto';
      }
      return $msj;
    }

    public function eliminarProducto($id_prod){
      $query = "DELETE FROM `productos` WHERE ID_PRODUCTO = $id_prod";
      $stringConnection = Conexion::conectar();
      if(mysqli_query($stringConnection, $query)){
        $fila = mysqli_affected_rows($stringConnection);
        if($fila ==1 ){
          $msj = 'Resumen de producto ELIMINADO con éxito';
        } else {
          $msj = 'No se pudo eliminar el siguiente producto';
        }
      } else{
        $msj = 'Error al eliminar producto';
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