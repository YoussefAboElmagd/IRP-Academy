<?php
    include_once "../../config.php";

        $e_news_id = $_POST['e_news_id'];
        $e_news_title = $_POST['e_news_title'];
        $e_news_content = $_POST['e_news_content'];

    $updateItem = mysqli_query($conn,"UPDATE news SET 
        title='$e_news_title', 
        content='$e_news_content' 
        WHERE news_id = '$e_news_id' ");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>