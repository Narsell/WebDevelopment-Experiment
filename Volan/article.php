<?php

session_start();
require("server.php");
$con = connect();

$user = null;

if($_SESSION['isAuth'])
{
  $user = $_SESSION['user'];
}

$id = $_GET['id'];
$sql_art = "select * from news where id='$id'";
$res_art = mysqli_query($con, $sql_art);

$article = mysqli_fetch_array($res_art);

$sql_com = "select * from comments where article_id='$id'";
$res_com = mysqli_query($con, $sql_com);





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
      <link rel="stylesheet" type="text/css" href="styles/article.css">
 


  </head>
  <body>
    
    <div id='page'>
      
      
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
      
          <div class='space-md'>  </div>

            
            <div class="jumbotron" style='background-image: url("<?php echo $article['img_url'] ?>")'>
              <h1 class="display-3"><?php echo $article['title'];?></h1>
              <p class="lead"><?php echo $article['des'];?></p>
              <hr class="my-4">
              <p class="lead">
                <small>Written by <?php echo $article['author'];?></small>
              </p>
            </div>
          
         <div class='main-cont'>      
            <div class='card text'>
              <div class='card-body'>
               <?php echo $article['body'];?> 
              </div>
              
            </div>           
          <div class="space-md">
           
           </div>
           <div class='card text-center'>          

              <div class='card-body'>
                     <div class="md-form">
                       <div class="col-xs-6">
                           <textarea id="comment" class="md-textarea"></textarea>
                           <label for="comment">Write a comment!</label>
                        </div>
                     </div>
                <button class="btn btn-indigo" onclick="SubmitComment('<?php echo $user; ?>', <?php echo $id; ?>)">Submit</button>
                <hr class="my-4">
                <?php 
                while($comment = mysqli_fetch_array($res_com))
                {
                  $com_user = $comment['user'];
                  $sql = "select profile_pic from users where user ='$com_user'";
                  $re = mysqli_query($con, $sql);
                  $profile_url = mysqli_fetch_array($re);
                  
                  echo"
                      <div class='media'>
                        <img class='mr-3 rounded-circle' src='".$profile_url[0]."' style='width:121px; height: 121px;'>
                        <div class='media-body'>
                          <h5 class='mt-0'>".$com_user."</h5>
                          ".$comment['content']."
                         </div>
                      </div>
                      <hr class='my-4'>


                  ";
                }

                ?> 
              </div>
          </div>
       </div>
          
          
      
          
          
          
    </div>

      <!--OWN-->        
      <script src="js/scripts.js"></script> 
      <script src="js/auth.js"></script>
      <script src="js/comments.js"></script>
      <!--POPPER-->  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
      <!--BOOSTRAP JS-->  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <!--MDB JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>   


  
  </body>
</html>

