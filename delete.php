<?php

require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = (int)$_POST['id'];

    if($id > 0){
        $stmt = $pdo-prepare("DELETE FROM links WHERE id = ?");
        $stmt->execute([$id]);
    }
}

header('Location: index.php');
exit;
?>