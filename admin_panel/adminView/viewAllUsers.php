<link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

<div >
  <h2>Users</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Title</th>
        <th class="text-center">Workplace</th>
        <th class="text-center">Job Type</th>
        <th class="text-center">Affiliation</th>
        <th class="text-center">Address</th>
        <th class="text-center">City</th>
        <th class="text-center">Country</th>
        <th class="text-center">Zip Code</th>
        <th class="text-center">Password</th>
        <th class="text-center">Join Date</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      //include_once "../config/dbconnect.php";
      include_once "../../config.php";
      $sql="SELECT * from users";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["user_id"]?></td>
      <td><?=$row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"]?></td>
      <td><?=$row["user_email"]?></td>      
      <td><?=$row["user_title"]?></td> 
      <td><?=$row["user_workplace"]?></td>     
      <td><?=$row["user_job_type"]?></td>     
      <td><?=$row["user_affiliation"]?></td>     
      <td><?=$row["user_address"]?></td>     
      <td><?=$row["city"]?></td>     
      <td><?=$row["country"]?></td>     
      <td><?=$row["zip_code"]?></td>     
      <td><?=$row["user_password"]?></td>     
      <td><?=$row["created_at"]?></td>     
      <td>  <button type="button" class="btn btn-secondary " onclick="showArticleAuthors('<?=$row['article_ID']?>')" style="height:40px" data-toggle="modal" data-target="#viewAuthorsModal">View</button></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="userEditForm('<?=$row['user_id']?>')" data-toggle="modal" data-target="#editArticleModal">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="articleDelete('<?=$row['article_ID']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Create New User
  </button>

  <!-- New User Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="z-index: 9999;">

    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Article</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" onsubmit="addUser()" method="POST">
          <div class="form-group">
            <label for="name">Name:</label>
            <input
              type="text"
              class="form-control mb-2"
              id="f_name"
              placeholder="First Name"
              required />
            <input
              type="text"
              class="form-control mb-2"
              id="m_name"
              placeholder="Middle Name"
              required />
            <input
              type="text"
              class="form-control mb-2"
              id="l_name"
              placeholder="Last Name"
              required />
          </div>
          <div class="form-group">
            <label for="qty">Email:</label>
            <input type="text" id="email" class="form-control w-100" required />
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="text" id="pass" class="form-control w-100" required />
          </div>
          <div class="form-group">
            <label for="qty">User Role:</label>
            <select id="u_role">
              <option value="1">Author</option>
              <option value="2">Reviewer</option>
              <option value="3">Editor</option>
            </select>
          </div>
          <div class="form-group">
            <label for="qty">Workplace:</label>
            <select id="u_workplace">
              <option value="Academic">Academic</option>
              <option value="Non=Formal">Non=Formal</option>
            </select>
          </div>

          <div class="form-group">
            <label for="qty">Job Type:</label>
            <select id="job_type">
              <option value="Academic">Academic</option>
              <option value="Historical">Historical</option>
            </select>
          </div>

          <div class="form-group">
            <label for="qty">Title:</label>
            <select id="title">
              <option value="Dr.">Dr.</option>
              <option value="Mr.">Mr.</option>
              <option value="Prof.">Prof.</option>
            </select>
          </div>
          <div class="form-group">
            <label>Facebook:</label>
            <input type="text" id="facebook" class="form-control w-100" />
          </div>
          <div class="form-group">
            <label>Twitter:</label>
            <input type="text" id="twitter" class="form-control w-100" />
          </div>
          <div class="form-group">
            <label>Affiliation:</label>
            <input type="text" id="affiliation" class="form-control w-100" />
          </div>
          <div class="form-group">
            <label>Address:</label>
            <input type="text" id="address" class="form-control w-100" />
          </div>
          <div class="form-group">
            <label>Zip Code:</label>
            <input type="text" id="zip_code" class="form-control w-100" />
          </div>
          <div class="form-group">
            <label>City:</label>
            <input type="text" id="city" class="form-control w-100" />
          </div>
          <div class="form-group">
            <label>Country:</label>
            <select id="country">
              <option value="Egypt">Egypt</option>
              <option value="Morocco">Morocco</option>
              <option value="Algeria">Algeria</option>
              <option value="Canada">Canada</option>
            </select>
          </div>

          <div class="form-group">
            <button
              type="submit"
              class="btn btn-secondary"
              id="add_user"
              value="add_user"
              style="height: 40px">
              Add New User
            </button>
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
