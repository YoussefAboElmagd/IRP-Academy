<?php
    //include_once "../config/dbconnect.php";
    include_once "../../config.php";

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    //required files
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';
    if(isset($_POST['create_invoice']))
    {
       
        $usr_mail = $_POST['usr_mail'];
        $amount = $_POST['amount'];
       
        $result = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$usr_mail' ");

        $row = $result -> fetch_assoc();
        
        $usr_id = $row['user_id'];


        


         $insert = mysqli_query($conn,"INSERT INTO user_payment(paid_by,amount) 
         VALUES ('$usr_id','$amount')");
        $mail = new PHPMailer(true);
 
        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;             //Enable SMTP authentication
        $mail->Username   = 'ahmedmoney2001@gmail.com';   //SMTP write your email
        $mail->Password   = 'wbhznuzbxdezutof';      //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
        $mail->Port       = 465;                                    
    
        //Recipients
        $mail->setFrom( "ahmedmoney2001@gmail.com", "IRP Payment System"); // Sender Email and name
        $mail->addAddress("$usr_mail");     //Add a recipient email  
        $mail->addReplyTo("ahmedmoney2001@gmail.com", "IRP Website"); // reply to sender email
    
        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = "New Invoice Announcement";   // email subject headings
        $mail->Body    = "<h1>You have a new invoice added to your account. check your invoices from <a href='192.168.1.18:25565/ResearchWebsite/login.php'>here</a></h1>"; //email message
        
        // Success sent message alert
        $mail->send();

         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
            
         }
     
    }
    else{
        header("location: ../../index.php");
    }
        
?>