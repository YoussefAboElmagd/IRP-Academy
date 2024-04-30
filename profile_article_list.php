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

                            <h1 class="fs-4">Articles Status</h1>

                            <div class="bg-white p-2 border border-1">

                                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active " id="in-proccessing-tab" data-bs-toggle="tab" data-bs-target="#in-proccessing-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">In-proccessing submissions</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Website Online submissions</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Rejected</button>
                                    </li>
                                    
                                </ul>

                                <div class="tab-content" id="myTabContent">


                                    <div class="tab-pane fade show active" id="in-proccessing-tab-pane" role="tabpanel" aria-labelledby="in-proccessing-tab" tabindex="0">
                                            

                                    
                                        <table class="table table-bordered table-responsive mt-3 ">
                                            <thead>
                                                <tr class="text-center table-light">
                                                    <th>Manuscript ID</th>
                                                    <th>Journal</th>
                                                    <th>Section / Special Issue</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Submission Date</th>
                                                </tr>
                                            </thead>
                
                                            <tbody>
                                                


                                                <?php 
                                            
                                                    $query = "SELECT article_id,journal,title,a_status,receive_date FROM articles Where created_by='$id_usr_session' AND a_Status='Pending'";
                                                    $result = mysqli_query($conn,$query);
                                                    $article_num = mysqli_num_rows($result);
                                                    if($article_num == 0){

                                                ?>





                                                    <tr>
                                                        <td colspan="6">
                                                        There are no uploaded manuscripts. <a href="new_article.php">Click here</a> to
                                                        submit your manuscript.
                                                        </td>
                                                    </tr>
                                                <?php }
                                                    
                                                    else{
                                                        while($row = mysqli_fetch_assoc($result)){
                                                ?>

                                                <tr>
                                                    <td><?php echo $row['article_id']; ?></td>
                                                    <td><?php echo $row['journal']; ?></td>
                                                    <td>-</td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['a_status']; ?></td>
                                                    <td><?php echo $row['receive_date']; ?></td>
                                                </tr>

                                                <?php

                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>



                                    </div>




                                    <div class="tab-pane fade" id="approved-tab-pane" role="tabpanel" aria-labelledby="approved-tab" tabindex="0">
                                        



                                            <table class="table table-bordered table-responsive mt-3">
                                                <thead>
                                                    <tr class="text-center table-light">
                                                        <th>Manuscript ID</th>
                                                        <th>Journal</th>
                                                        <th>Section / Special Issue</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Submission Date</th>
                                                    </tr>
                                                </thead>
                    
                                                <tbody>
                                                


                                                    <?php 
                                                
                                                        $query = "SELECT article_id,journal,title,a_status,receive_date FROM articles Where created_by='$id_usr_session' AND a_Status='Approved'";
                                                        $result = mysqli_query($conn,$query);
                                                        $article_num = mysqli_num_rows($result);
                                                        if($article_num == 0){

                                                    ?>





                                                        <tr>
                                                            <td colspan="6">
                                                            There are no uploaded manuscripts. <a href="new_article.php">Click here</a> to
                                                            submit your manuscript.
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                        
                                                        else{
                                                            while($row = mysqli_fetch_assoc($result)){
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $row['article_id']; ?></td>
                                                        <td><?php echo $row['journal']; ?></td>
                                                        <td>-</td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['a_status']; ?></td>
                                                        <td><?php echo $row['receive_date']; ?></td>
                                                    </tr>

                                                    <?php

                                                        }
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>




                                    </div>





                                    <div class="tab-pane fade" id="rejected-tab-pane" role="tabpanel" aria-labelledby="rejected-tab" tabindex="0">
                                        



                                        <table class="table table-bordered table-responsive mt-3">
                                                <thead>
                                                    <tr class="text-center table-light">
                                                        <th>Manuscript ID</th>
                                                        <th>Journal</th>
                                                        <th>Section / Special Issue</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Submission Date</th>
                                                    </tr>
                                                </thead>
                    
                                                <tbody>
                                                


                                                    <?php 
                                                
                                                        $query = "SELECT article_id,journal,title,a_status,receive_date FROM articles Where created_by='$id_usr_session' AND a_Status='Rejected'";
                                                        $result = mysqli_query($conn,$query);
                                                        $article_num = mysqli_num_rows($result);
                                                        if($article_num == 0){

                                                    ?>





                                                        <tr>
                                                            <td colspan="6">
                                                            There are no uploaded manuscripts. <a href="new_article.php">Click here</a> to
                                                            submit your manuscript.
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                        
                                                        else{
                                                            while($row = mysqli_fetch_assoc($result)){
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $row['article_id']; ?></td>
                                                        <td><?php echo $row['journal']; ?></td>
                                                        <td>-</td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['a_status']; ?></td>
                                                        <td><?php echo $row['receive_date']; ?></td>
                                                    </tr>

                                                    <?php

                                                        }
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>




                                    </div>
                                
                                
                                </div>

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