<?php
$base = './after-action-reports';
?>
<html>
<head>
	<title>7AA AAR Media</title>
</head>
<body bgcolor="#000000">
	<font color="#FFFFFF" face="Verdana,Arial" size="3">
		<div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%; width: 100%; text-align: center;">
			<span style="font-weight: bold; text-transform: uppercase;margin-top: 0.5rem;">7AA After Action Report Screenshots</span><br>
			&nbsp;<br>
			<font size="2">
				<p>Check out 7th Air Assault Brigade's Operations Screenshots!</p>
				<ul style="padding-left:0;color:white;font-weight:bold;text-decoration:none;list-style-type:none;text-transform:uppercase;">
					<?php
					foreach(glob("{$base}/*", GLOB_ONLYDIR) as $dir) {
						$dir = str_replace("{$base}/", '', $dir);
						$dirName = str_replace('-', ' ', $dir);
						echo '<li><a style="color: white;" href="gallery.php?b=' . $base . '&q=' . $dir . '">' . $dirName . '</a></li>';
					}
					unset($dir);
					?>
				</ul>
			</font>
		</div>
	</font>
</body>
</html>
