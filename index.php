<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
// print_r($_SESSION);

require_once('vendor/autoload.php');
require_once('config.php');
require_once('routes/web.php');
?>