<?php
    include_once('includes/header.php');
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }
    $username = $_SESSION["username"];
    $useremail = $_SESSION["useremail"];
?>
    <main class="userui_contianer">
        <h2 class="ui_header">הקורסים שלי</h2>
        <h2 class="ui_header">פרטים אישיים</h2>
            <ul class="peronal_info_list">
                <span class="name_ui">שם</span>
                <li class="peronal_info_item"><?php echo $username; ?></li>
                <span class="name_ui">אימייל</span>
                <li class="peronal_info_item"><?php echo $useremail; ?></li>
                <form class="btn-form" action="">
                    <input class="change_paswd_btn" type="submit" value="ערוך">
                </form>
            </ul>
            <form class="btn-form" action="includes/logout_inc.php">
                    <input class="change_paswd_btn" type="submit" value="התנתקות">
            </form>
    </main>
<?php 
    include_once('includes/footer.php'); 
?>