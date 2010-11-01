<?php 
$upload_directory=dirname(__FILE__).'/uploads/';
ini_set("post_max_size", "30M");
ini_set("upload_max_filesize", "30M");
ini_set("memory_limit", "40M");

if (isset($_POST['upload'])) {  
    if (!empty($_FILES['foo'])) { 
    		if ($_FILES['foo']['error'] > 0) { 
            echo "Error: " . $_FILES["foo"]["error"]."\n" ;
        } else {
			move_uploaded_file($_FILES['foo']['tmp_name'], 
			$upload_directory . $_FILES['foo']['name']);	
			echo 'Uploaded File.'."\n";
        }
    } else {
	        echo "Massive Fail.\n";
		die('File not uploaded.'); 
			// exit script
    }
}
else 
{ echo 'Something broke. Hurt the person responsible.'."\n";}
?>
