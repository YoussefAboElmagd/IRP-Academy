<?php
    include_once "../../config.php";
    if(isset($_POST['create_news']))
{
   
    $news_title = $_POST['news_title'];
    $news_content = $_POST['news_content'];

   




    $insert = mysqli_query($conn,"INSERT INTO news (title, content)
     VALUES ('$news_title','$news_content')");

     if(!$insert)
     {
         echo mysqli_error($conn);
     }
     else
     {

     }
 
}




?>