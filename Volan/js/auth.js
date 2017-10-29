
function LogValidate()
{
    user = $("#l_user").val();
    pwd = $("#l_pwd").val();

    if(!user || !pwd)
    {
        $("#l_alerts").html("<div class='alert alert-warning fade in'>\
      <strong>Warning!</strong> Fields missing.\
      </div>");

    }
    else
    {
      $.post("login.php", {user : user,  pwd : pwd})
      .done(function(data){
        if(data) {alert(data);}
        window.open("index.php", "_self");
      });
    }

}

function RegValidate()
{
  user = $("#r_user").val();
  pwd = $("#r_pwd").val();
  email = $("#r_email").val();

  if(!user || !pwd || !email)
    {
       $("#r_alerts").html("<div class='alert alert-warning fade in'>\
      <strong>Warning!</strong> Fields missing.\
      </div>");
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
