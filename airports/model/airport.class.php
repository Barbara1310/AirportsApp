<?php

class Airport
{
	protected $id, $name, $latitude, $longitude;

	function __construct($id, $name, $latitude, $longitude)
	{
		$this->id = $id;
		$this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>