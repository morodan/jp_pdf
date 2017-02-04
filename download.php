<?php
session_start();
$m = $_SESSION['m'];
$t = strip_tags(trim($_GET['t']));

if ($m != $t) {
	echo "Missing file!!!";
	@unlink("tmp/$t.pdf");
	die();
}

$file = "tmp/$t.pdf";
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="Our download.pdf"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
@readfile($file);
//unlink('tmp/' . $t . '.html');
unlink($file);
