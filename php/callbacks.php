<?php

class test {

	public function add( $num1, $num2, $callback ) {
		$sum = $num1 + $num2;

		$callback( $sum );
	}

	public function call_from_string( $num1, $num2, $callbackString ) {

		$sum = $num1 + $num2;

		call_user_func( $callbackString, array( $num1, $num2, $sum ) );
	}
}

function display_string( $params ) {
	foreach( $params as $key => $param ) {
		echo '<p>Params: '. $key .' = '. $param;
	}
}

$test = new test;

// pass literal callback function
$test->add( 1, 1, function( $result ) {
	echo $result;
});

// pass callback via string
$test->call_from_string( 2, 3, 'display_string');