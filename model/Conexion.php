<?php
  class Conexion{
    
    public static function conectar(){
     $host = "127.0.0.1";
     $user = "root";
     $pass = "";
     $db = "gestionstock";
     try{
      $con = mysqli_connect($host, $user, $pass, $db);
      return $con;
     } catch(mysqli_sql_exception $error){
      print $error -> getMessage();
      exit();
     };
    }
  }