

function showProductItems(filter,filterType){  
    $.ajax({
        url:"./adminView/viewAllProducts.php",
        method:"post",
        data:{record:filter,filter_type:filterType},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showNews(){  
    $.ajax({
        url:"./adminView/viewAllNews.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function viewInvoices(){  
    $.ajax({
        url:"./adminView/viewInvoices.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showArticleReviews(){  
    $.ajax({
        url:"./adminView/viewAllReviews.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showUsers(){  
    $.ajax({
        url:"./adminView/viewAllUsers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showQR(trans_id, qr_img){
    $('#qr_trans_id').html("Transaction #" + trans_id);
    $('#qr_image').attr("src", "../../../uploads/qr_codes/" + qr_img);
}
function showArticleAuthors(id){  
    $.ajax({
        url:"./adminView/viewArticleAuthors.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.articleAuthorsContent').html(data);
        }
    });
}

function showArticleSuggestedReviewers(id){  
    $.ajax({
        url:"./adminView/viewArticleSuggestedReviewers.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.articleSuggestedReviewersContent').html(data);
        }
    });
}

function acceptRejectReview(id,status){  
    $.ajax({
        url:"./controller/acceptRejectReviewerApplication.php",
        method:"post",
        data:{record:id,record_status:status},
        success:function(data){
            showReviewersApplications();
        }
    });
}
function acceptRejectInvoice(id,status){  
    $.ajax({
        url:"./controller/acceptRejectInvoice.php",
        method:"post",
        data:{record:id,record_status:status},
        success:function(data){
            viewInvoices();
        }
    });
}


function showReviewersApplications(filter,filterType){  
    $.ajax({
        url:"./adminView/viewAllReviewersApplications.php",
        method:"post",
        data:{record:filter,filter_type:filterType},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCategory(){  
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showSizes(){  
    $.ajax({
        url:"./adminView/viewSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showProductSizes(){  
    $.ajax({
        url:"./adminView/viewProductSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers(){
    $.ajax({
        url:"./adminView/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

function ChangePay(id){
    $.ajax({
       url:"./controller/updatePayStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Payment Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}


//add product data
function addItems(){
    var p_name=$('#p_name').val();
    var p_desc=$('#p_desc').val();
    var p_price=$('#p_price').val();
    var category=$('#category').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url:"./controller/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            showProductItems();
            alert('Product Added successfully.');
        }
    });
}

    function addArticleAuthor(){
        var article_id = $('#article_id').val();
        var f_name =$('#f_name').val();
        var m_name =$('#m_name').val();
        var l_name =$('#l_name').val();
        var a_mail=$('#a_mail').val();
        var corres_auth=$('#corres_auth').val();
        var a_title =$('#a_title ').val();
        var affiliation=$('#affiliation').val();
        var country=$('#country').val();
        var add_author=$('#add_author').val();

        var fd = new FormData();
        fd.append('article_id', article_id);
        fd.append('f_name', f_name);
        fd.append('m_name', m_name);
        fd.append('l_name', l_name);
        fd.append('a_mail', a_mail);
        fd.append('corres_auth', corres_auth);
        fd.append('a_title', a_title);
        fd.append('affiliation', affiliation);
        fd.append('country', country);
        fd.append('add_author', add_author);
        $.ajax({
            url:"./controller/addArticleAuthor.php",
            method:"post",
            data:fd,
            processData: false,
            contentType: false,
            success: function(data){
                showProductItems();
                alert("Author added successfully.");
            }
        });
    }


    function addArticle(){
        var art_title =$('#art_title').val();
        var art_abstract =$('#art_abstract').val();
        var art_keywords =$('#art_keywords').val();
        var art_nop =$('#art_nop').val();
        var word_art_file =$('#word_art_file')[0].files[0];
        var add_article =$('#add_article').val();
        alert(art_title);
        var fd = new FormData();
        fd.append('art_title', art_title);
        fd.append('art_abstract', art_abstract);
        fd.append('art_keywords', art_keywords);
        fd.append('art_nop', art_nop);
        fd.append('word_art_file', word_art_file);
        fd.append('add_article', add_article);
        $.ajax({
            url:"./controller/addArticle.php",
            method:"post",
            data:fd,
            processData: false,
            contentType: false,
            success: function(data){
                showProductItems();
                alert("Article added successfully.");
            }
        });
    }

    
    function addUser() {        
        var f_name = $("#f_name").val();
        var m_name = $("#m_name").val();
        var l_name = $("#l_name").val();
        var email = $("#email").val();
        var pass = $("#pass").val();
        var u_role = $("#u_role").val();
        var u_workplace = $("#u_workplace").val();
        var job_type = $("#job_type").val();
        var title = $("#title ").val();
        var facebook = $("#facebook ").val();
        var twitter = $("#twitter ").val();
        var affiliation = $("#affiliation").val();
        var address = $("#address").val();
        var zip_code = $("#zip_code").val();
        var city = $("#city").val();
        var country = $("#country").val();
        var add_user = $("#add_user").val();
      
        var fd = new FormData();
        fd.append("f_name", f_name);
        fd.append("m_name", m_name);
        fd.append("l_name", l_name);
        fd.append("email", email);
        fd.append("pass", pass);
        fd.append("u_role", u_role);
        fd.append("u_workplace", u_workplace);
        fd.append("job_type", job_type);
        fd.append("title", title);
        fd.append("facebook", facebook);
        fd.append("twitter", twitter);
        fd.append("affiliation", affiliation);
        fd.append("address", address);
        fd.append("zip_code", zip_code);
        fd.append("city", city);
        fd.append("country", country);
        fd.append("add_user", add_user);
      
        $.ajax({
          url: "./controller/addUser.php",
          method: "post",
          data: fd,
          processData: false,
          contentType: false,
          success: function (data) {
            showUsers();
            alert("User data has been added successfully." + country);
          },
        });
      }

    function assignReview() {        
        var rev_mail = $("#rev_mail").val();
        var article_id = $("#article_id").val();
        var assign_review = $("#assign_review").val();
      
        var fd = new FormData();
        fd.append("rev_mail", rev_mail);
        fd.append("article_id", article_id);
        fd.append("assign_review", assign_review);
       
      
        $.ajax({
          url: "./controller/assignReview.php",
          method: "post",
          data: fd,
          processData: false,
          contentType: false,
          success: function (data) {
            alert("Review has been assigned to the reviewer successfully.");
          },
        });
      }
    function addNews() {        
        var news_title = $("#news_title").val();
        var news_content = $("#news_content").val();
        var create_news = $("#create_news").val();
      
        var fd = new FormData();
        fd.append("news_title", news_title);
        fd.append("news_content", news_content);
        fd.append("create_news", create_news);
       
      
        $.ajax({
          url: "./controller/addNews.php",
          method: "post",
          data: fd,
          processData: false,
          contentType: false,
          success: function (data) {
            alert("Announcement hass been published successfully.");
          },
        });
      }
    function newInvoice() {        
        var usr_mail = $("#usr_mail").val();
        var amount = $("#amount").val();
        var create_invoice = $("#create_invoice").val();
      
        var fd = new FormData();
        fd.append("usr_mail", usr_mail);
        fd.append("amount", amount);
        fd.append("create_invoice", create_invoice);
      
        $.ajax({
          url: "./controller/createInvoice.php",
          method: "post",
          data: fd,
          processData: false,
          contentType: false,
          success: function (data) {
            $('#myModal').modal('toggle');
            alert("Invoice has been created successfully.");
            viewInvoices();
          },
        });
      }


//edit product data
function articleAuthorEditForm(mail,id){
    $.ajax({
        url:"./adminView/articleAuthorFormEdit.php",
        method:"post",
        data:{record:id,record_auth_mail:mail},
        success:function(data){
            $('.editAticleAuthorModal').html(data);
        }
    });
}
function newsEditForm(id){
    $.ajax({
        url:"./adminView/newsFormEdit.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.editNewsModal').html(data);
        }
    });
}
function articleEditForm(id,file){
    $.ajax({
        url:"./adminView/articleFormEdit.php",
        method:"post",
        data:{record:id,record_file:file},
        success:function(data){
            $('.editArticleModal').html(data);
        }
    });
}
function articleViewDetails(id){
    $.ajax({
        url:"./adminView/articleViewDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.viewArticleDetailsModal').html(data);
        }
    });
}
function revAppViewDetails(id){
    $.ajax({
        url:"./adminView/revAppViewDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.viewRevAppDetModal').html(data);
        }
    });
}

function userEditForm(id){
    $.ajax({
        url:"./adminView/userFormEdit.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.editArticleModal').html(data);
        }
    });
}
function viewReviewDetails(id){
    $.ajax({
        url:"./adminView/viewReviewDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.editArticleModal').html(data);
        }
    });
}

//update product after submit
function updateItems(){
    var product_id = $('#product_id').val();
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        showProductItems();
        alert('Data Update Success.');
      }
    });
}
function updateArticle(){
    var e_art_id =$('#e_art_id').val();
    var e_art_title =$('#e_art_title').val();
    var e_art_abstract =$('#e_art_abstract').val();
    var e_art_keywords =$('#e_art_keywords').val();
    var e_art_nop =$('#e_art_nop').val();
    var e_word_art_file_old =$('#e_word_art_file_old').val();
    var e_art_status =$('#e_art_status').val();
    $('#main_opt').removeAttr('disabled')
    //var e_word_art_file_new =$('#e_word_art_file_new')[0].files[0];
    var fd = new FormData();
    fd.append('e_art_id', e_art_id);
    fd.append('e_art_title', e_art_title);
    fd.append('e_art_abstract', e_art_abstract);
    fd.append('e_art_keywords', e_art_keywords);
    fd.append('e_art_nop', e_art_nop);
    fd.append('e_word_art_file_old', e_word_art_file_old);
    fd.append('e_art_status', e_art_status);
    
    //fd.append('e_word_art_file_new', e_word_art_file_new);
    $.ajax({
        url:"./controller/updateArticle.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            //showProductItems();
            alert("Article Updated Successfully. " + e_art_id);
        }
    });
}
function updateArticleAuthor(){
    var article_id = $('#e_article_id').val();
    var f_name =$('#e_f_name').val();
    var m_name =$('#e_m_name').val();
    var l_name =$('#e_l_name').val();
    var a_mail=$('#e_a_mail').val();
    var corres_auth=$('#e_corres_auth').val();
    var a_title =$('#e_a_title ').val();
    var affiliation=$('#e_affiliation').val();
    var country=$('#e_country').val();

    var fd = new FormData();
    fd.append('e_article_id', article_id);
    fd.append('e_f_name', f_name);
    fd.append('e_m_name', m_name);
    fd.append('e_l_name', l_name);
    fd.append('e_a_mail', a_mail);
    fd.append('e_corres_auth', corres_auth);
    fd.append('e_a_title', a_title);
    fd.append('e_affiliation', affiliation);
    fd.append('e_country', country);
   
    $.ajax({
      url:'./controller/updateAtricleAuthor.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        showProductItems();
        alert("Author data has been updated successfully.");
      }
    });
}
function updateNews(){
    var e_news_id = $('#e_news_id').val();
    var e_news_title =$('#e_news_title').val();
    var e_news_content =$('#e_news_content').val();


    var fd = new FormData();
    fd.append('e_news_id', e_news_id);
    fd.append('e_news_title', e_news_title);
    fd.append('e_news_content', e_news_content);

   
    $.ajax({
      url:'./controller/updateNews.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        showProductItems();
        alert("Announcement has been updated successfully.");
      }
    });
}

function updateUser() {
    var e_user_id = $("#e_user_id").val();
    var e_f_name = $("#e_f_name").val();
    var e_m_name = $("#e_m_name").val();
    var e_l_name = $("#e_l_name").val();
    var e_email = $("#e_email").val();
    var e_pass = $("#e_pass").val();
    var e_u_role = $("#e_u_role").val();
    var e_u_workplace = $("#e_u_workplace").val();
    var e_job_type = $("#e_job_type").val();
    var e_title = $("#e_title ").val();
    var e_facebook = $("#e_facebook ").val();
    var e_twitter = $("#e_twitter ").val();
    var e_affiliation = $("#e_affiliation").val();
    var e_address = $("#e_address").val();
    var e_zip_code = $("#e_zip_code").val();
    var e_city = $("#e_city").val();
    var e_country = $("#e_country").val();
  
    var fd = new FormData();
    fd.append("e_user_id", e_user_id);
    fd.append("e_f_name", e_f_name);
    fd.append("e_m_name", e_m_name);
    fd.append("e_l_name", e_l_name);
    fd.append("e_email", e_email);
    fd.append("e_pass", e_pass);
    fd.append("e_u_role", e_u_role);
    fd.append("e_u_workplace", e_u_workplace);
    fd.append("e_job_type", e_job_type);
    fd.append("e_title", e_title);
    fd.append("e_facebook", e_facebook);
    fd.append("e_twitter", e_twitter);
    fd.append("e_affiliation", e_affiliation);
    fd.append("e_address", e_address);
    fd.append("e_zip_code", e_zip_code);
    fd.append("e_city", e_city);
    fd.append("e_country", e_country);
  
    $.ajax({
      url: "./controller/updateUser.php",
      method: "post",
      data: fd,
      processData: false,
      contentType: false,
      success: function (data) {
        alert("User data has been updated successfully. \n" + e_u_role);
      },
    });
  }
//delete product data
function articleDelete(id){
    $.ajax({
        url:"./controller/deleteArticle.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


function articleAuthorDelete(email,id){
    $.ajax({
        url:"./controller/deleteArticleAuthor.php",
        method:"post",
        data:{record:id,record_auth_mail:email},
        success:function(data){
            alert('Author Successfully deleted from this article');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}



//delete cart data
function cartDelete(id){
    $.ajax({
        url:"./controller/deleteCartController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function eachDetailsForm(id){
    $.ajax({
        url:"./view/viewEachDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id){
    $.ajax({
        url:"./view/viewCategories.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

function deleteInvoice(id){
    var res = confirm("Are you sure you want to delete this invoice");
    if(!res){
        return;
    }
    $.ajax({
        url:"./controller/deleteInvoice.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Invoice Successfully deleted');
            $('form').trigger('reset');
            viewInvoices();
        }
    });
}

function deleteReviewerApplication(id){
    var res = confirm("Are you sure you want to delete this Application");
    if(!res){
        return;
    }
    $.ajax({
        url:"./controller/deleteReviewerApplication.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Application Successfully deleted');
            $('form').trigger('reset');
            showReviewersApplications();
        }
    });
}

//delete size data
function sizeDelete(id){
    $.ajax({
        url:"./controller/deleteSizeController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Size Successfully deleted');
            $('form').trigger('reset');
            showSizes();
        }
    });
}


//delete variation data
function variationDelete(id){
    $.ajax({
        url:"./controller/deleteVariationController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

//edit variation data
function variationEditForm(id){
    $.ajax({
        url:"./adminView/editVariationForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//update variation after submit
function updateVariations(){
    var v_id = $('#v_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);
   
    $.ajax({
      url:'./controller/updateVariationController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showProductSizes();
      }
    });
}
function search(id){
    $.ajax({
        url:"./controller/searchController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.eachCategoryProducts').html(data);
        }
    });
}


function quantityPlus(id){ 
    $.ajax({
        url:"./controller/addQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}
function quantityMinus(id){
    $.ajax({
        url:"./controller/subQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout(){
    $.ajax({
        url:"./view/viewCheckout.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function removeFromWish(id){
    $.ajax({
        url:"./controller/removeFromWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Removed from wishlist');
        }
    });
}


function addToWish(id){
    $.ajax({
        url:"./controller/addToWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Added to wishlist');        
        }
    });
}
