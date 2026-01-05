<?php

require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = trim($_POST['title']);
    $url = trim($_POST['url']);

    if(!empty($title) && !empty($url)){
        $stmt = $pdo->prepare("INSERT INTO links (title, url) VALUES (?,?)");
        $stmt->execute([$title, $url]);
    }
}

header('Location: index.php');
exit;
?>