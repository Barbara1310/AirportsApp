<?php

require_once __DIR__ . '/../model/airlineservice.class.php';
require_once __DIR__ . '/../model/airportservice.class.php';


class airlinesController
{
  
    public function new_airline() 
    {
      $title='Create new airline';
      $as = new AirlineService();
      $countries = [];
      $countries= $as->getAllCountries();
      require_once __DIR__ . '/../view/add_airline.php'; 
    }

  

}   

?>