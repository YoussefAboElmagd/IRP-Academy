<?php 
  include_once "../../config.php";

   $article_ID = $_POST['record'];
   $art_file_name = $_POST['record_file'];

   $sql="SELECT * from articles WHERE article_id = '$article_ID' ";
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
            <input type="hidden" id="e_word_art_file_old" value="<?=$art_file_name?>">
            <div class="form-group">
              <label for="name">Article Title:</label>
              <input type="text" class="form-control" id="e_art_title" value="<?=$row['title']?>" required>
            </div>
            <div class="form-group">
              <label for="price">Abstract:</label>
              <textarea class="form-control" id="e_art_abstract" cols="30" rows="6" required><?=$row['abstract']?></textarea>
            </div>
            <div class="form-group">
              <label for="qty">Keywords:</label>
              <input id="e_art_keywords" class="form-control w-100 atags" data-role="tagsinput" value="<?=$aricle_keywords?>" />
            </div>
            <div class="form-group">
              <label for="qty">Number Of Pages:</label>
              <input type="number" id="e_art_nop" class="form-control" value="<?=$row['no_of_pages']?>" required/>
            </div>
            <div class="form-group">
              <label for="qty">Status:</label>
              <select id="e_art_status">
                <option value="<?=$row['a_status']?>" id="main_opt" class="bg-light" selected disabled ><?=$row['a_status']?></option>
                <option value="Pending">Pending</option>
                <option value="Accept in present form">Accept in present form</option>
                <option value="Accept after minor revision">Accept after minor revision</option>
                <option value="Accepted in present form">Accepted in present form</option>
                <option value="Rejected">Rejected</option>
              </select>
            </div>
            
            <div class="form-group">
                <label for="file">Updated Article File (only if you want to replace current file):</label>
                <input type="file" class="form-control-file" id="e_word_art_file_new">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="e_add_article" value="add_article" style="height:40px">Edit Article</button>
            </div>
    </form>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
