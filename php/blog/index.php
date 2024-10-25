<?php

require_once '../includes/connection.php';

/**
 * utility_funcs.php
 * Updated with new functions
 * ch16
 * convertToParas() and getFirst()
 */
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('read');
$sql = "SELECT
            article_id,
            image_id,
            title, 
            article, 
            DATE_FORMAT(created, '%W, %M %D, %Y') AS created_date, 
            filename, 
            caption
        FROM php_blog_blog 
        LEFT JOIN php_blog_images USING (image_id)
        ORDER BY created DESC"; //sorting by created 20xx-xx-xx not the alias

$result = $conn->query($sql);
if (!$result) {
    $error = $conn->error;
}


# Robert's Custom Variable (Do Not Use)
$tools = true;

# The header section of the layout.
include("../includes/header.php");
?>

<main>
    <h2><?php echo $folder_name; ?><span><?php echo $file_name; ?></span></h2>

    <?php if (isset($error)) {
        echo "<p>$error</p>";
    } else {
        while ($row = $result->fetch_assoc()) {
            echo "<h2 class=\"clear\">" . safe($row['title']) . "<span>{$row['created_date']}</span></h2>";
    ?>
            <?php if (!empty($row['filename'])) { ?>

                <img src="/php/blog/images/thumbs/<?= safe($row['filename']) ?>" alt="<?= safe($row['caption']) ?>">


    <?php }
            if ($row) {

                $extract = getFirst($row['article']);
                echo '<p>' . safe($extract[0]);
                if ($extract[1]) {
                    echo '<a href="details.php?article_id=' . $row['article_id'] . '">
                            Read More&hellip;</a>';
                }
                echo '</p>';
            }
        }
    }
    ?>
</main>
<?php
# The side-bar section of the layout use custom path to load from a different folder.
include("sidebar.php");

# The footer section of the layout.
include("../includes/footer.php");
?>