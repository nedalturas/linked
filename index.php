<?php

require_once 'config.php';

$stmt = $pdo->query("SELECT * FROM links ORDER BY created_at DESC");
$links = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Saver</title>
    <link rel="stylesheet" href="style.css">

  <!-- jQuery (Required for Fomantic UI) -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    

    <!-- Fomantic UI CSS -->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.3/dist/semantic.min.css">

    

    <!-- Fomantic UI JS -->

    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.3/dist/semantic.min.js"></script>



</head>
<body>
    
    <div class="container">
      
        <div class="header">

          <h1>Link Saver</h1>
          <div class="user-info">

          <a href="logout.php" class="logout-btn">Logout</a>
          </div>

        </div>        

        <form action="save.php" method="POST" class="add-form">
            <input type="text" name="title" placeholder="Link Title" required />
            <input type="url" name="url" placeholder="https://example.con" required />
            <button type="submit">Save</button>
        </form>

        <div class="links-list">
            <?php if (empty($links)): ?>
                <p class="no-links">No Links Saved yet</p>
            <?php else: ?>
                
                <?php foreach ($links as $link): ?>
                    <div class="link-item">
                        <div class="link-info">
                            <h3><?php echo htmlspecialchars($link['title']); ?></h3>
                            <a href="<?php echo htmlspecialchars($link['url']); ?>" target="_blank">

                                <?php echo htmlspecialchars($link['url']); ?>

                            </a>

                            <small><?php echo date('M d, Y', strtotime($link['created_at'])); ?></small>
                        </div>
                        <form action="delete.php" method="POST" class="delete-form">
                            <input type="hidden" name="id" value="<?php echo $link['id']; ?>">
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
