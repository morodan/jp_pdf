<?php
session_start();
$_SESSION['m'] = '';
$content = $_POST['html'];

//echo($content);

$t = time();

$fp = fopen('tmp/' . $t . '.html', 'w');
fwrite($fp, $content);
fclose($fp);

$res = exec("phantomjs convert.js $t");

if ($res == 'success') {
	$_SESSION['m'] = $t;
	echo $t;
	/*
	$file = "tmp/$t.pdf";
	header('Content-type: application/pdf');
	header('Content-Disposition: attachment; filename="Our download.pdf"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($file));
	header('Accept-Ranges: bytes');
	@readfile($file);
	*/
	unlink('tmp/' . $t . '.html');
	//unlink($file);
} else {
	// problem - no pdf generated...
	// we will remove the file
	unlink('tmp/' . $t . '.html');

}