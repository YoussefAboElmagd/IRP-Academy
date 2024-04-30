<?php




    extract($_POST);



if(preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i",$usr_mail)){
    //echo "Success";
}
else{
    //echo "Invalid Email!";
}

if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/i",$usr_pass)){
    //echo "Success";
}
else{
    //echo "Invalid Email!";
}



?>