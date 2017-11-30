function SubmitComment(articleid)
{
  if(!user)
    {
      alert("Please login to comment");
      return;
    }
  
  var content = $("#comment").val();
  
        $.post("submit_com.php", {articleid : articleid, content: content})
      .done(function(data){
        if(data) {alert(data);}
        window.open("article.php?id="+articleid, "_self");
      });
}