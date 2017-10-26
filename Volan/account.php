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
   <!--BOOSTRAP 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="styles/account.css">  
  <link rel="stylesheet" type="text/css" href="styles/main.css">
  <script src="js/auth.js"></script>
    
  </head>
  <body>

 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Volan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">News</a>
      </li>
    
    </ul>  
    
    <ul class="navbar-nav">
      <?php 
         echo"
      <li id='MyAccountDD'class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='account.php' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          $user
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
          <a class='dropdown-item' href='account.php'>My Profile</a>
          <a class='dropdown-item' href='#' onclick='LogOut()'>Log Out</a>
        </div>
      </li>";
       
       ?>
   
     </ul>
    
    <form class="form-inline my-2 my-lg-0">
            <div id="SearchBar" class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                   <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                   </button>
                </div>
           </div>
    </form>
  </div>
</nav> 
    
    
<div class="container">
    <div class="row">
          <div class="profile-header-container">   
              <div class="profile-header-img">
                  <img class="rounded-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
                  <!-- badge -->
                  <div class="rank-label-container">
                      <span class="label label-default rank-label">100 puntos</span>
                  </div>
              </div>
          </div> 
    </div>
 </div>

    
<div id="user_panel" class="container card">
 
  <div class="card-body">
   
        <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Summary</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Game Info</a>
              </li>
        </ul>
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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

              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

              </div>

          </div>
   
 </div>

   
 </div>  
   
<div style="height:1000px;">
  
</div>
    
  </body>
</html>