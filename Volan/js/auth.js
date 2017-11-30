if(localStorage)
  {
    var user = localStorage.getItem("user");
    var pwd = localStorage.getItem("pwd");
    
    $("#l_user").val(user);
    $("#l_pwd").val(pwd);
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
      
      $.post("login.php", {user : user,  pwd : pwd})
      .done(function(data){
        if(data) {alert(data);}
        window.open("index.php", "_self");
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
      $.post("register.php", {user : user, email : email, pwd : pwd})
      .done(function(data){
        if(data) {alert(data);}
        window.open("index.php", "_self");
      });

    }
}

function LogOut()
{
  
  $.post("logout.php", {})
    .done(function(data)
      {
        if(data){alert(data);}
        window.open("index.php", "_self");
        
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


