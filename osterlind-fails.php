<?php

	// notice the change in the value of the king; this script fails

	require_once(__DIR__ . '/vendor/autoload.php');

	$spec = new Cards\Spec(
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
				'K' => 14,
			],
			[
				's' => 1,
				'h' => 2,
				'c' => 3,
				'd' => 4,
			]
	);

	$cardSymbols = str_split($argv[1]);

	$rankSymbol = $cardSymbols[0];
	$suitSymbol = $cardSymbols[1];

	$card = $spec->createCardFromSymbols($rankSymbol, $suitSymbol);
	
	$strategy = new Cards\Osterlind\OsterlindStrategy($spec, $card);
	$deck = $strategy->generate();
	
	foreach ($deck as $i => $card) {
		echo ($i + 1) . '. ' . $card . PHP_EOL;
	}
	
	echo $deck->getHash() . PHP_EOL;
	echo $deck->rotateTo('As')->getHash() . PHP_EOL;

	
