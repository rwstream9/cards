<?php


	namespace Cards\Ordered;
	
	use Cards\Spec;
	use Cards\Deck;
	use Cards\StrategyInterface;
	
	
	class OrderedStrategy implements StrategyInterface
	{
		protected $spec;
	
	
		public function __construct (Spec $spec)
		{
			$this->spec = $spec;
		}
		
		
		public function generate ()
		{
			$cards = [];
			
			foreach ($this->spec->getSuits() as $suit) {
				foreach ($this->spec->getRanks() as $rank) {
					$cards[] = $this->spec->createCard($rank, $suit);
				}
			}
			
			return $this->spec->createDeck($cards);
		}
	}