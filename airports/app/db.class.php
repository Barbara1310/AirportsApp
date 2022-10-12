<?php
//please fill the missing
class DB
{
	private static $db = null;

	private function __construct() { }
	private function __clone() { }

	public static function getConnection()
	{
		if( DB::$db === null )
	    {
	    	try
	    	{
	    		//  HOSTNAME, DATABASE, USERNAME i PASSWORD
		    	DB::$db = new PDO( "mysql:host=127.0.0.1;dbname=app_airports;charset=utf8mb4;port=3306", 'YOUR_USERNAME', 'YOUR_PASSWORD');
		    	DB::$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		    catch( PDOException $e ) { exit( 'PDO Error: ' . $e->getMessage() ); }
	    }
		return DB::$db;
	}
}

?>
