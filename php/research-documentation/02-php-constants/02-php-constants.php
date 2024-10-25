<?php
include("../../includes/header.php");
?>
<main>
    <h2><?= $folder_name; ?>
        <span><?= $file_name; ?></span>
    </h2>

    <h1>PHP Magic Constants</h1>

    <h2>__LINE__</h2>
    <p>This constant returns the current line number of the file where it was use.</p>
    <div class="demo">
        <p>Demo:</p>
        <pre><?php echo "This is the line number " . __LINE__; ?></pre>
    </div>

    <h2>__FILE__</h2>
    <p>The <code>__FILE__</code> constant returns the path and filename of the file where it is being used. Since it returns the full path this makes it useful in debugging and file management. </p>
    <div class="demo">
        <p>Demo:</p>
        <pre><?php echo "This file is at " . __FILE__; ?></pre>
    </div>

    <h2>__DIR__</h2>
    <p>This shows the file directory. Used in an include the directory of the included file will be returned and a trailing slash is only used when in the root directory.</p>
    <div class="demo">
        <p>Demo:</p>
        <pre><?php echo "Current file is in this directory: " . __DIR__; ?></pre>
    </div>

    <h2>__FUNCTION__</h2>
    <p> The constant <code>__FUNCTION__</code> returns a function name where it is being used. You can include it when handling errors to know exactly where an error occurred. </p>
    <div class="demo">
        <p>Demo:</p>
        <pre><?php function Rabbit()
                {
                    echo "This is my demo function called " . __FUNCTION__;
                }
                Rabbit(); ?></pre>
    </div>

    <h2>Resources</h2>
    <ul>
        <li><a href="https://www.w3schools.com/php/php_magic_constants.asp#:~:text=PHP%20has%20nine%20predefined%20constants,the%20ClassName%3A%3Aclass%20constant."> W3Schools PHP Magic Constants</a></li>
        <li><a href="https://www.geeksforgeeks.org/php-magic-constants/">GeeksforGeeks Magic Constants</a></li>
        <li><a href="https://www.php.net/manual/en/language.constants.magic.php#constant.file">PHP.net Magic Constants</a></li>
    </ul>

</main>
<?php
include("../../includes/sidebar.php");
include("../../includes/footer.php");
?>