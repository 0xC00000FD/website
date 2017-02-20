<?php
/**
 * Handles the POST requests and responses
 * @param string $url - target url
 * @param string $data - payload to be sent to target
 * @param string $optionalHeaders - any additional headers to be sent to target
 * @return mixed $reponse - reponse from target
 */
function postRequest( $url, $data, $optionalHeaders = null ) {

	// Source: http://stackoverflow.com/a/10676394/3774356
	$params = array(
		'http' => array(
			'method' => 'POST',
			'content' => $data
		),
	);

	if( $optionalHeaders !== null ) {
		$params['http']['header'] = $optionalHeaders;
	}

	$ctx = stream_context_create( $params );
	$fp = @fopen( $url, 'rb', false, $ctx );

	if( !$fp ) {
		throw new Exception("Problem with $url - $errormsg");
	}

	$response = @stream_get_contents( $fp );

	if( $response === false ) {
		throw new Exception("Problem reading data from $url - $errormsg");
	}

	return $response;
}
