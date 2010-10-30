<?php

echo "<h1>Welcome to the dcs-get Package Submission Form</h1>";

echo "From this form, you can submit your packages for inspection and inclusion in dcs-get.<br>
Select the file you wish to submit, and click Submit! :)";

echo '
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="uploader.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="file" name="my_file" id="my_file" /><br><br>
<input type="submit" name="upload" id="upload" value="Upload" />
</form>
</body>
';

$local_directory=dirname(__FILE__).'/local_files/';
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_URL, 'http://backus.uwcs.co.uk/uploader.php' );
	//most importent curl assues @filed as file field
    $post_array = array(
        "my_file"=>"@".$local_directory,
        "upload"=>"Upload"
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array); 
    $response = curl_exec($ch);
	echo $response;
