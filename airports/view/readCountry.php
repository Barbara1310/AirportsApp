<?php

require_once __DIR__ . '/../app/db.class.php';



if (isset($_GET['q'])) {
   
    $q=$_GET['q'];
    $query = "SELECT c_name FROM countries WHERE c_name LIKE '%{$_GET['q']}%' LIMIT 10";
    $countries = [];
    $db = DB::getConnection();
    $st = $db->prepare( $query );
    $st->execute();
  
    while( $row = $st->fetch() ){
      array_push($countries, $row['c_name']);
    }
  
  }
  foreach( $countries as $country )
     if( strpos( $country, $q ) !== false )
      echo "<option value='" . $country . "' />\n";



?>