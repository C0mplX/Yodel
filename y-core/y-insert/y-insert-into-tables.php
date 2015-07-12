<?php
//Get the connection class
require_once( __DIR__ . "/../connection/connect.php" );

/**
* 
* Class name:  insert
* y-insert-into-tables handles everything there is to insert data into tables. 
* You acces this class by making it a parrent class of your own class. 
* This way every method here wil be available for you.  
* @author Ole Martin skaug @ Yodel
* @version 1.0
* 
*/

class y_insert extends connect_database {

	/**
	*
	* This method inserts data into a table 
	* @param string $table_name, array $column_names
	* 
	*/
	public function insert( $table_name, $column_names, $column_values ) {

		$insert_column_names = $this->create_names( $column_names );
		$prepare_column_values = $this->create_prepared_values( $column_values );

		$query = $this->db()->prepare( "INSERT INTO $table_name ( $insert_column_names ) VALUES ( $prepare_column_values )" );

		$count = 1;
		foreach ($column_values as $value) {
			$val = $value;
			$query->bindValue( $count, $val );
			$count++;
		}

		try {
			
			$query->execute();

			return true;

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}

	}

	/**
	*
	* This method itterate over the array and creates
	* the table names in a SQL friendly string
	* @param array $columns
	*
	*/
	private function create_names( $columns ) {
		$names = "";
		foreach ($columns as $value) {
			$names .= $value . ',';
		}

		return rtrim( $names, "," );

	}

	/**
	*
	* This method creates the prepared values for the query
	* @param values
	*
	*/
	private function create_prepared_values( $values ) {
		$val = "";
		foreach ($values as $value) {
			
			$val .= "?,";
		}

		return rtrim( $val, "," );

	}
} 

?>