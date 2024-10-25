<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php 
			if(isset($title_section)) echo $title_section . " &bull;"; 
			if(isset($title_page_name)) echo ' ' . $title_page_name . ' &bull;';
		?> 
		PHP: Semester 1999
	</title>
	<link rel="stylesheet" href="/php/css/style.css" type="text/css" media="screen">
</head>

<body>
	<div class="wrapper">
		
	<header>
		<a href="/php">
			<h1>
				<?= $title_section; ?>
				<span><?= $title_page_name; ?></span>
			</h1>
		</a>
	</header>
		
		<nav>
			<ul class="menu">
				<li><a <?php if($nav == "final-exam") echo 'class="current"'; ?> href="/php-final-exam/final-exam.php">Final Exam</a></li>
				<li><a href="http://php.net">php.net.</a></li>
				<li>
					<form action="http://php.net/search.php">
						<input name="pattern" placeholder="Search php.net" autocomplete="off" accesskey="p">
					</form>
				</li>
			</ul>
		</nav>