<?php
require("server.php");
$con = connect();

session_start();

$selector = $_COOKIE["Selector"];

$sql = "delete from auth_tokens where selector = '$selector'";
$res = mysqli_query($con, $sql);

setcookie("Selector", "", time() - 3600);
setcookie("Validator", "", time() - 3600);

session_destroy();

 ?>
