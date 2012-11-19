<?php
/*
	This small config
	@return title
*/

define( 'DS', DIRECTORY_SEPARATOR );
define( 'BASEPATH', realpath(dirname(__FILE__)).DS );

$config = new stdClass;
$config->title = 'Some Site Name';

return $config;