<?php

require_once __DIR__ . '/../app/db.class.php';

require_once __DIR__ . '/airport.class.php';

require_once __DIR__ . '/airline.class.php';

require_once __DIR__ . '/country.class.php';


class AirportService{

    public function getAllAirports(){
        $airports = [];
        $db = DB::getConnection();
        $st = $db->prepare( 'SELECT * FROM airports' );
        $st->execute();
 
        while( $row = $st->fetch() ){
            array_push($airports, new Airport( $row['id'], $row['name'], $row['latitude'], $row['longitude']));
        }
        return $airports;
    }

    public function getAirlinesId($id_airport){
        $airlines = [];
        $db = DB::getConnection();
        $st = $db->prepare( 'SELECT * FROM assoc_airlines WHERE id_airport=:id_airport' );
        $st->execute();
 
        while( $row = $st->fetch() ){
            array_push($airlines, $row['id_airline']);
        }
        return $airlines;
    }

    public function getAirportById( $id ) 
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM airports WHERE id=:id' );
			$st->execute( array( 'id' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Airport( $row['id'], $row['name'], $row['latitude'] , $row['longitude']);
	}

    public function createNewAirport($name, $latitude, $longitude)
    {
         try
         {
            $db = DB::getConnection();
            $st = $db->prepare( "INSERT INTO airports (id, name,latitude, longitude)
                                    VALUES (NULL, :name, :latitude, :longitude)" );
            $st->bindParam(':name', $name);
            $st->bindParam(':latitude', $latitude);
            $st->bindParam(':longitude', $longitude);
            $st->execute();
         }
         catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

 
    }

    public function getAirportIdByName($name) {
      $db = DB::getConnection();
      $st = $db->prepare( 'SELECT id FROM airports WHERE name=:name' );
      $st->execute( ['name' => $name] );
      $id_airport = $st->fetch()['id'];

      return $id_airport;

   }

   public function insertassoccountry($id_airport, $c_code)
   {
    try
    {
       $db = DB::getConnection();
       $st = $db->prepare( "INSERT INTO airport_country (id, id_airport, c_code)
                               VALUES (NULL, :id_airport, :c_code)" );
       $st->bindParam(':id_airport', $id_airport);
       $st->bindParam(':c_code', $c_code);
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
}

?>