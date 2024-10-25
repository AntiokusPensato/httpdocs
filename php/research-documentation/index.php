<?php
include("../includes/header.php");
?>
<main>
    <h2><?= $folder_name; ?>
        <span><?= $file_name; ?></span>
    </h2>
    <ol>
        <li><a href="../research-documentation/01-php-history/01-php-history.php">PHP History</a></li>
        <li><a href="../research-documentation/02-php-constants/02-php-constants.php">PHP Constants</a></li>
        <li><a href="../research-documentation/03-php-local/03-php-local.php">Local PHP</a></li>
        <li><a href="../research-documentation/04-mysql/04-mysql.php">MySQL</a></li>
        <li><a href="../research-documentation/05-php-08/05-php-08.php">PHP 8 Features</a></li>
        <li><a href="../research-documentation/06-php-frameworks/06-php-frameworks.php">PHP Frameworks</a></li>
    </ol>
</main>
<?php
include("../includes/sidebar.php");
include("../includes/footer.php");
?>