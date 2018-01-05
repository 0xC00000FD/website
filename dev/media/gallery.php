<?php
$query = $_GET['q'];
$base = $_GET['b'];
$queryName = str_replace('-', ' ', $query);

$pageTitle = 'AAR Media - ' . ucwords($queryName);
$description = str_replace("\n", '<br>', file_get_contents("{$base}/{$query}/description.txt"));
?>
<!DOCTYPE HTML>
<html>
<head>
	<?php include('../layout/head.php'); ?>
</head>
<body bgcolor="#000000">
	<font color="#FFFFFF" face="Verdana,Arial" size="3">
		<div style="display: flex;  flex-direction: column; height: 100%; width: 100%; text-align: center;">
			<span style="font-weight: bold; text-transform: uppercase;margin-top: 0.5rem;"><?php echo $queryName; ?></span>
			<p><?php echo $description; ?></p>
			<div style="display: flex; flex-wrap: wrap; margin: 0 15%;">
				<?php
				foreach(glob("{$base}/{$query}/*.{jpg,jpeg,png,gif,tiff}", GLOB_BRACE) as $img) {
					$imgIndex = strrpos('/', $img);
					$imgName = str_replace('-', ' ', substr($img, $imgIndex));
					echo '<a style="flex-basis: 25%; flex-grow: 1;margin: 1rem;" href="' . $img . '" title="' . $imgName . '"><img src="' . $img . '" alt="' . $imgName . '" style="height: auto; width: 100%;"></a>';
				}
				unset($img);
				?>
			</div>
		</div>
	</font>
</body>
</html>
