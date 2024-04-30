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
    $form_token = uniqid();
    $_SESSION['form_token'] = $form_token;
?>
    <div class="container">

        <?php require('profile_nav.php'); ?>




        <div class="main" id="main">




            
            <div class="container">

                <div class="row">

                    <?php require('profile_leftside.php'); ?>

                    
                    <div class="col-md-10">
                        
                        <div class="right-section">

                            <h1 id="stepTitle">New Submission</h1>

                            <form class="bg-white " method="post" action="new_article_success.php" enctype="multipart/form-data">
                                <input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
                                <div>
                                    <fieldset>
                                        <legend id="stepLegend">New Submission</legend>
                                            
                                        <div class="row"> 
                                            <div class="col-md-10 mx-auto">
                                                <div class="inputs py-5">


                                                    <div class="alert alert-danger alert-dismissible fade show d-none" id="error_msg_step1" role="alert">
                                                        <strong>Error!</strong> Please make sure that you filled all required fields.
                                                    </div>

                                                    <div class="alert alert-danger alert-dismissible fade fs-6 show d-none" id="error_msg_step2" role="alert">
                                                        <strong>Error!</strong> Please select file to be uploaded.
                                                    </div>
                                                    
                                                    <div id="step0" class="d-none">


                                                        

                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto " for="email"><sup>*</sup>Article File (Word)</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <input class="form-control" id="file-upload" type="file" name="article_file" reqired>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <button name="next" id="goStep1" class="btn w-25 mt-2 mb-4 py-2">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    



                                                    <div id="step1" class="d-none">

                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto " for="email"><sup>*</sup>Choose Journal</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <select class="form-select" id="select_journal" name="journal" required>
                                                                        <option value="journal1" selected>Journal1</option>
                                                                        <option value="journal2">Journal2</option>
                                                                        <option value="journal3">Journal3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto " for="a_section">Section</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <select class="form-select" name="a_section" required>
                                                                        <option value="Section1" selected>Section1</option>
                                                                        <option value="Section2">Section2</option>
                                                                        <option value="Section3">Section3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto "  for="a_title"><sup>*</sup>Title</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <textarea name="a_title" class="form-control" id="article_title" cols="30" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto"  for="a_abstract"><sup>*</sup>Abstract</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <textarea name="a_abstract" class="form-control" id="article_abstract" cols="30" rows="6" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto " for="keywords">Keywords</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                <input type="text" name="keywords" class="form-control w-100 atags" data-role="tagsinput"/>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto" for="email"><sup>*</sup>Number Of Pages</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <input class="form-control" name="a_pages_num" id="a_pages_num" type="number" required>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    

                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <button id="backStep0" name="prev" class="btn w-25 mt-2 me-2 mb-4 py-2">Back</button>
                                                                    <button id="goStep2" name="next" class="btn w-25 mt-2 mb-4 py-2">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>



                                                    <div id="step2" class="d-none">


                                                        <div id="show_authors" class="">

                                                            <div class="auth_inp article-inp mb-4">
                                                                
                                                                <div class="row align-items-center border border-2 rounded-2 p-2 ">
                                                                    <h4 class="text-center">Author</h4>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="email"><sup>*</sup>Name</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0  d-flex">
                                                                        <input class="form-control me-3 auth_fn" name="auth_fn[]" type="text" placeholder="First Name" required>
                                                                        <input class="form-control me-3 auth_mn" name="auth_mn[]" type="text" placeholder="Middle Name" required>
                                                                        <input class="form-control auth_ln" name="auth_ln[]" type="text" placeholder="Last Name" required>
                                                                    </div>


                                                                    <div class="separator my-2"></div>


                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="auth_mail"><sup>*</sup>E-Mail Address</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <input class="form-control auth_mail" name="auth_mail[]" type="email" required>
                                                                    </div>

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="corres_auth"><sup>*</sup>Corresponding Author</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <select name="corres_auth[]" class="corres_auth" >
                                                                            <option value="1" selected>Yes</option>
                                                                            <option value="0" >No</option>
                                                                        </select>
                                                                        
                                                                    </div>

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto" for="auth_title"><sup>*</sup>Title</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <select class="form-select w-75 auth_title" name="auth_title[]" required>
                                                                            <option value="Mr." selected>Mr.</option>
                                                                            <option value="Dr.">Dr.</option>
                                                                            <option value="Prof.">Prof.</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="auth_country"><sup>*</sup>Country</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <select class="form-select w-75 auth_country" name="auth_country[]" required>
                                                                            <option>Egypt</option>
                                                                            <option value="Egypt">Egypt</option>
                                                                            <option value="">Canada</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="auth_affiliation"><sup>*</sup>Affiliation</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <input class="form-control auth_affiliation" name="auth_affiliation[]" type="text" required>
                                                                    </div>

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <button name="add_more" class="btn mt-2  py-2 add_auth_btn">Add More</button>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>


                                                   

                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <button id="backStep1" name="prev" class="btn w-25 mt-2 me-2 mb-4 py-2">Back</button>
                                                                    <button type="button" id="goStep3" name="next" class="btn w-25 mt-2 mb-4 py-2">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>



                                                    <div id="step3" class="d-none">


                                                        <div id="show_reviewers" class="">

                                                            <div class="rev_inp article-inp mb-4">
                                                                
                                                                <div class="row align-items-center border border-2 rounded-2 p-2 ">
                                                                    <h4 class="text-center">Reviewer</h4>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="email"><sup>*</sup>Name</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0  d-flex">
                                                                        <input class="form-control me-3 rev_fn" name="rev_fn[]" type="text" placeholder="First Name" required>
                                                                        <input class="form-control rev_ln" name="rev_ln[]" type="text" placeholder="Last Name" required>
                                                                    </div>


                                                                    <div class="separator my-2"></div>


                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="rev_mail"><sup>*</sup>E-Mail Address</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <input class="form-control rev_mail" name="rev_mail[]" type="email" required>
                                                                    </div>

                                                            
                                                                    

                                                                

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="auth_affiliation"><sup>*</sup>Affiliation</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <textarea class="form-control rev_affiliation" name="rev_affiliation[]" cols="30" rows="3"></textarea>
                                                                    </div>



                                                                </div>
                                                            </div>



                                                            <div class="rev_inp article-inp mb-4">
                                                                
                                                                <div class="row align-items-center border border-2 rounded-2 p-2 ">
                                                                    <h4 class="text-center">Reviewer</h4>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="email"><sup>*</sup>Name</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0  d-flex">
                                                                        <input class="form-control me-3 rev_fn" name="rev_fn[]" type="text" placeholder="First Name" required>
                                                                        <input class="form-control rev_ln" name="rev_ln[]" type="text" placeholder="Last Name" required>
                                                                    </div>


                                                                    <div class="separator my-2"></div>


                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="rev_mail"><sup>*</sup>E-Mail Address</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <input class="form-control rev_mail" name="rev_mail[]" type="email" required>
                                                                    </div>

                                                            
                                                                    

                                                                

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="auth_affiliation"><sup>*</sup>Affiliation</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <textarea class="form-control rev_affiliation" name="rev_affiliation[]" cols="30" rows="3"></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>



                                                            <div class="rev_inp article-inp mb-4">
                                                                
                                                                <div class="row align-items-center border border-2 rounded-2 p-2 ">
                                                                    <h4 class="text-center">Reviewer</h4>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="email"><sup>*</sup>Name</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0  d-flex">
                                                                        <input class="form-control me-3 rev_fn" name="rev_fn[]" type="text" placeholder="First Name" required>
                                                                        <input class="form-control rev_ln" name="rev_ln[]" type="text" placeholder="Last Name" required>
                                                                    </div>


                                                                    <div class="separator my-2"></div>


                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="rev_mail"><sup>*</sup>E-Mail Address</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <input class="form-control rev_mail" name="rev_mail[]" type="email" required>
                                                                    </div>

                                                            
                                                                    

                                                                

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                        <label class="ms-auto " for="auth_affiliation"><sup>*</sup>Affiliation</label>
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <textarea class="form-control rev_affiliation" name="rev_affiliation[]" cols="30" rows="3"></textarea>
                                                                    </div>

                                                                    <div class="separator my-2"></div>

                                                                    <div class="col-md-3 p-0 text-end me-3">
                                                                    </div>
                                                                    <div class="col-md-7 p-0">
                                                                        <button name="add_more" class="btn mt-2  py-2 add_rev_btn">Add More</button>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>


                                                   

                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <button id="backStep2" name="prev" class="btn w-25 mt-2 me-2 mb-4 py-2">Back</button>
                                                                    <button id="goStep4" type="button" name="next" class="btn w-25 mt-2 mb-4 py-2">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>


                                                    <div id="step4" class="d-none">


                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                    <label class="ms-auto " for="email"><sup>*</sup>Article File (PDF)</label>
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <input class="form-control" id="file-upload2" type="file" name="article_file_pdf" >
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="article-inp mb-4">
                                                            <div class="row align-items-baseline ">
                                                                <div class="col-md-3 p-0 text-end me-3">
                                                                </div>
                                                                <div class="col-md-7 p-0">
                                                                    <button id="backStep3" name="prev" class="btn w-25 mt-2 me-2 mb-4 py-2">Back</button>
                                                                    <button type="submit" name="add_new_article" class="btn w-25 mt-2 mb-4 py-2">Submit Article</button>
                                                                </div>
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
        $(document).ready(function(){
            $('.add_auth_btn').click(function(e){
                e.preventDefault();
                $('#show_authors').append(`
                

                    <div class="auth_inp article-inp mb-4">
                                                                
                        <div class="row align-items-center border border-2 rounded-2 p-2 ">
                            <h4 class="text-center">Author</h4>

                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto " for="email"><sup>*</sup>Name</label>
                            </div>
                            <div class="col-md-7 p-0  d-flex">
                                <input class="form-control me-3 auth_fn" name="auth_fn[]" type="text" placeholder="First Name" required>
                                <input class="form-control me-3 auth_mn" name="auth_mn[]" type="text" placeholder="Middle Name" required>
                                <input class="form-control auth_ln" name="auth_ln[]" type="text" placeholder="Last Name" required>
                            </div>


                            <div class="separator my-2"></div>


                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto " for="auth_mail"><sup>*</sup>E-Mail Address</label>
                            </div>
                            <div class="col-md-7 p-0">
                                <input class="form-control auth_mail" name="auth_mail[]" type="email" required>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto " for="corres_auth"><sup>*</sup>Corresponding Author</label>
                            </div>
                            <div class="col-md-7 p-0">
                                <select name="corres_auth[]" class="corres_auth" required>
                                    <option value="1" >Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto" for="auth_title"><sup>*</sup>Title</label>
                            </div>
                            <div class="col-md-7 p-0">
                                <select class="form-select w-75 auth_title" name="auth_title[]" required>
                                    <option value="Mr." selected>Mr.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                </select>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto " for="auth_country"><sup>*</sup>Country</label>
                            </div>
                            <div class="col-md-7 p-0">
                                <select class="form-select w-75 auth_country" name="auth_country[]" required>
                                    <option>Egypt</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="">Canada</option>
                                </select>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="col-md-3 p-0 text-end me-3">
                                <label class="ms-auto " for="auth_affiliation"><sup>*</sup>Affiliation</label>
                            </div>
                            <div class="col-md-7 p-0">
                                <input class="form-control auth_affiliation" name="auth_affiliation[]" type="text" required>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="col-md-3 p-0 text-end me-3">
                            </div>
                            <div class="col-md-7 p-0">
                                <button name="remove" class="btn mt-2  py-2 remove_auth_btn">Remove</button>
                            </div>

                        </div>
                     </div>
                `);
            });

            $(document).on('click','.remove_auth_btn',function(e){
                e.preventDefault();
                let auth_inp = $(this).parent().parent().parent();
                $(auth_inp).remove();
            });    

            $('.add_rev_btn').click(function(e){
                e.preventDefault();
                $('#show_reviewers').append(`
                

                <div class="rev_inp article-inp mb-4">
                                                                
                    <div class="row align-items-center border border-2 rounded-2 p-2 ">
                        <h4 class="text-center">Reviewer</h4>

                        <div class="col-md-3 p-0 text-end me-3">
                            <label class="ms-auto " for="email"><sup>*</sup>Name</label>
                        </div>
                        <div class="col-md-7 p-0  d-flex">
                            <input class="form-control me-3 rev_fn" name="rev_fn[]" type="text" placeholder="First Name" required>
                            <input class="form-control rev_ln" name="rev_ln[]" type="text" placeholder="Last Name" required>
                        </div>


                        <div class="separator my-2"></div>


                        <div class="col-md-3 p-0 text-end me-3">
                            <label class="ms-auto " for="rev_mail"><sup>*</sup>E-Mail Address</label>
                        </div>
                        <div class="col-md-7 p-0">
                            <input class="form-control rev_mail" name="rev_mail[]" type="email" required>
                        </div>

                
                        

                    

                        <div class="separator my-2"></div>

                        <div class="col-md-3 p-0 text-end me-3">
                            <label class="ms-auto " for="auth_affiliation"><sup>*</sup>Affiliation</label>
                        </div>
                        <div class="col-md-7 p-0">
                            <textarea class="form-control rev_affiliation" name="rev_affiliation[]" cols="30" rows="3"></textarea>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="col-md-3 p-0 text-end me-3">
                        </div>
                        <div class="col-md-7 p-0">
                            <button name="remove" class="btn mt-2  py-2 remove_rev_btn">Remove</button>
                        </div>

                    </div>
                </div>
                `);
            });

            $(document).on('click','.remove_rev_btn',function(e){
                e.preventDefault();
                let rev_inp = $(this).parent().parent().parent();
                $(rev_inp).remove();
            });    
        });   
    </script>
    <script src="./scripts/new_article.js"></script>

</body>
</html>