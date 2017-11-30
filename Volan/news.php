<?php
session_start();

require("server.php");
$con = connect();

$sql_main = "select * from news where tag='0'";
$sql_right = "select * from news where tag='1'";
$sql_sec = "select * from news where tag='2'";

$res_main = mysqli_query($con, $sql_main);
$res_right = mysqli_query($con, $sql_right);
$res_sec = mysqli_query($con, $sql_sec);

$data_main=mysqli_fetch_array($res_main);


?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Volan</title>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://use.fontawesome.com/79133ed6a3.js"></script>
    <!--BOOSTRAP CSS-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    
    <!--MDB CSS-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
     
    <!--OWN-->
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="styles/main.css">
      <link rel="stylesheet" type="text/css" href="styles/news.css">

  </head>
  <body>
  
  <div id=page> 
    
  <nav id='navbar' class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark top-navbar">
    <a class="navbar-brand" href="#">Volan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">News</a>
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

                        <div id="l_alerts"></div>
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
                    <div id="r_alerts"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

                </div>
              </div>


      <div class='space-lg'>  </div>
      <div class='main-cont container'>

         <div class="row card-deck no-gutters">


                  <?php 
                            echo
                                 "
                                     <div class='main card text-center col-sm-12 col-md-8'>
                                       <a href='article.php?id=".$data_main['id']."'><img class='img-fluid' src='http://estudiantes.is.escuelaing.edu.co/~2114604/volan/news_img/main.jpg' alt='Card image'>
                                          <div class='card-img-overlay'>


                                              <h4 class='card-title text-white'>".$data_main['title']."</h4>
                                              <p class='card-text text-white'>".$data_main['des']."</p>


                                          </div>
                                       </a>
                                     </div>
                                    
                                 ";

                      ?>

                   <div class="right-cont container col-sm-12 col-md-4 no-gutters">                

                          <?php
                              $test = 0;
                              while($data_right=mysqli_fetch_array($res_right))
                              {
                                       echo"<a href='article.php?id=".$data_right['id']."'>
                                               <div class='right card text-center'>
                                                   <img class='img-fluid' src='http://estudiantes.is.escuelaing.edu.co/~2114604/volan/news_img/kek.jpg' alt='Card image'>
                                                    <div class='card-img-overlay'>
                                                      <h4 class='card-title text-white'>".$data_right['title']."</h4>                                                                  
                                                      <p class='card-text text-white'>".$data_right['des']."</p>
                                                    </div>
                                                 </div>
                                              </a>
                                       ";
                                if($test == 0){echo"<div class='space-sm'></div>";}
                                $test++;
                              } 


                          ?>


                     </div>
    </div>
        
         <div class='space-md'>  </div>
        
         <div class='row justify-content-between no-gutters'>  
            <?php
              while($data_sec = mysqli_fetch_array($res_sec))
              {
                       echo
                         " <div class='sec-panel card bg-dark text-white text-center col-md-5 col-lg-3'>
                              <a href='article.php?id=".$data_right['id']."'>
                               <img class='card-img' src='https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-529639.jpg' alt='Card image'>
                                <div class='card-img-overlay'>
                                  <h4 class='card-title text-white'>".$data_sec['title']."</h4>
                                  <p class='card-text text-white' >".$data_sec['des']."</p>
                                </div>
                                <div class='card-footer'>
                                  <small class='text-muted'>Written by: ".$data_sec['author']."</small>
                                </div>
                               </a>
                            </div>
                          



                         ";      

              }

             ?>
         </div>

  </div>
  </div>
     
  <script src="js/scripts.js"></script> 
  <script src="js/auth.js"></script>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <!--MDB JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>   
    <!--OWN-->        

 




  </body>
</html>
