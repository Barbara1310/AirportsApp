<?php
//print_r($_POST);
require_once __DIR__ . '/../model/airportservice.class.php';
require_once __DIR__ . '/../model/airlineservice.class.php';

 $as = new AirlineService();
 $name = $_POST['Name'];

 $as->createNewAirline($name);

 
 $airline_id=$as->getAirlineIdByName($name);

for($i = 0; $i < count($_POST['countries']); $i++)
{
  $as->insertassoccountry($airline_id, $_POST['countries'][$i]); 
}


?>
