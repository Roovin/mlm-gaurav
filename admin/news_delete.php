<?php
    error_reporting(0);
    session_start();
    include 'conn.php';
    $news_id = base64_decode($_SERVER['QUERY_STRING']);

    $sql = mysqli_query($conn, "DELETE FROM news WHERE id = '$news_id'");
    if($sql){
        header("Location: add_news.php");
    }

?>