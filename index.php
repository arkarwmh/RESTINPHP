<?php
/**
 * File: index.php
 * Description: The first indexer. This should initiate the bootstrapping first before any custom libraries/plugins are called.
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

/**
 * (optional) Basic Initializing Options
 */
ini_set('display_errors', '0');
date_default_timezone_set('Asia/Singapore');
session_start();

/**
 * System Bootstrapping
 */
require_once("config.php");
require_once("library/bootstrap.php");

/**
 * (optional) Calls for the custom libraries & plugins.
 * You can plug in your custom libraries here.
 * Note: Please use '*_once' calls for the best optimization.
 */
include_once("library/functions.session.php");
include_once("library/class.mysql.php");
include_once("library/functions.custom.php");

/**
 * System Router
 * Start activating the respective controllers upon the given URI Object.
 */
RESTful::route();
