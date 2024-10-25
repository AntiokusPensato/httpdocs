<?php
include("../includes/header.php");
?>
<main>
    <h2><?= $folder_name; ?>
        <span><?= $file_name; ?></span>
    </h2>
    <ol>
        <li><a href="../assignments/01-includes/index.php">Includes</a></li>
        <li><a href="../assignments/02-mail/index.php">Mail</a></li>
        <li><a href="../assignments/03-thumbnail-upload/index.php">Thumbnail Uploads</a></li>
        <li><a href="../assignments/04-session-mysql/index.php">Sessions MySQLs</a></li>
        <li><a href="../blog/index.php">Blog</a></li>
    </ol>
</main>
<?php
include("../includes/sidebar.php");
include("../includes/footer.php");
?>