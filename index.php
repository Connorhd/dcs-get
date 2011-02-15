<!DOCTYPE html>

<html>
<head>
<title>dcs-get</title>
</head>
<body>
<h1>dcs-get</h1>
<h2>Installation</h2>
<p>To update simply replace all previous dcs-get code in your .bashrc with the latest code available here.</p>
<p>Add to .bashrc:</p>
<pre>
<?php
	include("bashrc");
?>
</pre>
<p>You can view the available packages <a href="package.php">here</a>,</p>

<h2>Packaging</h2>
<p>To package git version 1.2.3 you would run the following commands (may need altering, comments in brackets):</p>
<pre>
wget http://theinternet/git-1.2.3.tar.gz (i.e. download the source for your package)
tar zxf git-1.2.3.tar.gz (extract the source)
cd git-1.2.3 (go to the source directory)
./configure --prefix=/var/tmp/dcs-get/git-1.2.3 (configure for installation in appropriate folder under /var/tmp/dcs-get)
make
make install
dcs-get gensymlinks git-1.2.3 (generate symlinks in bin and lib for the package, may need to be done manually for some things)
dcs-get package git-1.2.3 (build a .tar.gz for the folder and any files linked from bin or lib)
</pre>
<p>You now have a file in /var/tmp/dcs-get/downloaded which can be uploaded to backus as a package!</p>

<h2>Tab Competion</h2>
Add to .bashrc
<pre>
<?php
	include("tabcomplete");
?>
</pre>

<h2>Using dcs-get in .xsession</h2>
<p>If you want to use dcs-get in your .xsession file (for instance, to preload packages when you log in) you need to make a couple of changes. First off, you need to add "#!/bin/bash" (without quotes) to the top of your .xsession file. Also, you must remove part of the first "if" statement, so that it reads "if [[ ! -n "$SSH_TTY" ]]".</p>

<h2>Submitting Packages</h2>

<p> 
From this form, you can submit your packages for inspection and inclusion in dcs-get.<br>
Select the file you wish to submit, and click Upload.
</p>
<form action="uploader.php" method="post" enctype="MultiPart/Form-Data" name="form1" id="form1">
<input type="file" name="foo" id="foo">
<input type="submit" name="upload" id="upload" value="Upload">
</form>

<h2>Todo</h2>
<ul>
<li>Request option</li>
</ul>
</body>
</html>
