<link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

<div >
  <h2>Reviewers Applications</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Application Id</th>
        <th class="text-center">Submitted By</th>
        <th class="text-center">Pending</th>
        <th class="text-center">Submittion Date</th>
        <th class="text-center" colspan="3">Action</th>
      </tr>
    </thead>
    <?php
      //include_once "../config/dbconnect.php";
      include_once "../../config.php";
      $sql="SELECT * from reviewers_applications";

      $filter = "";
      if(isset($_POST['record'])){


        if($_POST['record'] != null){


          $filter = $_POST['record'];
          $filterType = $_POST['filter_type'];

          if($filterType == "appId"){
            $sql="SELECT * from reviewers_applications WHERE application_ID = $filter";
          }
          else if($filterType == "userId"){
            $sql="SELECT * from reviewers_applications WHERE submitted_by = $filter";
          }


        }
      }

      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $timestamp = date_create($row["submitted_at"]);

    ?>
    <tr>

      <td><?=$row["application_ID"]?></td>
      <td><?=$row["submitted_by"]?></td>
      <td><?=$row["app_status"]?></td>      
      <!--Adding Time To Submittion Date:   H:i:s A    -->
      <td><?=date_format($timestamp,"d M, Y");?></td>
      <?php if($row["app_status"] == "Pending"){ ?>
      <td><button class="btn btn-primary" style="height:40px" onclick="acceptRejectReview('<?=$row['application_ID']?>','Accepted')">Accept</button></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="acceptRejectReview('<?=$row['application_ID']?>','Rejected')">Reject</button></td>
      <?php } ?>
      <td><button class="btn btn-primary" style="height:40px" onclick="revAppViewDetails('<?=$row['application_ID']?>')" data-toggle="modal" data-target="#viewRevAppDetModal">View Details</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="deleteReviewerApplication('<?=$row['application_ID']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Assign New Review
  </button> -->

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
  <div class="modal fade" id="viewRevAppDetModal" role="dialog" style="z-index: 9999;">

    <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <div class="modal-dialog" style="max-width: 1200px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Reviewer Application Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body viewRevAppDetModal">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>

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
