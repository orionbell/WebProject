<?php
require_once "dbh.php";
$blogArray = get_blog_msgs(5);
for ($i = 0; $i < count($blogArray); $i++) {
    $jsonObj = $blogArray[$i];
    if (empty($blogArray[$i]["img"])) {
        $item = '
        <div class="msg_content">
            <span class="blog_id">'.$jsonObj["id"].'</span>
            <img src="imgs/' . $jsonObj["profile_img"] . '" class="msg_img">
            <div class="msg_content_title">
                <h2>' . $jsonObj["title"] . '</h2>
                <h4>' . date("d/m/y",strtotime($jsonObj["published"])) . '</h4>
            </div>
            <div class="msg_content_text">
                <p>' . $jsonObj["content"] . '</p>
            </div>
        </div>
        ';
    } else {
        $item = '
        <div class="msg_content">
            <span class="blog_id">'.$jsonObj["id"].'</span>
            <img src="imgs/' . $jsonObj["profile_img"] . '" class="msg_img">
            <div class="msg_content_title">
                <h2>' . $jsonObj["title"] . '</h2>
                <h4>' . date("d/m/y",strtotime($jsonObj["published"])) . '</h4>
            </div>
            <div class="msg_content_text">
                <p>' . $jsonObj["content"] . '</p>
                <img src="imgs/' . $jsonObj["img"] . '" class="content_img">
            </div>
        </div>
        ';
    }
    echo $item;
}