<?php


	namespace Cards;
	
	
	
	class DeckHasher
	{
		const DELIMITER = '|';
		
		
		public function hash (Deck $cards)
		{
			return $this->hashArray($cards);
		}
		
		
		public function hashArray ($cards)
		{
			$sequenceString = '';
			
			foreach ($cards as $card) {
				$sequenceString .= (string) $card . self::DELIMITER;
			}
			
			return sha1($sequenceString);
		}
	}