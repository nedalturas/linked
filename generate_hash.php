<?php

$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password: " . $password . "<br>";
echo "Hash: " . $hash . "<br><br>";


echo "Copy this SQL:<br>";

echo "DELETE FROM users WHERE username = 'admin';<br>";

echo "INSERT INTO users (username, password) VALUES ('admin', '" . $hash . "');";


