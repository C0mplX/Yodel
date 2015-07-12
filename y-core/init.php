<?php
/**
*
* This file works as the core includer of all the classes!
* You only need to include this file on your page to access
* all of the Yodels framework functions. 
* @author Ole Martin Skaug @ Yodel
* @version 1.0 - strawberry
* 
*/

# Connection to the database
require_once( __DIR__ . '/connection/connect.php' );
# Acces the y_tables class
require_once( __DIR__ . '/y-tables/y-create-tables.php' );
?>