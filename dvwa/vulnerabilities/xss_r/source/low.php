<?php

header ("X-XSS-Protection: 0");

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Feedback for end user
	$html .= '<pre>Chào ' . $_GET[ 'name' ] . 'anh đứng đây từ chiều </pre><img src=./source/hi.jpg> ';
}

?>
