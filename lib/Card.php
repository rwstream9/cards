<?php


	namespace Cards;
	
	
	class Card
	{
		private $rank;
		private $suit;
		
		
		public function __construct (Rank $rank, Suit $suit)
		{
			$this->rank = $rank;
			$this->suit = $suit;
		}
		
		
		public function __toString ()
		{
			return $this->getSymbol();
		}
		
		
		public function getSymbol ()
		{
			return $this->getRankSymbol() 
				. $this->getSuitSymbol();
		}
		
		
		public function getRank ()
		{
			return $this->rank;
		}
		
		
		public function getRankSymbol ()
		{
			return $this->getRank()->getSymbol();
		}
		
		
		public function getRankValue ()
		{
			return $this->getRank()->getValue();
		}
		
		
		public function getSuit ()
		{
			return $this->suit;
		}
		
		
		public function getSuitSymbol ()
		{
			return $this->getSuit()->getSymbol();
		}
		
		
		public function getSuitValue ()
		{
			return $this->getSuit()->getValue();
		}
	}