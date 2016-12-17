<?php

	namespace Cards;
	
	use Exception;
	
	
	class Deck
	{
		protected $ranks;
		protected $suits;
		
		private $rankSymbolIndex;
		private $rankValueIndex;
		private $suitSymbolIndex;
		private $suitValueIndex;
		
		
		public function __construct ()
		{
			$this->ranks = $this->createRanks();
			$this->suits = $this->createSuits();
			
			$this->createRankSymbolIndex();
			$this->createRankValueIndex();
			$this->createSuitSymbolIndex();
			$this->createSuitValueIndex();
		}
		
		
		public function createCardFromSymbols ($rankSymbol, $suitSymbol)
		{
			$rank = $this->getRankBySymbol($rankSymbol);
			$suit = $this->getSuitBySymbol($suitSymbol);
			
			if (! $rank) {
				throw new Exception('Invalid rank symbol: ' . $rankSymbol);
			}
			
			if (! $suit) {
				throw new Exception('Invalid suit symbol: ' . $suitSymbol);
			}
			
			return new Card($rank, $suit);
		}
		
		
		public function createCardFromValues ($rankValue, $suitValue)
		{
			$rank = $this->getRankByValue($rankValue);
			$suit = $this->getSuitByValue($suitValue);
			
			if (! $rank) {
				throw new Exception('Invalid rank value: ' . $rankValue);
			}
			
			if (! $suit) {
				throw new Exception('Invalid suit value: ' . $suitValue);
			}
			
			return new Card($rank, $suit);
		}
		
		
		public function getRankByValue ($value)
		{
			return $this->rankValueIndex[$value];
		}
		
		
		public function getRankBySymbol ($symbol)
		{
			return $this->rankSymbolIndex[$symbol];
		}
		
		
		public function getSuitByValue ($value)
		{
			return $this->suitValueIndex[$value];
		}
		
		
		public function getSuitBySymbol ($symbol)
		{
			return $this->suitSymbolIndex[$symbol];
		}
		
		
		private function createRankSymbolIndex ()
		{
			foreach ($this->ranks as $rank) {
				$this->rankSymbolIndex[$rank->getSymbol()] = $rank;
			}
		}
		
		
		private function createRankValueIndex ()
		{
			foreach ($this->ranks as $rank) {
				$this->rankValueIndex[$rank->getValue()] = $rank;
			}
		}
		
		
		private function createSuitSymbolIndex ()
		{
			foreach ($this->suits as $suit) {
				$this->suitSymbolIndex[$suit->getSymbol()] = $suit;
			}
		}
		
		
		private function createSuitValueIndex ()
		{
			foreach ($this->suits as $suit) {
				$this->suitValueIndex[$suit->getValue()] = $suit;
			}
		}
		
		
		private function createRanks ()
		{
			return [
				new Rank('A', 1),
				new Rank('2', 2),
				new Rank('3', 3),
				new Rank('4', 4),
				new Rank('5', 5),
				new Rank('6', 6),
				new Rank('7', 7),
				new Rank('8', 8),
				new Rank('9', 9),
				new Rank('T', 10),
				new Rank('J', 11),
				new Rank('Q', 12),
				new Rank('K', 13),
			];
		}
		
		
		private function createSuits ()
		{
			return [
				new Suit('s', 1),
				new Suit('h', 2),
				new Suit('c', 3),
				new Suit('d', 4),
			];
		}
	}