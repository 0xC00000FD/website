<?php
$pageTitle = 'home';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<?php include('layout/head.php'); ?>
</head>
<body class="homepage">
	<?php include('inc/functions.php') ?>
	<?php include('inc/analytics.php'); ?>
	<div class="contact">
		<a href="contact.php"><p><span class="no-mobile">Contact 7AA Command</span></p></a>
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
							<a href="ts3server://ts.7thaa.com" class="button">Join us on Teamspeak</a>
							<?php include('inc/widget-discord.php'); ?>
						</section>
					</div>

					<div class="9u skel-cell-important">
						<section id="content">
							<header>
							</header>
							<p><strong>The 7th Air Assault Brigade (7AA) is multi-national ArmA 3 Tactical Realism group; a gaming community built around Bohemia Interactive's ArmA 3. 
							The 7AA is based on the British 16th AAB, the Army's rapid response airborne formation, operating in the ERA of 2035. 
							The 7th Air Assault Brigade is commonly deployed in politically sensitive and/or destabilised regions for classified reconnaissance operations. 
							</strong></p>
							<p>Check out our <a href="http://bit.ly/7aa-orbat">ORBAT</a> to have a peak at the current structure of the unit.</p>
							<header>
								<h2>Biography</h2>
							</header>
							<p>
							The infantrymen of this rapid response airborne brigade have all been trained up to SF (Special Forces) standards. Therefore, the 7AA's main deployments are highly sensitive and/or covert operations, received from the Joint NATO Command Centre in Europe. The SFSG (Special Forces Support Group) Infantry is supported in the field by the Mobile Fire Support Group, the Royal Army Medical Corps and the Signals Squadrons. Together they make a lethal combination on the ground. During any operation, the 7AA can count on around the clock assistance from the joint aviation command, more commonly known as the 1st Aviation Squadron. These highly trained pilots and crewman handle transport and close air support with both rotary and fixed wing aircraft. As a rapid response airborne formation, it is one of the few brigades capable of delivering Airborne operations.</p>
							<header>
								<h2>Unit Philosophy</h2>
							</header>
							<ul class="style1">
								<li>The brigade falls under Special Forces with a UK Army-based rank structure.</li>
								<li>Players are riflemen at the core. Specialisations are at heart's content.</li>
								<li>Players qualified in more than one field can indicate the pool they want to operate in before the briefing of a mission. </li>
								<li>Everyone is free to speak their mind and offer constructive criticism.</li>
								<li>Fun is one of the main goals and will always have a higher priority than the seeking of control or false respect.</li>
								<li>Soft age limit: 18+, 16+ allowed if mature (provided you pass the probation period)</li>
								<li>2 Private Servers</li>
								<li>5 Public Servers</li>
							</ul>
							<header>
								<h2>Features</h2>
							</header>
								<ul class="style1">
								<li>All private servers support <a href="http://steamcommunity.com/sharedfiles/filedetails/?id=845910510">7AA Modpack</a>.</li>
								<li>Basic to Advanced Training and Dedicated Role training.</li>
								<li>2 Weekly Operations, private servers online 24/7 for member use.</li>
								<li>Friendly and helpful community, joint operations with other communities.</li>
								<li>A place to chill after a hard day, or play CO-OP horror scenarios at night!</li>
								<li>A balance between performance and fun on the battlefield!</li>
							</ul>
							<header>
								<h2>Arma 3 servers</h2>
							</header>
							<p><strong>Global Address: arma3.7thaa.com</strong></p>
							<ul class="style4">
								<li><div>ALPHA </div><?php server1(); ?></li>
								<li><div>BRAVO </div><?php server2(); ?> </li>
								<li><div>CHARLIE </div> <?php server3(); ?></li>
								<li><div>DELTA </div><?php server4(); ?></li>
								<li><div>ECHO </div> <?php server5(); ?></li>
								<li><div>FOXTROT </div><?php server6(); ?></li>
								<li><div>GOLF </div><?php server7(); ?></li>
							</ul>
							<header>
								<h2>Addon collection</h2>
							</header>
							<ul class="style1">
								<li>Main Files (all required): <a href="http://steamcommunity.com/sharedfiles/filedetails/?id=845910510">Main Files Steam Workshop Collection</a></li>
								<li>Optional Files (Recommended for enhanced immersion): <a href="https://steamcommunity.com/sharedfiles/filedetails/?id=1237445004">Optional Files Steam Workshop Collection</a></li>
								<li>Terrain addons: <a href="https://steamcommunity.com/sharedfiles/filedetails/?id=935545021">Server Only Steam Workshop Collection</a></li>
							</ul>
							<header>
								<h2>Social</h2>
							</header>
							<h3>Unit Tag</h3>
							<p>Do you want to join the 7AA and carry our tag and emblem on the battlefield? Register here: <a href="https://units.arma3.com/unit/7AA">7AA Units Page</a>!</p>
							<h3>Public Steam Group</h3>
							<p>Feel free to join our Public steam group! <a href="https://steamcommunity.com/groups/7thaa">Public Steam Group</a></p>
							<h3>Facebook Page</h3>
							<p>Follow our reddit page!  <a href="https://www.reddit.com/r/7thAA/">7AA reddit Page</a></p>
						</section>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<?php include('layout/footer.php'); ?>
