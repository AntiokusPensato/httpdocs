<?php
# Check to see if session is set if not redirect to login page
require_once('../../includes/session_timeout.php');

$tools = true;
include("../../includes/header.php");
?>

<main>
    <h2><?php echo $folder_name; ?><span><?php echo $file_name; ?></span></h2>
    <h2>Restricted area</h2>
    <p><a href="02-secretpage.php">Another secret page</a></p>
    <?php
    include('../../includes/logout.php')
    ?>
</main>
<?php

# The side-bar section of the layout use custom path to load from a different folder.
include("sidebar.php");

# The footer section of the layout.
include("../../includes/footer.php");
?>