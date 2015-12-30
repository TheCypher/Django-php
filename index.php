<?php
	error_reporting(-1);
	ini_set('display_errors', 'On');
	include'vendor/autoload.php';
	use Django\Start\Start;

	$start = new Start();
	$start->load("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
?>