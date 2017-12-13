<?php
session_start();
require("server.php");
$con = connect();

$user = $_POST['user']; 
$art_id= $_POST['articleid'];
$content = $_POST['content'];

$sql = "insert into comments values (null, '$art_id', '$user','$content' , '0')";
$request = mysqli_query($con, $sql);
if($request)
{
  echo"Comment submited successfully";
}
else
{
  echo"Error submiting comment";
}
?>