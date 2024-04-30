<link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

<div >
  <h2>Articles Reviews</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Details</th>
        <th class="text-center">Published At</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
  include_once "../../config.php";
  $sql="SELECT * from news";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $timestamp = date_create($row["published_at"]);

    ?>
    <tr>
      <td><?=$row["news_id"]?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="viewNewsDetails('<?=$row['news_id']?>')" data-toggle="modal" data-target="#editArticleModal">View Details</button></td>
      <!--Adding Time To Submittion Date:   H:i:s A    -->
      <td><?=date_format($timestamp,"d M, Y");?></td> 
      <td><button class="btn btn-primary" style="height:40px" onclick="newsEditForm('<?=$row['news_id']?>')" data-toggle="modal" data-target="#editNewsModal">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="deleteNews('<?=$row['news_id']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    New Anouncement
  </button>

  <!-- New Invoice Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="z-index: 9999;">

    <div class="modal-dialog" style="max-width: 1200px;" >
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Anouncement</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addNews()" method="POST">
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" id="news_title" required>
            </div>
            <div class="form-group">
              <label for="qty">Content</label>
              <textarea id="news_content" class="form-control" required rows="8"></textarea>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="create_news" value="create_news" style="height:40px">Create New Anouncement</button>
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
  <div class="modal fade" id="editNewsModal" role="dialog" style="z-index: 99999;">
    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Announcement</h4>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body editNewsModal">

                

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
