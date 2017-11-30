<?php

require("server.php");
$con = connect();

$user = $_POST['user'];
$pwd= $_POST['pwd'];
$email = $_POST['email'];

$cod = rand(1000, 9999);
$pwd = md5($pwd);

$sql = "insert into users values ('$user', '$email', '$pwd','Unverified' ,'10', '$cod')";
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

$link = "http://estudiantes.is.escuelaing.edu.co/~2114604/volan/validate.php?cod=".$cod."&email=".$email;

$message = "<p>Welcome to Volan Studios, ". $user ."!</p><p>Click the following link to activate your account: ".$link."</p>";

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
