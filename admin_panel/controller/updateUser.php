<?php
    include_once "../../config.php";


    $e_user_id = $_POST['e_user_id'];
    $e_f_name = $_POST['e_f_name'];
    $e_m_name = $_POST['e_m_name'];
    $e_l_name = $_POST['e_l_name'];
    $e_email= $_POST['e_email'];
    $e_pass= $_POST['e_pass'];
    $e_u_role= $_POST['e_u_role'];
    $e_u_workplace= $_POST['e_u_workplace'];
    $e_job_type= $_POST['e_job_type'];
    $e_title = $_POST['e_title'];
    $e_facebook = $_POST['e_facebook'];
    $e_twitter = $_POST['e_twitter'];
    $e_affiliation = $_POST['e_affiliation'];
    $e_address = $_POST['e_address'];
    $e_zip_code = $_POST['e_zip_code'];
    $e_city = $_POST['e_city'];
    $e_country = $_POST['e_country'];
   



     $update = mysqli_query($conn," UPDATE users SET 
      user_email='$e_email',
      first_name='$e_f_name',
      middle_name='$e_m_name',
      last_name='$e_l_name',
      user_password='$e_pass',
      user_title='$e_title',
      country='$e_country',
      user_affiliation='$e_affiliation',
      user_type='$e_u_role',
      user_workplace='$e_u_workplace',
      user_job_type='$e_job_type',
      facebook='$e_facebook',
      twitter='$e_twitter',
      user_address='$e_address',
      zip_code='$e_zip_code',
      city='$e_city' 
      WHERE user_id = '$e_user_id' ");

     if(!$update)
     {
         echo mysqli_error($conn);
     }
     else
     {

     }
 





?>