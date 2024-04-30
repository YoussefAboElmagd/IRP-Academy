<?php
    //include_once "../config/dbconnect.php";
    include_once "../../config.php";
    if(isset($_POST['add_author']))
    {
       
        $article_id = $_POST['article_id'];
        $f_name = $_POST['f_name'];
        $m_name = $_POST['m_name'];
        $l_name = $_POST['l_name'];
        $a_mail= $_POST['a_mail'];
        $corres_auth = $_POST['corres_auth'];
        $a_title = $_POST['a_title'];
        $affiliation = $_POST['affiliation'];
        $country = $_POST['country'];
       
        echo "<script>alert($article_id)</script>";




         $insert = mysqli_query($conn,"INSERT INTO article_authors 
         VALUES ('$a_mail','$article_id','$f_name','$m_name','$l_name','$corres_auth','$a_title','$country','$affiliation')");
 
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