<?php
function buildFileList($dir, $extensions) {
  if (!is_dir($dir) || !is_readable($dir)) {
	return false;
  } else {
	if (is_array($extensions)) {
	  $extensions = implode('|', $extensions);
	}
	$pattern = "/\.(?:{$extensions})$/i";
	$folder = new DirectoryIterator($dir);
	$files = new RegexIterator($folder, $pattern);
	$filenames = array();
	foreach ($files as $file) {
	  $filenames[] = $file->getFilename();
	}
	natcasesort($filenames);
	return $filenames;
  }
}
$files = buildFileList('./', array('php'));
?>
		<aside>
			<h2>Side Bar</h2>
			
			<?php
			//print_r($files);
			?>
			<nav>
				<ul>
					<?php
					foreach($files as $file) {
						if(strstr($file, '_')) {
							//don't show these files...
						} else {
							$human_name = ucwords(str_replace(array('-'), ' ', basename($file, ".php")));
							if ($human_name == 'Index') $human_name = 'Home: '.$title_section;
							echo "<li><a href=\"$file\">$human_name</a></li>\n\t\t\t\t\t";
						}
					}
					?>
					
				</ul>
			</nav>
		</aside>