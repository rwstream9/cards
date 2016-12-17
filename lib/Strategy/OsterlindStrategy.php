<?php


	namespace Cards\Strategy;
	
	use Cards\Card;
	use Cards\Spec;
	use Cards\Deck;
	
	
	class OsterlindStrategy implements StrategyInterface
	{
		private $firstCard;
		private $spec;
		
		
		public function __construct (Spec $spec, Card $firstCard)
		{
			$this->spec = $spec;
			$this->firstCard = $firstCard;
		}
		
		
		public function generate ()
		{	
			$card = $this->firstCard;
			
			for ($i = 0; $i < 52; $i++) {
				$cards[] = $card;
				$card = $this->next($card);
			}
			
			return new Deck($cards);
		}
		
		
		private function next (Card $card)
		{
			$rankValue = $card->getRankValue();
			$suitValue = $card->getSuitValue();
	
			$nextRankValue = $rankValue * 2;
			
			if ($nextRankValue > 12) {
				$nextRankValue -= 13;
			}
	
			$nextRankValue += $suitValue;
	
			if ($nextRankValue > 13) {
	            $nextRankValue -= 13;
			}
	
			if (in_array($nextRankValue, [1, 2, 3])) {
				$nextSuitValue = $suitValue;
			} else if (in_array($nextRankValue, [4, 5, 6])) {
				$nextSuitValue = $suitValue + 2;
			} else if (in_array($nextRankValue, [7, 8, 9])) {
				$nextSuitValue = $suitValue - 1;
			} else if (in_array($nextRankValue, [10, 11, 12, 13])) {
	            $nextSuitValue = $suitValue + 1;
			}
			
			if ($nextSuitValue > 4) {
				$nextSuitValue -= 4;
			} else if ($nextSuitValue < 1) {
				$nextSuitValue = 4 + $nextSuitValue;
			}
			
			return $this->spec->createCardFromValues($nextRankValue, $nextSuitValue);
		}
	}