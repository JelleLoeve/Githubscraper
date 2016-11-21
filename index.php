<?php

	require 'vendor/autoload.php';
	use Philo\Blade\Blade;
	$views = __DIR__ . '/views';
	$cache = __DIR__ . '/cache';
	$blade = new Blade($views, $cache);
	
	// load an html page
	$url = "https://github.com/petersnoek";
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 
	$html = curl_exec($curl);
	$error = curl_error($curl);

	var_export($html);
	die($error);
	
	echo $blade->view()->make('index')->with('html', $html)->render();

?>