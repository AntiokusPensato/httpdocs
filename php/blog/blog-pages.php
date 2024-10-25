<?php

require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';

// create database connection
$conn = dbConnect('read');

// check for page_id in query string
if (isset($_GET['page_id']) && is_numeric($_GET['page_id'])) {
    $page_id = (int) $_GET['page_id'];
} else {
    $page_id = 0;
}

$sql = "SELECT
            title, 
            page, 
            DATE_FORMAT(updated, '%W, %M %D, %Y') AS updated,
            filename, 
            caption
        FROM php_blog_page 
        LEFT JOIN php_blog_images USING (image_id)
        WHERE php_blog_page.page_id = $page_id";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql = "SELECT
            article_id,
            title, 
            article, 
            DATE_FORMAT(updated, '%W, %M %D, %Y') AS updated,
            filename, 
            caption
        FROM php_blog_blog
        LEFT JOIN php_blog_images USING (image_id)
        ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql) or die(mysqli_error());
$random_post = $result->fetch_assoc();


$imageDir = './images/';
if ($row && !empty($row['filename'])) {
    $image = $imageDir . basename($row['filename']);
    if (file_exists($image) && is_readable($image)) {
        $imageSize = getimagesize($image)[3];
    }
}

// random blog post image
if ($random_post && !empty($random_post['filename'])) {
    $random_image = $imageDir . basename($random_post['filename']);
    if (file_exists($random_image) && is_readable($random_image)) {
        $random_imageSize = getimagesize($random_image)[3];
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
        echo convertToParas($row['page']);
    } ?>

    <hr>

    <article>
        <h2>
            <a href="details.php?article_id=<?php echo $random_post['article_id']; ?>">
                <?php echo $random_post['title']; ?>
            </a>
        </h2>
        <figure>
            <img src="<?= $random_image ?>" alt="<?= safe($random_post['caption']) ?>" <?= $random_imageSize ?>>
            <figcaption><?= safe($random_post['caption']) ?></figcaption>
        </figure>
        <p><?php echo $random_post['article']; ?></p>

    </article>

</main>
<?php
# The side-bar section of the layout use custom path to load from a different folder.
include("sidebar.php");

# The footer section of the layout.
include("../includes/footer.php");
?>