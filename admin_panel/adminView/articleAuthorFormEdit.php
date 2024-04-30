<?php 
  include_once "../../config.php";

   $article_ID = $_POST['record'];
   $auth_mail = $_POST['record_auth_mail'];

   $sql="SELECT * from article_authors WHERE article_id = '$article_ID' AND email_address =  '$auth_mail' ";
   $result=$conn-> query($sql);
   $row=$result-> fetch_assoc();

?>
  
          <form  enctype='multipart/form-data' onsubmit="updateArticleAuthor()" method="POST">
          <input type="hidden" id="e_article_id" value="<?= $article_ID ?>" >
            <div class="form-group">
              <label for="name">Author Name:</label>
              <input type="text" class="form-control mb-2" id="e_f_name" placeholder="First Name" value="<?=$row["first_name"]?>" required>
              <input type="text" class="form-control mb-2" id="e_m_name" placeholder="Middle Name" value="<?=$row["middle_name"]?>" required>
              <input type="text" class="form-control mb-2" id="e_l_name" placeholder="Last Name" value="<?=$row["last_name"]?>" required>
            </div>
            <div class="form-group">
              <label for="price">Email:</label>
              <input type="email" class="form-control" id="e_a_mail" value="<?=$row["email_address"]?>" required>
            </div>

            <div class="form-group">
              <label>Corresponding Author:</label>
              <select id="e_corres_auth" >
                <option disabled selected>Select</option>
                <option value="1" <?php if($row["corresponding_author"] == 1){ echo "selected";} ?> >Yes</option>
                <option value="0" <?php if($row["corresponding_author"] == 0){ echo "selected";} ?> >No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Author Title</label>
              <select id="e_a_title" >
                <option disabled selected>Select</option>
                <option value="Dr." <?php if($row["title"] == "Dr."){ echo "selected";} ?> >Dr.</option>
                <option value="Prof." <?php if($row["title"] == "Prof."){ echo "selected";} ?> >Prof.</option>
                <option value="Mr." <?php if($row["title"] == "Mr."){ echo "selected";} ?> >Mr.</option>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Affiliation:</label>
              <input type="text" class="form-control" id="e_affiliation" value="<?=$row["affiliation"]?>" required>   
            </div>
            <div class="form-group">
                <label for="file">Country:</label>
                <input type="text" class="form-control-file" value="<?=$row["country"]?>" id="e_country">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="edit_auth" style="height:40px">Apply Edit</button>
            </div>
          </form>

       