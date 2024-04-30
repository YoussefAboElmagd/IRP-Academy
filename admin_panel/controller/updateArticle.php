<?php
    //include_once "../config/dbconnect.php";
    include_once "../../config.php";
    
        $e_art_id  = $_POST['e_art_id'];
        $e_word_art_file_old  = $_POST['e_word_art_file_old'];
        $e_art_title = $_POST['e_art_title'];
        $e_art_abstract = $_POST['e_art_abstract'];
        $e_art_keywords = $_POST['e_art_keywords'];
        $e_art_nop = $_POST['e_art_nop'];
        $e_art_status = $_POST['e_art_status'];
        //$e_word_art_file_new = $_FILES['e_word_art_file_new'];

        //if(isset($_POST['e_word_art_file_new'])){
        //    $file_destination = "../../ResearchWebsiteProject/uploads/articles/$e_word_art_file_old";
        //    move_uploaded_file($e_word_art_file_new['tmp_name'],$file_destination);
        //}









        $insert = mysqli_query($conn,"UPDATE articles SET title = '$e_art_title',abstract = '$e_art_abstract',no_of_pages = '$e_art_nop', a_status = '$e_art_status' WHERE article_id = '$e_art_id' ");


        $sql = "DELETE FROM article_keywords WHERE article_id = '$e_art_id'";
        mysqli_query($conn,$sql);

        $e_art_keywords = explode(",", $e_art_keywords);

        for($i = 0;$i < count($e_art_keywords);$i++){
            $sql = "INSERT INTO article_keywords(article_id,keyword) VALUES ('$e_art_id','$e_art_keywords[$i]')";
            mysqli_query($conn,$sql);
        }
        
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {

         }
     
    
        
?>