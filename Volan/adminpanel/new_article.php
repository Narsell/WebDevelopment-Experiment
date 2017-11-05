<?php

require("../server.php");
$con = connect();


$title = $_POST['title'];
$body = $_POST['body'];
$desc = $_POST['desc'];
$author = $_POST['author'];
$tag = $_POST['tag'];

$sql = "insert into v_news values(null, '$tag', '$title', '$desc', '$body', '$author')";
$request = mysqli_query($con, $sql);

if($request)
{
  echo"Article submited succesfully";
}
else
{
  echo"Error. Contact an admin";
}
?>