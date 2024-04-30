<?php
    session_start();
    if(isset($_SESSION['usr_id'])){
        header("Location: edit_profile.php");
    }
    require_once('config.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles//register.css" rel="stylesheet">
</head>
<body style="background-color:#f7f3ec;">



<?php
    $submitted = isset($_POST['signup']);
    $errors = 0;
    if($submitted){
        extract($_POST);
    }

?>

    <div class="container">
        <div class="main shadow bg-white vh-100">
            <div class="logo-box">
                <img class="w-25 mb-5" src="imgs/logo.png" alt="">
            </div>

            <div class="reg-form">
                <h3>Registration</h3>
                <form class="mx-auto" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" >

                    <div class="reg-inp">
                       <div class="row align-items-baseline ">
                            <?php 
                                if($submitted){
                                    if(!preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i",$usr_mail)){
                                        echo '<div class="col-md-7 offset-4 p-0"><div class="alert alert-danger p-1 mb-1" style="font-size: 0.85rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp; Invalid Email</div></div>';
                                        $errors++;
                                    }
                                    else{
                                        $sql = " SELECT user_email FROM users WHERE user_email = '$usr_mail' ";
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0){
                                            echo '<div class="col-md-7 offset-4 p-0"><div class="alert alert-danger p-1 mb-1" style="font-size: 0.85rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp; Email is already exists</div></div>';
                                            $errors++; 
                                        }
                                    }
                                }


                            ?>
        
                            <div class="col-md-3 offset-1 p-0">
                                <label class="ms-auto " for="email">E-Mail address</label>
                            </div>

                            <div class="col-md-7 p-0">
                                <input class="form-control" name="usr_mail" type="text">
                            </div>
                       </div>
                    </div>

                    <div class="reg-inp">
                       <div class="row align-items-baseline ">

                            <?php 
                                
                                if($submitted && !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/i",$usr_pass)){
                                    echo '<div class="col-md-7 offset-4 p-0"><div class="alert alert-danger p-1 mb-1" style="font-size: 0.85rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp; Invalid Password</div></div>';
                                    $errors++;

                                }

                            ?>

                            <div class="col-md-3 offset-1 p-0">
                                <label class="ms-auto" for="pass">Password</label>
                            </div>

                            <div class="col-md-7 p-0">
                                <input id="usr_pass" class="form-control  m-0 " name="usr_pass" type="password">
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

                    <div class="reg-inp">
                       <div class="row align-items-baseline ">
                            <?php 
                            
                                if($submitted && $conf_pass != $usr_pass){
                                    echo '<div class="col-md-7 offset-4 p-0"><div class="alert alert-danger p-1 mb-1" style="font-size: 0.85rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp;  Password does not match the confirm password.</div></div>';
                                    $errors++;
                                }

                            ?>
                            <div class="col-md-3 offset-1 p-0">
                                <label class="ms-auto" for="conf_pass">Confirm Password</label>
                            </div>

                            <div class="col-md-7 p-0">
                                <input class="form-control m-0" name="conf_pass" type="password">
                                


                            </div>
                       </div>
                    </div>
                    
                    <div class="reg-inp">
                    </div>
                    <button type="submit" name="signup" value class="btn w-25 mt-2 mb-4 py-2">Register</button>
                    <?php 

                        if($submitted && $errors == 0){
                            $hashedPass = hash('md5', $usr_pass);
                            $query = "INSERT INTO users(user_email,user_password) VALUES('$usr_mail','$hashedPass')";
                            $result = mysqli_query($conn,$query);
                            header("Location: register_completed.php");
                        }

                    ?>
                    <a href="./login.php">Already have an account?
                        <span class="fw-bolder">Login now.</span>
                    </a>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
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