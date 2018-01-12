<?php
session_start();

require("server.php");
$con = connect();

$username = $_POST['username'];
$pwd= $_POST['pwd'];
$Remember = $_POST['RememberMe'];

$sql = "select * from users where username = '$username'";
$res = mysqli_query($con, $sql);
$total = mysqli_num_rows($res);

if($total == 0)
{
  echo "User not found";
  return;
}

    $data = mysqli_fetch_array($res); 
    $pwd_bd = $data["pwd"]; 


    if (password_verify($pwd, $pwd_bd))
    {
      
       $userid = $data['id'];
       $rank = $data['rank'];
           
          if($Remember)
          {           
            $selector = generateToken(5);
            $validator = generateToken(20);

            setcookie("Selector", $selector, time() + (86400 * 7), "/");
            setcookie("Validator", $validator, time() + (86400 * 7), "/");
            
            $offset = strtotime("+1 week");
            $expiredate = date("Y-m-d H:i:s", $offset);
          
            $hashvalidator = md5($validator);
      
            $sql = "insert into auth_tokens values (null, '$selector', '$hashvalidator', '$userid', '$expiredate')";
            $res = mysqli_query($con, $sql);
            if(!$res)
            {
              echo"Unable to generate remember me token, make sure you have cookies enabled.";
            } 
            
          } 


      $_SESSION['isAuth'] = true;
      $_SESSION['user'] = ucfirst($username); //Capitalize
      $_SESSION['rank'] = $rank;

    }
    else
    {
          echo "Wrong password";
          return;
    }



function generateToken($length)
{
    return bin2hex(random_bytes($length));
}

?>
