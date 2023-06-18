<?php 
    include_once('includes/header.php');
    $already_defined = array();
    $playlist_already_defined = array();
    $videos = array();
    //initializtion of the json files
    if($_GET["topic"] != ""){
        $topic = $_GET["topic"];
        $pjson = file_get_contents('./resources/'.$topic.'/playlists.json');
        $pjson_decoded = json_decode($pjson, true);
        $cjson = file_get_contents('./resources/'.$topic.'/channels.json');
        $cjson_decoded = json_decode($cjson, true);
    }
        
?>
<main class="right_menu" id="top">
    <ul class="menu">
        <li class="menu_item"><a href="resource.php?topic=linux" class="menu_link">linux</a></li>
        <li class="menu_item"><a href="resource.php?topic=windows" class="menu_link">Windows</a></li>
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
        <li class="menu_item"><a href="resource.php?topic=docker" class="menu_link">Docker</a></li>
        <li class="menu_item"><a href="resource.php?topic=etc" class="menu_link">Else</a></li>
    </ul>
</main>
<main class="right_menu">
    <ul class="menu">
        <li class="menu_item"><a href="#videos" class="menu_link">סרטונים</a></li>
        <li class="menu_item"><a href="#playlists" class="menu_link">פליליסטים</a></li>
        <li class="menu_item"><a href="#channels" class="menu_link">ערוצים</a></li>
    </ul>
</main>
<h2 class="subheader" id="videos">סרטונים</h2>
<main class="videos_container">
<?php
    if($_GET["topic"] != ""){
        $video_json = file_get_contents('./resources/'.$topic.'/youtube.json');
        $video_json_decoded = json_decode($video_json, true);
        for ($i = 0; $i < count($video_json_decoded); $i++) {
            $jsonObj = $video_json_decoded[$i];
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
        for($j = 2;$j < count($dir_array) ;$j++){
            $topic = $dir_array[$j];//rand(2,count($dir_array))];
            $json = file_get_contents('./resources/'.$topic.'/youtube.json');
            $json_decoded = json_decode($json, true);
            foreach ($json_decoded as $jsonArr){
                if(!in_array($jsonArr["title"],$already_defined)){
                    $item = '
                    <div class="video_container">    
                    <a href="https://www.youtube.com/embed/'.$jsonArr["video_id"].'" target="_BLANK"><img src="https://img.youtube.com/vi/'.$jsonArr["video_id"].'/0.jpg" /></a>
                        <p class="video_title">'.$jsonArr["title"].'</p>
                    </div>  
                        ';
                    array_push($videos,$item);
                    array_push($already_defined,$jsonArr["title"]);
                }
            }
        }
        shuffle($videos);
        foreach($videos as $video){
            echo $video;
        }
    }
?>

</main>
<?php 
    if($_GET["topic"]!= ""){
        if(count($pjson_decoded)){
            echo '<h2 class="subheader" id="playlists">פלייליסטים</h2>';
        }
    }else{
        echo '<h2 class="subheader" id="playlists">פלייליסטים</h2>';
    }
?>
<main class="videos_container">
<?php 
    if($_GET["topic"] != ""){
        for ($i = 0; $i < count($pjson_decoded); $i++) {
            $jsonObj = $pjson_decoded[$i];
            $item = '
            <div class="video_container">    
                <a target="_blank" style="text-decoration:none;" href="'.$jsonObj["link"].'">
                    <img src="https://img.youtube.com/vi/'.$jsonObj["video_id"].'/0.jpg" />
                </a> 
                <p class="video_title">'.$jsonObj["name"].'</p>      
            </div>
            ';
            echo $item;
        }
    }
    else{
        $dir_array = scandir('./resources');
        unset($dir_array[0]);
        unset($dir_array[1]);
        for($j = 2;$j < count($dir_array);$j++){
	        $rand_topic = $dir_array[$j];
            $json = file_get_contents('./resources/'.$rand_topic.'/playlists.json');
            $json_decoded = json_decode($json, true);
            foreach ($json_decoded as $jsonObj){
                if(!in_array($jsonObj["name"],$already_defined)){
                    $item = '
                    <div class="video_container">    
                        <a target="_blank" style="text-decoration:none;" href="'.$jsonObj["link"].'">
                            <img src="https://img.youtube.com/vi/'.$jsonObj["video_id"].'/0.jpg" />
                        </a> 
                        <p class="video_title">'.$jsonObj["name"].'</p>
                    </div>  
                    ';
                    echo $item;
                    array_push($already_defined,$jsonObj["name"]);
                    array_push($playlist_already_defined,$item);
                }
            }
        }
        shuffle($playlist_already_defined);
        foreach($playlist_already_defined as $playlist){
            echo $playlist;
        }
    }
?>
</main>
<?php 
    if($_GET["topic"] != ""){
        if(count($cjson_decoded)){
            echo '<h2 class="subheader" id="channels">ערוצים ששווה לבדוק</h2>';
        }
    }else{
        echo '<h2 class="subheader" id="channels">ערוצים ששווה לבדוק</h2>';
    }
?>

<main class="channel_container">
<?php
    if($_GET["topic"] != ""){
        for ($i = 0; $i < count($cjson_decoded); $i++) {
            $jsonObj = $cjson_decoded[$i];
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
        
        for($j = 2;$j < count($dir_array);$j++){
	        $topic = $dir_array[$j];
            $json = file_get_contents('./resources/'.$topic.'/channels.json');
            $json_decoded = json_decode($json, true);
            foreach ($json_decoded as $jsonObj){
                if(!in_array($jsonObj["name"],$already_defined)){
                    $item = '
                    <a class="channel_link" target="_blank" style="text-decoration:none;" href="'.$jsonObj["link"].'">
                            <img src="./imgs/channels/'.$jsonObj["image"].'" alt="image" class="channel_logo">
                            <p class="channel_name">'.$jsonObj["name"].'</p>
                    </a>
                    ';
                    echo $item;
                    array_push($already_defined,$jsonObj["name"]);
                }
            }
        }
    }

?>
</main>
<div class="back_btn_container"><a href="#top" class="menu_link">בחזרה למעלה</a></div>

<?php 
    include_once('includes/footer.php'); 
?>