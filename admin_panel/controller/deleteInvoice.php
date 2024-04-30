<?php

    include_once "../../config.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM user_payment where transaction_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Size Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>