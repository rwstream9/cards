<?php


	namespace Cards\Strategy;
	
	
	interface StrategyInterface
	{
		
		
		public function generate ();
		public function getHash ();
		public function getUnorderedHash ();
	}