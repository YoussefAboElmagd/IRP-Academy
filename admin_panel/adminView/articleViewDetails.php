<?php 
  include_once "../../config.php";

   $article_ID = $_POST['record'];

   $sql="SELECT title,abstract from articles WHERE article_id = '$article_ID' ";
   $result=$conn-> query($sql);
   $row=$result-> fetch_assoc();
  
   $sql="SELECT keyword from article_keywords WHERE article_id = '$article_ID' ";
   $result2=$conn-> query($sql);



   $aricle_keywords = "";
  if ($result2-> num_rows > 0){
    while ($row2=$result2-> fetch_assoc()) {
      $aricle_keywords = $aricle_keywords . $row2['keyword'] . ",";
    }
  } 
   


?>
  <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
  <form  enctype='multipart/form-data' onsubmit="updateArticle()" method="POST">
              <?php print_r($row2); ?>
            <input type="hidden" id="e_art_id" value="<?=$article_ID?>">
            <div class="form-group">
              <label for="name">Article Title:</label>
              <input type="text" class="form-control" id="v_art_title" value="<?=$row['title']?>" readonly>
            </div>
            <div class="form-group">
              <label for="price">Abstract:</label>
              <textarea class="form-control" id="v_art_abstract" cols="30" rows="9" readonly><?=$row['abstract']?></textarea>
            </div>
            <div class="form-group">
              <label for="qty">Keywords:</label>
              <input id="v_art_keywords" class="form-control w-100 atags" data-role="tagsinput" value="<?=$aricle_keywords?>" />
            </div>
    </form>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
    <script>
       


       $('.atags').on('itemAdded', function(event) {
        $(".tag.label.label-info span").remove();
        $(".bootstrap-tagsinput input").attr('readonly','readonly');
       });
       
    </script> 
