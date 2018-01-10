<?php
session_start();

require("server.php");
$con = connect();

$user = $_POST['user'];
$pwd= $_POST['pwd'];

$sql = "select * from users where user = '$user'";
$res = mysqli_query($con, $sql);
$total = mysqli_num_rows($res);

if($total == 0)
{
  echo "User not found";
  
}
else {

  $data = mysqli_fetch_array($res); 
  $pwd_bd = $data["pwd"]; 
  $user = $data['user']; 
  $rank = $data['rank'];
  

  if (password_verify($pwd, $pwd_bd))
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
