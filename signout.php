<?php
require 'config.php';

// unset the loggedin user session
unset($_SESSION['loggedin_user']);

// redirect back to homepage
header('Location: https://ipd-php-api-demo-dbrouse.c9users.io/');

