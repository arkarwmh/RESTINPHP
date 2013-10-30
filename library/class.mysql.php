<?php
/**
 * File: class.mysql.php
 * Class: MySQL
 * Decscription: Basic MySQL Connector Class.
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

class MySQL {
	function __construct() {
		
	}	
	static function connect() {
		$__MYSQL_CONNECTION = mysql_connect(__MYSQLHOST, __MYSQLUSER, __MYSQLPASSWORD);
		mysql_select_db(__MYSQLDATABASE, $__MYSQL_CONNECTION);
		mysql_set_charset('utf8');
	}
	static function close() {
		mysql_close();
	}
}
