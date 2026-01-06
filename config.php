<?php
$host = 'localhost';
$db = 'link_saver';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());

}

function isLoggedIn(){

  return isset($_SESSION['user_id']);
}

function requireLogin() {

      if (!isLoggedIn()) {

                header('Location: login.php');

                        exit;

                    }

}

?>
