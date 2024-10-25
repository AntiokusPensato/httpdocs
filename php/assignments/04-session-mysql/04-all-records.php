<?php
// Database Connection
require_once('../../includes/connection.php');

// Utility Functions
require_once '../../includes/utility_funcs.php';

// Connect to Database Using MySQL
$conn = dbConnect('read');

// Prepare the SQL query
$sql = 'SELECT filename, caption 
FROM php_a04_images
';

// Submit the Query and Capture the Result
$result = $conn->query($sql);

// Check For Database Errors
if (!$result) {
    $error = $conn->error;
} else {
    $numRows = $result->num_rows;
}

$tools = true;
include("../../includes/header.php");
?>

<main>
    <h2><?php echo $folder_name; ?><span><?php echo $file_name; ?></span></h2>
    <?php
    if (isset($error)) {
        echo "<p class=\"error\">$error</p>";
    } else {
        echo "<p class=\"info\">A total of $numRows records were found.</p>";
    }
    ?>

    <figure class="code">
        <pre class="language-sql"><code><?= $sql ?></code></pre>
    </figure>

    <table id="output-sql">
        <tr>
            <th>filename</th>
            <th>caption</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo safe($row['filename']); ?></td>
                <td><?php echo safe($row['caption']); ?></td>
            </tr>
        <?php } ?>
    </table>
</main>
<?php
# The side-bar section of the layout use custom path to load from a different folder.
include("sidebar.php");

# The footer section of the layout.
include("../../includes/footer.php");
?>