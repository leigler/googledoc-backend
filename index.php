<!DOCTYPE HTML>
<html>
<head>
<title>Gdoc Backend</title>

<link rel="stylesheet" type="text/css" href="build/style.css">
</head>
<body>


<?php 


$fileIdString = '1EaBo7TwYgl-Jzg9o_UcmP2mFMW5pVpirfRqp3STIxY4';
$developerKey = file_get_contents('build/docs/developerkey.txt');

include 'build/google-doc-backend.php';

the_google_doc($fileIdString, $developerKey);



   ?>

<a class="edit" href="https://docs.google.com/document/d/<?php echo $fileIdString; ?>/edit">
	<div>edit this doc</div>
</a>



</body>
</html>