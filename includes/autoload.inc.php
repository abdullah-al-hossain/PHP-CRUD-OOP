<?php 
	
	spl_autoload_register('myAutoLoader');

	function myAutoLoader($className) {
		$path = 'classes/';
		$extension = '.class.php';

		$fileName = $path.$className.$extension;

		if (!file_exists($fileName)) {
			return false;
		}
		require_once $fileName;
	}
 ?>