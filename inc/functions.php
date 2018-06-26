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

function server1() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/horizontal500x80px/698012.html?foreground=%23EEEEEE&background=%23222222&lines=%23333333&linkColor=%231185ec&chartColor=%23FF0700" frameborder=0 style="border:0"name="xahpg"></iframe>
';
}
function server2() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/horizontal500x80px/615338.html?foreground=%23EEEEEE&background=%23222222&lines=%23333333&linkColor=%231185ec&chartColor=%23FF0700" frameborder=0 style="border:0" name="kagln"></iframe>
';
}
function server3() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/horizontal500x80px/287661.html?foreground=%23EEEEEE&background=%23222222&lines=%23333333&linkColor=%231185ec&chartColor=%23FF0700" frameborder=0 style="border:0" name="stjxu"></iframe>
';
}
function server4() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/horizontal500x80px/727222.html?foreground=%23EEEEEE&background=%23222222&lines=%23333333&linkColor=%231185ec&chartColor=%23FF0700" frameborder=0 style="border:0" name="cjkci"></iframe>
';
}
function server5() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/horizontal500x80px/1982844.html?foreground=%23EEEEEE&background=%23222222&lines=%23333333&linkColor=%231185ec&chartColor=%23FF0700" frameborder=0 style="border:0" name="rbfik"></iframe>
';
}
