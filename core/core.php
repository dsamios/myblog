<?php
session_start();

// apotrepei XSS epitheseis https://stackoverflow.com/questions/4861053/php-sanitize-values-of-a-array/4861211#4861211
$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

include "config.php";
require 'functions.php';

?>