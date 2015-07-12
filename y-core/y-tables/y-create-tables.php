<?php
//Get the constants variables
require_once( __DIR__ . "/../connection/connect.php" );
/**
* 
* Class name:  tables
* y-create-tables handles everything there is to creating tables the easy way. 
* You acces this class by making it a parrent class of your own class. 
* This way every method here wil be available for you.  
* @author Ole Martin skaug @ Yodel
* @version 1.0
* 
*/
class y_tables extends connect_database {

	public function create_table( $table_name, $query ) {

		try {

			$y_sql = "CREATE TABLE IF NOT EXISTS $table_name( $query );";

			$this->db()->exec( $y_sql );

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}
	}

}
?>