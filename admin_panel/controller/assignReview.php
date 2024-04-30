<?php
    //include_once "../config/dbconnect.php";
    include_once "../../config.php";
    if(isset($_POST['assign_review']))
    {
       
        $article_id = $_POST['article_id'];
        $rev_mail = $_POST['rev_mail'];
       
        $result = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$rev_mail' ");

        $row = $result -> fetch_assoc();
        
        $rev_id = $row['user_id'];




         $insert = mysqli_query($conn,"INSERT INTO article_reviews(reviewer_id,article_id) 
         VALUES ('$rev_id','$article_id')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {

         }
     
    }
    else{
        header("location: ../../index.php");
    }
        
?>