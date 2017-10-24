<?php

	function printStuff() {
		echo "\tStuff!!!!!\n";
	}

	function printThisStuff($x, $y, $z) {
		echo "\t" . $x . "\n";
		echo "\t" . $y . "\n";
		echo "\t" . $z . "\n";
	}

	function woofify($input) {
		return "woof woof woof " . $input . " woof woof";
	}

	echo "\n";

	echo "\tHello, world!\n";

	$name = 'Melanie';
	echo "\tHello, ".$name."!\n";

	echo "\n";

	for ($i = 0; $i < 10; $i++) {
		echo "\tHello!  This is #" . $i . "\n";
	}

	echo "\n";

	$colors = ['red', 'orange', 'yellow'];

	echo "\tWe have " . count($colors) . " nice colors.\n";

	foreach ($colors as $color) {
		// Run through $colors array and capitalize the first letter in the sentence too.
		echo "\t" . ucfirst($color) . " is a nice color.\n";
	}

	echo "\n";

	$counter = 36;
	while($counter >= 0) {
		echo "\t", $counter, " is the best number!\n";
		$counter -= 6;
	}

	echo "\n";

	$ideas = [];

	if ($ideas) {
		echo "\t\$ideas evaluates to true!\n";
	} else {
		echo "\t\$ideas evaluates to false!\n";
	}

	// Equivalent to a JS .push to an array
	$ideas[] = 'Eat more candy!';

	if ($ideas) {
		echo "\tNow \$ideas evaluates to true!\n";
	} else {
		echo "\tNow \$ideas evaluates to false!\n";
	}

	echo "\n";

	$value1 = 5;
	$value2 = 6;

	echo "\t" . $value1 . "\n";
	echo "\t" . $value2 . "\n";

	echo "\t" . ($value1 + $value2) . "\n"; // tab didn't work without the ()'s.
	echo "\t" . ($value1 - $value2) . "\n";
	echo "\t" . ($value1 * $value2) . "\n";
	echo "\t" . ($value1 / $value2) . "\n";
	echo "\t" . ($value1 % $value2) . "\n";
	echo "\t" . sqrt($value1) . "\n";
	echo "\t" . pow($value1, $value2) . "\n";

	echo "\n";

	printStuff();

	printThisStuff('Larry', 'Curly', 'Moe');

	$dogspeak = woofify('feed me please!');
		echo "\t" . $dogspeak . "\n";

	echo "\n";

	sleep(1);
		echo "\tWow, I got tired of waiting.\n";

	echo "\n";

	$animal = 'lion';
	switch ($animal) {
		case 'lion':
			echo "\tI like to roar!\n";
			break;
		case 'wolf':
			echo "\tI like to howl!\n";
			break;
		case 'giraffe':
			echo "\tI like to...?\n";
			break;
		default:
			echo "\tI don't know what I like to say!\n";
			break;
	}

	echo "\n";

	// Asociative array in PHP
	$favorites = array(
		'color' => 'yellow',
		'food' => 'Cake',
		'animal' => 'Pitbull',
		'book' => 'The Good Girl\'s Guide to Getting Lost',
		'movie' => 'Beauty and the Beast (2017)',
		'number' => 36
	);

	var_dump($favorites);

	echo "\n";

	foreach ($favorites as $category => $value) {
		echo "\tMy favorite $category is $value.\n";
	}

	echo "\n";

?>