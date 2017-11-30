<?php

session_start();


   $user = $_SESSION['user'];

   if($_SESSION['isAuth'] == false)
   {
     echo"
     <script>
     window.open('../index.php', '_self');
     </script>";
   }
  
require("../server.php");
$con = connect();

/*EDITING THE THING*/

if($_POST)
{
 
  $id = $_POST['id'];
  $tag =$_POST['tag'];
  $title = $_POST['title'];
  $des = $_POST['des'];
  $body = $_POST['body'];
  
  $sql = "update news set title='$title', des='$des', tag='$tag', body='$body' where id='$id'";
  $res = mysqli_query($con, $sql);
  if($res)
  {
    echo"Article updated.";
  }
  else
  {
    echo"Error, contact an admin.";
  }
  return;
}
/*DISPLAYING THE THING*/
else
{
    
    $id = $_GET['id'];

    $sql = "select * from news where id='$id'";
    $res = mysqli_query($con, $sql);

    $data = mysqli_fetch_array($res);
    $title = $data['title'];
    $des = $data['des'];
    $body = $data['body'];  
    $tag = $data['tag'];

    if($tag == 0)
    {
      $tag = "Main Panel";
    }
    else if ($tag == 1)
    {
      $tag = "Right Panel";
    }
    else{
      $tag = "Secondary Panel";
    }
}
?>

<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <script src="https://use.fontawesome.com/79133ed6a3.js"></script>
    <!--BOOSTRAP CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    
    <!--MDB CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
  
  
<title>Edit Article</title>  
</head>
<body>
    
  </br>
  <div class="container card">
    <div class="card-body">
                    <div class="md-form">
                      <div class="col-xs-6">
                        <input type="text" id="title" class="form-control" value="<?php echo $title?>">
                        <label for="text">TITLE</label>
                      </div>
                    </div>
                   
                     <div class="md-form">
                      <div class="col-xs-6">
                          <input type='text' id="des" class="form-control" value="<?php echo $des?>">
                          <label for="des">SHORT DESCRIPTION</label>
                      </div>
                    </div>

                    <div class="md-form">
                      <div class="col-xs-6">
                          <textarea id="body" class="form-control" ><?php echo $body?></textarea>
                          <label for="body">CONTENT</label>
                      </div>
                    </div>
     
                    <select id='tag' class="custom-select">
                      <option selected><?php echo $tag?></option>
                      <option value="0">Main Panel</option>
                      <option value="1">Right Panel</option>
                      <option value="2">Secondary Panel</option>
                    </select>
              
                    

                    <div class="text-center">
                        <button class="btn btn-indigo" onclick="EditArticle(<?php echo $id?>)">Update</button>
                    </div>
    </div>
  </div>

   <!--BOOSTRAP, JQUYERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <!--MDB JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>    
  <!--OWN-->
  <script src="admin.js"></script>
   
</body>
</html>

