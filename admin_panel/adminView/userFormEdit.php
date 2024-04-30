<?php 
  include_once "../../config.php";

   $user_ID = $_POST['record'];

   $sql="SELECT * from users WHERE user_id = '$user_ID' ";
   $result=$conn-> query($sql);
   $row=$result-> fetch_assoc();
  
   


?>
  <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
      <form enctype="multipart/form-data" onsubmit="updateUser()" method="POST">
      <input type="hidden" id="e_user_id" value="<?=$user_ID?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input
          type="text"
          class="form-control mb-2"
          id="e_f_name"
          value="<?=$row['first_name']?>"
          placeholder="First Name"
          required />
        <input
          type="text"
          class="form-control mb-2"
          id="e_m_name"
          value="<?=$row['middle_name']?>"
          placeholder="Middle Name"
          required />
        <input
          type="text"
          class="form-control mb-2"
          id="e_l_name"
          value="<?=$row['last_name']?>"
          placeholder="Last Name"
          required />
      </div>
      <div class="form-group">
        <label for="qty">Email:</label>
        <input type="text" id="e_email" value="<?=$row['user_email']?>" class="form-control" required />
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="text" id="e_pass" value="<?=$row['user_password']?>" class="form-control" required />
      </div>
      <div class="form-group">
        <label for="qty">User Role:</label>
        <select id="e_u_role">
          <option selected value="<?=$row['user_type']?>"><?php switch ($row['user_type']) {case '1':echo "Author"; break;case '2':echo "Reviewer"; break;case '3':echo "Editor"; break;default:echo "Admin";break;}?></option>
          <option value="1">Author</option>
          <option value="2">Reviewer</option>
          <option value="3">Editor</option>
        </select>
      </div>
      <div class="form-group">
        <label for="qty">Workplace:</label>
        <select id="e_u_workplace">
          <option selected value="<?=$row['user_workplace']?>"><?=$row['user_workplace']?></option>
          <option value="Academic">Academic</option>
          <option value="Non=Formal">Non=Formal</option>
        </select>
      </div>

      <div class="form-group">
        <label for="qty">Job Type:</label>
        <select id="e_job_type">
          <option selected value="<?=$row['user_job_type']?>"><?=$row['user_job_type']?></option>
          <option value="Academic">Academic</option>
          <option value="Historical">Historical</option>
        </select>
      </div>

      <div class="form-group">
        <label for="qty">Title:</label>
        <select id="e_title">
          <option selected value="<?=$row['user_title']?>"><?=$row['user_title']?></option>
          <option value="Dr.">Dr.</option>
          <option value="Mr.">Mr.</option>
          <option value="Prof.">Prof.</option>
        </select>
      </div>
      <div class="form-group">
        <label>Facebook:</label>
        <input type="text" id="e_facebook" value="<?=$row['facebook']?>" class="form-control w-100" />
      </div>
      <div class="form-group">
        <label>Twitter:</label>
        <input type="text" id="e_twitter" value="<?=$row['twitter']?>" class="form-control w-100" />
      </div>
      <div class="form-group">
        <label>Affiliation:</label>
        <input type="text" id="e_affiliation" value="<?=$row['user_affiliation']?>" class="form-control w-100" />
      </div>
      <div class="form-group">
        <label>Address:</label>
        <input type="text" id="e_address" value="<?=$row['user_address']?>" class="form-control w-100" />
      </div>
      <div class="form-group">
        <label>Zip Code:</label>
        <input type="text" id="e_zip_code" value="<?=$row['zip_code']?>" class="form-control w-100" />
      </div>
      <div class="form-group">
        <label>City:</label>
        <input type="text" id="e_city" value="<?=$row['city']?>" class="form-control w-100" />
      </div>
      <div class="form-group">
        <label>Country:</label>
        <select id="e_country">
          <option selected value="<?=$row['country']?>"><?=$row['country']?></option>
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
          id="edit_user"
          value="edit_user"
          style="height: 40px">
          Update User Information
        </button>
      </div>
    </form>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
