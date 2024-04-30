<?php 
  include_once "../../config.php";

   $review_id = $_POST['record'];

   $sql="SELECT * from article_reviews WHERE review_id = '$review_id' ";
   $result=$conn-> query($sql);
   $row=$result-> fetch_assoc();
  
   $sql="SELECT answer from review_questions WHERE review_id = '$review_id' ORDER BY q_num ";
   $result2=$conn-> query($sql);
   $answersArr = array();
   while($row2=$result2-> fetch_assoc()){
    $answersArr[] = $row2['answer'];
   }   
   
  $questions = array("Is the content succinctly described and contextualized with respect to previous and present theoretical background and empirical research (if applicable) on the topic?",
                     "Are all the cited references relevant to the research?",
                     "Are the research design, questions, hypotheses and methods clearly stated?",
                     "Are the arguments and discussion of findings coherent, balanced and compelling?",
                     "For empirical research, are the results clearly presented?",
                     "Is the article adequately referenced?",
                     "Are the conclusions thoroughly supported by the results presented in the article or referenced in secondary literature?",
                     "Quality of English Language",
                     "Do you have any potential conflict of interest with regards to this paper?",
                     "Did you detect plagiarism?",
                     "Did you detect inappropriate self-citations by authors?",
                     "Do you have any other ethical concerns about this study?",
                     "Originality",
                     "Contribution to Scholarship",
                     "Quality of Structure and Clarity",
                     "Logical Coherence/Strength of Argument/Academic Soundness",
                     "Engagement with sources as well as recent scholarship",
                     "Overall Merit",
                     "Overall Recommendations"
                    );

?>
  <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
  <style>label{font-size: 16px;}</style>
  <form class=" p-5"  enctype='multipart/form-data'  method="POST">

            <!-- <input type="hidden" id="e_art_id" value=""> -->

            <h4 class="mb-5" style="font-size: 20px !important;"><strong>Recommendations For Authors</strong></h4>
            <?php 
            
                
                    for($i = 0; $i <= 7; $i++){
                      echo " 
                      <div class='form-group w-75 mb-5 bg-light rounded  rounded-2 p-4'>
                        <label> $questions[$i] </label>
                        <input class='form-control bg-light w-75 text-center' value='Answer: $answersArr[$i]' disabled/>
                      </div>";
                    }
            
            
            ?>
            
            <div class="border-3 border-bottom mb-5"></div>


            <h6 class="mb-5"><strong>Recommendations For Editors</strong></h6>
            <?php 
            
                
                    for($i = 8; $i <= 11; $i++){
                      echo " 
                      <div class='form-group w-75 mb-5 bg-light rounded  rounded-2 p-4'>
                        <label> $questions[$i] </label>
                        <input class='form-control bg-light w-50 text-center' value='Answer: $answersArr[$i]' disabled/>
                      </div>";
                    }
                    for($i = 12; $i <= 17; $i++){
                      echo " 
                      <div class='form-group w-75 mb-5 bg-light rounded  rounded-2 p-4'>
                        <label> $questions[$i] </label>
                        <input class='form-control bg-light w-50 text-center' value='Rating: $answersArr[$i]' disabled/>
                      </div>";
                    }
            
            
            ?>

            <div class="form-group">
              <label for="price">Comments and Suggestions for Authors:</label>
              <textarea class="form-control" id="e_art_abstract" cols="30" rows="6" required><?=$row['comments_author']?></textarea>
            </div>


            <div class="form-group">
              <label for="price">Comments and Suggestions for Editors:</label>
              <textarea class="form-control" id="e_art_abstract" cols="30" rows="5" required><?=$row['comments_editor']?></textarea>
            </div>            

            <div class="form-group my-3">
              <label for="price">Attachment (Optional): &nbsp;</label>
              <a href='../../ResearchWebsiteProject/downloadFile.php?file=<?=$row["attachment_file"]?>' target="_blank" class="btn btn-outline-secondary"><?=$row["attachment_file"]?></a>
            </div>
            <div class='form-group w-75 mb-5 bg-light rounded  rounded-2 p-4'>
              <label> Overall Recommendations </label>
              <input class='form-control bg-light w-75 text-center' value='Answer: <?=$answersArr[18]?>' disabled/>
            </div>




            <!-- <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="e_add_article" value="add_article" style="height:40px">Edit Article</button>
            </div> -->
    </form>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
