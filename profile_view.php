<?php

    session_start();
    require_once('config.php');
    if(!isset($_SESSION['usr_id'])){
        header("Location: login.php");
    }
    $id_usr_session = $_SESSION['usr_id'];
    $sql = " SELECT user_email FROM users WHERE user_id = '$id_usr_session' AND check_profile_complete = 0 ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        header("Location: profile_not_completed.php");
    }


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




    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main">

            <?php 
            
                $query = "SELECT concat(first_name,' ',middle_name,' ',last_name) AS full_name ,user_workplace,user_job_type,user_title FROM users Where user_id='$id_usr_session' ";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_row($result);
            
            ?>


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1>View Profile</h1>

                            <form class="bg-white" id="rev_app_form" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                                <div>
                                    <fieldset>
                                        <legend>Your Information</legend>
                                        <div class="row"> 
                                            <div class="col-md-10 mx-auto">
                                                <div class="inputs py-5">


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="reviewed_journals">Name:</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input value=" <?php echo $row[0]; ?> " class="form-control bg-light text-muted" type="text" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="reviewed_journals">Workplace:</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input value="<?php echo $row[1]; ?>" class="form-control bg-light text-muted" type="text" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="reviewed_journals">Job Type:</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input value="<?php echo $row[2]; ?>" class="form-control bg-light text-muted" type="text" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="reviewed_journals">Title:</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input value="<?php echo $row[3]; ?>" class="form-control bg-light text-muted" type="text" readonly>
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