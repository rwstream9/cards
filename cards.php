<?php

	require_once(__DIR__ . '/vendor/autoload.php');

	$deck = new Cards\Deck;

	$cardSymbols = str_split($argv[1]);

	$rankSymbol = $cardSymbols[0];
	$suitSymbol = $cardSymbols[1];

	$card = $deck->createCardFromSymbols($rankSymbol, $suitSymbol);
	
	$strategy = new Cards\Strategy\OsterlindStrategy($deck, $card);
	
	foreach ($strategy->generate() as $i => $card) {
		echo ($i + 1) . '. ' . $card . PHP_EOL;
	}
	
	echo $strategy->getHash() . PHP_EOL;

	
