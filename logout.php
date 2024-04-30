<?php 
session_start();
if(isset($_POST['logout_btn']) && isset($_SESSION['usr_id'])){
    session_destroy();
    header("Location: login.php");
}
else{
    header("Location: index.html");
}


?>