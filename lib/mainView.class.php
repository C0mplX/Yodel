<?php
/**
* 
* Class to handle the views 
*
*/
class MainView	{
		
	protected $folder;
	protected $view;

	public function View( $folder, $view, $data = "" ) {
		
		if( $data != "" )
			$data = $this->escData( $data );
		require_once( ROOT . DS . 'application/views/' .strtolower( $folder ) . '/' . strtolower( $view ) . 'View.php'   );

	}

	private function escData( $data ) {

		$cleanArray = array();

		foreach ($data as $key => $value) {
			$cleanArray[strtolower($key)] = htmlspecialchars( $value );
		}
		return (object)$cleanArray;
	}
}
?>