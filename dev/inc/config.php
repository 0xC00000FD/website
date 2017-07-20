<?php
// Application address (for Activating accounts?)
define('DIR', 'http://jsfar.com');
define('ADMINMAIL', 'ntnbrink1@gmail.com');
define('ROBOMAIL', 'support@saborknight.com');

// Include the user class, pass in the database connection
include('phpmailer/mail.php');

// Require additional functions
require('functions.php');
require('recaptcha.lib.php');
