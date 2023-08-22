<?php
  include('Conexion.php');
  $iconoError = "<svg xmlns='http://www.w3.org/2000/svg' style='color: red;
    width: 1em; height: 1em; fill: currentColor;' class='bi bi-x-octagon-fill' viewBox='0 0 16 16'>
    <path d='M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z'/></svg>";
  $iconoAdvertencia = "<svg xmlns='http://www.w3.org/2000/svg'  style='color: yellow; width: 1em; height: 1em;fill: currentColor;' class='bi bi-exclamation-triangle-fill' viewBox='0 0 16 16'>
  <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/></svg>";
  $iconoActualizar = "<svg xmlns='http://www.w3.org/2000/svg'  style='color: green; width: 1em; height: 1em; fill: currentColor;' class='bi bi-arrow-repeat' viewBox='0 0 16 16'>
  <path d='M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z'/><path fill-rule='evenodd' d='M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z'/></svg>";

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
          $msj = 'Registro de producto guardado con éxito';
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

    public function actualizarProducto($id_prod, $nombre_prod, $precio_prod, $descripcion){
      $existe = $this->verificarExistencia($id_prod);
      global $iconoError, $iconoAdvertencia, $iconoActualizar;
      if($existe){
        $query = "UPDATE `productos` SET `NOMBRE_PROD`='$nombre_prod',`DESCRIPCION_PROD`='$descripcion',`PRECIO_VTA`= $precio_prod WHERE ID_PRODUCTO = $id_prod";
        $stringConnection = Conexion::conectar();
        if(mysqli_query($stringConnection, $query)){
          $fila = mysqli_affected_rows($stringConnection);
          if($fila ==1 ){
            $msj = "$iconoActualizar Producto <b>actualizado</b> con éxito";
            return $msj;
          } else {
            $msj = "$iconoAdvertencia No se han actualizado datos del producto";
            return $msj;
          }
        } else{
          $msj = "$iconoError <b>Error</b> al actualizar producto";
          return $msj;
        }
      } else {
        $msj = "$iconoError Producto <b>NO</b> pudo actualizarse, ya que <b>NO existe</b> en la base de datos
            <p>Favor verifique existencia de ID $id_prod e intente nuevamente</p>";
        return $msj;
      }
    }

    public function verificarExistencia($id_prod): bool{
      $query = "SELECT * FROM `productos` WHERE ID_PRODUCTO = $id_prod";
      $stringConnection = Conexion::conectar();
      if(mysqli_query($stringConnection, $query)){
        $fila = mysqli_affected_rows($stringConnection);
        if($fila ==1 ){
          return true;
        } else {
          return false;
        }
      }
    }
    public function eliminarProducto($id_prod){
      $existe = $this->verificarExistencia($id_prod);
      if($existe){
        $query = "DELETE FROM `productos` WHERE ID_PRODUCTO = $id_prod";
        $stringConnection = Conexion::conectar();
        if(mysqli_query($stringConnection, $query)){
          $fila = mysqli_affected_rows($stringConnection);
          if($fila ==1 ){
            $msj = 'Resumen de producto ELIMINADO con éxito';
            return $msj;
          } else {
            $msj = 'No se pudo eliminar el siguiente producto';
            return $msj;
          }
        } else{
          $msj = '<svg xmlns="http://www.w3.org/2000/svg" style="color: red;
          width: 1em; height: 1em; fill: currentColor;" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
          <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg> Error al eliminar producto';
          return $msj;
        }
      } else {
        $msj = '
        <svg xmlns="http://www.w3.org/2000/svg" style="color: red;
        width: 1em; height: 1em; fill: currentColor;" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg> 
        El producto seleccionado NO EXISTE en la Base de datos';
        return $msj;
      }

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