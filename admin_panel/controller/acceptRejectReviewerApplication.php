<?php

    //include_once "../config/dbconnect.php";
    include_once "../../config.php";

    $a_id=$_POST['record'];
    $a_status=$_POST['record_status'];
    $query="UPDATE reviewers_applications SET app_status = '$a_status' WHERE application_ID='$a_id' ";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>