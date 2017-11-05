<?php

require("../server.php");
$con = connect();

$id = $_POST['id'];


$sql = "delete from v_news where id='$id'";
$request = mysqli_query($con, $sql);


?>