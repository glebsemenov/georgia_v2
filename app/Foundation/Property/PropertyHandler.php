<?php namespace App\Foundation\Property;


class PropertyHandler
{
	private $property;

	public function __construct( string $property )
	{
		$this->property = $property;
	}

	public function getInstance()
	{
		$class = 'App\Foundation\Property\\' . ucwords( $this->property ) . 'Handler';

		return new $class();
	}
}