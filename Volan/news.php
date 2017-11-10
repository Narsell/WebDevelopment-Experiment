<?php
session_start();

require("server.php");
$con = connect();

if(!$_SESSION)
{
  
}


$sql_main = "select * from news where tag='0'";
$sql_right = "select * from news where tag='1'";
$sql_sec = "select * from news where tag='2'";

$res_main = mysqli_query($con, $sql_main);
$res_right = mysqli_query($con, $sql_right);
$res_sec = mysqli_query($con, $sql_sec);

$data_main=mysqli_fetch_array($res_main);
$data_right=mysqli_fetch_array($res_right);

?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Volan</title>
    
      <script src="https://use.fontawesome.com/79133ed6a3.js"></script>
    
    <!--BOOSTRAP CSS-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    
    <!--MDB CSS-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
     
    <!--OWN-->
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="styles/main.css">

  </head>
  <body>
   <!-- <header class="jumbotron text center">
        <h1>Volan Studios</h1>
        <h3>Nullam vel accumsan enim</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel egestas velit.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel egestas velit lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        <button id="dw_button"type="button" class="btn btn-success">Download</button>
      
    </header>-->

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
      </div>
    </nav>    
   
    <div class="modal fade" id="log_box" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">

              <form class="form" action="login.php" method="post" id="log_form">

                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="l_user" name="l_user" type="text" class="form-control" placeholder="User">
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="l_pwd" name="l_pwd" type="password" class="form-control" placeholder="Password">
                  </div>

                 <button type="button" class="btn btn-success mod_buttons" onclick="LogValidate()">Enter</button>
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
      
    <div class="modal fade" id="reg_box" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign Up</h4>
              </div>
              <div class="modal-body">
                <form class="form" action="register.php" method="post" id="reg_form">

                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="r_user" name="r_user" type="text" class="form-control" placeholder="User">
                      </div>

                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="r_pwd" name="r_pwd" type="password" class="form-control" placeholder="Password">
                      </div>

                       <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="r_email" name="r_email" type="email" class="form-control" placeholder="Email">
                      </div>


                     <button type="button" class="btn btn-success mod_buttons" onclick="RegValidate()">Enter</button>
                </form>
                <div id="r_alerts"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

            </div>
          </div>
    
<div class='container top-lg'>
      
      <div class="row card-deck no-gutters">
    
          
                <?php 
                          echo
                               "
                                 <div class='main card text-center col-8'>
                                    <img class='img-fluid' src='img/sylvanas1.jpg' alt='Card image'>
                                    <div class='card-img-overlay'>


                                        <h4 class='card-title text-white'>".$data_main['title']."</h4>
                                        <p class='card-text text-white'>".$data_main['des']."</p>


                                    </div>
                                 </div>
                               ";

                    ?>
                  
                 <div class="container col-4 no-gutters">                
                       
                        <?php
                                     echo"<div class='right card text-center col-12  '>
                                            <img class='card-img img-fluid' src='img/sylvanas1.jpg' alt='Card image'>
                                              <div class='card-img-overlay'>
                                                <h4 class='card-title text-white'>".$data_right['title']."</h4>                                                                  
                                                <p class='card-text text-white'>".$data_right['des']."</p>
                                              </div>
                                           </div>
                                          
                                           <div class='card text-center col-12 '>
                                            <img class='card-img img-fluid' src='img/sylvanas1.jpg' alt='Card image'>
                                              <div class='card-img-overlay'>
                                                <h4 class='card-title text-white'>".$data_right['title']."</h4>                                                                  
                                                <p class='card-text text-white'>".$data_right['des']."</p>
                                              </div>
                                           </div>
                                     ";
                          ?>

                
                   </div>
  </div>
        
        <div class='card-columns top-md'>  
          <?php
            while($data_sec = mysqli_fetch_array($res_sec))
            {
                     echo
                       "

                          <div class='card bg-dark text-white text-center'>
                            <img class='card-img' src='https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-529639.jpg' alt='Card image'></a>
                            <div class='card-img-overlay'>
                              <h4 class='card-title text-white'>".$data_sec['title']."</h4>
                              <p class='card-text text-white' >".$data_sec['des']."</p>
                            </div>
                            <div class='card-footer'>
                              <small class='text-muted'>Written by: ".$data_sec['author']."</small>
                            </div>
                          </div>


                       ";      

            }

           ?>
       </div>

</div>

     


  <!--BOOSTRAP, JQUYERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <!--MDB JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>   
    <!--OWN-->        
  <script src="js/auth.js"></script>
  <script src="js/affix.js"></script>   
 




  </body>
</html>
