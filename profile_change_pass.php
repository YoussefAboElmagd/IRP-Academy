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
   
$submitted = isset($_POST['change_pass']);
$errors = 0;
if($submitted){
    extract($_POST);
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
                        <h1>Change Your Current Password</h1>
                        <form class="bg-white" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" >

                            <div>
                                <fieldset>
                                    <legend>Change Password</legend>

                                   

                                    <div class="inputs p-4">

                                        <div class="alert alert-success alert-dismissible fade show d-none mb-2" id="error_msg_step1" role="alert">
                                            <strong>Done!</strong> Your password has been updated successfully.
                                        </div>
                                        
                                        <div class="pass-inp my-3">
                                            <div class="row align-items-baseline w-75">
                                                    <?php 
                                                        if($submitted){
                                                            $sql = " SELECT user_password FROM users WHERE user_id = '$id_usr_session' ";
                                                            $result = mysqli_query($conn,$sql);
                                                            $row = mysqli_fetch_row($result);
                                                            if($row[0] != hash('md5', $curr_pass)){
                                                                echo '<div class="col-md-7 offset-4 p-0"><div class="alert alert-danger p-1 mb-1" style="font-size: 0.85rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp; Incorrect Password</div></div>';
                                                                $errors++; 
                                                            }
                                                        }


                                                    ?>

                                                    <div class="col-md-3 offset-1 p-0">
                                                        <label class="ms-auto " for="email">Current Password</label>
                                                    </div>

                                                    <div class="col-md-7 p-0">
                                                        <input class="form-control" name="curr_pass" type="password">
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="pass-inp my-3">
                                            <div class="row align-items-baseline w-75">

                                                    <?php 
                                                        
                                                        if($submitted && !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/i",$new_pass)){
                                                            echo '<div class="col-md-7 offset-4 p-0"><div class="alert alert-danger p-1 mb-1" style="font-size: 0.85rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp; Invalid Password Format</div></div>';
                                                            $errors++;

                                                        }

                                                    ?>

                                                    <div class="col-md-3 offset-1 p-0">
                                                        <label class="ms-auto" for="pass">New Password</label>
                                                    </div>

                                                    <div class="col-md-7 p-0">
                                                        <input id="usr_pass" class="form-control  m-0 " name="new_pass" type="password">
                                                        <div class="invalid-feedback">
                                                            <ul class="list-unstyled">
                                                            Requirements:
                                                                <li>- minimum 8 characters</li>
                                                                <li>- minimum one small letter</li>
                                                                <li>- minimum one capital letter</li>
                                                                <li>- minimum one number</li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                            </div>
                                        </div>

                                        <div class="pass-inp my-3">
                                            <div class="row align-items-baseline w-75">
                                                    <?php 
                                                    
                                                        if($submitted && $conf_new_pass != $new_pass){
                                                            echo '<div class="col-md-7 offset-4 p-0"><div class="alert alert-danger p-1 mb-1" style="font-size: 0.85rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp;  Password does not match the confirm password.</div></div>';
                                                            $errors++;
                                                        }

                                                    ?>
                                                    <div class="col-md-3 offset-1 p-0">
                                                        <label class="ms-auto" for="conf_pass">Confirm New Password</label>
                                                    </div>

                                                    <div class="col-md-7 p-0">
                                                        <input class="form-control m-0" name="conf_new_pass" type="password">
                                                        


                                                    </div>
                                            </div>
                                        </div>

                                        <div class="pass-inp ">
                                            <div class="row align-items-baseline w-75">
                                                    <div class="col-md-3 offset-1 p-0">
                                                    </div>

                                                    <div class="col-md-7 p-0">
                                                        <button type="submit" name="change_pass" value class="btn w-50 mt-2 mb-4 py-2">Change Password</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                
                                    <?php 

                                        if($submitted && $errors == 0){
                                            $hashedPass = hash('md5', $new_pass);
                                            $query = "UPDATE users SET user_password = '$hashedPass' WHERE user_id = '$id_usr_session' ";
                                            $result = mysqli_query($conn,$query);
                                            echo "<style>.alert.alert-success{display: block !important;}</style>";
                                        }

                                    ?>
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
        $("body").on('keyup', '#usr_pass', function() {
            if(!$(this).val().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/)){
                $(this).addClass('is-invalid');
            }
            else{
                $(this).removeClass('is-invalid');
            }

        });
    </script>

</body>
</html>