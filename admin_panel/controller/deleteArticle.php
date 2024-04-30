<?php

    //include_once "../config/dbconnect.php";
    include_once "../../config.php";

    $a_id=$_POST['record'];
    $query="DELETE FROM articles where article_id='$a_id' ";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>