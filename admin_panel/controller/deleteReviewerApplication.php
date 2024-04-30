<?php

    include_once "../../config.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM reviewers_applications where application_ID='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Size Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>