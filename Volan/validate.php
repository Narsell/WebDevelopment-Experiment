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
  $sql = "update users set is_val = '1' where email = '$email'";
  mysqli_query($con, $sql);
}


?>