<?php

require("server.php");
$con = connect();

$user = $_POST['user'];
$pwd= $_POST['pwd'];
$email = $_POST['email'];

$cod = rand(1000, 9999);
$pwd = md5($pwd);

$sql = "insert into game values ('$user', '$email', '$pwd', '$cod', '0')";
$request = mysqli_query($con, $sql);
if($request)
{
  echo "User created successfully";
}
else
{
    echo "Error creating user";
}

//Creating the confirmation mail

$link = "http://estudiantes.is.escuelaing.edu.co/~2114604/game/validate.php?cod=".$cod."&email=".$email;

$message = "<p>Welcome to AAA Game, ". $user ."!</p><p>Click the following link to activate your account: ".$link."</p>";

$From= 'admin@game.com';
$to = $email;
$bbc = '';
$subject = "AAA Game registration";

//emial headers
$headers = "From: " . $From . "\r\n";
$headers .= "Reply-To: ". strip_tags($From) . "\r\n";
$headers .= "Bcc: ".$bcc."\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if( mail($to, $subject, $message, $headers) )
{
  echo "Your user has been created, a link has been sent to your email for validation.";
}
else
{
  echo "Email error";
}


?>
