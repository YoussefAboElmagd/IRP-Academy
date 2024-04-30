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
    extract($_POST);
    echo $keywords;
    $sql = " SELECT user_email FROM users WHERE user_email = 'a@a.com' AND check_profile_complete = 0 ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        echo "your profile is not completed";
    }
    $submitted = isset($_POST['edit_profile']);
    if($submitted){
        extract($_POST);
        $profile_completed = "";
        if(mysqli_num_rows($result) == 1){
            $profile_completed =   ",check_profile_complete = 1";
        }
        $query = "UPDATE users SET first_name = '$usr_fn',middle_name = '$usr_mn',last_name = '$usr_ln',user_workplace='$usr_workplace',user_job_type='$usr_jobtype',user_title='$usr_title',facebook='$usr_fb',twitter='$usr_tw',user_affiliation='$usr_affliation',user_address='$usr_address',zip_code='$usr_zip',city='$usr_city',country='$usr_country' $profile_completed Where user_email='a@a.com'";
        $result = mysqli_query($conn,$query);
    }

    $query = "SELECT first_name FROM users Where user_email='a@a.com'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($result);
    print_r($row);


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

                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="email"><sup>*</sup>Choose Journal</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <select class="form-select" name="journal" required>
                                                                    <option value="">Journal1</option>
                                                                    <option value="journal1">Journal2</option>
                                                                    <option value="">Journal3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="a_section">Section</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <select class="form-select" name="a_section" required>
                                                                    <option value="">Section1</option>
                                                                    <option value="Section2">Section2</option>
                                                                    <option value="">Section3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="a_title"><sup>*</sup>Title</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <textarea name="a_title" class="form-control" id="" cols="30" rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="a_abstract"><sup>*</sup>Abstract</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <textarea name="a_abstract" class="form-control" id="" cols="30" rows="6" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="email">Keywords</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                            <input type="text" name="keywords" class="form-control w-100 atags" data-role="tagsinput"/>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="email"><sup>*</sup>Number Of Pages</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input class="form-control" name="a_pages_num" type="number" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                   

                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <button type="submit" name="next" class="btn w-25 mt-2 mb-4 py-2">Next</button>
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
</body>
</html>