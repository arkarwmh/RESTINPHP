REST-in PHP (RIP) Framework v1.1
================

Change logs:

 * Improved the Library Class (RESTful) by adding a new Function "parseURIobject", to handle better the parsing of URI for the RESTful purpose.

A simply RESTful PHP MVC Framework with OOP structured approach which is then quite pure &amp; really easy to start with. Yet another great kick-starter for the PHP Applications to get quickly boosted.

 * Author: Arkar WINN MINN HTWE
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2014
 * First released by 2013


1. Adjust in .HTACCESS
================

Open the <code>.htaccess</code> and modify the <code>RewriteBase</code>. If the Website is directly under the Domain Name, just put a single slash <code>/</code>.

2. Configurations in 'config.php'
================

(1) Adjust the settings in <code>config.php</code> according to your environment.

(2) Define your controllers, into the <code>$__CONTROLLERS_DIRECTORY[]</code> Array. This is to map the Directory Location of the controller file and it's Name.

Format:
 * array( "directory", "controller_name" )
 * "controller_name" MUST be the name of the actual file, but just without php extension ".php".

For example:
 * Controller file located: /docroot/myproject/controllers/user/register.php
 * Definition: array("user", "register");
 * URL Gotten: http://www.myproject.com/register

This says, the RESTful URL "www.example.com/register" represents a Controller and it is actually the <code>register.php</code> file, which is located in the <code>controllers/user</code> directory.

3. Understanding the "Controller" Logic
================

Let's say we will have a Controller file at:

        controllers/user/register.php
        
This means:

        Controller Name  : "register"
        Controller Group : "user"
        Controller URL   : www.example.com/register

So in the <code>config.php</code>, assign this controller as:

        $__CONTROLLERS_DIRECTORY[] = array("user", "register");

That means if we call <code>www.example.com/register</code> by URL, the RIP Router will look the <code>register.php</code> file inside the <code>controllers/user</code> directory.

Then in the controller file, define the Template Files you want to call (a.k.a) add-in, in the <code>function templates()</code>:

        function templates() {
	        self::__ADD_TEMPLATE( "common/header.tpl" );
	        self::__ADD_TEMPLATE( "common/menu.tpl" );
	        self::__ADD_TEMPLATE( "user/register.tpl" );
	        self::__ADD_TEMPLATE( "common/footer.tpl" );
        }

That means the Template Files are located in the <code>views/[template-name-you-assigned]/templates</code> directory. The <code>[template-name-you-assigned]</code> is the related PATH which you have assigned as:

        define('__DEFAULT_TEMPLATEPATH', 'views/default');
        
.. in the <code>config.php</code>.

That's simply all about the logic of Controllers (and its relations to the Template Files)

4. Making a new Controller
================

Lets continue the step above. Once you have done the step 2.2, then:

(1) Create a NEW FILE <code>register.php</code> under the directory <code>controllers/user</code>.

(2) The skeleton of the new Controller should be typically looks like:

        <?php
        class Index extends Controller {
                public static $__URIObject;
                
                function templates() {
                        self::__ADD_TEMPLATE( "common/header.tpl" );
                        self::__ADD_TEMPLATE( "common/menu.tpl" );
                        self::__ADD_TEMPLATE( "user/register.tpl" );
                        self::__ADD_TEMPLATE( "common/footer.tpl" );
                }
                
                function main($__PAGE_TITLE) {
                        /**
                         * Your workssss ……….. here!
                         */
                        
                        self::render(get_defined_vars());
                }

                function __construct($__PAGE_TITLE) {
                        $this->templates();
                        self::$__URIObject = RESTful::getURIobject();
                        $this->main($__PAGE_TITLE);
                }
        }
        new Index("Title of my New Page");

(3) Define your TEMPLATE FILES in the templates() method first.

(4) Then place your whatever Codes typically inside the main() method, MUST followed by the 

        self::render(get_defined_vars());

5. Creating the required Template(s)
================

By following the step (4) above, we defined 4 Template Files to call. For example:

        self::__ADD_TEMPLATE( "user/register.tpl" );

This means, we need to create <code>register.tpl</code> inside the directory of <code>views/default/templates/user</code>.

A template can be considered a PART of the whole webpage. So any of PHP or HTML or Javascript .. etc can be put there.

That's all! Enjoy!
================

License
================

REST-in PHP Framework is released under the MIT Public License. You can feel free to either contribute in the community or use it for your own products.
