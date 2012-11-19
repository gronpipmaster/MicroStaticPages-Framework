<?php
/**
	This easy dinamic connects pages
	@return page reale path and prefix page
	example /someSitePath/pages/home.html
	create new page in /someSitePath/pages/example.html and your will new url = '/pages/example'
*/

class App {

	public $page, $prefix, $isHomePage;

	public function __construct(){

		$pathToPages = realpath( dirname(__FILE__) )  . DIRECTORY_SEPARATOR  . 'pages' . DIRECTORY_SEPARATOR;

		if( $_SERVER['REQUEST_URI'] == '/' ) {
			$page = $pathToPages  . 'home.html';

			$prefix = 'main-page';
			$isHomePage = true;

		} else {
			$requestURI = explode( '/', $_SERVER['REQUEST_URI'] );
			$scriptName = explode( '/', $_SERVER['SCRIPT_NAME'] );


			foreach( $scriptName as $key=>$item )
				if( $requestURI[$key ] == $scriptName[ $key ] )
					unset( $requestURI[ $key ] ) ;

			$command = array_values( $requestURI );

			$page = DIRECTORY_SEPARATOR  . implode( DIRECTORY_SEPARATOR  , $command ) . '.html';

			$page = realpath( dirname(__FILE__) ) . $page;

			if( !is_file( $page ) ) {
				header('Status: 404 Not Found');
				$page = $pathToPages  . '404.html';
			}

			$prefix = 'other';
			$isHomePage = false;
		}

		$this->page = $page;
		$this->prefix = $prefix;
		$this->isHomePage = $isHomePage;
	}
}
