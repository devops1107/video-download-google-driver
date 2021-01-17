<?php
$file = urldecode($_GET['url']);
$gid = getID($file);
$url = "https://drive.google.com/e/get_video_info?docid=" . $gid;
$get = file_get_contents($url);
$title = explode("&", explode("title=", $get)[1])[0];
$short = rndText(32);
$sql = "insert into links (name, file, short, created_by) value ('".urldecode($title)."', '".$file."', '".$short."', '".$user."')";

if($conn->query($sql) ==  true){
    echo $_SERVER['HTTP_HOST'] . "/v/" . $short;
} else {
    $sql = "select short from links where file = '" . $file . "'";
    $result = $conn->query($sql);
    echo $_SERVER['HTTP_HOST'] . "/v/" . $result->fetch_row()[0];
}