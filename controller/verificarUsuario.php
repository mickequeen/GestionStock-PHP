<?php
//Usuario válido: admin, contra admin123
$usuario = $_POST['usuario'];
$contra = $_POST['contra']; 
$nuevaURL = "./../view/menuAdmin.php";
if( $usuario === 'admin' && $contra === 'admin'){
  header("Location: $nuevaURL");
  die();
} else {
  echo "<html>
  <head>
  </head>
  <body style='background-color: #263238;
  padding-top: 50px;
  font-family: 'Open Sans', sans-serif;'>
    <section >
      <div style='display: flex; align-items: center; justify-content: center'>
        <h2 style='color:#fff;'>
        Usuario no autorizado</h2>
      </div>
      <div style='display: flex; align-items: center; justify-content: center'>
      <a href='../view/login.php'> <button style='background-color: #4141dac2;
      color: fff;
      padding: 0.8em;
      border: none;
      border-radius: 0.3em;
      cursor: pointer;'>Volver a intentarlo</button></a>
      </div>
    </section>
  </body>
</html>";
};


?>