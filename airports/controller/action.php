<?php
//print_r($_POST);
require_once __DIR__ . '/../model/airportservice.class.php';
require_once __DIR__ . '/../model/airlineservice.class.php';

 $as = new AirportService();
 $name = $_POST['Name'];
 $latitude = $_POST['Latitude'];
 $longitude=$_POST['Longitude'];

 $as->createNewAirport($name, $latitude, $longitude);

 
 $airport_id=$as->getAirportIdByName($name);
 


 $ls=new AirlineService(); 

 for($i = 0; $i < count($_POST['ingredient_name']); $i++)
  {
    $airline_id=$ls->getAirlineIdByName( $_POST['ingredient_name'][$i]);
    //echo $_POST['ingredient_name'][$i];
    $ls->insertassoc($airport_id, $airline_id);
  } 

//new airport and country
for($i = 0; $i < count($_POST['countries']); $i++)
{
  $as->insertassoccountry($airport_id, $_POST['countries'][$i]);
}


?>
