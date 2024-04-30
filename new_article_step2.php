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
    $submitted = isset($_POST['add_auths']);
    if($submitted){
        extract($_POST);

        


        for($i = 0;$i < count($auth_name);$i++){
            echo $auth_name[$i],$auth_mail[$i];
            $sql = "INSERT INTO author_article(author_id,article_id) VALUES ('$auth_name[$i]','$auth_mail[$i]')";
            mysqli_query($conn,$sql);
        }
        echo "success";
    }

    //$query = "SELECT first_name FROM users Where user_email='a@a.com'";
    //$result = mysqli_query($conn,$query);
    //$row = mysqli_fetch_row($result);
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

                            <h1>New Submission - Input Article Details | Step 1</h1>

                            <form class="bg-white " method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div>
                                    <fieldset>
                                        <legend>Input Article details ...</legend>
                                        <div class="row"> 
                                            <div class="col-md-10 mx-auto">
                                                <div class="inputs py-5">


                                                    <div id="show_authors" class="">

                                                        <div class="auth_inp article-inp mb-4">
                                                            
                                                            <div class="row align-items-baseline border border-2 rounded-2 p-2 ">
                                                                <h4 class="text-center">Author 1</h4>
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto " for="email"><sup>*</sup>Author Name</label>
                                                                </div>
                                                                <div class="col-md-7 p-0 mb-3 ">
                                                                    <input class="form-control" name="auth_name[]" type="text" required>
                                                                </div>

                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto " for="email"><sup>*</sup>Author Email</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <input class="form-control" name="auth_mail[]" type="text" required>
                                                                </div>
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <button name="add_more" class="btn mt-2  py-2 add_auth_btn">Add More</button>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>


                                                   

                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <button type="submit" name="add_auths" class="btn w-25 mt-2 mb-4 py-2">Add Authors</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    


                                                </div>
                                            </div>
                                        </div>

                                        
                                    </fieldset>
                                </div>
                            </form>

                        </div>
        
                    </div>

                </div>

            </div>


        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script> 
    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.add_auth_btn').click(function(e){
                e.preventDefault();
                $('#show_authors').append(`
                
                    <div class="auth_inp article-inp mb-4">
                                                                
                        <div class="row align-items-baseline border border-2 rounded-2 p-2 ">
                            <h4 class="text-center">Author</h4>
                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto " for="email"><sup>*</sup>Author Name</label>
                            </div>
                            <div class="col-md-7 p-0 mb-3 ">
                                <input class="form-control" name="auth_name[]" type="text" required>
                            </div>

                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto " for="email"><sup>*</sup>Author Email</label>
                            </div>
                            <div class="col-md-7 p-0">
                                <input class="form-control" name="auth_mail[]" type="text" required>
                            </div>
                            <div class="col-md-3 p-0 text-end me-3">
                            </div>
                            <div class="col-md-7 p-0">
                                <button name="remove" class="btn mt-2  py-2 remove_auth_btn">Remove</button>
                            </div>

                        </div>
                    </div>

                `);
            });

            $(document).on('click','.remove_auth_btn',function(e){
                e.preventDefault();
                let auth_inp = $(this).parent().parent().parent();
                $(auth_inp).remove();
            });    
        });   
    </script>
</body>
</html>