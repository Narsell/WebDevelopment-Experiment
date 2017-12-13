function SubmitComment(user, articleid)
{
  if(!user)
    {
      alert("Please login to make a comment!");
      return;
    }
  
  var content = $("#comment").val();
  
        $.post("submit_com.php", {user:user, articleid : articleid, content: content})
      .done(function(data){
        if(data) {alert(data);}
        window.open("article.php?id="+articleid, "_self");
      });
}