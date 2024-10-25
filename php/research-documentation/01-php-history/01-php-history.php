<?php
include("../../includes/header.php");
?>
<main>
    <h2><?= $folder_name; ?>
        <span><?= $file_name; ?></span>
    </h2>
    <h1>PHP History Documentation</h1>
    <h2>Who and Why PHP</h2>
    <p>PHP was created by Rasmus Lerdorf in 1994. At that point it was called PHP Tools or "Personal Home Page Tools". He used it to track visits to his resume. His motivation for creating PHP was to provide an easier server-side scripting language for web devs. Allowing more dynamic web pages with less work.  </p>
    <h2>PHP Environment</h2>
    <p>PHP is a server side language that can be used in a local development environment. You need a web server such as Nginx, a database server such as MySQL, and there are other tools you can add such as Redis.  </p>
    <h2>Usage of PHP on the internet</h2>
    <p>I saw a few percentages thrown out there but PHP is used by roughly 75-80% of all websites on its current version. Version 5 was significantly lower down in the 20% area. WordPress stands out as one of the more popular sites currently using it. Pretty much if you're making websites it's likely that PHP is used.  </p>
    <h2>Summary</h2>
    <p>Starting with simple beginnings PHP has become a world player over the years. Wether you're a Front End or Back End developer having understanding of this language would be in your best interest. Beyond that it seems like it can do some pretty cool things as well as reducing workload.</p>
</main>
<?php
include("../../includes/sidebar.php");
include("../../includes/footer.php");
?>