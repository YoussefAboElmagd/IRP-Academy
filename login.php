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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles//login.css" rel="stylesheet">
</head>
<body style="background-color:#f7f3ec;">

<?php
    $submitted = isset($_GET['login']);
    if($submitted){
        $errors = 0;
        extract($_GET);
        $usr_pass = hash('md5',$usr_pass);
        $sql = " SELECT user_id,user_email FROM users WHERE user_email = '$usr_mail' AND user_password = '$usr_pass' ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 0){
            $errors++; 
        }
        else{

            $row = mysqli_fetch_row($result);
            $_SESSION['usr_id'] = $row[0];
            $_SESSION['usr_mail'] = $row[1];
            header("Location: edit_profile.php");

        }
    }
?>
    <div class="container">
        <div class="main shadow bg-white vh-100">
            <div class="logo-box">
                <img class="w-25 mb-5" src="imgs/logo.png" alt="">
            </div>

            <div class="login-form">
                <h3>Login</h3>
                <form class="mx-auto " method="get" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>">

                    <div class="login-inp d-flex gap-2 align-items-center border-1 border-black ">
                    <?php
                    
                    if($submitted && $errors != 0){
                        echo '<div class="alert alert-danger  mb-1 w-100" style="font-size: 1rem;" role="alert"><i class="fa fa-exclamation-circle" style="color: #c33;" aria-hidden="true"></i>&nbsp; Invalid email or password</div>';
                        $errors++;
                    }

                    ?>
                    </div>
                    <div class="login-inp d-flex gap-2 align-items-center border-1 border-black ">
                        <input class="form-control" name="usr_mail" type="text" placeholder="E-mail address">
                    </div>
                    
                    <div class="login-inp password-input">
                        <input class="form-control m-0" id="pass_log_id" name="usr_pass" type="password" placeholder="Password">
                        <span><i class="fa fa-eye" id="hide_pass" aria-hidden="true"></i></span>
                    </div>
                    <button type="submit" name="login" value class="btn w-25 mt-2 mb-4 py-2">Continue</button>
                    <a href="">Forgot your password?</a>
                    <a href="./register.php">Not registered yet?
                        <span class="fw-bolder">Register now.</span>
                    </a>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script>
        $("body").on('click', '#hide_pass', function() {
            $(this).toggleClass('fa-eye').toggleClass('fa-eye-slash');
            var input = $("#pass_log_id");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });
    </script>
</body>
</html>