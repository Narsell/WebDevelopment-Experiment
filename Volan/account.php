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


$sql = "select * from users where user = '$user'";
$res = mysqli_query($con, $sql);
$data = mysqli_fetch_array($res);

$points = $data["points"];
$email = $data["email"];
$rank = $data["rank"];

$sql = "select * from ranks where rank = '$rank'";
$res = mysqli_query($con, $sql);
$data_icon = mysqli_fetch_array($res);

$rank_icon = $data_icon['icon'];

?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Volan</title>

    <script src="https://use.fontawesome.com/79133ed6a3.js"></script>
    
    <!--BOOSTRAP CSS-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    
    <!--MDB CSS-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
     
    <!--OWN-->
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="styles/main.css">
      <link rel="stylesheet" type="text/css" href="styles/account.css">
    
    
  </head>
  <body>
    <div id="page">
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark top-navbar">
      <a class="navbar-brand" href="#">Volan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="news.php">News</a>
                </li>


              </ul>  

               <ul class="navbar-nav">
                 <?php
                  $user = $_SESSION['user'];

                    echo"
                      <li class='MyAccountDD nav-item active dropdown'>
                        <a class='nav-link dropdown-toggle waves-effect waves-light' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          $user
                        </a>
                        <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink'>
                          <a class='dropdown-item' href='account.php'>My Profile</a>
                          <a class='dropdown-item' href='#' onclick='LogOut()'>Log Out</a>
                        </div>
                      </li>";

                  ?>

               </ul>

           <form class="form-inline">            
                    <input class="form-control mr-sm-2 "type="text"  class="form-control" placeholder="Search" aria-label="Search">

           </form>

     </div>

        </nav>
      <div class='space-lg'> </div>  
      <div class="container">
          <div class="row">
                <div class="profile-header-container">
                       <!-- user badge -->

                    <div class="profile-header-img">
                       <div class="user-label-container">
                          <span class="label label-default rank-label"> <?php echo $user?></span>
                       </div>
                        <img class="rounded-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
                        <!-- points badge -->
                        <div class="rank-label-container">
                          <span class="label label-default rank-label" data-toggle='tooltip' data-placement='right' title='<?php echo $rank ?>'><i class='fa fa-<?php echo $rank_icon ?>' aria-hidden='true'></i></span>
                                 
                      </div>
                    </div>
                </div> 
          </div>
       </div>
      <div class="container">

            <div id="user_panel" class="card ">
                  <div class="card-header"> 
                    User Panel
                  </div>
                  <div class="card-body">
                          <div class="tab-content" id="UserTabContent">

                                <div class="col-lg-10 us_elements">
                                  <div class="input-group">
                                    <input readonly type="text" class="form-control" value="<?php echo $email?>">
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Change your email." type="button" onclick='ChangeEmail()'><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    </span>
                                  </div>
                                </div>

                          </div>

                 </div>


            </div>  
      </div>    
      <div style="height:1000px;">

      </div>
   </div>
     
     

  <!--BOOSTRAP, JQUYERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <!--MDB JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.10.1/umd/popper.min.js"></script>
    <!--OWN-->    
  <script src="js/auth.js"></script>
  <script src="js/scripts.js"></script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


  </body>
</html>