<?php
    session_start();
    require_once('config.php');
    if(!isset($_SESSION['usr_id'])){
        header("Location: login.php");
    }
    $id_usr_session = $_SESSION['usr_id'];
    $sql = " SELECT user_email FROM users WHERE user_id = '$id_usr_session' AND check_profile_complete = 0 ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        header("Location: profile_not_completed.php");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/edit_profile.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <style>
        .pay-btn{

            font-size: 12px;
            color: white;
            background-color: #5c3d1a;
            border: solid 1px #5c3d1a;
        }
        .pay-btn:hover{
            background-color: #3a2d11;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main" id="main">




            <div class="alert alert-danger alert-dismissible fade show d-none" id="error_msg_step1" role="alert">
                <strong>Error!</strong> Please make sure that you filled all required fields.

            </div>

            <div class="alert alert-danger alert-dismissible fade fs-6 show d-none" id="error_msg_step2" role="alert">
                <strong>Error!</strong> Please select file to be uploaded.
            </div>





           


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1 class="fs-4">User Invoices</h1>
                        

                                <div class="bg-white p-2 border border-1">
                                        

                                   
                                    <table class="table table-bordered table-responsive mb-0 ">
                                        <thead>
                                            <tr class="text-center table-light">
                                                <th>Transaction ID</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Payment Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            <?php 
                                            
                                            $sql = "SELECT * FROM user_payment WHERE paid_by = '$id_usr_session' ";
                                            $result = mysqli_query($conn, $sql);
                                             
                                            while($row = $result -> fetch_assoc()){
                                                $trans_id = $row['transaction_id'];
                                            
                                            ?>
                                                <tr>

                                                    <td><?=$trans_id?></td>   
                                                    <td><?=$row['full_name']?></td>         
                                                    <td><?=$row['amount'].'$'?></td>    
                                                    <td><?=$row['payment_status']?></td>  
                                                    <td><?=$row['payment_date']?></td>   
                                                    <?php if($row['payment_status'] == "Not Paid"){ ?>  
                                                    <td><form class="p-0 m-0" action="pay_invoice.php" method="get"><button type="submit" name="pay_invoice" value='<?=$trans_id?>' class="btn pay-btn w-100">Pay</button></form></td>    
                                                    <?php } ?> 
                                                    <?php if($row['payment_status'] == "Accepted"){ ?>  
                                                    <td><form class="p-0 m-0" action="invoice_pdf.php" method="get"><button type="submit" name="inv" value='<?=$trans_id?>' class="btn pay-btn w-100">View Invoice</button></form></td>    
                                                    <?php } ?> 
                                                </tr>
                                            <?php } ?>        

                                        </tbody>
                                    </table>



                                </div>




                                




                                
                             
                             

                            
                            

                        </div>
        
                    </div>

                </div>

            </div>


        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script> 
    <script src="./scripts/bootstrap.bundle.min.js"></script>

</body>
</html>