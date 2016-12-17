<?php

	require_once(__DIR__ . '/vendor/autoload.php');

	$spec = new Cards\Osterlind\OsterlindSpec;
	
	$strategy = new Cards\Ordered\OrderedStrategy($spec);
	$deck = $strategy->generate();
	
	foreach ($deck as $i => $card) {
		echo ($i + 1) . '. ' . $card . PHP_EOL;
	}
	
	echo $deck->getHash() . PHP_EOL;
	echo $deck->getRotatedHash() . PHP_EOL;

	
