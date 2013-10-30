<?php
/**
 * File: class.RESTful.php
 * Class: Core Handler for given RESTful URLs
 * Description: The class which handles the detection of the controller and the parameters out of the given URI.
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

class RESTful extends Router {
	private static $__URIOBJECT;
	
	/**
	 * Detect the Request Method of the incomming HTTP Request and slice up the given URI to determind the controller and its parameters.
	 * Note: Fully (static) self-standing Function to make the complete routing. No need to be initiated from the Class Contructor.
	 * @param optional bool $__IS_TO_FULLY_ROUTE : Whether this function should continue to the actual routings or not. (If FALSE, the parent::route is typically NOT to run.)
	 * @param optional string $__REQUESTED_URI : Full HTTP URL to be processed if given.
	 * @param optional string $__REQUESTED_METHOD : Requested HTTP Method to be processed if given.
	 */
	static function route( $__IS_TO_FULLY_ROUTE=TRUE, $__REQUESTED_URI=NULL, $__REQUESTED_METHOD=NULL ) {
		if ( !isset($__REQUESTED_URI) ) $__REQUESTED_URI = $_SERVER['REQUEST_URI'];
		if ( !isset($__REQUESTED_METHOD) ) $__REQUESTED_METHOD = $_SERVER['REQUEST_METHOD'];
		
		$__URI_SEGMENTS = explode( '/', $__REQUESTED_URI );
		array_shift( $__URI_SEGMENTS ); //Note: Slicing the first portion out
		array_shift( $__URI_SEGMENTS ); //Note: Slicing the another first portion out
		
		self::$__URIOBJECT['controller']	= $__URI_SEGMENTS[0];
		
		if ( $__REQUESTED_METHOD == "GET" ) {
			self::$__URIOBJECT['params']	= $__URI_SEGMENTS[1];
		} else if ( $__REQUESTED_METHOD == "POST" ) {
			self::$__URIOBJECT['params']	= $_POST;
		}
		
		self::$__URIOBJECT['segments']		= $__URI_SEGMENTS;
		self::$__URIOBJECT['uri']			= $__REQUESTED_URI;
		self::$__URIOBJECT['method']		= $__REQUESTED_METHOD;

		if ( $__IS_TO_FULLY_ROUTE )
			parent::route( self::$__URIOBJECT );
	}
	/**
	 * Returns the current URI Object which has been processed by the route() function above.
	 * Especially to serve for the direct external calls (Not in used internally itself)
	 * Note: Since this function is especially only to retrieve about the current URIObject, there is NO NEED to do the controller routing processes.
	 * @return array : An array contains the parsed information about the given HTTP request and its URI.
	 */
	static function getURIobject() {
		self::route(FALSE);
		return self::$__URIOBJECT;
	}
	/**
	 * Returns the current Request Method of the URI Object.
	 * Especially to serve for the direct external calls (Not in used internally itself)
	 * @return string : Name of the method of the given HTTP request.
	 */
	static function getMethod() {
		return $_SERVER['REQUEST_METHOD'];
	}
	/**
	 * Returns the Controller Name of the current URI Object which has been processed by the route() function above.
	 * Especially to serve for the direct external calls (Not in used internally itself)
	 * Note: Since this function is especially only to retrieve about the current URIObject, there is NO NEED to do the controller routing processes.
	 * @return string : Name of the current Controller, detected in the URI Object.
	 */
	static function getController() {
		self::route(FALSE);
		return self::$__URIOBJECT["controller"];
	}
	/**
	 * Returns the Parameter(s) given in the current Controller of the URI Object which has been processed by the route() function above.
	 * Especially to serve for the direct external calls (Not in used internally itself)
	 * Note: Since this function is especially only to retrieve about the current URIObject, there is NO NEED to do the controller routing processes.
	 * @return string : Parameter(s) given into the current Controller via the URI.
	 */
	static function getParams() {
		self::route(FALSE);
		return self::$__URIOBJECT["params"];
	}
}
