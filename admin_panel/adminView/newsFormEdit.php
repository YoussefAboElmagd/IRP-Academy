<?php 
  include_once "../../config.php";

   $news_id = $_POST['record'];

   $sql="SELECT * from news WHERE news_id = '$news_id' ";
   $result=$conn-> query($sql);
   $row=$result-> fetch_assoc();
  



?>
  <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
  <form  enctype='multipart/form-data' onsubmit="updateNews()" method="POST">
  <input type="hidden" id="e_news_id" value="<?=$news_id?>">
  <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" id="e_news_title" value="<?=$row['title']?>" required>
            </div>
            <div class="form-group">
              <label for="qty">Content</label>
              <textarea id="e_news_content" class="form-control" required rows="8"><?=$row['content']?></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="edit_news" value="edit_news" style="height:40px">Edit Article</button>
            </div>
    </form>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
