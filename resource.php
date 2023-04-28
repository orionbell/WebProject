<?php 
    include_once('header.php');
    $topic = $_GET["topic"];
?>
<main class="container sub">
<?php

    // $json = file_get_contents('./resource/'.$topic.'.json');
    // $json_decoded = json_decode($json, true);
    
    // for ($i = 0; $i < count($json_decoded); $i++) {
    //     $jsonObj = $json_decoded[$i];
    //     $item = '
    //     <a class="course_link" style="text-decoration:none;" href="'.$jsonObj["page_link"].'">
    //         <div class="topic_container" style="color:'.$jsonObj['color'].'">
    //             <img src="imgs/'.$jsonObj["image"].'" alt="linux" class="logo">
    //             <p class="title sub">'.$jsonObj["title"].'</p>
    //         </div>
    //     </a>
    //     ';
        
    //     echo $item;
    // }
?>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/qMv24ilTzrg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</main>
<?php 
    include_once('footer.php'); 
?>