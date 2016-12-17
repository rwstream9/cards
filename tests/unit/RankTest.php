<?php

	namespace Cards\Tests\Unit;
	
	use Cards\Rank;
	use PHPUnit_Framework_TestCase;
	
	
	class RankTest extends PHPUnit_Framework_TestCase
	{
		/**
		 * @var Rank
		 */
		protected $rank;
		
		
		public function setUp ()
		{
			$this->rank = new Rank('s', 1);
		}
		
		
		public function testGetSymbol ()
		{
			$this->assertEquals('s', $this->rank->getSymbol());
		}
		
		
		public function testGetValue ()
		{
			$this->assertEquals(1, $this->rank->getValue());
		}
	}