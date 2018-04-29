<?php
// Application address (for Activating accounts?)
define('DIR', 'http://saborknight.com');
define('ADMINMAIL', 'ntnbrink1@gmail.com');
define('ROBOMAIL', 'support@saborknight.com');
define('SITETITLE', '7th Air Assault Brigade');

// Include the user class, pass in the database connection
include('phpmailer/mail.php');

// Require additional functions
require('inc/functions.php');
require('inc/recaptcha.lib.php');
