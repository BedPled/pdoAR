<?php
require_once('../vendor/autoload.php');
$loader = new Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
$view = new \Twig\Environment($loader);
if (isset($_GET['id'])) {
    $post = \Post\Post::getByID($_GET['id']);
    if ($post) {
        echo $view->render('post_update.html.twig', ['post' => $post]);

        if (isset($_POST['title'])) {
            $post->setPostTitle($_POST['title']);
            $post->setPostContent($_POST['content']);
            $post->save();

            ob_start();
            $new_url = 'index.php';
            header('Location: '.$new_url);
            ob_end_flush();
        }
    } else {
        echo '<h1>ID публикации не найден</h1>';
    }

}
