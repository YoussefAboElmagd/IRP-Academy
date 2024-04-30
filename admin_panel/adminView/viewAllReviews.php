<link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

<div >
  <h2>Articles Reviews</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Review ID</th>
        <th class="text-center">Article ID</th>
        <th class="text-center">Reviewer ID </th>
        <th class="text-center">Attachment</th>
        <th class="text-center">Submittion Date</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      //include_once "../config/dbconnect.php";
      include_once "../../config.php";
      $sql="SELECT * from article_reviews";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $timestamp = date_create($row["submitted_at"]);

    ?>
    <tr>
      <td><?=$row["review_id"]?></td>
      <td><?=$row["article_id"]?></td>
      <td><?=$row["reviewer_id"]?></td>      
      <td><?=$row["attachment_file"]?></td> 
       <!--Adding Time To Submittion Date:   H:i:s A    -->
      <td><?=date_format($timestamp,"d M, Y");?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="viewReviewDetails('<?=$row['review_id']?>')" data-toggle="modal" data-target="#editArticleModal">View Details</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="articleDelete('<?=$row['review_id']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Assign New Review
  </button>

  <!-- New Article Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="z-index: 9999;">

    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Review Assignment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="assignReview()" method="POST">
            <div class="form-group">
              <label for="name">Reviewer Email:</label>
              <input type="email" class="form-control" id="rev_mail" required>
            </div>
            <div class="form-group">
              <label for="qty">Article ID:</label>
              <input type="number" id="article_id" class="form-control" required/>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="assign_review" value="assign_review" style="height:40px">Assign Review</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  
    
  </div>
  <!-- New Article Modal -->


  <!-- Edit Article Modal -->
  <div class="modal fade" id="editArticleModal" role="dialog" style="z-index: 9999;">

    <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Review Information</h4>
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
  <!-- New Article Modal -->





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


 

</div>
<script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
