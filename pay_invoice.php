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
    <link href="styles//edit_profile.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
</head>
<body>
<?php 

    $submitted = isset($_POST['pay_invoice']);
    if(isset($_GET['pay_invoice'])){
        $transaction_id = $_GET['pay_invoice'];
    }
    $sql = "SELECT amount FROM user_payment  WHERE transaction_id = '$transaction_id' ";
    $result = mysqli_query($conn,$sql);
    $amount_row = $result -> fetch_assoc();
    if($submitted){


        if(isset($_FILES['invoice_img'])){
            $invoice_img = $_FILES['invoice_img'];
            $file_name_ext = explode(".", $invoice_img['name']);
            $file_ext = $file_name_ext[1];
            $final_file_name = "invoice_" . uniqid() . "." . $file_ext;
            $file_destination = "uploads/invoices/$final_file_name";
            move_uploaded_file($invoice_img['tmp_name'],$file_destination);
        }

        
        extract($_POST);
        $sql = "UPDATE user_payment SET full_name = '$inv_usr_name', proof= '$final_file_name', paid_by = '$id_usr_session', payment_date = CURRENT_TIMESTAMP(), payment_status = 'In-Processing'  WHERE transaction_id = '$trans_id' ";
        $result = mysqli_query($conn,$sql);



        

    }





?>
    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main">

            <?php 
            
                if(isset($_POST['pay_invoice'])){
                    echo '            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your payment has been completed succesfully and being processed
                </div>';
                }
            
            ?>


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1>Proccessing Invoice</h1>

                            <form class="bg-white" id="rev_app_form" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                                <input type="hidden" name="trans_id" value="<?=$_GET['pay_invoice']?>">
                                <div>
                                    <fieldset>
                                        <legend>Invoice Payment</legend>
                                        <div class="row"> 
                                            <div class="col-md-10 mx-auto">
                                                <div class="inputs py-5">

                                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                        </svg>
                                                        <div class="ms-2 fs-6">
                                                            <strong>IRP Bank Account Information</strong><br>
                                                            Account Number : 451613216815616456
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="heighst_degree"><sup>*</sup>Full Name</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                            <input type="text" name="inv_usr_name" class="form-control w-100" required/>
                                                            </div>
                                                        </div>
                                                    </div>

            


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto" ><sup>*</sup>Payment Proof</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input class="form-control" name="invoice_img" type="file" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                                <label class="ms-auto " for="reviewed_journals">Invoice Amount</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input value="<?= $amount_row['amount'] ?>" class="form-control bg-light text-muted" type="text" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    

                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 p-0 text-end me-3">
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <button type="submit" name="pay_invoice" class="btn w-25 mt-2 mb-4 py-2">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    


                                                </div>
                                            </div>
                                        </div>

                                        
                                    </fieldset>
                                </div>
                            </form>

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