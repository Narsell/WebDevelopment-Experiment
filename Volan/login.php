<?php
session_start();

require("server.php");
$con = connect();

$user = $_POST['user'];
$pwd= $_POST['pwd'];

$consulta = "select * from game where user = '$user'";
$resultado = mysqli_query($con, $consulta);

$total =mysqli_num_rows($resultado);

if($total == 0)
{
  echo "User not found";

}
else {

  $datos = mysqli_fetch_array($resultado); //Guardo el user que coincide en un "arreglo"
  $pwd_bd = $datos["pwd"]; //comparo su contraseña con la que ingresó el usuario.
  $is_val = $datos["is_val"];

  if( (md5($pwd) == $pwd_bd) && ($is_val) )
  {
    $_SESSION['isAuth'] = true;
    $_SESSION['user'] = $user;

  }
  else
  {
        echo "Incorrect username or password";
  }

}


?>