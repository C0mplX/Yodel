<?php
/**
* 
* Class for handling the doumentation page
*/
class documentationController extends MainView 	{
	
	public function index() {

		$this->View( 'documentation', 'documentation', array( 'text' => 'text' ) );

	}

	public function started() {

		$this->View( 'documentation', 'documentation', array( 'text' => 'text' ) );

	}
}
?>