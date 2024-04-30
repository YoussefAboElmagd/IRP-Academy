<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik+Bubbles&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark justify-content-between  align-items-center px-5 py-0 ">
    <a class="navbar-brand" href="#" style="font-family: 'Rubik Bubbles';border: 2px solid black;border-radius: 50%;">IRP<img class="d-none" src="" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between " id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item me-3 nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item me-3 nav-link" href="journal.php">Our Journal</a>
        <a class="nav-item me-3 nav-link" href="contact_us.php">Contact Us</a>
        <a class="nav-item me-3 nav-link" href="news.php">News</a>
        </div>

    <div class="navbar-nav d-flex gap-4 align-items-center text-white">
        <span><?php echo $_SESSION['usr_mail']; ?></span>
        <a class="nav-link active" href="edit_profile.php">My Profile</a>
        <form class="m-0" action="logout.php" method="post"><a class="nav-link position-relative">Logout <button type="submit" name="logout_btn" class="opacity-0 position-absolute top-0 start-0 end-0 bottom-0"></button></a></form>
        <a class="nav-link" href="new_article.php">Submit</a>
    </div>
    </div>

</nav>
