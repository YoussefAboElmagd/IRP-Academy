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

    $sql = " SELECT application_id FROM reviewers_applications WHERE submitted_by = '$id_usr_session' AND app_status = 'Pending' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        header("Location: rev_app_done.php");
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
<?php 


    $submitted = isset($_POST['apply_rev_app']);
    if($submitted){


        if(isset($_FILES['rev_cv'])){
            $cv_file = $_FILES['rev_cv'];
            $file_name_ext = explode(".", $cv_file['name']);
            $file_ext = $file_name_ext[1];
            $final_file_name = "cv_" . uniqid() . "." . $file_ext;
            echo $final_file_name;
            $file_destination = "uploads/cvs/$final_file_name";
            move_uploaded_file($cv_file['tmp_name'],$file_destination);
        }


        extract($_POST);
        $sql = "INSERT INTO reviewers_applications(highest_degree,affiliation,reviewed_journals,cv_file,review_frequency,submitted_by) VALUES ('$rev_heighst_degree','$rev_affiliation','$rev_before_journals','$final_file_name','$rev_freq','$id_usr_session')";
        $result = mysqli_query($conn,$sql);

        $application_id = $conn->insert_id;


        $keywords = explode(",", $rev_keywords);

        for($i = 0;$i < count($keywords);$i++){
            $sql = "INSERT INTO reviwers_application_keywords(application_ID,keyword) VALUES ('$application_id','$keywords[$i]')";
            mysqli_query($conn,$sql);
        }

        header("Location: rev_app_done.php");

    }





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

                            <h1>Volunteer to Review</h1>

                            <form class="bg-white" id="rev_app_form" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                                <div>
                                    <fieldset>
                                        <legend>Reviewer Application Data</legend>
                                        <div class="row"> 
                                            <div class="col-md-10 mx-auto">
                                                <div class="inputs py-5">


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="heighst_degree"><sup>*</sup>Heighst Degree</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                            <input type="text" name="rev_heighst_degree" class="form-control w-100"/>
                                                            </div>
                                                        </div>
                                                    </div>

            

                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="a_abstract"><sup>*</sup>Affiliation (Institution and Address)</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <textarea name="rev_affiliation" class="form-control" id="" cols="30" rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="reviewed_journals">Reviewed Journals</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <textarea name="rev_before_journals" class="form-control" cols="30" rows="3" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="r_cv">CV</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input class="form-control" name="rev_cv" type="file">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="email"><sup>*</sup>Research Keywords</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                            <input type="text" name="rev_keywords" class="form-control w-100 atags" data-role="tagsinput"/>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="email"><sup>*</sup>Journals</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input class="form-control" name="rev_journal" value="Our Only Journal" type="text" readonly>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="email"><sup>*</sup>Review Frequency</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <select class="form-select" name="rev_freq" required>
                                                                    <option value="Up to two per month">Up to two per month</option>
                                                                    <option value="Once a month">Once a month</option>
                                                                    <option value="Once in several months">Once in several months</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <button type="submit" name="apply_rev_app" class="btn w-25 mt-2 mb-4 py-2">Apply</button>
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
    
        const form = document.getElementById('rev_app_form');
        form.addEventListener('keypress', function(e) {
            if (e.keyCode === 13) {
            e.preventDefault();
            }
        });
    </script>
</body>
</html>