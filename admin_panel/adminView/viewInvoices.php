<link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

<div >
  <h2>Invoices</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Transaction ID</th>
        <th class="text-center">Full Name</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Proof</th>
        <th class="text-center">Payment Date</th>
        <th class="text-center">Status</th>
        <th class="text-center">Paid By</th>
        <th class="text-center" colspan="3">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../../config.php";
      $sql="SELECT * from user_payment";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["transaction_id"]?></td>
      <td><?=$row["full_name"]?></td>
      <td><?=$row["amount"]?></td>      
      <td><a href='../../downloadFile.php?file=<?=$row["proof"]?>' target="_blank" class="btn btn-outline-secondary"><?=$row["proof"]?></a></td> 
      <td><?=$row["payment_date"]?></td>     
      <td><?=$row["payment_status"]?></td>     
      <td><?=$row["paid_by"]?></td> 
      <?php if( ($row["payment_status"] == "Not Paid") || ($row["payment_status"] == "In-Processing") ){ ?> 
      <td><button class="btn btn-primary" style="height:40px" onclick="acceptRejectInvoice('<?=$row['transaction_id']?>','Accepted')">Accept</button></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="acceptRejectInvoice('<?=$row['transaction_id']?>','Rejected')">Reject</button></td>
      <?php } ?>
      <?php if( ($row["payment_status"] == "Accepted")){ ?> 
      <td>  <button type="button" class="btn btn-warning " style="height:40px" onclick="showQR('<?=$row['transaction_id']?>','<?=$row['qr_code']?>');" data-toggle="modal" data-target="#qrCodeModal">QR Code</button></td>
      <td><a href="../../invoice_pdf.php?inv=<?=$row['transaction_id']?>" target="_blank" class="btn btn-primary">View Invoice</a></td>
      <?php } ?>
      <td><button class="btn btn-danger" style="height:40px" onclick="deleteInvoice('<?=$row['transaction_id']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Create New Invoice
  </button>

  <!-- New Article Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="z-index: 9999;">

    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Invoice</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="newInvoice();return false;" method="POST">
            <div class="form-group">
              <label for="name">User Email:</label>
              <input type="email" class="form-control" id="usr_mail" required>
            </div>
            <div class="form-group">
              <label for="qty">Payment Amount:</label>
              <input type="number" step=".01" id="amount" class="form-control" required/>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="create_invoice" value="create_invoice" style="height:40px">Create Invoice</button>
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


  <!-- Show QR Code -->
  <div class="modal fade " id="qrCodeModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="qr_trans_id"> </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body qrCodeModal text-center ">
            <img src="" id="qr_image" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Show QR Code -->

</div>
<script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
