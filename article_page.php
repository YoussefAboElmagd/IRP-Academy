<?php
      $article_id = '';
      if(isset($_GET['articleID'])){
        $article_id = $_GET['articleID'];
      }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/dist/output.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.5/dist/tailwind.min.css" rel="stylesheet"> -->
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
              "hover-color": "#3a2d11",
            },
          },
        },
      };
    </script>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.min.css" />
    <style>

      @media (min-width: 1536px){
          .container{
              max-width: 1280px !important;
          }
      }
   </style>
    <title>PAGE 2</title>
  </head>
  <body style="background-color:#f4ebda; padding:0 5%;">
    
    <div class="container">

      <?php 
        
      require('main_nav.php');
      require('searchbar.php');
  
      ?>
        <!-- START OF THE WHOLE PAGE LAYOUT -->
      <div class="bg-[#f4ebda]">
        <!-- START OF THE INNER PAGE LAYOUT -->
        <!-- INSERT NAVBAR HERE IF NEEDED -->
        <div class="bg-[#f5f5f5] mx-auto p-4">
          <!-- START OF THE MAIN GRID LAYOUT -->
          <div class="grid grid-cols-2 lg:grid-cols-12 gap-4">
            <!-- START OF FIRST COLUMN -->
            <div class="col-span-12 lg:col-span-3 bg-[#f5f5f5]">
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
                  class="border border-black w-full py-2 rounded-md text-sm mt-4 mb-3 hover:text-white hover:bg-primary-color transition-all"
                  >
                  Submit for this Journal
                  </button>
                </a>

                <a href="reviewer_application.php">
                  <button
                  class="border border-black w-full py-2 rounded-md text-sm mb-3 text-black text-white bg-primary-color transition-all"
                  >
                  Review for this Journal
                  </button>
                </a>

                <div class="mt-6">
                  <span class="font-bold fs-4">Article Menu</span>
                  <div class="mt-4 flex flex-col text-sm">
                    <span class="inline-block font-bold mb-3"
                      >Academic Editors</span
                    >
                    <ul class="list-disc px-10">
                      <li><a>Paul C. Sutton</a></li>
                      <li><a>James Hopeward</a></li>
                      <li><a>Keri Hopeward</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div
                class="bg-white p-4 mt-6 flex items-center justify-between text-xs px-6"
              >
                <span>Article Views</span>
                <span>199</span>
              </div>

              <div class="bg-white p-6 mt-6 sticky top-2 left-0">
                <span class="inline-block font-bold mb-4">Table of Contents</span>
                <ul class="list-disc px-10 text-sm">
                  <li>
                    <a
                      class="hover:underline hover:text-primary-color cursor-pointer"
                      >Abstract</a
                    >
                  </li>
                  <li>
                    <a
                      class="hover:underline hover:text-primary-color cursor-pointer"
                      >Main</a
                    >
                  </li>
                  
                </ul>
              </div>
            </div>
            <!-- END OF FIRST COLUMN -->
            <?php
              include_once "./config.php";
              $sql="SELECT * from articles WHERE article_id = '$article_id' ";
              $result=$conn-> query($sql);
              $row=$result-> fetch_assoc();
            ?>
            <!-- START OF SECOND COLUMN -->
            <div class="col-span-12 lg:col-span-9 bg-[#f5f5f5]">
              <div class="bg-white p-8">
                <!-- INDIVIDUAL LATEST ARTICLE BOX -->
                <div class="text-xs flex flex-col gap-4">
                  <div class="flex items-center justify-between">
                    <div>
                      <a
                        class="cursor-pointer bg-primary-color p-1 text-white hover:underline"
                        >Open Access</a
                      >
                      <a
                        class="cursor-pointer bg-red-700 p-1 text-white hover:underline"
                        >Article</a
                      >
                    </div>
                    <span><?=$row['no_of_pages']?> pages, <?=$row['pdf_file_size']?> KiB</span>
                  </div>

                  <a class="hover:underline cursor-pointer text-lg font-bold"
                    ><?=$row['title']?></a
                  >

                  <span
                    >by
                    <?php 
                    
                      $sql2="SELECT first_name,	last_name from article_authors WHERE article_id = '$article_id' ";
                      $result2=$conn-> query($sql2);
                      while($row2=$result2-> fetch_assoc()){

                    
                    ?>
                    <a class="hover:underline cursor-pointer">
                      <i class="fa-solid fa-user"></i>
                      <?=$row2['first_name'] . " " . $row2['last_name']?></a
                    >,
                    <?php } ?>
                    </span
                  >

                
                  <?php  $timestamp1 = date_create($row["receive_date"]); ?>
                  <p class="text-gray-700">
                    Received: <?=date_format($timestamp1,"d F Y");?> / Revised: 20 November 2023 /
                    Accepted: 27 November 2023 / Published: 29 November 2023.
                  </p>
                  <div>
                    <button
                      class="bg-primary-color text-white cursor-pointer p-2 rounded-md"
                    >
                      Download
                    </button>
                   
                  </div>
                  <div class="mt-6 mb-10 text-sm">
                    <h3 class="font-bold text-lg mb-3">Abstract</h3>
                    <p class="text-gray-700 mb-3">
                    <?=$row['abstract']?>
                    </p>
                    
                    <span
                      >Keywords:
                      <?php 
                    
                      $sql2="SELECT keyword from article_keywords WHERE article_id = '$article_id' ";
                      $result2=$conn-> query($sql2);
                      while($row2=$result2-> fetch_assoc()){

                    
                    ?>
                      <a
                        class="hover:underline hover:text-primary-color cursor-pointer text-primary-color"
                        ><?=$row2['keyword']?></a
                      >;
                      <?php } ?>
                      <a
                        class="hover:underline hover:text-primary-color cursor-pointer text-primary-color"
                        >future production</a
                      ></span
                    >
                  </div>
                  <div class="text-sm">
                    <!-- INSERT EVERYTHING ABOUT THE ARTICLE HERE (MAIN ARTICLE CONTENT) -->
                    The Intergovernmental Panel on Climate Change’s sixth
                    assessment report (AR6) allocates 15% to 43% of global primary
                    energy to biomass in 2050 across multiple mitigation
                    scenarios. The report also emphasizes the importance of
                    electrification. For increased reliance on electricity and on
                    biomass, bioelectricity is expected to play a major role. It
                    is therefore vital to know whether the energy generation
                    potential of biomass electricity can support the removal of
                    its environmental impact, particularly as generation at large
                    scale is expected to rely almost solely on energy crops. This
                    paper evaluates the potential of short-rotation woody crops in
                    generating green electricity. This is performed using the
                    “Green Energy Return on Investment (EROIg)” methodology, which
                    indicates the net energy generated after investing in
                    ecosystem maintenance energy (ESME). This study found that the
                    EROIg of bioelectricity is marginally larger than unity when
                    convertet advantage with an EROIg of 1.11 and an EROIg-PE of
                    3.17. We conclude with a discussion of the indirect advantages
                    of growing energy crops, and discuss how this technique can be
                    used alongside others to help generate cleaner energy The
                    Intergovernmental Panel on Climate Change’s sixth assessment
                    report (AR6) allocates 15% to 43% of global primary energy to
                    biomass in 2050 across multiple mitigation scenarios. The
                    report also emphasizes the importance of electrification. For
                    increased reliance on electricity and on biomass,
                    bioelectricity is expected to play a major role. It is
                    therefore vital to know whether the energy generation
                    potential of biomass electricity can support the removal of
                    its environmental impact, particularly as generation at large
                    scale is expected to rely almost solely on energy crops. This
                    paper evaluates the potential of short-rotation woody crops in
                    generating green electricity. This is performed using the
                    “Green Energy Return on Investment (EROIg)” methodology, which
                    indicates the net energy generated after investing in
                    ecosystem maintenance energy (ESME). This study found that the
                    EROIg of bioelectricity is marginally larger than unity when
                    converted to its primary equivalent form (EROIg-PE). Three
                    design options were proposed to improve bioenergy’s EROIg.
                    Among these options, pelletizing wood chips has the largest
                    advantage with an EROIg of 1.11 and an EROIg-PE of 3.17. We
                    conclude with a discussion of the indirect advantages of
                    growing energy crops, and discuss how this technique can be
                    used alongside others to help generate cleaner energy The
                    Intergovernmental Panel on Climate Change’s sixth assessment
                    report (AR6) allocates 15% to 43% of global primary energy to
                    biomass in 2050 across multiple mitigation scenarios. The
                    report also emphasizes the importance of electrification. For
                    increased reliance on electricity and on biomass,
                    bioelectricity is expected to play a major role. It is
                    therefore vital to know whether the energy generation
                    potential of biomass electricity can support the removal of
                    its environmental impact, particularly as generation at large
                    scale is expected to rely almost solely on energy crops. This
                    paper evaluates the potential of short-rotation woody crops in
                    generating green electricity. This is performed using the
                    “Green Energy Return on Investment (EROIg)” methodology, which
                    indicates the net energy generated after investing in
                    ecosystem maintenance energy (ESME). This study found that the
                    EROIg of bioelectricity is marginally larger than unity when
                    converted to its primary equivalent form (EROIg-PE). Three
                    design options were proposed to improve bioenergy’s EROIg.
                    Among these options, pelletizing wood chips has the largest
                    advantage with an EROIg of 1.11 and an EROIg-PE of 3.17. We
                    conclude with a discussion of the indirect advantages of
                    growing energy crops, and discuss how this technique can be
                    used alongside others to help generate cleaner energy The
                    Intergovernmental Panel on Climate Change’s sixth assessment
                    report (AR6) allocates 15% to 43% of global primary energy to
                    biomass in 2050 across multiple mitigation scenarios. The
                    report also emphasizes the importance of electrification. For
                    increased reliance on electricity and on biomass,
                    bioelectricity is expected to play a major role. It is
                    therefore vital to know whether the energy generation
                    potential of biomass electricity can support the removal of
                    its environmental impact, particularly as generation at large
                    scale is expected to rely almost solely on energy crops. This
                    paper evaluates the potential of short-rotation woody crops in
                    generating green electricity. This is performed using the
                    “Green Energy Return on Investment (EROIg)” methodology, which
                    indicates the net energy generated after investing in
                    ecosystem maintenance energy (ESME). This study found that the
                    EROIg of bioelectricity is marginally larger than unity when
                    converted to its primary equivalent form (EROIg-PE). Three
                    design options were proposed to improve bioenergy’s EROIg.
                    Among these options, pelletizing wood chips has the largest
                    advantage with an EROIg of 1.11 and an EROIg-PE of 3.17. We
                    conclude with a discussion of the indirect advantages of
                    growing energy crops, and discuss how this technique can be
                    used alongside others to help generate cleaner energy The
                    Intergovernmental Panel on Climate Change’s sixth assessment
                    report (AR6) allocates 15% to 43% of global primary energy to
                    biomass in 2050 across multiple mitigation scenarios. The
                    report also emphasizes the importance of electrification. For
                    increased reliance on electricity and on biomass,
                    bioelectricity is expected to play a major role. It is
                    therefore vital to know whether the energy generation
                    potential of biomass electricity can support the removal of
                    its environmental impact, particularly as generation at large
                    scale is expected to rely almost solely on energy crops. This
                    paper evaluates the potential of short-rotation woody crops in
                    generating green electricity. This is performed using the
                    “Green Energy Return on Investment (EROIg)” methodology, which
                    indicates the net energy generated after investing in
                    ecosystem maintenance energy (ESME). This study found that the
                    EROIg of bioelectricity is marginally larger than unity when
                    converted to its primary equivalent form (EROIg-PE). Three
                    design options were proposed to improve bioenergy’s EROIg.
                    Among these options, pelletizing wood chips has the largest
                    advantage with an EROIg of 1.11 and an EROIg-PE of 3.17. We
                    conclude with a discussion of the indirect advantages of
                    growing energy crops, and discuss how this technique can be
                    used alongside others to help generate cleaner energy The
                    Intergovernmental Panel on Climate Change’s sixth assessment
                    report (AR6) allocates 15% to 43% of global primary energy to
                    biomass in 2050 across multiple mitigation scenarios. The
                    report also emphasizes the importance of electrification. For
                    increased reliance on electricity and on biomass,
                    bioelectricity is expected to play a major role. It is
                    therefore vital to know whether the energy generation
                    potential of biomass electricity can support the removal of
                    its environmental impact, particularly as generation at large
                    scale is expected to rely almost solely on energy crops. This
                    paper evaluates the potential of short-rotation woody crops in
                    generating green electricity. This is performed using the
                    “Green Energy Return on Investment (EROIg)” methodology, which
                    indicates the net energy generated after investing in
                    ecosystem maintenance energy (ESME). This study found that the
                    EROIg of bioelectricity is marginally larger than unity when
                    converted to its primary equivalent form (EROIg-PE). Three
                    design options were proposed to improve bioenergy’s EROIg.
                    Among these options, pelletizing wood chips has the largest
                    advantage with an EROIg of 1.11 and an EROIg-PE of 3.17. We
                    conclude with a discussion of the indirect advantages of
                    growing energy crops, and discuss how this technique can be
                    used alongside others to help generate cleaner energy
                  </div>
                </div>
                <!-- INDIVIDUAL LATEST ARTICLE BOX -->
              </div>
            </div>
            <!-- END OF SECOND COLUMN -->
          </div>
          <!-- END OF THE MAIN GRID LAYOUT -->
        </div>
        <!-- END OF THE MAIN PAGE LAYOUT -->
      </div>
      <!-- END OF THE WHOLE PAGE LAYOUT -->
      <?php require('footer.php'); ?>
    </div>

  </body>
</html>
