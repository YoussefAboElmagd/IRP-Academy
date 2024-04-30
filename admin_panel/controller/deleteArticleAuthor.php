<?php

    //include_once "../config/dbconnect.php";
    include_once "../../config.php";

    $a_id=$_POST['record'];
    $a_auth=$_POST['record_auth_mail'];
    $query="DELETE FROM article_authors WHERE email_address='$a_auth' AND article_id='$a_id' ";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>