<?php
    include_once('includes/header.php');
    if (isset($_SESSION["useremail"])) {
        $usrmail = $_SESSION["useremail"];
    if (isset($_GET["sendcode"])) {
        include_once('includes/mail.php');
        verify_email($usrmail,$_SESSION["pincode"]);
        
    }
    }
    if(!isset($_SESSION["useremail"])) : 
?>
    <form action="includes/signup_inc.php" method="post" class="signlogin_form">
        <h2 class="signin_title">הרשמה</h2>
        <input type="text" name="username" class="signlogin_inputs" placeholder="שם משתמש" spellcheck="false">
        <input type="email" name="email" class="signlogin_inputs" placeholder="אימייל" spellcheck="false">
        <input type="password" name="password" class="signlogin_inputs" placeholder="סיסמה" spellcheck="false">
        <input type="password" name="retype_password" class="signlogin_inputs" placeholder="אישור סיסמה" spellcheck="false">
        <a href="login.php" style="" class="already_login_text">יש לי כבר חשבון</a>
        <p class="error">
            <?php
                if (isset($_GET["error"])) {
                    if($_GET["error"] == "EmptyInputs"){
                        echo "נא למלא את כל התאים";
                    }else if($_GET["error"] == "PasswdNotMatch" ){
                        echo "הסיסמאות אינן תואמות";
                    }else if($_GET["error"] == "PasswdNotStrong" ){
                        echo "הסיסמה צריכה להיות באורך של לפחות 9 תווים";
                    }else if($_GET["error"] == "UsernameInvalid" ){
                        echo "שם המשתמש אינו תקין";
                    }else if($_GET["error"] == "EmailInvalid" ){
                        echo "המייל אינו תקין";
                    }else if($_GET["error"] == "UsernameNotUnique" ){
                        echo "שם המשתמש תפוס";
                    }else if($_GET["error"] == "UsermailNotUnique" ){
                        echo "המייל כבר בשימוש בחשבון אחר";
                    }
                }
            ?>
        </p>
        <input type="submit" name="submit" value="היכנס" class="signlogin_inputs">
    </form>
<?php else : ?>
    <form action="includes/signup_inc.php" method="post" class="signlogin_form">
        <h2 class="signin_title">אישור כתובת האימייל</h2>
        <h6 class="signin_title" style="font-size:1rem;"><?php echo $usrmail?> הכנס את הקוד שנשלח לכתובת האימייל <br> על מנת לאשר את הכתובת</h6>
        <input type="text" name="pin" class="signlogin_inputs" placeholder="קוד" pattern="[0-9][0-9][0-9][0-9][0-9][0-9]" spellcheck="false" maxlength="6">
        <p class="error">
            <?php
                if (isset($_GET["error"])) {
                    if($_GET["error"] == "EmptyInputs"){
                        echo "נא להכניס את הקוד";
                    }else if($_GET["error"] == "PinNotMatch" ){
                        echo "הקוד אינו תואם למה שנשלח";
                    }
                }
            ?>
        </p>
        <input type="submit" name="verify" value="אשר אימייל" class="signlogin_inputs">
    </form>
<?php endif; ?>
<?php 
    include_once('includes/footer.php'); 
?>