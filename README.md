REST-in PHP (RIP) Framework v1.0
================

A simply RESTful PHP MVC Framework with OOP structured approach which is then quite pure &amp; really easy to start with. Yet another great kick-starter for the PHP Applications to get quickly boosted.

 * Author: Arkar WINN MINN HTWE
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013


1. Adjust in .HTACCESS
================

Open the ".htaccess" and modify the RewriteBase. (If the Website is directly under the Domain Name, just put a single slash "/".

2. Configurations in 'config.php'
================

(1) Adjust the settings in 'config.php' according to your environment.

(2) Define your controllers, into the $__CONTROLLERS_DIRECTORY[] Array. This is to map the Directory Location of the controller file and it's Name.

Format:
 * array( "directory", "controller_name" )
 * "controller_name" MUST be the name of the actual file, but just without php extension ".php".

For example:
 * Controller file located: /docroot/myproject/controllers/user/register.php
 * Definition: array("user", "register");
 * URL Gotten: http://www.myproject.com/register

This says, the RESTful URL "/register" represents A Controller and it is actually the "register.php" file, which is located in the "user" directory.

3. Making a new Controller
================

Lets continue the step above. Once you have done the step 2.2, then:

(1) Create a NEW FILE (register.php) under the directory (controllers/user).

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

(4) Then place your whatever Codes, typically inside the main() method, followed by the "self::render(get_defined_vars());"

4. Creating the required Template(s)
================

By following the step (3) above, we defined 4 Template Files to call. For example:
self::__ADD_TEMPLATE( "user/register.tpl" );

This means, we need to create "register.tpl" inside the directory of "views/default/templates/user".

A template can be considered a PART of the whole webpage. So any of PHP or HTML or Javascript .. etc can be put there.

5. That's all! Enjoy!
================

License
================

REST-in PHP Framework is released under the MIT Public License. You can feel free to either contribute in the community or use it for your own products.
