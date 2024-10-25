<?php ini_set("date.timezone", "America/Chicago");
require_once('_connection.inc.php');
$conn = dbConnect('read');

$sql = 'SELECT * FROM images_fe
        ORDER BY caption DESC';
$result = $conn->query($sql) or die(mysqli_error());
$numRows = $result->num_rows;


$sql2 ='SELECT * FROM images_fe
		ORDER BY RAND() LIMIT 1';
$result2 = $conn->query($sql2) or die(mysqli_error());
$random_img = $result2->fetch_assoc();



if(isset($_POST['send'])) {
	$errors = array();
	if($_POST['name'] == "") {
		$errors['name'] = "Please Enter Your Name.";
	} else {
		$name = $_POST['name'];
	}
	
	if($_POST['email'] == "") {
		$errors['email'] = "Please Enter Your Email.";
	} else {
		$email = $_POST['email'];
	}
	
	if($_POST['comments'] == "") {
		$errors['comments'] = "Please Enter Your Comments.";
	} else {
		$comments = $_POST['comments'];
	}

	if (!empty($_POST['email'])) {
	  $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	  if (!$validemail) {
		$errors['email-nv'] = "Please Enter a Valid Email";
	  }
	}	
	if(empty($errors)) header("Location: final-exam.php");
}


$nav = "final-exam";
$title_section = "PHP";


include("_title-page-name.php");
include("_header.php");
?>

		<main>
			<h2><?php echo $title_section; ?><span><?php echo $title_page_name; ?></span></h2>
			
			<p>A total of <?php echo $numRows; ?> records were found.</p>
			<table>
			  <tr>
			    <th>image_id</th>
			    <th>filename</th>
			    <th>caption</th>
			  </tr>
			<?php while ($row = $result->fetch_assoc()) { ?>
			  <tr>
			    <td><?php echo $row['image_id']; ?></td>
			    <td><?php echo $row['filename']; ?></td>
			    <td><?php echo $row['caption']; ?></td>
			  </tr>
			<?php } ?>
			</table>
			
			<figure>
				<img src="images/<?php echo $random_img['filename']; ?>" alt="<?php echo $random_img['caption']; ?>">
				<figcaption><?php echo $random_img['caption']; ?></figcaption>
			</figure>
			
			<?php
			if(isset($errors)) {
				echo "<h2>Please Fix the Following Errors</h2>";
				echo "<ul>";
				foreach($errors as $error) {
					echo "<li class=\"error\">$error</li>";
				}
				echo "</ul>";
			}
			?>
			<form id="feedback" method="post">
				<fieldset>
					<legend><?php echo $title_page_name; ?></legend>
					<ol>
						<li<?php if (isset($errors['name'])) echo ' class="error"'; ?>>
							<label for="name">Name:</label>
							<input name="name" id="name" type="text" class="formbox"
							<?php if (isset($name)) { 
			                 echo 'value="' . htmlentities($name, ENT_COMPAT, 'UTF-8') . '"';
			                } ?>>
						</li>
						<li<?php if (isset($errors['email']) || isset($errors['email-nv'])) echo ' class="error"'; ?>>
							<label for="email">Email:</label>
							<input name="email" id="email" type="text" class="formbox"
							<?php if (isset($email)) { 
			                 echo 'value="' . htmlentities($email, ENT_COMPAT, 'UTF-8') . '"';
			                } ?>>
						</li>
						<li<?php if (isset($errors['comments'])) echo ' class="error"'; ?>>
							<label for="comments">Comments:</label>
							<textarea name="comments" id="comments" cols="60" rows="8"><?php
							if (isset($comments)) {
								echo htmlentities($comments, ENT_COMPAT, 'UTF-8');
							} ?></textarea>
						</li>
						<li>
							<input name="send" id="send" type="submit" value="Send message">
						</li>	
					</ol>
				</fieldset>
			</form>
		</main>

<?php
include("_side-bar.php");
include("_footer.php");
?>