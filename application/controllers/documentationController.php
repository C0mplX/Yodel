<?php
/**
* 
* Class for handling the doumentation page
*/
class documentationController extends MainView 	{
	
	public function index() {

		$dataArray = array( 
			'text' => 'text',
			'array2'=> array( 'Hello', 'Hello' )
		);

		$this->View( 'documentation', 'documentation', $dataArray );

	}

	public function started() {

		$this->View( 'documentation', 'about', array( 'text' => 'text' ) );

	}
}
?>