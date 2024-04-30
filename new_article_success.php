<?php
    session_start();
    require_once('config.php');
    if(!isset($_SESSION['usr_id'])){
        header("Location: login.php");
    }
    $id_usr_session = $_SESSION['usr_id'];

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
    if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
        header("Location: new_article.php");
    }
    elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_new_article'])){
        if($_POST['form_token'] != $_SESSION['form_token'])
        {
        } else {
            $article_file = $_FILES['article_file'];
            $file_name_ext = explode(".", $article_file['name']);
            $file_ext = $file_name_ext[1];
            $article_file2 = $_FILES['article_file_pdf'];
            $file_name_ext2 = explode(".", $article_file2['name']);
            $file_ext2 = $file_name_ext2[1];
            $file_uniqid = "article_" . uniqid();
            $final_file_name =  $file_uniqid . "." . $file_ext;
            $final_file_name2 = $file_uniqid . "." . $file_ext2;
            echo $final_file_name2;
            $file_destination = "uploads/articles/$final_file_name";
            $file_destination2 = "uploads/articles/$final_file_name2";
            move_uploaded_file($article_file['tmp_name'],$file_destination);
            move_uploaded_file($article_file2['tmp_name'],$file_destination2);
            extract($_POST);
            //echo $a_title;
            $sql = "INSERT INTO articles(title,a_type,abstract,file_name,no_of_pages,journal,created_by) VALUES ('$a_title','Article','$a_abstract','$file_uniqid','$a_pages_num','$journal','$id_usr_session')";
            mysqli_query($conn,$sql);

            $article_id = $conn->insert_id;


            $keywords = explode(",", $keywords);

            for($i = 0;$i < count($keywords);$i++){
                $sql = "INSERT INTO article_keywords(article_id,keyword) VALUES ('$article_id','$keywords[$i]')";
                mysqli_query($conn,$sql);
            }
        

            

            for($i = 0;$i < count($auth_fn);$i++){
                $sql = "INSERT INTO article_authors(article_id,email_address,first_name,middle_name,last_name,corresponding_author,title,country,affiliation) VALUES ('$article_id','$auth_mail[$i]','$auth_fn[$i]','$auth_mn[$i]','$auth_ln[$i]','$corres_auth[$i]','$auth_title[$i]','$auth_country[$i]','$auth_affiliation[$i]')";
                mysqli_query($conn,$sql);
            }
            for($i = 0;$i < count($rev_fn);$i++){
                $sql = "INSERT INTO article_suggested_reviewers(article_id,email_address,first_name,last_name,affiliation) VALUES ('$article_id','$rev_mail[$i]','$rev_fn[$i]','$rev_ln[$i]','$rev_affiliation[$i]')";
                mysqli_query($conn,$sql);
            }
        }
        $_SESSION['form_token'] = "";
        
    }

  


?>
    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main" id="main">




            <div class="alert alert-danger alert-dismissible fade show d-none" id="error_msg_step1" role="alert">
                <strong>Error!</strong> Please make sure that you filled all required fields.

            </div>

            <div class="alert alert-danger alert-dismissible fade fs-6 show d-none" id="error_msg_step2" role="alert">
                <strong>Error!</strong> Please select file to be uploaded.
            </div>





           


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1 id="stepTitle text-danger">Artilce is applied successfully</h1>

                            

                        </div>
        
                    </div>

                </div>

            </div>


        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script> 
    <script src="./scripts/bootstrap.bundle.min.js"></script>

</body>
</html>