let stepTitle = document.getElementById('stepTitle');
let stepLegend = document.getElementById('stepLegend');
let step_0 = document.getElementById('step0');
let step_1 = document.getElementById('step1');
let step_2 = document.getElementById('step2');
let step_3 = document.getElementById('step3');
let step_4 = document.getElementById('step4');
let main_auth = document.getElementById('main_auth_cb');
let uploadBox = document.getElementById('file-upload');
let error_msg = $('#error_msg_step1');


function changeStep(stepNum){
    switch(stepNum){
        case 0: 
        stepTitle.innerHTML = "New Submission";
        stepLegend.innerHTML = "New Submission";
        step_0.classList.remove("d-none");
        step_1.classList.add("d-none");
        step_2.classList.add("d-none");
        break;
        case 1: 
        stepTitle.innerHTML = "New Submission - Input Article Details | Step 1";
        stepLegend.innerHTML = "Input Article details ...";
        step_1.classList.remove("d-none");
        step_0.classList.add("d-none");
        step_2.classList.add("d-none");

        break;
        case 2: 
        stepTitle.innerHTML = "New Submission - Input Author Details | Step 2";
        stepLegend.innerHTML = "Input authors ...";
        step_2.classList.remove("d-none");
        step_1.classList.add("d-none");
        step_3.classList.add("d-none");
        break;
        case 3: 
        stepTitle.innerHTML = "New Submission - Input Author Details | Step 3";
        stepLegend.innerHTML = "Input authors ...";
        step_3.classList.remove("d-none");
        step_2.classList.add("d-none");
        step_4.classList.add("d-none");
        break;
        case 4: 
        stepTitle.innerHTML = "New Submission - Input Author Details | Step 4";
        stepLegend.innerHTML = "Input authors ...";
        step_4.classList.remove("d-none");
        step_3.classList.add("d-none");
        step_2.classList.add("d-none");
        break;

    }
}




function validateFileType() {
    let files = uploadBox.files;
    if(files.length==0){
        $('#error_msg_step2').removeClass('d-none');
        $('#error_msg_step2').addClass('d-block');

        setTimeout(function() {
            $('#error_msg_step2').removeClass('d-block');
            $('#error_msg_step2').addClass('d-none');
        }, 3000);
    }else{
        let filename = files[0].name;

        /* getting file extenstion eg- .jpg,.png, etc */
        let extension = filename.substr(filename.lastIndexOf("."));

        /* define allowed file types */
        let allowedExtensionsRegx = /(\.docx|\.csv|\.txt|\.gif)$/i;

        /* testing extension with regular expression */
        let isAllowed = allowedExtensionsRegx.test(extension);

        if(isAllowed){
            changeStep(1);
        }else{
            alert("Invalid File Type.");
        }
    }
}

$(document).on('click','#goStep1',function(e){
    e.preventDefault();
    validateFileType()
    
});
$(document).on('click','#goStep2',function(e){
    e.preventDefault();
    if(!$('#select_journal').val() || !$('#article_title').val() || !$('#article_abstract').val() || !$('#a_pages_num').val() ){
        error_msg.html("<strong>Error!</strong> Please make sure that you filled all required fields.");
        error_msg.removeClass('d-none');
        error_msg.addClass('d-block');
        window.scrollTo(0, 0);
        setTimeout(function() {
            error_msg.removeClass('d-block');
            error_msg.addClass('d-none');
            
          }, 5000);
    }
    else{
        changeStep(2);
    }
    
});

$(document).on('click','#goStep3',function(e){
    e.preventDefault();
    var auth_fns = $('.auth_fn');
    var auth_mns = $('.auth_mn');
    var auth_lns = $('.auth_ln');
    var auth_mails = $('.auth_mail');
    var corres_auths = $('.corres_auth');
    var auth_titles = $('.auth_title');
    var auth_countries = $('.auth_country');
    var auth_affiliations = $('.auth_affiliation');
    for(var i = 0;i<auth_fns.length;i++){
        if(!$('.auth_fn')[i].value || !$('.auth_mn')[i].value || !$('.auth_ln')[i].value || !$('.auth_mail')[i].value || !$('.corres_auth')[i].value || !$('.auth_title')[i].value || !$('.auth_country')[i].value || !$('.auth_affiliation')[i].value ){
            error_msg.html("<strong>Error!</strong> Please make sure that you filled all required fields.");
            error_msg.removeClass('d-none');
            error_msg.addClass('d-block');
            window.scrollTo(0, 0);

            setTimeout(function() {
                error_msg.removeClass('d-block');
                error_msg.addClass('d-none');
              }, 5000);
              return;
        }
        if(!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test($('.auth_mail')[i].value)){
            error_msg.html("<strong>Error!</strong> Please make sure that all authors emails are valid.");
            error_msg.removeClass('d-none');
            error_msg.addClass('d-block');
            window.scrollTo(0, 0);

            setTimeout(function() {
                error_msg.removeClass('d-block');
                error_msg.addClass('d-none');
              }, 5000);
              return;
        }
    }
    changeStep(3);
    
});
$(document).on('click','#goStep4',function(e){
    e.preventDefault();
    for(var i = 0;i<$('.rev_fn').length;i++){
        if(!$('.rev_fn')[i].value || !$('.rev_ln')[i].value || !$('.rev_mail')[i].value || !$('.rev_affiliation')[i].value){
            error_msg.html("<strong>Error!</strong> Please make sure that you filled all required fields.");
            error_msg.removeClass('d-none');
            error_msg.addClass('d-block');
            window.scrollTo(0, 0);

            setTimeout(function() {
                error_msg.removeClass('d-block');
                error_msg.addClass('d-none');
            }, 5000);
              return;
        }
        if(!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test($('.rev_mail')[i].value)){
            error_msg.html("<strong>Error!</strong> Please make sure that all suggested reviewers emails are valid.");
            error_msg.removeClass('d-none');
            error_msg.addClass('d-block');
            window.scrollTo(0, 0);

            setTimeout(function() {
                error_msg.removeClass('d-block');
                error_msg.addClass('d-none');
              }, 5000);
              return;
        }
    }
    changeStep(4);

    
    
});



$(document).on('click','#backStep0',function(e){
    e.preventDefault();
    changeStep(0);
});
$(document).on('click','#backStep1',function(e){
    e.preventDefault();
    changeStep(1);
});
$(document).on('click','#backStep2',function(e){
    e.preventDefault();
    changeStep(2);
});
$(document).on('click','#backStep3',function(e){
    e.preventDefault();
    changeStep(3);
});
changeStep(0);    
console.log($('.auth_fn'))