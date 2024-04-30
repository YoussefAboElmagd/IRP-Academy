<?php
    session_start();
    require_once('config.php');
    if(!isset($_SESSION['usr_id'])){
        header("Location: login.php");
    }
    $usr_id_session = $_SESSION['usr_id'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles//edit_profile.css" rel="stylesheet">
</head>
<body>
<?php 

    $submitted = isset($_POST['edit_profile']);
    if($submitted){
        extract($_POST);
        $profile_completed = "";
        $sql = " SELECT user_email FROM users WHERE user_id = '$usr_id_session' AND check_profile_complete = 0 ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1){
            $profile_completed =   ",check_profile_complete = 1";
        }
        $query = "UPDATE users SET first_name = '$usr_fn',middle_name = '$usr_mn',last_name = '$usr_ln',user_workplace='$usr_workplace',user_job_type='$usr_jobtype',user_title='$usr_title',facebook='$usr_fb',twitter='$usr_tw',user_affiliation='$usr_affliation',user_address='$usr_address',zip_code='$usr_zip',city='$usr_city',country='$usr_country' $profile_completed Where user_id='$usr_id_session' ";
        $result = mysqli_query($conn,$query);
    }

 
    
    $query = "SELECT first_name,middle_name,last_name,user_workplace,user_job_type,user_title,facebook,twitter,user_affiliation,user_address,zip_code,city,country FROM users Where user_id='$usr_id_session' ";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($result);
    
    


?>
    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main">

            <?php 
            
                if($submitted){
                    echo '            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Profile information has been updated successfully.
                    
                </div>';
                }
            
            ?>


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1>Edit Profile Data</h1>

                            <form class="bg-white " method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div>
                                    <fieldset>
                                        <legend>Edit Profile</legend>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="inputs py-5">

                                                    <div class="form-inp d-flex gap-2 justify-content-end    align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Workplace</label>
                                                        <select class="form-select w-75" name="usr_workplace" id="">
                                                            <option value="Academic" <?php if($row[3] == "Academic"){echo " selected class='text-secondary fw-bold' ";} ?> >Academic</option>
                                                            <option value="Non=Formal" <?php if($row[3] == "Non=Formal"){echo " selected class='text-secondary fw-bold' ";} ?>>Non=Formal</option>
                                                        </select>
                                                    </div>
        
                                                    <div class="form-inp d-flex gap-2 justify-content-end   align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Job Type</label>
                                                        <select class="form-select w-75" name="usr_jobtype" required id="">
                                                            <option value="Academic" <?php if($row[4] == "Academic"){echo " selected class='text-secondary fw-bold' ";} ?> > Academic</option>
                                                            <option value="Historical" <?php if($row[4] == "Historical"){echo " selected class='text-secondary fw-bold'";} ?>>Historical</option>
                                                        </select> 
                                                    </div>
        
                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Title</label>
                                                        <select class="form-select w-75" name="usr_title" required id="">
                                                            <option value="Dr." <?php if($row[5] == "Dr."){echo " selected class='text-secondary fw-bold' ";} ?> > Dr. </option>
                                                            <option value="Mr." <?php if($row[5] == "Mr."){echo " selected class='text-secondary fw-bold' ";} ?> >Mr.</option>
                                                            <option value="Prof." <?php if($row[5] == "Prof."){echo " selected class='text-secondary fw-bold' ";} ?> >Prof.</option>
                                                        </select>
                                                    </div>
        
                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for=""><sup>*</sup>First Name</label>
                                                        <input type="text" value="<?php echo $row[0]?>" class="form-control w-75" name="usr_fn" required>
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for="">Middle Name</label>
                                                        <input type="text" value="<?php echo $row[1]?>" class="form-control w-75" name="usr_mn">
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Last Name</label>
                                                        <input type="text" value="<?php echo $row[2]?>" class="form-control w-75" name="usr_ln" required>
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for="">Facebook</label>
                                                        <input type="text" value="<?php echo $row[6]?>" class="form-control w-75" name="usr_fb">
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for="">Twitter</label>
                                                        <input type="text" value="<?php echo $row[7]?>" class="form-control w-75" name="usr_tw">
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Affiliation</label>
                                                        <input type="text" value="<?php echo $row[8]?>" class="form-control w-75" name="usr_affliation" required>
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Address</label>
                                                        <input type="text" value="<?php echo $row[9]?>" class="form-control w-75" name="usr_address" required>
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Zip Code</label>
                                                        <input type="text" value="<?php echo $row[10]?>" class="form-control w-75" name="usr_zip" required>
                                                    </div>

                                                    <div class="form-inp d-flex gap-2 justify-content-end align-items-center mb-4">
                                                        <label for=""><sup>*</sup>City</label>
                                                        <input type="text" value="<?php echo $row[11]?>" class="form-control w-75" name="usr_city" required>
                                                    </div>
                                                    
                                                    <div class="form-inp d-flex flex-wrap gap-2 justify-content-end   align-items-center mb-4">
                                                        <label for=""><sup>*</sup>Country</label>
                                                        <select class="form-select w-75" name="usr_country" required>
                                                            <option value="Egypt" <?php if($row[12] == "Egypt"){echo " selected class='text-secondary fw-bold' ";} ?> >Egypt</option>
                                                            <option value="Morocco" <?php if($row[12] == "Morocco"){echo " selected class='text-secondary fw-bold' ";} ?>>Morocco</option>
                                                            <option value="Algeria" <?php if($row[12] == "Algeria"){echo " selected class='text-secondary fw-bold' ";} ?>>Algeria</option>
                                                            <option value="Canada" <?php if($row[12] == "Canada"){echo " selected class='text-secondary fw-bold' ";} ?>>Canada</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="edit_profile" class="btn w-25 mt-2 mb-4 py-2" style="margin-left: 175px;">Submit</button>
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


    <script src="./scripts/bootstrap.bundle.min.js"></script>
</body>
</html>