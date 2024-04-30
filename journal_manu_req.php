<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/index.css" rel="stylesheet">
</head>

<body style="background-color:#f4ebda; padding:0 5%;">
    <div class="container">


        <?php 
        
        require('main_nav.php');
        require('searchbar.php');
        ?>








        <div class="main-content">
            <div class="container">
                <div class="row bg-body-secondary p-3">

                    <div class="col-md-3">
    
                        <div class="left-section">
                            
                            <div class="journal-widget bg-white p-3">

                                <div class="bg-white p-4">
                                    <div
                                      class="flex items-center gap-3 justify-center md:justify-start"
                                    >
                                      <img src="images/sustainability-logo.PNG" alt="logo" />
                                      <span
                                        class="inline-block uppercase font-bold text-primary-color"
                                        >Our Journal</span
                                      >
                                    </div>
                                    
                                    <a href="new_article.php">
                                        <button
                                        class="bg-primary-color hover:bg-hover-color text-white w-full py-2 rounded-md text-sm mt-3"
                                        >
                                        Submit to Our Journal
                                        </button>
                                    </a>
                                    
                                    <a href="reviewer_application.php">
                                        <button
                                        class="border border-black w-full py-2 rounded-md text-sm mt-3 hover:text-white hover:bg-primary-color transition-all"
                                        >
                                          Review for Our Journal
                                        </button>
                                    </a>
                      
                                    <div class="flex items-center gap-2 mt-3">
                                      <i
                                        class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-twitter"
                                      ></i>
                                      <i
                                        class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-facebook"
                                      ></i>
                                      <i
                                        class="border-2 border-black p-1 cursor-pointer rounded-md hover:text-white hover:bg-primary-color fa-brands fa-linkedin"
                                      ></i>
                                      <button
                                        class="border-2 w-full border-black hover:text-white hover:bg-primary-color transition-all rounded-md"
                                      >
                                        Share
                                      </button>
                                    </div>
                      
                                    <span class="inline-block mt-4 font-bold text-lg"
                                      >Journal Menu</span
                                    >
                                    <ul class="list-disc px-8 py-3">
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a>Sustainability Home</a>
                                      </li>
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a class="fw-bold">Aims & Scope</a>
                                      </li>
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a>Editorial Board</a>
                                      </li>
                                      <li
                                        class="text-sm cursor-pointer hover:text-primary-color hover:underline"
                                      >
                                        <a>Reviewer Board</a>
                                      </li>
                                    </ul>
                      
                                    <span class="inline-block mt-4 font-bold text-lg mb-4"
                                      >Journal Browser</span
                                    >
                                    <div class="flex flex-col gap-3">
                                      <select
                                        id="select"
                                        name="select"
                                        class="block cursor-pointer border w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                      >
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <option value="option4">Option 4</option>
                                      </select>
                      
                                      <select
                                        id="select"
                                        name="select"
                                        class="block border cursor-pointer w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                      >
                                        <option value="option1">Issue</option>
                                      </select>
                                    </div>
                                    <button
                                      class="border border-black w-full py-2 rounded-md text-sm mt-4 hover:text-white hover:bg-primary-color transition-all"
                                    >
                                      Go
                                    </button>
                                </div>

                            </div>





                            
                            




    
                        </div>
                        
                    </div>
    
    
                    <div class="col-md-9">
    
                        <div class="right-section bg-white ">
                            
                            
                            




                          <div class="bg-white p-4">
                                <h1 class="font-bold text-2xl italic mb-8 fs-2">Manuscript requirements</h1>
                                <p class="mb-4 fs-6">Manuscripts should be submitted online at …………..The submitting author, who is generally the corresponding author, is responsible for the manuscript during the submission and peer-review process. Authors are encouraged to submit a Microsoft Word file and PDF.</p>
                                <p class="mb-3 fs-6">The Journal accepts free format submission of the main manuscript. We do not have strict formatting requirements, but all manuscripts must contain the required sections:</p>
                                <p class="mb-3 fs-6"><strong>Main manuscript:</strong> Title of the manuscript, Abstract, Keywords, Introduction, Review of Literature, Materials & Methods, Results, Discussion Conclusions, Figures and Tables with Captions. There is no specific length of the manuscript, but we expect submission between 5000 and 10000 words in length.</p>
                                <p class="mb-3 fs-6"><strong>Title page:</strong> Information related to the authors, their affiliation, Funding Information, Conflict of Interest and other Ethics Statements should be submitted in separate page.</p>
                                <p class="mb-3 fs-6"><strong>Cover page:</strong> A cover letter should be submitted with each manuscript. It be concise and explain why the content of the paper is significant, placing the findings in the context of existing work and why it fits the scope of the journal. Confirm that neither the manuscript nor any parts of its content are currently under consideration or published in another journal. </p>
                                <p class="mb-4 fs-6"><strong>Cover page:</strong> A cover letter should be submitted with each manuscript. It be concise and explain why the content of the paper is significant, placing the findings in the context of existing work and why it fits the scope of the journal. Confirm that neither the manuscript nor any parts of its content are currently under consideration or published in another journal. </p>
                                <h2 class="font-bold mb-3 fs-4">Manuscript preparation</h5>
                                <p class="mb-3 fs-6"><strong>Article title:</strong> A concisely worded title should be provided. </p>
                                <p class="mb-3 fs-6"><strong>Abstract: </strong> please submit 200 words, which include purpose, design/methodology/approach, findings, originality. </p>
                                <p class="mb-3 fs-6"><strong>Keywords: </strong> The submission should include 6 appropriate and short keywords that capture the principal topics of the paper. </p>
                                <p class="mb-3 fs-6"><strong>Article type: </strong> you will be asked to select a type for your paper either research article, review article, technical article or case study. </p>
                                <p class="mb-3 fs-6"><strong>Tables and figures: </strong> All Tables and Figures should be inserted into the main text close to their first citation and must be numbered following their number of appearance (Figure 1, Figure 2, Table 1, etc.). </p>
                                <p class="mb-3 fs-6"><strong>References: </strong></p>
                                <p class="mb-3 fs-6">The Journal accepts free format submission of the main manuscript. We do not have strict formatting requirements, but all manuscripts must contain the required sections:</p>



                          </div>





                            


                        </div>
    
                    </div>
    
    
                    
    
    
    
                </div>
            </div>
        </div>


        <?php require('footer.php'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              gridTemplateColumns: {
                fluid: "repeat(auto-fit, minmax(15rem, 1fr))",
              },
              colors: {
                "primary-color": "#513618",
                "secondary-color": "#513618",
                "hover-color": "#3a2d11",
              },
            },
          },
        };
      </script>
    

</body>
</html>