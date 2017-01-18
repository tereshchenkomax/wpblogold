<?php
$link = db_connect();
$visitor_ip = $_SERVER["REMOTE_ADDR"];
//echo $_SERVER['SERVER_NAME'];

$date = date("Y-m-d");

function update_counter($article_id){
    $link = db_connect();
    $visitor_ip = $_SERVER["REMOTE_ADDR"];
    $date_views = date("Y-m-d");
    $current_ip = mysqli_query($link, "SELECT ip_id FROM ip WHERE ip_address='$visitor_ip'");
    if (mysqli_num_rows($current_ip) > 0) {
        $ip_id=$current_ip->fetch_object()->ip_id;
//        var_dump($current_ip->fetch_object()); die(); //вывод масива переменнои
//        var_dump($ip_id); die(); //вывод масива переменнои
        mysqli_query($link,"INSERT INTO visits(`date_views`, `ip_id`, `article_id`) VALUES ('$date_views',$ip_id,$article_id)");//
    } else {
        mysqli_query($link, "INSERT INTO ip(`ip_address`) VALUES ('$visitor_ip')");
        $ip_id = mysqli_insert_id($link);
        mysqli_query($link,"INSERT INTO visits(`date_views`, `ip_id`, `article_id`) VALUES ('$date_views',$ip_id,$article_id)");
    }
//    var_dump($current_ip); die();
}
function get_counter($article_id)
{
    $link = db_connect();
//    $result = mysqli_query($link, "SELECT * FROM visits WHERE `article_id` = $article_id GROUP BY `ip_id`");
    $result = mysqli_query($link, "SELECT * FROM visits WHERE `article_id` = $article_id");
    $visits = mysqli_num_rows($result);
    return $visits;
}