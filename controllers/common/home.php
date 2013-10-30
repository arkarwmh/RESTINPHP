<?php
/**
 * File: home.php
 * Class: Extended Custom Controller Class
 * Description: Main Controller for respective page. Performing the core data processing works & triggers the rendering of the Template Files being used.
 *              Pass to the Template handler class.
 * Notes:
 * 1. All the core processing works should be (better be) done from the constructor (__construct) scope, except of the associated functions.
 * 2. There are 3 main sections to be noted in the constructor.
 *   Step (1) Binding of the Template Files to be included
 *   Step (2) Your own data processing works
 *   Step (3) Final rendering of the output of Data Processings and the Template Files. This MUST be placed at the end of the constructor scope.
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

class Index extends Controller {
	public static $__URIObject;

	/**
	 * Step (1)
	 * Binding all the associated Template Files here.
	 */
	function templates() {
		self::__ADD_TEMPLATE( "common/header.tpl" );
		self::__ADD_TEMPLATE( "common/menu.tpl" );
		self::__ADD_TEMPLATE( "common/home.tpl" );
		self::__ADD_TEMPLATE( "common/footer.tpl" );
	}

	/**
	 * Step (2)
	 * SHOULD keep the main() as the default method to drive the data processing works.
	 * ALL CUSTOM DATA PROCESSING works should be done here.
	 * @param string $__PAGE_TITLE : Main Title of the Webpage.
	 * @param array $__URIObject : Parsed URIObject of the given RESTful HTTP Request.
	 */
	function main( $__PAGE_TITLE ) {
		
		/* How to initiate MySQL Dummy Sample. NOT in used here */
		MySQL::connect();
		$query 	= "SELECT bla, blabla FROM blingbling WHERE id='X'";
		$result = mysql_query($query);
		$result = mysql_fetch_row($result);
		MySQL::close();

		if ( $_SESSION["name"]=="" )
			$_SESSION["name"] = "ARKAR WINN MINN HTWE";

		if ( isset($_POST["newname"]) )
			$_SESSION["name"] = $_POST["newname"];
		
		$myHometown	= "YANGON, MYANMAR";
		$myGreeting	= sayhello(); //Call from the common system function file.
		$datetime 	= $this->getDateTime(); //Call from the local funtion.
		
		/**
		 * Step (3) Rendering the Templates out of the current controller.
		 * IMPORTANT:
		 * This method MUST be called at the END of the class constructor, after the own data processing works are done above.
		 * @param array get_defined_vars() - An array of all defined variables 
		 */
		self::render( get_defined_vars() );
	}

	/**
	 * A default constructor for each Controllers. * Typically NOT TO be edited here *
	 * Procedures:
	 * (1) Load-up the Template Files.
	 * (2) Load the URIObject (to use easily here if needed)
	 * (3) Start the User's Operations, in main() method.
	 *
	 * @param string : Main Title of the Webpage.
	 */
	function __construct( $__PAGE_TITLE ) {
		$this->templates();
		self::$__URIObject = RESTful::getURIobject();
		$this->main( $__PAGE_TITLE );
	}

	/**
	 * Custom Function (Example)
	 * IMPORTANT:
	 * If there's ANY $variable here that needs to be used in the Template Files later, the current function SHOULD RETURN it and then RE-ASSIGN it in the main() function.
	 */
	private function getDateTime() {
		return date("d-m-Y H:i:s");
	}
}

/**
 * Class initiator.
 * @param string : The Main Title of the output page.
 */
new Index("WELCOME TO MY HOME");
