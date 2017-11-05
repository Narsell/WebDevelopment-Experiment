<?php

session_start();


   $user = $_SESSION['user'];

   if($_SESSION['isAuth'] == false)
   {
     echo"
     <script>
     window.open('index.php', '_self');
     </script>";
   }
  
require("../server.php");
$con = connect();

$sql ="select * from v_news";
$res = mysqli_query($con, $sql);

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
  
<title>Admin Panel</title>  
</head>
<body>
  </br>
  <div class="container">
    
    <ul class="nav nav-tabs justify-content-center grey lighten-4 py-4">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#n_list">News List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#article">Create Article</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#users">Users</a>
      </li>
    </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active container" id="n_list">
              
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TAG</th>
                    <th>TITLE</th>
                    <th>DESC</th>
                    <th>AUTHOR</th>
                    <th>MANAGE</th>
                  </tr>
                </thead>
            <?php
                while($data = mysqli_fetch_array($res))
                {
                  echo
                    "
                     <tbody>
                      <tr>
                        <td>".$data['id']."</td>
                        <td>".$data['tag']."</td>
                        <td>".$data['title']."</td>
                        <td>".$data['desc']."</td>
                        <td>".$data['author']."</td>
                        <td>
                            <div class='btn-group'>
                              <button class='btn btn-danger btn-sm' onclick='DeleteArticle(".$data['id'].")'><i class='fa fa-trash' aria-hidden='true'></i>
                              <button class='btn btn-info btn-sm' onclick=EditArticle(".$data['id'].")><i class='fa fa-edit' aria-hidden='true'></i>                      
                            </div>
                        </td>
                      </tr>
                     </tbody>

                    ";
                }

              ?>
              </table>

        </div>
        <div class="tab-pane container" id="article">
          </br>
                    <div class="md-form">
                      <div class="col-xs-6">
                        <input type="text" id="title" class="form-control">
                        <label for="title">TITLE</label>
                      </div>
                    </div>
                   
                     <div class="md-form">
                      <div class="col-xs-6">
                          <input type='text' id="desc" class="form-control"></textarea>
                          <label for="desc">SHORT DESCRIPTION</label>
                      </div>
                    </div>

                    <div class="md-form">
                      <div class="col-xs-6">
                          <textarea id="body" class="form-control"></textarea>
                          <label for="body">CONTENT</label>
                      </div>
                    </div>
     
                    <select id='tag' class="custom-select">
                      <option selected>Select a category</option>
                      <option value="0">Main Panel</option>
                      <option value="1">Right Panel</option>
                      <option value="2">Secondary Panel</option>
                    </select>

                    <div class="text-center">
                        <button class="btn btn-indigo" onclick="CreateArticle('<?php echo $user ?>')">Send</button>
                    </div>

                </form>        
        
        </div>
        <div class="tab-pane container" id="users">...</div>
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

