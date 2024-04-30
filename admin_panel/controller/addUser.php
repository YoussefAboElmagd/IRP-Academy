<?php
include_once "../../config.php";
if(isset($_POST['add_user']))
{
   
    $user_id = $_POST['user_id'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $email= $_POST['email'];
    $pass= $_POST['pass'];
    $u_role= $_POST['u_role'];
    $u_workplace= $_POST['u_workplace'];
    $job_type= $_POST['job_type'];
    $title = $_POST['title'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $affiliation = $_POST['affiliation'];
    $address = $_POST['address'];
    $zip_code = $_POST['zip_code'];
    $city = $_POST['city'];
    $country = $_POST['country'];
   
    echo "<script>alert($user_id)</script>";




    $insert = mysqli_query($conn,"INSERT INTO Users ( user_email ,user_id , first_name , middle_name , last_name , user_password ,
     user_title,country,user_affiliation ,user_type,user_workplace,user_job_type,facebook,twitter,user_address,zip_code,city)
     VALUES ('$email','$user_id','$f_name','$m_name','$l_name','$pass','$title','$country','$affiliation' ,'$u_role','$u_workplace'
                ,'$job_type','$facebook','$twitter','$address','$zip_code','$city')");

     if(!$insert)
     {
         echo mysqli_error($conn);
     }
     else
     {

     }
 
}




?>