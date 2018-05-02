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
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/SJ1F_ZBpf/698012.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Nywic2VydmVyIjo2OTgwMTIsIm9wdGlvbnMiOnsiZm9yZWdyb3VuZCI6IiMzMjMzMzgiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxpbmVzIjoiIzZkOWVlYiIsImxpbmtDb2xvciI6IiM2ZDllZWIiLCJjaGFydENvbG9yIjoiI0ZGMDcwMCJ9LCJsaXZlVXBkYXRlcyI6dHJ1ZSwidXNlcl9pZCI6NjY1NywiaWF0IjoxNTI1MTIzNTE5fQ.CoabPTQ9wP63edYEthXl0J92HXRxWC7K9e0q6V8oXMk" frameborder=0 style="border:0" name="ypoiq"></iframe>
';
}
function server2() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/SJ1F_ZBpf/615338.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Nywic2VydmVyIjo2MTUzMzgsIm9wdGlvbnMiOnsiZm9yZWdyb3VuZCI6IiMzMjMzMzgiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxpbmVzIjoiIzZkOWVlYiIsImxpbmtDb2xvciI6IiM2ZDllZWIiLCJjaGFydENvbG9yIjoiI0ZGMDcwMCJ9LCJsaXZlVXBkYXRlcyI6dHJ1ZSwidXNlcl9pZCI6NjY1NywiaWF0IjoxNTI1MTIzNTMzfQ.nz5z2T5p0KJ5itbuwyh3T08IC-_hADyDDHbzZtMn_L4" frameborder=0 style="border:0" name="barve"></iframe>
';
}
function server3() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/SJ1F_ZBpf/287661.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Nywic2VydmVyIjoyODc2NjEsIm9wdGlvbnMiOnsiZm9yZWdyb3VuZCI6IiMzMjMzMzgiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxpbmVzIjoiIzZkOWVlYiIsImxpbmtDb2xvciI6IiM2ZDllZWIiLCJjaGFydENvbG9yIjoiI0ZGMDcwMCJ9LCJsaXZlVXBkYXRlcyI6dHJ1ZSwidXNlcl9pZCI6NjY1NywiaWF0IjoxNTI1MTIzNTQ2fQ.1RwXICgVwRdMRrjvZtCOyMvMFoFifoC5L5AHCRyvdKA" frameborder=0 style="border:0" name="earct"></iframe>
';
}
function server4() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/SJ1F_ZBpf/727222.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Nywic2VydmVyIjo3MjcyMjIsIm9wdGlvbnMiOnsiZm9yZWdyb3VuZCI6IiMzMjMzMzgiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxpbmVzIjoiIzZkOWVlYiIsImxpbmtDb2xvciI6IiM2ZDllZWIiLCJjaGFydENvbG9yIjoiI0ZGMDcwMCJ9LCJsaXZlVXBkYXRlcyI6dHJ1ZSwidXNlcl9pZCI6NjY1NywiaWF0IjoxNTI1MTIzNjA1fQ.P9xR-yQ-0NiWDWYQoDAoVIyyrQyqa0yR480dDoo72Co" frameborder=0 style="border:0" name="sxpol"></iframe>
';
}
function server5() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/SJ1F_ZBpf/1982844.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Nywic2VydmVyIjo3MjcyMjIsIm9wdGlvbnMiOnsiZm9yZWdyb3VuZCI6IiMzMjMzMzgiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxpbmVzIjoiIzZkOWVlYiIsImxpbmtDb2xvciI6IiM2ZDllZWIiLCJjaGFydENvbG9yIjoiI0ZGMDcwMCJ9LCJsaXZlVXBkYXRlcyI6dHJ1ZSwidXNlcl9pZCI6NjY1NywiaWF0IjoxNTI1MTIzNjE2fQ.1KSaTQrfz2Iwl9NiU38ttNybwzDCSNgB2H34l3fxF30" frameborder=0 style="border:0" name="qvxog"></iframe>
';
}
function server6() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/SJ1F_ZBpf/2202886.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Nywic2VydmVyIjoyMjAyODg2LCJvcHRpb25zIjp7ImZvcmVncm91bmQiOiIjMzIzMzM4IiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJsaW5lcyI6IiM2ZDllZWIiLCJsaW5rQ29sb3IiOiIjNmQ5ZWViIiwiY2hhcnRDb2xvciI6IiNGRjA3MDAifSwibGl2ZVVwZGF0ZXMiOnRydWUsInVzZXJfaWQiOjY2NTcsImlhdCI6MTUyNTEyMzYyNn0.79MzGEZ0DqjWogheFia5KlAv1gh-Z-ilKYER53FdYGA" frameborder=0 style="border:0" name="mexab"></iframe>
';
}

function server7() {
echo '<iframe class="server" src="https://cdn.battlemetrics.com/b/SJ1F_ZBpf/2202887.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Nywic2VydmVyIjoyMjAyODg2LCJvcHRpb25zIjp7ImZvcmVncm91bmQiOiIjMzIzMzM4IiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJsaW5lcyI6IiM2ZDllZWIiLCJsaW5rQ29sb3IiOiIjNmQ5ZWViIiwiY2hhcnRDb2xvciI6IiNGRjA3MDAifSwibGl2ZVVwZGF0ZXMiOnRydWUsInVzZXJfaWQiOjY2NTcsImlhdCI6MTUyNTEyMzYzM30.6sI6yj1JO6jQ6bBSazK-YApEziRHnH5ikO4pH7hHuDQ" frameborder=0 style="border:0" name="uhxyx"></iframe>
';
}
