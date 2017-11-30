<?php

require("server.php");
$con = connect();

$cod = $_GET['cod'];
$email = $_GET['email'];

$sql = "select * from users where email = '$email'";
$request = mysqli_query($con, $sql);

$data = mysqli_fetch_array($request);

$cod_bd = $data['v_cod'];

if($cod_bd == $cod)
{
  $sql = "update users set rank = 'Newbie' where email = '$email'";
  mysqli_query($con, $sql);
  
  echo"
      
      <script>
        
        alert('Your account has been verified, you will now be redirected to the main page so you can log in.');
        window.open('index.php', '_self');
        
      </script>
  
  ";
}
else
{
    echo"
      
      <script>
        
        alert('Invalid code.');
        window.open('index.php', '_self');
        
      </script>
  
  ";
}

?>