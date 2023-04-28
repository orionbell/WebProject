<?php
$jsonString = file_get_contents("./blog/messages.json");
$json = json_decode($jsonString, true);
for ($i = 0; $i < count($json); $i++) {
    $jsonObj = $json[$i];
    if (empty($json[$i]["imgUrl"])) {
        $item = '
        <div class="msg_content">
            <img src="imgs/' . $jsonObj["profile"] . '" class="msg_img">
            <div class="msg_content_title">
                <h2>' . $jsonObj["title"] . '</h2>
                <h4>' . $jsonObj["date"] . '</h4>
            </div>
            <div class="msg_content_text">
                <p>' . $jsonObj["content"] . '</p>
            </div>
        </div>
        ';
    } else {
        $item = '
        <div class="msg_content">
            <img src="imgs/' . $jsonObj["profile"] . '" class="msg_img">
            <div class="msg_content_title">
                <h2>' . $jsonObj["title"] . '</h2>
                <h4>' . $jsonObj["date"] . '</h4>
            </div>
            <div class="msg_content_text">
                <p>' . $jsonObj["content"] . '</p>
                <img src="imgs/' . $jsonObj["imgUrl"] . '" class="content_img">
            </div>
        </div>
        ';
    }
    echo $item;
}