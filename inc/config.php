<?php
// Application address (for Activating accounts?)
define('DIR', 'http://saborknight.com');
define('ADMINMAIL', 'ntnbrink1@gmail.com');
define('ROBOMAIL', 'support@saborknight.com');

// Include the user class, pass in the database connection
include('classes/phpmailer/mail.php');

// Require additional functions
require('includes/functions.inc.php');
require('includes/recaptcha.lib.php');
