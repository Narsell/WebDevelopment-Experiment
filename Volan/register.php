<?php

require("server.php");
$con = connect();

$username = $_POST['username'];
$pwd= $_POST['pwd'];
$email = $_POST['email'];

$cod = mt_rand(1000, 9999);

$hashpwd = password_hash($pwd , PASSWORD_DEFAULT);

$sql = "insert into users values (null, '$username', '$email', '$hashpwd', 'profile_pics/default.png' ,'Unverified' ,'10', '$cod')";
$request = mysqli_query($con, $sql);
if($request)
{
  echo "User created successfully";
}
else
{
    echo "Error creating user";
    return;
}

//Creating the confirmation mail

$link = "https://voilan.000webhostapp.com/validate.php?cod=".$cod."&email=".$email;

$message = "<p>Welcome to Volan Studios, ". $username ."!</p>
              <p>Click <a href='https://voilan.000webhostapp.com/validate.php?cod=".$cod."&email=".$email."'>here</a> to verify your account</p>
              <p>If you can't click on the link, copy the following adress into your browser: ".$link;

$From= 'admin@volanstudios.com';
$to = $email;
$bbc = '';
$subject = "Volan Studios Registration";

//emial headers
$headers = "From: " . $From . "\r\n";
$headers .= "Reply-To: ". strip_tags($From) . "\r\n";
$headers .= "Bcc: ".$bcc."\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if( mail($to, $subject, $message, $headers) )
{
  echo ", a link has been sent to your email for validation.";
}
else
{
  echo "There was an error emailing your validation code, please contact support to get this sorted.";
}


?>
