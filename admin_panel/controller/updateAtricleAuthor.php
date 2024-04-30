<?php
    include_once "../../config.php";

        echo "welcome";
        $e_article_id = $_POST['e_article_id'];
        $e_f_name = $_POST['e_f_name'];
        $e_m_name = $_POST['e_m_name'];
        $e_l_name = $_POST['e_l_name'];
        $e_a_mail = $_POST['e_a_mail'];
        $e_corres_auth = $_POST['e_corres_auth'];
        $e_a_title = $_POST['e_a_title'];
        $e_affiliation = $_POST['e_affiliation'];
        $e_country = $_POST['e_country'];

    $updateItem = mysqli_query($conn,"UPDATE article_authors SET 
        first_name='$e_f_name', 
        middle_name='$e_m_name', 
        last_name='$e_l_name',
        email_address='$e_a_mail',
        corresponding_author='$e_corres_auth',
        title='$e_a_title', 
        country='$e_country', 
        affiliation='$e_affiliation' 
        WHERE article_id= '$e_article_id' AND email_address = '$e_a_mail' ");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>