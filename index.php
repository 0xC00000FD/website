<?php
$pageTitle = 'home';
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
						<div class="3u">
							<section id="sidebard2">
								<header>
									<h2>Teamspeak</h2>
								</header>
								<?php include('inc/teamspeak.php'); ?>
								<a href="ts3server://ts.jsfar.com" class="button">Join us on Teamspeak</a>
							</section>
						</div>

						<div class="9u skel-cell-important">
							<section id="content" >
								<header>
									<h2>Motto</h2>
								</header>
								<p><strong>160th Joint Special Forces: 'Army Rangers' is a tactical realism battlegroup. The 160th JSF is an elite airborne battle group designated Army Rangers assisted by support groups. It is mostly deployed in destabilized regions to restore peace and order.</strong></p>
								<header>
									<h2>Biography</h2>
								</header>
								<p>
								The main group is divided into the main assault group mechanized infantry and special forces (Reconnaissance). The mechanized infantry specialises in quick deployment through paradrop and full frontal assault with heavy armoured elements as extra support. The Special Forces are highly trained in any kind of situation e.g hostage rescue and HVT elimination. The 'Army Rangers' are supported by rotary and fixed wing pilots and armoured vehicle crew. These groups provide logistic support and fire support.</p>
								<h3>Unit Philosophy</h3>
								<ul>
									<li>NATO ranking system adjusted to the player's team (Air Force - Army). Promotions are earned by participation in Special Operations (SO).</li>
									<li>Higher ranked players cannot force a lower ranked player to do their bidding. Ranks are only in place for SOs.</li>
									<li>Any inner unit disagreements are discussed publicly if possible, and taken to Command if agreements can not be reached.</li>
									<li>Players can indicate their prefered role during the application. During the interview the final role/career path will be decided. It is entirely possible to change career path at any time given the proper arguments.</li>
									<li>Players qualified in more than one field can indicate the pool they want to operate in before the briefing of an SO.</li>
									<li>Everyone is free to speak their mind and present constructed critism.</li>
									<li>Fun is one of the main goals and will always have a higher priority than performance.</li>
								</ul>
								<h3>Rules/Requirements</h3>
								<ul>
									<li>Must have a working microphone and preferably experience with TFAR.</li>
									<li>English is the main language in the unit and during operations. Therefore a moderate level of the English language is required.</li>
									<li>Age for joining players is 16 or above. Players younger than the threshold can apply and are expected to act as maturely as the older players.</li>
									<li>All members wear the same camouflage as their squad mates.</li>
									<li>All members follow the chain of command during an operation.</li>
									<li>All members have their kits sorted before the start of the SO to prevent waiting time.</li>
									<li>All members have their mod pack updated and working before the start of an SO. If such is not the case, the player will not be allowed to participate.</li>
									<li>All members attend 2 out of 4 SOs. Any player with more than 2 AWOLs will be removed due to inactivity. Sending a message to Staff about absence on time will prevent the AWOL count to increase.</li>
								</ul>
							</section>
						</div>
					</div>

				</div>	
			</div>
<?php
include('layout/footer.php');
