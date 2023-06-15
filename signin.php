<?php
    include_once('includes/header.php');
?>
    <form action="" method="post" class="signlogin_form">
        <h2 class="signin_title">הרשמה</h2>
        <input type="text" name="username" class="signlogin_inputs" placeholder="שם משתמש">
        <input type="email" name="email" class="signlogin_inputs" placeholder="אימייל">
        <input type="password" name="password" class="signlogin_inputs" placeholder="סיסמה">
        <input type="password" name="retype_password" class="signlogin_inputs" placeholder="אישור סיסמה">
        <a href="login.php" style="" class="already_login_text">יש לי כבר חשבון</a>
        <input type="submit" value="היכנס" class="signlogin_inputs">
    </form>
<?php 
    include_once('includes/footer.php'); 
?>