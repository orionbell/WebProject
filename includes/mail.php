<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  //$mail->Host       = "smtp.mail.yahoo.com";
  $mail->Username   = "yishai4505@gmail.com";
  $mail->Password   = "yahmbmchimhxopxq";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "esteemed customer");
  $mail->SetFrom("yishai4505@gmail.com", "CS israel");
  //$mail->AddReplyTo("reply-to-email", "reply-to-name");
  //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    //echo "Error while sending Email.";
    //echo "<pre>";
    //var_dump($mail);
    return false;
  } else {
    //echo "Email sent successfully";
    return true;
  }

}

function verify_email($usrmail,$pincode)
{
  $mailtitle = "verifcation code";
  $mailmsg = "
      <!DOCTYPE html>
      <html>
      <head>
          <style>
          body{
          background:linear-gradient(45deg,#0190cd,#764ada);
          margin: 1em 2em;
          direction: rtl;
          }
          h1{
          padding: 1.5em;
          font-size: 2rem;
          color: white;
          text-shadow: 0 0 10px white ;
          }
          h3{
              padding: 1.5em;
              font-size: 1rem;
              color: white;
              text-shadow: 0 0 10px white ;
          }
          p{
              background:white;
              display:inline;
              padding: 1em;
              margin: 2em;
              font-size: 1rem;
              color:  #764ada ;
              text-shadow: 0 0 10px #764ada ;
              border-radius:10px;
          }
          </style>
      </head>
      <body>
          <h1>קוד לאישור כתובת המייל</h1>
          <h3>העתק את הקוד שרשום פה למטה והדבק אותו באתר על מנת לאשר</h3>
          <p>הקוד הוא: $pincode</p>
      </body>
      </html>
  ";
  send_mail($usrmail,$mailtitle,$mailmsg);
}
?>
