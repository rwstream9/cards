<?php


	namespace Cards\Strategy;
	
	
	abstract class AbstractStrategy implements StrategyInterface
	{
		private $hash;
		
		
		public function getHash ()
		{
			if ($this->hash) {
				return $this->hash;
			}
			
			$sequenceString = '';
			
			foreach ($this->generate() as $card) {
				$sequenceString .= $card . '|';
			}
			
			return $this->hash = sha1($sequenceString);
		}
	}