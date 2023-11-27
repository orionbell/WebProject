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
  $mailmsg = '
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
  <html>
  <head>
    <title>אימות איימל</title>
  </head>
  <body>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td align="center" bgcolor="#f2f2f2" style="padding: 20px;">
          <table cellpadding="0" cellspacing="0" border="0" width="600" bgcolor="#ffffff" style="border-radius: 5px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
            <tr>
              <td align="center" bgcolor="#007BFF" style="padding: 20px 0; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                <h1 style="color: #ffffff; font-size: 24px;">Email Verification</h1>
              </td>
            </tr>
            <tr>
              <td style="padding: 20px;">
                <p>התבקשת לאמת את כתובת המייל שלך בעזרת הקוד הבא:</p>
                <p><strong>קוד אימות:</strong>'.$pincode .'</p>
              </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#f2f2f2" style="padding: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                <p style="font-size: 12px; color: #666;">&copy; 2023 [Your Company Name]. All rights reserved.</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
  </html>
  
  ';
  send_mail($usrmail,$mailtitle,$mailmsg);
  $_SESSION["verify"] = true;
}
?>
