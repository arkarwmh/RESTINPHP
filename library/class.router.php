<?php
/**
 * File: class.router.php
 * Class: Core Controller Routing Class
 * Description: Core handler to find the route of the Routed RESTful URIs to reach to the responsible Controller Files.
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

class Router {
	/**
	 * Start finding the route to the given controller file and decide which is valid or not. And get the controller involved.
	 * @param string $__CONTROLLER : The name of the controller to be routed properly.
	 */
	static function route($__URI_OBJECT) {
		$__CONTROLLER = $__URI_OBJECT['controller'];
		if ( $__CONTROLLER == "" ) $__CONTROLLER = __DEFAULT_CONTROLLER;
		$__LOCATION = self::findroute( $__CONTROLLER );
		
		if ( $__LOCATION == "" ) {
			$__CONTROLLER = "404";
			$__LOCATION		= self::findroute( $__CONTROLLER );
			
		} else if ( !file_exists( 'controllers/'. $__LOCATION . '/' .$__CONTROLLER . '.php' ) ) {
			$__CONTROLLER	= __DEFAULT_CONTROLLER;
			$__LOCATION		= self::findroute( $__CONTROLLER );
		}
		
		include( 'controllers/' . $__LOCATION . '/' . $__CONTROLLER . '.php' );
	}
	/**
	 * Finds the physical route to the given controller file by searching inside the global __CONTROLLERS_DIRECTORY array.
	 * And return the located directory name upon finding.
	 * @param string $__CONTROLLER : The name of the controller to be routed properly.
	 * @return string : The name of the physical directory where the controller file is located.
	 */
	private static function findroute($__CONTROLLER) {
		$__CONTROLLERS_DIRECTORY = unserialize( __CONTROLLERS_DIRECTORY );
		
		for ( $i=0; $i<count($__CONTROLLERS_DIRECTORY); $i++ ) {
			if ( $__CONTROLLERS_DIRECTORY[$i][1] == strtolower( trim( $__CONTROLLER ) ) ) {
				return $__CONTROLLERS_DIRECTORY[$i][0];
			}
		}
	}
}
