<?php
define( 'DS', DIRECTORY_SEPARATOR );
define( 'ROOT', __DIR__ );

@$url = $_GET['url'];

require_once( ROOT . DS . 'lib' . DS . 'bootstrap.php' );