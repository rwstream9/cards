<?php

	namespace Cards\Tests\Unit;
	
	use Cards\Rank;
	use Cards\Suit;
	use Cards\Card;
	
	use PHPUnit_Framework_TestCase;
	
	
	class CardTest extends PHPUnit_Framework_TestCase
	{
		/**
		 * @var Card
		 */
		protected $card;
		
		/**
		 * @var Rank
		 */
		protected $rank;
		
		/**
		 * @var Suit
		 */
		protected $suit;
		
		
		public function setUp ()
		{
			$this->rank = new Rank('A', 1);
			$this->suit = new Suit('h', 2);
			$this->card = new Card($this->rank, $this->suit);
		}
		
		
		public function testGetSymbol ()
		{
			$this->assertEquals('Ah', $this->card->getSymbol());
		}
		
		
		public function testGetRank ()
		{
			$this->assertSame(
				$this->rank,
				$this->card->getRank()
			);
		}
		
		
		public function testGetRankSymbol ()
		{
			$this->assertSame(
				$this->rank->getSymbol(),
				$this->card->getRankSymbol()
			);
		}
		
		
		public function testGetRankValue ()
		{
			$this->assertSame(
				$this->rank->getValue(),
				$this->card->getRankValue()
			);
		}
		
		
		public function testGetSuit ()
		{
			$this->assertSame(
				$this->suit,
				$this->card->getSuit()
			);
		}
		
		
		public function testGetSuitSymbol ()
		{
			$this->assertSame(
				$this->suit->getSymbol(),
				$this->card->getSuitSymbol()
			);
		}
		
		
		public function testGetSuitValue ()
		{
			$this->assertSame(
				$this->suit->getValue(),
				$this->card->getSuitValue()
			);
		}
	}