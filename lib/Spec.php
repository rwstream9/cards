<?php

	namespace Cards;
	
	use Exception;
	
	
	class Spec
	{
		protected $ranks;
		protected $suits;
		
		private $rankSymbolIndex;
		private $rankValueIndex;
		private $suitSymbolIndex;
		private $suitValueIndex;
		
		
		public function __construct (array $rankMap, array $suitMap)
		{
			$this->ranks = $this->createRanks($rankMap);
			$this->suits = $this->createSuits($suitMap);
			
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
		
		
		private function createRanks ($rankMap)
		{
			$ranks = [];
			
			foreach ($rankMap as $symbol => $value) {
				$ranks[] = new Rank($symbol, $value);
			}
			
			return $ranks;
		}
		
		
		private function createSuits ($suitMap)
		{
			$suits = [];
			
			foreach ($suitMap as $symbol => $value) {
				$suits[] = new Suit($symbol, $value);
			}
			
			return $suits;
		}
	}