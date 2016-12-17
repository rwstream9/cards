<?php

	namespace Cards\Tests\Unit;
	
	use Cards\Spec;
	use Cards\DeckHasher;
	use Cards\Rank;
	use Cards\Suit;
	use Cards\Card;
	
	use PHPUnit_Framework_TestCase;
	
	
	class SpecTest extends PHPUnit_Framework_TestCase
	{
		/**
		 * @var Spec
		 */
		protected $spec;
		
		
		protected $ranks = [
			'A' => 1,
			'2' => 2,
			'3' => 3,
			'4' => 4,
			'5' => 5,
			'6' => 6,
			'7' => 7,
			'8' => 8,
			'9' => 9,
			'T' => 10,
			'J' => 11,
			'Q' => 12,
			'K' => 13,
		];
		
		
		protected $suits = [
			's' => 1,
			'h' => 2,
			'c' => 3,
			'd' => 4,
		];
		
		
		public function setUp ()
		{
			$this->spec = new Spec(
				$this->ranks,
				$this->suits	
			);
		}
		
		
		public function testGetDeskHasher ()
		{
			$this->assertTrue($this->spec->getDeckHasher() instanceof DeckHasher);
		}
		
		
		public function testCreateCard ()
		{
			$rank = new Rank('A', 1);
			$suit = new Suit('h', 2);
			
			$card = $this->spec->createCard($rank, $suit);
			
			$this->assertTrue($card instanceof Card);
			$this->assertEquals(1, $card->getRankValue());
			$this->assertEquals(2, $card->getSuitValue());
		}
		
		
		/**
		 * @expectedException \Exception
		 */
		public function testCreateCardFails ()
		{
			$rank = new Rank('X', 1);
			$suit = new Suit('2', 2);
			
			$card = $this->spec->createCard($rank, $suit);
		}
		
		
		public function testCreateCardFromValues ()
		{
			$card = $this->spec->createCardFromValues(1, 2);
			
			$this->assertTrue($card instanceof Card);
			$this->assertEquals(1, $card->getRankValue());
			$this->assertEquals(2, $card->getSuitValue());
		}
		
		
		public function testCreateCardFrom ()
		{
			$card = $this->spec->createCardFromValues(1, 2);
			
			$this->assertTrue($card instanceof Card);
			$this->assertEquals(1, $card->getRankValue());
			$this->assertEquals(2, $card->getSuitValue());
		}
		
		
		public function testGetRanks ()
		{
			$ranks = [];
			
			foreach ($this->spec->getRanks() as $rank) {
				$ranks[$rank->getSymbol()] = $rank->getValue();
			}
			
			$this->assertEquals(
				$this->ranks,
				$ranks
			);
		}
		
		
		public function testGetSuits ()
		{
			$suits = [];
			
			foreach ($this->spec->getSuits() as $suit) {
				$suits[$suit->getSymbol()] = $suit->getValue();
			}
			
			$this->assertEquals(
				$this->suits,
				$suits
			);
		}
		
		
		public function testGetRank ()
		{
			$rank1 = $this->spec->getRankBySymbol('A');
			$rank2 = $this->spec->getRankByValue(1);
			$rank3 = $this->spec->getRankBySymbol('2');
			
			$this->assertTrue(
				$this->spec->compareAttributes($rank1, $rank2)
			);
			
			$this->assertFalse(
				$this->spec->compareAttributes($rank1, $rank3)
			);
		}
		
		
		public function testGetSuit ()
		{
			$rank1 = $this->spec->getSuitBySymbol('s');
			$rank2 = $this->spec->getSuitByValue(1);
			$rank3 = $this->spec->getSuitBySymbol('d');
			
			$this->assertTrue(
				$this->spec->compareAttributes($rank1, $rank2)
			);
			
			$this->assertFalse(
				$this->spec->compareAttributes($rank1, $rank3)
			);
		}
	}