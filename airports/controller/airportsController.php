<?php

require_once __DIR__ . '/../model/airportservice.class.php';

class airportsController
{
  public function index() 
    {
      $title= 'Where would you like to fly to?';
      
      require_once __DIR__ . '/../view/naslovna.php';

    }
  public function new_airport() 
    {
      $title='Create new airport';
      $as = new AirportService();
      $countries = [];
      $countries= $as->getAllCountries();
      require_once __DIR__ . '/../view/add_airport2.php'; 
    }

  

}   

?>