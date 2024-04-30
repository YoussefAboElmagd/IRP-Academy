
<div >
  <h2>Article Authors</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Article ID</th>
        <th class="text-center">Autor Email</th>
        <th class="text-center">Author Name</th>
        <th class="text-center">Corresponding Author</th>
        <th class="text-center">Author Title</th>
        <th class="text-center">Affiliation</th>
        <th class="text-center">Country</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      //include_once "../config/dbconnect.php";
      include_once "../../config.php";
      $article_ID = $a_id=$_POST['record'];
      $sql="SELECT * from article_authors WHERE article_id = '$article_ID' ";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["article_ID"]?></td>
      <td><?=$row["email_address"]?></td>
      <td><?=$row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ?></td> 
      <td><?=$row["corresponding_author"]?></td>     
      <td><?=$row["title"]?></td>   
      <td><?=$row["affiliation"]?></td>       
      <td><?=$row["country"]?></td>   
      <td><button class="btn btn-primary" style="height:40px" onclick="articleAuthorEditForm('<?=$row['email_address']?>','<?=$row['article_ID']?>')" data-toggle="modal" data-target="#editArticleAuthor">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="articleAuthorDelete('<?=$row['email_address']?>','<?=$row['article_ID']?>')">Delete</button></td>
      </tr>
      <?php

          }
        }
      ?>
  </table>


  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addArticleAuthor">
    Add Author To This Article
  </button>

   <!-- Add New Author Modal -->
  <div class="modal fade" id="addArticleAuthor" role="dialog" style="z-index: 9999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Author</h4>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addArticleAuthor()" method="POST">
            <input type="hidden" id="article_id" value="<?= $article_ID ?>" >
            <div class="form-group">
              <label for="name">Author Name:</label>
              <input type="text" class="form-control mb-2" id="f_name" placeholder="First Name" required>
              <input type="text" class="form-control mb-2" id="m_name" placeholder="Middle Name" required>
              <input type="text" class="form-control mb-2" id="l_name" placeholder="Last Name" required>
            </div>
            <div class="form-group">
              <label for="price">Email:</label>
              <input type="email" class="form-control" id="a_mail" required>
            </div>

            <div class="form-group">
              <label>Corresponding Author:</label>
              <select id="corres_auth" >
                <option disabled selected>Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Author Title</label>
              <select id="a_title" >
                <option disabled selected>Select</option>
                <option value="Dr.">Dr.</option>
                <option value="Prof.">Prof.</option>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Affiliation:</label>
              <input type="text" class="form-control" id="affiliation" required>
            </div>
            <div class="form-group">
                <label for="file">Country:</label>
                <input type="text" class="form-control-file" id="country">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="add_author" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Add New Author Modal -->

  
</div>
   