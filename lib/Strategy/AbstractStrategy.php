<?php


	namespace Cards\Strategy;
	
	use Exception;
	
	
	abstract class AbstractStrategy implements StrategyInterface
	{
		const DELIMITER = '|';
		
		private $hash;
		private $unorderedHash;
		
		
		public function getHash ()
		{
			if ($this->hash) {
				return $this->hash;
			}
			
			$cards = $this->generate();
			
			return $this->hash = $this->hashArray($cards);
		}
		
		
		public function getUnorderedHash ()
		{
			if ($this->unorderedHash) {
				return $this->unorderedHash;
			}
			
			$cards = $this->generate();
			$cardArray = [];
			
			foreach ($cards as $card) {
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
	}