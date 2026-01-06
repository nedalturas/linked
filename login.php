<?php
require_once 'config.php';



if (isLoggedIn()) {

    header('Location: index.php');

    exit;

}



$error = '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);

    $password = $_POST['password'];

    

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");

    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];

        $_SESSION['username'] = $username;

        header('Location: index.php');

        exit;

    } else {

        $error = 'Invalid username or password';

    }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Link Saver</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container auth-container">

        <h1>Login to Link Saver</h1>

        

        <?php if ($error): ?>

                    <div class="error"><?php echo $error; ?></div>

        <?php endif; ?>

        

        <form method="POST" class="auth-form">

            <input type="text" name="username" placeholder="Username" required>

            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>

        </form>

        



    </div>

</body>

</html>
