<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        echo "<script>console.log('hello');</script>";
        $catname = $_POST['c_name'];
       
         $insert = mysqli_query($conn,"INSERT INTO category
         (category_name) 
         VALUES ('$catname')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?category=error");
         }
         else
         {
             //header("Location: ../index.php?category=success");
         }
     
    }
        
?>