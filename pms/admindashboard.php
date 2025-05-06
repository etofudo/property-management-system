<!doctype html>
<html>
	<head>
		<title>PROPERTY MANAGER</title>
		<link rel="stylesheet" type="text/css" href="bmi.css"/>
		<link rel="icon" type="image/css" href="milogo.png">
		<meta http-equiv="pragma" content="no-cache">
		<script language="javascript">
		</script>
		<style>
			form{
				background:#f3f3f6;
				width:450px;
			}
			#top{
				display:block;
				text-align:center;
				color:#fff;
				height:80px;
				padding-top:20px;
				font-size:200%;
				border-bottom:1.3px groove #fff;
			}
			label.fieldLab{
				display:block;
				font-size:140%;
				color:#fff;
				margin-left:22px;
				margin-top:25px;
				background:#285386;
			}
			input[type="text"],[type="password"]{
				width:85%;
				height:40px;
				outline-style:none;
				font-size:110%;
				color:#fff;
				margin-left:22px;
				padding-right: 12px;
				padding-left: 12px;
				box-shaddow:5px #000;
				font-family:ebrima;
				background:#60605f;
				border:1px solid #035;
				border-radius:5px;
			}
			input[type="text"]:focus,[type="password"]:focus{
				border-color:#b0b0ff;
			}
			input[type="submit"],#nas{
				margin:16px 50px 12px 50px; 
				height:40px;
				background:#285386;
				border:none;
				color:#fff;
				width:100px;
				box-shaddow:5px #000;
				font-family:ebrima;
			}
			.nmtabl{
				margin:50px 100px 200px 80px;
				background:#f5f5fa;
				position:relative;
				top:10px;
			}
			.nmtabl td{
				color:#035;
				padding:10px;
			}
			.side-nav{
				float:left;
				background:#14304f;
			}
			li{
				list-style:none;
			}
			.side-nav li:hover{
				background:#223f4d;
				border-right:4px solid #aaf;
			}
			a{
				text-decoration:none;
				color:white;
				display:block;
				padding:30px 20px 40px 40px;
			}
			#usinfo{
				background:linear-gradient(0deg,#f8f,#000) ;
			}
		</style>
	</head>
	<body>
		<?php session_start();if(isset($_SESSION['userid']) && $_SESSION['userid'] == $_GET['us']){?>
		<?php include('adminmsp.php');?>
		<div style="margin-left:50px;float:right;width:80%">
				<?php $h = $_GET['us'] ?>
		<p style="font-size:250%;color:#619;margin:50px 60px 30px 10px;font-family:calibri;border:.5px solid #422;border-radius:10px;text-align:center;
		padding:25px">
		&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;Welcome,&nbsp;&nbsp;
			<?php 
					include('db.php');
					$ros = $con->query("select fname,lname from pmsadmin where adminid=$h");
					foreach ($ros as $ro) {
						if(strlen($ro['fname']) != 0 && strlen($ro['lname']) != 0 ){
							$n = $ro['fname'];
							$m = $ro['lname'];
							echo $n.' &nbsp;'.$m;
						}
					};?>
		</p>
			</div>
		<?php }
		else
			echo "<a style='font-weight:bold;font-size:900%;color:red;background:pink;margin:60px' href='adminlogin.php'>Click to Continue</a><br/>";
		?>
	</body>
	
</html>