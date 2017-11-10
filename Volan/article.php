<?php

require("server.php");
$con = connect();

$id = $_GET['id'];

$sql = "select * from news where id='$id'";
$res = mysqli_query($con, $sql);

$data = mysqli_fetch_array($res);

echo $data['title'];
echo $data['body'];
echo $data['author'];

?>

