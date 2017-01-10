<?php
ini_set( "display_errors", true );
date_default_timezone_set( "America/New_York" );
define( "DB_DSN", "mysql:host=blogdb.cf1xv8ohtuxf.us-east-1.rds.amazonaws.com;port=3306;dbname=" );
define( "DB_USERNAME", "NickBlog" );
define( "DB_PASSWORD", "1101de05c9" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "cms/templates" );
define( "ADMIN_USERNAME", "SureNick" );
define( "ADMIN_PASSWORD", "1101de05c9" );
require( CLASS_PATH . "/post.php" );
require( CLASS_PATH . "/author.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later. ";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
