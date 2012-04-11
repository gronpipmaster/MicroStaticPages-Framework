<?php
	/**
		This easy dinamic connects pages
		@return page reale path and prefix page
		example /someSitePath/pages/home.html
		creat new page in /someSitePath/pages/example.html and your will new url = '/pages/example'
	*/
	if( $_SERVER['REQUEST_URI'] == '/' ) {
		$page = realpath( dirname(__FILE__) )  . DIRECTORY_SEPARATOR  . 'pages' . DIRECTORY_SEPARATOR  . 'home.html';
		$preff = 'main-page';
	} else {
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
		
		$preff = 'other';
		foreach( $scriptName as $key=>$item )
			if( $requestURI[$key ] == $scriptName[ $key ] )
				unset( $requestURI[ $key ] ) ;

		$command = array_values( $requestURI );
		$page = DIRECTORY_SEPARATOR  . implode( DIRECTORY_SEPARATOR  , $command ) . '.html';

		$page = realpath( dirname(__FILE__) ) . $page;

		if( !is_file( $page ) ) {
			header("Status: 404 Not Found");
			$page = realpath( dirname(__FILE__) )  . DIRECTORY_SEPARATOR  . 'pages' . DIRECTORY_SEPARATOR  . '404.html';
		}
	}
	
	$router = new stdClass;
	$router->page = $page;
	$router->preff = $preff;
	
	return $router;
	