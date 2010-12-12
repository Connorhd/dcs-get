<html>
<head>
<title>dcs-get package listing</title>
</head>
<body>
<h1>Package Listing</h1>
<p>This is an up to date list of all packages available for dcs-get, along with their dependencies.</p>

<h2>Packages</h2>
<?php

error_reporting(0);
//error_reporting(E_ALL);

define('BASE_URL', 'http://backus.uwcs.co.uk/dcs-get/');

$packages = json_decode(file_get_contents(BASE_URL.'packages.json'));

$sorted_packages = array();
foreach ($packages as $package => $data) {
	$sorted_packages[$package] = $data;
}
ksort($sorted_packages);

foreach($sorted_packages as $package => $data) {
	echo '<ul>';
	echo '<li>';
	echo "$package - ";
	if (isset($data->description)) {
		echo "$data->description - ";
	}
	echo 'Version: '.implode(', ', $data->version).'<br>';
	if (isset($data->dependencies)) {
		echo '<ul>';
		foreach ($data->dependencies as $dep => $stuff) {
			echo "<li>$stuff[0] - $stuff[1]</li>";
		}
		echo '</ul>';
	}
	echo '</li>';
	echo '</ul>';
}
?>
</body>
</html>
<?php
