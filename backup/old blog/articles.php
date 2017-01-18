<?php

//function articles_views($link, $id)
//{
////    $ip = $_SERVER["REMOTE_ADDR"]; // узнали IP пользователя
//    $query = mysqli_query("SELECT `count` FROM articles WHERE id='%d'", $link);
//    $res = mysqli_fetch_array($query);
//    $count_of_views = $res ['counter'];
//    $count_of_views++;
//    mysqli_query("UPDATE articles SET count='$count_of_views' WHERE news_id='$id'", $link);
////    if (isset($query['ip'])) {
////        exit;
////    } else {
////        // апдейтим кол-во уник просмотров
////        $newcount = $resultcount["count"] + 1;
////        mysqli_query("UPDATE articles SET count='$newcount' WHERE news_id='$id'", $link);
////    }
//}

function articles_all($link)
{
    //Запрос
    $query = "SELECT * FROM articles ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    //Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;

}

function articles_get($link, $id_article)
{
    //Запрос
    $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id_article);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_fetch_assoc($result);
}

function articles_new($link, $title, $content)
{
    $date = date("Y-m-d H:i:s");
    //Подготовка
    $title = trim($title);
    $content = trim($content);

    //Проверка
    if ($title == '')
        return false;

    //Запрос
    $t = "INSERT INTO articles (title,data_updated, content) VALUES ('%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $title),
        mysqli_escape_string($link, $date),
        mysqli_escape_string($link, $content));

    //echo $query;
    $result = mysqli_query($link, $query);

    if (!$result){
        die(mysqli_error($link));
    } else {
    $id = $link->insert_id;
    if (isset($photo) && isset($id)) {
        save_photo($link, $id, $photo);
    }
}
    return true;
}
function save_photo($link, $id, $photo, $is_update_photo = false)
{
    // Save file
    $rootPath = dirname(__FILE__) . 'DIRECTORY_SEPARATOR....DIRECTORY_SEPARATOR';
    $info = pathinfo($photo['name']);
    $ext = $info['extension']; // get the extension of the file
    $dir = $rootPath . 'uploads.DIRECTORY_SEPARATOR.articles.DIRECTORY_SEPARATOR' . strval($id);
    if ($is_update_photo and file_exists($dir)) {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            else unlink("$dir/$file");
        }
    }
    $is_folder = false;
    if (!file_exists($dir)) {
        if (mkdir($dir, 0777, true)) $is_folder = true;
    } else {
        $is_folder = true;
    }

    if ($is_folder) {
        $name_photo = date("YmdHis") . "." . $ext;
        $target = $dir . 'DIRECTORY_SEPARATOR' . $name_photo;
        if (move_uploaded_file($photo['tmp_name'], $target)) {
            $short_dir = 'uploads.DIRECTORY_SEPARATOR.articles.DIRECTORY_SEPARATOR' . strval($id) . 'DIRECTORY_SEPARATOR' . $name_photo;
            mysqli_query($link, sprintf("UPDATE articles SET photo='%s' WHERE id = '%d'", mysqli_escape_string($link, $short_dir), $id));
        }
    }
}
function delete_article_photo_folder($id)
{
    $rootPath = dirname(__FILE__) . 'DIRECTORY_SEPARATOR....DIRECTORY_SEPARATOR';
    $dir = $rootPath . 'uploads.DIRECTORY_SEPARATOR.articles.DIRECTORY_SEPARATOR' . strval($id);
    if (file_exists($dir)) {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }
}

function articles_edit($link, $id, $title, $content)
{
    $date = date("Y-m-d H:i:s");
    $title = trim($title);   //Обрезаем пробелы по краям
    $content = trim($content);
    $id = (int)$id;
    //ПРОВЕРКА
    if ($title == '')
        return false;

    //Запрос
    $sql = "UPDATE articles SET title='%s', data_updated='%s', content='%s' WHERE id='%d'";

    $query = sprintf(
        $sql,
        mysqli_real_escape_string($link, $title),
        mysqli_escape_string($link, $date),
        mysqli_escape_string($link, $content),
        $id
    );
    $result = mysqli_query($link, $query);

    if (!$result){
        die(mysqli_error($link));
    } else {
        if (isset($photo)) {
            save_photo($link, $id, $photo, true);
        }
    }
    return mysqli_affected_rows($link);
}

function articles_delete($link, $id)
{
    $id = (int)$id;
    //Проверка
    if ($id == 0)
        return false;

    //Запрос
    $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if (!$result){
        die(mysqli_error($link));
    } else {
        delete_article_photo_folder($id);
    }
    return mysqli_affected_rows($link);
}

function articles_intro($text, $len = 500)
{
    return mb_substr($text, 0, $len);
}

