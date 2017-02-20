<?php
$pageTitle = 'calendar';
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
				<div class="container">
					<div class="row">
						<div class="12u">
							<section id="content" class="iframe-wrapper" style="text-align: center;">
								<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=0esifq9bgklgt3cqipc7spgqgc%40group.calendar.google.com&amp;color=%23875509&amp;ctz=Europe%2FBerlin" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
include('layout/footer.php');
