<?php
/**
*
* Main setup file. This file checks all the config settings and set everything up. 
* 
*/
function setReporting() {
	if( DEVELOPMENT_ENVIRONEMNT === true ) {

		error_reporting( E_ALL );
		ini_set( 'display_errors' , 'On');

	} else {

		error_reporting( E_ALL );
		ini_set( 'display_errors', 'Off');
		ini_set( 'log_errors', 'On' );
		ini_set( 'error_log' . ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log' );

	}
}

/**
*
* Check for magic Quotes and remove them if the exists
*
*/
function stripSlashesDeep( $value ) {

	$value = is_array( $value ) ? array_map( 'stripSlashesDeep' , $value ) : stripcslashes( $value );
	return $value;

}

function removeMagicQuotes() {

	if( get_magic_quotes_gpc() ) {
		$_GET 		= stripSlashesDeep( $_GET );
		$_POST 		= stripSlashesDeep( $_POST );
		$_COOKIE 	= stripSlashesDeep( $_COOKIE );
	}

}

/**
*
* Check for register globals and reomve them if they exists
*
*/
function unregisterGlobal() {

	if( ini_get( 'register_globals' ) ) {
		$array = array( '_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILEs'  );
		foreach ($array as $value) {
			foreach ($GLOBALS[$value] as $key => $var) {
				if( $var === $GLOBALS[$key] ) {
					unset( $GLOBALS[$Key] );
				}
			}
		}
	}

}

/**
*
* Main call function, this handles all the controller and models requests
*
*/
function callHook() {
	global $url;
	if( !isset( $url ) ) {

		$controller = DEFAULT_CONTROLLER . 'Controller';
		$dispatch = new $controller( DEFAULT_METHOD );

		if( (int)method_exists($controller, DEFAULT_METHOD ) ) {
			call_user_func_array( array( $dispatch, DEFAULT_METHOD ),  array() );
		} else {	
			
		}	
	}else {

		$urlArray = array();
		$urlArray = explode( "/", $url );

		$controller = $urlArray[0];
		array_shift( $urlArray );
		$action = @$urlArray[0];
		array_shift( $urlArray );
		$queryString = $urlArray;

		$controllerName = $controller;
		$controller = ucwords( $controller );
		$model = rtrim( $controller, 's' );
		$controller .= 'Controller';

		if( $action === null ){
			$action = DEFAULT_METHOD;
		}

		

		if( (int)method_exists($controller, $action) ) {

			$dispatch = new $controller( $model, $controllerName, $action );

			call_user_func_array( array( $dispatch, $action ), $queryString );
		} else {
			
			//header( "Location: 404.php" );
		}	
	}
	
}

/**
* 
* Autoload all the classes that needs to be required
*
*/
function __autoload( $className ) {	

	if( file_exists( ROOT . DS . 'lib' . DS . strtolower( $className ) . '.class.php' ) ) {
		require_once( ROOT . DS . 'lib' . DS . strtolower( $className ) . '.class.php' );
	} else if ( file_exists( ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower( $className ) . '.php') ) {
        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower( $className ) . '.php' );
    } else if ( file_exists ( ROOT . DS . 'application' . DS . 'models' . DS . strtolower( $className ) . '.php' ) ) {
        require_once( ROOT . DS . 'application' . DS . 'models' . DS . strtolower( $className ) . '.php' );
    } else {

    }
}
setReporting();
removeMagicQuotes();
unregisterGlobal();
callHook();