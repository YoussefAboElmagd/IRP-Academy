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
    <style>
        
        td{vertical-align: middle;}
        tr th{padding: 1.25rem !important;text-align: right;}

    </style>
</head>
<body>
<?php 


    $submitted = isset($_POST['submit_review']);
    if($submitted){

        $errors = "";
        $final_file_name = "None";
        if(!empty($_FILES['user_attachment']['name'][0])){
            $review_attach = $_FILES['review_file'];
            $file_name_ext = explode(".", $review_attach['name']);
            $file_ext = $file_name_ext[1];
            $allowed_exts = array("docx","pdf","zip","rar","7z");
            if(!in_array($file_ext,$allowed_exts)){
                $errors = "Invalid File Type";
            }
            else{
                $final_file_name = "review_attachment_" . uniqid() . "." . $file_ext;
                $file_destination = "uploads/reviews_attachments/$final_file_name";
                move_uploaded_file($review_attach['tmp_name'],$file_destination);
            }

        }


      

        extract($_POST);

        $sql = "UPDATE article_reviews SET attachment_file = '$final_file_name',comments_author = '$comment_author',comments_editor = '$comment_editor',r_status = 1, submitted_at=CURRENT_TIMESTAMP() WHERE review_id = '$review_id' ";
        $result = mysqli_query($conn,$sql);


        for($i = 1;$i <= 19;$i++){
            $step_q = "review_q".$i;
            $q_res = $$step_q;
            $sql = "INSERT INTO review_questions(q_num,answer,review_id) VALUES ('$i','$q_res', '$review_id')";
            mysqli_query($conn,$sql);
        }


    }





?>
    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main">

           


            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">
                            

                        <?php 
            
                            if($submitted && $errors != ""){
                                echo '<div class="alert alert-danger alert-dismissible fade show fs-6" role="alert">
                                <strong>Error!</strong> Invalid File type.

                            </div>';
                            }
                        
                        ?>

                            <h1>Volunteer to Review</h1>

                            <form class="bg-white fs-6" id="rev_app_form" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                                <input type="hidden" name="review_id" value='<?=$_GET['review_id']?>'>
                                <div>
                                    <fieldset>
                                        <legend>Reviewer Application Data</legend>
                                        <div class="row"> 
                                            <div class="col-md-10 mx-auto">
                                                <div class="inputs py-5">

                                                    <div class="section-header">
                                                        <div class="row  ">
                                                            <div class="col-md-12">
                                                            <p class="mb-5"><strong>Recommendations for Authors (will be shown to authors)</strong><br/>The following questions do not substitute for specific comments made for authors. Please give further details in the comments for authors box below</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review-inp mb-5">
                                                        <div class="row align-items-baseline">
                                                            <div class="col-md-11 offset-1">

                                                                <table class="table text-center table-borderless">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"></th>
                                                                            <th scope="col">Yes</th>
                                                                            <th scope="col">Can be improved</th>
                                                                            <th scope="col">Must be improved</th>
                                                                            <th scope="col">Not applicable</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="mb-3">
                                                                            <th scope="row">Is the content succinctly described and contextualized with respect to previous and present theoretical background and empirical research (if applicable) on the topic?</th>
                                                                            <td> <input type="radio" name="review_q1" value="Yes" required> </td>
                                                                            <td> <input type="radio" name="review_q1" value="Can be improved"> </td>
                                                                            <td> <input type="radio" name="review_q1" value="Must be improved"> </td>
                                                                            <td> <input type="radio" name="review_q1" value="Not applicable"> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Are all the cited references relevant to the research?</th>
                                                                            <td> <input type="radio" name="review_q2" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q2" value="Can be improved"> </td>
                                                                            <td> <input type="radio" name="review_q2" value="Must be improved"> </td>
                                                                            <td> <input type="radio" name="review_q2" value="Not applicable"> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Are the research design, questions, hypotheses and methods clearly stated?</th>
                                                                            <td> <input type="radio" name="review_q3" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q3" value="Can be improved"> </td>
                                                                            <td> <input type="radio" name="review_q3" value="Must be improved"> </td>
                                                                            <td> <input type="radio" name="review_q3" value="Not applicable"> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Are the arguments and discussion of findings coherent, balanced and compelling?</th>
                                                                            <td> <input type="radio" name="review_q4" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q4" value="Can be improved"> </td>
                                                                            <td> <input type="radio" name="review_q4" value="Must be improved"> </td>
                                                                            <td> <input type="radio" name="review_q4" value="Not applicable"> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">For empirical research, are the results clearly presented?</th>
                                                                            <td> <input type="radio" name="review_q5" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q5" value="Can be improved"> </td>
                                                                            <td> <input type="radio" name="review_q5" value="Must be improved"> </td>
                                                                            <td> <input type="radio" name="review_q5" value="Not applicable"> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Is the article adequately referenced?</th>
                                                                            <td> <input type="radio" name="review_q6" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q6" value="Can be improved"> </td>
                                                                            <td> <input type="radio" name="review_q6" value="Must be improved"> </td>
                                                                            <td> <input type="radio" name="review_q6" value="Not applicable"> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Are the conclusions thoroughly supported by the results presented in the article or referenced in secondary literature?</th>
                                                                            <td> <input type="radio" name="review_q7" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q7" value="Can be improved"> </td>
                                                                            <td> <input type="radio" name="review_q7" value="Must be improved"> </td>
                                                                            <td> <input type="radio" name="review_q7" value="Not applicable"> </td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>

            

                                                    <div class="review-inp mb-4 pb-4 border-bottom border-2">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-5 offset-1  p-0 text-end me-3">
                                                                <label for="a_abstract" style="font-size: 14px;color: #513618 !important;"><strong>Quality of English Language</strong></label>
                                                            </div>
                                                            <div class="col-md-4 offset-1  p-0 ">
                                                                <input type="radio" name="review_q8" value="I am not qualified to assess the quality of English in this paper" class="mb-2"><p>I am not qualified to assess the quality of English in this paper</p>
                                                                <input type="radio" name="review_q8" value="English very difficult to understand/incomprehensible"><p>English very difficult to understand/incomprehensible</p>
                                                                <input type="radio" name="review_q8" value="Extensive editing of English language required"><p>Extensive editing of English language required</p>
                                                                <input type="radio" name="review_q8" value="Moderate editing of English language required"><p>Moderate editing of English language required</p>
                                                                <input type="radio" name="review_q8" value="Minor editing of English language required"><p>Minor editing of English language required</p>
                                                                <input type="radio" name="review_q8" value="English language fine. No issues detected"><p>English language fine. No issues detected</p>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="section-header">
                                                        <div class="row  ">
                                                            <div class="col-md-12">
                                                            <p class="mb-5"><strong>Recommendations for Editors (will not be shown to authors)</strong><br/>If you answered yes to any of the following questions, please give details in the comments for editors box below.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="review-inp mb-5">
                                                        <div class="row align-items-baseline">
                                                            <div class="col-md-7 offset-2">

                                                                <table class="table text-center table-borderless">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"></th>
                                                                            <th scope="col">Yes</th>
                                                                            <th scope="col">No</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="mb-3">
                                                                            <th scope="row">Do you have any potential conflict of interest with regards to this paper?</th>
                                                                            <td> <input type="radio" name="review_q9" value="Yes" required> </td>
                                                                            <td> <input type="radio" name="review_q9" value="No"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Did you detect plagiarism?</th>
                                                                            <td> <input type="radio" name="review_q10" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q10" value="No"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Did you detect inappropriate self-citations by authors?</th>
                                                                            <td> <input type="radio" name="review_q11" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q11" value="No"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Do you have any other ethical concerns about this study?</th>
                                                                            <td> <input type="radio" name="review_q12" value="Yes"> </td>
                                                                            <td> <input type="radio" name="review_q12" value="No"> </td>

                                                                        </tr>

                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="review-inp mb-4 pb-3 border-bottom border-2">
                                                        <div class="row align-items-baseline">
                                                            <div class="col-md-11 offset-1">

                                                                <table class="table text-center table-borderless">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Ratings</th>
                                                                            <th scope="col">High</th>
                                                                            <th scope="col">Average</th>
                                                                            <th scope="col">Low</th>
                                                                            <th scope="col">No Answer</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="mb-3">
                                                                            <th scope="row">Originality</th>
                                                                            <td> <input type="radio" name="review_q13" value="High" required> </td>
                                                                            <td> <input type="radio" name="review_q13" value="Average"> </td>
                                                                            <td> <input type="radio" name="review_q13" value="Low"> </td>
                                                                            <td> <input type="radio" name="review_q13" value="No Answer"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Contribution to Scholarship</th>
                                                                            <td> <input type="radio" name="review_q14" value="High"> </td>
                                                                            <td> <input type="radio" name="review_q14" value="Average"> </td>
                                                                            <td> <input type="radio" name="review_q14" value="Low"> </td>
                                                                            <td> <input type="radio" name="review_q14" value="No Answer"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Quality of Structure and Clarity</th>
                                                                            <td> <input type="radio" name="review_q15" value="High"> </td>
                                                                            <td> <input type="radio" name="review_q15" value="Average"> </td>
                                                                            <td> <input type="radio" name="review_q15" value="Low"> </td>
                                                                            <td> <input type="radio" name="review_q15" value="No Answer"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Logical Coherence/Strength of Argument/Academic Soundness</th>
                                                                            <td> <input type="radio" name="review_q16" value="High"> </td>
                                                                            <td> <input type="radio" name="review_q16" value="Average"> </td>
                                                                            <td> <input type="radio" name="review_q16" value="Low"> </td>
                                                                            <td> <input type="radio" name="review_q16" value="No Answer"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Engagement with sources as well as recent scholarship</th>
                                                                            <td> <input type="radio" name="review_q17" value="High"> </td>
                                                                            <td> <input type="radio" name="review_q17" value="Average"> </td>
                                                                            <td> <input type="radio" name="review_q17" value="Low"> </td>
                                                                            <td> <input type="radio" name="review_q17" value="No Answer"> </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Overall Merit</th>
                                                                            <td> <input type="radio" name="review_q18" value="High"> </td>
                                                                            <td> <input type="radio" name="review_q18" value="Average"> </td>
                                                                            <td> <input type="radio" name="review_q18" value="Low"> </td>
                                                                            <td> <input type="radio" name="review_q18" value="No Answer"> </td>

                                                                        </tr>

                                                                        
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="section-header">
                                                        <div class="row  ">
                                                            <div class="col-md-12">
                                                            <p class="mb-5"><strong>Comments</strong><br/></p>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 offset-1 p-0 text-end me-3">
                                                                <p>* Comments and Suggestions for Authors (will be shown to authors)</p>
                                                            </div>
                                                            <div class="col-md-7  p-0">
                                                            <textarea class="form-control" name="comment_author"  cols="30" rows="6"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-3 offset-1 p-0 text-end me-3">
                                                                <label class="ms-auto " for="rev_doc">Word/PDF/Zip/Rar/7z</label>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                                <input class="form-control w-50 my-3" name="review_file" type="file">
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="article-inp mb-4 pb-3 border-bottom border-2">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-3 offset-1 p-0 text-end me-3">
                                                                <p>* Comments and Suggestions for Editors (will not be shown to authors)</p>
                                                            </div>
                                                            <div class="col-md-7 p-0">
                                                            <textarea class="form-control" name="comment_editor"  cols="30" rows="6"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                   

                                                    <div class="section-header">
                                                        <div class="row  ">
                                                            <div class="col-md-12">
                                                            <p class="mb-5"><strong>Overall Recommendations</strong><br/></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="review-inp mb-4 pb-4 border-bottom border-2">
                                                        <div class="row align-items-center ">
                                                            <div class="col-md-5  p-0 text-end me-3">
                                                                <label for="a_abstract" style="font-size: 14px;color: #513618 !important;"><strong>Overall Recommendation</strong></label>
                                                            </div>
                                                            <div class="col-md-4 ms-4 p-0 ">
                                                                <div class="d-flex gap-2 align-items-baseline mb-1"><input type="radio" name="review_q19" value="Accept in present form" class="mb-2"><p>Accept in present form</p></div>
                                                                <div class="d-flex gap-2 align-items-baseline mb-1"><input type="radio" name="review_q19" value="Accept after minor revision"><p>Accept after minor revision</p></div>
                                                                <div class="d-flex gap-2 align-items-baseline mb-1"><input type="radio" name="review_q19" value="Reconsider after major revision"><p>Reconsider after major revision</p></div>
                                                                <div class="d-flex gap-2 align-items-baseline mb-1"><input type="radio" name="review_q19" value="Reject"><p>Reject</p></div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="review-inp mb-4 pb-4">
                                                        <div class="row ">
                                                            <div class="col-md-4 offset-2  p-0 text-end me-3">
                                                                <label for="a_abstract" style="font-size: 14px;color: #513618 !important;">Please confirm that you appreciate to be notified with the final status of the paper</label>
                                                            </div>
                                                            <div class="col-md-5 ms-4 p-0 ">
                                                                <div class="mt-2"></div>
                                                                <div class="d-flex gap-2 align-items-center mb-1"><input type="radio" name="review_q20"><p class="me-2 mb-0">Yes</p> <input type="radio" name="review_q20"><p class="mb-0">No</p></div>
                                                                <p class="mt-4 mb-0">To ensure your anonymity throughout the peer review process, please do not include any identifying information in your review report either in the comments or in the metadata of any files that you upload.</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                   


                                                    <div class="article-inp mb-4">
                                                        <div class="row align-items-baseline ">
                                                            <div class="col-md-4 offset-2 p-0 text-end me-3">
                                                                <button type="submit" name="submit_review" class="btn w-50 mt-2 mb-4 py-2">Submit</button>
                                                            </div>
                                                            <div class="col-md-5 p-0">
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
    <script>
    
        const form = document.getElementById('rev_app_form');
        form.addEventListener('keypress', function(e) {
            if (e.keyCode === 13) {
            e.preventDefault();
            }
        });
    </script>
</body>
</html>