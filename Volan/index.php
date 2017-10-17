<?php
session_start();

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

      <link rel="stylesheet" type="text/css" href="styles.css">
      <script src="auth.js"></script>
      <script src="affix.js"></script>

  </head>
  <body>
    <header class="jumbotron text center">
        <h1>Volan Studios</h1>
        <h3>Nullam vel accumsan enim</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel egestas velit.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel egestas velit lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        <button id="dw_button"type="button" class="btn btn-success">Download</button>
      
    </header>
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
                 <li class="active"><a href="#">Home</a></li>
                 <li><a href="#">News</a></li>
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
                      <li><a href='#'>Settings</a></li>
                      <li><a href='#'>My profile</a></li>
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
    <div id="affix_box" style="height:50px">
      
    </div>

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
    
    <div id="Carousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                  <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#Carousel" data-slide-to="1"></li>
                  <li data-target="#Carousel" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                  <div class="item active">
                    <img src="https://cdn2.unrealengine.com/ueOverview%2FnewAssets%2Fmarketplace2-min-1792x836-c55ccd6012fc8b4285af7493686954fb1b0353a7.jpg" alt="1">
                  </div>
                
                  <div class="item">
                    <img src="https://cdn2.unrealengine.com/ueOverview%2FnewAssets%2FPersona2-min-1792x836-90c2b6654da50a2b17fe492a64cb229168d2a618.jpg" alt="2">
                  </div>

                  <div class="item">
                    <img src="https://cdn2.unrealengine.com/ueOverview%2Ffeatures%2Ffeature-3-min-1792x836-0c386308dd7c424ff8c9e52a5aed6afaf798dc69.jpg" alt="3">
                  </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#Carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#Carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
    </div>
    
    
        
<div style="height:2000px">

</div>

 




  </body>
</html>
