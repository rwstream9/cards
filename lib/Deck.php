<?php


	namespace Cards;
	
	use Iterator;
	use Exception;
	
	
	class Deck implements Iterator
	{
		const DELIMITER = '|';
		
		protected $cards;
		
		private $hash;
		private $unorderedHash;
		
		
		public function __construct (array $cards)
		{
			$this->cards = $cards;
			
			$this->validate();
		}
		
		
		function rewind() 
		{
			reset($this->cards);
		}
		
		
		function current() 
		{
			return current($this->cards);
		}
		
		
		function key() 
		{
			return key($this->cards);
		}
		
		
		function next() 
		{
			return next($this->cards);
		}
		
		
		function valid() 
		{
			return key($this->cards) !== null;
		}
		
		
		public function getHash ()
		{
			if ($this->hash) {
				return $this->hash;
			}
			
			return $this->hash = $this->hashArray($this->cards);
		}
		
		
		public function getUnorderedHash ()
		{
			if ($this->unorderedHash) {
				return $this->unorderedHash;
			}
			
			$cardArray = [];
			
			foreach ($this->cards as $card) {
				$cardArray[] = (string) $card;
			}
			
			$cardArray = $this->rotateArray($cardArray, 'As');
			
			return $this->unorderedHash = $this->hashArray($cardArray);
		}
		
		
		private function hashArray ($array)
		{
			$sequenceString = '';
			
			foreach ($array as $item) {
				$sequenceString .= (string) $item . self::DELIMITER;
			}
			
			return sha1($sequenceString);
		}
		
		
		private function rotateArray ($array, $firstValue)
		{
			$key = array_search($firstValue, $array);
			
			if ($key === false) {
				throw new Exception('Rotate value ' . $firstValue . ' not found.');
			}
			
			for ($i = 0; $i < $key; $i++) {
				$value = array_shift($array);
				array_push($array, $value);
			}
			
			return $array;
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