<?php

	namespace Cards\Tests\Unit;
	
	use Cards\Suit;
	use PHPUnit_Framework_TestCase;
	
	
	class SuitTest extends PHPUnit_Framework_TestCase
	{
		/**
		 * @var Suit
		 */
		protected $suit;
		
		
		public function setUp ()
		{
			$this->suit = new Suit('s', 1);
		}
		
		
		public function testGetSymbol ()
		{
			$this->assertEquals('s', $this->suit->getSymbol());
		}
		
		
		public function testGetValue ()
		{
			$this->assertEquals(1, $this->suit->getValue());
		}
	}