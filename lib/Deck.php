<?php


	namespace Cards;
	
	use Iterator;
	use Exception;
	
	
	class Deck implements Iterator
	{
		protected $cards;
		
		private $hasher;
		private $hash;
		private $unorderedHash;
		
		
		public function __construct (array $cards, DeckHasher $hasher)
		{
			$this->cards = $cards;
			$this->hasher = $hasher;
			
			$this->validate();
		}
		
		
		function rewind () 
		{
			reset($this->cards);
		}
		
		
		function current () 
		{
			return current($this->cards);
		}
		
		
		function key () 
		{
			return key($this->cards);
		}
		
		
		function next () 
		{
			next($this->cards);
		}
		
		
		function valid () 
		{
			return key($this->cards) !== null;
		}
		
		
		public function toArray ()
		{
			return $this->cards;
		}
		
		
		public function getHash ()
		{
			if ($this->hash) {
				return $this->hash;
			}
			
			return $this->hash = $this->hasher->hash($this);
		}
		
		
		public function rotateTo ($firstValue)
		{
			$array = $this->cards;
			$key = array_search($firstValue, $array);
			
			if ($key === false) {
				throw new Exception('Rotate value ' . $firstValue . ' not found.');
			}
			
			for ($i = 0; $i < $key; $i++) {
				$value = array_shift($array);
				array_push($array, $value);
			}
			
			return new self($array, $this->hasher);
		}
		
		
		private function validate ()
		{
			if (count($this->cards) != 52) {
				throw new Exception('Each Deck must have 52 cards.');
			}
			
			$cardSymbols = $this->getCardSymbols();
			
			if (count(array_unique($cardSymbols)) != 52) {
				throw new Exception('The deck must not contain duplicate cards.');
			}
		}
		
		
		private function getCardSymbols ()
		{
			$symbols = [];
			
			foreach ($this->cards as $card) {
				$symbols[] = (string) $card;
			}
			
			return $symbols;
		}
	}