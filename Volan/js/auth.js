if(localStorage)
  {
    var user = localStorage.getItem("user");
    var pwd = localStorage.getItem("pwd");
    
    $("#l_user").val(user);
    $("#l_pwd").val(pwd);
  }

function ChangePic(username)
{
  if(!$("#img").val())
    {
      return;
    }
  
    var file_data = $('#img').prop('files')[0];   
    var form_data = new FormData();      
    
  
  var user = username;
  
    form_data.append('file', file_data);
    form_data.append('user', user);
     $(".loading").html("<img src='../img/loading.gif' style='width: 50px;'>");
      $.ajax({
                url: 'update_pic.php', 
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response); 
                    location.reload();
                }
     }); 
}
function LogValidate()
{
    var user = $("#l_user").val();
    var pwd = $("#l_pwd").val();
    var remember = document.getElementById("remember").checked;
     
    if(!user || !pwd)
    {
        $("#l_alerts").html("<div class='alert alert-danger alert-dismissable fade show'>\
        <button type='button' class='close' data-dismiss='alert'>&times;</button>\
        <strong>Fields missing!</strong></div>");

    }
    else
    {
        if(remember)
        {
          localStorage.setItem("user", user);
          localStorage.setItem("pwd", pwd);
        }
      
      $("#l_loading").html("<img src='../img/loading.gif' style='width: 50px;'>");   
      $.post("login.php", {user : user,  pwd : pwd})
      .done(function(data){
        if(data) {alert(data);}
        location.reload();
      });
    }

}

function RegValidate()
{
 var user = $("#r_user").val();
 var pwd = $("#r_pwd").val();
 var pwd2 = $("#r_2pwd").val();
 var email = $("#r_email").val();
  
    if(!user || !pwd || !pwd2 || !email)
    {
         $("#r_alerts").html("<div class='alert alert-danger alert-dismissable fade show'>\
        <button type='button' class='close' data-dismiss='alert'>&times;</button>\
        <strong>Fields missing!</strong></div>"); 
    }
    else if(user.length < 5)
      {
          $("#r_alerts").html("<div class='alert alert-danger alert-dismissable fade show'>\
        <button type='button' class='close' data-dismiss='alert'>&times;</button>\
        <strong>User must be at least 5 characters long!</strong></div>");        
      }
        else if(pwd.length < 5)
      {
          $("#r_alerts").html("<div class='alert alert-danger alert-dismissable fade show'>\
        <button type='button' class='close' data-dismiss='alert'>&times;</button>\
        <strong>Password must be at least 5 characters long!</strong></div>");        
      }
      else if(!hasNumber(pwd))
      {
          $("#r_alerts").html("<div class='alert alert-danger alert-dismissable fade show'>\
        <button type='button' class='close' data-dismiss='alert'>&times;</button>\
        <strong>Password must have numeric characters!</strong></div>");        
      }

       else if(pwd != pwd2)
      {
          $("#r_alerts").html("<div class='alert alert-danger alert-dismissable fade show'>\
          <button type='button' class='close' data-dismiss='alert'>&times;</button>\
          <strong>Passwords do not match!</strong></div>");

      }

    
  else
    {
      $("#r_loading").html("<img src='../img/loading.gif' style='width: 50px;'>");   
      $.post("register.php", {user : user, email : email, pwd : pwd})
      .done(function(data){
        if(data) {alert(data);}
        $('#reg_box').modal('hide');
      });

    }
}

function LogOut()
{
  
  $.post("logout.php", {})
    .done(function(data)
      {
        if(data){alert(data);}
        location.reload();
        
      });
}

function ChangeEmail()
{
  alert("change email")
}

function hasNumber(myString) 
{
  return /\d/.test(myString);
}


