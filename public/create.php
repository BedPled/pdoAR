<?php
require_once('../vendor/autoload.php');
$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $view->render('post_create.html.twig');
} else {
    $post = new \Post\Post($_POST['title'], $_POST['content']);
    if ($post->add()) {
        ob_start();
        $new_url = 'index.php';
        header('Location: '.$new_url);
        ob_end_flush();
    } else {
        echo '<h1>Ошибка создания</h1>';

    }
}