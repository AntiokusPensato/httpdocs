<?php
// run this script only if the logout button has been clicked
if (isset($_POST['logout'])) {
    // empty the $_SESSION array
    $_SESSION = array();
    // invalidate the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    // end session and redirect
    session_destroy();

    header('Location: https://tdavis.bitweb1.nwtc.edu/php/assignments/04-session-mysql/02-login.php');
    exit;
}
?>
<form method="post">
    <input name="logout" type="submit" value="Log out">
</form>