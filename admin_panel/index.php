<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <link rel="stylesheet" href="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
  </head>
</head>
<body >
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
           
            include_once "./config/dbconnect.php";
            include_once "../config.php";
            
        ?>

    <div class="container w-25" id="search_area">
        
        

    </div>


    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Users</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql="SELECT * from users where isAdmin=0";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Categories</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from category";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Products</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from product";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total orders</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from orders";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
        </div>
        
    </div>
       
            
        <?php
            if (isset($_GET['category']) && $_GET['category'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['category']) && $_GET['category'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['size']) && $_GET['size'] == "success") {
                echo '<script> alert("Size Successfully Added")</script>';
            }else if (isset($_GET['size']) && $_GET['size'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['variation']) && $_GET['variation'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?>









    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="./bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        var search_area = document.getElementById("search_area");


        // ------------------------------- Articles Section View And Search Start -------------------------------
        function filterArticles(filterType){
                var inputType = document.getElementById("inputType");
                if(filterType == "id"){
                    inputType.innerHTML = `<input class="form-control" type="number" onkeyup="if(this.value != ''){showProductItems(this.value,'id');}else{showProductItems();}" placeholder="Search Here By Id">`
                }
                else if(filterType == "name"){
                    inputType.innerHTML = `<input class="form-control" type="text" onkeyup="if(this.value != ''){showProductItems(this.value,'name');}else{showProductItems();}" placeholder="Search Here By Name">`
                }
            }
        function viewSearchArticlesWithoutCond(){
            showProductItems();
            search_area.innerHTML = `<div id="inputType"></div><label for="byId">By Id</label><input type="radio" name="filterType" class="ml-1 mr-3" id="byId" onclick="filterArticles('id')"><label for="byName">By Name</label><input type="radio" name="filterType" id="byName" class="ml-1" onclick="filterArticles('name')">`
            filterArticles("id");
        }
        function viewSearchArticlesWithCond(){
            if(window.location.href.includes("#articles")){
                viewSearchArticlesWithoutCond()
            }
        }
        viewSearchArticlesWithCond();
        // ------------------------------- Articles Section View And Search End ---------------------------------


        // ------------------------------- Reviewers Applications Section View And Search Start -------------------------------
        function filterRevApps(filterType){
                var inputType = document.getElementById("inputType");
                if(filterType == "appId"){
                    inputType.innerHTML = `<input class="form-control" type="number" onkeyup="if(this.value != ''){showReviewersApplications(this.value,'appId');}else{showReviewersApplications();}" placeholder="Search Here Application Id">`
                }
                else if(filterType == "userId"){
                    inputType.innerHTML = `<input class="form-control" type="number" onkeyup="if(this.value != ''){showReviewersApplications(this.value,'userId');}else{showReviewersApplications();}" placeholder="Search Here By User Id">`
                }
        }
        function viewSearchRevAppsWithoutCond(){
            showReviewersApplications();
            search_area.innerHTML = `<div id="inputType"></div><label for="byAppId">By Application Id</label><input type="radio" name="filterType" class="ml-1 mr-3" id="byAppId" onclick="filterRevApps('appId')"><label for="byUserId">By User Id</label><input type="radio" name="filterType" id="byUserId" class="ml-1" onclick="filterRevApps('userId')">`
            filterRevApps("appId");
        }
        function viewSearchRevAppsWithCond(){
            if(window.location.href.includes("#revApps")){
                viewSearchRevAppsWithoutCond()
            }
        }
        viewSearchRevAppsWithCond();
        // ------------------------------- Reviewers Applications Section View And Search End ---------------------------------





        if(window.location.href.includes("#Invoices")){
            viewInvoices();
        }

    </script>
</body>
 
</html>