<?php

	/*
		Credit to Richard Osterlind for this algorithm
		
		His fascinating book can be found here: 
		
		http://vincent.mucchielli.free.fr/PUA/Skills/Magic%20and%20Card%20Tricks/Richard%20Osterlind/The%20Breakthrough%20Card%20System.pdf
	*/


	namespace Cards\Osterlind;
	
	use Cards\Spec;
	
	
	class OsterlindSpec extends Spec
	{
		
		
		public function __construct ()
		{
			parent::__construct(
				[
					'A' => 1,
					'2' => 2,
					'3' => 3,
					'4' => 4,
					'5' => 5,
					'6' => 6,
					'7' => 7,
					'8' => 8,
					'9' => 9,
					'T' => 10,
					'J' => 11,
					'Q' => 12,
					'K' => 13,
				],
				[
					's' => 1,
					'h' => 2,
					'c' => 3,
					'd' => 4,
				]
			);
		}
	}