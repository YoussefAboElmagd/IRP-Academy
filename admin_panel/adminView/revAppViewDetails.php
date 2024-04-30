<?php 
  include_once "../../config.php";

   $application_ID  = $_POST['record'];

   $sql="SELECT * from reviewers_applications WHERE application_ID  = '$application_ID ' ";
   $result=$conn-> query($sql);
   $row=$result-> fetch_assoc();
  
   $sql="SELECT keyword from reviwers_application_keywords WHERE application_ID  = '$application_ID ' ";
   $result2=$conn-> query($sql);



   $rev_app_keywords = "";
  if ($result2-> num_rows > 0){
    while ($row2=$result2-> fetch_assoc()) {
      $rev_app_keywords = $rev_app_keywords . $row2['keyword'] . ",";
    }
  } 
   


?>
  <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
  <form  enctype='multipart/form-data' method="POST">
            <div class="form-group">
              <label for="name">Highest Degree:</label>
              <input type="text" class="form-control" value="<?=$row['highest_degree']?>" readonly>
            </div>
            <div class="form-group">
              <label for="price">Affiliation:</label>
              <textarea class="form-control" cols="30" rows="6" readonly><?=$row['affiliation']?></textarea>
            </div>
            <div class="form-group my-3">
              <label for="price">CV File: &nbsp;</label>
              <a href='../../ResearchWebsiteProject/downloadFile.php?file=<?=$row["cv_file"]?>' target="_blank" class="btn btn-outline-secondary"><?=$row["cv_file"]?></a>
            </div>
            <div class="form-group">
              <label for="price">Reviewed Journals:</label>
              <textarea class="form-control" cols="30" rows="6" readonly><?=$row['reviewed_journals']?></textarea>
            </div>
            <div class="form-group">
              <label for="name">Review Frequency:</label>
              <input type="text" class="form-control w-50" value="<?=$row['review_frequency']?>" readonly>
            </div>
            <div class="form-group">
              <label for="qty">Keywords:</label>
              <input  class="form-control w-100 atags" data-role="tagsinput" value="<?=$rev_app_keywords?>" />
            </div>
    </form>

    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
    <script>
       


       $('.atags').on('itemAdded', function(event) {
        $(".tag.label.label-info span").remove();
        $(".bootstrap-tagsinput input").attr('readonly','readonly');
       });
       
    </script> 
