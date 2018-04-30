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
echo '<iframe class="style5" src="https://cdn.battlemetrics.com/b/S1J7ktcKZ/698012.html?foreground=%23EEEEEE&background=%23222222&lines=%23333333&linkColor=%231185ec&chartColor=%23FF0700" frameborder=0 style="border:0" name="tgqoh"></iframe>';
}
function server2() {
echo '<iframe src="https://cdn.battlemetrics.com/b/S1J7ktcKZ/615338.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NzY4LCJzZXJ2ZXIiOjYxNTMzOCwib3B0aW9ucyI6eyJmb3JlZ3JvdW5kIjoiI0VFRUVFRSIsImJhY2tncm91bmQiOiIjMjIyMjIyIiwibGluZXMiOiIjMzMzMzMzIiwibGlua0NvbG9yIjoiIzExODVlYyIsImNoYXJ0Q29sb3IiOiIjRkYwNzAwIn0sImxpdmVVcGRhdGVzIjp0cnVlLCJ1c2VyX2lkIjo2NjU3LCJpYXQiOjE1MjUxMDM1NzR9.Vbkjrp6Jxe9kcJV1puNPTdjKwH9SM7n33eBoxNv6ovs" frameborder=0 style="border:0" name="oycom"></iframe>';
}
function server3() {
echo '<iframe src="https://cdn.battlemetrics.com/b/S1J7ktcKZ/287661.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NzY4LCJzZXJ2ZXIiOjYxNTMzOCwib3B0aW9ucyI6eyJmb3JlZ3JvdW5kIjoiI0VFRUVFRSIsImJhY2tncm91bmQiOiIjMjIyMjIyIiwibGluZXMiOiIjMzMzMzMzIiwibGlua0NvbG9yIjoiIzExODVlYyIsImNoYXJ0Q29sb3IiOiIjRkYwNzAwIn0sImxpdmVVcGRhdGVzIjp0cnVlLCJ1c2VyX2lkIjo2NjU3LCJpYXQiOjE1MjUxMDM1OTJ9.iFsP0fAuGcSZ8C-es0VKpedsCnlB6HM5IuIepMyjg8U" frameborder=0 style="border:0" name="jgrdk"></iframe>
';
}
function server4() {
echo '<iframe src="https://cdn.battlemetrics.com/b/S1J7ktcKZ/727222.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NzY4LCJzZXJ2ZXIiOjcyNzIyMiwib3B0aW9ucyI6eyJmb3JlZ3JvdW5kIjoiI0VFRUVFRSIsImJhY2tncm91bmQiOiIjMjIyMjIyIiwibGluZXMiOiIjMzMzMzMzIiwibGlua0NvbG9yIjoiIzExODVlYyIsImNoYXJ0Q29sb3IiOiIjRkYwNzAwIn0sImxpdmVVcGRhdGVzIjp0cnVlLCJ1c2VyX2lkIjo2NjU3LCJpYXQiOjE1MjUxMDM1OTl9.tP7iC8VzIHX-h-M8WhpB4EZ9XD2M-fxa4gOnkId0dGA" frameborder=0 style="border:0" name="kxddu"></iframe>';
}
function server5() {
echo '<iframe src="https://cdn.battlemetrics.com/b/S1J7ktcKZ/1982844.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NzY4LCJzZXJ2ZXIiOjE5ODI4NDQsIm9wdGlvbnMiOnsiZm9yZWdyb3VuZCI6IiNFRUVFRUUiLCJiYWNrZ3JvdW5kIjoiIzIyMjIyMiIsImxpbmVzIjoiIzMzMzMzMyIsImxpbmtDb2xvciI6IiMxMTg1ZWMiLCJjaGFydENvbG9yIjoiI0ZGMDcwMCJ9LCJsaXZlVXBkYXRlcyI6dHJ1ZSwidXNlcl9pZCI6NjY1NywiaWF0IjoxNTI1MTAzNjA1fQ.8qkRwXgoJ24Chijp4xJbn5f4HGv6HdITUsEkIMoDzNI" frameborder=0 style="border:0" name="cqosr"></iframe>';
}
function server6() {
echo '<iframe src="https://cdn.battlemetrics.com/b/S1J7ktcKZ/2202886.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NzY4LCJzZXJ2ZXIiOjIyMDI4ODYsIm9wdGlvbnMiOnsiZm9yZWdyb3VuZCI6IiNFRUVFRUUiLCJiYWNrZ3JvdW5kIjoiIzIyMjIyMiIsImxpbmVzIjoiIzMzMzMzMyIsImxpbmtDb2xvciI6IiMxMTg1ZWMiLCJjaGFydENvbG9yIjoiI0ZGMDcwMCJ9LCJsaXZlVXBkYXRlcyI6dHJ1ZSwidXNlcl9pZCI6NjY1NywiaWF0IjoxNTI1MTAzNjEwfQ.6rjEhF_EnF-LutJvh3kK7jcLSodSx3OSj0SgHOOumAc" frameborder=0 style="border:0" name="dpznj"></iframe>';
}

function server7() {
echo '<iframe src="https://cdn.battlemetrics.com/b/SJOHlA4TM/2202887.html?_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTA3Niwic2VydmVyIjoyMjAyODg3LCJvcHRpb25zIjp7ImZvcmVncm91bmQiOiIjRUVFRUVFIiwiYmFja2dyb3VuZCI6IiMyMjIyMjIiLCJsaW5lcyI6IiMzMzMzMzMiLCJsaW5rQ29sb3IiOiIjMTE4NWVjIiwiY2hhcnRDb2xvciI6IiNGRjA3MDAifSwibGl2ZVVwZGF0ZXMiOnRydWUsInVzZXJfaWQiOjY2NTcsImlhdCI6MTUyNTExNDQ0MX0.0_bgMDK00wXilX_DB726zhgI7pRinHCPJH0TJIglbTY" frameborder=0 style="border:0" name="lpixc"></iframe>';
}
