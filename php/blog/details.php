<?php

require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';

// create database connection
$conn = dbConnect('read');

// check for article_id in query string
if (isset($_GET['article_id']) && is_numeric($_GET['article_id'])) {
    $article_id = (int) $_GET['article_id'];
} else {
    $article_id = 0;
}

$sql = "SELECT
            title, 
            article, 
            DATE_FORMAT(updated, '%W, %M %D, %Y') AS updated,
            filename, 
            caption
        FROM php_blog_blog 
        LEFT JOIN php_blog_images USING (image_id)
        WHERE php_blog_blog.article_id = $article_id";

$result = $conn->query($sql);
$row = $result->fetch_assoc();


$imageDir = './images/';
if ($row && !empty($row['filename'])) {
    $image = $imageDir . basename($row['filename']);
    if (file_exists($image) && is_readable($image)) {
        $imageSize = getimagesize($image)[3];
    }
}

# Robert's Custom Variable (Do Not Use)
$tools = true;

# The header section of the layout.
include("../includes/header.php");
?>

<main>
    <h2><?php echo $folder_name; ?><span><?php echo $file_name; ?></span></h2>
    <h2>
        <?php if ($row) {
            echo safe($row['title']);
            echo "<span>{$row['updated']}</span>";
        } else {
            echo 'No record found';
        }
        ?>
    </h2>


    <?php if (!empty($imageSize)) { ?>
        <figure>
            <img src="<?= $image ?>" alt="<?= safe($row['caption']) ?>" <?= $imageSize ?>>
            <figcaption><?= safe($row['caption']) ?></figcaption>
        </figure>
    <?php }
    if ($row) {
        echo convertToParas($row['article']);
    } ?>

</main>
<?php
# The side-bar section of the layout use custom path to load from a different folder.
include("sidebar.php");

# The footer section of the layout.
include("../includes/footer.php");
?>