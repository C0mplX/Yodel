<?php
$config = array(
		'host'     => 'localhost', //Your databse host
		'username' => 'root', // Yor username for the mysql
		'password' => '', // Your password for the mysql
		'dbname'   => 'yodel', // Your database name
		'charset'  => 'UTF8' // Set the charset of the database
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset='. $config['charset'], $config['username'], $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>