<?php
define('WEBROOT', str_replace('index.php','',$_Server['SCRIPT_NAME']));
define('ROOT', str_replace('index.php','',$_Server['SCRIPT_NAME']));

require(ROOT.'core/model.php');
require(ROOT.'core/controller.php');

$param = explode('/',$_GET['p']);
print_r(($param));
?>

