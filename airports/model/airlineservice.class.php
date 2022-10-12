<?php

require_once __DIR__ . '/../app/db.class.php';
require_once __DIR__ . '/airport.class.php';
require_once __DIR__ . '/airline.class.php';
require_once __DIR__ . '/country.class.php';

class AirlineService{

    public function getAirlineById( $id ) 
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM airlines WHERE id=:id' );
			$st->execute( array( 'id' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Airline( $row['id'], $row['a_name']);
	}

    public function getAirlineIdByName($id) {
        $db = DB::getConnection();
        $st = $db->prepare( 'SELECT a_name FROM airlines WHERE id=:id' );
        $st->execute( ['id' => $id] );
        $name_airline = $st->fetch()['a_name'];
  
        return $name_airline;
  
     }

     public function getAirlineNameById($a_name) {
      $db = DB::getConnection();
      $st = $db->prepare( 'SELECT id FROM airlines WHERE a_name=:a_name' );
      $st->execute( ['a_name' => $a_name] );
      $id_airline = $st->fetch()['id'];

      return $id_airline;

   }



    public function createNewAirline( $a_name)
    {
         try
         {
            $db = DB::getConnection();
            $st = $db->prepare( "INSERT INTO airlines (id, a_name)
                                    VALUES (NULL, :a_name)" );
            $st->bindParam(':a_name', $a_name);
            $st->execute();
         }
         catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
 
    }

    public function insertassoc($id_airport, $id_airline)
    {
        try
        {
           $db = DB::getConnection();
           $st = $db->prepare( "INSERT INTO assoc_airlines (id, id_airport, id_airline)
                                   VALUES (NULL, :id_airport, :id_airline)" );
           $st->bindParam(':id_airport', $id_airport);
           $st->bindParam(':id_airline', $id_airline);
           $st->execute();
        }
        catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
    }

    public function getAllCountries()
    {
        $countries = [];
     try
 		 {
 			$db = DB::getConnection();
 			$st = $db->prepare( 'SELECT * FROM countries' );
 			$st->execute();
 		 }
 		 catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

     while( $row = $st->fetch() ){
           $countries[] = new Country( $row['c_code'], $row['c_name'] );
     }
     return $countries;
    }

    public function insertassoccountry($id_airline, $c_code)
   {
    try
    {
       $db = DB::getConnection();
       $st = $db->prepare( "INSERT INTO airline_country (id, id_airline, c_code)
                               VALUES (NULL, :id_airline, :c_code)" );
       $st->bindParam(':id_airline', $id_airline);
       $st->bindParam(':c_code', $c_code);
       $st->execute();
    }
    catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); } 
   }
}

?>