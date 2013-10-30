<?php
/**
 * File: item.php
 * Class: Extended Custom Controller Class
 * Description: Main Controller for respective page. Performing the core data processing works & triggers the rendering of the Template Files being used.
 *              Pass to the Template handler class.
 * Notes:
 * 1. All the core processing works should be (better be) done from the constructor (__construct) scope, except of the associated functions.
 * 2. There are 3 main things to be noted.
 *   Step (1) In the constructor, bind all the Template Files to be included.
 *   Step (2) Using main() method for your own data processing works.
 *   Step (3) At the end of the main() method, final rendering of the output to the Template Files.
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
		self::__ADD_TEMPLATE( "stock/item.tpl" );
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
		if ( self::$__URIObject["method"] == "GET" ) {

			/* Normal page load from RESTful URL */
			$item = $this->getOneItem();

		} else if ( self::$__URIObject["method"] == "POST" ) {

			/* Assume this is the "API request via POST". So we return the data back */
			echo json_encode($this->getOneItem());
			exit;

		} else if ( self::$__URIObject["method"] == "PUT" ) {
		} else if ( self::$__URIObject["method"] == "DELETE" ) {
		}
		
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
	function getOneItem() {
		/**
		 * Let's Assume we have our Items Array already
		 * (E.g, Grabbed from Database or whatever in reality)
		 */
		$items = array();
		$items[1] = array( "id"=>1, "name"=>"Books", "desc"=>"Books are books to read for your knowledge.", "stock"=>62, "price"=>"$2.5", "purchased"=>40 );
		$items[2] = array( "id"=>2, "name"=>"Fruits", "desc"=>"Things to eat and most of them are good for your health.", "stock"=>14, "price"=>"$1.25", "purchased"=>68 );
		$items[3] = array( "id"=>3, "name"=>"Drugs", "desc"=>"Good thing to risk your life.", "stock"=>8, "price"=>"$106.75", "purchased"=>16 );
		$items[4] = array( "id"=>4, "name"=>"Mobile Handsets", "desc"=>"Stay Connected!", "stock"=>23, "price"=>"$25", "purchased"=>120 );

		if ( self::$__URIObject["method"] == "GET" ) {
			$index = self::$__URIObject["params"];
		} else if ( self::$__URIObject["method"] == "POST" ) {
			$index = self::$__URIObject["params"]["itemid"];
		}
		
		/**
		 * RETURN the $item (back to the main() to assign there again) 
		 * .. to make it available in the Template Files later.
		 */
		return $item = $items[ $index ];
	}
}

/**
 * Class initiator.
 * @param string : Main Title of the Webpage.
 */
new Index("SINGLE ITEM");
