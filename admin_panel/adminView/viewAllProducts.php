<link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

<div >
  
  <h2>Articles</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Article Details</th>
        <th class="text-center">File</th>
        <th class="text-center">Receive Date</th>
        <th class="text-center">NoP</th>
        <th class="text-center">Status</th>
        <th class="text-center">Created By</th>
        <th class="text-center">Authors</th>
        <th class="text-center">Suggested Reviewers</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      //include_once "../config/dbconnect.php";
      include_once "../../config.php";
      $sql="SELECT * from articles";
      $filter = "";
      if(isset($_POST['record'])){


        if($_POST['record'] != null){


          $filter = $_POST['record'];
          $filterType = $_POST['filter_type'];

          if($filterType == "id"){
            $sql="SELECT * from articles WHERE article_id = $filter";
          }
          else if($filterType == "name"){
            $sql="SELECT * from articles WHERE article_id IN (SELECT article_id FROM article_authors WHERE CONCAT(first_name,' ',middle_name,' ',last_name) LIKE  '%$filter%')";
          }


        }
      }

      $result=$conn-> query($sql);
      print_r($result);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["article_ID"]?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="articleViewDetails('<?=$row['article_ID']?>')" data-toggle="modal" data-target="#viewArticleDetailsModal">View Details</button></td>
      <td><a href='../../ResearchWebsiteProject/downloadFile.php?file=<?=$row["file_name"]?>' target="_blank" class="btn btn-outline-secondary"><?=$row["file_name"]?></a></td> 
      <td><?=$row["receive_date"]?></td>     
      <td><?=$row["no_of_pages"]?></td>     
      <td><?=$row["a_status"]?></td>     
      <td><?=$row["created_by"]?></td>     
      <td>  <button type="button" class="btn btn-secondary " onclick="showArticleAuthors('<?=$row['article_ID']?>')" style="height:40px" data-toggle="modal" data-target="#viewAuthorsModal">View</button></td>     
      <td>  <button type="button" class="btn btn-secondary " onclick="showArticleSuggestedReviewers('<?=$row['article_ID']?>')" style="height:40px" data-toggle="modal" data-target="#viewSuggestedReviewersModal">View</button></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="articleEditForm('<?=$row['article_ID']?>','<?=$row['file_name']?>')" data-toggle="modal" data-target="#editArticleModal">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="articleDelete('<?=$row['article_ID']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Create New Article
  </button>

  <!-- New Article Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="z-index: 9999;">

    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Article</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addArticle()" method="POST">
            <div class="form-group">
              <label for="name">Article Title:</label>
              <input type="text" class="form-control" id="art_title" required>
            </div>
            <div class="form-group">
              <label for="price">Abstract:</label>
              <textarea class="form-control" id="art_abstract" cols="30" rows="6" required></textarea>
            </div>
            <div class="form-group">
              <label for="qty">Keywords:</label>
              <input type="text" id="art_keywords" class="form-control w-100 atags" data-role="tagsinput"/>
            </div>
            <div class="form-group">
              <label for="qty">Number Of Pages:</label>
              <input type="number" id="art_nop" class="form-control" required/>
            </div>
            
            <div class="form-group">
                <label for="file">Choose Article File:</label>
                <input type="file" class="form-control-file" id="word_art_file" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="add_article" value="add_article" style="height:40px">Create Article</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
    <script>
      $(document).ready(function(){
 
      /* this function will call when onchange event fired */
      $("#word_art_file").on("change",function(){
            
          /* current this object refer to input element */
          var $input = $(this);

          /* collect list of files choosen */
          var files = $input[0].files;

          var filename = files[0].name;

          /* getting file extenstion eg- .jpg,.png, etc */
          var extension = filename.substr(filename.lastIndexOf("."));

          /* define allowed file types */
          var allowedExtensionsRegx = /(\.txt|\.docx|\.pdf)$/i;

          /* testing extension with regular expression */
          var isAllowed = allowedExtensionsRegx.test(extension);

          if(isAllowed){
              
          }else{
            $input.val('');
            alert('File type is not valid.');
          }
      });    
      });
    </script>
    
  </div>
  <!-- New Article Modal -->


  <!-- Edit Article Modal -->
  <div class="modal fade" id="editArticleModal" role="dialog" style="z-index: 9999;">

    <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Article</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body editArticleModal">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
    <script>
      $(document).ready(function(){
 
      /* this function will call when onchange event fired */
      $("#word_art_file").on("change",function(){
            
          /* current this object refer to input element */
          var $input = $(this);

          /* collect list of files choosen */
          var files = $input[0].files;

          var filename = files[0].name;

          /* getting file extenstion eg- .jpg,.png, etc */
          var extension = filename.substr(filename.lastIndexOf("."));

          /* define allowed file types */
          var allowedExtensionsRegx = /(\.txt|\.docx|\.pdf)$/i;

          /* testing extension with regular expression */
          var isAllowed = allowedExtensionsRegx.test(extension);

          if(isAllowed){
              
          }else{
            $input.val('');
            alert('File type is not valid.');
          }
      });    
      });
    </script>

  </div>
  <!-- Edit Article Modal -->

  <!-- view Article Details Modal -->
  <div class="modal fade" id="viewArticleDetailsModal" role="dialog" style="z-index: 9999;">

    <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Article Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body viewArticleDetailsModal">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>

  </div>
  <!-- view Article Details Modal -->





  <!-- View Authors Modal -->
  <div class="modal fade " id="viewAuthorsModal" role="dialog">
    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Article Authors</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body articleAuthorsContent">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- View Authors Modal -->
  <!-- Edit Author Modal -->
  <div class="modal fade" id="editArticleAuthor" role="dialog" style="z-index: 99999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Author Information</h4>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body editAticleAuthorModal">

                

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- EDIT Author Modal -->


  <!-- View Suggested Reviewers Modal -->
  <div class="modal fade " id="viewSuggestedReviewersModal" role="dialog">
    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Article Suggested Reviewers</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body articleSuggestedReviewersContent">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- View Authors Modal -->

</div>
<script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
