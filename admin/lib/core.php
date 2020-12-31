<?php
include '../core/config.php';

session_start();

if (isset($_SESSION['sec-username'])) {
    $uname = $_SESSION['sec-username'];
    $suser = mysqli_query($connect, "SELECT * FROM `users` WHERE username='$uname'");
    $count = mysqli_num_rows($suser);
    if ($count < 0) {
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        exit;
    }
} else {
    echo '<meta http-equiv="refresh" content="0; url=index.php" />';
    exit;
}

if (basename($_SERVER['SCRIPT_NAME']) != 'add_post.php' && basename($_SERVER['SCRIPT_NAME']) != 'posts.php' && basename($_SERVER['SCRIPT_NAME']) != 'add_page.php' && basename($_SERVER['SCRIPT_NAME']) != 'pages.php' && basename($_SERVER['SCRIPT_NAME']) != 'add_widget.php' && basename($_SERVER['SCRIPT_NAME']) != 'widgets.php' && basename($_SERVER['SCRIPT_NAME']) != 'add_ad.php' && basename($_SERVER['SCRIPT_NAME']) != 'ads.php') {
    $_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
}

function short_text($text, $length)
{
    $maxTextLenght = $length;
    $aspace        = " ";
    if (strlen($text) > $maxTextLenght) {
        $text = substr(trim($text), 0, $maxTextLenght);
        $text = substr($text, 0, strlen($text) - strpos(strrev($text), $aspace));
        $text = $text . '...';
    }
    return $text;
}