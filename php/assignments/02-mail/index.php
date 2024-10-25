<?php
# Include the Google reCAPTCHA Library
require_once('../../includes/google-recaptcha-library.php');
$g_recaptcha_key_site = '6Lc7-jUqAAAAACnX6zzUf_nC3HHPq83VEcRdx4Fx';
$g_recaptcha_key_secret = '6Lc7-jUqAAAAAO3gcKafwL_VIQdCcymRbHaQeDk4';
# Add Google reCAPTCHA JavaScript to HTML HEAD
$js_head = '<script src="https://www.google.com/recaptcha/api.js"></script>';

$errors = [];
$missing = [];
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // email processing script
    $to = 'robert@nwtc-web.com';  // use your own email address
    $subject = 'Garden Survey';
    // list expected fields
    $expected = ['name', 'email', 'comments', 'has-garden', 'fav-veg', 'garden-setup', 'terms'];
    $required = ['name', 'email', 'comments', 'has-garden', 'fav-veg', 'garden-setup', 'terms'];
    // set default values for variables that might not exist
    if (!isset($_POST['has-garden'])) {
        $_POST['has-garden'] = '';
    }
    if (!isset($_POST['fav-veg'])) {
        $_POST['fav-veg'] = array();
    }
    
    if (!isset($_POST['terms'])) {
        $_POST['terms'] = '';
        $errors['terms'] = true;
    }
    // minimum number of required check boxes
    $minCheckboxes = 2;
    if (count($_POST['fav-veg']) < $minCheckboxes) {
        $errors['fav-veg'] = true;
    }
    
    // create additional headers
    $headers[] = 'From: Garden Journey<trevor.davis@mymail.nwtc.edu>';
    $headers[] = 'Content-Type: text/plain; charset=utf-8';

    // Place results of g_recaptcha_request() in $g_recaptcha_response
    $g_recaptcha_response = g_recaptcha_request();
    if (!$g_recaptcha_response->success) {
        $errors['recaptcha'] = true;
    }





    # Not loading via include - showing here for demo only...
    // require('processmail_05.php');
    // pattern to locate suspect phrases
    $pattern = '/[\s\r\n]|Content-Type:|Bcc:|Cc:/i';
    // check the submitted email address
    $suspect = preg_match($pattern, $_POST['email']);

    if (!$suspect) {
        foreach ($_POST as $key => $value) {
            // strip whitespace from $value if not an array
            if (!is_array($value)) {
                $value = trim($value);
            }
            if (!in_array($key, $expected)) {
                // ignore the value, it's not in $expected
                continue;
            }
            if (in_array($key, $required) && empty($value)) {
                // required value is missing
                $missing[] = $key;
                $$key = "";
                continue;
            }
            $$key = $value;
        }
    }
    // validate the user's email
    if (!$suspect && !empty($email)) {
        $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($validemail) {
            $headers[] = "Reply-To: $validemail";
        } else {
            $errors['email'] = true;
        }
    }
    $mailSent = false;
    // go ahead only if not suspect, all required fields OK, and no errors
    if (!$suspect && !$missing && !$errors) {
        // initialize the $message variable
        $message = '';
        // loop through the $expected array
        foreach ($expected as $item) {
            // assign the value of the current item to $val
            if (isset($$item) && !empty($$item)) {
                $val = $$item;
            } else {
                // if it has no value, assign 'Not selected'
                $val = 'Not selected';
            }
            // if an array, expand as comma-separated string
            if (is_array($val)) {
                $val = implode(', ', $val);
            }
            // replace underscores in the label with spaces
            $item = str_replace('_', ' ', $item);
            // add label and value to the message body
            $message .= ucfirst($item) . ": $val\r\n\r\n";
        }
        // limit line length to 70 characters
        $message = wordwrap($message, 70);
        // format headers as a single string
        $headers = implode("\r\n", $headers);
        $mailSent = mail($to, $subject, $message, $headers);
        if (!$mailSent) {
            $errors['mailfail'] = true;
        }
    }

    # END: require('processmail_05.php');

    if ($mailSent) {
        header('Location: thank-you.php');
        exit;
    }
} // close: if (isset($_POST['send']))



# Page specific variables.
$nav = "assignments";
$title_section = "02 Mail";

include("../../includes/header.php");
?>
<main>
    <h2><?= $folder_name; ?>
        <span><?= $file_name; ?></span>
    </h2>
    <?php if ($_POST && $suspect) { ?>
        <p class="error">Sorry, your mail could not be sent. Please try later.</p>
    <?php } elseif ($missing || $errors) { ?>
        <p class="error">Please complete the missing item(s) indicated.</p>
    <?php } ?>
    <form id="feedback" method="post">
        <fieldset>
            <legend><?= $file_name; ?></legend>
            <ol>
                <li<?php if ($missing && in_array('name', $missing)) echo ' class="error"'; ?>>
                    <?php if ($missing && in_array('name', $missing)) { ?>

                        <strong>Please enter your name</strong>
                    <?php } ?>

                    <label for="name">Name:</label>
                    <input name="name" id="name" type="text" class="formbox" <?php
                                                                                if (isset($name)) {
                                                                                    echo ' value="' . htmlentities($name) . '"';
                                                                                } ?>>
                    </li>
                    <li<?php if (($missing && in_array('email', $missing)) || (isset($errors['email']))) echo ' class="error"'; ?>>
                        <?php if ($missing && in_array('email', $missing)) { ?>

                            <strong>Please enter your email</strong>
                        <?php } elseif (isset($errors['email'])) { ?>

                            <strong>Invalid email address</strong>
                        <?php } ?>

                        <label for="email">Email:</label>
                        <input name="email" id="email" type="text" class="formbox" <?php
                                                                                    if (isset($email)) {
                                                                                        echo ' value="' . htmlentities($email) . '"';
                                                                                    } ?>>
                        </li>
                        <li<?php if ($missing && in_array('comments', $missing)) echo ' class="error"'; ?>>
                            <?php if ($missing && in_array('comments', $missing)) { ?>

                                <strong>Tell us about your gardening experience</strong>
                            <?php } ?>

                            <label for="comments">Comments:</label>
                            <textarea name="comments" id="comments" cols="60" rows="8"><?php
                                                                                        if (isset($comments)) {
                                                                                            echo htmlentities($comments);
                                                                                        } ?></textarea>
                            </li>
                            <li<?php if ($missing && in_array('has-garden', $missing)) echo ' class="error"'; ?>>

                                <?php if ($missing && in_array('has-garden', $missing)) { ?>

                                    <strong>Please select whether you have a garden or not.</strong>
                                <?php } ?>

                                <label>Do you have a garden?</label>
                                <label for="has-garden-yes">
                                    <input name="has-garden" type="radio" value="Yes" id="has-garden-yes" <?php
                                                                                                        if ($_POST && $_POST['has-garden'] == 'Yes') {
                                                                                                            echo ' checked';
                                                                                                        } ?>>
                                    Absolutely!
                                </label>

                                <label for="has-garden-no">
                                    <input name="has-garden" type="radio" value="No" id="has-garden-no" <?php
                                                                                                        if ($_POST && $_POST['has-garden'] == 'No') {
                                                                                                            echo ' checked';
                                                                                                        } ?>>
                                    Never!
                                </label>
                                </li>
                                <li<?php if (isset($errors['fav-veg'])) echo ' class="error"'; ?>>

                                    <?php if (isset($errors['fav-veg'])) { ?>

                                        <strong>Please select at least <?php echo $minCheckboxes; ?> favorite vegetables</strong>
                                    <?php } ?>

                                    <label>Favorite Vegetables</label>
                                    <label for="beets">
                                        <input type="checkbox" name="fav-veg[]" value="Beets" id="beets" <?php
                                                                                                                    if ($_POST && in_array('Beets', $_POST['fav-veg'])) {
                                                                                                                        echo ' checked';
                                                                                                                    } ?>>
                                        Beets
                                    </label>

                                    <label for="broccoli">
                                        <input type="checkbox" name="fav-veg[]" value="Broccoli" id="broccoli" <?php
                                                                                                                    if ($_POST && in_array('Broccoli', $_POST['fav-veg'])) {
                                                                                                                        echo ' checked';
                                                                                                                    } ?>>
                                        Broccoli
                                    </label>

                                    <label for="cabbage">
                                        <input type="checkbox" name="fav-veg[]" value="Cabbage" id="cabbage" <?php
                                                                                                                        if ($_POST && in_array('Cabbage', $_POST['fav-veg'])) {
                                                                                                                            echo ' checked';
                                                                                                                        } ?>>
                                        Cabbage
                                    </label>

                                    <label for="carrots">
                                        <input type="checkbox" name="fav-veg[]" value="Carrots" id="carrots" <?php
                                                                                                                            if ($_POST && in_array('Carrots', $_POST['fav-veg'])) {
                                                                                                                                echo ' checked';
                                                                                                                            } ?>>
                                        Carrots
                                    </label>

                                    <label for="onions">
                                        <input type="checkbox" name="fav-veg[]" value="Onions" id="onions" <?php
                                                                                                                            if ($_POST && in_array('Onions', $_POST['fav-veg'])) {
                                                                                                                                echo ' checked';
                                                                                                                            } ?>>
                                        Onions
                                    </label>

                                    <label for="potatoes">
                                        <input type="checkbox" name="fav-veg[]" value="Potatoes" id="potatoes" <?php
                                                                                                                if ($_POST && in_array('Potatoes', $_POST['fav-veg'])) {
                                                                                                                    echo ' checked';
                                                                                                                } ?>>
                                        Potatoes
                                    </label>
                                    </li>

                                    <li<?php if ($missing && in_array('garden-setup', $missing)) echo ' class="error"'; ?>>

                                        <?php if ($missing && in_array('garden-setup', $missing)) { ?>

                                            <strong>Please make a selection</strong>
                                        <?php } ?>

                                        <label for="garden-setup">How is your garden setup?</label>
                                        <select name="garden-setup" id="garden-setup">
                                            <option value="" <?php
                                                                if (!$_POST || $_POST['garden-setup'] == '') {
                                                                    echo ' selected';
                                                                } ?>>Select one</option>
                                            <option value="in-ground" <?php
                                                                    if ($_POST && $_POST['garden-setup'] == 'In the ground') {
                                                                        echo ' selected';
                                                                    } ?>>In the ground</option>
                                            <option value="raised-beds" <?php
                                                                                    if ($_POST && $_POST['garden-setup'] == 'Raised beds') {
                                                                                        echo ' selected';
                                                                                    } ?>>Raised beds</option>
                                            <option value="other" <?php
                                                                            if ($_POST && $_POST['garden-setup'] == 'Something else') {
                                                                                echo ' selected';
                                                                            } ?>>Something else</option>
                                        </select>
                                        </li>

                                            <li<?php if (isset($errors['terms'])) echo ' class="error"'; ?>>
                                                <?php if (isset($errors['terms'])) { ?>
                                                    <strong>Please select the check box</strong>
                                                <?php } ?>

                                                <label for="terms">
                                                    <input type="checkbox" name="terms" value="accepted" id="terms" <?php
                                                                                                                    if ($_POST && !isset($errors['terms'])) {
                                                                                                                        echo ' checked';
                                                                                                                    } ?>>
                                                    I accept the terms of using this website
                                                </label>
                                                </li>
                                                <li<?php if (isset($errors['recaptcha'])) echo ' class="error"'; ?>>
                                                    <?php if (isset($errors['recaptcha'])) { ?>

                                                        <strong>Incorect Response</strong>
                                                    <?php }
                                                    echo "<label>Answer Challenge Question</label>";
                                                    echo g_recaptcha_get_form_control(); ?>

                                                    </li>
                                                    <li>
                                                        <input name="send" id="send" type="submit" value="Send message">
                                                    </li>
            </ol>
        </fieldset>
    </form>

    <h2>Debug Code</h2>
    <pre class="line-numbers">
<code class="language-php">
<?php if ($_POST && $mailSent) {
    echo "Message body\n\n";
    echo htmlentities($message) . "\n";
    echo "Headers\n\n";
    echo htmlentities($headers);
} ?>
</code>
</pre>


    <h2>Debug Code</h2>
    <pre class="line-numbers">
<code class="language-php">
<?php if ($_POST) {
    echo '$_POST: ';
    print_r($_POST);
} ?>
    
<?php if ($errors) {
    echo '$errors: ';
    print_r($errors);
} ?>
    
<?php if ($missing) {
    echo '$missing: ';
    print_r($missing);
} ?>

<?php if (isset($expected)) {
    echo '$expected: ';
    print_r($expected);
} ?>

<?php if (isset($name)) echo '$name: ' . $name; ?>

<?php if (isset($email)) echo '$email: ' . $email; ?>

<?php if (isset($comments)) echo '$comments: ' . $comments; ?>
    
<?php if (isset($g_recaptcha_response->success)) echo '$g_recaptcha_response->success: ' . $g_recaptcha_response->success; ?>

<?php if (isset($g_recaptcha_response)) echo 'var_dump($g_recaptcha_response): ' . var_dump($g_recaptcha_response); ?>

</code>
</pre>

</main>
<?php
include("../../includes/sidebar.php");
include("../../includes/footer.php");
?>