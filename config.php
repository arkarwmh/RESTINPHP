<?php
/**
 * File: config.php
 * Description: Main Configuration File
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

/**
 * Directories & Names .. for each Controller. 
 * Format:
 * array( "directory", "controller_name" )
 * "controller_name" MUST be the name of the actual file, but just without php extension ".php".
 *
 * For example:
 * The file: /myproject/controllers/user/register.php
 * Definition: array("user", "register")
 * URL: http://www.myproject.com/register
 */
$__CONTROLLERS_DIRECTORY[] = array("common", "home");
$__CONTROLLERS_DIRECTORY[] = array("common", "404");
$__CONTROLLERS_DIRECTORY[] = array("stock", "items");
$__CONTROLLERS_DIRECTORY[] = array("stock", "item");

/**
 * DEFAULT_CONTROLLER is the Controller Name, for the Home page.
 * NOTE: The name needs to be one 'controller_name' from the $__CONTROLLERS_DIRECTORY[] defined.
 */
define('__DEFAULT_CONTROLLER', "home");

/**
 * REWRITEBASE is the documentroot of the website.
 * IMPORTANT: This **MUST BE** exactly the same with 'RewriteBase' defined inside the .HTACCESS file.
 * If the project path is a Domain's Document Root already, then just leave a Single Slash '/'.
 * If it's a sub-directory, wrap the path inside the Slashes, like '/myproject/'.
 */
define('__REWRITEBASE', '/myproject/');

/**
 * DEFAULT_TEMPLATEPATH is the relative path to the CURRENT THEME (Template) directory.
 * IMPORTANT: WITHOUT Trailing Slash.
 */
define('__DEFAULT_TEMPLATEPATH', 'views/default');

/**
 * CONTROLLERS_DIRECTORY is the serialized variable of $__CONTROLLERS_DIRECTORY[] Array already defined above.
 * WARNING: This one should NOT be touched.
 */
define('__CONTROLLERS_DIRECTORY', serialize($__CONTROLLERS_DIRECTORY));

/**
 * MYSQL ACCESS CREDENTIALS
 */
define('__MYSQLHOST', "");
define('__MYSQLUSER', "");
define('__MYSQLPASSWORD', "");
define('__MYSQLDATABASE', "");

/**
 * SITE_TITLE is the main title for the whole web application.
 */
define('__SITE_TITLE', "WWW.EXAMPLE.COM");

/**
 * (optional) ENCKEY is used for the encryption purposes.
 * The Encryption Key for the password GENERATIONS and AUTHENTICATION PURPOSES.
 * SHOULD NOT BE CHANGED OR REMOVED ONCE IT IS USED. OTHERWISE, EXISTING PASSWORDS WILL NOT BE MATCHED ANYMORE.
 */
define('__ENCKEY', "thisismyencryptionkey");
