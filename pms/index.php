<!doctype html>
<html>
	<head>
	    <!-- Google Analytics -->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
		<title>PROPERTY MANAGEMENT SYSTEM</title>
		<link rel="stylesheet" type="text/css" href="bmi.css"/>
		<link rel="icon" type="image/css" href="milogo.png"/>
		<meta name="google-site-verification" content="hvTDrRZMfmZS2BeBLkOfPB8TKtMw3NIS2u_7UJP5-co" />
		<meta http-equiv="pragma" content="no-cache"/>
	</head>
	<body>
		<header>
		<div id="brand"><image src="anchor_logo.png" width="260px" heigth="120px" style="float:left;position:relative;bottom:20px;left:40px;"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROPERTY &nbsp;&nbsp;MANAGEMENT &nbsp;&nbsp;SYSTEM</div>
		<div id="navi">
			<ul class="righty">
				<li><a href="contact.php">Contact</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="adminlogin.php">Admin Login</a></li>
				<li><a href="lanreg.php">Register</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
		<div id="display">
			<div class="imgcont" id="imgbra">
					<p style="position:relative;top:110px;color:#fff;font-size:550%;font-family:calibri;animation:move 3s linear;">&nbsp;&nbsp;&nbsp;PROPERTY&nbsp; MANAGER&nbsp; (PM)</p>
					<p style="position:relative;top:100px;color:#fff;font-size:150%;font-family:calibri;animation:mov 3s linear;"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...security is wealth</em></p>


			</div>
			<div id="tsti">
				<a href="#"><div class="tsts">
					<h1>BENEFITS OF PMS</h1>
					Our system helps to clarify doubts about land and property ownership. This makes going to
					court unecessary and saves a lot of time and money
				</div></a>
				<a href="#"><div class="tsts">
					<h1>BENEFITS OF PMS</h1>
					Our system helps to clarify doubts about land and property ownership. This makes going to
					court unecessary and saves a lot of time and money
				</div></a>
				<a href="#"><div class="tsts">
					<h1>BENEFITS OF PMS</h1>
					Our system helps to clarify doubts about land and property ownership. This makes going to
					court unecessary and saves a lot of time and money
				</div></a>
			</div>
		</div>
		</header>
		<?php session_start(); if(isset($_SESSION['userid'])) unset($_SESSION['userid']);?>
		<table class="nmtable" >
			<tr id="darkHead">
				<td>S/N</td><td>Properties to Register</td>
			</tr>
			<tr>
				<td>1</td><td>Lands</td>
			</tr>
			<tr>
				<td>2</td><td>Buildings</td>
			</tr>
			<tr>
				<td>3</td><td>Kiosks/Sheds</td>
			</tr>
			<tr>
				<td>4</td><td>Private Ponds</td>
			</tr>
			<tr>
				<td>5</td><td>Private Pools</td>
			</tr>
			<tr>
				<td>6</td><td>Cars</td>
			</tr>
		</table>
		<div class="tsts" style="width:650px;height:380px;vertical-align:top;position:absolute;left:560px;top:940px;">
			<h1 id="frontHeading" style="font-family:ebrima;color:white;text-align:center;margin-bottom:10px;">Benefits of Cloud Property Management Software</h1>
			<p id="frontNews" style="font-family:ebrima;color:white;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cost efficiency is arguably one of the biggest benefits of cloud property management software. Traditionally, your data would be stored in large, physical servers that not only cost thousands of dollars but also require an IT team to install, maintain and upgrade. These costs can quickly add up, especially when you factor in licensing fees and energy bills.

                             On the other hand, cloud property software mitigates all of these costs as there is 
                             no need for your own infrastructure. Your data is stored securely in the cloud, saving you thousands in hardware and labour costs alone.

                             Additionally, the cloud allows you to upgrade or downsize your storage as needed. 
                              This means you only pay for what you need, allowing you to be a lot more flexible and cost efficient.<br/>
                             Another benefit of cloud property management software is increased security. With traditional property software, security updates are few and far
                             between, leaving your data vulnerable to theft, power outages, physical disasters and viruses. In fact, this real estate agency had their server-based data held to ransom.

                             
				
				
			</p>
		</div>
		<div id="mainbd">
			<p>
				<h1>What Is Property Management System</h1>
				Property Management System or PMS for short deals with easy management of different properties ownned by
				individuals or companies in a place.
				<p>
					Our system has a record of all lands and properties owned by our users. It resembles declaration of assests
					and all claimed properties are backed up by legal documents. That is, you cannot claim another person's
					property.
				</p>
			</p>
		</div>
		<div>
			
		</div>
		<footer><P>POWERED BY CMP 313 Group 1 Students</P></footer>
	</body>
</html>