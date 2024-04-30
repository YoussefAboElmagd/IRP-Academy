<?php 
if(!isset($_GET['nid'])){
  header("Location: news.php");
}
else{
  include_once "./config.php";
  $news_id = $_GET['nid'];
  $sql="SELECT title,content,published_at from news WHERE news_id = '$news_id' ";
  $result=$conn-> query($sql);
  if ($result-> num_rows == 0){
    header("Location: news.php");
  }
  else{
    $row=$result-> fetch_assoc();
    $timestamp = date_create($row["published_at"]);
  }
}
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>PAGE 4</title>
  </head>
  <body style="background-color:#f4ebda;padding:0 9%;">
    
    <!-- START OF THE WHOLE PAGE LAYOUT -->
    <div class="container" >
      <?php 
          
          require('main_nav.php');
          require('searchbar.php');
      
      ?>
      <!-- START OF THE INNER PAGE LAYOUT -->
      <!-- INSERT NAVBAR HERE IF NEEDED -->
      <div class="bg-[#f5f5f5] container mx-auto md:p-16" >
        <!-- START OF THE MAIN GRID LAYOUT -->
        <div class="grid grid-cols-2 lg:grid-cols-12 gap-4">
          <!-- START OF FIRST COLUMN -->
          <div class="col-span-12 lg:col-span-12 bg-[#f5f5f5] " style="padding:0 9%;">
            <div class="bg-white p-12" >
              <div class="flex flex-col gap-4 text-sm mb-8 ">
                <span class="text-xs"><?=date_format($timestamp,"d F Y");?></span>
                <h2 class="font-bold text-xl">
                  <?=$row['title']?>
                </h2>
                <p style="word-wrap: break-word;">
                  <?=$row['content']?>
                </p>

              </div>

              <div class="border-b border-t p-4 flex justify-end gap-2 mb-4">
                <i
                  class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-facebook"
                ></i>
                <i
                  class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-twitter"
                ></i>
                <i
                  class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-linkedin"
                ></i>
              </div>
              <a
                href="news.php" class="text-xs hover:underline cursor-pointer text-primary-color"
                >More News & Announcements...</a
              >
            </div>
          </div>
          <!-- END OF FIRST COLUMN -->
        </div>
        <!-- END OF THE MAIN GRID LAYOUT -->
      </div>
      <!-- END OF THE MAIN PAGE LAYOUT -->
      <?php require('footer.php'); ?>
    </div>
    <!-- END OF THE WHOLE PAGE LAYOUT -->
  </body>
</html>
