
function CreateArticle(user)
{
var title = $("#title").val();
var body = $("#body").val();
var des = $("#des").val();
var tag = $("#tag").val();
var author = user;
 
  
  if(!title || !body || !des)
  {
    alert("Fields missing");
    return;
  }
  
    var file_data = $('#img').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('title', title);
    form_data.append('body', body);
    form_data.append('des', des);
    form_data.append('tag', tag);
    form_data.append('author', author);
                            
    $.ajax({
                url: 'new_article.php', 
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response); 
                    window.open("index.php", "_self");
                }
     }); 
 
}

function DeleteArticle(id)
{
          if (confirm('Are you sure you want to delete this article?')) 
          {
                $.post("del_article.php", {id:id})
                  .done(function(data){
                    if(data) {alert(data);}
                    window.open("index.php", "_self");
                });
          } 
          else 
          {
              return;
          }
  

}

function SendId(id)
{
  window.open("edit_article.php?id="+id, "_self");  
}

function EditArticle(id)
{
          
      var title = $("#title").val();
      var des = $("#des").val();
      var body = $("#body").val();
      var tag = $("#tag").val();
 
  
              $.post("edit_article.php", {id:id, title:title, tag:tag, des:des, body:body })
                  .done(function(data){
                    if(data) {alert(data);}
                    window.open("index.php", "_self");
                });
}