<?php

require("../server.php");
$con = connect();

$up_path;

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $up_path = '../news_img/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], '../news_img/' . $_FILES['file']['name']);
    }

$title = $_POST['title'];
$body = $_POST['body'];
$des = $_POST['des'];
$author = $_POST['author'];
$tag = $_POST['tag'];


$sql = "insert into news values(null, '$tag', '$up_path', '$title', '$des', '$body', '$author')";
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