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
</head>
<body>
    
    <div class="container">
        <h1>Link Saver</h1>


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