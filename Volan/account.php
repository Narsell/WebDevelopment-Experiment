<?php
session_start();
    
   $user = $_SESSION['user'];
   if($_SESSION['isAuth'] == false)
   {
     echo"
     <script>
     alert('You need to be authenticated to see this page');
     window.open('index.php', '_self');
     </script>";
   }
  
require("server.php");
$con = connect();


?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Volan</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="styles/account.css">
      <link rel="stylesheet" type="text/css" href="styles/main.css">

  </head>
  <body>
    
 <nav id ="main_navbar" class="navbar navbar-inverse">
        <div class="container-fluid">
           <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                 </button>

                <a class="navbar-brand" href="#">Volan</a>
           </div>
           <div class="collapse navbar-collapse" id="Navbar">

               <ul class="nav navbar-nav">
                 <li><a href="index.php">Home</a></li>
                 <li><a href="news.php">News</a></li>
                 <li><a href="#">Forums</a></li>
               </ul>

              <form class="navbar-form navbar-right">
                 <div class="input-group">
                   <input type="text" class="form-control" placeholder="Search">
                   <div class="input-group-btn">
                     <button class="btn btn-default" type="submit">
                       <i class="glyphicon glyphicon-search"></i>
                     </button>
                   </div>
                 </div>
             </form>

           <ul class="nav navbar-nav navbar-right">
             <?php
              $isAuth = $_SESSION['isAuth'];
              $user = $_SESSION['user'];

              if($isAuth)
              {
                echo "
                <li class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>$user
                    <span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                      <li><a href='account.php'>My profile</a></li>
                      <li><a href='#' onclick='LogOut()'>Log Out</a></li>
                    </ul>
               </li>

                ";
              }
              else
              {
                echo "

                <li class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Your Account
                    <span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                      <li><a data-toggle='modal' href='#reg_box'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                      <li><a data-toggle='modal' href='#log_box'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                     
                    </ul>
               </li>
                ";

              }

              ?>

           </ul>
          </div>
      </div>
    </nav>
    
 <div class="container">
    <div class="row">
          <div class="profile-header-container">   
          <div class="profile-header-img">
                  <img class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
                  <!-- badge -->
                  <div class="rank-label-container">
                      <span class="label label-default rank-label">100 puntos</span>
                  </div>
              </div>
          </div> 
    </div>
</div>
 <div class="well container">
   
   <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#summary">Summary</a></li>
  <li><a data-toggle="tab" href="#settings">Settings</a></li>
  <li><a data-toggle="tab" href="#gameinfo">Game Info</a></li>
</ul>

<div class="tab-content">
  <div id="summary" class="tab-pane fade in active">
    </br>
        <div class="input-group col-xs-4">
          <span class="input-group-addon">User</span>
          <input readonly type="text" class="form-control" value="<?php echo $user ?>">
        </div>
    </br>
        <div class="input-group col-xs-4">
          <span class="input-group-addon">Points</span>
          <input readonly type="text" class="form-control" value="0">
        </div>
    </br>
        <div class="input-group col-xs-4">
          <span class="input-group-addon">Rank</span>
          <input readonly type="text" class="form-control" value="Newbie">
        </div>
    
  </div>
  <div id="settings" class="tab-pane fade">
    
    </br>
        <div class="input-group">
          <span class="input-group-addon">Email</span>
          <input readonly type="text" class="form-control" value="<?php ?>">
        </div>
    </br>
        <div class="input-group">
          <span class="input-group-addon">Password</span>
          <input readonly type="text" class="form-control" value="0">
        </div>
    </br>
        <div class="input-group">
          <span class="input-group-addon">Secret Question</span>
          <input readonly type="text" class="form-control" value="">
        </div> 
    
    
  </div>
  <div id="gameinfo" class="tab-pane fade">

  </div>
</div>
   
 </div>
    
  </body>
</html>