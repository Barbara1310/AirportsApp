<?php
//print_r($_POST);
require_once __DIR__ . '/../model/airportservice.class.php';
require_once __DIR__ . '/../model/airlineservice.class.php';


$from=$_POST['From'];
$to=$_POST['To'];
$as = new AirportService();
$from_id=$as->getAirportIdByName($from);
$to_id=$as->getAirportIdByName($to);


$from_airlines=[];
$from_airlines= $as->getAirlinesId($from_id);

$to_airlines=[];
$to_airlines= $as->getAirlinesId($to_id);

$result=array_intersect($from_airlines,$to_airlines);
$names=[];
for($i=0;$i<count($result);$i++)
{
    $ls = new AirlineService();
    $names=$ls->getAirlineNameById($result[$i]);

}
require_once __DIR__ . '/../view/naslovna.php';
for($i=0;$i<count($names);$i++)
{
    echo $names[$i];
}
?>
