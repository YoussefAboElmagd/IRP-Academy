<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/index.css" rel="stylesheet">
</head>

<body style="background-color:#f4ebda; padding:0 5%;">
    <div class="container">


        <?php 
        
        require('main_nav.php');
        require('searchbar.php');
        ?>








        <div class="main-content">
            <div class="container">
                <div class="row bg-body-secondary p-3">

                    <div class="col-md-3">
    
                        <div class="left-section">
                            
                            <div class="journal-widget bg-white p-3">

                                <div class="bg-white p-4">
                                    <div
                                      class="flex items-center gap-3 justify-center md:justify-start"
                                    >
                                      <img src="images/sustainability-logo.PNG" alt="logo" />
                                      <span
                                        class="inline-block uppercase font-bold text-primary-color"
                                        >Our Journal</span
                                      >
                                    </div>
                                    
                                    <a href="new_article.php">
                                        <button
                                        class="bg-primary-color hover:bg-hover-color text-white w-full py-2 rounded-md text-sm mt-3"
                                        >
                                        Submit to Our Journal
                                        </button>
                                    </a>
                                    
                                    <a href="reviewer_application.php">
                                        <button
                                        class="border border-black w-full py-2 rounded-md text-sm mt-3 hover:text-white hover:bg-primary-color transition-all"
                                        >
                                          Review for Our Journal
                                        </button>
                                    </a>
                      
                                    <div class="flex items-center gap-2 mt-3">
                                      <i
                                        class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-twitter"
                                      ></i>
                                      <i
                                        class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-facebook"
                                      ></i>
                                      <i
                                        class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-linkedin"
                                      ></i>
                                      <button
                                        class="border-2 w-full border-black hover:text-white hover:bg-primary-color transition-all rounded-md"
                                      >
                                        Share
                                      </button>
                                    </div>
                      
                                    <span class="inline-block mt-4 font-bold text-lg"
                                      >Journal Menu</span
                                    >
                                    <ul class="list-disc px-8 py-3">
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a>Sustainability Home</a>
                                      </li>
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a>Aims & Scope</a>
                                      </li>
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a>Editorial Board</a>
                                      </li>
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a>Reviewer Board</a>
                                      </li>
                                    </ul>
                      
                                    <span class="inline-block mt-4 font-bold text-lg mb-4"
                                      >Journal Browser</span
                                    >
                                    <div class="flex flex-col gap-3">
                                      <select
                                        id="select"
                                        name="select"
                                        class="block cursor-pointer border w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                      >
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <option value="option4">Option 4</option>
                                      </select>
                      
                                      <select
                                        id="select"
                                        name="select"
                                        class="block border cursor-pointer w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                      >
                                        <option value="option1">Issue</option>
                                      </select>
                                    </div>
                                    <button
                                      class="border border-black w-full py-2 rounded-md text-sm mt-4 hover:text-white hover:bg-primary-color transition-all"
                                    >
                                      Go
                                    </button>
                                </div>

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
                            




                            <div class="bg-white p-4">
                                <h1 class="font-bold text-2xl italic mb-8">Our Journal</h1>
                                <p class="mb-3">
                                    Our Journal is an international, peer-reviewed, open-access
                                  journal on environmental, cultural, economic, and social
                                  sustainability of human beings, published semimonthly online by
                                  MDPI. The Canadian Urban Transit Research & Innovation
                                  Consortium (CUTRIC), International Council for Research and
                                  Innovation in Building and Construction (CIB) and Urban Land
                                  Institute (ULI) are affiliated with Sustainability and their
                                  members receive discounts on the article processing charges.
                                </p>
                                <ul class="list-disc flex flex-col gap-4 px-8 py-3 text-sm">
                                  <li>
                                    <a
                                      class="cursor-pointer bg-primary-color text-white hover:underline"
                                      >Open Access</a
                                    >— free for readers, with article processing charges (APC)
                                    paid by authors or their institutions.
                                  </li>
                                  <li>
                                    High Visibility: indexed within Scopus, SCIE and SSCI (Web of
                                    Science), GEOBASE, GeoRef, Inspec, AGRIS, RePEc, CAPlus /
                                    SciFinder, and other databases.
                                  </li>
                                  <li>
                                    Journal Rank: JCR - Q2 (Environmental Studies) / CiteScore -
                                    Q1 (Geography, Planning and Development)
                                  </li>
                                  <li>
                                    Rapid Publication: manuscripts are peer-reviewed and a first
                                    decision is provided to authors approximately 18.3 days after
                                    submission; acceptance to publication is undertaken in 3.5
                                    days (median values for papers published in this journal in
                                    the first half of 2023).
                                  </li>
                                </ul>
                  
                                <span class="text-xs pl-6"
                                  >Impact Factor: 3.9 (2022); 5-Year Impact Factor: 4.0
                                  (2022)</span
                                >
                  
                                <div class="flex items-center text-sm gap-4 pl-4 mt-4">
                                  <div>
                                    <i class="fa-solid fa-grip-lines"></i>
                                    <a class="hover:underline cursor-pointer"
                                      >Imprint Information</a
                                    >
                                  </div>
                                  <div>
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <a class="hover:underline cursor-pointer">Journal Flyer</a>
                                  </div>
                                  <div>
                                    <i class="fa-solid fa-lock-open"></i>
                                    <a class="hover:underline cursor-pointer">Open Access</a>
                                  </div>
                                  <span>ISSN: 2071-1050</span>
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

                                        <a class="title-link" href="http://localhost:25565/ResearchWebsiteProject/article_page.php?articleID=40">An Integrative Approach for Identifying <i>Quinquelaophonte</i> (Harpacticoida, Laophontidae) Species from Korea with the Description of a New Species</a>

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
                            <div class="email-sub-widget">
                                <div class="bg-white p-4 mb-2  flex flex-col gap-2">
                                    <span class="font-bold text-xl">E-Mail Alert</span>
                                    <span class="text-sm"
                                      >Add your e-mail address to receive forthcoming issues of this
                                      journal:</span
                                    >
                                    <input
                                      class="inline-block w-full text-sm p-2 outline-none border border-gray-600 rounded-md"
                                      type="text"
                                      placeholder="Enter Your E-Mail Address..."
                                    />
                                    <button
                                      class="w-full rounded-md p-1 border border-black hover:text-white hover:bg-primary-color transition-all"
                                    >
                                      Subscribe
                                    </button>
                                  </div>
                            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              gridTemplateColumns: {
                fluid: "repeat(auto-fit, minmax(15rem, 1fr))",
              },
              colors: {
                "primary-color": "#513618",
                "secondary-color": "#513618",
                "hover-color": "#3a2d11",
              },
            },
          },
        };
      </script>
    

</body>
</html>