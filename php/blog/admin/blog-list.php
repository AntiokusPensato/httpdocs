<?php

# Source: php-7-solutions/ch15/blog_list_norec_mysqli.php

require_once '../../includes/session_timeout_db.php';
require_once '../../includes/connection.php';
require_once '../../includes/utility_funcs.php';

// create database connection
$conn = dbConnect('read');

$sql = 'SELECT * FROM php_blog_blog ORDER BY created DESC';

$result = $conn->query($sql);

if (!$result) {
    $error = $conn->error;
} else {
    ###################################
    # Get the number of records found #
    ###################################
    $numRows = $result->num_rows;
}


$tools = true;
# The header section of the layout.
include("../../includes/header.php");
?>
<main>
    <h2><?php echo $folder_name; ?><span><?php echo $file_name; ?></span></h2>
    <p><a href="blog-insert.php">Insert new entry</a></p>
    <?php
    #######################################
    # Display message if no records found #
    #######################################
    if ($numRows == 0) {
    ?>
        <p>No records found</p>
    <?php
        ##################################
        # Otherwise, display the results #
        ##################################
    } else {
        if (isset($_GET['updated'])) {
            echo '<p class="info">Record updated</p>';
        }
    ?>
        <table>
            <tr>
                <th scope="col">Created</th>
                <th scope="col">Title</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['created']; ?></td>
                    <td><?= safe($row['title']); ?></td>
                    <td><a href="blog-update.php?article_id=<?= $row['article_id']; ?>">EDIT</a></td>
                    <td><a href="blog-delete.php?article_id=<?= $row['article_id']; ?>">DELETE</a></td>
                </tr>
            <?php } ?>
        </table>
      
    <?php
        ####################################################
        # Close the else clause wrapping the results table #
        ####################################################
    }
    ?>

<?php

$sql = 'SELECT * FROM php_blog_page ORDER BY created DESC';

$result = $conn->query($sql);

if (!$result) {
    $error = $conn->error;
} else {
    ###################################
    # Get the number of records found #
    ###################################
    $numRows = $result->num_rows;
}

?>
    <h2>Blog Pages</h2>
    <p><a href="blog-page-insert.php">Insert new entry</a></p>
    <?php
    #######################################
    # Display message if no records found #
    #######################################
    if ($numRows == 0) {
    ?>
        <p>No records found</p>
    <?php
        ##################################
        # Otherwise, display the results #
        ##################################
    } else {
        if (isset($_GET['updated'])) {
            echo '<p class="info">Record updated</p>';
        }
    ?>
        <table>
            <tr>
                <th scope="col">Created</th>
                <th scope="col">Title</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['created']; ?></td>
                    <td><?= safe($row['title']); ?></td>
                    <td><a href="blog-page-update.php?page_id=<?= $row['page_id']; ?>">EDIT</a></td>
                    <td><a href="blog-page-delete.php?page_id=<?= $row['page_id']; ?>">DELETE</a></td>
                </tr>
            <?php } ?>
        </table>
      
    <?php
        ####################################################
        # Close the else clause wrapping the results table #
        ####################################################
    }
    ?>



    <?php include('../../includes/logout_db.php'); ?>
</main>

<?php
# The side-bar section of the layout use custom path to load from a different folder.
include("sidebar.php");

# The footer section of the layout.
include("../../includes/footer.php");
?>