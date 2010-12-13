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

$packages = json_decode(file_get_contents(BASE_URL.'packages.json'), true);
ksort($packages);

foreach($packages as $package => $data) {
	echo '<ul>';
	echo '<li>';
	echo htmlspecialchars($package).' - ';
	if (isset($data['description'])) {
		echo htmlspecialchars($data['description']).' - ';
	}
	echo 'Version: '.htmlspecialchars(implode(', ', $data['version'])).'<br>';
	if (isset($data['dependencies'])) {
		echo '<ul>';
		foreach ($data['dependencies'] as $dep => $details) {
			echo '<li>'.htmlspecialchars($details[0]).' - '.htmlspecialchars($details[1]).'</li>';
		}
		echo '</ul>';
	}
	echo '</li>';
	echo '</ul>';
}
?>
</body>
</html>
