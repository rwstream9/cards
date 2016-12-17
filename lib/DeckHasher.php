<?php


	namespace Cards;
	
	
	
	class DeckHasher
	{
		const DELIMITER = '|';
		
		protected $spec;
		
		
		public function __construct (Spec $spec)
		{
			$this->spec = $spec;
		}
		
		
		public function hash (Deck $cards)
		{
			return $this->hashArray($cards);
		}
		
		
		public function hashRotated (Deck $cards)
		{
			$cardArray = [];
			
			foreach ($cards as $card) {
				$cardArray[] = (string) $card;
			}
			
			$ranks = $this->spec->getRanks();
			$suits = $this->spec->getSuits();
			
			$card = $this->spec->createCard($ranks[0], $suits[0]);
			
			$cardArray = $this->rotateArray($cardArray, (string) $card);
			
			return $this->hashArray($cardArray);
		}
		
		
		public function hashArray ($cards)
		{
			$sequenceString = '';
			
			foreach ($cards as $card) {
				$sequenceString .= (string) $card . self::DELIMITER;
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