<?php

use php\PhpSolutions\Authenticate\CheckPassword;

require_once __DIR__ . '/../PhpSolutions/Authenticate/CheckPassword.php';
$usernameMinChars = 6;
$formErrors = [];
if (strlen($username) < $usernameMinChars) {
    $formErrors[] = "Username must be at least $usernameMinChars characters.";
}
if (!preg_match('/^[-_\p{L}\d]+$/ui', $username)) {
    $formErrors[] = 'Only alphanumeric characters, hyphens, and underscores are permitted in username.';
}
if ($password != $retyped) {
    $formErrors[] = "Your passwords don't match.";
}
$checkPwd = new CheckPassword($password, minNums: 2, minSymbols: 1);
$errors = array_merge($formErrors, $checkPwd->getErrors());
if (!$errors) {
    // hash password using default algorithm
    $password = password_hash($password, PASSWORD_DEFAULT);
    // include the connection file
    require_once 'connection.php';
    $conn = dbConnect('write');
    // prepare SQL statement
    $sql = 'INSERT INTO php_blog_users (username, pwd) VALUES (?, ?)';
    $stmt = $conn->stmt_init();
    try {
        $stmt->prepare($sql);
        // bind parameters and insert the details into the database
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $success = htmlentities($username) . ' has been registered. You may now <a href="/php/blog/admin/blog-login.php">log in</a>.';
        }
    } catch(Exception $e) {
        if ($stmt->errno == 1062) {
            $errors[] = htmlentities($username) . ' is already in use. Please choose another username.';
        } else {
            $errors[] = $stmt->error;   
        } 
    }
}