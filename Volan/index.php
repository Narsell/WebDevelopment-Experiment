<?php
session_start();

if(!$_SESSION)
{
  $_SESSION['isAuth'] = null;
}

?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Volan</title>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!--ICONS-->
      <script src="https://use.fontawesome.com/79133ed6a3.js"></script>
      <!--BOOSTRAP CSS-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    
      <!--MDB CSS-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
     
      <!--OWN-->
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="styles/main.css">
      <link rel="stylesheet" type="text/css" href="styles/index.css">
 


  </head>
  <body>
    
  <div id='page'>
      <nav id='navbar' class="navbar fixed-top navbar-expand-lg navbar-dark top-navbar">
      <a class="navbar-brand" href="#">Volan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.php">News</a>
          </li>


        </ul>  

               <ul class="navbar-nav">
                 <?php


                  if($_SESSION['isAuth'])
                  {
                    $user = $_SESSION['user'];
                    echo"
                      <li class='MyAccountDD nav-item dropdown'>
                        <a class='nav-link dropdown-toggle waves-effect waves-light' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          $user
                        </a>
                        <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink'>
                          <a class='dropdown-item' href='account.php'>My Profile</a>
                          <a class='dropdown-item' href='#' onclick='LogOut()'>Log Out</a>
                        </div>
                      </li>";
                  }
                  else
                  {
                    echo "

                        <li class='nav-item dropdown'>
                          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fa fa-user'></i>
                          </a>
                          <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='#' data-toggle='modal' data-target='#log_box'>Login</a>
                            <a class='dropdown-item' href='#' data-toggle='modal' data-target='#reg_box'>Sign Up</a>
                          </div>
                        </li>
                    ";

                  }

                  ?>

               </ul>

           <form class="form-inline">            
                    <input class="form-control mr-sm-2 "type="text" class="form-control" placeholder="Search" aria-label="Search">
           </form>

              </div>
          
        </nav> 
      <div id="video_slide" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="video">
                      <video autoplay loop>
                          <source src="video/1.mp4" type="video/mp4"/>
                      </video>
                </div>
                <div class="image">
                   <img class="d-block" src="https://bnetcmsus-a.akamaihd.net/cms/template_resource/97IJ4U1G9AV41509583487500.jpg" alt="kok">
                </div>        
           </div>
        </div>
    </div>

        <div class="modal" tabindex='-1' id="log_box" role="dialog">
            <div class="modal-dialog" role='document'>

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
                </div>
                <div class="modal-body">

                  <form class="form">

                      <div class="md-form">
                        <i class="fa fa-user-circle prefix"></i>
                        <input id="l_user" type="text" class="form-control">
                        <label for="l_user">User</label>                        
                      </div>

                      <div class="md-form">
                        <i class="fa fa-unlock-alt prefix"></i>
                        <input id="l_pwd" type="password" class="form-control">
                        <label for="l_pwd">Password</label>
                      </div>
                    
                                          
                       <button type="button" class="btn btn-success" onclick="LogValidate()">Enter</button>                   
                       <input type="checkbox" id="remember">
                       <label for="remember">Remember me</label>

                  </form>
                    <div class='text-center'>
                        <div id="l_loading"></div>
                        <div id="l_alerts"></div>                     
                    </div>

                </div>

                <div class="modal-footer">
                  <a href="#">Lost your password?</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

              </div>


              </div>

            </div>

        <div class="modal" tabindex='-1' id="reg_box" role="dialog">
              <div class="modal-dialog" role='document'>

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Sign Up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </div>
                  <div class="modal-body">
                    <form class="form">

                        <div class="md-form">
                          <i class="fa fa-user-circle prefix"></i>
                          <input id="r_user" type="text" class="form-control">
                          <label for="r_user">User</label>                        
                        </div>

                        <div class="md-form">
                          <i class="fa fa-unlock-alt prefix"></i>
                          <input id="r_pwd" type="password" class="form-control">
                          <label for="r_pwd">Password</label>
                        </div>
                        <div class="md-form">
                          <i class="fa fa-unlock-alt prefix"></i>
                          <input id="r_2pwd" type="password" class="form-control">
                          <label for="r_2pwd">Confirm Password</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input id="r_email" type="email" class="form-control validate">
                             <label for="r_email" data-error="Wrong" data-success="Correct">Email</label>
                        </div>

                        <button type="button" class="btn btn-success" onclick="RegValidate()">Enter</button>

                    </form>
                    
                    <div class='text-center'>
                        <div id="r_loading"></div>
                        <div id="r_alerts"></div>                     
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

                </div>
              </div>

        <div style="height:1000px;">  </div>
    </div>


      <!--OWN-->        
      <script src="js/scripts.js"></script> 
      <script src="js/auth.js"></script>
      <!--POPPER-->  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
      <!--BOOSTRAP JS-->  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <!--MDB JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>   


  
  </body>
</html>
