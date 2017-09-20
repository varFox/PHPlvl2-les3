<?php
include_once 'inc/view.php';

function excess($files) {
	$result = array();
	for ($i = 0; $i < count($files); $i++) { 
		if ($files[$i] != '.' && $files[$i] != '..' && preg_match('/.jpg/u', $files[$i])) { // && $files[$i] == 'jpg'
			$result[] = $files[$i];
		}
	}
//	print_r($result);
	return $result;
}

$dir = 'img/';
$files = scandir($dir);
$files = excess($files);
$gallary = '';

for ($i = 0; $i < count($files); $i++) { 
	 $gallary .= view('templates/fotogallary.php', array('param' => $files[$i]));
	// echo $gallary;
}

$page = view('templates/base.php', array('title' => 'Фотогаллерея', 'gallary' => $gallary));

echo $page;