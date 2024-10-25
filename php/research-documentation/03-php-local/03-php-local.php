<?php
include("../../includes/header.php");
?>
<main>
    <h1>Run PHP Locally</h1>

    <h2>Technique 1: Laragon</h2>
    <p><a href="https://laragon.org/why-laragon/">Laragon</a> is a web server package for Windows. It comes with Apache, MySQL, PHP, and other tools for web developers. You need to download and run an installer then you'll have access to the Laragon control panel. Within the control panel you can create projects in php. From the looks of it getting up and running is a simple task. Laragon is also portable so you can run it from a USB drive. If you need to switch between PHP versions for some reason they support multiple versions. The software itself creates virtual hosts for you projects.</p>

    <h2>Technique 2: XAMPP</h2>
    <p><a href="https://www.apachefriends.org/">XAMPP</a> is a free cross-platform web server solution containing Apache, MySQL, PHP, and Perl. They tote an easy to setup environment for running code locally. To begin working with PHP you need to install the package, start Apache and MySQL services and then place your PHP files in an htdocs directory. There is a control panel to manage services with XAMPP. The creators wanted a more simple way to install an Apache web server while having the ability to add things like PHP.</p>

    <h2>Technique 3: WAMP/MAMP/LAMP</h2>
    <p><a href="https://www.geeksforgeeks.org/how-to-install-and-set-up-a-wamp-server/">WAMP,</a> <a href="https://www.mamp.info/en/mac/">MAMP,</a> and <a href="https://ubuntu.com/server/docs/get-started-with-lamp-applications">LAMP</a> stand for (Windows - MacOS - Linux) Apache, MySQL, and PHP. All three are local environment setups for running PHP on your own computer allowing you to test PHP websites and applications without needing a live server.</p>
    <p>All three setups provide a self-contained environment for PHP on your system of choice. This allows you to work offline, test code changes, develop websites, and applications before sending off to a server.</p>    

    <h2>Summary</h2>
    <p>It looks like there are quite a few more ways to set up a local PHP environment then these options here allow you to test and debug PHP without the need for a live server. They give you a controlled environment and remove the need for being connected to the internet. Cons to using these would probably be learning curves for beginners. Without some prior knowledge these may be hard to setup and use. There may be issues with your local environment not mirroring a server environment which would cause compatibility issues. </p>

</main>
<?php
include("../../includes/sidebar.php");
include("../../includes/footer.php");
?>