<?php 
    include_once('header.php');
?>
<?php 
    $lang = $_GET[1];
    $json = file_get_contents('./courses_json/'.$lang.'_course.json');
    echo "the lang is ".$lang;
?>

<?php 
    include_once('footer.php'); 
?>