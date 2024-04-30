<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="styles/slick.css"/>
    <link rel="stylesheet" type="text/css" href="styles/slick-theme.css"/>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/index.css" rel="stylesheet">
    
</head>

<body style="background-color:#f4ebda; padding:0 5%;">
    <div class="container">
        
        <?php 
        
            require('main_nav.php');
        
        ?>


        <div class="hero-container">
            <div class="hero hero-homepage" >
                <div class="hero__header">
                    Advancing Open Science<br class="show-for-medium-up"> for more than 25 years
                </div>
                <div class="hero__description">
                    Supporting academic communities<br class="show-for-medium-up"> since 1996<br class="show-for-small-down">
                </div>
            </div>
        </div>

        <?php require('searchbar.php'); ?>





        <div class="main-content">
            <div class="container">
                <div class="row bg-body-secondary p-3">

                    <div class="col-md-3">
    
                        <div class="left-section">
                            
                            <div class="journal-widget bg-white p-3">
                                <h2 class="titles">Open Access Journals</h2>

                                <ul class="journals">

                                    <a href="journal.php">
                                        <li class="journal-item">
                                            <img src="https://pub.mdpi-res.com/img/journals/sustainability-logo-sq.png?8600e93ff98dbf14" alt="" border="0" style="max-width: 100%; max-height: 50px; height: 50px;padding: 4px 8px 4px 0;">
                                            <span style="font-size: 12px;">Journal Name 1</span>
                                            <span class="impact-factor">
                                                IMPACT<br>
                                                FACTOR<br>
                                                <span class="if" style="font-family: Impact;">2.7</span>
                                                </span>
                                        </li>
                                    </a>

                                   <a href="journal.php">
                                    <li class="journal-item">
                                        <img src="https://pub.mdpi-res.com/img/journals/sustainability-logo-sq.png?8600e93ff98dbf14" alt="" border="0" style="max-width: 100%; max-height: 50px; height: 50px;padding: 4px 8px 4px 0;">
                                        <span style="font-size: 12px;">Journal Name 2</span>
                                        <span class="impact-factor">
                                            IMPACT<br>
                                            FACTOR<br>
                                            <span class="if" style="font-family: Impact;">2.7</span>
                                            </span>
                                    </li>
                                   </a>

                                    <a href="journal.php">
                                        <li class="journal-item">
                                            <img src="https://pub.mdpi-res.com/img/journals/sustainability-logo-sq.png?8600e93ff98dbf14" alt="" border="0" style="max-width: 100%; max-height: 50px; height: 50px;padding: 4px 8px 4px 0;">
                                            <span style="font-size: 12px;">Journal Name 3</span>
                                            <span class="impact-factor">
                                                IMPACT<br>
                                                FACTOR<br>
                                                <span class="if" style="font-family: Impact;">2.7</span>
                                            </span>
                                        </li>
                                    </a>

                                </ul>

                            </div>





                            
                            




    
                        </div>
                        
                    </div>
    
    
                    <div class="col-md-6">
    
                        <div class="mid-section bg-white ">
                            
                            <div class="article-slider" style="width: 100%;height: 250px;">
                                <div id="carouselExampleCaptions" class="carousel slide bg-black" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img src="..." class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                          <h5>First slide label</h5>
                                          <p>Some representative placeholder content for the first slide.</p>
                                        </div>
                                      </div>
                                      <div class="carousel-item">
                                        <img src="..." class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                          <h5>Second slide label</h5>
                                          <p>Some representative placeholder content for the second slide.</p>
                                        </div>
                                      </div>
                                      <div class="carousel-item">
                                        <img src="..." class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                          <h5>Third slide label</h5>
                                          <p>Some representative placeholder content for the third slide.</p>
                                        </div>
                                      </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="articles-widget p-3">

                                <h2 class="titles">Recent Articles</h2>
                                <div class="articles-cont">

                                    <div class="article-item">

                                        <div class="article-header">

                                            <div class="article-icons">
                                                <span class="label openaccess">Open Access</span>
                                                <span class="label articletype">Article</span>
                                            </div>
    

                                            <div class="article-pdf">
                                                <span style="font-size: 12px; color: #1a1a1a;">
                                                    21 pages,
                                                    4501 KiB
                                                    &nbsp;
                                                </span>
                                                <a href="uploads/articles/article_656cd4a6235df.txt" class="UD_Listings_ArticlePDF" title="Article PDF" data-name="An Integrative Approach for Identifying Quinquelaophonte (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species" data-journal="diversity">
                                                    <i class="material-icons custom-download"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <a class="title-link" href="article_page.php">An Integrative Approach for Identifying <i>Quinquelaophonte</i> (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species</a>

                                        <div class="authors">

                                            by

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                        </div>


                                        <div class="abstract-div">

                                            <a style="color: #5c3d1a;" href="#" onclick="$(this).next('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;">
                                                <strong>Abstract </strong>
                                            </a>

                                            <div class="abstract-crop d-inline">
                                                
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured
                                                <a style="color: #5c3d1a;" href="#" onclick="$(this).parents('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;"> [...] Read more.</a>

                                            </div>

                                            <div class="abstract-full d-inline d-none">
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured in low extracellular [Na+]. We have recently developed an animal model of hyponatremia using Foxn1nu/nu mice. The aim of the present study was to compare tumor growth and invasivity of the neuroblastoma cell line SK-N-AS in hyponatremic vs. normonatremic mice. Animals were subcutaneously implanted with luciferase-expressing SK-N-AS cells. When masses reached about 100 mm3, hyponatremia was induced in a subgroup of animals via desmopressin infusion. Tumor masses were significantly greater in hyponatremic mice, starting from day 14 and until the day of sacrifice (day 28). Immunohistochemical analysis showed a more intense vascularization and higher levels of expression of the proliferating cell nuclear antigen, chromogranin A and heme oxigenase-1 gene in hyponatremic mice. Finally, metalloproteases were also more abundantly expressed in hyponatremic animals compared to control ones. To our knowledge, this is the first demonstration in an experimental animal model that hyponatremia is associated to increased cancer growth by activating molecular mechanisms that promote proliferation, angiogenesis and invasivity. 
                                            </div>


                                        </div>

                                    </div>



                                    <div class="article-item">

                                        <div class="article-header">

                                            <div class="article-icons">
                                                <span class="label openaccess">Open Access</span>
                                                <span class="label articletype">Article</span>
                                            </div>
    

                                            <div class="article-pdf">
                                                <span style="font-size: 12px; color: #1a1a1a;">
                                                    21 pages,
                                                    4501 KiB
                                                    &nbsp;
                                                </span>
                                                <a href="uploads/articles/article_656cd4a6235df.txt" class="UD_Listings_ArticlePDF" title="Article PDF" data-name="An Integrative Approach for Identifying Quinquelaophonte (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species" data-journal="diversity">
                                                    <i class="material-icons custom-download"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <a class="title-link" href="article_page.php">An Integrative Approach for Identifying <i>Quinquelaophonte</i> (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species</a>

                                        <div class="authors">

                                            by

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                        </div>


                                        <div class="abstract-div">

                                            <a style="color: #5c3d1a;" href="#" onclick="$(this).next('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;">
                                                <strong>Abstract </strong>
                                            </a>

                                            <div class="abstract-crop d-inline">
                                                
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured
                                                <a style="color: #5c3d1a;" href="#" onclick="$(this).parents('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;"> [...] Read more.</a>

                                            </div>

                                            <div class="abstract-full d-inline d-none">
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured in low extracellular [Na+]. We have recently developed an animal model of hyponatremia using Foxn1nu/nu mice. The aim of the present study was to compare tumor growth and invasivity of the neuroblastoma cell line SK-N-AS in hyponatremic vs. normonatremic mice. Animals were subcutaneously implanted with luciferase-expressing SK-N-AS cells. When masses reached about 100 mm3, hyponatremia was induced in a subgroup of animals via desmopressin infusion. Tumor masses were significantly greater in hyponatremic mice, starting from day 14 and until the day of sacrifice (day 28). Immunohistochemical analysis showed a more intense vascularization and higher levels of expression of the proliferating cell nuclear antigen, chromogranin A and heme oxigenase-1 gene in hyponatremic mice. Finally, metalloproteases were also more abundantly expressed in hyponatremic animals compared to control ones. To our knowledge, this is the first demonstration in an experimental animal model that hyponatremia is associated to increased cancer growth by activating molecular mechanisms that promote proliferation, angiogenesis and invasivity. 
                                            </div>


                                        </div>

                                    </div>




                                    <div class="article-item">

                                        <div class="article-header">

                                            <div class="article-icons">
                                                <span class="label openaccess">Open Access</span>
                                                <span class="label articletype">Article</span>
                                            </div>
    

                                            <div class="article-pdf">
                                                <span style="font-size: 12px; color: #1a1a1a;">
                                                    21 pages,
                                                    4501 KiB
                                                    &nbsp;
                                                </span>
                                                <a href="uploads/articles/article_656cd4a6235df.txt" class="UD_Listings_ArticlePDF" title="Article PDF" data-name="An Integrative Approach for Identifying Quinquelaophonte (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species" data-journal="diversity">
                                                    <i class="material-icons custom-download"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <a class="title-link" href="article_page.php">An Integrative Approach for Identifying <i>Quinquelaophonte</i> (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species</a>

                                        <div class="authors">

                                            by

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                        </div>


                                        <div class="abstract-div">

                                            <a style="color: #5c3d1a;" href="#" onclick="$(this).next('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;">
                                                <strong>Abstract </strong>
                                            </a>

                                            <div class="abstract-crop d-inline">
                                                
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured
                                                <a style="color: #5c3d1a;" href="#" onclick="$(this).parents('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;"> [...] Read more.</a>

                                            </div>

                                            <div class="abstract-full d-inline d-none">
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured in low extracellular [Na+]. We have recently developed an animal model of hyponatremia using Foxn1nu/nu mice. The aim of the present study was to compare tumor growth and invasivity of the neuroblastoma cell line SK-N-AS in hyponatremic vs. normonatremic mice. Animals were subcutaneously implanted with luciferase-expressing SK-N-AS cells. When masses reached about 100 mm3, hyponatremia was induced in a subgroup of animals via desmopressin infusion. Tumor masses were significantly greater in hyponatremic mice, starting from day 14 and until the day of sacrifice (day 28). Immunohistochemical analysis showed a more intense vascularization and higher levels of expression of the proliferating cell nuclear antigen, chromogranin A and heme oxigenase-1 gene in hyponatremic mice. Finally, metalloproteases were also more abundantly expressed in hyponatremic animals compared to control ones. To our knowledge, this is the first demonstration in an experimental animal model that hyponatremia is associated to increased cancer growth by activating molecular mechanisms that promote proliferation, angiogenesis and invasivity. 
                                            </div>


                                        </div>

                                    </div>





                                    <div class="article-item">

                                        <div class="article-header">

                                            <div class="article-icons">
                                                <span class="label openaccess">Open Access</span>
                                                <span class="label articletype">Article</span>
                                            </div>
    

                                            <div class="article-pdf">
                                                <span style="font-size: 12px; color: #1a1a1a;">
                                                    21 pages,
                                                    4501 KiB
                                                    &nbsp;
                                                </span>
                                                <a href="uploads/articles/article_656cd4a6235df.txt" class="UD_Listings_ArticlePDF" title="Article PDF" data-name="An Integrative Approach for Identifying Quinquelaophonte (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species" data-journal="diversity">
                                                    <i class="material-icons custom-download"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <a class="title-link" href="article_page.php">An Integrative Approach for Identifying <i>Quinquelaophonte</i> (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species</a>

                                        <div class="authors">

                                            by

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                            <div class="auth-item">
                                                <a href="">
                                                    <img class="auth-img" src="imgs/unknown-user.webp" alt="">
                                                    <span class="auth-name">Ahmed Osama</span>
                                                </a>
                                            </div>

                                        </div>


                                        <div class="abstract-div">

                                            <a style="color: #5c3d1a;" href="#" onclick="$(this).next('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;">
                                                <strong>Abstract </strong>
                                            </a>

                                            <div class="abstract-crop d-inline">
                                                
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured
                                                <a style="color: #5c3d1a;" href="#" onclick="$(this).parents('.abstract-crop').toggleClass('d-none').next('.abstract-full').toggleClass('d-none'); return false;"> [...] Read more.</a>

                                            </div>

                                            <div class="abstract-full d-inline d-none">
                                                In cancer patients, hyponatremia is detected in about 40% of cases at hospital admission and has been associated to a worse outcome. We have previously observed that cancer cells from different tissues show a significantly increased proliferation rate and invasion potential, when cultured in low extracellular [Na+]. We have recently developed an animal model of hyponatremia using Foxn1nu/nu mice. The aim of the present study was to compare tumor growth and invasivity of the neuroblastoma cell line SK-N-AS in hyponatremic vs. normonatremic mice. Animals were subcutaneously implanted with luciferase-expressing SK-N-AS cells. When masses reached about 100 mm3, hyponatremia was induced in a subgroup of animals via desmopressin infusion. Tumor masses were significantly greater in hyponatremic mice, starting from day 14 and until the day of sacrifice (day 28). Immunohistochemical analysis showed a more intense vascularization and higher levels of expression of the proliferating cell nuclear antigen, chromogranin A and heme oxigenase-1 gene in hyponatremic mice. Finally, metalloproteases were also more abundantly expressed in hyponatremic animals compared to control ones. To our knowledge, this is the first demonstration in an experimental animal model that hyponatremia is associated to increased cancer growth by activating molecular mechanisms that promote proliferation, angiogenesis and invasivity. 
                                            </div>


                                        </div>

                                    </div>



                                </div>

                            </div>


                        </div>
    
                    </div>
    
    
                    <div class="col-md-3">
    
                        <div class="right-section">
                            <div class="journal-widget">
                                <div class="bg-white p-4 ">
                                    <span class="inline-block font-bold text-xl mb-4">News</span>
                                    <div class="flex flex-col gap-6">
                                      <!-- NEWS BOX -->
                                      <div
                                        class="flex flex-col gap-2 text-sm border-b border-primary-color"
                                      >
                                        <span>27 November 2023</span>
                                        <a
                                          class="hover:underline hover:text-primary-color cursor-pointer"
                                          >Editorial Board Members from Sustainability Featured in the
                                          2023 Highly Cited Researchers List Published by Clarivate</a
                                        >
                                        <div class="w-[250px] lg:w-full mb-6">
                                          <img
                                            src="images/news.jpg"
                                            class="max-w-full h-auto mx-auto"
                                          />
                                        </div>
                                      </div>
                                      <!-- NEWS BOX -->
                                      <!-- NEWS BOX -->
                                      <div
                                        class="flex flex-col gap-2 text-sm border-b border-primary-color"
                                      >
                                        <span>21 November 2023</span>
                                        <a
                                          class="hover:underline hover:text-primary-color cursor-pointer"
                                          >769 Editorial Board Members of MDPI Journals Achieve Highly
                                          Cited Researcher Recognition in 2023</a
                                        >
                                        <div class="w-[250px] lg:w-full mb-6">
                                          <img
                                            src="images/news.jpg"
                                            class="max-w-full h-auto mx-auto"
                                          />
                                        </div>
                                      </div>
                                      <!-- NEWS BOX -->
                                      <a
                                        class="text-xs hover:underline cursor-pointer text-primary-color"
                                        >More News & Announcements...</a
                                      >
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>

                </div>
                
            </div>
        </div>


        <?php require('footer.php'); ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    

</body>
</html>