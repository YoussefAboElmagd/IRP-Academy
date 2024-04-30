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








           


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1 class="fs-4">Articles For Review</h1>
                        

                                <div class="bg-white p-2 border border-1">
                                        

                                   
                                    <table class="table table-bordered table-responsive mb-0 ">
                                        <thead>
                                            <tr class="text-center table-light">
                                                <th>Article Title</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                        <?php 
                                             $sql = "SELECT review_id,article_id,r_status FROM article_reviews WHERE reviewer_id = '$id_usr_session' ";
                                             $result = mysqli_query($conn, $sql);
                                              
                                            while($row = $result -> fetch_assoc()){
                                                $art_id = $row['article_id'];
                                                $sql = "SELECT title FROM articles WHERE article_ID = '$art_id' ";
                                                $result2 = mysqli_query($conn, $sql);   
                                                $row2 = $result2 -> fetch_assoc();   
                                                $art_title = $row2['title'];                          
                                        ?>
                                                <tr>
                                                    <td><?=$art_title?></td>  
                                                    <td width="13%"><?php if($row['r_status'] == 0){echo "Not Submitted";}else{echo "Submitted";} ?></td>   
                                                    <?php if($row['r_status'] == 0){ ?>    
                                                    <td width="13%"><form class="p-0 m-0" action="article_review.php" method="get"><button type="submit" name="review_id" value="<?= $row['review_id'] ?>" class="btn pay-btn">Submit a Review</button></form></td> 
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