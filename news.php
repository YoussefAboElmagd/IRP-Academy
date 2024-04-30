<?php include_once "./config.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/dist/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
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
    <link rel="stylesheet" href="./css/all.min.css" />
    <title>PAGE 3</title>
    <style>
        @media (min-width: 1536px){
          .container{
              max-width: 1280px !important;
          }
      }
    </style>
  </head>
  <body style="background-color:#f4ebda; padding:0 9%;">
      <?php 
        
        require('main_nav.php');
        require('searchbar.php');
    
        ?>
    <!-- START OF THE WHOLE PAGE LAYOUT -->
    <div class="bg-[#f5f5f5]" style="padding:0 9%;">

      <!-- START OF THE INNER PAGE LAYOUT -->
      <!-- INSERT NAVBAR HERE IF NEEDED -->
      <div class="bg-[#f5f5f5] container mx-auto md:p-16">
        <!-- START OF THE MAIN GRID LAYOUT -->
        <div class="grid grid-cols-2 lg:grid-cols-12 gap-4">
          <!-- START OF FIRST COLUMN -->
          <div class="col-span-12 lg:col-span-12 bg-[#f5f5f5]">
            <div class="bg-white p-12">
              <div
                class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-12"
              >
                <h1 class="font-bold text-2xl leading-tight mb-4 lg:mb-0">
                  Announcements
                </h1>
                <div class="w-1/2">
                  <form action="" method="get">
                    <input
                      class="outline-none border inline-block mb-2 lg:mb-0 w-full lg:w-3/4 border-gray-500 py-1 px-3 rounded-md text-sm"
                      type="text"
                      name="search"
                      placeholder="Search announcements..."
                    />
                    <button
                      class="rounded-md border border-black text-sm py-1 px-4 transition-all hover:text-white hover:bg-primary-color"
                      type= "submit"
                    >
                      Search
                    </button>
                  </form>
                </div>
              </div>

              <!-- START OF ANNOUNCEMENT LINKS -->
              <div class="text-sm">
                <!-- ANNOUNCEMENT LINK BOX -->
                <div
                  class="flex flex-col gap-3 md:flex-row items-center justify-between border-b border-t pt-4 pb-4"
                >
                  <a
                   href="news_page.php" class="cursor-pointer hover:underline text-primary-color fw-bolder" style="width: 85%;"
                  >
                    MDPI Insights: The CEO’s Letter #6 – Spain Summit, Research
                    Gate</a
                  >
                  <span>30 Nov 2023</span>
                </div>
                <!-- ANNOUNCEMENT LINK BOX -->
                <!-- ANNOUNCEMENT LINK BOX -->
                <div
                  class="flex flex-col gap-3 md:flex-row items-center justify-between border-b border-t pt-4 pb-4"
                >
                  <a
                    href="news_page.php" class="news-title cursor-pointer hover:underline text-primary-color fw-bolder" style="width: 85%;"
                  >
                    Children | Aims and Scope Update</a
                  >
                  <span>30 Nov 2023</span>
                </div>
                <!-- ANNOUNCEMENT LINK BOX -->
                <!-- ANNOUNCEMENT LINK BOX -->
                <div
                  class="flex flex-col gap-3 md:flex-row items-center justify-between border-b border-t pt-4 pb-4"
                >
                  <a
                  href="news_page.php" class="news-title cursor-pointer hover:underline text-primary-color fw-bolder" style="width: 85%;"
                  >
                    Diabetology Covered in the Emerging Sources Citation Index
                    in Web of Science</a
                  >
                  <span>30 Nov 2023</span>
                </div>
                <!-- ANNOUNCEMENT LINK BOX -->
                <!-- ANNOUNCEMENT LINK BOX -->
                <div
                  class="flex flex-col gap-3 md:flex-row items-center justify-between border-b border-t pt-4 pb-4"
                >
                  <a
                  href="news_page.php" class="news-title cursor-pointer hover:underline text-primary-color fw-bolder" style="width: 85%;"
                  >
                    Editorial Board Members from Epigenomes Featured in the 2023
                    Highly Cited Researchers List Published by Clarivate</a
                  >
                  <span>30 Nov 2023</span>
                </div>
                <!-- ANNOUNCEMENT LINK BOX -->
                <?php 

                      $search = ""; 
                      if(isset($_GET['search'])){
                        $search = $_GET['search'];
                      }
                      $sql="SELECT news_id,title,published_at from news WHERE title LIKE '%$search%' ";
                      $result=$conn-> query($sql);
                      if ($result-> num_rows > 0){
                        while ($row=$result-> fetch_assoc()) {
                          $timestamp = date_create($row["published_at"]);
                  

                ?>
                <!-- ANNOUNCEMENT LINK BOX -->
                <div
                  class="flex flex-col gap-3 md:flex-row items-center justify-between border-b border-t pt-4 pb-4"
                >
                  <a
                  href="news_page.php?nid=<?=$row['news_id']?>" class="news-title cursor-pointer hover:underline text-primary-color fw-bolder" style="width: 85%;"
                  >
                  <?=$row['title']?></a
                  >
                  <span><?=date_format($timestamp,"d M Y");?></span>
                </div>
                <!-- ANNOUNCEMENT LINK BOX -->
                <?php
                    }
                  }
                  else{
                    echo "<h5>No Related News Found<h5>";
                  }
                ?>
              </div>
              <!-- END OF ANNOUNCEMENT LINKS -->
            </div>
          </div>
          <!-- END OF FIRST COLUMN -->
        </div>
        <!-- END OF THE MAIN GRID LAYOUT -->
      </div>
      <!-- END OF THE MAIN PAGE LAYOUT -->

    </div>
    <!-- END OF THE WHOLE PAGE LAYOUT -->
    <?php require('footer.php'); ?>
  </body>
    
</html>
