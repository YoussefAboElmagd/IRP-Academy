<?php

    require_once('config.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles//edit_profile.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

</head>
<body>
<?php 
    $sql = " SELECT user_email FROM users WHERE user_email = 'a@a.com' AND check_profile_complete = 0 ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        echo "your profile is not completed";
    }
    $submitted = isset($_POST['add_new_article']);
    $sub = isset($_POST['sub-corr']);
    if($sub){
        extract($_POST);
        $removedIndex = array_search('corr_yes', $corres) - 1;
        array_splice($corres, $removedIndex , 1);
        for($i = 0;$i < count($corres);$i++){
            echo $corres[$i] . "  ";
            //$sql = "INSERT INTO article_auth(auth_name,auth_mail) VALUES ('$auth_name[$i]','$auth_mail[$i]')";
            //mysqli_query($conn,$sql);
        }
    }
    if($submitted){


        $article_file = $_FILES['article_file'];
        $file_name_ext = explode(".", $article_file['name']);
        $file_ext = $file_name_ext[1];
        $final_file_name = uniqid() . "." . $file_ext;
        echo $final_file_name;
        $file_destination = "uploads/articles/$final_file_name";
        move_uploaded_file($article_file['tmp_name'],$file_destination);
        extract($_POST);
        echo $a_title;
        //$sql = "INSERT INTO articles(title,a_type,abstract,download_link,no_of_pages,journal,a_status) VALUES ('$a_title','Article','$a_abstract','$final_file_name','$a_pages_num','$journal','Pending')";
        //mysqli_query($conn,$sql);

        $keywords = explode(",", $keywords);

        for($i = 0;$i < count($keywords);$i++){
            //$sql = "INSERT INTO article_keywords(article_id,keyword) VALUES (1,'$keywords[$i]')";
            //mysqli_query($conn,$sql);
        }
       


        for($i = 0;$i < count($auth_name);$i++){
            //echo $auth_name[$i],$auth_mail[$i];
            //$sql = "INSERT INTO article_auth(auth_name,auth_mail) VALUES ('$auth_name[$i]','$auth_mail[$i]')";
            //mysqli_query($conn,$sql);
        }
        echo "success";
    }

    $query = "SELECT first_name,middle_name,last_name,user_workplace,user_job_type,user_title,facebook,twitter,user_affiliation,user_address,zip_code,city,country FROM users Where user_email='a@a.com'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($result);
    //print_r($row);


?>
    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main">

            <?php 
            
                if($submitted){
                    echo '            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
            
            ?>


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1 id="stepTitle">New Submission</h1>

                            <form class="bg-white " method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                                
                                <div class="item">
                                    <input type="hidden" name="corres[]" value="corr_no">
                                    <input type="checkbox" name="corres[]" value="corr_yes">
                                </div>
                                <div class="item">
                                    <input type="hidden" name="corres[]" value="corr_no">
                                    <input type="checkbox" name="corres[]" value="corr_yes">
                                </div>
                                <div class="item">
                                    <input type="hidden" name="corres[]" value="corr_no">
                                    <input type="checkbox" name="corres[]" value="corr_yes">
                                </div>
                                <div class="item">
                                    <input type="hidden" name="corres[]" value="corr_no">
                                    <input type="checkbox" name="corres[]" value="corr_yes">
                                </div>
                                <div class="item">
                                    <input type="hidden" name="corres[]" value="corr_no">
                                    <input type="checkbox" name="corres[]" value="corr_yes">
                                </div>
                                <div class="item">
                                    <input type="hidden" name="corres[]" value="corr_no">
                                    <input type="checkbox" name="corres[]" value="corr_yes">
                                </div>
                                <button type="submit" name="sub-corr" class="btn btn-primary ">submit</button>
                            </form>

                        </div>
        
                    </div>

                </div>

            </div>


        </div>
    </div>


</body>
</html>