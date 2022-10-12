<?php

class Country
{
	protected $c_code, $c_name;

	function __construct($c_code, $c_name)
	{
		$this->c_code = $c_code;
		$this->c_name = $c_name;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>