<?php

    //include_once "../config/dbconnect.php";
    include_once "../../config.php";
    include('../../phpqrcode/qrlib.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    //required files
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    $trans_id=$_POST['record'];
    $inv_status=$_POST['record_status'];
    $qr_code = "";
    $mail_msg = "We are sorry. Your payment has been rejected.";
    if($inv_status == "Accepted"){
        $qr_code = "qr_" . uniqid() . ".png";
        QRcode::png("https://irp-academy.com/ResearchWebsiteProject/invoice_pdf.php?inv=$trans_id", "../../uploads/qr_codes/" . $qr_code, QR_ECLEVEL_L , 6,2); 
        $mail_msg = "Congrats! Your payment has been completed successfully!";
        
    }
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
                $mail->addAddress("ahmed.osama.swe@gmail.com");     //Add a recipient email  
                $mail->addReplyTo("ahmedmoney2001@gmail.com", "IRP Website"); // reply to sender email
            
                //Content
                $mail->isHTML(true);               //Set email format to HTML
                $mail->Subject = "Invoice Update Announcement";   // email subject headings
                $mail->Body    = "<h1>$mail_msg</h1>"; //email message
                
                // Success sent message alert
                $mail->send();
    $query="UPDATE user_payment SET payment_status = '$inv_status',qr_code = '$qr_code' WHERE transaction_id='$trans_id' ";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>