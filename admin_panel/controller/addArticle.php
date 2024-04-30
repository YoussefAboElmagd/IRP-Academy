<?php
    //include_once "../config/dbconnect.php";
    include_once "../../config.php";
    if(isset($_POST['add_article']))
    {
       
        $art_title = $_POST['art_title'];
        $art_abstract = $_POST['art_abstract'];
        $art_keywords = $_POST['art_keywords'];
        $art_nop = $_POST['art_nop'];
        $word_art_file = $_FILES['word_art_file'];

        $file_name_ext = explode(".", $word_art_file['name']);
        $file_ext = $file_name_ext[1];
        $final_file_name = "article_" . uniqid() . "." . $file_ext;
        //echo $final_file_name;
        $file_destination = "../../ResearchWebsiteProject/uploads/articles/$final_file_name";
        move_uploaded_file($word_art_file['tmp_name'],$file_destination);







         $insert = mysqli_query($conn,"INSERT INTO articles(title,a_type,abstract,file_name,no_of_pages,journal,created_by)
         VALUES ('$art_title','Article','$art_abstract','$final_file_name','$art_nop','Journal1','0')");

        $art_article_id = $conn->insert_id;


        $art_keywords = explode(",", $art_keywords);

        for($i = 0;$i < count($art_keywords);$i++){
            $sql = "INSERT INTO article_keywords(article_id,keyword) VALUES ('$art_article_id','$art_keywords[$i]')";
            mysqli_query($conn,$sql);
        }
        
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {

         }
     
    }
        
?>