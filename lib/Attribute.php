<?php

	namespace Cards;
	
	
	class Attribute
	{
		protected $symbol;
		protected $value;
		
		
		public function __construct ($symbol, $value)
		{
			$this->symbol = $symbol;
			$this->value  = $value;
		}
		
		
		public function __toString ()
		{
			return $this->getSymbol();
		}
		
		
		public function getSymbol ()
		{
			return $this->symbol;
		}
		
		
		public function getValue ()
		{
			return $this->value;
		}
	}