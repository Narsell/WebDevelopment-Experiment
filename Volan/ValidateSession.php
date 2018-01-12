<?php 

require("server.php");
$con = connect();

if(!isset($_COOKIE["Selector"]) || !isset($_COOKIE["Validator"])) 
{
    return;
} else 
{
    
    $selector = $_COOKIE["Selector"];
    $validator = $_COOKIE["Validator"];
  
    $sql = "SELECT * FROM auth_tokens WHERE selector = '$selector'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($res);
  
    if ( hash_equals($data['validator'], md5($validator)) ) 
        {
          $userid = $data['userid'];
          $sql = "SELECT * FROM users WHERE id = '$userid'";
          $res = mysqli_query($con, $sql);
          $data = mysqli_fetch_array($res);
          
          $_SESSION['isAuth'] = true;
          $_SESSION['user'] = ucfirst($data['username']); //Capitalize
          $_SESSION['rank'] = $data['rank'];
      
        }
    
}


?>