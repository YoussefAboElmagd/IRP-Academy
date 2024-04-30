<?php
    session_start();
    $logged_in = false;
    if(isset($_SESSION['usr_id'])){
        $logged_in = true;
    }
    require_once('config.php');
?>


<style>
    .navbar-brand{
    width: 64px;
    height: 44px;
}
.nav-item{
    color: #5c3d1a;
    font-size: 16px;
}
.nav-item:hover{
    text-decoration: underline;
}
.nav-btns a:first-child button{
    font-size: 12px;
    color: #5c3d1a;
    border: solid 1px #5c3d1a;
    margin-right: 14px;
}
.nav-btns a:first-child button:hover{
    color: white;
    background-color: #5c3d1a;
}

.nav-btns a:last-child button{
    font-size: 12px;
    color: white;
    background-color: #5c3d1a;
    border: solid 1px #5c3d1a;
    margin-right: 14px;
}
.nav-btns a:last-child button:hover{
    background-color: #483117;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-white justify-content-between  align-items-center px-5 py-3  border-bottom border-1">
            <a class="navbar-brand" href="#" style="font-family: 'Rubik Bubbles';color: 5c3d1a;font-size: 32px;"><img src="imgs/main-logo.svg" class="d-none" alt="logo">RPI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" navbar-collapse " id="navbarNavAltMarkup">
              <div class="navbar-nav mx-auto ">
                <a class="nav-item me-3 nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item me-3 nav-link" href="journal.php">Journal</a>
                <a class="nav-item me-3 nav-link" href="news.php">News</a>
                <a class="nav-item me-3 nav-link" href="contact_us.php">Contact Us</a>
              </div>

   
                <div class="d-flex nav-btns">
                    <?php if($logged_in){echo '
                    
                    <a href="edit_profile.php"><button id="bookingButtonNav" class="btn border-2 ">Profile</button></a>
                    
                    ';} else{echo '
                        
                        
                        <a href="login.php"><button id="bookingButtonNav" class="btn border-2 ">Sign In / Sign Up</button></a>

                        
                        ';



                    }
                    
                    
                    ?>
                    <a href="new_article.php"><button id="bookingButtonNav" class="btn border-2 ">Submit</button></a>
                </div>
            </div>

</nav>