<?php 
    include_once('header.php');
?>
<main class="right_menu">
    <ul class="menu">
        <li class="menu_item"><a href="resource.php?topic=debian" class="menu_link">Debian</a></li>
        <li class="menu_item"><a href="resource.php?topic=windows" class="menu_link">Windows</a></li>
        <li class="menu_item"><a href="resource.php?topic=redhat" class="menu_link">Redhat</a></li>
        <li class="menu_item"><a href="resource.php?topic=arch" class="menu_link">Arch</a></li>
        <li class="menu_item"><a href="resource.php?topic=python" class="menu_link">Python</a></li>
        <li class="menu_item"><a href="resource.php?topic=c" class="menu_link">C</a></li>
        <li class="menu_item"><a href="resource.php?topic=java" class="menu_link">Java</a></li>
        <li class="menu_item"><a href="resource.php?topic=javascript" class="menu_link">Javascript</a></li>
        <li class="menu_item"><a href="resource.php?topic=php" class="menu_link">Php</a></li>
        <li class="menu_item"><a href="resource.php?topic=mysql" class="menu_link">Mysql</a></li>
        <li class="menu_item"><a href="resource.php?topic=assembly" class="menu_link">Assembly</a></li>
        <li class="menu_item"><a href="resource.php?topic=html" class="menu_link">Html</a></li>
        <li class="menu_item"><a href="resource.php?topic=css" class="menu_link">Css</a></li>
        <li class="menu_item"><a href="resource.php?topic=networking" class="menu_link">Networking</a></li>
        <li class="menu_item"><a href="resource.php?topic=ethicalhacking" class="menu_link">Ethical hacking</a></li>
        <li class="menu_item"><a href="resource.php?topic=git" class="menu_link">Git</a></li>
    </ul>
</main>
<h2 class="subheader">סרטונים</h2>
<main class="videos_container">
<?php
if($_GET["topic"] != ""){
    $topic = $_GET["topic"];
    $json = file_get_contents('./resources/'.$topic.'/youtube.json');
    $json_decoded = json_decode($json, true);
    for ($i = 0; $i < count($json_decoded); $i++) {
        $jsonObj = $json_decoded[$i];
        $item = '
        <div class="video_container">    
        <a href="https://www.youtube.com/embed/'.$jsonObj["video_id"].'" target="_BLANK"><img src="https://img.youtube.com/vi/'.$jsonObj["video_id"].'/0.jpg" /></a>
            <p class="video_title">'.$jsonObj["title"].'</p>
        </div>  
            ';
        
        echo $item;
    }
    }else{
        $dir_array = scandir('./resources');
        unset($dir_array[0]);
        unset($dir_array[1]);
        for($j = 2;$j < 20;$j++){
	        $topic = $dir_array[rand(2,count($dir_array))];
            $json = file_get_contents('./resources/'.$topic.'/youtube.json');
            $json_decoded = json_decode($json, true);
            $jsonObj = $json_decoded[rand(0,20)];
            $item = '
            <div class="video_container">    
            <a href="https://www.youtube.com/embed/'.$jsonObj["video_id"].'" target="_BLANK"><img src="https://img.youtube.com/vi/'.$jsonObj["video_id"].'/0.jpg" /></a>
                <p class="video_title">'.$jsonObj["title"].'</p>
            </div>  
                ';
            echo $item;
        }
    }
?>
</main>

<!-- here goes the playlists -->

<h2 class="subheader">ערוצים ששווה לבדוק</h2>
<main class="channel_container  ">
<?php
    if($_GET["topic"] != ""){
        $topic = $_GET["topic"];
        $json = file_get_contents('./resources/'.$topic.'/channels.json');
        $json_decoded = json_decode($json, true);
        for ($i = 0; $i < count($json_decoded); $i++) {
            $jsonObj = $json_decoded[$i];
            $item = '
            <a class="channel_link" target="_blank" style="text-decoration:none;" href="'.$jsonObj["link"].'">
                    <img src="imgs/channels/'.$jsonObj["image"].'" alt="linux" class="channel_logo">
                    <p class="channel_name">'.$jsonObj["name"].'</p>
            </a>
            ';
            
            echo $item;
        }
    }else{
        $dir_array = scandir('./resources');
        unset($dir_array[0]);
        unset($dir_array[1]);
        for($j = 2;$j < 6;$j++){
	        $topic = $dir_array[rand(2,count($dir_array))];
            $json = file_get_contents('./resources/'.$topic.'/channels.json');
            $json_decoded = json_decode($json, true);
            $jsonObj = $json_decoded[rand(0,3)];
            $item = '
            <a class="channel_link" target="_blank" style="text-decoration:none;" href="'.$jsonObj["link"].'">
                    <img src="./imgs/channels/'.$jsonObj["image"].'" alt="image" class="channel_logo">
                    <p class="channel_name">'.$jsonObj["name"].'</p>
            </a>
            ';
            echo $item;
        }
    }

?>
</main>
<?php 
    include_once('footer.php'); 
?>