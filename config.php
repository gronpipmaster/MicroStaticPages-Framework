<?php
/**
	This small config
	@return title, basePath, sitePath and pagesPath for your html pages
*/

	define( 'DS', DIRECTORY_SEPARATOR );

	return array(
		'title'=>'Some Site Name',
		'basePath'=>realpath(dirname(__FILE__)).DS,
		'sitePath'=>'/',
	);
	
?>