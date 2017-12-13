<?php

require("server.php");
$con = connect();
$user = $_POST['user'];
$filename = $user.".jpg";
$up_path;

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $up_path = 'profile_pics/' . $filename;
        move_uploaded_file($_FILES['file']['tmp_name'], 'profile_pics/' . $filename);
    }


$sql = "update users set profile_pic='$up_path' where user='$user'";
$request = mysqli_query($con, $sql);

if($request)
{
  echo"Profile pic updated successfully";
}
else
{
  echo"Error. Contact an admin";
}

?>