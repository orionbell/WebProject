<?php
    include_once('includes/header.php');
?>
    <form action="" method="post" class="signlogin_form">
        <h2 class="signin_title">כניסה</h2>
        <input type="text" name="usernamemail" class="signlogin_inputs" placeholder="שם משתמש או אימייל">
        <input type="password" name="password" class="signlogin_inputs" placeholder="סיסמה">
        <a href="signin.php" class="already_login_text">צור חשבון</a>
        <input type="submit" value="היכנס" class="signlogin_inputs">
    </form>
<?php 
    include_once('includes/footer.php'); 
?>