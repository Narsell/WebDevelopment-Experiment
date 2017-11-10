<?php

require("../server.php");
$con = connect();

$id = $_POST['id'];


$sql = "delete from news where id='$id'";
$request = mysqli_query($con, $sql);


?>