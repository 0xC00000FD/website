<?php
$pageTitle = 'application form';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include('layout/head.php'); ?>
	</head>
	<body class="homepage">
		<?php include('inc/analytics.php'); ?>
		<div class="contact">
			<a href="contact.php"><p><span class="no-mobile">Contact JSFAR Command</span></p></a>
		</div>
		<div id="wrapper">
			<?php include('layout/header.php'); ?>
			<div id="page">
				<div class="container" style="width: 100%;">
					<div class="application-form">
						<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSffQ3kp8zBFGs_sILJzbfKiJTB1g54p1aik4WqLwOrhdOx1vw/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
include('layout/footer.php');
