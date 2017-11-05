
function CreateArticle(user)
{
title = $("#title").val();
body = $("#body").val();
desc = $("#desc").val();
tag = $("#tag").val();
author = user;
  
  if(!title || !body)
  {
    alert("Fields missing");
    return;
  }
      $.post("new_article.php", {tag:tag, title:title,  desc:desc, body:body, author:author})
        .done(function(data){
          if(data) {alert(data);}
          window.open("admin.php", "_self");
      });
 
}

function DeleteArticle(id)
{
          if (confirm('Are you sure you want to delete this article?')) 
          {
                $.post("del_article.php", {id:id})
                  .done(function(data){
                    if(data) {alert(data);}
                    window.open("admin.php", "_self");
                });
          } 
          else 
          {
              return;
          }
  

}