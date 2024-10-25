<?php
include("../../includes/header.php");
?>
<main>
    <h2><?= $folder_name; ?>
        <span><?= $file_name; ?></span>
    </h2>
    <ol>
        <li><a href="/php/assignments/04-session-mysql/index.php">Home</a></li>
        <li><a href="/php/assignments/04-session-mysql/01-register.php">Register</a></li>
        <li><a href="/php/assignments/04-session-mysql/02-login.php">Login</a></li>
        <li><a href="/php/assignments/04-session-mysql/02-menu.php">Menu</a></li>
        <li><a href="/php/assignments/04-session-mysql/03-mysqli-integer.php">Integer</a></li>
        <li><a href="/php/assignments/04-session-mysql/04-all-records.php">All Records</a></li>
        <li><a href="/php/assignments/04-session-mysql/04-where.php">Where Clause</a></li>
    </ol>
</main>
<?php
include("sidebar.php");
include("../../includes/footer.php");
?>