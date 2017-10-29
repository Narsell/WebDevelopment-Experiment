<?php
session_start();

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
    <header id='header' class="jumbotron text center">
        <h1>Volan Studios</h1>
        <h3>Nullam vel accumsan enim</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel egestas velit.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel egestas velit lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        <button id="dw_button"type="button" class="btn btn-success">Download</button>
      
    </header>
    

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <a class="nav-link" href="#">News</a>
      </li>
    
      
    </ul>  

           <ul class="navbar-nav">
             <?php
              $isAuth = $_SESSION['isAuth'];
              $user = $_SESSION['user'];

              if($isAuth)
              {
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

<div id="affix_box" style="height:50px">
      
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
      
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="https://cdn2.unrealengine.com/ueOverview%2FnewAssets%2Fmarketplace2-min-1792x836-c55ccd6012fc8b4285af7493686954fb1b0353a7.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://cdn2.unrealengine.com/ueOverview%2FnewAssets%2FPersona2-min-1792x836-90c2b6654da50a2b17fe492a64cb229168d2a618.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://cdn2.unrealengine.com/ueOverview%2Ffeatures%2Ffeature-3-min-1792x836-0c386308dd7c424ff8c9e52a5aed6afaf798dc69.jpg" alt="Third slide">
                </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
  </div>  
    
    <div style="height:1000px;">  </div>

  <!--OWN-->    
  <script src="js/auth.js"></script>
  <script src="js/affix.js"></script>
  <!--BOOSTRAP, JQUYERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <!--MDB JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>    
  </body>
</html>
