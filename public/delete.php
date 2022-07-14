<?php
require_once('../vendor/autoload.php');

$is_remove = \Post\Post::remove($_GET['id']);

ob_start();
$new_url = 'index.php';
header('Location: '.$new_url);
ob_end_flush();
