<?php
    $login = true;
    if(!isset($login)){
        header("Location: login.php");
    }
    include_once('includes/header.php');
?>
    <main class="userui_contianer">
        <h2 class="ui_header">פרטים אישיים</h2>
            <ul class="peronal_info_list">
                <span class="name_ui">שם</span>
                <li class="peronal_info_item">banana</li>
                <span class="name_ui">אימייל</span>
                <li class="peronal_info_item">yishaimail@mail.com </li>
                <button class="change_paswd_btn">ערוך</button>
            </ul>
            
        <h2 class="ui_header">הקורסים שלי</h2>
    </main>
<?php 
    include_once('includes/footer.php'); 
?>