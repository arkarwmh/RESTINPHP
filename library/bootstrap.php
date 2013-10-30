<?php
/**
 * File: bootstrap.php
 * Class: System Boot-strapper
 * Description: Bootstrapping the system by start pulling in the core system libraries & classes. Also defines the generic system-wide functions.
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

require_once("library/class.router.php");
require_once("library/class.RESTful.php");
require_once("library/class.controller.php");

/**
 * Returns the full path of the current chosen view (theme) path. Especially for the template files.
 * @return string : The full root path of the current template path.
 */
function templateroot() {
	return __REWRITEBASE . __DEFAULT_TEMPLATEPATH;
}
/**
 * Sample system-wide function for hashing the passwords.
 * @string
 */
function hash_password( $__PLAIN_PASSWORD ) {
	return md5( __ENCKEY . $__PLAIN_PASSWORD );
}
