# nicks_blog_site
This Repository contains all the code used to construct my personal blogsite.  I used HTML, CSS, Twitter Bootstrap, PHP, and AWS hosting, RDS and EC2 to make my site full operational.  This repo contains only the HTML, CSS, and PHP code along with the Bootstrap dependencies.  There is only one file missing and that is 'config.php', which contains all the private usernames and passwords needed to access the backend of the service.  To make full use of this code a 'config.php' file should be made and formatted as shown below and placed in the parent directory of the project files.  If this is on an apache web server, the project folders (the folder containing index.php) should be placed in var/www/html/ while the config.php should be placed in var/www/  

config.php: 

<?php
ini_set( "display_errors", true );
date_default_timezone_set( "America/New_York" );
define( "DB_DSN", "<database endpoint>" );
define( "DB_USERNAME", "<db username>" );
define( "DB_PASSWORD", "<db password>" );
define( "CLASS_PATH", "cms/classes" );
define( "TEMPLATE_PATH", "cms/templates" );
define( "ADMIN_USERNAME", "<site username>" );
define( "ADMIN_PASSWORD", "<site password>" );
require( CLASS_PATH . "/post.php" );
require( CLASS_PATH . "/author.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later. ";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>




This is version 1 of the blog site. The next interation will include:
	A Backend Admin Section:
		secure login
		add, modify, delete posts from browser
		update author info
	Database Schema
	Bug Fixes
		CSS inconsistencies
		Mobel layout errors
