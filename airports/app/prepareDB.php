<?php

require_once 'db.class.php';

$db = DB::getConnection();

$has_tables = false;

try
{
	$st = $db->prepare(
		'SHOW TABLES LIKE :tblname'
	);

	$st->execute( array( 'tblname' => 'airports' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;

	$st->execute( array( 'tblname' => 'countries' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;	

	$st->execute( array( 'tblname' => 'airlines' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;	

	$st->execute( array( 'tblname' => 'assoc_airlines' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;
		
	$st->execute( array( 'tblname' => 'airport_country' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;	
	
	$st->execute( array( 'tblname' => 'airline_country' ) );
	if( $st->rowCount() > 0 )
		$has_tables = true;		
	
}
catch( PDOException $e ) { exit( "PDO error [show tables]: " . $e->getMessage() ); }


if( $has_tables )
{
	exit( 'Tables already exist. Delete them and try again.' );
}


try {
    $st = $db->prepare(
        'CREATE TABLE IF NOT EXISTS airports (' .
            'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'name varchar(100) NOT NULL,' .
			'latitude DECIMAL(9,6),' . 
			'longitude DECIMAL(9,6))'  

    );

    $st->execute();
} catch (PDOException $e) {
    exit("PDO error [create airports]: " . $e->getMessage());
}

echo "Table airports completed.<br />";

try {
    $st = $db->prepare(
        'CREATE TABLE IF NOT EXISTS countries (' .
            'c_code char(2) PRIMARY KEY,' .
            'c_name varchar(100) NOT NULL)' 
    );

    $st->execute();
} catch (PDOException $e) {
    exit("PDO error [create countries]: " . $e->getMessage());
}

echo "Table countries completed.<br />";

try {
    $st = $db->prepare(
        'CREATE TABLE IF NOT EXISTS airlines (' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
            'a_name varchar(100))' 
    );

    $st->execute();
} catch (PDOException $e) {
    exit("PDO error [create airlines]: " . $e->getMessage());
}

echo "Table airlines completed.<br />";

try {
    $st = $db->prepare(
        'CREATE TABLE IF NOT EXISTS assoc_airlines(' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
            'id_airport int NOT NULL,' . 
			'id_airline int NOT NULL)'

    );

    $st->execute();
} catch (PDOException $e) {
    exit("PDO error [create assoc_airlines]: " . $e->getMessage());
}

echo "Table assoc_airlines completed.<br />";

try {
    $st = $db->prepare(
        'CREATE TABLE IF NOT EXISTS airport_country(' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
            'id_airport int NOT NULL,' . 
			'c_code char(2))'

    );

    $st->execute();
} catch (PDOException $e) {
    exit("PDO error [create airport_country]: " . $e->getMessage());
}

echo "Table airline_country completed.<br />";

try {
    $st = $db->prepare(
        'CREATE TABLE IF NOT EXISTS airline_country(' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
            'id_airline int NOT NULL,' . 
			'c_code char(2))'

    );

    $st->execute();
} catch (PDOException $e) {
    exit("PDO error [create airline_country]: " . $e->getMessage());
}

echo "Table airline_country completed.<br />";


try {
    $st = $db->prepare('INSERT INTO countries(c_code, c_name) VALUES (:c_code, :c_name)');

    $st->execute(array('c_code' => 'HR', 'c_name' => 'Croatia'));
	$st->execute(array('c_code' => 'DE', 'c_name' => 'Germany'));
	$st->execute(array('c_code' => 'GB', 'c_name' => 'United Kingdom'));
	$st->execute(array('c_code' => 'AU', 'c_name' => 'Australia'));
	$st->execute(array('c_code' => 'RO', 'c_name' => 'Romania'));
	$st->execute(array('c_code' => 'FR', 'c_name' => 'France'));
	$st->execute(array('c_code' => 'ES', 'c_name' => 'Spain'));
	$st->execute(array('c_code' => 'US', 'c_name' => 'United States'));
	$st->execute(array('c_code' => 'MX', 'c_name' => 'Mexico'));
	$st->execute(array('c_code' => 'BR', 'c_name' => 'Brazil'));
	$st->execute(array('c_code' => 'ZA', 'c_name' => 'South Africa'));
	$st->execute(array('c_code' => 'IN', 'c_name' => 'India'));
	$st->execute(array('c_code' => 'CN', 'c_name' => 'China'));
	$st->execute(array('c_code' => 'AE', 'c_name' => 'United Arab Emirates'));
	$st->execute(array('c_code' => 'MD', 'c_name' => 'Moldova'));
	$st->execute(array('c_code' => 'TT', 'c_name' => 'Trinidad and Tobago'));
		



} catch (PDOException $e) {
    exit("PDO error [insert countries]: " . $e->getMessage());
}

echo "Table countries set.<br />";

try {
    $st = $db->prepare('INSERT INTO airlines(a_name) VALUES (:a_name)');

    $st->execute(array('a_name' => 'Croatia Airlines'));
	$st->execute(array('a_name' => 'Lufthansa'));
	$st->execute(array('a_name' => 'Air Moldova'));
	$st->execute(array('a_name' => 'Caribean Airlines'));
	$st->execute(array('a_name' => 'Hahn Air'));

		
} catch (PDOException $e) {
    exit("PDO error [insert airlines]: " . $e->getMessage());
}

echo "Table airlines set.<br />";

try {
    $st = $db->prepare('INSERT INTO airports(name, latitude, longitude) VALUES (:name, :latitude, :longitude)');

	$st->execute(array('name' => 'Franjo Tuđman Airport Zagreb', 'latitude' => '45.7375906','longitude' => '16.0536233'));
	$st->execute(array('name' => 'Dubrovnik Airport', 'latitude' => '42.5603174' ,'longitude' => '18.2599985'));
	$st->execute(array('name' => 'Rijeka International Airport', 'latitude' => '45.2185704','longitude' => '14.5675935'));
	$st->execute(array('name' => 'Zadar Airport', 'latitude' => '44.0974766','longitude' => '15.3378749'));
	$st->execute(array('name' => 'London City Airport', 'latitude' => '51.5048437','longitude' => '0.0473293'));
	$st->execute(array('name' => 'Heathrow Airport', 'latitude' => '51.4700223', 'longitude' => '-0.4564842'));
	$st->execute(array('name' => 'London Stansted Airport', 'latitude' => '51.8860181' , 'longitude' => '0.2366774'));
	$st->execute(array('name' => 'Frankfurt Airport', 'latitude' => '50.0379326' , 'longitude' => '8.5599631'));

		
} catch (PDOException $e) {
    exit("PDO error [insert airports]: " . $e->getMessage());
}

echo "Table airports set.<br />";

try {
    $st = $db->prepare('INSERT INTO assoc_airlines(id_airport, id_airline) VALUES (:id_airport, :id_airline)');

	$st->execute(array('id_airport' => '1', 'id_airline' => '1'));
	$st->execute(array('id_airport' => '1', 'id_airline' => '2'));
	$st->execute(array('id_airport' => '2', 'id_airline' => '1'));
	$st->execute(array('id_airport' => '3', 'id_airline' => '1'));
	$st->execute(array('id_airport' => '4', 'id_airline' => '1'));
	$st->execute(array('id_airport' => '5', 'id_airline' => '2'));
	$st->execute(array('id_airport' => '5', 'id_airline' => '5'));
	$st->execute(array('id_airport' => '6', 'id_airline' => '6'));
	$st->execute(array('id_airport' => '7', 'id_airline' => '3'));
	$st->execute(array('id_airport' => '8', 'id_airline' => '2'));
	$st->execute(array('id_airport' => '8', 'id_airline' => '5'));

		
} catch (PDOException $e) {
    exit("PDO error [insert assoc_airlines]: " . $e->getMessage());
}

echo "Table assoc_airlines set.<br />";

try {
    $st = $db->prepare('INSERT INTO airport_country(id_airport, c_code) VALUES (:id_airport, :c_code)');

	$st->execute(array('id_airport' => '1', 'c_code' => 'HR'));
	$st->execute(array('id_airport' => '2', 'c_code' => 'HR'));
	$st->execute(array('id_airport' => '3', 'c_code' => 'HR'));
	$st->execute(array('id_airport' => '4', 'c_code' => 'HR'));
	$st->execute(array('id_airport' => '5', 'c_code' => 'GB'));
	$st->execute(array('id_airport' => '6', 'c_code' => 'GB'));
	$st->execute(array('id_airport' => '7', 'c_code' => 'GB'));
	$st->execute(array('id_airport' => '8', 'c_code' => 'DE'));

		
} catch (PDOException $e) {
    exit("PDO error [insert airport_country]: " . $e->getMessage());
}

echo "Table airport_country set.<br />";

try {
    $st = $db->prepare('INSERT INTO airline_country(id_airline, c_code) VALUES (:id_airline, :c_code)');

	$st->execute(array('id_airline' => '1', 'c_code' => 'HR'));
	$st->execute(array('id_airline' => '2', 'c_code' => 'DE'));
	$st->execute(array('id_airline' => '3', 'c_code' => 'MD'));
	$st->execute(array('id_airline' => '4', 'c_code' => 'TT'));
	$st->execute(array('id_airline' => '5', 'c_code' => 'DE'));
	

		
} catch (PDOException $e) {
    exit("PDO error [insert airline_country]: " . $e->getMessage());
}

echo "Table airline_country set.<br />";