<?php

class Airline
{
	protected $id, $a_name;

	function __construct($id, $a_name)
	{
		$this->id = $id;
		$this->a_name = $a_name;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>