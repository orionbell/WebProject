<!-- Need to add a writng functionality -->
<?php
include_once('header.php');
?>
<div class="blog_container">
    <main class="msg_container">
        <?php
        include_once('./blog/msg_mgt.php');
        ?>
    </main>
    <section class="user_msg_box">
        <form action="./blog/user_cmt_mgt.php" method="post" class="user_form">
            <input type="text" name="title" class="user_inputs" placeholder="title">
            <textarea name="message" class="user_inputs text_input" placeholder="Message goes in here"></textarea>
            <input type="submit" value="send" name="submit" class="user_inputs">
        </form>
        <?php

        ?>
    </section>
</div>
<?php
include_once('footer.php');
?>