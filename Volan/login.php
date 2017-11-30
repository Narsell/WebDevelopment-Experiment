<?php
session_start();

require("server.php");
$con = connect();

$user = $_POST['user'];
$pwd= $_POST['pwd'];

$consulta = "select * from users where user = '$user'";
$res = mysqli_query($con, $consulta);
$total = mysqli_num_rows($res);

if($total == 0)
{
  echo "User not found";
  
}
else {

  $data = mysqli_fetch_array($res); //Guardo el user que coincide en un "arreglo"
  $pwd_bd = $data["pwd"]; //comparo su contraseña con la que ingresó el usuario.
  $user = $data['user']; //Tomo el nombre directo de la base de datos.
  $is_val = $data["is_val"];
  $rank = $data['rank'];

  if( (md5($pwd) == $pwd_bd))
  {
    $_SESSION['isAuth'] = true;
    $_SESSION['user'] = ucfirst($user); //Capitalize
    $_SESSION['rank'] = $rank;

  }
  else
  {
        echo "Incorrect username or password";
  }

}


?>
