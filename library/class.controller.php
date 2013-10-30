<?php
/**
 * File: class.controller.php
 * Class: The core Controller handling & rendering Class
 * Description: Core handler for the final renderings of its 'extended' controller outputs to the Templates (Views).
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

class Controller {
	public static $__TEMPLATES = array();
	
	function __ADD_TEMPLATE( $__NEW_TEMPLATE ) {
		$this->__TEMPLATES[] = $__NEW_TEMPLATE;
	}
	function __GET_TEMPLATES() {
		return $this->__TEMPLATES;
	}
	/**
	 * Main function which renders out the associated Template Files of a given Controller by also attaching the associated $variables defined.
	 * @param array $__ALL_VARS : Array of all the defined $variables from the Controller.
	 */
	function render( $__ALL_VARS ) {
		extract( self::setVars( $__ALL_VARS ), EXTR_SKIP );
		foreach ( self::__GET_TEMPLATES() as $__TPL ) include( __DEFAULT_TEMPLATEPATH . '/templates/' . $__TPL );
	}
	/**
	 * Function to transform the System generated Array() Object of the $variables into the more understandable custom Array() Object.
	 * @param array $__ALL_VARS : Array of all the defined $variables from the Controller.
	 * @return array : A re-organized custom Array() Object out of the given Array() Object.
	 */
	private static function setVars( $__ALL_VARS ) {
		$__PARAMS = array();
		foreach ( $__ALL_VARS as $__KEY => $__VALUE ) $__PARAMS[$__KEY] = $__VALUE;
		return $__PARAMS;
	}
}
