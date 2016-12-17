<?php

	require_once(__DIR__ . '/vendor/autoload.php');

	$spec = new Cards\Osterlind\OsterlindSpec;

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
	echo $deck->getRotatedHash() . PHP_EOL;

	
